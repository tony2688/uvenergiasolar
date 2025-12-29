<?php

// Definición de la clase UsuariosModel que hereda de Mysql
class UsuariosModel extends Mysql
{

    // Propiedades privadas del modelo de usuario
    private $intIdUsuario;
    private $strNombre;
    private $strApellido;
    private $strEmail;
    private $strPassword;
    private $strToken;
    private $intTipoId;
    private $intStatus;

    // Constructor: invoca al constructor de la clase padre (Mysql)
    public function __construct()
    {
        parent::__construct();
    }

    // Método para insertar un nuevo usuario
    public function insertUsuario(string $nombre, string $apellido, string $email, string $password, int $tipoid, int $status)
    {
        // Asignación de parámetros a propiedades
        $this->strNombre = $nombre;
        $this->strApellido = $apellido;
        $this->strEmail = $email;
        $this->strPassword = $password;
        $this->intTipoId = $tipoid;
        $this->intStatus = $status;

        $return = 0;

        // Verifica si el email ya existe en la base de datos
        $sql = "SELECT * FROM usuarios WHERE email = '{$this->strEmail}'";
        $request = $this->select_all($sql);

        // Si no existe el email, procede a insertar
        if (empty($request)) {
            $query_insert = "INSERT INTO usuarios(nombres, apellidos, email, password, rolid, status) VALUES(?,?,?,?,?,?)";
            $arrData = array($this->strNombre, $this->strApellido, $this->strEmail, $this->strPassword, $this->intTipoId, $this->intStatus);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            // Si ya existe, retorna "exist"
            $return = "exist";
        }

        return $return;
    }

    // Método para obtener todos los usuarios activos
    public function selectUsuarios()
    {
        $sql = "SELECT u.idusuario, u.nombres, u.apellidos, u.email, u.status, r.nombrerol 
                FROM usuarios u 
                INNER JOIN rol r ON u.rolid = r.idrol 
                WHERE u.status != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    // Método para obtener un usuario específico por su ID
    public function selectUsuario(int $idpersona)
    {
        $this->intIdUsuario = $idpersona;
        $sql = "SELECT u.idusuario, u.nombres, u.apellidos, u.email, u.status, r.idrol, r.nombrerol 
                FROM usuarios u 
                INNER JOIN rol r ON u.rolid = r.idrol 
                WHERE u.idusuario = $this->intIdUsuario";
        $request = $this->select($sql);
        return $request;
    }

    // Método para actualizar los datos de un usuario
    public function updateUsuario(int $idUsuario, string $nombre, string $apellido, string $email, string $password, int $tipoid, int $status)
    {
        // Asignación de parámetros a propiedades
        $this->intIdUsuario = $idUsuario;
        $this->strNombre = $nombre;
        $this->strApellido = $apellido;
        $this->strEmail = $email;
        $this->strPassword = $password;
        $this->intTipoId = $tipoid;
        $this->intStatus = $status;

        // Verifica si el email pertenece a otro usuario
        $sql = "SELECT * FROM usuarios WHERE email = '{$this->strEmail}' AND idusuario != $this->intIdUsuario";
        $request = $this->select_all($sql);

        // Si el email no está repetido, se actualiza
        if (empty($request)) {
            if ($this->strPassword != "") {
                // Si se cambia también la contraseña
                $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, email = ?, password = ?, rolid = ?, status = ? 
                        WHERE idusuario = $this->intIdUsuario";
                $arrData = array($this->strNombre, $this->strApellido, $this->strEmail, $this->strPassword, $this->intTipoId, $this->intStatus);
            } else {
                // Si no se cambia la contraseña
                $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, email = ?, rolid = ?, status = ? 
                        WHERE idusuario = $this->intIdUsuario";
                $arrData = array($this->strNombre, $this->strApellido, $this->strEmail, $this->intTipoId, $this->intStatus);
            }
            $request = $this->update($sql, $arrData);
        } else {
            // Email ya está en uso
            $request = "exist";
        }

        return $request;
    }

    // Método para dar de baja lógica (desactivar) un usuario
    public function deleteUsuario(int $intIdpersona)
    {
        $this->intIdUsuario = $intIdpersona;
        $sql = "UPDATE usuarios SET status = ? WHERE idusuario = $this->intIdUsuario";
        $arrData = array(0); // 0 representa inactivo
        $request = $this->update($sql, $arrData);
        return $request;
    }

    // Método para validar usuario al momento del login
    public function loginUser(string $email, string $password)
    {
        $this->strEmail = $email;
        $this->strPassword = $password;
        $sql = "SELECT idusuario, status FROM usuarios WHERE email = '$this->strEmail' AND password = '$this->strPassword' AND status = 1";
        $request = $this->select($sql);
        return $request;
    }
}
