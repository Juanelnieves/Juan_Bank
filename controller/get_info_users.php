<?php
include_once 'conexion.php';

header('Content-Type: application/json');

session_start();
$_SESSION['es_admin'] = true;

$sql = "SELECT * FROM Usuarios";
$result = $conn->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    array_push($users, $row);
}

echo json_encode($users);
$conn->close();
?>
