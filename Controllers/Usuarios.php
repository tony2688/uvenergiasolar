<?php

// Definición de la clase Usuarios que hereda de la clase Controllers
class Usuarios extends Controllers
{
    // Constructor de la clase
    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre Controllers
    }

    // Vista para la gestión de usuarios
    public function usuarios()
    {
        // Define los datos para la vista de usuarios
        $data['page_id'] = 2;
        $data['page_tag'] = "Usuarios"; // Etiqueta de la página
        $data['page_title'] = "Gestión de Usuarios"; // Título de la página
        $data['page_name'] = "usuarios"; // Nombre de la página
        $data['page_content'] = "Administración de usuarios del sistema"; // Contenido de la página

        // Llama a la vista correspondiente con los datos definidos
        $this->views->getView($this, "usuarios", $data);
    }

    // Vista para el login de usuarios
    public function login()
    {
        // Define los datos para la vista de login
        $data['page_id'] = 3;
        $data['page_tag'] = "Login"; // Etiqueta de la página
        $data['page_title'] = "Iniciar Sesión"; // Título de la página
        $data['page_name'] = "login"; // Nombre de la página

        // Llama a la vista de login
        $this->views->getView("Login", "login", $data);
    }

    // Vista para el registro de usuarios
    public function registro()
    {
        // Define los datos para la vista de registro
        $data['page_id'] = 4;
        $data['page_tag'] = "Registro"; // Etiqueta de la página
        $data['page_title'] = "Crear Cuenta"; // Título de la página
        $data['page_name'] = "registro"; // Nombre de la página

        // Llama a la vista de registro
        $this->views->getView($this, "registro", $data);
    }

    // Método para crear un nuevo usuario
    public function setUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario de registro
            $nombre = trim($_POST['txtNombre']);
            $apellido = trim($_POST['txtApellido']);
            $email = trim($_POST['txtEmail']);
            $password = password_hash($_POST['txtPassword'], PASSWORD_DEFAULT);

            $token = bin2hex(random_bytes(16)); // Generar un token único
            $rolid = 2; // Asignar rol de cliente (ID 2) por defecto
            $status = 1; // Estado activo

            // Establecer la conexión con la base de datos
            $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($conexion->connect_error) {
                // Si hay error en la conexión, se retorna un mensaje
                echo json_encode(["status" => false, "msg" => "Error de conexión a la base de datos"]);
                exit;
            }

            // Validar que no exista el correo en la base de datos
            $stmtCheck = $conexion->prepare("SELECT idusuario FROM usuarios WHERE email = ?");
            $stmtCheck->bind_param("s", $email);
            $stmtCheck->execute();
            $stmtCheck->store_result();

            if ($stmtCheck->num_rows > 0) {
                // Si el correo ya está registrado, se retorna un mensaje
                echo json_encode(["status" => false, "msg" => "El correo ya está registrado"]);
                $stmtCheck->close();
                $conexion->close();
                exit;
            }
            $stmtCheck->close();

            // Insertar el nuevo usuario en la base de datos
            $sql = "INSERT INTO usuarios (nombres, apellidos, email, password, token, rolid, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssssssi", $nombre, $apellido, $email, $password, $token, $rolid, $status);

            if ($stmt->execute()) {
                // Si el registro es exitoso, se retorna un mensaje de éxito
                echo json_encode(["status" => true, "msg" => "Usuario registrado correctamente"]);
            } else {
                // Si hay un error al insertar, se retorna un mensaje de error
                echo json_encode(["status" => false, "msg" => "Error al registrar: " . $conexion->error]);
            }

            $stmt->close();
            $conexion->close();
        } else {
            // Si el método no es POST, se retorna un mensaje de error
            echo json_encode(["status" => false, "msg" => "Método no permitido"]);
        }
    }

    // Método para hacer login de un usuario
    public function loginUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario de login
            $email = $_POST['txtEmail'];
            $password = $_POST['txtPassword'];

            // Establecer la conexión con la base de datos
            $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($conexion->connect_error) {
                // Si hay error en la conexión, se retorna un mensaje de error
                echo json_encode(['status' => false, 'msg' => 'Error de conexión a la base de datos']);
                return;
            }

            // Consultar el usuario con el correo proporcionado
            $sql = "SELECT * FROM usuarios WHERE email = ? AND status = 1";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($usuario = $result->fetch_assoc()) {
                // Verificar si la contraseña es correcta
                if (password_verify($password, $usuario['password'])) {
                    $_SESSION['usuario'] = $usuario; // Guardar los datos del usuario en la sesión
                    echo json_encode(['status' => true, 'nombre' => $usuario['nombres']]); // Retornar éxito
                } else {
                    echo json_encode(['status' => false, 'msg' => 'Contraseña incorrecta']); // Contraseña incorrecta
                }
            } else {
                echo json_encode(['status' => false, 'msg' => 'Usuario no encontrado']); // Usuario no encontrado
            }

            $stmt->close();
            $conexion->close();
        } else {
            // Si el método no es POST, se retorna un mensaje de error
            echo json_encode(['status' => false, 'msg' => 'Método no permitido']);
        }
    }

    // Método para cerrar sesión
    public function logout()
    {
        // Verifica si la sesión ya está iniciada antes de intentar iniciarla
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); // Inicia la sesión solo si no está activa
        }
        session_unset(); // Borra todas las variables de sesión
        session_destroy(); // Destruye la sesión
        header("Location: " . base_url()); // Redirige al inicio
        exit;
    }
}