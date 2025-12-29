<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Detectar entorno (producción vs desarrollo)
$isProduction = isset($_SERVER['HTTP_HOST']) &&
    (strpos($_SERVER['HTTP_HOST'], 'hostinger') !== false ||
        strpos($_SERVER['HTTP_HOST'], 'uvenergiasolar.com') !== false);

if ($isProduction) {
    // ⚠️ PRODUCCIÓN - Cargar configuración desde archivo local (NO en Git)
    $localConfig = __DIR__ . '/Config.local.php';
    if (file_exists($localConfig)) {
        require_once $localConfig;
    } else {
        die('Error: Archivo de configuración de producción no encontrado. 
             Por favor crea Config/Config.local.php en el servidor.');
    }
} else {
    // ✅ DESARROLLO LOCAL (Laragon)
    define('BASE_URL', "http://localhost/uvenergiasolar/");
    define('DB_HOST', "localhost");
    define('DB_NAME', "uvenergiasolar");
    define('DB_USER', "root");
    define('DB_PASSWORD', "");
    define('DB_CHARSET', 'utf8');
}

// Establecer la zona horaria por defecto para Argentina (Tucumán)
date_default_timezone_set('America/Argentina/Tucuman');

// Delimitadores y moneda
const SPD = ","; // Separador decimal
const SPM = "."; // Separador de miles
const SMONEY = "ARS"; // Símbolo de moneda
?>