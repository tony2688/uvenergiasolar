<?php
// Carga del header utilizando la función headerAdmin y pasando los datos correspondientes
headerAdmin($data);
?>

<!-- Sección principal centrada vertical y horizontalmente, con fondo oscuro en modo dark -->
<section class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-[oklch(0.623_0.214_259.815)] dark:bg-gray-900">

  <!-- Contenedor del formulario con estilos para modo claro y oscuro -->
  <div class="max-w-md w-full bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">

    <!-- Título del formulario -->
    <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white mb-6">Iniciar Sesión</h2>

    <!-- Formulario de inicio de sesión -->
    <form id="formLogin" class="space-y-4">

      <!-- Campo de correo electrónico -->
      <div>
        <label for="txtEmail" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo electrónico</label>
        <input type="email" name="txtEmail" id="txtEmail" required
          class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-white focus:ring-primary focus:border-primary">
      </div>

      <!-- Campo de contraseña -->
      <div>
        <label for="txtPassword" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
        <input type="password" name="txtPassword" id="txtPassword" required
          class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-white focus:ring-primary focus:border-primary">
      </div>

      <!-- Recordarme y enlace para recuperar contraseña -->
      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center text-gray-700 dark:text-gray-300">
          <input type="checkbox" class="mr-2"> Recordarme
        </label>
        <a href="#" class="text-primary hover:underline">¿Olvidaste tu contraseña?</a>
      </div>

      <!-- Botón de envío -->
      <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white py-2 rounded-md shadow">
        Ingresar
      </button>

    </form>

    <!-- Enlace para registrarse si no tiene cuenta -->
    <div class="text-center mt-4">
      <p>¿No tenés cuenta?
        <a href="<?php echo base_url(); ?>usuarios/registro" class="text-green-500 hover:underline">Registrate</a>
      </p>
    </div>
  </div>
</section>

<!-- Variable global base_url disponible para JS -->
<script>
  const base_url = "<?php echo base_url(); ?>";
</script>

<!-- Script de validación del login -->
<script src="<?php echo base_url(); ?>Assets/js/login.js"></script>

<!-- Librería SweetAlert2 para notificaciones -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
// Carga del footer utilizando la función footerAdmin
footerAdmin($data);
?>
