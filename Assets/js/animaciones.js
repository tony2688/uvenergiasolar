// ================================
// ANIMACIONES GLOBALES
// ScrollReveal y SwiperJS
// ================================

// ScrollReveal para animaciones al hacer scroll
if (typeof ScrollReveal !== 'undefined') {
    ScrollReveal().reveal('.animate-on-scroll', {
      origin: 'bottom',          // Animación desde abajo
      distance: '40px',          // Desplazamiento al aparecer
      duration: 1000,            // Duración de la animación en ms
      delay: 200,                // Retardo inicial
      reset: false               // No se vuelve a animar si se vuelve a mostrar
    });
}

// Nota: La inicialización de Swiper se ha movido a main.js para evitar duplicación
// y posibles conflictos entre múltiples inicializaciones