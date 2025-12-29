<?php
// Carga el encabezado del panel de administración con los datos pasados
headerAdmin($data);
?>

<!-- =======================================
          SECCIÓN EDUCATIVA - APRENDER
======================================= -->

<!-- Hero Section con fondo parallax mejorado y animación -->
<section class="relative h-80 bg-fixed bg-center bg-cover flex items-center justify-center"
  style="background-image: url('<?php echo BASE_URL; ?>Assets/images/uploads/about.jpg');">
  <!-- Capa oscura encima de la imagen para mejorar el contraste del texto -->
  <div class="absolute inset-0 bg-black/60 z-0"></div>

  <!-- Contenido del hero con animación y centrado -->
  <div class="relative z-10 text-center text-white px-4 animate-fade-in-down">
    <h1 class="text-5xl md:text-7xl font-extrabold mb-4 drop-shadow-xl tracking-wide">
      <span class="text-white">Energía</span> <span class="text-green-400">Solar</span>
    </h1>
    <p class="text-xl md:text-2xl max-w-3xl mx-auto text-gray-200 drop-shadow-sm">
      Conocimiento para un futuro más <span class="text-yellow-300 font-semibold">sustentable</span>
    </p>
  </div>
</section>

<!-- Barra de navegación rápida con enlaces a secciones -->
<div class="bg-green-600 text-white py-4 sticky top-0 z-50 shadow-md">
  <div class="max-w-7xl mx-auto px-6">
    <ul class="flex flex-wrap justify-center md:justify-between gap-6 text-sm md:text-base font-medium">
      <li><a href="#conceptos-basicos" class="hover:text-yellow-300 transition">Conceptos Básicos</a></li>
      <li><a href="#tipos-sistemas" class="hover:text-yellow-300 transition">Tipos de Sistemas</a></li>
      <li><a href="#beneficios" class="hover:text-yellow-300 transition">Beneficios</a></li>
      <li><a href="#calculadora" class="hover:text-yellow-300 transition">Calculadora</a></li>
      <li><a href="#preguntas" class="hover:text-yellow-300 transition">Preguntas Frecuentes</a></li>
      <li><a href="#recursos" class="hover:text-yellow-300 transition">Recursos</a></li>
    </ul>
  </div>
</div>

