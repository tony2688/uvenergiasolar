// Se espera que el contenido del DOM se haya cargado completamente
document.addEventListener("DOMContentLoaded", function () {
  // Obtener el formulario de producto por su ID
  const formProducto = document.getElementById("formProducto");

  // Verificar si el formulario existe en la página
  if (formProducto) {
    // Agregar un event listener para el evento de envío del formulario
    formProducto.addEventListener("submit", function (e) {
      // Evitar el comportamiento por defecto (enviar el formulario)
      e.preventDefault();

      // Crear un objeto FormData que contiene los datos del formulario
      const formData = new FormData(this);

      // Realizar una solicitud POST con los datos del formulario
      fetch(base_url + "admin/setProducto", {
        method: "POST", // Método de la solicitud
        body: formData, // El cuerpo de la solicitud contiene los datos del formulario
      })
        .then((response) => response.json()) // Procesar la respuesta como JSON
        .then((data) => {
          // Si la respuesta tiene status true, mostrar un mensaje de éxito
          if (data.status) {
            Swal.fire({
              title: "¡Éxito!", // Título del mensaje
              text: data.msg, // Mensaje proporcionado desde el servidor
              icon: "success", // Icono de éxito
              confirmButtonColor: "#3085d6", // Color del botón de confirmación
            }).then(() => {
              // Recargar la página después de mostrar el mensaje
              window.location.reload();
            });
          } else {
            // Si el status es false, mostrar un mensaje de error
            Swal.fire({
              title: "Error", // Título del mensaje
              text: data.msg, // Mensaje de error
              icon: "error", // Icono de error
              confirmButtonColor: "#3085d6", // Color del botón de confirmación
            });
          }
        })
        .catch((error) => {
          // Manejar cualquier error que ocurra durante la solicitud
          console.error("Error:", error);
          // Mostrar un mensaje de error si algo falla en la solicitud
          Swal.fire({
            title: "Error", // Título del mensaje
            text: "Ocurrió un error al procesar la solicitud", // Mensaje de error
            icon: "error", // Icono de error
            confirmButtonColor: "#3085d6", // Color del botón de confirmación
          });
        });
    });
  }
});

// Método para eliminar un producto, llamado cuando se confirma la eliminación
function eliminarProducto(idProducto) {
  // Mostrar un mensaje de confirmación con Swal
  Swal.fire({
    title: "¿Estás seguro?", // Título de la ventana
    text: "El producto será eliminado permanentemente", // Texto de la advertencia
    icon: "warning", // Icono de advertencia
    showCancelButton: true, // Mostrar un botón de cancelación
    confirmButtonColor: "#3085d6", // Color del botón de confirmación
    cancelButtonColor: "#d33", // Color del botón de cancelación
    confirmButtonText: "Sí, eliminar", // Texto del botón de confirmación
  }).then((result) => {
    // Si el usuario confirma la eliminación
    if (result.isConfirmed) {
      // Realizar una solicitud POST para eliminar el producto
      fetch(base_url + "admin/deleteProducto", {
        method: "POST", // Método de la solicitud
        headers: {
          "Content-Type": "application/x-www-form-urlencoded", // Tipo de contenido
        },
        body: "id=" + idProducto, // El ID del producto a eliminar
      })
        .then((response) => response.json()) // Procesar la respuesta como JSON
        .then((data) => {
          // Si la eliminación fue exitosa
          if (data.status) {
            Swal.fire(
              "Eliminado!", // Título del mensaje
              data.msg, // Mensaje de éxito
              "success" // Icono de éxito
            ).then(() => {
              // Recargar la página después de la eliminación
              window.location.reload();
            });
          } else {
            // Si hubo un error en la eliminación
            Swal.fire(
              "Error!", // Título del mensaje
              data.msg, // Mensaje de error
              "error" // Icono de error
            );
          }
        })
        .catch((error) => {
          // Manejar cualquier error que ocurra durante la solicitud
          Swal.fire("Error!", "No se pudo conectar con el servidor.", "error");
        });
    }
  });
}
