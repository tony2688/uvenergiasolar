<?php
// Incluye el encabezado del panel de administración si la función está disponible
headerAdmin($data);
?>

<!-- Contenedor principal del panel de usuarios -->
<div class="bg-white p-6 rounded-lg shadow-md">

    <!-- Encabezado con título y botón para agregar nuevo usuario -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Gestión de Usuarios</h2>
        <button id="btnNuevoUsuario" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus"></i> Nuevo Usuario
        </button>
    </div>

    <!-- Tabla donde se mostrarán los usuarios -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Nombre</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Rol</th>
                    <th class="py-2 px-4 border-b text-left">Estado</th>
                    <th class="py-2 px-4 border-b text-left">Acciones</th>
                </tr>
            </thead>
            <tbody id="tableUsuarios">
                <!-- Aquí se inyectarán dinámicamente los usuarios desde JS -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para crear o editar un usuario -->
<div id="modalUsuario" class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">

        <!-- Contenido del modal -->
        <div class="mt-3">
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4" id="modalTitle">Nuevo Usuario</h3>

            <!-- Formulario del usuario -->
            <form id="formUsuario" class="space-y-4">
                <input type="hidden" id="idUsuario" name="idUsuario" value=""> <!-- ID oculto para edición -->

                <!-- Campos de nombre y apellido -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="txtNombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <div>
                        <label for="txtApellido" class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input type="text" id="txtApellido" name="txtApellido" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>

                <!-- Campo de email -->
                <div>
                    <label for="txtEmail" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="txtEmail" name="txtEmail" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Campo de contraseña -->
                <div>
                    <label for="txtPassword" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" id="txtPassword" name="txtPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Dejar en blanco para mantener la contraseña actual (en caso de edición)</p>
                </div>

                <!-- Selección de rol -->
                <div>
                    <label for="listRolid" class="block text-sm font-medium text-gray-700">Rol</label>
                    <select id="listRolid" name="listRolid" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">Seleccionar</option>
                        <option value="1">Administrador</option>
                        <option value="2">Cliente</option>
                    </select>
                </div>

                <!-- Selección de estado -->
                <div>
                    <label for="listStatus" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select id="listStatus" name="listStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">Seleccionar</option>
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>

                <!-- Botones del modal -->
                <div class="flex justify-end space-x-3 mt-5">
                    <button type="button" id="btnCerrarModal" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// Incluye el pie del panel de administración
footerAdmin($data);
?>