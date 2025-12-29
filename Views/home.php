<?php
// Verificamos si existe la función headerAdmin para incluir el encabezado del administrador, 
// en caso contrario, se incluye el header genérico manualmente.
if (function_exists('headerAdmin')) {
  headerAdmin($data);
} else {
  include_once 'Templates/header.php';
}
?>

<!-- Estilos adicionales específicos para esta vista -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/carousel.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/productos.css">

<!-- =======================================
                HERO SECTION 
Descripción: Sección principal de bienvenida con video de fondo
======================================= -->
<main class="w-full">
  <section class="relative w-full h-screen overflow-hidden text-white">
    <!-- Video de fondo a pantalla completa -->
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
      <source src="<?php echo BASE_URL; ?>Assets/videos/video2.mp4" type="video/mp4">
      Tu navegador no soporta el video.
    </video>

    <!-- Capa semitransparente negra -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Contenido principal centrado -->
    <div class="relative z-10 flex flex-col justify-center items-center text-center h-full px-4 max-w-3xl mx-auto animate-fade-in">
      <!-- Título principal animado -->
      <h1 class="text-5xl md:text-8xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg">
        Energía para el futuro sustentable
      </h1>

      <!-- Subtítulo -->
      <p class="text-xl md:text-2xl text-gray-100 mb-8 leading-relaxed tracking-wide drop-shadow-sm">
        Soluciones solares inteligentes para hogares,<br />
        comercios e industrias. Ahorro, eficiencia y compromiso con el planeta.
      </p>

      <!-- Botones de acción (CTA) -->
      <div class="flex flex-col sm:flex-row gap-4 text-lg font-semibold">
        <!-- Botón a la calculadora -->
        <a href="<?php echo base_url(); ?>calcular"
          class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl shadow-lg transition transform hover:scale-105 duration-300 flex items-center gap-2">
          ⚡ Calculá tu consumo
        </a>

        <!-- Botón para aprender -->
        <a href="<?php echo base_url(); ?>aprende"
          class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl shadow-lg transition transform hover:scale-105 duration-300 flex items-center gap-2">
          Aprendé más sobre energía solar
        </a>
      </div>
    </div>
  </section>

  <!-- =======================================
     SOLUCIONES SOLARES - CARRUSEL SWIPER
======================================= -->

  <!-- Sección para mostrar las soluciones solares de la empresa con un carrusel animado -->
  <section aria-label="Soluciones solares" class="relative w-full py-16 bg-white" id="soluciones-section">
    <div class="max-w-7xl mx-auto px-4">

      <!-- Título principal de la sección -->
      <div class="mb-12">
        <h2 class="text-5xl md:text-6xl font-bold text-gray-800">
          Soluciones <span class="text-green-600">Solares</span>
        </h2>
        <!-- Línea decorativa bajo el título -->
        <hr class="border-t-2 border-gray-300 w-24 mt-6">
      </div>

      <!-- Contenedor principal del carrusel -->
      <div class="swiper-container group">
        <!-- Elemento que Swiper va a convertir en carrusel -->
        <div class="swiper mySwiper">

          <!-- Contenedor de las diapositivas -->
          <div class="swiper-wrapper">

            <!-- ==== DIAPOSITIVA 1: Generadores Autónomos ==== -->
            <div class="swiper-slide">
              <div class="bg-white rounded-xl shadow-lg p-8 mx-2 h-[480px] flex flex-col items-center">
                <img src="Assets/icons/generadoresautonomo.jpg" alt="Generador autónomo" class="w-40 h-40 mb-8 object-contain">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Generadores Autónomos</h3>
                <p class="text-gray-600 text-lg leading-relaxed">
                  Sistemas independientes de energía solar para uso continuo.
                </p>
              </div>
            </div>

            <!-- ==== DIAPOSITIVA 2: Conectados a la Red ==== -->
            <div class="swiper-slide">
              <div class="bg-white rounded-xl shadow-lg p-8 mx-2 h-[480px] flex flex-col items-center">
                <img src="Assets/icons/conectadoalared.jpg" alt="Conexión a red" class="w-40 h-40 mb-8 object-contain">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Conectados a la Red</h3>
                <p class="text-gray-600 text-lg leading-relaxed">
                  Integración inteligente con la red eléctrica convencional.
                </p>
              </div>
            </div>

            <!-- ==== DIAPOSITIVA 3: Banco de Baterías ==== -->
            <div class="swiper-slide">
              <div class="bg-white rounded-xl shadow-lg p-8 mx-2 h-[480px] flex flex-col items-center">
                <img src="Assets/icons/bancodebaterias.jpg" alt="Baterías" class="w-40 h-40 mb-8 object-contain">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Banco de Baterías</h3>
                <p class="text-gray-600 text-lg leading-relaxed">
                  Almacenamiento inteligente con gestión avanzada.
                </p>
              </div>
            </div>

            <!-- ==== DIAPOSITIVA 4: Alumbrado Autónomo ==== -->
            <div class="swiper-slide">
              <div class="bg-white rounded-xl shadow-lg p-8 mx-2 h-[480px] flex flex-col items-center">
                <img src="Assets/icons/alumbradoautonomo.jpg" alt="Alumbrado" class="w-40 h-40 mb-8 object-contain">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Alumbrado Autónomo</h3>
                <p class="text-gray-600 text-lg leading-relaxed">
                  Iluminación solar independiente y automática.
                </p>
              </div>
            </div>

            <!-- ==== DIAPOSITIVA 5: Sistema de Bombeo ==== -->
            <div class="swiper-slide">
              <div class="bg-white rounded-xl shadow-lg p-8 mx-2 h-[480px] flex flex-col items-center">
                <img src="Assets/icons/sistemadebombeo.jpg" alt="Bombeo solar" class="w-40 h-40 mb-8 object-contain">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Sistema de Bombeo</h3>
                <p class="text-gray-600 text-lg leading-relaxed">
                  Bombeo de agua alimentado por energía solar.
                </p>
              </div>
            </div>

          </div> <!-- /swiper-wrapper -->

          <!-- Botones personalizados con íconos SVG (estéticos) -->
          <div class="swiper-button-prev custom-swiper-btn">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </div>
          <div class="swiper-button-next custom-swiper-btn">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </div>

          <!-- Paginación del carrusel -->
          <div class="swiper-pagination !relative !mt-8"></div>

        </div> <!-- /swiper -->
      </div> <!-- /swiper-container -->

      <!-- Botón de llamado a la acción debajo del carrusel -->
      <div class="mt-12 text-center">
        <a href="<?php echo BASE_URL; ?>aprende"
          class="inline-block bg-green-600 hover:bg-green-700 text-white px-8 py-4 text-lg font-semibold rounded-full shadow-lg transition-all duration-300">
          Aprendé más sobre energía solar
        </a>
      </div>

    </div> <!-- /container -->
  </section>

  <!-- =======================================
          QUIÉNES SOMOS
