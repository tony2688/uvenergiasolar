<?php

// Definición de la clase Home que hereda de la clase Controllers
class Home extends Controllers
{

    // Constructor de la clase Home
    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre Controllers
    }

    // Método home que maneja la lógica para la página de inicio
    public function home()
    {
        // Asigna datos a un array para pasar a la vista
        $data['page_id'] = 1;
        $data['page_tag'] = "Home";
        $data['page_title'] = "UV Energía Solar | Soluciones Sustentables en Tucumán";
        $data['page_name'] = "home";

        // MEJORA SEO: Descripción profesional para la portada
        $data['page_description'] = "Líderes en energía solar en Tucumán y Argentina. Venta e instalación de paneles solares, termotanques y soluciones de eficiencia energética para hogares y empresas.";

        // Texto corregido (Adiós Lorem Ipsum)
        $data['page_content'] = "Bienvenido a UV Energía Solar, tu aliado en la transición hacia un futuro energético sustentable.";

        // Carga la vista 'home' y pasa los datos previamente definidos
        $this->views->getView($this, "home", $data);
    }
}