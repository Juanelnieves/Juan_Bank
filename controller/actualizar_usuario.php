<?php
include_once 'conexion.php';
session_start();

// Comprueba si el ID del usuario está establecido en la sesión
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    // Si no hay ID de usuario en la sesión, manejar el caso como no iniciado sesión
    echo "Por favor, inicie sesión.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Inicializar consulta SQL y arreglo de parámetros
    $query = "UPDATE Usuarios SET ";
    $params = [];
    $types = "";

    // Función para agregar parámetros a la consulta
    function addParam(&$query, &$params, &$types, $input, $type, $postField) {
        if (isset($_POST[$postField]) && !empty($_POST[$postField])) {
            $query .= "$input = ?, ";
            $params[] = &$_POST[$postField];
            $types .= $type;
        }
    }

    // Agregar parámetros según los campos enviados
    addParam($query, $params, $types, "dni", "s", "dni");
    addParam($query, $params, $types, "email", "s", "email");
    addParam($query, $params, $types, "direccion", "s", "direccion");
    addParam($query, $params, $types, "codigo_postal", "s", "codigoPostal");
    addParam($query, $params, $types, "ciudad", "s", "ciudad");
    addParam($query, $params, $types, "provincia", "s", "provincia");
    addParam($query, $params, $types, "pais", "s", "pais");
    addParam($query, $params, $types, "fecha_nacimiento", "s", "fechaNacimiento");

    // Procesar foto de perfil si se ha subido una nueva
    if (isset($_FILES['userPhoto']) && $_FILES['userPhoto']['error'] == UPLOAD_ERR_OK) {
        if ($_FILES['userPhoto']['size'] > 10000000) { // Límite de 10MB
            echo "El archivo es demasiado grande.";
            exit;
        }
        $uploadDir = '../img/';
        $fileName = time() . "_" . basename($_FILES['userPhoto']['name']);
        $uploadFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['userPhoto']['tmp_name'], $uploadFile)) {
            $query .= "foto = ?, ";
            $params[] = &$uploadFile;
            $types .= "s";
        } else {
            echo "Error al subir la foto.";
            exit;
        }
    }

    // Finalizar la construcción de la consulta
    $query = rtrim($query, ", ") . " WHERE id = ?";
    $params[] = &$userId;
    $types .= "i";

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($query);
    call_user_func_array([$stmt, 'bind_param'], array_merge([$types], $params));
    if ($stmt->execute()) {
        header("Location: ../view/configuracion.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }
    $stmt->close();
}
?>
