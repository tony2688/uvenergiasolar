<?php

// Definición de la clase Calcular que hereda de la clase Controllers
class Calcular extends Controllers
{

    // Constructor de la clase Calcular
    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre Controllers
    }

    // Método principal que se ejecuta al entrar a la URL /calcular
    public function home()
    {
        // Asignación de valores a los datos que se pasarán a la vista
        $data['page_id'] = 10;
        $data['page_tag'] = "Calculadora Solar";
        $data['page_title'] = "Calculadora de Energía Solar | UV Energía Solar";
        $data['page_name'] = "calculadora";

        // MEJORA SEO: Descripción específica para esta página
        $data['page_description'] = "Calculá gratis tu consumo eléctrico y descubrí cuántos paneles solares necesitás para tu hogar o empresa en Argentina.";

        // Contenido adicional si lo usas en la vista
        $data['page_content'] = "Calculá fácilmente tu consumo energético y dimensioná tu sistema solar.";

        // Carga la vista "Calcular/calcular" pasando los datos a la vista
        $this->views->getView($this, "Calcular/calcular", $data);
    }
}