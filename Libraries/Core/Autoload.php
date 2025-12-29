<?php
// Función para cargar automáticamente las clases requeridas usando spl_autoload_register
spl_autoload_register(function ($class) {

    // Verifica si el archivo de la clase existe dentro del directorio Libraries/Core
    if (file_exists("Libraries/" . "Core/" . $class . ".php")) {

        // Si el archivo existe, se incluye automáticamente
        require_once("Libraries/" . "Core/" . $class . ".php");
    }
});
