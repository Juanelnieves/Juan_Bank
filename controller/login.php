<?php
session_start();

// Incluir archivo de conexión a la base de datos
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Preparar y ejecutar consulta
        $sql = "SELECT id, contrasena FROM Usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['contrasena'])) {
                $_SESSION['user_id'] = $row['id'];
                // Redireccionar a la página del usuario
                header("Location: ../view/dashboard.php");
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "Usuario no encontrado";
        }

        $stmt->close();
    } else {
        echo "Email o contraseña no proporcionados";
    }
    $conn->close();
}
?>
