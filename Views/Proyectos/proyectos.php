<?php headerAdmin($data); ?>

<div class="bg-gray-900 pt-32 pb-16 relative overflow-hidden">
  <video class="absolute inset-0 w-full h-full object-cover opacity-40" autoplay loop muted playsinline>
    <source src="<?php echo BASE_URL; ?>Assets/videos/solar.mov" type="video/quicktime">
    <source src="<?php echo BASE_URL; ?>Assets/videos/video1.mp4" type="video/mp4">
  </video>

  <div class="absolute inset-0 bg-gradient-to-b from-gray-900/90 via-gray-900/60 to-gray-50 dark:to-gray-900"></div>

  <div class="container mx-auto px-4 relative z-10 text-center">
    <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 animate-fade-in drop-shadow-lg">
      Nuestros <span class="text-green-500">Proyectos</span>
    </h1>
    <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto animate-fade-in-up font-light leading-relaxed">
      Explorá nuestra galería de instalaciones reales. Desde hogares hasta industrias,
      llevamos <span class="text-yellow-400 font-semibold">energía limpia y ahorro</span> a todo Tucumán.
    </p>
  </div>
</div>

<section class="py-16 bg-gray-50 dark:bg-gray-900 min-h-screen">
  <div class="container mx-auto px-4 max-w-7xl">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <?php
      // Obtenemos los proyectos desde el controlador
      $proyectos = isset($data['proyectos_list']) ? $data['proyectos_list'] : [];

      foreach ($proyectos as $index => $proyecto):
        // Ruta de la imagen
        $imgSrc = BASE_URL . "Assets/images/uploads/" . $proyecto['img'];
        ?>

        <article
          class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 flex flex-col h-full animate-fade-in">

          <div class="relative h-64 overflow-hidden cursor-pointer" onclick="abrirModal(<?php echo $index; ?>)">
            <img src="<?php echo $imgSrc; ?>" alt="<?php echo $proyecto['titulo']; ?>" loading="lazy"
              class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">

            <div
              class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <i class="fas fa-search-plus text-white text-3xl"></i>
            </div>

            <span
              class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
              <?php echo $proyecto['categoria']; ?>
            </span>
          </div>

          <div class="p-6 flex flex-col flex-grow">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 group-hover:text-green-600 transition-colors">
              <?php echo $proyecto['titulo']; ?>
            </h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed flex-grow">
              <?php echo $proyecto['desc']; ?>
            </p>

            <button onclick="abrirModal(<?php echo $index; ?>)"
              class="mt-4 text-green-600 dark:text-green-400 font-semibold text-sm hover:underline self-start">
              Ver detalle &rarr;
            </button>
          </div>

          <dialog id="modal-<?php echo $index; ?>"
            class="modal-proyecto fixed inset-0 z-50 w-full h-full bg-transparent p-0 m-0 hidden">
            <div class="fixed inset-0 bg-black/90 backdrop-blur-sm transition-opacity"
              onclick="cerrarModal(<?php echo $index; ?>)"></div>

            <div class="relative z-50 m-auto flex flex-col items-center justify-center h-full p-4 pointer-events-none">
              <div
                class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-2xl max-w-4xl w-full pointer-events-auto transform scale-95 transition-transform duration-300">

                <div class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-700">
                  <h4 class="text-lg font-bold text-gray-800 dark:text-white">
                    <?php echo $proyecto['titulo']; ?>
                  </h4>
                  <button onclick="cerrarModal(<?php echo $index; ?>)"
                    class="text-gray-500 hover:text-red-500 transition text-2xl font-bold focus:outline-none px-2">
                    &times;
                  </button>
                </div>

                <div class="bg-black flex justify-center items-center bg-pattern">
                  <img src="<?php echo $imgSrc; ?>" alt="<?php echo $proyecto['titulo']; ?>"
                    class="max-h-[60vh] w-auto object-contain">
                </div>

                <div class="p-6 bg-white dark:bg-gray-800">
                  <p class="text-gray-700 dark:text-gray-300 text-center text-lg">
                    <?php echo $proyecto['desc']; ?>
                  </p>
                  <div class="mt-6 text-center">
                    <a href="https://wa.me/5493865586322?text=Me%20interesa%20el%20proyecto:%20<?php echo urlencode($proyecto['titulo']); ?>"
                      target="_blank"
                      class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-bold transition">
                      <i class="fab fa-whatsapp"></i> Consultar por este proyecto
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </dialog>

        </article>
      <?php endforeach; ?>

    </div>

    <div class="mt-16 text-center">
      <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">¿Tenés un proyecto en mente?</h3>
      <a href="<?php echo BASE_URL; ?>contacto"
        class="inline-block px-8 py-4 bg-gray-900 dark:bg-green-600 text-white text-lg font-bold rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        Solicitar Cotización Gratuita
      </a>
    </div>

  </div>
</section>

<script>
  function abrirModal(index) {
    const modal = document.getElementById(`modal-${index}`);
    if (modal) {
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden'; // Evitar scroll de fondo

      // Animación de entrada
      setTimeout(() => {
        const content = modal.querySelector('div.transform'); // Buscamos el contenedor interno
        if (content) {
          content.classList.remove('scale-95', 'opacity-0');
          content.classList.add('scale-100', 'opacity-100');
        }
      }, 10);
    }
  }

  function cerrarModal(index) {
    const modal = document.getElementById(`modal-${index}`);
    if (modal) {
      document.body.style.overflow = ''; // Restaurar scroll
      modal.classList.add('hidden');
    }
  }

  // Cerrar con tecla ESC
  document.addEventListener('keydown', function (event) {
    if (event.key === "Escape") {
      const modales = document.querySelectorAll('.modal-proyecto:not(.hidden)');
      modales.forEach(m => {
        m.classList.add('hidden');
        document.body.style.overflow = '';
      });
    }
  });
</script>

<?php footerAdmin($data); ?>