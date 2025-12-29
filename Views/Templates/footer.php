</main>
<!-- ========== FOOTER ========== -->
<footer class="bg-[#0c111c] text-white px-6 py-12 md:py-16 relative z-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">

            <!-- Logo y descripción -->
            <div class="text-center md:text-left border-b border-gray-700 pb-8 md:border-0 md:pb-0">
                <div class="flex items-center mb-4 gap-2 justify-center md:justify-start">
                    <i class="fas fa-solar-panel text-2xl text-blue-400"></i>
                    <h2 class="text-xl font-bold">UV Energía Solar</h2>
                </div>
                <p class="text-gray-400 leading-relaxed text-sm md:text-base">
                    Soluciones integrales en energía solar para hogares y empresas.
                    Comprometidos con un <span class="text-yellow-400 font-medium">futuro sustentable</span>.
                </p>

                <!-- Redes sociales -->
                <div class="flex space-x-6 mt-6 text-xl text-gray-300 justify-center md:justify-start">
                    <a href="#" class="hover:text-white transition"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Navegación -->
            <div class="text-center md:text-left border-b border-gray-700 pb-8 md:border-0 md:pb-0 pt-4 md:pt-0">
                <h3 class="text-lg font-semibold mb-4">Navegación</h3>
                <ul class="grid grid-cols-2 gap-x-4 gap-y-2 md:block md:space-y-2 text-gray-300 text-sm md:text-base">
                    <li><a href="<?php echo base_url(); ?>#inicio" class="hover:text-green-400 transition">Inicio</a></li>
                    <li><a href="<?php echo base_url(); ?>#quienes-somos" class="hover:text-green-400 transition">Quiénes somos</a></li>
                    <li><a href="<?php echo base_url(); ?>calculadora" class="hover:text-green-400 transition">Calculadora</a></li>
                    <li><a href="<?php echo base_url(); ?>productos" class="hover:text-green-400 transition">Productos</a></li>
                    <li><a href="<?php echo base_url(); ?>proyectos" class="hover:text-green-400 transition">Proyectos</a></li>
                    <li><a href="<?php echo base_url(); ?>contacto" class="hover:text-green-400 transition">Contáctanos</a></li>
                </ul>
            </div>

            <!-- Contacto -->
            <div class="text-center md:text-left pt-4 md:pt-0">
                <h3 class="text-lg font-semibold mb-4">Contacto</h3>
                <ul class="space-y-3 text-gray-300 text-sm md:text-base">
                    <li class="flex items-center md:items-start flex-col md:flex-row gap-1 md:gap-0"><i class="fas fa-map-marker-alt text-blue-400 mr-0 md:mr-2"></i> <span>Joaquín V. González 50, Concepción, Tucumán</span></li>
                    <li class="flex items-center md:items-start flex-col md:flex-row gap-1 md:gap-0"><i class="fas fa-phone-alt text-blue-400 mr-0 md:mr-2"></i> <span>+54 3865 522356</span></li>
                    <li class="flex items-center md:items-start flex-col md:flex-row gap-1 md:gap-0"><i class="fas fa-envelope text-blue-400 mr-0 md:mr-2"></i> <span>info@uvenergiasolar.com.ar</span></li>
                </ul>
            </div>
        </div>

        <!-- Línea inferior -->
        <div class="border-t border-gray-700 mt-8 md:mt-10 pt-6 text-xs md:text-sm text-center text-gray-400">
            <p class="mb-3 md:mb-1">&copy; 2025 UV Energía Solar. Todos los derechos reservados.</p>
            <p class="flex flex-col md:flex-row items-center justify-center gap-2 md:gap-0">
                <span>Desarrollado por <a href="https://webinizadev.com" class="text-blue-400 hover:underline">WebinizaDev</a></span>
                <span class="hidden md:inline">&middot;</span>
                <a href="<?php echo BASE_URL; ?>legal/politica" class="hover:underline">Política de Privacidad</a>
                <span class="hidden md:inline">&middot;</span>
                <a href="<?php echo BASE_URL; ?>legal/terminos" class="hover:underline">Términos de Servicio</a>
            </p>
        </div>

        <!-- Modal de aceptación de términos / cookies -->
        <div id="cookieModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
            <div class="bg-white text-gray-800 rounded-2xl shadow-2xl p-6 max-w-md mx-auto border border-gray-300 animate-fade-in-up">

                <!-- Icono decorativo -->
                <div class="w-14 h-14 mx-auto bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center text-2xl mb-4 shadow">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>

                <!-- Título -->
                <h3 class="text-xl font-bold text-center text-gray-800 mb-3">¡Importante!</h3>

                <!-- Mensaje -->
                <p class="text-sm text-gray-600 leading-relaxed text-center">
                    Utilizamos cookies para ofrecerte una mejor experiencia. Al continuar, aceptás nuestros
                    <a href="<?php echo BASE_URL; ?>legal/terminos" class="text-blue-600 font-medium underline hover:text-blue-800">Términos</a> y
                    <a href="<?php echo BASE_URL; ?>legal/politica" class="text-blue-600 font-medium underline hover:text-blue-800">Política de Privacidad</a>.
                </p>

                <!-- Botón -->
                <button id="aceptarCookies" class="mt-6 w-full bg-green-600 hover:bg-green-700 text-white py-2.5 px-4 rounded-lg font-semibold text-sm shadow transition">
                    Aceptar
                </button>
            </div>
        </div>

        <!-- Botón flotante WhatsApp -->
        <a href="https://wa.me/5493865586322?text=Hola,%20quiero%20asesoramiento%20sobre%20energía%20solar."
            class="fixed bottom-4 right-4 z-50 bg-green-500 hover:bg-green-600 text-white w-14 h-14 flex items-center justify-center rounded-full shadow-lg transition duration-300"
            id="whatsappButton"
            target="_blank"
            title="Chatear por WhatsApp"
            aria-label="WhatsApp">
            <i class="fab fa-whatsapp text-2xl"></i>
        </a>

        <!-- ======================== LIBRERÍAS CSS ======================== -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

        <!-- ======================== LIBRERÍAS JS ======================== -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" defer></script>
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <!-- ======================== JS PERSONALIZADOS ======================== -->
        <script src="<?= base_url(); ?>Assets/js/main.js" defer></script>
        <script src="<?= base_url(); ?>Assets/js/menu-mobile.js" defer></script>
        <script src="<?= base_url(); ?>Assets/components/slider/carrusel.js" defer></script>
        <script src="<?= base_url(); ?>Assets/js/calculadora.min.js" defer></script>
        <script src="<?= base_url(); ?>Assets/js/cotizacion.min.js" defer></script>
        <script src="<?= base_url(); ?>Assets/js/filtrar_productos.js" defer></script>
        <script src="<?= base_url(); ?>Assets/js/animaciones.js" defer></script>
        <script src="<?= base_url(); ?>Assets/js/navegacion.js" defer></script>
     

        <!-- Inicialización de AOS -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                AOS.init();
            });
        </script>
    </footer>
</body>

</html>