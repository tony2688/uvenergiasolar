<?php
// Carga el header del panel de administración con los datos necesarios
headerAdmin($data);
?>

<?php
// Inicializa el array de productos desde $data, o vacío si no está definido
$productos = $data['productos'] ?? [];

// Inicializa el array de categorías desde $data, o vacío si no está definido
$categorias = $data['categorias'] ?? [];
?>

<!-- Sección visual tipo hero con imagen de fondo -->
<section class="relative w-full h-24 bg-cover bg-center bg-no-repeat"
  style="background-image: url('<?php echo BASE_URL; ?>Assets/images/uploads/ipad.jpg');">
  <!-- Capa oscura superpuesta para mejorar contraste del contenido -->
  <div class="absolute inset-0 bg-black/60 z-0"></div>
</section>

<!-- Contenedor principal de la sección de productos -->
<section class="px-4 pt-32 pb-12 bg-gray-50 min-h-screen">

  <!-- Botón para volver al dashboard del administrador -->
  <div class="mb-6">
    <a href="<?php echo base_url(); ?>admin/dashboard"
      class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow transition duration-200">
      ← Volver al Dashboard
    </a>
  </div>

  <!-- Título de la sección de productos -->
  <h2 class="text-2xl font-semibold text-gray-700 mb-6">📦 Gestión de Productos</h2>

  <?php if (isset($_SESSION['mensaje'])): ?>
    <!-- Alerta visual si hay un mensaje en sesión -->
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
      <p><?= $_SESSION['mensaje']; ?></p>
    </div>
    <?php unset($_SESSION['mensaje']); ?>
  <?php endif; ?>

  <!-- Botón para mostrar u ocultar el formulario de agregar producto -->
  <button onclick="mostrarFormulario()"
    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6">
    + Agregar Producto
  </button>

  <!-- Formulario para agregar nuevo producto (oculto por defecto) -->
  <div id="formularioProducto" class="hidden bg-white rounded-lg shadow-md overflow-hidden mb-6">

    <!-- Encabezado del formulario -->
    <div class="bg-gray-800 text-white px-6 py-3">
      <h3 class="text-lg font-semibold">Agregar Nuevo Producto</h3>
    </div>

    <!-- Formulario HTML que envía los datos vía POST -->
    <form id="formProducto"
      enctype="multipart/form-data"
      method="POST"
      action="<?php echo base_url(); ?>admin/setProducto"
      class="p-6 space-y-4">

      <!-- Grid con campos del formulario -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <!-- Campo: Nombre del producto -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
          <input type="text" name="nombre" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <!-- Campo: Categoría principal -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
          <select name="categoria_id" id="categoria_id" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            <option value="">Selecciona una categoría</option>
            <?php foreach ($categorias as $cat): ?>
              <?php if (empty($cat['parent_id'])): ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre']; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Campo: Subcategoría -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Subcategoría</label>
          <select name="subcategoria_id" id="subcategoria_id"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            <option value="">Selecciona una subcategoría</option>
            <?php foreach ($categorias as $subcat): ?>
              <?php if (!empty($subcat['parent_id'])): ?>
                <option value="<?php echo $subcat['id']; ?>"
                  data-parent-id="<?php echo $subcat['parent_id']; ?>"
                  class="subcategoria-option">
                  <?php echo $subcat['nombre']; ?>
                </option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Campo: Descripción del producto -->
        <div class="md:col-span-2">
          <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
          <textarea name="descripcion" rows="3"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"></textarea>
        </div>

        <!-- Campo: Imagen del producto -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
          <input type="file" name="imagen" accept="image/*" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
        </div>
      </div>

      <!-- Botones del formulario -->
      <div class="flex justify-end space-x-3 pt-3 border-t">
        <!-- Botón cancelar -->
        <button type="button" onclick="mostrarFormulario()"
          class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition duration-200">
          Cancelar
        </button>
        <!-- Botón guardar -->
        <button type="submit"
          class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition duration-200">
          Guardar Producto
        </button>
      </div>
    </form>
  </div>

  <!-- Tabla de productos existentes -->
  <div class="overflow-x-auto">
    <!-- Tabla con diseño responsive y sombra -->
    <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">

      <!-- Encabezado de la tabla -->
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="px-6 py-3 text-left font-semibold uppercase">Imagen</th>
          <th class="px-6 py-3 text-left font-semibold uppercase">Nombre</th>
          <th class="px-6 py-3 text-left font-semibold uppercase">Categoría</th>
          <th class="px-6 py-3 text-left font-semibold uppercase">Descripción</th>
          <th class="px-6 py-3 text-left font-semibold uppercase">Acciones</th>
        </tr>
      </thead>

      <!-- Cuerpo de la tabla -->
      <tbody class="divide-y divide-gray-200">
        <?php if (!empty($productos)): ?>
          <?php foreach ($productos as $producto): ?>
            <!-- Fila de producto -->
            <tr class="hover:bg-gray-100 transition duration-200">

              <!-- Columna: Imagen del producto -->
              <td class="px-6 py-4">
                <img src="<?php echo base_url(); ?>Assets/uploads/<?php echo $producto['imagen']; ?>"
                  class="w-16 h-16 object-cover rounded-md shadow">
              </td>

              <!-- Columna: Nombre del producto -->
              <td class="px-6 py-4"><?php echo $producto['nombre']; ?></td>

              <!-- Columna: Categoría -->
              <td class="px-6 py-4">
                <span class="px-2 py-1 bg-blue-200 text-blue-800 rounded-full text-xs font-semibold">
                  <?php echo $producto['categoria']; ?>
                </span>
              </td>

              <!-- Columna: Descripción -->
              <td class="px-6 py-4"><?php echo $producto['descripcion']; ?></td>

              <!-- Columna: Acciones (editar y eliminar) -->
              <td class="px-6 py-4">
                <!-- Botón de editar -->
                <button class="text-blue-600 hover:text-blue-800 mr-2"
                  onclick="editarProducto(
                        <?php echo $producto['id']; ?>,
                        '<?php echo addslashes($producto['nombre']); ?>',
                        '<?php echo $producto['categoria_id']; ?>',
                        '<?php echo $producto['subcategoria_id'] ?? ''; ?>',
                        '<?php echo addslashes($producto['descripcion']); ?>',
                        '<?php echo $producto['imagen']; ?>'
                      )">
                  Editar
                </button>

                <!-- Botón de eliminar -->
                <button class="text-red-600 hover:text-red-800"
                  onclick="eliminarProducto(<?php echo $producto['id']; ?>)">
                  Eliminar
                </button>
              </td>

            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <!-- Si no hay productos -->
          <tr>
            <td colspan="5" class="text-center py-6 text-gray-500">
              No hay productos registrados.
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal para editar producto (se muestra al hacer clic en "Editar") -->
  <div id="modalEditarProducto" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">

    <!-- Contenedor del formulario dentro del modal -->
    <div class="bg-white rounded-lg p-6 w-full max-w-2xl">

      <!-- Título del modal -->
      <h3 class="text-lg font-semibold mb-4">Editar Producto</h3>

      <!-- Formulario de edición -->
      <form id="formEditarProducto" method="POST" enctype="multipart/form-data" class="space-y-4">

        <!-- Campo oculto: ID del producto -->
        <input type="hidden" id="idProducto" name="idProducto" value="">

        <!-- Grid de campos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

          <!-- Campo: Nombre -->
          <div>
            <label for="editNombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text" id="editNombre" name="nombre" required
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
          </div>

          <!-- Campo: Categoría -->
          <div>
            <label for="editCategoria" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
            <select id="editCategoria" name="categoria_id" required
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
              <option value="">Selecciona una categoría</option>
              <?php foreach ($categorias as $cat): ?>
                <?php if (empty($cat['parent_id'])): ?>
                  <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre']; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Campo: Subcategoría -->
          <div>
            <label for="editSubcategoria" class="block text-sm font-medium text-gray-700 mb-1">Subcategoría</label>
            <select id="editSubcategoria" name="subcategoria_id"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
              <option value="">Selecciona una subcategoría</option>
              <?php foreach ($categorias as $subcat): ?>
                <?php if (!empty($subcat['parent_id'])): ?>
                  <option value="<?php echo $subcat['id']; ?>"
                    data-parent-id="<?php echo $subcat['parent_id']; ?>"
                    class="subcategoria-option">
                    <?php echo $subcat['nombre']; ?>
                  </option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Campo: Descripción -->
          <div class="md:col-span-2">
            <label for="editDescripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
            <textarea id="editDescripcion" name="descripcion" rows="3"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"></textarea>
          </div>

          <!-- Campo: Imagen (opcional) -->
          <div>
            <label for="editImagen" class="block text-sm font-medium text-gray-700 mb-1">Nueva Imagen (opcional)</label>
            <input type="file" id="editImagen" name="imagen" accept="image/*"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
          </div>

          <!-- Vista previa de la imagen actual -->
          <div id="imagenActual" class="flex items-center">
            <span class="text-sm text-gray-500 mr-2">Imagen actual:</span>
            <img id="previewImagenActual" src="" class="w-16 h-16 object-cover rounded-md shadow">
          </div>
        </div>

        <!-- Botones del modal -->
        <div class="flex justify-end space-x-3 pt-3 border-t">
          <!-- Cancelar edición -->
          <button type="button" onclick="cerrarModalEditar()"
            class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition duration-200">
            Cancelar
          </button>

          <!-- Confirmar edición -->
          <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200">
            Actualizar Producto
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Script: Muestra u oculta el formulario de agregar producto -->
  <script>
    function mostrarFormulario() {
      document.getElementById("formularioProducto").classList.toggle("hidden");
    }

    // Script: Rellena el formulario de edición con datos del producto seleccionado
    function editarProducto(idProducto, nombre, categoria_id, subcategoria_id, descripcion, imagen) {
      document.getElementById('idProducto').value = idProducto;
      document.getElementById('editNombre').value = nombre;
      document.getElementById('editCategoria').value = categoria_id;
      document.getElementById('editSubcategoria').value = subcategoria_id;
      document.getElementById('editDescripcion').value = descripcion;
      document.getElementById('previewImagenActual').src = base_url + 'Assets/uploads/' + imagen;
      document.getElementById('modalEditarProducto').classList.remove('hidden');
    }

    // Script: Cierra el modal de edición
    function cerrarModalEditar() {
      document.getElementById('modalEditarProducto').classList.add('hidden');
    }

    // Script: Permite cerrar el modal haciendo clic fuera del contenido
    document.getElementById('modalEditarProducto').addEventListener('click', function(e) {
      if (e.target === this) {
        cerrarModalEditar();
      }
    });
  </script>

  <!-- Librería SweetAlert2 para alertas modernas -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- JS personalizado para productos (acciones como eliminar) -->
  <script src="<?php echo base_url(); ?>Assets/js/productos.js"></script>

  <!-- Footer común del sitio (incluido como plantilla) -->
  <?php include 'Views/Templates/footer.php'; ?>

  <!-- Scripts adicionales para manejo dinámico de subcategorías y lógica extra -->
  <script src="<?php echo BASE_URL; ?>Assets/js/admin_subcategorias.js"></script>
  <script src="<?php echo BASE_URL; ?>Assets/js/admin_productos.js"></script>

  <!-- Cierre del footer del panel de administración -->
  <?php footerAdmin($data); ?>