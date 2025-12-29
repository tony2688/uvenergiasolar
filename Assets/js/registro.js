/**
 * Lógica de Registro de Usuarios - UV Energía Solar
 * Nivel: Senior / Modernizado
 */

document.addEventListener("DOMContentLoaded", () => {

  // Usamos getElementById que es más rápido y específico que querySelector
  const formRegistro = document.getElementById("formRegistro");

  // Guard clause: Si no existe el formulario (estamos en otra página), no ejecutamos nada
  if (!formRegistro) return;

  formRegistro.addEventListener("submit", async function (e) {
    e.preventDefault();

    // Referencias a elementos
    const btnSubmit = this.querySelector('button[type="submit"]');

    // Obtener valores limpios
    const nombre = document.getElementById("txtNombre").value.trim();
    const apellido = document.getElementById("txtApellido").value.trim();
    const email = document.getElementById("txtEmail").value.trim();
    const password = document.getElementById("txtPassword").value;
    const confirm = document.getElementById("txtPasswordConfirm").value;
    const terms = document.getElementById("terms").checked;

    // --- 1. VALIDACIONES ---

    // Campos vacíos
    if (!nombre || !apellido || !email || !password || !confirm) {
      Swal.fire("Faltan datos", "Por favor, completá todos los campos obligatorios.", "warning");
      return;
    }

    // Formato Email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      Swal.fire("Email inválido", "El formato del correo electrónico no es correcto.", "error");
      return;
    }

    // Seguridad Contraseña (Mínimo 8 caracteres, 1 mayúscula, 1 número)
    const passRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (!passRegex.test(password)) {
      Swal.fire({
        icon: "warning",
        title: "Contraseña insegura",
        html: "La contraseña debe tener:<br>• Mínimo 8 caracteres<br>• Al menos una mayúscula<br>• Al menos un número"
      });
      return;
    }

    // Coincidencia de contraseñas
    if (password !== confirm) {
      Swal.fire("Error", "Las contraseñas ingresadas no coinciden.", "error");
      return;
    }

    // Términos y condiciones
    if (!terms) {
      Swal.fire("Atención", "Debés aceptar los términos y condiciones para continuar.", "warning");
      return;
    }

    // --- 2. UX: ESTADO DE CARGA (LOADING) ---
    // Guardamos el texto original para restaurarlo si hay error
    const originalBtnText = btnSubmit.innerHTML;

    // Deshabilitamos el botón y cambiamos el texto
    btnSubmit.disabled = true;
    btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creando cuenta...';

    try {
      // Preparamos los datos
      const formData = new FormData(formRegistro);

      // --- 3. PETICIÓN AL SERVIDOR (Async/Await) ---
      const response = await fetch(base_url + "usuarios/setUsuario", {
        method: "POST",
        body: formData
      });

      // Parseamos la respuesta JSON
      const data = await response.json();

      if (data.status) {
        // ÉXITO: Usuario creado
        Swal.fire({
          icon: "success",
          title: "¡Bienvenido a UV Energía Solar!",
          text: data.msg,
          confirmButtonColor: "#16a34a", // Verde corporativo
          confirmButtonText: "Iniciar Sesión"
        }).then((result) => {
          if (result.isConfirmed || result.isDismissed) {
            window.location.href = base_url + "usuarios/login";
          }
        });

        // Limpiamos el formulario
        formRegistro.reset();
      } else {
        // ERROR DE LÓGICA (Ej: Email ya existe)
        Swal.fire({
          icon: "error",
          title: "No se pudo registrar",
          text: data.msg,
          confirmButtonColor: "#ef4444"
        });
        restaurarBoton();
      }

    } catch (error) {
      // ERROR DE RED O SERVIDOR
      console.error("Error en registro:", error);
      Swal.fire({
        icon: "error",
        title: "Error de conexión",
        text: "Hubo un problema al intentar conectar con el servidor. Verificá tu conexión a internet.",
        confirmButtonColor: "#ef4444"
      });
      restaurarBoton();
    }

    // Función auxiliar para restaurar el botón en caso de fallo
    function restaurarBoton() {
      btnSubmit.disabled = false;
      btnSubmit.innerHTML = originalBtnText;
    }
  });
});