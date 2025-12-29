<?php

// Definición de la clase ProyectosModel que extiende de la clase Mysql
class ProyectosModel extends Mysql
{

    // Propiedades privadas del modelo (coinciden con las columnas de la tabla)
    private $intIdProyecto;
    private $strNombre;
    private $strDescripcion;
    private $strUbicacion;
    private $intClienteId;
    private $fltPotencia;
    private $fltPresupuesto;
    private $strFechaInicio;
    private $strFechaFin;
    private $intStatus;

    // Constructor: ejecuta el constructor del modelo base (Mysql)
    public function __construct()
    {
        parent::__construct();
    }

    // Método para insertar un nuevo proyecto
    public function insertProyecto(string $nombre, string $descripcion, string $ubicacion, int $clienteid, float $potencia, float $presupuesto, string $fechainicio, string $fechafin, int $status)
    {
        // Asignación de datos a las propiedades del modelo
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strUbicacion = $ubicacion;
        $this->intClienteId = $clienteid;
        $this->fltPotencia = $potencia;
        $this->fltPresupuesto = $presupuesto;
        $this->strFechaInicio = $fechainicio;
        $this->strFechaFin = $fechafin;
        $this->intStatus = $status;

        // Consulta SQL de inserción
        $query_insert = "INSERT INTO proyectos(nombre, descripcion, ubicacion, cliente_id, potencia, presupuesto, fecha_inicio, fecha_fin, status) VALUES(?,?,?,?,?,?,?,?,?)";

        // Array de datos a insertar
        $arrData = array($this->strNombre, $this->strDescripcion, $this->strUbicacion, $this->intClienteId, $this->fltPotencia, $this->fltPresupuesto, $this->strFechaInicio, $this->strFechaFin, $this->intStatus);

        // Ejecutar inserción y devolver ID generado
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }

    // Método para obtener todos los proyectos (activos)
    public function selectProyectos()
    {
        $sql = "SELECT p.id, p.nombre, p.ubicacion, p.potencia, p.presupuesto, p.fecha_inicio, p.fecha_fin, p.status, 
                       u.nombres, u.apellidos 
                FROM proyectos p 
                INNER JOIN usuarios u ON p.cliente_id = u.idusuario 
                WHERE p.status != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    // Método para obtener un proyecto específico por ID
    public function selectProyecto(int $idproyecto)
    {
        $this->intIdProyecto = $idproyecto;

        $sql = "SELECT p.id, p.nombre, p.descripcion, p.ubicacion, p.cliente_id, p.potencia, p.presupuesto, 
                       p.fecha_inicio, p.fecha_fin, p.status, 
                       u.nombres, u.apellidos, u.email 
                FROM proyectos p 
                INNER JOIN usuarios u ON p.cliente_id = u.idusuario 
                WHERE p.id = $this->intIdProyecto";
        $request = $this->select($sql);
        return $request;
    }

    // Método para actualizar un proyecto existente
    public function updateProyecto(int $idproyecto, string $nombre, string $descripcion, string $ubicacion, int $clienteid, float $potencia, float $presupuesto, string $fechainicio, string $fechafin, int $status)
    {
        // Asignación de nuevos valores
        $this->intIdProyecto = $idproyecto;
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strUbicacion = $ubicacion;
        $this->intClienteId = $clienteid;
        $this->fltPotencia = $potencia;
        $this->fltPresupuesto = $presupuesto;
        $this->strFechaInicio = $fechainicio;
        $this->strFechaFin = $fechafin;
        $this->intStatus = $status;

        // Consulta SQL de actualización
        $sql = "UPDATE proyectos SET nombre = ?, descripcion = ?, ubicacion = ?, cliente_id = ?, 
                                    potencia = ?, presupuesto = ?, fecha_inicio = ?, fecha_fin = ?, status = ? 
                WHERE id = $this->intIdProyecto";

        // Array de datos a actualizar
        $arrData = array(
            $this->strNombre,
            $this->strDescripcion,
            $this->strUbicacion,
            $this->intClienteId,
            $this->fltPotencia,
            $this->fltPresupuesto,
            $this->strFechaInicio,
            $this->strFechaFin,
            $this->intStatus
        );

        // Ejecutar la actualización
        $request = $this->update($sql, $arrData);
        return $request;
    }

    // Método para eliminar (baja lógica) un proyecto por ID
    public function deleteProyecto(int $idproyecto)
    {
        $this->intIdProyecto = $idproyecto;
        $sql = "UPDATE proyectos SET status = ? WHERE id = $this->intIdProyecto";
        $arrData = array(0); // Se marca como inactivo (status = 0)
        $request = $this->update($sql, $arrData);
        return $request;
    }

    // Método para obtener proyectos de un cliente específico
    public function getProyectosByCliente(int $clienteid)
    {
        $sql = "SELECT id, nombre, ubicacion, potencia, presupuesto, fecha_inicio, fecha_fin, status 
                FROM proyectos 
                WHERE cliente_id = $clienteid AND status != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    // Método para calcular un ahorro estimado según el consumo y la potencia instalada
    public function calcularAhorro(float $consumo, float $potencia)
    {
        // Estima generación mensual (4.5h pico por día * 30 días)
        $generacionEstimada = $potencia * 4.5 * 30;

        // Calcula el ahorro considerando un valor estimado de $0.12 por kWh
        $ahorroMensual = min($consumo, $generacionEstimada) * 0.12;

        return $ahorroMensual;
    }
}
