/**
 * Lógica del Formulario de Contacto
 * UV Energía Solar - Nivel Senior
 */
document.addEventListener("DOMContentLoaded", () => {

    // Referencia al formulario
    const formContacto = document.getElementById("formContacto");

    // Si no existe el formulario en esta página, detenemos el script
    if (!formContacto) return;

    formContacto.addEventListener("submit", async function (e) {
        e.preventDefault();

        // Referencias a los elementos (Usando los IDs correctos de la nueva vista)
        const btnSubmit = this.querySelector('button[type="submit"]');
        const nombre = document.getElementById("nombre").value.trim();
        const correo = document.getElementById("correo").value.trim();
        const asunto = document.getElementById("asunto").value;
        const mensaje = document.getElementById("mensaje").value.trim();

        // 1. Validaciones Frontend
        if (!nombre || !correo || !asunto || !mensaje) {
            Swal.fire({
                icon: "warning",
                title: "Faltan datos",
                text: "Por favor completá los campos obligatorios (*).",
                confirmButtonColor: "#16a34a"
            });
            return;
        }

        // Validación de formato de email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(correo)) {
            Swal.fire({
                icon: "error",
                title: "Email inválido",
                text: "Por favor ingresá un correo real para poder responderte.",
                confirmButtonColor: "#16a34a"
            });
            return;
        }

        // 2. UX: Estado de Carga en el botón
        const originalText = btnSubmit.innerHTML;
        btnSubmit.disabled = true;
        btnSubmit.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Enviando...';

        try {
            const formData = new FormData(formContacto);

            // 3. Petición al Servidor (Async/Await)
            const response = await fetch(base_url + "contacto/enviarMensaje", {
                method: "POST",
                body: formData
            });

            // Parseamos la respuesta
            const data = await response.json();

            if (data.status) {
                // ÉXITO
                Swal.fire({
                    icon: "success",
                    title: "¡Mensaje Enviado!",
                    text: data.msg,
                    confirmButtonColor: "#16a34a"
                });
                formContacto.reset(); // Limpiar formulario
            } else {
                // ERROR CONTROLADO (Backend)
                Swal.fire({
                    icon: "error",
                    title: "Ups...",
                    text: data.msg,
                    confirmButtonColor: "#ef4444"
                });
            }

        } catch (error) {
            // ERROR DE RED
            console.error("Error:", error);
            Swal.fire({
                icon: "error",
                title: "Error de conexión",
                text: "No se pudo enviar el mensaje. Verificá tu internet o intentá más tarde.",
                confirmButtonColor: "#ef4444"
            });
        } finally {
            // Restaurar botón (Siempre se ejecuta, haya error o no)
            btnSubmit.disabled = false;
            btnSubmit.innerHTML = originalText;
        }
    });
});