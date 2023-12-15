<?php
session_start();
include_once 'conexion.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$userId = $_SESSION['user_id'];

// Inicializa variables para almacenar los datos del usuario
$iban = "";

$sql = "SELECT iban FROM Usuarios WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $iban = $row['iban'];
    }
    $stmt->close();
}
$conn->close();
?>
