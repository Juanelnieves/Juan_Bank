<?php
include_once 'conexion.php';

session_start(); // Iniciar o continuar la sesión existente

$sender = $_SESSION['user_id']; // Obtener el ID del remitente desde la sesión

// Recibir los datos del mensaje y el destinatario
$data = json_decode(file_get_contents('php://input'), true);
$recipient = $data['recipient'];
$messageText = $data['text'];

// Insertar el mensaje en la base de datos
$query = "INSERT INTO Mensajes (remitente, destinatario, mensaje) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("iis", $sender, $recipient, $messageText);
$stmt->execute();

// Devolver una respuesta
echo json_encode(array("success" => true));