<!-- Sección principal de contenido educativo -->
<section id="conceptos-basicos" class="bg-white py-20 text-gray-800">
  <div class="max-w-7xl mx-auto px-6">

    <!-- Título principal con subtítulo y línea decorativa -->
    <div class="text-center mb-16">
      <h2 class="text-5xl md:text-6xl font-extrabold mb-4">
        Aprendé sobre <span class="text-green-600">Energía Solar</span>
      </h2>
      <p class="text-lg text-gray-600 max-w-3xl mx-auto">
        Conocé los fundamentos, beneficios y opciones de sistemas solares para tomar decisiones informadas y contribuir a un futuro más sustentable.
      </p>
      <hr class="w-24 border-t-4 border-green-600 mx-auto mt-8">
    </div>

    <!-- Bloque en dos columnas: texto + imagen -->
    <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
      <!-- Columna de texto -->
      <div class="order-2 md:order-1">
        <h3 class="text-3xl font-bold text-green-700 mb-6">¿Qué es la Energía Solar?</h3>
        <p class="text-lg text-gray-700 mb-4">
          La energía solar es una fuente de energía renovable que se obtiene del sol mediante la captación de su radiación electromagnética. Es una alternativa limpia y sostenible a los combustibles fósiles.
        </p>
        <p class="text-lg text-gray-700 mb-4">
          Los paneles solares fotovoltaicos convierten la luz solar directamente en electricidad mediante el efecto fotoeléctrico, mientras que los sistemas térmicos utilizan el calor del sol para calentar agua o aire.
        </p>
        <p class="text-lg text-gray-700">
          Esta tecnología ha evolucionado significativamente en las últimas décadas, volviéndose más eficiente y accesible para hogares, empresas e industrias de todo el mundo.
        </p>
      </div>

      <!-- Columna de imagen -->
      <div class="order-1 md:order-2">
        <img src="<?php echo BASE_URL; ?>Assets/images/uploads/campo1.jpg"
          alt="Paneles solares en funcionamiento"
          class="rounded-xl shadow-xl w-full h-auto">
      </div>
    </div>

    <!-- Cómo funciona - Infografía interactiva -->
    <div class="bg-gray-50 p-8 rounded-2xl shadow-lg mb-20">
      <!-- Título centrado -->
      <h3 class="text-3xl font-bold text-center text-green-700 mb-8">¿Cómo funciona un sistema solar?</h3>

      <!-- Grid de pasos: Captación, Conversión, Distribución, Almacenamiento -->
      <div class="grid md:grid-cols-4 gap-6 text-center">

        <!-- Paso 1: Captación -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105">
          <div class="bg-green-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
            <i class="fas fa-sun text-3xl text-yellow-500"></i>
          </div>
          <h4 class="text-xl font-semibold mb-2">1. Captación</h4>
          <p>Los paneles solares captan la radiación solar y la convierten en electricidad de corriente continua (DC).</p>
        </div>

        <!-- Paso 2: Conversión -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105">
          <div class="bg-green-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
            <i class="fas fa-exchange-alt text-3xl text-green-600"></i>
          </div>
          <h4 class="text-xl font-semibold mb-2">2. Conversión</h4>
          <p>El inversor transforma la corriente continua en corriente alterna (AC) utilizable en el hogar.</p>
        </div>

        <!-- Paso 3: Distribución -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105">
          <div class="bg-green-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
            <i class="fas fa-bolt text-3xl text-blue-500"></i>
          </div>
          <h4 class="text-xl font-semibold mb-2">3. Distribución</h4>
          <p>La electricidad se distribuye para su uso inmediato en electrodomésticos y sistemas del hogar.</p>
        </div>

        <!-- Paso 4: Almacenamiento -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105">
          <div class="bg-green-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
            <i class="fas fa-battery-full text-3xl text-red-500"></i>
          </div>
          <h4 class="text-xl font-semibold mb-2">4. Almacenamiento</h4>
          <p>El excedente puede almacenarse en baterías o inyectarse a la red eléctrica según el tipo de sistema.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Tipos de Sistemas Solares -->
