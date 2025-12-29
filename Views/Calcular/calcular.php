<?php
// Llamada a la función headerAdmin que incluye el header del sitio con los datos proporcionados
headerAdmin($data);
?>

<!-- =======================================
              Meta tags para SEO
======================================= -->

<head>
    <!-- Título dinámico de la página -->
    <title><?php echo $data['page_title']; ?> | UV Energía Solar</title>

    <!-- Descripción para motores de búsqueda -->
    <meta name="description" content="Calculadora solar para estimar potencia, generación y equipos necesarios para tu sistema de energía solar.">

    <!-- Meta para el responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- =======================================
          HERO con video de fondo
======================================= -->
<section class="relative w-full min-h-[80vh] flex items-center justify-center text-white text-center px-6 pt-32 md:pt-40 overflow-hidden">

    <!-- Video de fondo reproducido en loop -->
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="<?php echo BASE_URL; ?>Assets/videos/video5.mp4" type="video/mp4">
        Tu navegador no soporta videos en HTML5.
    </video>

    <!-- Capa oscura encima del video -->
    <div class="absolute inset-0 bg-black/60 z-10"></div>

    <!-- Contenido principal del hero -->
    <div class="relative z-20 max-w-3xl animate-fade-in text-white text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 drop-shadow-xl">
            <span class="text-white">Calculadora de</span>
            <span class="text-green-500">Energía Solar</span>
        </h1>
        <p class="text-lg md:text-2xl text-white/90 font-medium leading-relaxed">
            Descubrí cuánto podés <span class="text-yellow-400 font-semibold">ahorrar</span> mes a mes
            generando tu propia <span class="text-yellow-400 font-semibold">energía</span>.
        </p>
    </div>
</section>

<!-- Botón para cambiar entre modo claro y oscuro -->
<div class="flex justify-end mb-4">
    <button id="toggleDarkMode" class="flex items-center gap-2 text-sm bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white px-4 py-2 rounded-lg transition">
        <!-- Icono del sol -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h1M3 12H2m15.36 6.36l-.7-.7M6.34 6.34l-.7-.7m12.02 0l-.7.7M6.34 17.66l-.7.7M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <span>Modo Oscuro</span>
    </button>
</div>

<!-- =======================================
            CONTENIDO PRINCIPAL
