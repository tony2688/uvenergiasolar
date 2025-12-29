<?php
// Definición de la clase Aprende que hereda de la clase Controllers
class Aprende extends Controllers
{
    // Constructor de la clase Aprende
    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre Controllers
    }

    // Este método se ejecuta cuando entras a la URL /aprende
    public function index()
    {
        // Redirige al método mostrar para mantener consistencia con otros controladores
        $this->mostrar();
    }
    
    // Este método se ejecuta cuando se accede a /aprende/aprende
    public function aprende()
    {
        // Redirige al método mostrar para mantener consistencia
        $this->mostrar();
    }
    
    // Este método se ejecuta cuando se accede a /aprende/home (por consistencia con otros controladores)
    public function home()
    {
        // Redirige al método mostrar
        $this->mostrar();
    }
    
    // Método principal para mostrar la página de aprendizaje
    public function mostrar()
    {
        // Asigna valores a los datos que se pasarán a la vista
        $data['page_id'] = 7; // ID de la página
        $data['page_tag'] = "Aprende"; // Etiqueta de la página
        $data['page_title'] = "Aprende sobre Energía Solar"; // Título de la página
        $data['page_name'] = "aprende"; // Nombre de la página
        $data['page_content'] = "Información educativa sobre energía solar y sistemas fotovoltaicos"; // Contenido descriptivo de la página

        // Carga la vista "aprende" pasando los datos a la vista
        $this->views->getView($this, "Aprende/aprende", $data);
    }
}