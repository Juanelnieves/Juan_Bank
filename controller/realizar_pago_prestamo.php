<?php
session_start();
include_once 'conexion.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $paymentAmount = filter_var($_POST['paymentAmount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $loanId = filter_var($_POST['loanId'], FILTER_SANITIZE_NUMBER_INT);

    $conn->begin_transaction();
    try {
        // Verificar si el préstamo existe y pertenece al usuario
        $stmt = $conn->prepare("SELECT cantidad_restante FROM Prestamos WHERE id = ? AND id_usuario = ?");
        $stmt->bind_param("ii", $loanId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            throw new Exception("Préstamo no encontrado o no pertenece al usuario.");
        }

        $loan = $result->fetch_assoc();
        $newRemainingAmount = $loan['cantidad_restante'] - $paymentAmount;

        // Verificar si el monto de pago es válido
        if ($paymentAmount <= 0 || $newRemainingAmount < 0) {
            throw new Exception("Monto de pago inválido.");
        }

        // Actualizar el préstamo
        $loanStatus = ($newRemainingAmount <= 0) ? 'completado' : 'aprobado';
        $stmt = $conn->prepare("UPDATE Prestamos SET cantidad_restante = ?, estado = ? WHERE id = ?");
        $stmt->bind_param("dsi", $newRemainingAmount, $loanStatus, $loanId);
        $stmt->execute();

        // Restar el monto del pago del saldo del usuario y verificar si la operación afectó alguna fila
        $stmt = $conn->prepare("UPDATE Usuarios SET saldo = saldo - ? WHERE id = ?");
        $stmt->bind_param("di", $paymentAmount, $userId);
        $stmt->execute();
        if ($stmt->affected_rows <= 0) {
            throw new Exception("Error al actualizar el saldo del usuario.");
        }

        $conn->commit();
        $message = ($loanStatus === 'completado') ? "Préstamo completado con éxito." : "Pago realizado con éxito.";
        echo json_encode(["status" => "success", "message" => $message, "newRemainingAmount" => $newRemainingAmount, "userBalance" => $newUserBalance]);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Usuario no autenticado o solicitud incorrecta."]);
}
$conn->close();
?>
