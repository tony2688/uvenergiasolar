<?php

// Definición de la clase Errors que hereda de la clase Controllers
class Errors extends Controllers
{

    // Constructor de la clase Errors
    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre Controllers
    }

    // Método notFound que se ejecuta cuando se llama a la página no encontrada
    public function notFound()
    {
        // Carga la vista de error pasando el objeto actual $this
        $this->views->getView($this, "error"); // Muestra la vista de error
    }
}

// Instancia de la clase Errors para manejar el error
$notFound = new Errors();
// Llamada al método notFound para mostrar la vista de error
$notFound->notFound();
