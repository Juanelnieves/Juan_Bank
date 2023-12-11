<?php
include_once 'conexion.php';

$query = "SELECT id, nombre FROM Usuarios";
$result = $conn->query($query);

$users = array();
while ($row = $result->fetch_assoc()) {
    $users[] = array('id' => $row['id'], 'name' => $row['nombre']);
}

echo json_encode($users);
?>