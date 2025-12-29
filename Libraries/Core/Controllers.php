<?php

// Definición de la clase base Controllers
class Controllers
{
    // Propiedad protegida para manejar la vista
    protected Views $views;

    // Propiedad protegida para almacenar el modelo asociado
    protected $model;

    // Constructor de la clase base Controllers
    public function __construct()
    {
        // Se crea una nueva instancia de la clase Views
        $this->views = new Views();

        // Se carga el modelo correspondiente al controlador actual
        $this->loadModel();
    }

    // Método para cargar el modelo asociado al controlador
    public function loadModel()
    {
        // Obtiene el nombre de la clase actual (por ejemplo, Producto)
        // y le concatena "Model" para buscar su modelo (ProductoModel)
        $model = get_class($this) . "Model";

        // Construye la ruta al archivo del modelo (ej: Models/ProductoModel.php)
        $routClass = "Models/" . $model . ".php";

        // Verifica si el archivo del modelo existe
        if (file_exists($routClass)) {
            // Lo incluye
            require_once($routClass);

            // Crea una instancia del modelo y la asigna a la propiedad $model
            $this->model = new $model();
        }
    }
}
