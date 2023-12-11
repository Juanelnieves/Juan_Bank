<?php
include_once 'conexion.php'; // Asegúrate de que este script conecta correctamente a tu base de datos

session_start(); // Iniciar o continuar la sesión existente

// Asumiendo que el ID del usuario actual está almacenado en $_SESSION['user_id']
$userId = $_SESSION['user_id']; // Obtener el ID del usuario actual desde la sesión

// Consulta para obtener los mensajes
$query = "SELECT Mensajes.id, remitente, destinatario, mensaje, Usuarios.nombre as nombre_remitente
          FROM Mensajes
          INNER JOIN Usuarios ON Mensajes.remitente = Usuarios.id
          WHERE destinatario = ? OR remitente = ?
          ORDER BY Mensajes.id DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $userId, $userId);
$stmt->execute();
$result = $stmt->get_result();

$messages = array();
while ($row = $result->fetch_assoc()) {
    $messages[] = array(
        'id' => $row['id'],
        'sender' => $row['nombre_remitente'],
        'text' => $row['mensaje']
    );
}

echo json_encode($messages);
?>
