<?php 
function letraABinario($letra) {
    $alfabeto = range('a', 'z');
    $posicion = array_search(strtolower($letra), $alfabeto);
    return str_pad(decbin($posicion + 1), 5, "0", STR_PAD_LEFT);
}

function generarIBAN($nombre) {
    $nombre = strtolower($nombre);
    $iban = "";

    // Asegurarse de que el nombre tenga al menos 4 caracteres
    $nombreRelleno = str_pad($nombre, 4, "z");

    // Convertir las primeras cuatro letras a binario
    for ($i = 0; $i < 4; $i++) {
        $iban .= letraABinario($nombreRelleno[$i]);
    }

    return $iban;
}

function verificarYModificarIBAN($conexion, $iban) {
    $ibanOriginal = $iban;
    $contador = 0;

    while (true) {
        $consulta = $conexion->prepare("SELECT COUNT(*) FROM Usuarios WHERE iban = ?");
        $consulta->bind_param("s", $iban);
        $consulta->execute();
        $resultado = $consulta->get_result()->fetch_row();

        if ($resultado[0] == 0) { // Si no hay coincidencias, el IBAN es único
            return $iban;
        }

        // Modificar el IBAN agregando "1" o "0"
        $iban = $ibanOriginal . str_repeat(($contador % 2 == 0) ? "1" : "0", floor($contador / 2) + 1);
        $contador++;
    }
}

?>