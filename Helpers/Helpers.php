<?php
function base_url() // Función para obtener la URL base del proyecto
{
    return BASE_URL;
}

// Función para imprimir arrays o variables en formato legible (debug)
function dep($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

// Función para limpiar cadenas de texto (evita inyecciones o scripts maliciosos)
function strClean($strCadena)
{
    // Reemplaza múltiples espacios por uno solo y elimina espacios al inicio/final
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strCadena);

    // Aplica trim, elimina slashes y convierte caracteres especiales
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');

    // Lista de palabras peligrosas o scripts para eliminar
    $bad = ["<script>", "</script>", "SELECT * FROM", "DELETE FROM", "INSERT INTO", "DROP TABLE", "OR '1'='1", 'OR "1"="1"', "--"];

    // Reemplaza cualquier ocurrencia de elementos peligrosos por cadena vacía
    $string = str_ireplace($bad, "", $string);
    return $string;
}

// Generador de contraseñas aleatorias
function passGenerator($length = 10)
{
    $pass = "";

    // Conjunto de caracteres permitidos
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";

    // Genera una contraseña de la longitud especificada
    for ($i = 1; $i <= $length; $i++) {
        $pass .= $cadena[rand(0, strlen($cadena) - 1)];
    }
    return $pass;
}

// Generador de token único (ej: para recuperación de contraseña o validaciones)
function token()
{
    return bin2hex(random_bytes(10)) . '-' . bin2hex(random_bytes(10)) . '-' . bin2hex(random_bytes(10)) . '-' . bin2hex(random_bytes(10));
}

// Da formato a valores numéricos como moneda
function formatMoney($cantidad)
{
    return number_format($cantidad, 2, SPD, SPM); // SPD y SPM deben estar definidos como constantes (ej: . y ,)
}

// Función para incluir el archivo de header en las vistas del admin
function headerAdmin($data)
{
    require_once("Views/Templates/header.php");
}

// Función para incluir el archivo de footer en las vistas del admin
function footerAdmin($data)
{
    require_once("Views/Templates/footer.php");
}