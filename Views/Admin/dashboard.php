<?php
// ==============================
// PROTECCIÓN DE ACCESO
// ==============================
// Verifica si el usuario está logueado y si tiene rol de administrador (rolid = 1)
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rolid'] != 1) {
  // Si no es admin, redirige al inicio
  header("Location: " . base_url());
  exit();
}

// Carga el encabezado del panel de administración
headerAdmin($data);
?>

<!-- Hero visual con imagen de fondo (parallax) -->
<section class="relative w-full h-24 bg-cover bg-center bg-no-repeat"
  style="background-image: url('<?php echo BASE_URL; ?>Assets/images/uploads/ipad.jpg');">
  <!-- Capa oscura encima para mejor contraste -->
  <div class="absolute inset-0 bg-black/60 z-0"></div>
</section>

<!-- Contenedor principal del panel de administración -->
<section class="flex min-h-screen bg-gray-50 dark:bg-gray-900">

  <!-- Sidebar (barra lateral izquierda del panel) -->
  <aside class="w-64 bg-gray-800 text-white py-6 px-4 shadow-md">
    <!-- Título del panel -->
    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
      <i class="fas fa-cogs text-green-400"></i> Panel Admin
    </h2>

    <!-- Navegación del panel -->
    <nav class="space-y-3">
      <!-- Enlace a gestión de productos -->
      <a href="<?php echo base_url(); ?>admin/productos" class="block hover:bg-gray-700 px-3 py-2 rounded flex items-center gap-2">
        <i class="fas fa-box"></i> Productos
      </a>

      <!-- Enlace a gestión de categorías -->
      <a href="<?php echo base_url(); ?>admin/categorias" class="block hover:bg-gray-700 px-3 py-2 rounded flex items-center gap-2">
        <i class="fas fa-tags"></i> Categorías
      </a>

      <!-- Enlace a gestión de usuarios -->
      <a href="<?php echo base_url(); ?>admin/usuarios" class="block hover:bg-gray-700 px-3 py-2 rounded flex items-center gap-2">
        <i class="fas fa-users"></i> Usuarios
      </a>

      <!-- Enlace para volver al sitio principal -->
      <a href="<?php echo base_url(); ?>" class="block text-sm text-gray-400 mt-10 hover:text-white flex items-center gap-2">
        <i class="fas fa-arrow-left"></i> Volver al sitio
      </a>
    </nav>
  </aside>

  <!-- Área principal del contenido (a la derecha del sidebar) -->
  <div class="flex-1 p-6">
    <!-- Mensaje de bienvenida personalizado con nombre del usuario -->
    <h1 class="text-3xl font-semibold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
      <i class="fas fa-user-shield text-green-500"></i>
      Bienvenido, <?php echo $_SESSION['usuario']['nombres']; ?>
    </h1>

    <!-- Mensaje introductorio -->
    <p class="text-gray-600 dark:text-gray-300">Selecciona una sección del panel para administrar el sitio.</p>
  </div>
</section>

<?php
// Carga el pie de página del panel de administración
footerAdmin($data);
?>