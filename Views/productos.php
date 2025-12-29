<?php include 'Views/Templates/header.php'; ?> <!-- Incluye el encabezado del sitio -->

<!-- =============================
        HERO VISUAL DE PRODUCTOS
============================= -->
<section class="relative bg-cover bg-center bg-no-repeat w-full min-h-[50vh] flex items-center justify-center text-white text-center px-6 pt-32 md:pt-40" style="background-image: url('<?php echo BASE_URL; ?>Assets/images/uploads/panelsolar.jpg');">
  <!-- Capa oscura sobre la imagen -->
  <div class="absolute inset-0 bg-black/60 z-0"></div>

  <!-- Contenido del hero -->
  <div class="relative z-10 max-w-4xl animate-fade-in-down">
    <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 drop-shadow-xl">
      <span class="text-white">Nuestros</span> <span class="text-green-500">Productos</span>
    </h1>
    <p class="text-xl md:text-2xl text-white/90 font-medium leading-relaxed">
      <span class="text-yellow-400 font-semibold">Paneles</span>, <span class="text-yellow-400 font-semibold">inversores</span>,
      <span class="text-yellow-400 font-semibold">baterías</span>, <span class="text-yellow-400 font-semibold">estructuras</span> y más
    </p>
  </div>
</section>

<!-- =============================
            FILTROS
============================= -->
<div class="bg-green-600 text-white py-4 sticky top-0 z-50 shadow-md">
  <div class="max-w-7xl mx-auto px-6 flex flex-wrap gap-4 items-center justify-between">
    <form method="get" class="flex flex-wrap gap-4 items-center w-full">

      <!-- Filtro de categoría principal -->
      <div>
        <label for="cat" class="block text-sm font-semibold">Categoría principal</label>
        <select name="cat" id="cat" class="text-black rounded p-2">
          <option value="">Todas</option>
          <?php foreach ($categorias as $cat): ?>
            <?php if (empty($cat['parent_id'])): ?>
              <option value="<?= $cat['id'] ?>" <?= ($_GET['cat'] ?? '') == $cat['id'] ? 'selected' : '' ?>><?= $cat['nombre'] ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Filtro de subcategoría -->
      <div>
        <label for="subcat" class="block text-sm font-semibold">Subcategoría</label>
        <select name="subcat" id="subcat" class="text-black rounded p-2">
          <option value="">Todas</option>
          <?php foreach ($categorias as $subcat): ?>
            <?php if (!empty($subcat['parent_id'])): ?>
              <option value="<?= $subcat['id'] ?>" data-parent-id="<?= $subcat['parent_id'] ?>" <?= ($_GET['subcat'] ?? '') == $subcat['id'] ? 'selected' : '' ?>><?= $subcat['nombre'] ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Campo de búsqueda por nombre de producto -->
      <div>
        <label for="buscar" class="block text-sm font-semibold">Buscar producto</label>
        <input type="text" name="buscar" id="buscar" value="<?= htmlspecialchars($_GET['buscar'] ?? '') ?>" class="rounded p-2 text-black" placeholder="Ej: Panel 600w">
      </div>

      <!-- Ordenamiento -->
      <div>
        <label for="orden" class="block text-sm font-semibold">Ordenar por</label>
        <select name="orden" id="orden" class="text-black rounded p-2">
          <option value="fecha_desc" <?= ($_GET['orden'] ?? '') === 'fecha_desc' ? 'selected' : '' ?>>Más nuevos</option>
          <option value="fecha_asc" <?= ($_GET['orden'] ?? '') === 'fecha_asc' ? 'selected' : '' ?>>Más antiguos</option>
          <option value="nombre_asc" <?= ($_GET['orden'] ?? '') === 'nombre_asc' ? 'selected' : '' ?>>Nombre A-Z</option>
          <option value="nombre_desc" <?= ($_GET['orden'] ?? '') === 'nombre_desc' ? 'selected' : '' ?>>Nombre Z-A</option>
        </select>
      </div>

      <!-- Botón de aplicar filtros -->
      <button type="submit" class="bg-white text-green-700 font-semibold px-6 py-2 rounded shadow hover:bg-gray-100 transition mt-5 md:mt-7">Aplicar</button>
    </form>
  </div>
</div>

<!-- =============================
        SECCIÓN DE PRODUCTOS
============================= -->
<section class="px-4 py-16 bg-gray-50 min-h-screen">
  <div class="max-w-7xl mx-auto">
    <?php if (!empty($productos)): // Si hay productos, los agrupamos por categoría
      $agrupados = [];
      foreach ($productos as $prod) {
        $catID = $prod['categoria_id'] ?? 0;
        $agrupados[$catID][] = $prod;
      }
    ?>
      <div class="space-y-6">
        <!-- Recorremos los grupos por categoría -->
        <?php foreach ($agrupados as $catID => $grupo): ?>
          <details class="bg-white rounded-xl shadow-md open" open>
            <summary class="text-2xl font-bold text-green-700 px-6 py-4 cursor-pointer flex justify-between items-center">
              <?= htmlspecialchars($grupo[0]['categoria'] ?? 'Sin categoría') ?>
              <i class="fas fa-chevron-up rotate-180 group-open:rotate-0 transition-transform"></i>
            </summary>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 p-6 pt-0">
              <!-- Recorremos productos del grupo -->
              <?php foreach ($grupo as $producto): ?>
                <div class="bg-white rounded-xl shadow hover:shadow-lg overflow-hidden transition duration-300">
                  <img src="<?= BASE_URL ?>Assets/uploads/<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>" class="w-full h-48 object-cover">
                  <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><?= htmlspecialchars($producto['nombre']) ?></h3>
                    <p class="text-gray-600 text-sm mb-3"><?= htmlspecialchars($producto['descripcion']) ?></p>
                    <?php
                    // Mensaje precargado para WhatsApp
                    $msg = urlencode("Hola, me interesa el producto: {$producto['nombre']} (categoría: {$producto['categoria']}). ¿Podrían darme más información?");
                    ?>
                    <a href="https://wa.me/5493865586322?text=<?= $msg ?>" target="_blank" class="inline-block bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition">
                      Pedir info por WhatsApp
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </details>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <!-- Si no hay productos -->
      <p class="text-center text-gray-500 text-lg">No hay productos disponibles aún.</p>
    <?php endif; ?>

    <!-- =============================
              Paginación
    ============================== -->
    <div class="mt-10 flex justify-center gap-2">
      <?php for ($i = 1; $i <= $totalPaginas; $i++):
        // Se construye la URL con los parámetros actuales
        $params = $_GET;
        $params['pagina'] = $i;
        $url = '?' . http_build_query($params);
      ?>
        <a href="<?= $url ?>" class="px-4 py-2 border rounded <?= ($i == ($_GET['pagina'] ?? 1)) ? 'bg-green-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-200' ?>">
          <?= $i ?>
        </a>
      <?php endfor; ?>
    </div>
  </div>
</section>

<?php include 'Views/Templates/footer.php'; ?> <!-- Incluye el footer del sitio -->

<!-- Script para ocultar dinámicamente las subcategorías que no pertenecen a la categoría seleccionada -->
<script src="<?php echo BASE_URL; ?>Assets/js/subcategorias.js"></script>