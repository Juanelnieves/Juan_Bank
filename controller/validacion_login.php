<?php
include_once 'conexion.php'; 

session_start(); // Iniciar sesión para manejar la autenticación

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Buscar el usuario en la base de datos y verificar la contraseña
    $sql = "SELECT id, contraseña FROM Usuarios WHERE nombre = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['contraseña'])) { // Asumiendo que usas password_hash() para almacenar contraseñas
            // Autenticación exitosa
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            // Redirigir a la página de inicio
            header("location: dashboard.php");
        } else {
            // Error de autenticación
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
    $conn->close();
}
?>
