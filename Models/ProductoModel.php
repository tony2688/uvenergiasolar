<?php
// Definición de la clase ProductoModel que extiende de Mysql (modelo base de conexión)
class ProductoModel extends Mysql
{
    // Constructor: llama al constructor de Mysql para establecer la conexión
    public function __construct()
    {
        parent::__construct();
    }

    // ================================
    // Método: obtenerTotalProductos
    // Descripción: Retorna el total de productos según filtros opcionales
    // ================================
    public function obtenerTotalProductos($categoriaID = null, $subcategoriaID = null, $busqueda = '')
    {
        // Consulta base
        $sql = "SELECT COUNT(*) as total FROM productos p WHERE 1=1";
        $params = [];

        // Filtro por categoría principal
        if ($categoriaID) {
            $sql .= " AND p.categoria_id = ?";
            $params[] = $categoriaID;
        }

        // Filtro por subcategoría (si existe)
        if ($subcategoriaID) {
            $sql .= " AND p.subcategoria_id = ?";
            $params[] = $subcategoriaID;
        }

        // Filtro por texto de búsqueda (nombre o descripción)
        if (!empty($busqueda)) {
            $sql .= " AND (p.nombre LIKE ? OR p.descripcion LIKE ?)";
            $params[] = "%$busqueda%";
            $params[] = "%$busqueda%";
        }

        // Ejecuta la consulta
        $result = $this->select($sql, $params);

        // Devuelve el total encontrado o 0 si no hay resultado
        return $result['total'] ?? 0;
    }

    // ================================
    // Método: obtenerPaginados
    // Descripción: Obtiene productos paginados con filtros y ordenamiento
    // ================================
    public function obtenerPaginados($offset, $limit, $orden, $categoriaID = null, $subcategoriaID = null, $busqueda = '')
    {
        // Define el orden por defecto
        $ordenSQL = "p.id DESC";

        // Aplica orden personalizado
        if ($orden === "nombre_asc") {
            $ordenSQL = "p.nombre ASC";
        } elseif ($orden === "nombre_desc") {
            $ordenSQL = "p.nombre DESC";
        } elseif ($orden === "fecha_asc") {
            $ordenSQL = "p.id ASC";
        }

        // Consulta con JOIN para obtener nombre de la categoría
        $sql = "SELECT p.*, c.nombre AS categoria
                FROM productos p
                LEFT JOIN categorias c ON p.categoria_id = c.id
                WHERE 1=1";
        $params = [];

        // Filtro por categoría principal
        if ($categoriaID) {
            $sql .= " AND p.categoria_id = ?";
            $params[] = $categoriaID;
        }

        // Filtro por subcategoría
        if ($subcategoriaID) {
            $sql .= " AND p.subcategoria_id = ?";
            $params[] = $subcategoriaID;
        }

        // Filtro por búsqueda
        if (!empty($busqueda)) {
            $sql .= " AND (p.nombre LIKE ? OR p.descripcion LIKE ?)";
            $params[] = "%$busqueda%";
            $params[] = "%$busqueda%";
        }

        // Aplica orden y paginación
        $sql .= " ORDER BY $ordenSQL LIMIT $offset, $limit";

        // Ejecuta y devuelve los resultados
        return $this->select_all($sql, $params);
    }

    // ============================================
    // Método: obtenerCategoriasJerarquicas
    // Descripción: Devuelve categorías agrupadas por padre con subcategorías
    // ============================================
    public function obtenerCategoriasJerarquicas()
    {
        $sql = "SELECT * FROM categorias";
        $categorias = $this->select_all($sql);

        // Mapa jerárquico
        $jerarquia = [];

        foreach ($categorias as $cat) {
            $parentId = $cat['parent_id'] ?? null;

            // Si no tiene padre, es categoría principal
            if ($parentId === null) {
                $jerarquia[$cat['id']] = [
                    'id' => $cat['id'],
                    'nombre' => $cat['nombre'],
                    'subcategorias' => []
                ];
            } else {
                // Agrega como subcategoría
                $jerarquia[$parentId]['subcategorias'][] = [
                    'id' => $cat['id'],
                    'nombre' => $cat['nombre']
                ];
            }
        }

        return $jerarquia;
    }

    // ============================================
    // Método: obtenerCategorias
    // Descripción: Obtiene todas las categorías ordenadas por jerarquía
    // ============================================
    public function obtenerCategorias()
    {
        $sql = "SELECT id, nombre, parent_id FROM categorias ORDER BY parent_id ASC, nombre ASC";
        return $this->select_all($sql);
    }
}
