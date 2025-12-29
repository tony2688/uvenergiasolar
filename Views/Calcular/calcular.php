<?php
// Llamada a la función headerAdmin que incluye el header del sitio (HTML, HEAD y apertura de BODY)
headerAdmin($data);
?>

<section
    class="relative w-full min-h-[80vh] flex items-center justify-center text-white text-center px-6 pt-32 md:pt-40 overflow-hidden">

    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="<?php echo BASE_URL; ?>Assets/videos/video5.mp4" type="video/mp4">
        Tu navegador no soporta videos en HTML5.
    </video>

    <div class="absolute inset-0 bg-black/60 z-10"></div>

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

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end mt-4 mb-2">
    <button id="toggleDarkMode"
        class="flex items-center gap-2 text-sm bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white px-4 py-2 rounded-lg transition shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 3v1m0 16v1m9-9h1M3 12H2m15.36 6.36l-.7-.7M6.34 6.34l-.7-.7m12.02 0l-.7.7M6.34 17.66l-.7.7M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <span>Modo Oscuro</span>
    </button>
</div>

<main class="max-w-5xl mx-auto px-4 py-6 sm:px-6 lg:px-8 min-h-screen">

    <div class="mb-6">
        <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">¿Cómo desea calcular?</label>
        <select id="tipoIngreso" class="w-full px-4 py-3 border border-green-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500
           bg-white text-gray-900 dark:bg-gray-800 dark:text-white dark:border-gray-600 transition-colors">
            <option value="factura">Con total de la factura</option>
            <option value="electrodomesticos">Con electrodomésticos</option>
        </select>
    </div>

    <form id="formFactura"
        class="space-y-5 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-green-100 dark:border-gray-700 transition-colors">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total factura eléctrica
                ($)</label>
            <input type="number" id="txtFacturaTotal"
                class="block w-full px-4 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-green-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Consumo según factura
                (kWh)</label>
            <input type="number" id="txtConsumoFactura"
                class="block w-full px-4 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-green-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Frecuencia de la factura</label>
            <select id="frecuencia"
                class="block w-full px-4 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-green-500 outline-none">
                <option value="mensual">Mensual</option>
                <option value="bimestral">Bimestral</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ubicación</label>
            <select id="listUbicacionFactura"
                class="block w-full px-4 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-green-500 outline-none">
                <option value="">Seleccionar</option>
                <option value="norte">Norte (5.5 h/día)</option>
                <option value="centro">Centro (4.5 h/día)</option>
                <option value="sur">Sur (3.5 h/día)</option>
            </select>
        </div>
    </form>

    <form id="formElectro"
        class="space-y-5 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-green-100 dark:border-gray-700 hidden transition-colors">

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ubicación</label>
            <select id="listUbicacionElectro"
                class="block w-full px-3 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-green-500 outline-none">
                <option value="">Seleccionar</option>
                <option value="norte">Norte (5.5 h/día)</option>
                <option value="centro">Centro (4.5 h/día)</option>
                <option value="sur">Sur (3.5 h/día)</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Agregar desde lista:</label>
            <select id="selectElectro"
                class="w-full border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-green-500 outline-none">
                <option value="">Seleccione</option>
            </select>
        </div>

        <div id="tablaElectro" class="space-y-2"></div>

        <div class="flex flex-wrap gap-4 text-sm mt-2">
            <button type="button" onclick="agregarFila()"
                class="text-green-600 dark:text-green-400 underline font-semibold hover:text-green-800 dark:hover:text-green-300 transition">+
                Agregar electrodoméstico</button>
            <button type="button" onclick="limpiarFilas()"
                class="text-red-600 dark:text-red-400 underline font-semibold hover:text-red-800 dark:hover:text-red-300 transition">🗑
                Limpiar todo</button>
        </div>
    </form>

    <div class="mt-6">
        <button id="btnCalcular"
            class="w-full py-3 px-6 bg-green-600 text-white font-bold rounded-lg shadow-lg hover:bg-green-700 transform hover:scale-[1.02] transition duration-200">
            🔍 Calcular
        </button>
    </div>

    <div id="resultados" class="mt-10 hidden animate-fade-in-up">
        <h3 class="text-2xl font-bold text-center text-green-800 dark:text-green-400 mb-6">📊 Resultados del Sistema
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border-l-4 border-green-500">
                <p class="text-sm text-gray-600 dark:text-gray-400">Potencia recomendada:</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white" id="potencia"></p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border-l-4 border-green-500">
                <p class="text-sm text-gray-600 dark:text-gray-400">Generación mensual estimada:</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white" id="generacion"></p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border-l-4 border-yellow-500">
                <p class="text-sm text-gray-600 dark:text-gray-400">Paneles solares necesarios:</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white" id="paneles"></p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border-l-4 border-blue-500">
                <p class="text-sm text-gray-600 dark:text-gray-400">Baterías necesarias:</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white" id="baterias"></p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border-l-4 border-purple-500">
                <p class="text-sm text-gray-600 dark:text-gray-400">Inversores necesarios:</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white" id="inversores"></p>
            </div>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
            <div class="overflow-x-auto">
                <canvas id="graficoSolar" class="w-full max-w-full" height="300"></canvas>
            </div>
        </div>

        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
            <button id="btnDescargarPDF"
                class="flex items-center justify-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition transform hover:scale-105">
                <i class="fas fa-file-pdf"></i> Descargar Cotización PDF
            </button>

            <a href="https://wa.me/5493865586322" target="_blank"
                class="flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition transform hover:scale-105">
                <i class="fab fa-whatsapp text-xl"></i> Consultar por WhatsApp
            </a>
        </div>

        <section class="mt-16 max-w-3xl mx-auto border-t border-gray-200 dark:border-gray-700 pt-10">
            <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-6">
                🤔 Preguntas Frecuentes
            </h2>
            <div id="faqContainer" class="max-w-2xl mx-auto space-y-4">
            </div>
        </section>
    </div>
</main>

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
// Llamada al footer del sitio (cierre de BODY y HTML)
footerAdmin($data);
?>