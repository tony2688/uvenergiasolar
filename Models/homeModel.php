<?php

// Definición de la clase HomeModel que extiende de la clase Mysql (modelo base de conexión a la BD)
class HomeModel extends Mysql
{
    // Constructor de la clase HomeModel
    public function __construct()
    {
        // Llama al constructor de la clase padre (Mysql), asegurando la conexión con la base de datos
        parent::__construct();
    }
}