======================================= -->

  <!-- Sección informativa sobre la empresa -->
  <section id="quienes-somos" class="bg-gray-100 text-gray-800 py-28">
    <div class="max-w-7xl mx-auto px-6">

      <!-- Encabezado principal de la sección -->
      <div class="text-center mb-20" data-aos="fade-up">
        <h2 class="text-5xl md:text-7xl font-extrabold text-gray-800 dark:text-white leading-tight mb-6">
          <span class="text-green-600">¿Quiénes</span> Somos?
        </h2>
        <p class="text-xl text-gray-700 max-w-4xl mx-auto leading-relaxed">
          En <strong>UV Energía Solar</strong> llevamos más de <strong>5 años</strong> impulsando la transformación energética
          desde <strong>Concepción, Tucumán</strong>, con soluciones inteligentes, eficientes y sostenibles para hogares, empresas e industrias.
        </p>
      </div>

      <!-- === BLOQUE 1: Compromiso e Innovación === -->
      <div class="grid md:grid-cols-2 gap-16 items-center mb-20">

        <!-- Imagen del equipo trabajando -->
        <div class="shadow-lg rounded-2xl overflow-hidden" data-aos="fade-right">
          <img src="<?php echo BASE_URL; ?>Assets/images/uploads/about.jpg" alt="Instalación de paneles solares"
            class="w-full h-full object-cover">
        </div>

        <!-- Texto explicativo sobre compromiso -->
        <div class="flex flex-col justify-center" data-aos="fade-left">
          <h3 class="text-4xl font-extrabold text-green-600 mb-6">Compromiso e Innovación</h3>
          <p class="text-lg leading-relaxed text-gray-700 mb-4">
            Combinamos <strong>experiencia técnica</strong> con <strong>innovación tecnológica</strong> y responsabilidad ambiental
            para ofrecer soluciones energéticas adaptadas a cada necesidad.
          </p>
          <p class="text-lg leading-relaxed text-gray-700">
            Cada proyecto representa una oportunidad de generar un <strong>impacto positivo y duradero</strong> en nuestro entorno.
          </p>
        </div>
      </div>

      <!-- === BLOQUE 2: Nuestra Presencia === -->
      <div class="grid md:grid-cols-2 gap-16 items-center">

        <!-- Texto sobre presencia regional -->
        <div class="flex flex-col justify-center md:order-1 order-2" data-aos="fade-right">
          <h3 class="text-4xl font-extrabold text-green-600 mb-6">Nuestra Presencia</h3>
          <p class="text-lg leading-relaxed text-gray-700 mb-4">
            Desde <strong>Argentina</strong> proyectamos nuestra experiencia hacia toda <strong>América Latina</strong>,
            promoviendo el acceso a energías limpias y eficientes.
          </p>
          <p class="text-lg leading-relaxed text-gray-700">
            Nuestro <strong>equipo multidisciplinario</strong> garantiza excelencia en cada paso,
            desde el primer contacto hasta la puesta en marcha del sistema.
          </p>
        </div>

        <!-- Imagen representando alcance regional -->
        <div class="shadow-lg rounded-2xl overflow-hidden md:order-2 order-1" data-aos="fade-left">
          <img src="<?php echo BASE_URL; ?>Assets/images/uploads/campo1.jpg" alt="Equipo técnico UV Energía Solar"
            class="w-full h-full object-cover">
        </div>
      </div>

    </div> <!-- /container -->
  </section>

  <!-- =======================================
          CALCULADORA SOLAR
