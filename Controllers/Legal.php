<?php

// Definición de la clase Legal que hereda de la clase Controllers
class Legal extends Controllers
{

    // Constructor de la clase Legal
    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre Controllers
    }

    // Método para mostrar la política de privacidad
    public function politica()
    {
        $data['page_title'] = 'Política de Privacidad'; // Asigna el título de la página
        $this->views->getView($this, 'politica', $data); // Llama a la vista 'politica' y pasa los datos
    }

    // Método para mostrar los términos de servicio
    public function terminos()
    {
        $data['page_title'] = 'Términos de Servicio'; // Asigna el título de la página
        $this->views->getView($this, 'terminos', $data); // Llama a la vista 'terminos' y pasa los datos
    }
}
