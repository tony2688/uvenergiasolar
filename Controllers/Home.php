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
        $data['page_id'] = 1; // ID de la página (en este caso 1)
        $data['page_tag'] = "Home"; // Etiqueta de la página (en este caso "Home")
        $data['page_title'] = "Pagina principal"; // Título de la página
        $data['page_name'] = "home"; // Nombre de la página
        $data['page_content'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut quo consectetur ab corrupti quia sint reprehenderit repellat qui culpa, tempora minus porro neque quidem vel necessitatibus blanditiis id temporibus cupiditate?;"; // Contenido de la página (texto de ejemplo)

        // Carga la vista 'home' y pasa los datos previamente definidos
        $this->views->getView($this, "home", $data); // Muestra la vista 'home' con los datos asignados
    }
}
