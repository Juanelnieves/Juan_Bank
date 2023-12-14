<?php
session_start();
include_once 'conexion.php';

$userId = $_SESSION['user_id'];
$cantidad = $_POST['loanAmount'];
$motivo = $_POST['loanReason'];


// Verificar si el usuario tiene préstamos pendientes o aprobados
$sql = "SELECT COUNT(*) AS total_loans FROM Prestamos WHERE id_usuario = ? AND (estado = 'pendiente' OR estado = 'aprobado')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['total_loans'] > 0) {
    echo json_encode(["message" => "Ya tienes un préstamo pendiente o aprobado.", "status" => "error"]);
    $stmt->close();
    $conn->close();
    exit();
}

// Verificar la edad y el saldo del usuario
if (!cumpleConLosRequisitos($userId, $cantidad, $conn)) {
    echo json_encode(["message" => "No cumples con los requisitos para solicitar un préstamo..", "status" => "error"]);
    $stmt->close();
    $conn->close();
    exit();
}

// Insertar solicitud de préstamo
$sql = "INSERT INTO Prestamos (id_usuario, cantidad, motivo, estado) VALUES (?, ?, ?, 'pendiente')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ids", $userId, $cantidad, $motivo);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(["message" => "Solicitud de préstamo enviada para aprobación.", "status" => "success"]);
} else {
    echo json_encode(["message" => "Error al enviar la solicitud de préstamo.", "status" => "error"]);
}

$stmt->close();
$conn->close();

function cumpleConLosRequisitos($userId, $cantidadSolicitada, $conexion)
{
    $sql = "SELECT fecha_nacimiento, saldo FROM Usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    $edad = (new DateTime())->diff(new DateTime($usuario['fecha_nacimiento']))->y;
    $saldoMinimo = $cantidadSolicitada * 0.15;

    return $edad >= 18 && $usuario['saldo'] >= $saldoMinimo;
}
