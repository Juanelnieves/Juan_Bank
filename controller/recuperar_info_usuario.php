<?php
session_start();
include_once 'conexion.php'; // Asegúrate de que este archivo gestiona la conexión a la base de datos.

// Comprueba si el ID del usuario está establecido en la sesión
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    // Si no hay ID de usuario en la sesión, manejar el caso como no iniciado sesión
    echo "Por favor, inicie sesión.";
    exit;
}

// Consulta a la base de datos para obtener los datos del usuario
$stmt = $conn->prepare("SELECT dni, email, fecha_nacimiento, direccion, codigo_postal, ciudad, provincia, pais, foto FROM Usuarios WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
if ($usuario = $result->fetch_assoc()) {
    // Asignar datos a variables
    $dniActual = $usuario['dni'];
    $emailActual = $usuario['email'];
    $direccionActual = $usuario['direccion'];
    $codigo_postalActual = $usuario['codigo_postal'];
    $ciudadActual = $usuario['ciudad'];
    $provinciaActual = $usuario['provincia'];
    $paisActual = $usuario['pais'];
    $fechaNacimientoActual = $usuario['fecha_nacimiento'];
    $fotoPerfilActual = $usuario['foto'];
}
$stmt->close();
?>
