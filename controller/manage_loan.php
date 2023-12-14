<?php
include_once 'conexion.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$action = $data['action'];

if ($action === 'aprobar') {
    if (!isset($data['paymentAmount']) || !isset($data['paymentFrequency'])) {
        echo json_encode(["message" => "Los términos de pago son requeridos para aprobar un préstamo.", "status" => "error"]);
        exit;
    }

    $paymentAmount = $data['paymentAmount'];
    $paymentFrequency = $data['paymentFrequency'];

    $conn->begin_transaction();
    try {
        $sql = "UPDATE Prestamos SET estado = 'aprobado', pago_mensual = ?, fecha_vencimiento = DATE_ADD(CURRENT_DATE, INTERVAL ? DAY) WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("dii", $paymentAmount, $paymentFrequency, $id);
        $stmt->execute();

        // Aquí también debemos actualizar la cantidad restante igual a la cantidad del préstamo
        $sql = "UPDATE Prestamos SET cantidad_restante = cantidad WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $sql = "SELECT cantidad, id_usuario FROM Prestamos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $prestamo = $result->fetch_assoc();

        $sql = "UPDATE Usuarios SET saldo = saldo + ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("di", $prestamo['cantidad'], $prestamo['id_usuario']);
        $stmt->execute();

        $conn->commit();
        echo json_encode(["message" => "Préstamo aprobado y saldo actualizado.", "status" => "success"]);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(["message" => "Error al procesar la solicitud: " . $e->getMessage(), "status" => "error"]);
    }
} elseif ($action === 'rechazar') {
    $sql = "UPDATE Prestamos SET estado = 'rechazado' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo json_encode(["message" => "Préstamo rechazado con éxito.", "status" => "success"]);
} else {
    echo json_encode(["message" => "Acción no válida.", "status" => "error"]);
    exit;
}

$stmt->close();
$conn->close();
?>