======================================= -->

  <!-- Sección con fondo verde que presenta el llamado a calcular el consumo solar -->
  <section class="bg-green-600 text-white py-32" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-16">

      <!-- === Columna Izquierda: Imagen ilustrativa === -->
      <div class="md:w-1/2 overflow-hidden relative">
        <!-- Imagen con efecto parallax -->
        <img src="<?php echo BASE_URL; ?>Assets/images/uploads/ahorro.jpg"
          alt="Ilustración calculadora solar"
          class="rounded-xl w-full h-auto max-w-md mx-auto shadow-xl transform transition-transform duration-1000 ease-out hover:scale-105"
          data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200">
      </div>

      <!-- === Columna Derecha: Texto + Botón === -->
      <div class="md:w-1/2 text-center md:text-left transform transition-transform duration-1000 ease-out opacity-0 md:opacity-100 animate__animated animate__fadeInUp"
        data-aos="fade-left" data-aos-duration="1000" data-aos-offset="200">
        <!-- Título llamativo -->
        <h2 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6">
          Calculá tu <span class="text-yellow-400">Consumo Solar</span><br />
          y descubrí tu solución solar
        </h2>

        <!-- Descripción informativa -->
        <p class="text-xl text-white/90 mb-8 leading-relaxed">
          Descubrí cuántos paneles solares necesitás según tu consumo mensual.<br />
          Rápido, preciso y gratuito.
        </p>

        <!-- Botón CTA que dirige al usuario a la calculadora solar -->
        <a href="<?php echo base_url(); ?>calcular"
          class="inline-block bg-white text-green-700 font-semibold px-8 py-4 rounded-xl shadow hover:bg-gray-100 transition-transform duration-300 transform hover:scale-105 text-lg">
          ⚡ Empezar ahora
        </a>
      </div>

    </div> <!-- /contenedor -->
  </section>

  <!-- Agregar librería AOS para animaciones si no la tienes cargada -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <!-- =======================================
            NUESTROS PROYECTOS
======================================= -->

  <!-- Sección con video de fondo, texto superpuesto y llamado a la acción -->
  <section class="relative min-h-[800px] flex items-center justify-center text-white overflow-hidden">

    <!-- === Fondo de video (loop, autoplay, sin sonido) === -->
    <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
      <source src="<?php echo BASE_URL; ?>Assets/videos/solar.mov" type="video/mp4">
      <!-- Mensaje alternativo por si el navegador no soporta video -->
      Tu navegador no soporta video HTML5.
    </video>

    <!-- === Capa oscura sobre el video para mejorar legibilidad del texto === -->
    <div class="absolute inset-0 bg-black/40 z-10"></div>

    <!-- === Contenido centrado sobre el video === -->
    <div class="relative z-20 text-center px-4">
      <!-- Título grande con sombra y color destacado -->
      <h2 class="text-5xl md:text-8xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg">
        Nuestros <span class="text-green-600"> Proyectos</span>
      </h2>

      <!-- Descripción de apoyo -->
      <p class="text-lg md:text-xl text-white mb-8 drop-shadow-md">
        Conocé sobre nuestros trabajos y podés aprender qué tipo sistema es ideal para vos.
      </p>

      <!-- Botón CTA que redirige a la página de proyectos -->
      <a href="<?php echo base_url(); ?>proyectos"
        class="bg-white/10 hover:bg-white/20 text-white px-8 py-4 rounded-xl shadow-lg border border-white/20 transition transform hover:scale-105 duration-300">
        Ver proyectos →
      </a>
    </div> <!-- /contenido -->
  </section>

  <!-- =======================================
          PRODUCTOS DESTACADOS
