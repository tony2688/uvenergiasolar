// =======================================================
// NAVEGACION.JS - Manejo de enlaces con anclas
// Soluciona el problema de navegación desde páginas internas
// =======================================================

document.addEventListener("DOMContentLoaded", () => {
  // Obtener la ruta actual
  const currentPath = window.location.pathname;
  
  // Verificar si estamos en una página interna (no en home)
  const isInternalPage = !(
    currentPath.includes('home') || 
    currentPath === '/' || 
    currentPath.endsWith('/')
  );
  
  // Si estamos en una página interna, modificar los enlaces con anclas
  if (isInternalPage) {
    // Seleccionar todos los enlaces en el header y footer que contienen anclas
    const anchorLinks = document.querySelectorAll('header a[href*="#"], footer a[href*="#"]');
    
    // Modificar cada enlace para que redirija a home + ancla
    anchorLinks.forEach(link => {
      const href = link.getAttribute('href');
      
      // Si el enlace ya contiene la URL base completa, no lo modificamos
      if (href.includes('home#')) {
        return;
      }
      
      // Si el enlace es solo un ancla (#algo) o tiene BASE_URL + #algo
      if (href.includes('#')) {
        const anchorPart = href.split('#')[1]; // Obtener la parte del ancla
        
        // Modificar el enlace para que vaya a home + ancla
        if (anchorPart) {
          // Obtener la URL base del sitio (asumiendo que BASE_URL está disponible)
          const baseUrl = link.href.split('#')[0];
          link.setAttribute('href', baseUrl + 'home#' + anchorPart);
        }
      }
    });
  }
  
  // Añadir comportamiento de desplazamiento suave para todos los enlaces con anclas
  document.querySelectorAll('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      // Solo para enlaces que apuntan a la misma página
      const targetUrl = this.getAttribute('href');
      const currentUrl = window.location.href.split('#')[0];
      
      // Si el enlace apunta a un ancla en la página actual
      if (targetUrl.startsWith('#') || 
          (targetUrl.split('#')[0] === currentUrl)) {
        e.preventDefault();
        
        const targetId = targetUrl.split('#')[1];
        const targetElement = document.getElementById(targetId);
        
        if (targetElement) {
          targetElement.scrollIntoView({ behavior: 'smooth' });
        }
      }
    });
  });
});