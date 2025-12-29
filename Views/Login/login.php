<?php
// Carga del header (que ya abre el HTML, HEAD y MAIN)
headerAdmin($data);
?>

<section
  class="min-h-[calc(100vh-60px)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-100 dark:bg-gray-900 transition-colors duration-300">

  <div
    class="max-w-md w-full bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">

    <div class="text-center mb-8">
      <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
        ¡Bienvenido de nuevo!
      </h2>
      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
        Ingresá tus credenciales para acceder al panel.
      </p>
    </div>

    <form id="formLogin" class="space-y-6">

      <div>
        <label for="txtEmail" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo
          electrónico</label>
        <div class="mt-1 relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-envelope text-gray-400"></i>
          </div>
          <input type="email" name="txtEmail" id="txtEmail" required placeholder="nombre@ejemplo.com"
            class="block w-full pl-10 pr-3 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:ring-green-500 focus:border-green-500 transition-colors sm:text-sm">
        </div>
      </div>

      <div>
        <label for="txtPassword" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
        <div class="mt-1 relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-lock text-gray-400"></i>
          </div>
          <input type="password" name="txtPassword" id="txtPassword" required placeholder="••••••••"
            class="block w-full pl-10 pr-3 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:ring-green-500 focus:border-green-500 transition-colors sm:text-sm">
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="recordarme" name="recordarme" type="checkbox"
            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded cursor-pointer">
          <label for="recordarme" class="ml-2 block text-sm text-gray-700 dark:text-gray-300 cursor-pointer">
            Recordarme
          </label>
        </div>

        <div class="text-sm">
          <a href="#"
            class="font-medium text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 transition-colors">
            ¿Olvidaste tu contraseña?
          </a>
        </div>
      </div>

      <div>
        <button type="submit"
          class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all transform hover:scale-[1.02]">
          INGRESAR
        </button>
      </div>

    </form>

    <div class="mt-8 text-center border-t border-gray-200 dark:border-gray-700 pt-6">
      <p class="text-sm text-gray-600 dark:text-gray-400">
        ¿Aún no tenés una cuenta?
        <a href="<?php echo base_url(); ?>usuarios/registro"
          class="font-bold text-green-600 hover:text-green-500 dark:text-green-400 transition-colors">
          Crear cuenta gratis
        </a>
      </p>
    </div>

  </div>
</section>

<script>
  const base_url = "<?php echo base_url(); ?>";
</script>

<script src="<?php echo base_url(); ?>Assets/js/login.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
// Carga del footer (cierra MAIN, BODY y HTML)
footerAdmin($data);
?>