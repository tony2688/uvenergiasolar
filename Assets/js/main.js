// =======================================================
// MAIN.JS - Interacciones generales para el sitio
// Animaciones, Swiper, menú, header y botón WhatsApp
// =======================================================

// === Función reutilizable para animar elementos al hacer scroll ===
function animateOnScroll(selector, threshold = 0.3) {
  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.remove("opacity-0", "translate-y-8"); // Elimina las clases iniciales de opacidad y desplazamiento
          entry.target.classList.add(
            "opacity-100",
            "translate-y-0",
            "transition-all",
            "duration-1000"
          ); // Agrega las clases para animar la aparición
          obs.unobserve(entry.target); // Deja de observar el elemento una vez que entra en la vista
        }
      });
    },
    { threshold } // Define la visibilidad mínima del elemento (porcentaje de visibilidad para que se active la animación)
  );

  // Observa todos los elementos que coinciden con el selector y les aplica la animación
  document.querySelectorAll(selector).forEach((el) => {
    el.classList.add("opacity-0", "translate-y-8"); // Añade las clases iniciales de opacidad y desplazamiento
    observer.observe(el); // Inicia la observación del elemento
  });
}

// === Scripts para abrir y cerrar el modal ===
function openModal(modalId) {
  document.getElementById(modalId).classList.remove("hidden"); // Muestra el modal eliminando la clase "hidden"
}

function closeModal(modalId) {
  document.getElementById(modalId).classList.add("hidden"); // Oculta el modal añadiendo la clase "hidden"
}

// Añadir evento para cerrar el modal si se hace clic fuera de la imagen
document.querySelectorAll(".modal").forEach((modal) => {
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      // Si se hace clic fuera de la imagen
      closeModal(modal.id); // Cierra el modal
    }
  });
});

