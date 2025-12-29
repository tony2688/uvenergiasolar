document.addEventListener("DOMContentLoaded", function () {
  // Obtener referencias a los selectores de categorías y subcategorías
  const categoriaSelect = document.getElementById("cat");
  const subcategoriaSelect = document.getElementById("subcat");

  // Función para actualizar las subcategorías basadas en la categoría seleccionada
  function actualizarSubcategorias() {
    // Obtener el valor de la categoría seleccionada
    const categoriaId = categoriaSelect.value;

    // Guardar todas las opciones de subcategorías originales si no se han guardado aún
    if (!subcategoriaSelect.dataset.opciones) {
      const opciones = [];
      // Recorrer todas las opciones del selector de subcategorías
      Array.from(subcategoriaSelect.options).forEach((option) => {
        // Guardar el valor, texto y el parentId de cada opción
        opciones.push({
          value: option.value,
          text: option.text,
          parentId: option.dataset.parentId,
        });
      });
      // Guardar las opciones en el atributo dataset para utilizarlas más tarde
      subcategoriaSelect.dataset.opciones = JSON.stringify(opciones);
    }

    // Obtener las opciones guardadas desde el dataset
    const todasLasOpciones = JSON.parse(subcategoriaSelect.dataset.opciones);

    // Limpiar el selector de subcategorías, manteniendo la opción "Todas"
    while (subcategoriaSelect.options.length > 1) {
      subcategoriaSelect.remove(1); // Elimina todas las opciones excepto la primera
    }

    // Si no hay categoría seleccionada, mostrar todas las subcategorías
    if (categoriaId === "") {
      // Recorrer todas las opciones y agregar aquellas que no sean vacías
      todasLasOpciones.forEach((opcion) => {
        if (opcion.value !== "") {
          // Excluir la opción "Todas"
          const option = document.createElement("option");
          option.value = opcion.value;
          option.text = opcion.text;
          option.dataset.parentId = opcion.parentId;
          subcategoriaSelect.add(option); // Agregar la opción al select de subcategorías
        }
      });
    } else {
      // Filtrar y agregar solo las subcategorías que pertenecen a la categoría seleccionada
      todasLasOpciones.forEach((opcion) => {
        if (opcion.value !== "" && opcion.parentId === categoriaId) {
          const option = document.createElement("option");
          option.value = opcion.value;
          option.text = opcion.text;
          option.dataset.parentId = opcion.parentId;
          subcategoriaSelect.add(option); // Agregar la opción filtrada al select de subcategorías
        }
      });
    }
  }

  // Agregar evento de cambio al selector de categorías para ejecutar la función de actualización
  if (categoriaSelect) {
    categoriaSelect.addEventListener("change", actualizarSubcategorias);
  }
});
