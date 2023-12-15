<?php
session_start();
include_once 'conexion.php'; // Asegúrate de que este archivo gestiona la conexión a la base de datos.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id']) && isset($_POST['currency'])) {
    $userId = $_SESSION['user_id'];
    $newCurrency = $_POST['currency'];

    // Actualizar la moneda preferida en la base de datos
    $sql = "UPDATE Usuarios SET moneda_preferida = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newCurrency, $userId);

    if ($stmt->execute()) {
        // Obtener el saldo actual del usuario en la nueva moneda
        $convertedBalance = getConvertedBalance($userId, $newCurrency);

        echo $convertedBalance . " " . $newCurrency;
    } else {
        echo "Error al cambiar la moneda.";
    }

    $stmt->close();
} else {
    echo "Solicitud no válida.";
}

$conn->close();

// Función para obtener el saldo convertido
function getConvertedBalance($userId, $currency) {
    // Conexión a la base de datos
    global $conn;

    // Obtener el saldo del usuario en su moneda actual
    $sql = "SELECT saldo, moneda_preferida FROM Usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $currentBalance = $row['saldo'];
        $currentCurrency = $row['moneda_preferida'];
        $convertedBalance = convertCurrency($currentBalance, $currentCurrency, $currency);

        return $convertedBalance;
    } else {
        return "Error al obtener el saldo.";
    }
}

function convertCurrency($amount, $fromCurrency, $toCurrency) {
    
    return $amount; // Valor de ejemplo
}
?>
