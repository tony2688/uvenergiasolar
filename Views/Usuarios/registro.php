<?php
// Carga el encabezado de administración con los datos necesarios
headerAdmin($data);
?>

<!-- Contenedor principal centrado verticalmente -->
<div class="flex justify-center items-center min-h-screen bg-gray-100">

    <!-- Tarjeta de formulario con fondo blanco -->
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

        <!-- Título del formulario -->
        <h2 class="text-2xl font-bold mb-6 text-center">Crear Cuenta</h2>

        <!-- Formulario de registro de usuario -->
        <form id="formRegistro" action="<?php echo base_url(); ?>usuarios/setUsuario" method="POST" class="space-y-4">

            <!-- Campos de nombre y apellido -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="txtNombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="txtNombre" name="txtNombre"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                               focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tu nombre" required>
                </div>

                <div>
                    <label for="txtApellido" class="block text-sm font-medium text-gray-700">Apellido</label>
                    <input type="text" id="txtApellido" name="txtApellido"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                               focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tu apellido" required>
                </div>
            </div>

            <!-- Campo de correo electrónico -->
            <div>
                <label for="txtEmail" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="txtEmail" name="txtEmail"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                           focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Correo electrónico" required>
            </div>

            <!-- Campo de contraseña -->
            <div>
                <label for="txtPassword" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="txtPassword" name="txtPassword"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                           focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Contraseña" required>
            </div>

            <!-- Campo para confirmar contraseña -->
            <div>
                <label for="txtPasswordConfirm" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password" id="txtPasswordConfirm" name="txtPasswordConfirm"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                           focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Confirmar contraseña" required>
            </div>

            <!-- Aceptación de términos y condiciones -->
            <div class="flex items-center">
                <input id="terms" name="terms" type="checkbox"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                <label for="terms" class="ml-2 block text-sm text-gray-900">
                    Acepto los
                    <a href="#" class="text-blue-600 hover:text-blue-500">términos y condiciones</a>
                </label>
            </div>

            <!-- Botón de envío del formulario -->
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm 
                           text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Registrarse
                </button>
            </div>

            <!-- Enlace para iniciar sesión si ya tiene cuenta -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">
                    ¿Ya tienes una cuenta?
                    <a href="<?php echo base_url(); ?>usuarios/login"
                        class="font-medium text-blue-600 hover:text-blue-500">
                        Iniciar Sesión
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>

<!-- Variable JS con la URL base del proyecto -->
<script>
    const base_url = "<?php echo base_url(); ?>";
</script>

<!-- Script de validación personalizada para el formulario de registro -->
<script src="<?php echo BASE_URL; ?>Assets/js/registro.js"></script>

<!-- Librería SweetAlert para mostrar alertas visuales -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
// Carga el pie de página del panel de administración
footerAdmin($data);
?>