<?php

// Definición de la clase Usuarios que hereda de la clase Controllers
class Usuarios extends Controllers
{
    // Constructor de la clase
    public function __construct()
    {
        parent::__construct();
        // Aseguramos que la sesión esté iniciada para verificaciones
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Vista para la gestión de usuarios (Panel Admin)
    public function usuarios()
    {
        // Seguridad: Verificar si es admin podría ir aquí, pero se maneja en la vista usualmente
        $data['page_id'] = 2;
        $data['page_tag'] = "Usuarios";
        $data['page_title'] = "Gestión de Usuarios | UV Energía Solar";
        $data['page_name'] = "usuarios";

        // SEO: Descripción para el panel
        $data['page_description'] = "Panel de administración para gestión de usuarios y clientes de UV Energía Solar.";

        // Llama a la vista correspondiente
        $this->views->getView($this, "usuarios", $data);
    }

    // Vista para el login de usuarios
    public function login()
    {
        // MEJORA SENIOR: Si ya está logueado, redirigir al Dashboard
        if (isset($_SESSION['usuario'])) {
            header("Location: " . base_url() . "admin/dashboard");
            exit;
        }

        $data['page_id'] = 3;
        $data['page_tag'] = "Login";
        $data['page_title'] = "Iniciar Sesión | UV Energía Solar";
        $data['page_name'] = "login";

        // SEO: Descripción clave para búsquedas
        $data['page_description'] = "Accedé a tu cuenta en UV Energía Solar para gestionar tus proyectos, consultar presupuestos y ver el estado de tu instalación.";

        // Llama a la vista de login (Carpeta Login, archivo login.php)
        $this->views->getView("Login", "login", $data);
    }

    // Vista para el registro de usuarios
    public function registro()
    {
        // MEJORA SENIOR: Si ya está logueado, redirigir al Dashboard
        if (isset($_SESSION['usuario'])) {
            header("Location: " . base_url() . "admin/dashboard");
            exit;
        }

        $data['page_id'] = 4;
        $data['page_tag'] = "Registro";
        $data['page_title'] = "Crear Cuenta | UV Energía Solar";
        $data['page_name'] = "registro";

        // SEO: Descripción para captar nuevos usuarios
        $data['page_description'] = "Registrate gratis en UV Energía Solar. Obtené presupuestos personalizados para paneles solares y calculá tu ahorro energético.";

        $this->views->getView($this, "registro", $data);
    }

    // Método para crear un nuevo usuario (Backend)
    public function setUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener y limpiar datos
            $nombre = trim($_POST['txtNombre']);
            $apellido = trim($_POST['txtApellido']);
            $email = trim($_POST['txtEmail']);
            $password = password_hash($_POST['txtPassword'], PASSWORD_DEFAULT);

            $token = bin2hex(random_bytes(16));
            $rolid = 2; // Cliente por defecto
            $status = 1; // Activo

            // Conexión a BD
            $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($conexion->connect_error) {
                echo json_encode(["status" => false, "msg" => "Error de conexión a la base de datos"]);
                exit;
            }

            // Validar existencia de correo
            $stmtCheck = $conexion->prepare("SELECT idusuario FROM usuarios WHERE email = ?");
            $stmtCheck->bind_param("s", $email);
            $stmtCheck->execute();
            $stmtCheck->store_result();

            if ($stmtCheck->num_rows > 0) {
                echo json_encode(["status" => false, "msg" => "El correo ya está registrado"]);
                $stmtCheck->close();
                $conexion->close();
                exit;
            }
            $stmtCheck->close();

            // Insertar usuario
            $sql = "INSERT INTO usuarios (nombres, apellidos, email, password, token, rolid, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssssssi", $nombre, $apellido, $email, $password, $token, $rolid, $status);

            if ($stmt->execute()) {
                echo json_encode(["status" => true, "msg" => "Usuario registrado correctamente"]);
            } else {
                echo json_encode(["status" => false, "msg" => "Error al registrar: " . $conexion->error]);
            }

            $stmt->close();
            $conexion->close();
        } else {
            echo json_encode(["status" => false, "msg" => "Método no permitido"]);
        }
    }

    // Método para procesar el login (Backend)
    public function loginUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['txtEmail'];
            $password = $_POST['txtPassword'];

            $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($conexion->connect_error) {
                echo json_encode(['status' => false, 'msg' => 'Error de conexión a la base de datos']);
                return;
            }

            // Buscar usuario activo por email
            $sql = "SELECT * FROM usuarios WHERE email = ? AND status = 1";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($usuario = $result->fetch_assoc()) {
                // Verificar hash de contraseña
                if (password_verify($password, $usuario['password'])) {
                    $_SESSION['usuario'] = $usuario;
                    echo json_encode(['status' => true, 'nombre' => $usuario['nombres']]);
                } else {
                    echo json_encode(['status' => false, 'msg' => 'Contraseña incorrecta']);
                }
            } else {
                echo json_encode(['status' => false, 'msg' => 'Usuario no encontrado']);
            }

            $stmt->close();
            $conexion->close();
        } else {
            echo json_encode(['status' => false, 'msg' => 'Método no permitido']);
        }
    }

    // Método para cerrar sesión
    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header("Location: " . base_url());
        exit;
    }
}