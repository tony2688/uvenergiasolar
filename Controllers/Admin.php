<?php

// Definición de la clase Admin que hereda de la clase Controllers
class Admin extends Controllers
{
    // Constructor de la clase Admin
    public function __construct()
    {
        parent::__construct();

        // Inicia la sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica si el usuario no está logueado o no es un administrador, y lo redirige al home
        if (empty($_SESSION['usuario']) || $_SESSION['usuario']['rolid'] != 1) {
            header("Location: " . base_url() . "home");
            exit;
        }
    }

    // Método para cargar el dashboard del administrador
    public function dashboard()
    {
        $data['page_title'] = "Panel de Administrador"; // Título de la página
        $data['page_name'] = "dashboard"; // Nombre de la página
        $this->views->getView($this, "Admin/dashboard", $data); // Carga la vista del dashboard
    }

    // Método para mostrar la gestión de productos
    public function productos()
    {
        // Establece la conexión a la base de datos
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error); // Si hay error de conexión, se detiene el script
        }

        // Consulta para obtener productos y sus categorías
        $sql = "SELECT p.id, p.nombre, p.descripcion, p.imagen, p.categoria_id, p.subcategoria_id, c.nombre as categoria 
                FROM productos p 
                INNER JOIN categorias c ON p.categoria_id = c.id";
        $result = $conexion->query($sql);

        $productos = []; // Arreglo para almacenar los productos
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row; // Añade los productos al arreglo
        }

        // Consulta para obtener todas las categorías
        $sqlCategorias = "SELECT * FROM categorias";
        $resultCat = $conexion->query($sqlCategorias);

        $categorias = []; // Arreglo para almacenar las categorías
        while ($cat = $resultCat->fetch_assoc()) {
            $categorias[] = $cat; // Añade las categorías al arreglo
        }

        $conexion->close(); // Cierra la conexión a la base de datos

        // Asigna los datos a la vista
        $data['page_title'] = "Gestión de Productos";
        $data['productos'] = $productos;
        $data['categorias'] = $categorias;
        $this->views->getView($this, "Admin/productos", $data); // Carga la vista de productos
    }

    // Método para agregar un nuevo producto
    public function setProducto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica si la solicitud es POST
            $nombre = $_POST['nombre'] ?? ''; // Obtiene el nombre del producto
            $descripcion = $_POST['descripcion'] ?? ''; // Obtiene la descripción
            $categoria = $_POST['categoria_id'] ?? ''; // Obtiene la categoría
            $subcategoria = $_POST['subcategoria_id'] ?? null; // Obtiene la subcategoría

            // Valida que el nombre y la categoría no estén vacíos
            if (empty($nombre) || empty($categoria)) {
                echo json_encode(['status' => false, 'msg' => 'Nombre y categoría son requeridos']);
                exit;
            }

            // Verifica si se ha enviado una imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $imagenTmp = $_FILES['imagen']['tmp_name']; // Ruta temporal de la imagen
                $imagenNombre = uniqid() . "_" . basename($_FILES['imagen']['name']); // Nombre único de la imagen
                $uploadDir = "Assets/uploads/"; // Directorio de subida

                // Si no existe el directorio, lo crea
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $uploadPath = $uploadDir . $imagenNombre; // Ruta completa para guardar la imagen

                // Mueve la imagen al directorio de destino
                if (move_uploaded_file($imagenTmp, $uploadPath)) {
                    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                    if ($conexion->connect_error) {
                        die("Error de conexión: " . $conexion->connect_error);
                    }

                    // Consulta para insertar un nuevo producto
                    $sql = "INSERT INTO productos (nombre, descripcion, imagen, categoria_id, subcategoria_id) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conexion->prepare($sql);
                    $stmt->bind_param("sssii", $nombre, $descripcion, $imagenNombre, $categoria, $subcategoria);

                    if ($stmt->execute()) {
                        echo json_encode(['status' => true, 'msg' => 'Producto agregado correctamente']);
                    } else {
                        echo json_encode(['status' => false, 'msg' => 'Error al insertar en la base de datos']);
                    }

                    $stmt->close(); // Cierra la sentencia preparada
                    $conexion->close(); // Cierra la conexión
                } else {
                    echo json_encode(['status' => false, 'msg' => 'Error al subir la imagen']);
                }
            } else {
                $errorMsg = 'Imagen no enviada correctamente';
                if (isset($_FILES['imagen'])) { // Verifica si hubo un error en la carga de la imagen
                    switch ($_FILES['imagen']['error']) {
                        case UPLOAD_ERR_INI_SIZE:
                            $errorMsg = 'La imagen excede el tamaño máximo permitido por el servidor';
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $errorMsg = 'La imagen excede el tamaño máximo permitido por el formulario';
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            $errorMsg = 'La imagen se subió parcialmente';
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $errorMsg = 'No se seleccionó ninguna imagen';
                            break;
                    }
                }
                echo json_encode(['status' => false, 'msg' => $errorMsg]);
            }
        } else {
            echo json_encode(['status' => false, 'msg' => 'Petición no válida']);
        }
    }

    // Método para eliminar productos
    public function eliminarProducto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) { // Verifica si es POST y si existe el ID
            $id = intval($_POST['id']); // Convierte el ID a entero

            $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($conexion->connect_error) {
                echo json_encode(['status' => false, 'msg' => 'Error al conectar a la base de datos']);
                exit;
            }

            // Consulta para obtener la imagen del producto
            $res = $conexion->query("SELECT imagen FROM productos WHERE id = $id");
            if ($row = $res->fetch_assoc()) {
                $imagenRuta = "Assets/uploads/" . $row['imagen'];
                if (file_exists($imagenRuta)) {
                    unlink($imagenRuta);  // Elimina la imagen físicamente.
                }
            }

            // Consulta para eliminar el producto de la base de datos
            $stmt = $conexion->prepare("DELETE FROM productos WHERE id = ?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo json_encode(['status' => true, 'msg' => 'Producto eliminado correctamente']);
            } else {
                echo json_encode(['status' => false, 'msg' => 'Error al eliminar en la base de datos']);
            }

            $stmt->close();
            $conexion->close();
        } else {
            echo json_encode(['status' => false, 'msg' => 'Petición no válida o ID no enviado']);
        }
    }

    // Método alias para eliminar productos (compatibilidad con JS)
    public function deleteProducto()
    {
        $this->eliminarProducto(); // Redirige a eliminarProducto
    }

    // Método para gestionar las categorías
    public function categorias()
    {
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $categorias = []; // Arreglo para almacenar categorías
        // Consulta para obtener categorías ordenadas por parent_id y luego por nombre
        $sql = "SELECT * FROM categorias ORDER BY CASE WHEN parent_id IS NULL THEN 0 ELSE 1 END, nombre ASC";
        $res = $conexion->query($sql);

        while ($row = $res->fetch_assoc()) {
            $categorias[] = $row; // Añade las categorías al arreglo
        }

        $conexion->close(); // Cierra la conexión

        // Asigna los datos a la vista
        $data['page_title'] = "Gestión de Categorías";
        $data['page_name'] = "categorias";
        $data['categorias'] = $categorias;

        $this->views->getView($this, "Admin/categorias", $data); // Carga la vista de categorías
    }

    // Método para agregar una nueva categoría
    public function setCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica si la solicitud es POST
            $nombre = trim($_POST['nombre']); // Obtiene el nombre de la categoría
            $parent_id = isset($_POST['parent_id']) && !empty($_POST['parent_id']) ? intval($_POST['parent_id']) : null;

            if (!empty($nombre)) { // Verifica que el nombre no esté vacío
                $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                if ($parent_id !== null) { // Si tiene categoría padre
                    $stmt = $conexion->prepare("INSERT INTO categorias (nombre, parent_id) VALUES (?, ?)");
                    $stmt->bind_param("si", $nombre, $parent_id);
                } else { // Si es una categoría principal
                    $stmt = $conexion->prepare("INSERT INTO categorias (nombre) VALUES (?)");
                    $stmt->bind_param("s", $nombre);
                }

                $stmt->execute();
                $stmt->close();
                $conexion->close();

                header("Location: " . base_url() . "admin/categorias");
                exit;
            } else {
                echo "Nombre vacío";
            }
        } else {
            header("Location: " . base_url());
            exit;
        }
    }

    // Método para eliminar una categoría
    public function deleteCategoria($id)
    {
        $id = intval($id); // Convierte el ID a entero
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $stmt = $conexion->prepare("DELETE FROM categorias WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conexion->close();

        header("Location: " . base_url() . "admin/categorias");
        exit;
    }

    // Método para gestionar los usuarios
    public function usuarios()
    {
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $usuarios = []; // Arreglo para almacenar usuarios
        // Consulta para obtener usuarios con su rol
        $sql = "SELECT u.idusuario, u.nombres, u.apellidos, u.email, u.status, u.rolid, r.nombrerol 
                FROM usuarios u 
                INNER JOIN rol r ON u.rolid = r.idrol 
                ORDER BY u.idusuario ASC";
        $res = $conexion->query($sql);

        while ($row = $res->fetch_assoc()) {
            $usuarios[] = $row; // Añade los usuarios al arreglo
        }

        $conexion->close(); // Cierra la conexión

        $data['page_title'] = "Gestión de Usuarios"; // Título de la página
        $data['page_name'] = "usuarios"; // Nombre de la página
        $data['usuarios'] = $usuarios; // Datos de usuarios

        $this->views->getView($this, "Admin/usuarios", $data); // Carga la vista de usuarios
    }

    // Método para cambiar el rol de un usuario
    public function cambiarRolUsuario()
    {
        // Verifica que el usuario actual sea administrador
        if (empty($_SESSION['usuario']) || $_SESSION['usuario']['rolid'] != 1) {
            header("Location: " . base_url() . "home");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idUsuario = isset($_POST['idUsuario']) ? intval($_POST['idUsuario']) : 0;
            $rolUsuario = isset($_POST['rolUsuario']) ? intval($_POST['rolUsuario']) : 0;

            // Validar datos
            if ($idUsuario <= 0 || ($rolUsuario != 1 && $rolUsuario != 2)) {
                $_SESSION['mensaje'] = "Datos inválidos para cambiar el rol";
                header("Location: " . base_url() . "admin/usuarios");
                exit;
            }

            $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Actualizar el rol del usuario
            $stmt = $conexion->prepare("UPDATE usuarios SET rolid = ? WHERE idusuario = ?");
            $stmt->bind_param("ii", $rolUsuario, $idUsuario);

            if ($stmt->execute()) {
                $_SESSION['mensaje'] = "Rol actualizado correctamente";
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el rol: " . $conexion->error;
            }

            $stmt->close();
            $conexion->close();

            header("Location: " . base_url() . "admin/usuarios");
            exit;
        } else {
            header("Location: " . base_url() . "admin/usuarios");
            exit;
        }
    }
}
