document.addEventListener("DOMContentLoaded", function () {
    // Obtener referencias a los selectores del formulario principal
    const categoriaSelect = document.getElementById('categoria_id');
    const subcategoriaSelect = document.getElementById('subcategoria_id');
    
    // Obtener referencias a los selectores del formulario de edición
    const editCategoriaSelect = document.getElementById('editCategoria');
    const editSubcategoriaSelect = document.getElementById('editSubcategoria');
    
    // Configurar el formulario principal si existen los elementos
    if (categoriaSelect && subcategoriaSelect) {
        configurarSelectorSubcategorias(categoriaSelect, subcategoriaSelect);
    }
    
    // Configurar el formulario de edición si existen los elementos
    if (editCategoriaSelect && editSubcategoriaSelect) {
        configurarSelectorSubcategorias(editCategoriaSelect, editSubcategoriaSelect);
    }
    
    // Función para configurar los selectores de categoría y subcategoría
    function configurarSelectorSubcategorias(catSelect, subSelect) {
        // Configurando selector de categorías y subcategorías
        
        // Función para actualizar las subcategorías basadas en la categoría seleccionada
        function actualizarSubcategorias() {
            // Obtener el valor de la categoría seleccionada
            const categoriaId = catSelect.value;
            // Categoría seleccionada
            
            // Guardar todas las opciones de subcategorías originales si no se han guardado aún
            if (!subSelect.dataset.opciones) {
                const opciones = [];
                Array.from(subSelect.options).forEach(option => {
                    if (option.value !== '') { // Excluir la opción por defecto
                        const parentId = option.getAttribute('data-parent-id');
                        // Guardando opción de subcategoría
                        opciones.push({
                            value: option.value,
                            text: option.text,
                            parentId: parentId
                        });
                    }
                });
                subSelect.dataset.opciones = JSON.stringify(opciones);
                // Opciones guardadas en dataset
            }
            
            // Obtener las opciones guardadas
            const todasLasOpciones = JSON.parse(subSelect.dataset.opciones || '[]');
            // Recuperando opciones del dataset
            
            // Limpiar el selector de subcategorías, manteniendo la opción por defecto
            while (subSelect.options.length > 1) {
                subSelect.remove(1);
            }
            
            // Si no hay categoría seleccionada, no mostrar subcategorías
            if (categoriaId === '') {
                subSelect.disabled = true;
                // No hay categoría seleccionada, deshabilitando subcategorías
            } else {
                subSelect.disabled = false;
                
                // Filtrar y agregar solo las subcategorías que pertenecen a la categoría seleccionada
                // Asegurarse de que la comparación se haga correctamente convirtiendo ambos a string
                const subcategoriasDisponibles = todasLasOpciones.filter(opcion => String(opcion.parentId) === String(categoriaId));
                // Filtrando subcategorías para la categoría seleccionada
                
                subcategoriasDisponibles.forEach(opcion => {
                    const option = document.createElement('option');
                    option.value = opcion.value;
                    option.text = opcion.text;
                    option.dataset.parentId = opcion.parentId;
                    subSelect.add(option);
                    // Agregando opción de subcategoría al selector
                });
            }
        }
        
        // Ejecutar la función al cargar la página
        actualizarSubcategorias();
        
        // Agregar evento para actualizar subcategorías cuando cambie la categoría
        catSelect.addEventListener('change', actualizarSubcategorias);
    }
});