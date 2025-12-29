<?php
// Definición de la clase Producto que hereda de la clase Controllers
class Producto extends Controllers
{

    // Constructor de la clase Producto
    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre Controllers
    }

    // Método para mostrar productos
    public function mostrar()
    {
        // Obtener la página actual de la URL (por defecto es la página 1)
        $pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;

        // Obtener el parámetro de orden (por defecto es 'fecha_desc')
        $orden = $_GET['orden'] ?? 'fecha_desc';

        // Obtener el ID de la categoría desde la URL (si existe)
        $categoriaID = $_GET['cat'] ?? null;

        // Obtener el ID de la subcategoría desde la URL (si existe)
        $subcategoriaID = $_GET['subcat'] ?? null;

        // Obtener el término de búsqueda desde la URL (si existe)
        $busqueda = $_GET['buscar'] ?? '';

        // Definir cuántos productos mostrar por página
        $porPagina = 9;

        // Calcular el desplazamiento de la página actual
        $offset = ($pagina - 1) * $porPagina;

        // Obtener el total de productos filtrados
        $total = $this->model->obtenerTotalProductos($categoriaID, $subcategoriaID, $busqueda);

        // Obtener los productos filtrados con paginación
        $productos = $this->model->obtenerPaginados($offset, $porPagina, $orden, $categoriaID, $subcategoriaID, $busqueda);

        // Calcular el total de páginas necesarias
        $totalPaginas = ceil($total / $porPagina);

        // Obtener las categorías jerárquicas
        $categorias = $this->model->obtenerCategorias(); // Asegúrate que este método exista

        // Incluir la vista para mostrar los productos
        require_once 'Views/productos.php';
    }
}
