<?php
// Definición de la clase Conexion
class Conexion
{
    // Propiedad privada que almacenará la conexión PDO
    private $conect;

    // Constructor de la clase
    public function __construct()
    {
        // Cadena de conexión utilizando constantes definidas en config (DB_HOST, DB_NAME, DB_CHARSET)
        $connectionString = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

        try {
            // Se crea una nueva instancia PDO con los parámetros definidos
            $this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD);

            // Configura el modo de error de PDO para lanzar excepciones
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Si ocurre un error en la conexión, detiene la ejecución y muestra el mensaje
            die("ERROR DE CONEXIÓN: " . $e->getMessage());
        }
    }

    // Método público que retorna la conexión PDO
    public function conect(): PDO
    {
        return $this->conect;
    }
}