======================================= -->

  <!-- Sección general con fondo gris claro, padding y texto oscuro -->
  <section id="productos-destacados" class="bg-gray-100 py-28 text-gray-800" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-6">

      <!-- Encabezado de la sección -->
      <div class="text-center mb-16">
        <h2 class="text-5xl md:text-7xl font-extrabold text-gray-900 leading-tight drop-shadow-sm" data-aos="fade-down" data-aos-duration="1000">
          Productos <span class="text-green-600">Destacados</span>
        </h2>
        <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
          Equipos solares seleccionados por su rendimiento, durabilidad y eficiencia. Ideales para hogares y empresas.
        </p>
        <hr class="mt-10 border-t-2 border-gray-300 w-24 mx-auto">
      </div>

      <!-- Contenedor de productos: grid responsive de 1 a 3 columnas -->
      <div class="grid gap-12 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

        <!-- === Producto 1 === -->
        <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition duration-300 overflow-hidden flex flex-col producto-card"
          data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
          <!-- Imagen del producto -->
          <div class="producto-imagen-container">
            <img src="<?php echo BASE_URL; ?>Assets/images/uploads/panelsolar450w.jpeg" alt="Panel solar" class="producto-imagen">
          </div>
          <!-- Contenido textual del producto -->
          <div class="p-6 flex flex-col flex-1 producto-contenido">
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Panel Solar 450W</h3>
            <p class="text-gray-600 flex-1">Alta eficiencia para instalaciones residenciales y comerciales.</p>
            <a href="<?= BASE_URL ?>producto/mostrar" class="mt-6 inline-flex items-center text-green-600 font-semibold hover:underline transition producto-enlace">
              Ver más
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- === Producto 2 === -->
        <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition duration-300 overflow-hidden flex flex-col producto-card"
          data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
          <div class="producto-imagen-container">
            <img src="<?php echo BASE_URL; ?>Assets/images/uploads/inversor5kw.jpeg" alt="Inversor solar" class="producto-imagen">
          </div>
          <div class="p-6 flex flex-col flex-1 producto-contenido">
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Inversor 5kW</h3>
            <p class="text-gray-600 flex-1">Convierte energía solar con máxima eficiencia.</p>
            <a href="<?= BASE_URL ?>producto/mostrar" class="mt-6 inline-flex items-center text-green-600 font-semibold hover:underline transition producto-enlace">
              Ver más
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- === Producto 3 === -->
        <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition duration-300 overflow-hidden flex flex-col producto-card"
          data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
          <div class="producto-imagen-container">
            <img src="<?php echo BASE_URL; ?>Assets/images/uploads/bateriadelitio48v.jpeg" alt="Batería" class="producto-imagen">
          </div>
          <div class="p-6 flex flex-col flex-1 producto-contenido">
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Batería de Litio 48V</h3>
            <p class="text-gray-600 flex-1">Autonomía y duración para tus sistemas aislados.</p>
            <a href="<?= BASE_URL ?>producto/mostrar" class="mt-6 inline-flex items-center text-green-600 font-semibold hover:underline transition producto-enlace">
              Ver más
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =======================================
                 CONTACTO
