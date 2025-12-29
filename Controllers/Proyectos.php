<?php

class Proyectos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    // ==========================================
    // Método home
    // ==========================================
    // Este es el método que busca el sistema por defecto cuando entras a /proyectos
    public function home()
    {
        $this->proyectos(); // Redirige a la función principal
    }

    // Método index (por si se llama explícitamente)
    public function index()
    {
        $this->proyectos();
    }

    // Método principal que carga la vista con la lista de proyectos
    public function proyectos()
    {
        $data['page_id'] = 5;
        $data['page_tag'] = "Proyectos";
        $data['page_title'] = "Nuestros Proyectos | UV Energía Solar";
        $data['page_name'] = "proyectos";
        $data['page_description'] = "Galería de instalaciones de paneles solares en Tucumán. Proyectos residenciales, comerciales y rurales.";

        // --- DATOS DE PROYECTOS (Simulación de BD) ---
        // Estos datos alimentan la vista moderna que creamos
        $data['proyectos_list'] = [
            [
                'titulo' => 'Residencial - Concepción',
                'img' => 'imagen5.jpg',
                'desc' => 'Sistema de 5kW para una vivienda unifamiliar, logrando un ahorro del 60% en la factura eléctrica.',
                'categoria' => 'Residencial'
            ],
            [
                'titulo' => 'Gastronómico - El Cadillal',
                'img' => 'imagen8.jpg',
                'desc' => 'Instalación de 12kW en local gastronómico turístico. Energía limpia para potenciar el turismo.',
                'categoria' => 'Comercial'
            ],
            [
                'titulo' => 'Industria Textil - Tucumán',
                'img' => 'imagen7.jpg',
                'desc' => 'Planta solar industrial de 25kW. Reducción de huella de carbono y costos fijos.',
                'categoria' => 'Industrial'
            ],
            [
                'titulo' => 'Rural - El Mollar',
                'img' => 'imagen9.jpg',
                'desc' => 'Sistema Off-Grid de respaldo para zona rural sin acceso estable a la red eléctrica.',
                'categoria' => 'Rural'
            ],
            [
                'titulo' => 'Bombeo Solar - Banda del Río Salí',
                'img' => 'imagen22.jpg',
                'desc' => 'Inversores trifásicos para alimentación de bombas de riego. Eficiencia para el agro.',
                'categoria' => 'Agro'
            ],
            [
                'titulo' => 'Autonomía Total - Aguilares',
                'img' => 'imagen11.jpg',
                'desc' => 'Fábrica con autonomía energética gracias a un banco de baterías de litio de última generación.',
                'categoria' => 'Industrial'
            ],
            [
                'titulo' => 'Residencial Premium - Yerba Buena',
                'img' => 'imagen12.jpg',
                'desc' => 'Instalación híbrida con baterías para asegurar energía 24/7 ante cortes de luz.',
                'categoria' => 'Residencial'
            ],
            [
                'titulo' => 'Riego Agrícola - Valles Calchaquíes',
                'img' => 'imagen19.jpg',
                'desc' => 'Paneles solares dedicados exclusivamente al sistema de riego por goteo.',
                'categoria' => 'Agro'
            ],
            [
                'titulo' => 'Edificio Sustentable - Barrio Norte',
                'img' => 'imagen21.jpg',
                'desc' => 'Primer edificio de la zona alimentado parcialmente con energía solar en espacios comunes.',
                'categoria' => 'Urbano'
            ]
        ];

        // Carga la vista pasando los datos
        $this->views->getView($this, "Proyectos/proyectos", $data);
    }

    // Vista para crear un nuevo proyecto (Panel Admin)
    public function nuevo()
    {
        $data['page_id'] = 6;
        $data['page_tag'] = "Nuevo Proyecto";
        $data['page_title'] = "Crear Proyecto | Admin";
        $data['page_name'] = "nuevo_proyecto";

        $this->views->getView($this, "Proyectos/nuevo", $data);
    }

    // Vista para el detalle de un proyecto específico
    public function detalle($idproyecto)
    {
        $data['page_id'] = 8;
        $data['page_tag'] = "Detalle de Proyecto";
        $data['page_title'] = "Detalle de Proyecto";
        $data['page_name'] = "detalle_proyecto";
        $data['idproyecto'] = $idproyecto;

        $this->views->getView($this, "Proyectos/detalle", $data);
    }
}