<?php
session_start();
include_once 'conexion.php'; 
include_once 'iban_controlador.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);

    // Generar el IBAN basado en el nombre del usuario
    $iban = generarIBAN($nombre);
    // Verificar y modificar el IBAN para asegurar su unicidad
    $ibanUnico = verificarYModificarIBAN($conn, $iban);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $dni = $_POST['dni'];

    // Verificar si las contraseñas coinciden.
    if ($password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }

    // Verificar si el correo electrónico ya existe en la base de datos.
    $sql = "SELECT id FROM Usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Este correo electrónico ya está registrado.";
    } else {
        // Hashear la contraseña antes de guardarla en la base de datos.
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Preparar la consulta para insertar el nuevo usuario.
        $sql = "INSERT INTO Usuarios (nombre, apellido, dni, email, contrasena, iban) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Vincular los parámetros y ejecutar la consulta.
            $stmt->bind_param("ssssss", $nombre, $apellido, $dni, $email, $passwordHash, $ibanUnico);
            if ($stmt->execute()) {
                // Registro exitoso, redirigir al login
                header("Location: ../view/login.php"); 
                exit();
            } else {
                echo "Algo salió mal al intentar registrar el usuario.";
            }
        } else {
            echo "Algo salió mal al preparar la consulta.";
        }

        // Cerrar la declaración y la conexión.
        $stmt->close();
    }
    $conn->close();
}
?>
