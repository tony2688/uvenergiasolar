<?php
// Mostrar errores en desarrollo (desactivar en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inicia la sesión si aún no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Requiere el archivo de configuración global (define constantes como BASE_URL, DB info, etc.)
require_once("Config/Config.php");

// Requiere funciones auxiliares personalizadas del proyecto
require_once("Helpers/Helpers.php");

// Obtiene la URL desde el parámetro GET y la sanitiza, o por defecto carga 'home/home'
$url = !empty($_GET['url']) ? filter_var($_GET['url'], FILTER_SANITIZE_URL) : 'home/home';

// Divide la URL en partes (controlador, método y posibles parámetros)
$arrUrl = explode("/", $url);

// Convierte el nombre del controlador para que coincida con el formato de clases (por ej: Home → Home.php)
$controller = ucwords($arrUrl[0]);

// Si se especifica un método, lo asigna; si no, carga el método 'home' por defecto
$method = isset($arrUrl[1]) ? $arrUrl[1] : 'home';

// Inicializa variable de parámetros
$params = "";

// Si hay parámetros adicionales en la URL, los concatena separados por coma
if (!empty($arrUrl[2])) {
    for ($i = 2; $i < count($arrUrl); $i++) {
        $params .= $arrUrl[$i] . ",";
    }
    // Elimina la coma final
    $params = trim($params, ",");
}

// Carga automática de clases del core (como Controlador base, Modelo, etc.)
// Debug URL routing
$controller_file = "Controllers/" . $controller . ".php";
if (!file_exists($controller_file)) {
    $controller = "Errors";  // Default error controller (corregido de "Error" a "Errors")
    $method = "notFound";
}

// Load controller
require_once("Libraries/Core/Autoload.php");
require_once("Libraries/Core/Load.php");