<section id="tipos-sistemas" class="bg-gray-100 py-20 text-gray-800">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Título -->
    <h2 class="text-4xl font-bold text-center mb-16">Tipos de <span class="text-green-600">Sistemas Solares</span></h2>

    <!-- Tarjetas de sistemas principales -->
    <div class="grid md:grid-cols-3 gap-8 mb-12">

      <!-- Sistema On-Grid -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden transition transform hover:scale-105 hover:shadow-xl">
        <!-- Icono -->
        <div class="flex items-center justify-center bg-gray-50 p-6 h-48">
          <img src="<?php echo BASE_URL; ?>Assets/icons/conectadoalared.svg" alt="Sistema On-Grid" class="max-h-full w-auto object-contain">
        </div>
        <!-- Contenido -->
        <div class="p-6">
          <h3 class="text-2xl font-bold text-green-700 mb-3">Conectados a la Red (On-Grid)</h3>
          <ul class="text-gray-700 space-y-2">
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Permanecen conectados a la red eléctrica convencional</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Permiten inyectar excedentes a la red (según normativa)</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>No requieren baterías, reduciendo costos iniciales</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Ideales para zonas urbanas con servicio eléctrico estable</span></li>
          </ul>
        </div>
      </div>

      <!-- Sistema Off-Grid -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden transition transform hover:scale-105 hover:shadow-xl">
        <div class="flex items-center justify-center bg-gray-50 p-6 h-48">
          <img src="<?php echo BASE_URL; ?>Assets/icons/generadoresautonomo.svg" alt="Sistema Off-Grid" class="max-h-full w-auto object-contain">
        </div>
        <div class="p-6">
          <h3 class="text-2xl font-bold text-green-700 mb-3">Autónomos (Off-Grid)</h3>
          <ul class="text-gray-700 space-y-2">
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Completamente independientes de la red eléctrica</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Incluyen banco de baterías para almacenamiento</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Perfectos para zonas rurales o sin acceso a la red</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Proporcionan independencia energética total</span></li>
          </ul>
        </div>
      </div>

      <!-- Sistema Híbrido -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden transition transform hover:scale-105 hover:shadow-xl">
        <div class="flex items-center justify-center bg-gray-50 p-6 h-48">
          <img src="<?php echo BASE_URL; ?>Assets/icons/bancodebaterias.svg" alt="Sistema Híbrido" class="max-h-full w-auto object-contain">
        </div>
        <div class="p-6">
          <h3 class="text-2xl font-bold text-green-700 mb-3">Híbridos</h3>
          <ul class="text-gray-700 space-y-2">
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Combinan conexión a red con almacenamiento en baterías</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Ofrecen respaldo durante cortes de energía</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Maximizan el autoconsumo y la eficiencia energética</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>Solución versátil para diversas necesidades</span></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Sistemas Especializados -->
    <div class="grid md:grid-cols-2 gap-8">

      <!-- Bombeo Solar -->
      <div class="bg-white rounded-xl shadow-lg p-6 flex items-center gap-6 transition transform hover:scale-105 hover:shadow-xl">
        <!-- Ícono representativo -->
        <img src="<?php echo BASE_URL; ?>Assets/icons/sistemadebombeo.svg" alt="Sistema de bombeo solar" class="w-24 h-24 rounded-full object-contain">

        <!-- Descripción del sistema -->
        <div>
          <h3 class="text-xl font-bold text-green-700 mb-2">Sistemas de Bombeo Solar</h3>
          <p class="text-gray-700">Soluciones específicas para extracción y distribución de agua utilizando energía solar, ideales para riego, ganadería y abastecimiento en zonas rurales.</p>
        </div>
      </div>

      <!-- Alumbrado Autónomo -->
      <div class="bg-white rounded-xl shadow-lg p-6 flex items-center gap-6 transition transform hover:scale-105 hover:shadow-xl">
        <!-- Ícono representativo -->
        <img src="<?php echo BASE_URL; ?>Assets/icons/alumbradoautonomo.svg" alt="Alumbrado autónomo solar" class="w-24 h-24 rounded-full object-contain">

        <!-- Descripción del sistema -->
        <div>
          <h3 class="text-xl font-bold text-green-700 mb-2">Alumbrado Autónomo</h3>
          <p class="text-gray-700">Sistemas de iluminación independientes alimentados por energía solar, perfectos para espacios públicos, caminos, estacionamientos y áreas sin acceso a la red eléctrica.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Beneficios de la Energía Solar -->
<section id="beneficios" class="bg-white py-20 text-gray-800">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Título principal -->
    <h2 class="text-4xl font-bold text-center mb-16">Beneficios de la <span class="text-green-600">Energía Solar</span></h2>

    <!-- Grid de beneficios -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Beneficio 1: Ahorro -->
      <div class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-xl transition">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
          <i class="fas fa-dollar-sign text-3xl text-green-600"></i>
        </div>
        <h3 class="text-xl font-bold text-center mb-4">Ahorro Económico</h3>
        <p class="text-gray-700">Reducí tu factura eléctrica hasta un 90% y protegete de los aumentos tarifarios futuros. La inversión inicial se recupera en 3-5 años.</p>
      </div>

      <!-- Beneficio 2: Impacto Ambiental -->
      <div class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-xl transition">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
          <i class="fas fa-leaf text-3xl text-green-600"></i>
        </div>
        <h3 class="text-xl font-bold text-center mb-4">Impacto Ambiental</h3>
        <p class="text-gray-700">Cada kWh de energía solar evita la emisión de aproximadamente 0.5 kg de CO2. Un sistema residencial promedio equivale a plantar 100 árboles al año.</p>
      </div>

      <!-- Beneficio 3: Independencia -->
      <div class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-xl transition">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
          <i class="fas fa-bolt text-3xl text-green-600"></i>
        </div>
        <h3 class="text-xl font-bold text-center mb-4">Independencia Energética</h3>
        <p class="text-gray-700">Generá tu propia energía y reducí la dependencia de la red eléctrica. Protegete contra cortes de luz y fluctuaciones en el servicio.</p>
      </div>

      <!-- Beneficio 4: Valor de Propiedad -->
      <div class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-xl transition">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
          <i class="fas fa-home text-3xl text-green-600"></i>
        </div>
        <h3 class="text-xl font-bold text-center mb-4">Valor de Propiedad</h3>
        <p class="text-gray-700">Las propiedades con sistemas solares aumentan su valor de mercado entre un 3% y 4%, además de ser más atractivas para potenciales compradores.</p>
      </div>

      <!-- Beneficio 5: Durabilidad -->
      <div class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-xl transition">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
          <i class="fas fa-clock text-3xl text-green-600"></i>
        </div>
        <h3 class="text-xl font-bold text-center mb-4">Larga Vida Útil</h3>
        <p class="text-gray-700">Los paneles solares modernos tienen una vida útil de 25-30 años con garantías de rendimiento, ofreciendo décadas de energía limpia y confiable.</p>
      </div>

      <!-- Beneficio 6: Incentivos -->
      <div class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-xl transition">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
          <i class="fas fa-award text-3xl text-green-600"></i>
        </div>
        <h3 class="text-xl font-bold text-center mb-4">Incentivos y Políticas</h3>
        <p class="text-gray-700">Aprovechá los crecientes incentivos gubernamentales, exenciones impositivas y programas de fomento para energías renovables en Argentina.</p>
      </div>
    </div>
  </div>
