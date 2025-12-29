document.addEventListener("DOMContentLoaded", function () {
  // Obtener los elementos del DOM
  const buscador = document.getElementById("buscador");
  const filtro = document.getElementById("filtroCategoria");
  const productos = document.querySelectorAll(".producto");

  // Verificar si los elementos existen antes de usarlos
  if (!buscador || !filtro || productos.length === 0) {
    // Si no existen los elementos necesarios, no hacer nada
    return;
  }

  // Función para filtrar productos según el texto de búsqueda y la categoría seleccionada
  function filtrarProductos() {
    // Obtener los valores de búsqueda y categoría
    const texto = buscador.value.toLowerCase();
    const categoria = filtro.value.toLowerCase();

    // Recorrer todos los productos y verificar si coinciden con los criterios
    productos.forEach((producto) => {
      const nombre = producto.dataset.nombre; // Obtener el nombre del producto
      const cat = producto.dataset.categoria; // Obtener la categoría del producto

      // Verificar si el nombre del producto coincide con el texto de búsqueda
      const coincideNombre = nombre.includes(texto);
      // Verificar si la categoría del producto coincide con la seleccionada
      const coincideCategoria = categoria === "" || cat === categoria;

      // Mostrar el producto si coincide con ambos criterios, de lo contrario, ocultarlo
      producto.style.display =
        coincideNombre && coincideCategoria ? "block" : "none";
    });
  }

  // Añadir un listener para el evento 'input' del buscador
  buscador.addEventListener("input", filtrarProductos);
  // Añadir un listener para el evento 'change' del filtro de categoría
  filtro.addEventListener("change", filtrarProductos);
});
