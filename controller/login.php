<?php
session_start();

// Incluir archivo de conexión a la base de datos
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Modificar la consulta para obtener el rol del usuario
        $sql = "SELECT id, nombre, contrasena, es_admin FROM Usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['contrasena'])) {
                // Almacenar datos del usuario en la sesión
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['nombre'];

                // Redireccionar al usuario según su rol
                if ($row['es_admin']) {
                    header("Location: ../view/admin_dashboard.php");
                } else {
                    header("Location: ../view/dashboard.php");
                }
                exit();
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
