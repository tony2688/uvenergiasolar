// =======================================================
// MENU-MOBILE.JS - Funcionalidad específica para el menú móvil
// =======================================================

document.addEventListener("DOMContentLoaded", () => {
    // Seleccionar elementos del menú móvil
    const menuBtn = document.getElementById("mobileMenuBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    const iconOpen = document.getElementById("hamburguesa");
    const iconClose = document.getElementById("cerrar");

    // Verificar que todos los elementos existen
    if (menuBtn && mobileMenu && iconOpen && iconClose) {
        console.log("Elementos del menú móvil encontrados"); // Para depuración
        
        // Añadir el evento click al botón de hamburguesa
        menuBtn.addEventListener("click", () => {
            console.log("Botón de menú móvil clickeado"); // Para depuración
            mobileMenu.classList.toggle("hidden"); // Alterna la visibilidad del menú
            iconOpen.classList.toggle("hidden"); // Alterna la visibilidad del ícono de hamburguesa
            iconClose.classList.toggle("hidden"); // Alterna la visibilidad del ícono de cerrar
        });

        // Cerrar el menú móvil al hacer clic en un enlace dentro del menú
        const menuLinks = document.querySelectorAll("#mobileMenu a");
        menuLinks.forEach(link => {
            link.addEventListener("click", () => {
                // Cierra el menú móvil
                mobileMenu.classList.add("hidden"); // Cierra el menú al hacer clic en un enlace
                iconOpen.classList.remove("hidden"); // Muestra el ícono de hamburguesa
                iconClose.classList.add("hidden"); // Oculta el ícono de cerrar
            });
        });
    } else {
        console.error("No se encontraron todos los elementos del menú móvil");
        // Mostrar qué elementos no se encontraron para depuración
        if (!menuBtn) console.error("No se encontró el botón del menú móvil");
        if (!mobileMenu) console.error("No se encontró el contenedor del menú móvil");
        if (!iconOpen) console.error("No se encontró el ícono de hamburguesa");
        if (!iconClose) console.error("No se encontró el ícono de cerrar");
    }
});