======================================= -->

  <section id="contacto" class="bg-gray-50 py-28 relative">
    <div class="max-w-7xl mx-auto px-6 relative">

      <!-- Título -->
      <div class="text-center mb-16">
        <h2 class="text-5xl md:text-7xl font-extrabold text-green-600 leading-tight drop-shadow-lg">Contactanos</h2>
        <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Estamos listos para ayudarte con la mejor solución a tus necesidades.</p>
        <hr class="mt-10 border-t-2 border-gray-300 w-24 mx-auto">
      </div>

      <!-- Contenido principal (dos columnas) -->
      <div class="bg-white rounded-2xl shadow-xl p-10 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

        <!-- Información de contacto -->
        <div class="space-y-6">
          <h3 class="text-2xl font-bold text-gray-800">Ponete en contacto</h3>
          <p class="text-gray-600 text-lg">Estamos ubicados en <strong>Tucumán, Argentina</strong>. Podés escribirnos por correo, WhatsApp o redes.</p>

          <!-- Lista de datos de contacto -->
          <div class="space-y-4 text-gray-800">

            <!-- Dirección -->
            <div class="flex items-start gap-4">
              <i class="fas fa-map-marker-alt text-green-600 text-2xl mt-1"></i>
              <div>
                <h4 class="font-semibold">Oficina Central</h4>
                <p>Joaquín V. González 50, Concepción - Tucumán</p>
              </div>
            </div>

            <!-- Email -->
            <div class="flex items-start gap-4">
              <i class="fas fa-envelope text-green-600 text-2xl mt-1"></i>
              <div>
                <h4 class="font-semibold">Correo</h4>
                <p>info@uvenergiasolar.com.ar</p>
              </div>
            </div>

            <!-- Teléfono -->
            <div class="flex items-start gap-4">
              <i class="fas fa-phone text-green-600 text-2xl mt-1"></i>
              <div>
                <h4 class="font-semibold">Teléfono</h4>
                <p>+54 9 3865 58 63 22</p>
              </div>
            </div>
          </div>

          <!-- Redes sociales -->
          <div class="pt-4">
            <p class="font-semibold text-gray-800 mb-2">Seguinos en redes:</p>
            <div class="flex gap-4 text-green-600 text-2xl">
              <a href="#"><i class="fab fa-facebook-square hover:text-green-700"></i></a>
              <a href="#"><i class="fab fa-instagram hover:text-green-700"></i></a>
              <a href="#"><i class="fab fa-linkedin hover:text-green-700"></i></a>
              <a href="#"><i class="fab fa-youtube hover:text-green-700"></i></a>
            </div>
          </div>
        </div>

        <!-- Formulario de contacto -->
        <div>
          <h3 class="text-2xl font-bold text-gray-800 mb-6">Envíanos un mensaje</h3>
          <form id="formContacto" class="space-y-4" action="<?php echo base_url(); ?>contacto/enviarMensaje" method="POST">

            <!-- Campos: Nombre y Empresa -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <input
                type="text"
                id="txtNombre"
                name="nombre"
                placeholder="Nombre"
                required
                class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-800 bg-white focus:outline-none focus:ring-2 focus:ring-green-600" />
              <input
                type="text"
                id="txtEmpresa"
                name="empresa"
                placeholder="Empresa"
                class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-800 bg-white focus:outline-none focus:ring-2 focus:ring-green-600" />
            </div>

            <!-- Campos: Correo y Teléfono -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <input
                type="email"
                id="txtCorreo"
                name="correo"
                placeholder="Correo"
                required
                class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-800 bg-white focus:outline-none focus:ring-2 focus:ring-green-600" />
              <input
                type="tel"
                id="txtTelefono"
                name="telefono"
                placeholder="Teléfono"
                class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-800 bg-white focus:outline-none focus:ring-2 focus:ring-green-600" />
            </div>

            <!-- Campo: Asunto -->
            <input
              type="text"
              id="txtAsunto"
              name="asunto"
              placeholder="Asunto"
              required
              class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-800 bg-white focus:outline-none focus:ring-2 focus:ring-green-600" />

            <!-- Campo: Mensaje -->
            <textarea
              id="txtMensaje"
              name="mensaje"
              rows="5"
              placeholder="Mensaje"
              required
              class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-800 bg-white focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>

            <!-- Botón de envío -->
            <button
              type="submit"
              id="btnEnviar"
              class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-md text-lg font-semibold transition shadow-md hover:shadow-lg">
              <i class="fas fa-paper-plane mr-2"></i> Enviar
            </button>
          </form>
        </div>
      </div>

      <!-- Mapa de Google incrustado -->
      <div class="mt-16 rounded-2xl overflow-hidden shadow-xl">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3248.5918021079533!2d-65.58982192492044!3d-27.34702167639095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9423cf5b756c5319%3A0xff3042ee6168a5f4!2zSm9hcXXDrW4gVi4gR29uesOhbGV6IDUwLCBUNDE0NiBDb25jZXBjacOzbiwgVHVjdW3DoW4!5e0!3m2!1ses-419!2sar!4v1685554440000!5m2!1ses-419!2sar"
          width="100%" height="400" style="border:0;" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </section>
  <!-- Cierre de divs abiertos anteriormente (main content) -->
  </div>
  </section>

  <!-- =======================================
                   FOOTER
  ======================================== -->
  <?php
  // Verifica si existe la función personalizada footerAdmin()
  if (function_exists('footerAdmin')) {
    footerAdmin($data); // Usa el footer de administración si está definido
  } else {
    // Si no existe, incluye directamente el footer estándar
    include_once 'Templates/footer.php';
  }
  ?>
   
   <!-- Script para manejar el formulario de contacto -->
   <script>
     // Variable global para la URL base
     const base_url = "<?php echo base_url(); ?>";
   </script>
   <script src="<?php echo BASE_URL; ?>Assets/js/contacto.js"></script>