// === Ejecutar al cargar el DOM ===
document.addEventListener("DOMContentLoaded", () => {
  // 1. ✨ Animaciones de aparición al hacer scroll
  animateOnScroll(".animate-fade-in", 0.3); // Aplica la animación de aparición a los elementos con la clase "animate-fade-in"
  animateOnScroll(".animate-on-scroll", 0.2); // Aplica la animación a los elementos con la clase "animate-on-scroll"
  animateOnScroll(".swiper-slide", 0.2); // Aplica la animación a los slides del swiper
  animateOnScroll("#soluciones-section", 0.2); // Aplica la animación a la sección "soluciones"

  // 2. 🧭 Cambio de color del header y scroll hacia arriba/abajo
  const header = document.getElementById("mainHeader"); // Selecciona el encabezado
  let lastScrollTop = 0;

  // Si no existe el header, no ejecutamos esta parte
  if (!header) return;

  // Función que maneja el cambio de fondo del header según el desplazamiento
  const handleScroll = () => {
    const currentScroll = window.scrollY;

    // Cambiar fondo del header cuando se hace scroll
    if (currentScroll > 50) {
      header.classList.remove("bg-transparent"); // Si el scroll es mayor a 50, quita el fondo transparente
      header.classList.add(
        "bg-black",
        "shadow-md",
        "backdrop-blur-md",
        "dark:bg-gray-900"
      ); // Añade clases para fondo negro, sombra y desenfoque
    } else {
      header.classList.add("bg-transparent"); // Si el scroll es menor a 50, vuelve el fondo transparente
      header.classList.remove("bg-black", "shadow-md", "dark:bg-gray-900"); // Quita las clases de fondo negro y sombra
    }

    // Ocultar o mostrar el header según dirección del scroll
    if (currentScroll > lastScrollTop && currentScroll > 100) {
      header.classList.add("-translate-y-full"); // Si se baja el scroll, oculta el header
    } else {
      header.classList.remove("-translate-y-full"); // Si se sube el scroll, muestra el header
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Guarda la posición del scroll
  };

  // Ejecutar y escuchar scroll
  handleScroll();
  window.addEventListener("scroll", handleScroll); // Añade el evento de scroll para cambiar el estado del header

  // 3. Swiper general (Carrusel)
  if (document.querySelector(".mySwiper")) {
    // Si existe el swiper
    new Swiper(".mySwiper", {
      slidesPerView: 1, // Muestra un slide a la vez
      loop: true, // Permite que el carrusel sea infinito
      autoplay: {
        delay: 4000, // Cambia la imagen cada 4 segundos
        disableOnInteraction: false, // No desactiva el autoplay cuando el usuario interactúa
      },
      breakpoints: {
        640: { slidesPerView: 2 }, // En pantallas pequeñas, muestra 2 slides
        768: { slidesPerView: 3 }, // En pantallas medianas, muestra 3 slides
        1024: { slidesPerView: 4 }, // En pantallas grandes, muestra 4 slides
      },
      pagination: {
        el: ".swiper-pagination", // Paginación con puntos clickeables
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next", // Navegación a la siguiente imagen
        prevEl: ".swiper-button-prev", // Navegación a la imagen anterior
      },
    });
  }

  // 4. ✅ Mostrar botón de WhatsApp al hacer scroll
  const whatsappBtn = document.getElementById("whatsappButton"); // Selecciona el botón de WhatsApp
  if (whatsappBtn) {
    whatsappBtn.classList.remove("hidden"); // Muestra el botón de WhatsApp
  }

  // 5. 📱 Menú móvil (hamburguesa)
  const menuBtn = document.getElementById("mobileMenuBtn");
  const mobileMenu = document.getElementById("mobileMenu");
  const iconOpen = document.getElementById("hamburguesa");
  const iconClose = document.getElementById("cerrar");

  if (menuBtn && mobileMenu && iconOpen && iconClose) {
    // Añadir el evento click al botón de hamburguesa
    menuBtn.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden"); // Alterna la visibilidad del menú
      iconOpen.classList.toggle("hidden"); // Alterna la visibilidad del ícono de hamburguesa
      iconClose.classList.toggle("hidden"); // Alterna la visibilidad del ícono de cerrar
    });

    // Cerrar el menú móvil al hacer clic en un enlace dentro del menú
    const menuLinks = document.querySelectorAll("#mobileMenu a");
    menuLinks.forEach(link => {
      link.addEventListener("click", (e) => {
        // Cierra el menú móvil
        mobileMenu.classList.add("hidden"); // Cierra el menú al hacer clic en un enlace
        iconOpen.classList.remove("hidden"); // Muestra el ícono de hamburguesa
        iconClose.classList.add("hidden"); // Oculta el ícono de cerrar
        
        // Manejo especial para enlaces con anclas (#)
        const href = link.getAttribute('href');
        if (href && href.includes('#')) {
          // Si estamos en la página home y el enlace contiene un ancla
          if (window.location.pathname.includes('home') || window.location.pathname === '/' || window.location.pathname.endsWith('/')) {
            e.preventDefault(); // Previene el comportamiento predeterminado
            const ancla = href.split('#')[1]; // Obtiene el ID del ancla
            const elemento = document.getElementById(ancla);
            
            if (elemento) {
              // Desplazamiento suave hacia el elemento
              setTimeout(() => {
                elemento.scrollIntoView({ behavior: 'smooth' });
              }, 300); // Pequeño retraso para asegurar que el menú se cierre primero
            }
          }
        }
      });
    });}
});

// === Swiper exclusivo para sección de proyectos (.proyectosSwiper) ===
if (document.querySelector(".proyectosSwiper")) {
  // Si existe el swiper de proyectos
  new Swiper(".proyectosSwiper", {
    loop: true, // Carrusel infinito
    spaceBetween: 30, // Espacio entre los slides
    autoplay: {
      delay: 6000, // Cambia la imagen cada 6 segundos
      disableOnInteraction: false, // No desactiva el autoplay cuando el usuario interactúa
    },
    pagination: {
      el: ".swiper-pagination", // Paginación con puntos
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next", // Navegación a la siguiente imagen
      prevEl: ".swiper-button-prev", // Navegación a la imagen anterior
    },
    breakpoints: {
      640: { slidesPerView: 1 }, // 1 slide en móviles
      768: { slidesPerView: 2 }, // 2 slides en tablets
      1024: { slidesPerView: 3 }, // 3 slides en escritorio
    },
  });
}

// === Modal de cookies === //
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("cookieModal"); // Selecciona el modal de cookies
  const btnAceptar = document.getElementById("aceptarCookies"); // Selecciona el botón de aceptar cookies

  // Si no se han aceptado los términos previamente, muestra el modal
  if (!localStorage.getItem("terminosAceptados")) {
    modal.classList.remove("hidden");
  }

  // Al hacer clic en "Aceptar", se guardan los términos aceptados y se oculta el modal
  btnAceptar.addEventListener("click", () => {
    localStorage.setItem("terminosAceptados", "true");
    modal.classList.add("hidden");
  });
});
