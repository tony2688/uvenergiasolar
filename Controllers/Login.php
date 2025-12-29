<?php

// Definición de la clase Login que hereda de la clase Controllers
class Login extends Controllers
{

    // Constructor de la clase Login
    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre Controllers
    }

    // Método home para redirigir al usuario
    public function home()
    {
        // Redirigir a la función login del controlador Usuarios
        header("Location: " . base_url() . "usuarios/login"); // Utiliza la función base_url() para redirigir al login
        exit; // Detiene la ejecución del script después de redirigir
    }
}
