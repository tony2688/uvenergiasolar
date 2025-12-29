<?php

// Definición de la clase Proyectos que hereda de la clase Controllers
class Proyectos extends Controllers
{

    // Constructor de la clase Proyectos
    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre Controllers
    }

    // Método por defecto cuando accedés a /proyectos
    public function home()
    {
        $this->index(); // redirecciona al método principal
    }

    // Método principal
    public function index()
    {
        $this->proyectos(); // Llama al método que gestiona la vista de proyectos
    }

    // Vista de gestión de proyectos
    public function proyectos()
    {
        // Definir los datos para la vista de proyectos
        $data['page_id'] = 5;
        $data['page_tag'] = "Proyectos"; // Etiqueta de la página
        $data['page_title'] = "Gestión de Proyectos"; // Título de la página
        $data['page_name'] = "proyectos"; // Nombre de la página (usado en el body o en el encabezado)
        $data['page_content'] = "Administración de proyectos de energía solar"; // Descripción o contenido de la página

        // Llamar a la vista correspondiente con los datos
        $this->views->getView($this, "Proyectos/proyectos", $data);
    }

    // Vista para crear un nuevo proyecto
    public function nuevo()
    {
        // Definir los datos para la vista de crear nuevo proyecto
        $data['page_id'] = 6;
        $data['page_tag'] = "Nuevo Proyecto"; // Etiqueta de la página
        $data['page_title'] = "Crear Proyecto"; // Título de la página
        $data['page_name'] = "nuevo_proyecto"; // Nombre de la página
        // Llamar a la vista correspondiente para crear un nuevo proyecto
        $this->views->getView($this, "Proyectos/nuevo", $data);
    }

    // Vista para la calculadora solar
    public function calcular()
    {
        // Definir los datos para la vista de la calculadora solar
        $data['page_id'] = 7;
        $data['page_tag'] = "Calculadora Solar"; // Etiqueta de la página
        $data['page_title'] = "Calculadora de Energía Solar"; // Título de la página
        $data['page_name'] = "calculadora"; // Nombre de la página
        // Llamar a la vista correspondiente para mostrar la calculadora solar
        $this->views->getView($this, "Proyectos/calcular", $data);
    }

    // Vista para el detalle de un proyecto
    public function detalle($idproyecto)
    {
        // Definir los datos para la vista de detalle de proyecto
        $data['page_id'] = 8;
        $data['page_tag'] = "Detalle de Proyecto"; // Etiqueta de la página
        $data['page_title'] = "Detalle de Proyecto"; // Título de la página
        $data['page_name'] = "detalle_proyecto"; // Nombre de la página
        $data['idproyecto'] = $idproyecto; // ID del proyecto que se está detallando
        // Llamar a la vista correspondiente para mostrar el detalle de un proyecto
        $this->views->getView($this, "Proyectos/detalle", $data);
    }
}
