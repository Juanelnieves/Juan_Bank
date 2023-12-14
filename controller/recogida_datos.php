<?php
session_start();
include_once 'conexion.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Inicializa variables para almacenar los datos del usuario
$userName = "";
$userApellido = "";
$userEmail = "";
$userDireccion = "";
$userCiudad = "";
$userProvincia = "";
$userPais = "";
$userSaldo = "";
$iban = "";


$sql = "SELECT nombre, apellido, email, direccion, ciudad, provincia, pais, iban, saldo FROM Usuarios WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $userName = $row['nombre'];
        $userApellido = $row['apellido'];
        $userEmail = $row['email'];
        $userDireccion = $row['direccion'];
        $userCiudad = $row['ciudad'];
        $userProvincia = $row['provincia'];
        $userPais = $row['pais'];
        $iban = $row['iban'];
        $userSaldo = $row['saldo'];
    }
    $stmt->close();
}
$conn->close();
?>
