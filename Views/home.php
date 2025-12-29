<?php
// Carga del Header
if (function_exists('headerAdmin')) {
  headerAdmin($data);
} else {
  include_once 'Templates/header.php';
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- HERO SECTION -->
<section class="relative w-full h-screen overflow-hidden text-white">
  <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
    <source src="<?php echo BASE_URL; ?>Assets/videos/video2.mp4" type="video/mp4">
  </video>
  <!-- Overlay dramático premium -->
  <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-gray-900/60 to-black/80"></div>
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(5,150,105,0.15),transparent_50%)]"></div>

  <div class="relative z-10 flex flex-col justify-center items-center text-center h-full px-4 max-w-5xl mx-auto">
    <h1
      class="text-4xl sm:text-5xl md:text-7xl font-extrabold text-white leading-tight tracking-tight mb-6 drop-shadow-2xl animate-fade-in-up"
      style="animation-delay: 0.2s">
      Energía para el <span class="text-gradient">futuro sustentable</span>
    </h1>
    <p class="text-lg sm:text-xl md:text-2xl text-gray-100 mb-8 md:mb-12 leading-relaxed drop-shadow-lg max-w-3xl animate-fade-in-up"
      style="animation-delay: 0.4s">
      Soluciones solares inteligentes para hogares, comercios e industrias.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 text-base sm:text-lg font-bold animate-fade-in-up w-full sm:w-auto"
      style="animation-delay: 0.6s">
      <a href="<?php echo base_url(); ?>calcular"
        class="btn-primary px-6 sm:px-10 py-4 sm:py-5 rounded-full shadow-colored-green transition-all duration-300 hover:-translate-y-1 hover:shadow-xl flex items-center justify-center gap-2 sm:gap-3 group">
        <i class="fas fa-calculator group-hover:rotate-12 transition-transform text-lg"></i>
        Calculá tu consumo
      </a>
      <a href="<?php echo base_url(); ?>aprende"
        class="glass px-6 sm:px-10 py-4 sm:py-5 rounded-full backdrop-blur-md hover:bg-white/20 border-2 border-white/30 text-white transition-all duration-300 hover:-translate-y-1 flex items-center justify-center gap-2 sm:gap-3 group">
        <i class="fas fa-lightbulb group-hover:text-yellow-300 transition-colors text-lg"></i>
        Aprendé más
      </a>
    </div>
  </div>
</section>

<!-- QUIÉNES SOMOS -->
<section id="quienes-somos" class="bg-white text-gray-800 py-24">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-20" data-aos="fade-up">
      <h2 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-6">
        <span class="text-green-600">¿Quiénes</span> Somos?
      </h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
        Líderes en transformación energética en el norte argentino. Más de 5 años brindando soluciones sostenibles.
      </p>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
      <div class="relative rounded-3xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500"
        data-aos="fade-right">
        <img src="<?php echo BASE_URL; ?>Assets/images/uploads/about.jpg" alt="Equipo UV Solar"
          class="w-full h-full object-cover">
      </div>
      <div class="flex flex-col justify-center" data-aos="fade-left">
        <h3 class="text-3xl font-bold text-gray-900 mb-6 border-l-4 border-green-500 pl-4">Compromiso e Innovación</h3>
        <p class="text-lg text-gray-600 mb-4 leading-relaxed">
          Fusionamos <strong>ingeniería experta</strong> con <strong>tecnología de punta</strong> para ofrecer
          soluciones energéticas personalizadas.
        </p>
        <p class="text-lg text-gray-600 leading-relaxed">
          Cada proyecto representa una oportunidad de generar impacto positivo y duradero en nuestra comunidad.
        </p>
      </div>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div class="flex flex-col justify-center md:order-1 order-2" data-aos="fade-right">
        <h3 class="text-3xl font-bold text-gray-900 mb-6 border-l-4 border-green-500 pl-4">Alcance Regional</h3>
        <p class="text-lg text-gray-600 mb-4 leading-relaxed">
          Desde <strong>Tucumán para toda la región</strong>. Proyectamos nuestra experiencia hacia toda América Latina.
        </p>
        <p class="text-lg text-gray-600 leading-relaxed">
          Garantía de calidad certificada y equipo multidisciplinario comprometido con la excelencia.
        </p>
      </div>
      <div
        class="relative rounded-3xl overflow-hidden shadow-2xl md:order-2 order-1 transform hover:scale-[1.02] transition duration-500"
        data-aos="fade-left">
        <img src="<?php echo BASE_URL; ?>Assets/images/uploads/campo1.jpg" alt="Instalaciones Solares"
          class="w-full h-full object-cover">
      </div>
    </div>
  </div>