</section>

<!-- Sección destacada tipo degradado naranja con botón a la calculadora -->
<section id="calculadora" class="py-24 text-white relative overflow-hidden bg-gradient-to-b from-[oklch(70%_0.25_41.116)] via-[oklch(64.6%_0.222_41.116)] to-[oklch(58%_0.18_41.116)]">
  <!-- Contenedor del contenido centrado -->
  <div class="relative z-10 max-w-3xl mx-auto text-center px-6">
    <!-- Título principal -->
    <h2 class="text-4xl md:text-5xl font-bold mb-6 drop-shadow">¿Querés saber cuántos paneles necesitás?</h2>
    <!-- Subtítulo -->
    <p class="text-lg md:text-xl mb-10 text-white/90">Usá nuestra calculadora solar para obtener una estimación personalizada según tu consumo mensual.</p>
    <!-- Botón a la calculadora -->
    <a href="<?= BASE_URL ?>calcular" class="inline-flex items-center gap-3 px-8 py-4 bg-white text-orange-700 font-semibold text-lg rounded-full shadow-lg hover:bg-gray-100 transition">
      <i class="fas fa-bolt text-orange-500"></i>
      Ir a la Calculadora Solar →
    </a>
  </div>

  <!-- Capa decorativa de fondo radial -->
  <div class="absolute top-0 left-0 w-full h-full z-0 bg-[radial-gradient(ellipse_at_top_right,_rgba(255,255,255,0.08),_transparent)]"></div>
</section>

