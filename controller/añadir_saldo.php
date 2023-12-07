<?php
session_start();
include_once 'conexion.php'; // Asegúrate de que este archivo gestiona la conexión a la base de datos.

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
        header("Location: ../view/dashboard.php");
        exit();
    } else {
        echo "Error al añadir saldo.";
    }

    $stmt->close();
} else {
    echo "Solicitud no válida.";
}

$conn->close();