======================================= -->
<main class="pt-24 max-w-5xl mx-auto px-4 py-6 sm:px-6 lg:px-8">

    <!-- Selector para elegir tipo de ingreso: por factura o electrodomésticos -->
    <div class="mb-6">
        <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">¿Cómo desea calcular?</label>
        <select id="tipoIngreso"
            class="w-full px-4 py-3 border border-green-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500
           bg-white text-gray-900 dark:bg-gray-800 dark:text-white dark:border-gray-600">
            <option value="factura">Con total de la factura</option>
            <option value="electrodomesticos">Con electrodomésticos</option>
        </select>
    </div>

    <!-- =======================================
            FORMULARIO POR FACTURA
    ======================================== -->
    <form id="formFactura" class="space-y-5 bg-white p-6 rounded-lg shadow-md border border-green-100">
        <!-- Campo para total de la factura en pesos -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Total factura eléctrica ($)</label>
            <input type="number" id="txtFacturaTotal" class="block w-full px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md">
        </div>

        <!-- Campo para consumo en kWh -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Consumo según factura (kWh)</label>
            <input type="number" id="txtConsumoFactura" class="block w-full px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md">
        </div>

        <!-- Frecuencia de la factura (mensual o bimestral) -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Frecuencia de la factura</label>
            <select id="frecuencia" class="block w-full px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md">
                <option value="mensual">Mensual</option>
                <option value="bimestral">Bimestral</option>
            </select>
        </div>

        <!-- Selección de ubicación geográfica -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Ubicación</label>
            <select id="listUbicacionFactura" class="block w-full px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md">
                <option value="">Seleccionar</option>
                <option value="norte">Norte (5.5 h/día)</option>
                <option value="centro">Centro (4.5 h/día)</option>
                <option value="sur">Sur (3.5 h/día)</option>
            </select>
        </div>
    </form>

    <!-- =======================================
        FORMULARIO POR ELECTRODOMÉSTICOS
    ======================================== -->
    <form id="formElectro" class="space-y-5 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-green-100 hidden">

        <!-- Ubicación geográfica -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ubicación</label>
            <select id="listUbicacionElectro" class="block w-full px-3 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">Seleccionar</option>
                <option value="norte">Norte (5.5 h/día)</option>
                <option value="centro">Centro (4.5 h/día)</option>
                <option value="sur">Sur (3.5 h/día)</option>
            </select>
        </div>

        <!-- Selector de electrodomésticos -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Agregar desde lista:</label>
            <select id="selectElectro" class="w-full border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">Seleccione</option>
            </select>
        </div>

        <!-- Tabla dinámica de electrodomésticos -->
        <div id="tablaElectro" class="space-y-2"></div>

        <!-- Botones para agregar o limpiar electrodomésticos -->
        <div class="flex flex-wrap gap-4 text-sm mt-2">
            <button type="button" onclick="agregarFila()" class="text-green-600 dark:text-green-400 underline">+ Agregar electrodoméstico</button>
            <button type="button" onclick="limpiarFilas()" class="text-red-600 dark:text-red-400 underline">🗑 Limpiar todo</button>
        </div>
    </form>

    <!-- BOTÓN PARA CALCULAR RESULTADOS -->
    <div class="mt-6">
        <button id="btnCalcular" class="w-full py-3 px-6 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition duration-200">
            🔍 Calcular
        </button>
    </div>

    <!-- =======================================
                RESULTADOS
    ======================================== -->
    <div id="resultados" class="mt-10 hidden">
        <h3 class="text-xl font-semibold text-center text-green-800 mb-6">📊 Resultados del Sistema</h3>

        <!-- Resultados individuales -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-sm text-gray-600">Potencia recomendada:</p>
                <p class="text-lg font-bold text-green-700" id="potencia"></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-sm text-gray-600">Generación mensual estimada:</p>
                <p class="text-lg font-bold text-green-700" id="generacion"></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-sm text-gray-600">Paneles solares necesarios:</p>
                <p class="text-lg font-bold text-green-700" id="paneles"></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-sm text-gray-600">Baterías necesarias:</p>
                <p class="text-lg font-bold text-green-700" id="baterias"></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-sm text-gray-600">Inversores necesarios:</p>
                <p class="text-lg font-bold text-green-700" id="inversores"></p>
            </div>
        </div>

        <!-- Gráfico generado con Chart.js -->
        <div class="overflow-x-auto">
            <canvas id="graficoSolar" class="w-full max-w-full" height="300"></canvas>
        </div>

        <!-- Botón para descargar en PDF -->
        <div class="mt-6 flex justify-center">
            <button id="btnDescargarPDF" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md">
                📄 Descargar Cotización en PDF
            </button>
        </div>

        <!-- Botón de WhatsApp para contacto -->
        <div class="mt-4 flex justify-center">
            <a href="https://wa.me/5493865586322" target="_blank"
                class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                <img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/whatsapp.svg" alt="WhatsApp" class="w-5 h-5 invert">
                Consultar por WhatsApp
            </a>
        </div>

        <!-- Preguntas frecuentes (FAQ) -->
        <section class="mt-10 max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-6 space-y-4 mt-16">
                🤔 Preguntas Frecuentes
            </h2>
            <div id="faqContainer" class="max-w-2xl mx-auto space-y-4 mt-6"></div>
        </section>
    </div>
</main>

<!-- =======================================
            SCRIPT MODO OSCURO
======================================= -->
<script>
    const toggleDarkMode = document.getElementById("toggleDarkMode");
    const htmlRoot = document.documentElement;

    // Aplica el tema oscuro si el usuario lo tiene en su sistema o lo guardó previamente
    if (localStorage.theme === "dark" || (!localStorage.theme && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
        htmlRoot.classList.add("dark");
    } else {
        htmlRoot.classList.remove("dark");
    }

    // Al hacer clic, cambia el modo entre claro y oscuro
    toggleDarkMode.addEventListener("click", () => {
        htmlRoot.classList.toggle("dark");
        localStorage.theme = htmlRoot.classList.contains("dark") ? "dark" : "light";
    });
</script>

<?php
// Llamada al footer del sitio
footerAdmin($data);
?>