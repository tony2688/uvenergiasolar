/**
 * Lógica de Inicio de Sesión - UV Energía Solar
 * Nivel: Senior / Modernizado
 */
document.addEventListener("DOMContentLoaded", () => {

  const formLogin = document.getElementById("formLogin");

  // Si no existe el formulario en esta vista, no hacemos nada
  if (!formLogin) return;

  formLogin.addEventListener("submit", async function (e) {
    e.preventDefault();

    // Referencias a elementos
    const txtEmail = document.getElementById("txtEmail");
    const txtPassword = document.getElementById("txtPassword");
    const btnSubmit = this.querySelector('button[type="submit"]');

    // Valores limpios
    const email = txtEmail.value.trim();
    const password = txtPassword.value.trim();

    // 1. Validación Básica
    if (email === "" || password === "") {
      Swal.fire({
        icon: "warning",
        title: "Campos incompletos",
        text: "Por favor, ingresá tu correo y contraseña.",
        confirmButtonColor: "#facc15" // Amarillo de tu marca
      });
      return;
    }

    // 2. UX: Estado de Carga (Loading)
    const originalBtnText = btnSubmit.innerHTML;
    btnSubmit.disabled = true;
    btnSubmit.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Verificando...';

    try {
      const formData = new FormData();
      formData.append("txtEmail", email);
      formData.append("txtPassword", password);

      // 3. Petición Asíncrona (Async/Await)
      const response = await fetch(base_url + "usuarios/loginUsuario", {
        method: "POST",
        body: formData,
      });

      // Parseamos respuesta
      const data = await response.json();

      if (data.status) {
        // ÉXITO
        Swal.fire({
          icon: "success",
          title: `¡Hola, ${data.nombre}!`,
          text: "Accediendo al panel...",
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true
        }).then(() => {
          // Redirigir al Dashboard (Panel Admin/Cliente)
          window.location.href = base_url + "admin/dashboard";
        });
      } else {
        // ERROR DE CREDENCIALES
        Swal.fire({
          icon: "error",
          title: "Acceso denegado",
          text: data.msg || "Usuario o contraseña incorrectos.",
          confirmButtonColor: "#ef4444" // Rojo error
        });
        restaurarBoton();
      }

    } catch (error) {
      // ERROR DE SERVIDOR / RED
      console.error("Error en login:", error);
      Swal.fire({
        icon: "error",
        title: "Error de conexión",
        text: "No pudimos conectar con el servidor. Intenta nuevamente.",
        confirmButtonColor: "#ef4444"
      });
      restaurarBoton();
    }

    // Función auxiliar para volver el botón a la normalidad
    function restaurarBoton() {
      btnSubmit.disabled = false;
      btnSubmit.innerHTML = originalBtnText;
      txtPassword.value = ""; // Limpiamos pass por seguridad
      txtPassword.focus();
    }
  });
});