<?php
// Carga el header del panel de administración pasando los datos necesarios
headerAdmin($data);
?>

<?php
// Asigna el array de categorías desde $data, o un array vacío si no existe
$categorias = $data['categorias'] ?? [];
?>

<!-- Hero visual con imagen de fondo (parallax) -->
<section class="relative w-full h-24 bg-cover bg-center bg-no-repeat"
    style="background-image: url('<?php echo BASE_URL; ?>Assets/images/uploads/ipad.jpg');">
    <!-- Capa oscura superpuesta -->
    <div class="absolute inset-0 bg-black/60 z-0"></div>
</section>

<!-- Sección principal de contenido con padding -->
<section class="px-4 pt-32 pb-12 bg-gray-50 min-h-screen">

    <!-- Título de la sección y botón de regreso al Dashboard -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Categorías</h2>
        <a href="<?php echo base_url(); ?>admin/dashboard" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            ← Volver al Dashboard
        </a>
    </div>

    <!-- Grid con dos formularios: categoría principal y subcategoría -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <!-- Formulario para agregar categoría principal -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 border-b pb-2">Agregar Categoría Principal</h3>

            <form id="formCategoriaPrincipal" method="POST" action="<?php echo base_url(); ?>admin/setCategoria" class="space-y-4">
                <!-- Campo de nombre de categoría -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Nombre de la categoría</label>
                    <input type="text" name="nombre" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                </div>

                <!-- Campo oculto para que no se envíe parent_id -->
                <input type="hidden" name="parent_id" value="">

                <!-- Botón de envío -->
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar Categoría Principal</button>
            </form>
        </div>

        <!-- Formulario para agregar subcategoría -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 border-b pb-2">Agregar Subcategoría</h3>

            <form id="formSubcategoria" method="POST" action="<?php echo base_url(); ?>admin/setCategoria" class="space-y-4">
                <!-- Campo de nombre de subcategoría -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Nombre de la subcategoría</label>
                    <input type="text" name="nombre" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                </div>

                <!-- Selector de categoría padre -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Categoría padre</label>
                    <select name="parent_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                        <option value="">Seleccione una categoría</option>
                        <?php
                        // Mostrar solo categorías principales (las que no tienen parent_id)
                        foreach ($categorias as $cat):
                            if (empty($cat['parent_id'])):
                        ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre']; ?></option>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </select>
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar Subcategoría</button>
            </form>
        </div>
    </div>


    <!-- Tabla de categorías existentes -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded shadow p-4">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 border-b pb-2">Listado de Categorías</h3>

        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Tipo</th>
                    <th class="px-4 py-2">Categoría Padre</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categorias)): ?>
                    <?php
                    // Crear un mapa de categorías por ID para buscar rápidamente el nombre de la categoría padre
                    $categoriasMap = [];
                    foreach ($categorias as $c) {
                        $categoriasMap[$c['id']] = $c['nombre'];
                    }
                    ?>

                    <?php foreach ($categorias as $cat): ?>
                        <tr class="border-b dark:border-gray-700">
                            <!-- ID -->
                            <td class="px-4 py-2"><?php echo $cat['id']; ?></td>
                            <!-- Nombre -->
                            <td class="px-4 py-2"><?php echo $cat['nombre']; ?></td>
                            <!-- Tipo: principal o subcategoría -->
                            <td class="px-4 py-2">
                                <?php echo empty($cat['parent_id']) ? '<span class="px-2 py-1 bg-blue-100 text-blue-800 rounded">Principal</span>' : '<span class="px-2 py-1 bg-green-100 text-green-800 rounded">Subcategoría</span>'; ?>
                            </td>
                            <!-- Categoría Padre (si existe) -->
                            <td class="px-4 py-2">
                                <?php
                                if (!empty($cat['parent_id']) && isset($categoriasMap[$cat['parent_id']])) {
                                    echo $categoriasMap[$cat['parent_id']];
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <!-- Botón de eliminar -->
                            <td class="px-4 py-2">
                                <button onclick="eliminarCategoria(<?php echo $cat['id']; ?>)" class="text-red-500 hover:underline">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Fila si no hay categorías -->
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500 dark:text-gray-400">No hay categorías registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Función JS para confirmar eliminación de una categoría -->
<script>
function eliminarCategoria(id) {
  if (confirm("¿Seguro que deseas eliminar esta categoría?")) {
    window.location.href = "<?php echo base_url(); ?>admin/deleteCategoria/" + id;
  }
}
</script>

<?php
// Carga el footer del panel de administración
footerAdmin($data);
?>
