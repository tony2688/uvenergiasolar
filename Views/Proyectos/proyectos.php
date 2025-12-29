<?php
// Llamada a la función que carga el header del administrador con los datos necesarios
headerAdmin($data);
?>

<!-- =======================================
              HERO SECTION
======================================= -->

<!-- Sección hero con video de fondo, texto centrado y superposición oscura -->
<section class="relative w-full min-h-[70vh] flex items-center justify-center text-white text-center px-6 pt-32 md:pt-40 overflow-hidden">
  <!-- Video de fondo en distintos formatos -->
  <video class="absolute inset-0 w-full h-full object-cover z-0" autoplay loop muted playsinline>
    <source src="<?php echo BASE_URL; ?>Assets/videos/solar.mov" type="video/quicktime">
    <source src="<?php echo BASE_URL; ?>Assets/videos/video1.mp4" type="video/mp4">
    <!-- Imagen de respaldo si no carga el video -->
    <img src="<?php echo BASE_URL; ?>Assets/images/uploads/nosotros.png" alt="Energía Solar" class="w-full h-full object-cover">
  </video>

  <!-- Capa negra con opacidad -->
  <div class="absolute inset-0 bg-black/60 z-0"></div>

  <!-- Contenido central encima del video -->
  <div class="relative z-10 max-w-4xl animate-on-scroll text-white text-center">
    <!-- Título principal -->
    <h2 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight drop-shadow-xl">
      <span class="text-white">Nuestros</span>
      <span class="text-green-500">Proyectos</span>
    </h2>

    <!-- Subtítulo -->
    <p class="text-lg md:text-2xl text-white/90 font-medium leading-relaxed px-4">
      Conocé algunos de nuestros <span class="text-yellow-400 font-semibold">trabajos reales</span> instalados en
      <span class="text-yellow-400 font-semibold">hogares</span>, <span class="text-yellow-400 font-semibold">comercios</span> e
      <span class="text-yellow-400 font-semibold">industrias</span>. Diseños <span class="text-yellow-400 font-semibold">personalizados</span>,
      <span class="text-yellow-400 font-semibold">ahorro garantizado</span>, y energías <span class="text-yellow-400 font-semibold">limpias</span> al alcance de todos.
    </p>
  </div>
</section>

<!-- =====================================
GALERÍA DE PROYECTOS
======================================= -->

<!-- Galería que muestra los proyectos en tarjetas -->
<section id="proyectos" class="bg-gray-100 py-20">
  <div class="max-w-7xl mx-auto px-6">

    <!-- Grid de tarjetas -->
    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">

      <?php
      // Arreglos con imágenes, títulos y descripciones de los proyectos
      $imagenes = ['imagen5.jpg', 'imagen8.jpg', 'imagen7.jpg', 'imagen9.jpg', 'imagen22.jpg', 'imagen11.jpg', 'imagen12.jpg', 'imagen19.jpg', 'imagen21.jpg'];
      $titulos = ['Residencial - Concepcion', 'Residencial - Cadillal', 'Residencial - Tucumán', 'Residencial - Monteros', 'Rural - El Mollar', 'Rural - Banda del Río Sali', 'Rural - Aguilares', 'Residencial - El Mollar', 'Residencial - Los Nogales'];
      $descripciones = ['Sistema de 5kW para una vivienda unifamiliar.', 'Instalación de 12kW en local gastronómico.', 'Planta solar para industria textil de 25kW.', 'Sistema de respaldo para zonas rurales.', 'Inversores trifásicos conectados a red.', 'Autonomía energética para fábrica.', 'Instalación familiar con baterías.', 'Paneles para riego agrícola.', 'Edificio alimentado 100% con solar.'];

      // Bucle para mostrar cada proyecto
      for ($i = 0; $i < count($imagenes); $i++): ?>

        <!-- Tarjeta individual del proyecto -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <!-- Imagen del proyecto con zoom en hover -->
          <img src="<?= BASE_URL ?>Assets/images/uploads/<?= $imagenes[$i]; ?>"
            alt="<?= $titulos[$i]; ?>"
            class="w-full h-[260px] object-cover object-center hover:scale-105 transition duration-300 cursor-pointer"
            onclick="openModal('modal-<?= $i ?>')" />

          <!-- Contenido textual -->
          <div class="p-4">
            <h3 class="text-xl font-semibold text-gray-800"><?= $titulos[$i]; ?></h3>
            <p class="text-gray-600 text-sm"><?= $descripciones[$i]; ?></p>
          </div>
        </div>

        <!-- Modal personalizado con Tailwind CSS -->
        <div id="modal-<?= $i ?>" class="modal fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
          <div class="bg-white p-6 rounded-lg max-w-4xl w-full">
            <div class="flex justify-between items-center mb-4">
              <h5 class="text-xl font-semibold text-center w-full"><?= $titulos[$i]; ?></h5> <!-- Título centrado -->
              <button onclick="closeModal('modal-<?= $i ?>')" class="text-gray-600 hover:text-gray-900">
                <span class="text-rojo">X</span>
              </button>
            </div>

            <!-- Imagen ajustada al 50% del contenedor -->
            <div class="flex justify-center mb-4">
              <img src="<?= BASE_URL ?>Assets/images/uploads/<?= $imagenes[$i]; ?>" alt="<?= $titulos[$i]; ?>" class="w-1/2 h-auto object-cover" />
            </div>

            <!-- Descripción centrada debajo de la imagen -->
            <p class="text-gray-600 text-center"><?= $descripciones[$i]; ?></p> <!-- Descripción centrada -->
          </div>
        </div>


      <?php endfor; ?>

    </div>
  </div>
</section>

<!-- =====================================
            CTA FINAL (Botón de WhatsApp)
======================================= -->

<!-- Botón centrado para contacto por WhatsApp -->
<div class="max-w-7xl mx-auto px-6 mt-12 text-center">
  <a href="https://wa.me/5493865586322?text=Hola,%20quiero%20un%20presupuesto%20para%20un%20proyecto%20solar"
    target="_blank"
    class="inline-block px-8 py-4 bg-green-600 text-white text-lg font-semibold rounded-full hover:bg-green-700 transition">
    Solicitar presupuesto por WhatsApp →
  </a>
</div>

<br>

<?php
// Llamada al footer de administrador para cerrar el HTML
footerAdmin($data);
?>