</section>

<!-- ESTADÍSTICAS / NÚMEROS -->
<section class="relative bg-gradient-to-br from-green-600 to-green-800 text-white py-20 overflow-hidden">
  <div class="absolute inset-0 bg-black/20"></div>
  <div
    class="absolute top-0 left-1/4 w-96 h-96 bg-yellow-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-pulse">
  </div>
  <div
    class="absolute bottom-0 right-1/4 w-96 h-96 bg-green-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-pulse">
  </div>

  <div class="max-w-7xl mx-auto px-6 relative z-10">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-4xl md:text-5xl font-extrabold mb-4">
        Números que <span class="text-yellow-300">Hablan por Nosotros</span>
      </h2>
      <p class="text-xl text-green-50 font-light">
        Experiencia comprobada en el mercado argentino de energía solar
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
      <!-- Estadística 1 -->
      <div class="text-center transform hover:scale-105 transition duration-300" data-aos="fade-up"
        data-aos-delay="100">
        <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl border border-white/20">
          <div class="text-6xl md:text-7xl font-extrabold mb-3 text-yellow-300">
            <span class="counter" data-target="500">0</span>+
          </div>
          <div class="text-2xl font-bold mb-2">kW Instalados</div>
          <p class="text-green-100 text-sm">Energía limpia generando ahorros reales</p>
        </div>
      </div>

      <!-- Estadística 2 -->
      <div class="text-center transform hover:scale-105 transition duration-300" data-aos="fade-up"
        data-aos-delay="200">
        <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl border border-white/20">
          <div class="text-6xl md:text-7xl font-extrabold mb-3 text-yellow-300">
            <span class="counter" data-target="150">0</span>+
          </div>
          <div class="text-2xl font-bold mb-2">Clientes Felices</div>
          <p class="text-green-100 text-sm">Proyectos exitosos en toda la región</p>
        </div>
      </div>

      <!-- Estadística 3 -->
      <div class="text-center transform hover:scale-105 transition duration-300" data-aos="fade-up"
        data-aos-delay="300">
        <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl border border-white/20">
          <div class="text-6xl md:text-7xl font-extrabold mb-3 text-yellow-300">
            <span class="counter" data-target="5">0</span>+
          </div>
          <div class="text-2xl font-bold mb-2">Años de Experiencia</div>
          <p class="text-green-100 text-sm">Comprometidos con la excelencia</p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Animated Counter
  function animateCounters() {
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
      const target = parseInt(counter.getAttribute('data-target'));
      const duration = 2000; // 2 seconds
      const increment = target / (duration / 16); // 60fps
      let current = 0;

      const updateCounter = () => {
        current += increment;
        if (current < target) {
          counter.textContent = Math.floor(current);
          requestAnimationFrame(updateCounter);
        } else {
          counter.textContent = target;
        }
      };

      updateCounter();
    });
  }

  // Trigger animation when section is visible
  const observerOptions = {
    threshold: 0.5
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounters();
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe the statistics section
  document.addEventListener('DOMContentLoaded', () => {
    const statsSection = document.querySelector('.counter').closest('section');
    if (statsSection) {
      observer.observe(statsSection);
    }
  });
</script>

<!-- SOLUCIONES PRINCIPALES -->
<section class="bg-gray-50 py-16">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
        Nuestras <span class="text-green-600">Soluciones Principales</span>
      </h2>
      <p class="text-gray-600">Tecnología adaptada a tus necesidades</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Solución 1 -->
      <div class="card-premium group hover-lift" data-aos="fade-up" data-aos-delay="100">
        <div
          class="w-20 h-20 mb-6 mx-auto rounded-full bg-green-100 flex items-center justify-center group-hover:bg-green-600 transition-all duration-300">
          <i class="fas fa-solar-panel text-3xl text-green-700 group-hover:text-white transition-colors"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3 text-center group-hover:text-green-700 transition-colors">
          Sistemas On-Grid
        </h3>
        <p class="text-gray-600 text-center text-sm">
          Conectados a la red eléctrica. Reduce tu factura inyectando excedente a la red.
        </p>
      </div>

      <!-- Solución 2 -->
      <div class="card-premium group hover-lift" data-aos="fade-up" data-aos-delay="200">
        <div
          class="w-20 h-20 mb-6 mx-auto rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-600 transition-all duration-300">
          <i class="fas fa-battery-full text-3xl text-blue-700 group-hover:text-white transition-colors"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3 text-center group-hover:text-blue-700 transition-colors">
          Sistemas Off-Grid
        </h3>
        <p class="text-gray-600 text-center text-sm">
          Autónomos con baterías. Energía 100% independiente en lugares remotos.
        </p>
      </div>

      <!-- Solución 3 -->
      <div class="card-premium group hover-lift" data-aos="fade-up" data-aos-delay="300">
        <div
          class="w-20 h-20 mb-6 mx-auto rounded-full bg-yellow-100 flex items-center justify-center group-hover:bg-yellow-500 transition-all duration-300">
          <i class="fas fa-industry text-3xl text-yellow-700 group-hover:text-white transition-colors"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3 text-center group-hover:text-yellow-700 transition-colors">
          Soluciones Comerciales
        </h3>
        <p class="text-gray-600 text-center text-sm">
          Para empresas e industrias. Máximo ahorro con instalaciones a gran escala.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- CALCULADORA CTA -->
<section class="relative bg-gradient-to-br from-green-600 via-green-700 to-green-900 text-white py-28 overflow-hidden">
  <div
    class="absolute inset-0 opacity-10 bg-[url('<?php echo BASE_URL; ?>Assets/images/pattern.png')] mix-blend-overlay">
  </div>
  <div
    class="absolute -top-24 -right-24 w-96 h-96 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse">
  </div>
  <div
    class="absolute -bottom-24 -left-24 w-96 h-96 bg-green-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse">
  </div>

  <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-16 relative z-10">
    <div class="md:w-1/2" data-aos="fade-right">
      <img src="<?php echo BASE_URL; ?>Assets/images/uploads/ahorro.jpg" alt="Calculadora Solar"
        class="rounded-3xl shadow-2xl transform rotate-1 hover:rotate-0 transition duration-500 border-8 border-white/20">
    </div>
    <div class="md:w-1/2 text-center md:text-left" data-aos="fade-left">
      <h2 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
        Tu ahorro comienza <span class="text-yellow-300">aquí</span>
      </h2>
      <p class="text-xl text-green-50 mb-8 leading-relaxed font-light">
        Simulá tu consumo y descubrí cuánto podés ahorrar hoy mismo. Gratis y en minutos.
      </p>
      <a href="<?php echo base_url(); ?>calcular"
        class="inline-flex items-center gap-3 bg-white text-green-800 font-bold px-8 py-4 rounded-full shadow-2xl hover:bg-yellow-300 hover:text-green-900 transition-all transform hover:-translate-y-1 hover:scale-105">
        <i class="fas fa-calculator text-xl"></i> Simular Ahorro
      </a>
    </div>
  </div>
</section>

<!-- PROYECTOS -->
<section class="relative py-32 flex items-center justify-center text-white overflow-hidden bg-fixed">
  <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover">
    <source src="<?php echo BASE_URL; ?>Assets/videos/solar.mov" type="video/mp4">
  </video>
  <div class="absolute inset-0 bg-black/70 backdrop-blur-[2px]"></div>
  <div class="relative z-10 text-center px-6 max-w-4xl" data-aos="zoom-in">
    <h2 class="text-5xl md:text-7xl font-extrabold mb-6 drop-shadow-2xl">
      Nuestros <span class="text-green-400">Proyectos</span>
    </h2>
    <p class="text-xl md:text-2xl text-gray-200 mb-10 font-light drop-shadow-lg">
      Galería de instalaciones reales. Calidad que se ve.
    </p>
    <a href="<?php echo base_url(); ?>proyectos"
      class="inline-block border-2 border-white/80 text-white hover:bg-white hover:text-green-900 px-10 py-4 rounded-full font-bold text-lg transition duration-300 shadow-xl">
      Ver Galería →
    </a>
  </div>
</section>

<!-- PRODUCTOS DESTACADOS -->
<section id="productos-destacados" class="bg-gray-50 py-24">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16" data-aos="fade-up">
      <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">
        Productos <span class="text-green-600">Destacados</span>
      </h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        Equipos de última generación con garantía extendida.
      </p>
    </div>

    <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">
      <!-- Producto 1 -->
      <article
        class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-100 flex flex-col group">
        <div class="relative h-80 overflow-hidden bg-gray-50 p-8 flex items-center justify-center">
          <img src="<?php echo BASE_URL; ?>Assets/images/uploads/panelsolar450w.jpeg" alt="Panel Solar"
            class="max-h-full max-w-full object-contain transition duration-700 group-hover:scale-110">
        </div>
        <div class="p-8 flex flex-col flex-1">
          <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition">Panel Solar 450W</h3>
          <p class="text-gray-600 mb-6 flex-1 text-sm leading-relaxed">Alta eficiencia para instalaciones residenciales
            y comerciales.</p>
          <a href="<?= BASE_URL ?>producto/mostrar"
            class="w-full text-center bg-gray-50 hover:bg-green-600 hover:text-white text-gray-800 font-bold py-3 rounded-xl transition">
            Ver Detalles
          </a>
        </div>
      </article>

      <!-- Producto 2 -->
      <article
        class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-100 flex flex-col group">
        <div class="relative h-80 overflow-hidden bg-gray-50 p-8 flex items-center justify-center">
          <img src="<?php echo BASE_URL; ?>Assets/images/uploads/inversor5kw.jpeg" alt="Inversor"
            class="max-h-full max-w-full object-contain transition duration-700 group-hover:scale-110">
        </div>
        <div class="p-8 flex flex-col flex-1">
          <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition">Inversor 5kW</h3>
          <p class="text-gray-600 mb-6 flex-1 text-sm leading-relaxed">Convierte energía solar con máxima eficiencia e
            inteligencia.</p>
          <a href="<?= BASE_URL ?>producto/mostrar"
            class="w-full text-center bg-gray-50 hover:bg-green-600 hover:text-white text-gray-800 font-bold py-3 rounded-xl transition">
            Ver Detalles
          </a>
        </div>
      </article>

      <!-- Producto 3 -->
      <article
        class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-100 flex flex-col group">
        <div class="relative h-80 overflow-hidden bg-gray-50 p-8 flex items-center justify-center">
          <img src="<?php echo BASE_URL; ?>Assets/images/uploads/bateriadelitio48v.jpeg" alt="Batería"
            class="max-h-full max-w-full object-contain transition duration-700 group-hover:scale-110">
        </div>
        <div class="p-8 flex flex-col flex-1">
          <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition">Batería Litio 48V</h3>
          <p class="text-gray-600 mb-6 flex-1 text-sm leading-relaxed">Autonomía y duración superior para sistemas
            aislados.</p>
          <a href="<?= BASE_URL ?>producto/mostrar"
            class="w-full text-center bg-gray-50 hover:bg-green-600 hover:text-white text-gray-800 font-bold py-3 rounded-xl transition">
            Ver Detalles
          </a>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- CONTACTO -->
<section id="contacto" class="bg-white py-24">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16" data-aos="fade-up">
      <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">Contactanos</h2>
      <p class="text-lg text-gray-600">Estamos listos para asesorarte en tu proyecto solar.</p>
    </div>

    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2 border border-gray-100">
      <!-- Info de contacto -->
      <div
        class="bg-gradient-to-br from-gray-900 to-gray-800 text-white p-12 flex flex-col justify-center relative overflow-hidden">
        <div
          class="absolute top-0 right-0 w-64 h-64 bg-green-500 rounded-full mix-blend-overlay filter blur-3xl opacity-20">
        </div>
        <h3 class="text-3xl font-bold mb-8 relative z-10">Hablemos</h3>
        <div class="space-y-8 text-lg relative z-10">
          <div class="flex items-center gap-6">
            <div class="w-14 h-14 bg-green-600/20 rounded-2xl flex items-center justify-center text-green-400">
              <i class="fas fa-map-marker-alt text-2xl"></i>
            </div>
            <div>
              <p class="font-semibold">Oficina Central</p>
              <p class="text-gray-300">Joaquín V. González 50, Tucumán</p>
            </div>
          </div>
          <div class="flex items-center gap-6">
            <div class="w-14 h-14 bg-green-600/20 rounded-2xl flex items-center justify-center text-green-400">
              <i class="fas fa-envelope text-2xl"></i>
            </div>
            <div>
              <p class="font-semibold">Email</p>
              <p class="text-gray-300">info@uvenergiasolar.com.ar</p>
            </div>
          </div>
          <div class="flex items-center gap-6">
            <div class="w-14 h-14 bg-green-600/20 rounded-2xl flex items-center justify-center text-green-400">
              <i class="fas fa-phone text-2xl"></i>
            </div>
            <div>
              <p class="font-semibold">Teléfono</p>
              <p class="text-gray-300">+54 9 3865 58 63 22</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Formulario -->
      <div class="p-12 bg-white">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Envíanos un mensaje</h3>
        <form id="formContacto" class="space-y-6" action="<?php echo base_url(); ?>contacto/enviarMensaje"
          method="POST">
          <div class="grid md:grid-cols-2 gap-6">
            <input type="text" id="txtNombre" name="nombre" placeholder="Nombre" required
              class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
            <input type="text" id="txtEmpresa" name="empresa" placeholder="Empresa"
              class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
          </div>
          <div class="grid md:grid-cols-2 gap-6">
            <input type="email" id="txtCorreo" name="correo" placeholder="Email" required
              class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
            <input type="tel" id="txtTelefono" name="telefono" placeholder="Teléfono"
              class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
          </div>
          <input type="text" id="txtAsunto" name="asunto" placeholder="Asunto" required
            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
          <textarea id="txtMensaje" name="mensaje" rows="4" placeholder="Mensaje" required
            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors resize-none"></textarea>
          <button type="submit" id="btnEnviar"
            class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-green-500/30 transition-all transform hover:-translate-y-1">
            <i class="fas fa-paper-plane mr-2"></i> Enviar Consulta
          </button>
        </form>
      </div>
    </div>

    <!-- Mapa -->
    <div class="mt-16 rounded-3xl overflow-hidden shadow-xl border border-gray-200 h-96">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3248.5918021079533!2d-65.58982192492044!3d-27.34702167639095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9423cf5b756c5319%3A0xff3042ee6168a5f4!2zSm9hcXXDrW4gVi4gR29uesOhbGV6IDUwLCBUNDE0NiBDb25jZXBjacOzbiwgVHVjdW3DoW4!5e0!3m2!1ses-419!2sar!4v1685554440000!5m2!1ses-419!2sar"
        width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
</section>

<?php
if (function_exists('footerAdmin')) {
  footerAdmin($data);
} else {
  include_once 'Templates/footer.php';
}
?>

<script>
  const base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo BASE_URL; ?>Assets/js/contacto.js"></script>