<?php
session_start();
include_once 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $addAmount = $_POST['addAmount'];
    $concept = $_POST['addConcept'];

    // Validar y limpiar $addAmount
    $addAmount = filter_var($addAmount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if ($addAmount <= 0) {
        // Manejar error: la cantidad a añadir debe ser mayor que 0
        exit("Cantidad inválida.");
    }

    // Guardar la transacción en la base de datos
    $sqlTransaccion = "INSERT INTO Transacciones (id_usuario, cantidad, tipo, concepto, fecha_hora) VALUES (?, ?, 'añadir', ?, NOW())";
    $stmtTransaccion = $conn->prepare($sqlTransaccion);
    $stmtTransaccion->bind_param("ids", $userId, $addAmount, $concept);
    $stmtTransaccion->execute();
    $stmtTransaccion->close();

   // Actualizar el saldo en la base de datos
$sql = "UPDATE Usuarios SET saldo = saldo + ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("di", $addAmount, $userId);

if ($stmt->execute()) {
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
    $respuesta = [
        'status' => 'success', 
        'message' => 'Operación exitosa',
        'userSaldo' => $nuevoSaldo // Asegúrate de enviar el saldo actualizado
    ];
    echo json_encode($respuesta);
    exit;
} else {
    echo "Error al añadir saldo.";
}
}
$stmt->close();
$conn->close();
