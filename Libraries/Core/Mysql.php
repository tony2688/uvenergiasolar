<?php

// Clase Mysql que hereda de la clase Conexion
class Mysql extends Conexion
{
	// Propiedades privadas para la conexión, la consulta y los valores
	private $conexion;
	private $strquery;
	private $arrValues;

	// Constructor que establece la conexión con la base de datos
	function __construct()
	{
		// Crea una nueva instancia de Conexion
		$this->conexion = new Conexion();

		// Obtiene el objeto PDO a través del método conect()
		$this->conexion = $this->conexion->conect();
	}

	// Método para insertar un nuevo registro en la base de datos
	public function insert(string $query, array $arrValues)
	{
		$this->strquery = $query; // Guarda la consulta SQL
		$this->arrValues = $arrValues; // Guarda los valores a insertar

		// Prepara la consulta
		$insert = $this->conexion->prepare($this->strquery);

		// Ejecuta la consulta con los valores
		$resInsert = $insert->execute($this->arrValues);

		// Si se insertó correctamente, obtiene el último ID insertado
		if ($resInsert) {
			$lastInsert = $this->conexion->lastInsertId();
		} else {
			$lastInsert = 0; // Si falló, retorna 0
		}

		return $lastInsert;
	}

	// Método para seleccionar un solo registro
	public function select(string $query, array $params = [])
	{
		$this->strquery = $query; // Guarda la consulta SQL
		$result = $this->conexion->prepare($this->strquery); // Prepara la consulta
		$result->execute($params); // Ejecuta con los parámetros (si hay)
		$data = $result->fetch(PDO::FETCH_ASSOC); // Obtiene un solo registro como array asociativo
		return $data;
	}

	// Método para seleccionar múltiples registros
	public function select_all(string $query, array $params = [])
	{
		$this->strquery = $query; // Guarda la consulta SQL
		$result = $this->conexion->prepare($this->strquery); // Prepara la consulta
		$result->execute($params); // Ejecuta con parámetros (opcional)
		$data = $result->fetchall(PDO::FETCH_ASSOC); // Devuelve todos los registros en un array asociativo
		return $data;
	}

	// Método para actualizar registros existentes
	public function update(string $query, array $arrValues)
	{
		$this->strquery = $query; // Guarda la consulta SQL
		$this->arrValues = $arrValues; // Guarda los valores a actualizar
		$update = $this->conexion->prepare($this->strquery); // Prepara la consulta
		$resExecute = $update->execute($this->arrValues); // Ejecuta la consulta
		return $resExecute; // Devuelve true o false según éxito
	}

	// Método para eliminar registros
	public function delete(string $query)
	{
		$this->strquery = $query; // Guarda la consulta SQL
		$result = $this->conexion->prepare($this->strquery); // Prepara la consulta
		$del = $result->execute(); // Ejecuta sin parámetros
		return $del; // Devuelve true o false
	}
}
