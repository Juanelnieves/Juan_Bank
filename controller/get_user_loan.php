<?php
session_start();
include_once 'conexion.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $sql = "SELECT * FROM Prestamos WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $prestamos = [];
    while ($row = $result->fetch_assoc()) {
        array_push($prestamos, $row);
    }

    echo json_encode($prestamos);
} else {
    echo json_encode([]);
}

$conn->close();
?>
