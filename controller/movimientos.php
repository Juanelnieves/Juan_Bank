<?php
include_once 'conexion.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "Usuario no autenticado"]);
    exit;
}

$idUsuario = $_SESSION['user_id'];
$sql = "SELECT * FROM Transacciones WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUsuario);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $transacciones = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($transacciones);
} else {
    echo json_encode(["message" => "Error.", "status" => "error"]);
}

$conn->close();
?>
