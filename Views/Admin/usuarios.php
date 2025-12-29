<?php
// Carga el header del panel de administración, pasando los datos necesarios
headerAdmin($data);
?>

<!-- Sección visual tipo hero con imagen de fondo -->
<section class="relative w-full h-24 bg-cover bg-center bg-no-repeat"
    style="background-image: url('<?php echo BASE_URL; ?>Assets/images/uploads/ipad.jpg');">
    <!-- Capa oscura superpuesta -->
    <div class="absolute inset-0 bg-black/60 z-0"></div>
</section>

<!-- Contenedor principal del contenido -->
<section class="px-4 pt-32 pb-12 bg-gray-50 min-h-screen">

    <!-- Botón para volver al Dashboard -->
    <div class="mb-6">
        <a href="<?php echo base_url(); ?>admin/dashboard"
            class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow transition duration-200">
            ← Volver al Dashboard
        </a>
    </div>

    <!-- Título de la sección -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">👥 Usuarios Registrados</h2>

    <?php if (isset($_SESSION['mensaje'])): ?>
        <!-- Mensaje de éxito (si existe) -->
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p><?= $_SESSION['mensaje']; ?></p>
        </div>
        <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>

    <!-- Tabla de usuarios -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase">ID</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Nombres</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Apellidos</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Email</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Rol</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Status</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <?php foreach ($data['usuarios'] as $usuario): ?>
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <!-- ID del usuario -->
                        <td class="px-6 py-4"><?= $usuario['idusuario']; ?></td>

                        <!-- Nombre y apellido -->
                        <td class="px-6 py-4"><?= $usuario['nombres']; ?></td>
                        <td class="px-6 py-4"><?= $usuario['apellidos']; ?></td>

                        <!-- Email del usuario -->
                        <td class="px-6 py-4"><?= $usuario['email']; ?></td>

                        <!-- Rol del usuario -->
                        <td class="px-6 py-4">
                            <?php if (isset($usuario['nombrerol'])): ?>
                                <span class="px-2 py-1 <?= $usuario['nombrerol'] == 'Administrador' ? 'bg-purple-200 text-purple-800' : 'bg-blue-200 text-blue-800' ?> rounded-full text-xs font-semibold">
                                    <?= $usuario['nombrerol']; ?>
                                </span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-gray-200 text-gray-800 rounded-full text-xs font-semibold">No definido</span>
                            <?php endif; ?>
                        </td>

                        <!-- Estado del usuario -->
                        <td class="px-6 py-4">
                            <?php if ($usuario['status']): ?>
                                <span class="px-2 py-1 bg-green-200 text-green-800 rounded-full text-xs font-semibold">Activo</span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-red-200 text-red-800 rounded-full text-xs font-semibold">Inactivo</span>
                            <?php endif; ?>
                        </td>

                        <!-- Acción: Cambiar rol (solo para administradores) -->
                        <td class="px-6 py-4">
                            <?php if ($_SESSION['usuario']['rolid'] == 1): ?>
                                <button onclick="cambiarRol(<?= $usuario['idusuario']; ?>, <?= isset($usuario['rolid']) ? $usuario['rolid'] : 0; ?>)"
                                    class="text-blue-600 hover:text-blue-800 mr-2">
                                    Cambiar rol
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para cambiar el rol del usuario -->
    <div id="modalCambiarRol" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-lg font-semibold mb-4">Cambiar Rol de Usuario</h3>

            <!-- Formulario para enviar nuevo rol -->
            <form id="formCambiarRol" method="POST" action="<?php echo base_url(); ?>admin/cambiarRolUsuario" class="space-y-4">
                <!-- Campo oculto: ID del usuario -->
                <input type="hidden" id="idUsuario" name="idUsuario" value="">

                <!-- Selector de roles -->
                <div>
                    <label for="rolUsuario" class="block text-sm font-medium text-gray-700">Seleccionar Rol:</label>
                    <select id="rolUsuario" name="rolUsuario"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                        <option value="1">Administrador</option>
                        <option value="2">Cliente</option>
                    </select>
                </div>

                <!-- Botones del modal -->
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="cerrarModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts para manejar el modal -->
    <script>
        // Abre el modal y carga datos del usuario
        function cambiarRol(idUsuario, rolActual) {
            document.getElementById('idUsuario').value = idUsuario;
            document.getElementById('rolUsuario').value = rolActual || 2;
            document.getElementById('modalCambiarRol').classList.remove('hidden');
        }

        // Cierra el modal manualmente
        function cerrarModal() {
            document.getElementById('modalCambiarRol').classList.add('hidden');
        }

        // Cierra el modal si se hace clic fuera del contenido
        document.getElementById('modalCambiarRol').addEventListener('click', function(e) {
            if (e.target === this) {
                cerrarModal();
            }
        });
    </script>

    <?php
    // Carga el footer del panel de administración
    footerAdmin($data);
    ?>