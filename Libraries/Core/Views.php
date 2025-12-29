<?php

// Definición de la clase Views
class Views
{
    // Método para obtener y cargar una vista
    public function getView($controller, $view, $data = '')
    {
        // Obtiene el nombre del controlador como texto, incluso si se pasa como objeto
        $controllerName = is_object($controller) ? get_class($controller) : $controller;

        // Si el nombre de la vista contiene una barra (ej: "Proyectos/proyectos"), indica una subcarpeta y se usa directamente
        if (str_contains($view, '/')) {
            $viewPath = "Views/" . $view . ".php";
        }
        // Si el controlador es "Home", se carga la vista directamente desde /Views (sin subcarpeta)
        else if (strtolower($controllerName) == "home") {
            $viewPath = "Views/" . $view . ".php";
        }
        // En cualquier otro caso, busca la vista en una carpeta con el nombre del controlador
        else {
            $viewPath = "Views/" . $controllerName . "/" . $view . ".php";
        }

        // Verifica si el archivo de la vista existe
        if (file_exists($viewPath)) {
            // Si existe, lo incluye
            require_once($viewPath);
        } else {
            // Si no existe, muestra un mensaje de error en rojo
            echo "<h1 style='color:red;'>Error: La vista <code>$viewPath</code> no existe.</h1>";
        }
    }
}