<!-- Preguntas Frecuentes Expandidas con detalles animados -->
<section id="preguntas" class="bg-gray-100 py-20 text-gray-800">
  <div class="max-w-5xl mx-auto px-6">
    <!-- Título principal -->
    <h2 class="text-4xl font-bold text-center mb-16">Preguntas <span class="text-green-600">Frecuentes</span></h2>

    <!-- Contenedor de preguntas -->
    <div class="space-y-6">

      <!-- Pregunta 1 -->
      <details class="bg-white p-6 rounded-xl shadow-md group">
        <summary class="font-bold text-xl cursor-pointer text-green-700 flex justify-between items-center">
          ¿Cuánto puedo ahorrar con paneles solares?
          <span class="transform group-open:rotate-180 transition-transform duration-300">
            <i class="fas fa-chevron-down"></i>
          </span>
        </summary>
        <div class="mt-4 text-gray-700 space-y-2">
          <p>Dependiendo del consumo y sistema, podés reducir entre un 50% y un 90% tu factura de electricidad. Un sistema solar residencial típico puede generar ahorros de $50,000 a $150,000 pesos anuales.</p>
          <p>El período de recuperación de la inversión suele ser de 3 a 5 años, mientras que los paneles tienen una vida útil de 25-30 años, lo que significa más de 20 años de energía prácticamente gratuita.</p>
        </div>
      </details>

      <!-- Pregunta 2 -->
      <details class="bg-white p-6 rounded-xl shadow-md group">
        <summary class="font-bold text-xl cursor-pointer text-green-700 flex justify-between items-center">
          ¿Qué mantenimiento requieren los sistemas solares?
          <span class="transform group-open:rotate-180 transition-transform duration-300">
            <i class="fas fa-chevron-down"></i>
          </span>
        </summary>
        <div class="mt-4 text-gray-700 space-y-2">
          <p>Los sistemas solares requieren muy poco mantenimiento. Se recomienda:</p>
          <ul class="list-disc pl-5 space-y-1">
            <li>Limpieza de paneles cada 3-6 meses para eliminar polvo y suciedad</li>
            <li>Inspección visual periódica para verificar conexiones y estructura</li>
            <li>Revisión profesional anual para optimizar el rendimiento</li>
          </ul>
          <p>Los inversores pueden requerir reemplazo después de 10-15 años, mientras que las baterías (en sistemas que las incluyen) tienen una vida útil de 5-15 años según el tipo y uso.</p>
        </div>
      </details>

      <!-- Pregunta 3 -->
      <details class="bg-white p-6 rounded-xl shadow-md group">
        <summary class="font-bold text-xl cursor-pointer text-green-700 flex justify-between items-center">
          ¿El sistema funciona en días nublados o lluviosos?
          <span class="transform group-open:rotate-180 transition-transform duration-300">
            <i class="fas fa-chevron-down"></i>
          </span>
        </summary>
        <div class="mt-4 text-gray-700 space-y-2">
          <p>Sí. Aunque la generación es menor, los paneles capturan energía solar difusa incluso en días nublados. En condiciones de nubosidad, un sistema solar puede generar entre el 10% y 30% de su capacidad máxima.</p>
          <p>Los sistemas conectados a la red compensan estas variaciones utilizando electricidad de la red cuando es necesario. Los sistemas con baterías almacenan energía en días soleados para utilizarla durante períodos de menor generación.</p>
        </div>
      </details>

      <!-- Pregunta 4 -->
      <details class="bg-white p-6 rounded-xl shadow-md group">
        <summary class="font-bold text-xl cursor-pointer text-green-700 flex justify-between items-center">
          ¿Cuánto espacio necesito para instalar paneles solares?
          <span class="transform group-open:rotate-180 transition-transform duration-300">
            <i class="fas fa-chevron-down"></i>
          </span>
        </summary>
        <div class="mt-4 text-gray-700 space-y-2">
          <p>Un panel solar estándar de 450W mide aproximadamente 2.2 m² y pesa alrededor de 25 kg. Para un sistema residencial típico de 3kW (suficiente para un hogar pequeño), necesitarías:</p>
          <ul class="list-disc pl-5 space-y-1">
            <li>6-7 paneles solares</li>
            <li>Aproximadamente 15 m² de superficie disponible</li>
            <li>Una estructura de soporte adecuada</li>
          </ul>
          <p>La orientación ideal es hacia el norte en el hemisferio sur, con una inclinación similar a la latitud de la ubicación para maximizar la captación solar.</p>
        </div>
      </details>

      <!-- Pregunta 5 -->
      <details class="bg-white p-6 rounded-xl shadow-md group">
        <summary class="font-bold text-xl cursor-pointer text-green-700 flex justify-between items-center">
          ¿Puedo instalar paneles solares en cualquier tipo de techo?
          <span class="transform group-open:rotate-180 transition-transform duration-300">
            <i class="fas fa-chevron-down"></i>
          </span>
        </summary>
        <div class="mt-4 text-gray-700 space-y-2">
          <p>Los paneles solares pueden instalarse en la mayoría de los techos, pero hay factores a considerar:</p>
          <ul class="list-disc pl-5 space-y-1">
            <li><strong>Material del techo:</strong> Funciona en tejas, chapa, losa y otros materiales comunes</li>
            <li><strong>Inclinación:</strong> Idealmente entre 10° y 40° (se pueden usar estructuras para ajustar)</li>
            <li><strong>Orientación:</strong> Preferentemente hacia el norte en el hemisferio sur</li>
          </ul>
        </div>
      </details>
      <!-- =======================================
                 FOOTER
======================================= -->

      <?php
      // Si existe la función footerAdmin, se ejecuta para cargar el pie de página
      if (function_exists('footerAdmin')) {
        footerAdmin($data);
      } else {
        // Si no existe, incluye directamente el archivo del footer por defecto
        include_once 'Templates/footer.php';
      }
      ?>