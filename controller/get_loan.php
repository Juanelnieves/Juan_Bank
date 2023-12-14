<?php
include_once 'conexion.php';

$sql = "SELECT * FROM Prestamos WHERE estado = 'pendiente'";
$result = $conn->query($sql);

$requests = [];
while ($row = $result->fetch_assoc()) {
    array_push($requests, $row);
}

echo json_encode($requests);
$conn->close();
?>
