<?php
// Cargar el archivo del controlador
$controllerfile = "Controllers/" . $controller . ".php";

// Verifica si el archivo del controlador existe
if (file_exists("Controllers/" . $controller . ".php")) {
    // Incluye el archivo del controlador correspondiente
    require_once("Controllers/" . $controller . ".php");

    // Crea una instancia del controlador
    $controller = new $controller();

    // Verifica si el método solicitado existe dentro del controlador
    if (method_exists($controller, $method)) {
        // Llama al método del controlador y le pasa los parámetros
        $controller->{$method}($params);
    } else {
        // Si el método no existe, se carga el controlador de error
        require_once("Controllers/Error.php");
    }
} else {
    // Si el archivo del controlador no existe, se carga el controlador de error
    require_once("Controllers/Error.php");
}
