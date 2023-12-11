<?php
session_start();
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $withdrawAmount = $_POST['withdrawAmount'];
    $concept = $_POST['withdrawConcept'];

    // Validar y limpiar $withdrawAmount
    $withdrawAmount = filter_var($withdrawAmount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if ($withdrawAmount <= 0) {
        exit("Cantidad inválida."); // Manejar error
    }

    // Comprobar si hay saldo suficiente antes de retirar
    $sql = "SELECT saldo FROM Usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($row['saldo'] >= $withdrawAmount) {
            // Registrar la transacción
            $sqlTransaccion = "INSERT INTO Transacciones (id_usuario, cantidad, tipo, concepto, fecha_hora) VALUES (?, ?, 'retirar', ?, NOW())";
            $stmtTransaccion = $conn->prepare($sqlTransaccion);
            $stmtTransaccion->bind_param("ids", $userId, $withdrawAmount, $concept);
            $stmtTransaccion->execute();
            $stmtTransaccion->close();

            // Retirar el saldo
            $updateSql = "UPDATE Usuarios SET saldo = saldo - ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("di", $withdrawAmount, $userId);

            if ($updateStmt->execute()) {
                // Consulta para obtener el saldo actualizado
                $sqlSaldo = "SELECT saldo FROM Usuarios WHERE id = ?";
                $stmtSaldo = $conn->prepare($sqlSaldo);
                $stmtSaldo->bind_param("i", $userId);
                $stmtSaldo->execute();
                $resultadoSaldo = $stmtSaldo->get_result();
                if ($fila = $resultadoSaldo->fetch_assoc()) {
                    $nuevoSaldo = $fila['saldo'];
                }
                $stmtSaldo->close();

                header('Content-Type: application/json');
                echo json_encode(['status' => 'success', 'message' => 'Retiro realizado con éxito', 'userSaldo' => $nuevoSaldo]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al realizar el retiro']);
            }
            $updateStmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Saldo insuficiente']);
        }
    } else {
        echo "Error al consultar el saldo.";
    }

    $stmt->close();
} else {
    echo "Solicitud no válida.";
}

$conn->close();
?>
