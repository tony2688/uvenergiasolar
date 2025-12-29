<?php include 'Views/Templates/header.php'; ?> <!-- Incluye el encabezado del sitio -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/products-filter.css?v=<?php echo time(); ?>">


<!-- =============================
        HERO VISUAL DE PRODUCTOS
============================= -->
<section
  class="relative bg-cover bg-center bg-no-repeat w-full min-h-[50vh] flex items-center justify-center text-white text-center px-6 pt-32 md:pt-40"
  style="background-image: url('<?php echo BASE_URL; ?>Assets/images/uploads/panelsolar.jpg');">
  <!-- Capa oscura sobre la imagen -->
  <div class="absolute inset-0 bg-black/60 z-0"></div>

  <!-- Contenido del hero -->
  <div class="relative z-10 max-w-4xl animate-fade-in-down">
    <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 drop-shadow-xl">
      <span class="text-white">Nuestros</span> <span class="text-green-500">Productos</span>
    </h1>
    <p class="text-xl md:text-2xl text-white/90 font-medium leading-relaxed">
      <span class="text-yellow-400 font-semibold">Paneles</span>, <span
        class="text-yellow-400 font-semibold">inversores</span>,
      <span class="text-yellow-400 font-semibold">baterías</span>, <span
        class="text-yellow-400 font-semibold">estructuras</span> y más
    </p>
  </div>
</section>

<!-- =============================
            FILTROS PREMIUM
============================= -->
<div class="bg-white/80 backdrop-blur-xl text-gray-800 py-6 sticky top-20 z-40 shadow-lg border-b border-gray-200/50">
  <div class="max-w-7xl mx-auto px-6">
    <form method="get" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-end">

      <!-- Filtro de categoría principal -->
      <div class="space-y-2">
        <label for="cat" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
          <i class="fas fa-folder text-green-600"></i>
          Categoría Principal
        </label>
        <select name="cat" id="cat"
          class="w-full bg-white border border-gray-300 rounded-xl p-3 text-gray-800 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 hover:border-green-400 appearance-none cursor-pointer">
          <option value="">Todas las categorías</option>
          <?php foreach ($categorias as $cat): ?>
            <?php if (empty($cat['parent_id'])): ?>
              <option value="<?= $cat['id'] ?>" <?= ($_GET['cat'] ?? '') == $cat['id'] ? 'selected' : '' ?>>
                <?= $cat['nombre'] ?>
              </option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Filtro de subcategoría -->
      <div class="space-y-2">
        <label for="subcat" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
          <i class="fas fa-layer-group text-blue-600"></i>
          Subcategoría
        </label>
        <select name="subcat" id="subcat"
          class="w-full bg-white border border-gray-300 rounded-xl p-3 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 hover:border-blue-400 appearance-none cursor-pointer">
          <option value="">Todas</option>
          <?php foreach ($categorias as $subcat): ?>
            <?php if (!empty($subcat['parent_id'])): ?>
              <option value="<?= $subcat['id'] ?>" data-parent-id="<?= $subcat['parent_id'] ?>" <?= ($_GET['subcat'] ?? '') == $subcat['id'] ? 'selected' : '' ?>><?= $subcat['nombre'] ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Campo de búsqueda por nombre de producto -->
      <div class="space-y-2">
        <label for="buscar" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
          <i class="fas fa-search text-purple-600"></i>
          Buscar Producto
        </label>
        <div class="relative">
          <input type="text" name="buscar" id="buscar" value="<?= htmlspecialchars($_GET['buscar'] ?? '') ?>"
            class="w-full bg-white border border-gray-300 rounded-xl p-3 pl-10 text-gray-800 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-400"
            placeholder="Ej: Panel 600w">
          <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
        </div>
      </div>

      <!-- Ordenamiento -->
      <div class="space-y-2">
        <label for="orden" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
          <i class="fas fa-sort text-orange-600"></i>
          Ordenar Por
        </label>
        <select name="orden" id="orden"
          class="w-full bg-white border border-gray-300 rounded-xl p-3 text-gray-800 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 hover:border-orange-400 appearance-none cursor-pointer">
          <option value="fecha_desc" <?= ($_GET['orden'] ?? '') === 'fecha_desc' ? 'selected' : '' ?>>Más nuevos</option>
          <option value="fecha_asc" <?= ($_GET['orden'] ?? '') === 'fecha_asc' ? 'selected' : '' ?>>Más antiguos</option>
          <option value="nombre_asc" <?= ($_GET['orden'] ?? '') === 'nombre_asc' ? 'selected' : '' ?>>Nombre A-Z</option>
          <option value="nombre_desc" <?= ($_GET['orden'] ?? '') === 'nombre_desc' ? 'selected' : '' ?>>Nombre Z-A</option>
        </select>
      </div>

      <!-- Botón de aplicar filtros -->
      <button type="submit"
        class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold px-8 py-3 rounded-xl shadow-lg shadow-green-500/30 hover:shadow-green-500/50 transition-all duration-300 hover:scale-105 flex items-center justify-center gap-2">
        <i class="fas fa-filter"></i>
        Aplicar Filtros
      </button>
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
                  <img src="<?= BASE_URL ?>Assets/uploads/<?= htmlspecialchars($producto['imagen']) ?>"
                    alt="<?= htmlspecialchars($producto['nombre']) ?>" class="w-full h-48 object-cover">
                  <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><?= htmlspecialchars($producto['nombre']) ?></h3>
                    <p class="text-gray-600 text-sm mb-3"><?= htmlspecialchars($producto['descripcion']) ?></p>
                    <?php
                    // Mensaje precargado para WhatsApp
                    $msg = urlencode("Hola, me interesa el producto: {$producto['nombre']} (categoría: {$producto['categoria']}). ¿Podrían darme más información?");
                    ?>
                    <a href="https://wa.me/5493865586322?text=<?= $msg ?>" target="_blank"
                      class="inline-block bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition">
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
      <!-- Empty State Premium -->
      <div class="flex flex-col items-center justify-center py-20 px-4">
        <div
          class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-6 shadow-lg">
          <i class="fas fa-box-open text-6xl text-gray-400"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-3">No hay productos disponibles</h3>
        <p class="text-gray-600 text-center max-w-md mb-6">
          Actualmente no tenemos productos que coincidan con tu búsqueda. Intenta ajustar los filtros o vuelve más tarde.
        </p>
        <a href="<?= base_url(); ?>productos"
          class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 flex items-center gap-2">
          <i class="fas fa-redo"></i>
          Ver todos los productos
        </a>
      </div>
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
        <a href="<?= $url ?>"
          class="px-4 py-2 border rounded <?= ($i == ($_GET['pagina'] ?? 1)) ? 'bg-green-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-200' ?>">
          <?= $i ?>
        </a>
      <?php endfor; ?>
    </div>
  </div>
</section>

<?php include 'Views/Templates/footer.php'; ?> <!-- Incluye el footer del sitio -->

<!-- Script para ocultar dinámicamente las subcategorías que no pertenecen a la categoría seleccionada -->
<script src="<?php echo BASE_URL; ?>Assets/js/subcategorias.js"></script>