</main>

<footer class="bg-gray-900 text-gray-300 pt-16 pb-8 relative z-10 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

        <div class="space-y-6">
            <div class="flex items-center gap-3 text-white">
                <i class="fas fa-solar-panel text-3xl text-blue-500"></i>
                <h2 class="text-2xl font-bold tracking-tight">UV Energía Solar</h2>
            </div>
            <p class="text-sm leading-relaxed text-gray-400">
                Soluciones integrales en energía solar para hogares y empresas.
                Comprometidos con un <span class="text-yellow-400 font-medium">futuro sustentable</span>.
            </p>
            <div class="flex gap-4">
                <a href="#"
                    class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all duration-300 group">
                    <i class="fab fa-facebook-f text-lg group-hover:scale-110 transition-transform"></i>
                </a>
                <a href="#"
                    class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all duration-300 group">
                    <i class="fab fa-instagram text-lg group-hover:scale-110 transition-transform"></i>
                </a>
                <a href="#"
                    class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-700 hover:text-white transition-all duration-300 group">
                    <i class="fab fa-linkedin-in text-lg group-hover:scale-110 transition-transform"></i>
                </a>
                <a href="#"
                    class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all duration-300 group">
                    <i class="fab fa-youtube text-lg group-hover:scale-110 transition-transform"></i>
                </a>
            </div>
        </div>

        <div>
            <h3 class="text-white font-bold text-lg mb-6 border-b border-gray-700 pb-2 inline-block">Navegación</h3>
            <ul class="space-y-3 text-sm">
                <li><a href="<?php echo base_url(); ?>"
                        class="hover:text-green-400 transition-colors flex items-center gap-2"><i
                            class="fas fa-chevron-right text-xs text-gray-600"></i> Inicio</a></li>

                <li><a href="<?php echo base_url(); ?>#quienes-somos"
                        class="hover:text-green-400 transition-colors flex items-center gap-2"><i
                            class="fas fa-chevron-right text-xs text-gray-600"></i> Quiénes somos</a></li>

                <li><a href="<?php echo base_url(); ?>calcular"
                        class="hover:text-green-400 transition-colors flex items-center gap-2"><i
                            class="fas fa-chevron-right text-xs text-gray-600"></i> Calculadora Solar</a></li>

                <li><a href="<?php echo base_url(); ?>producto/mostrar"
                        class="hover:text-green-400 transition-colors flex items-center gap-2"><i
                            class="fas fa-chevron-right text-xs text-gray-600"></i> Productos</a></li>

                <li><a href="<?php echo base_url(); ?>proyectos"
                        class="hover:text-green-400 transition-colors flex items-center gap-2"><i
                            class="fas fa-chevron-right text-xs text-gray-600"></i> Proyectos</a></li>

                <li><a href="<?php echo base_url(); ?>#contacto"
                        class="hover:text-green-400 transition-colors flex items-center gap-2"><i
                            class="fas fa-chevron-right text-xs text-gray-600"></i> Contáctanos</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-white font-bold text-lg mb-6 border-b border-gray-700 pb-2 inline-block">Legal</h3>
            <ul class="space-y-3 text-sm">
                <li><a href="<?php echo base_url(); ?>legal/terminos"
                        class="hover:text-green-400 transition-colors">Términos y Condiciones</a></li>
                <li><a href="<?php echo base_url(); ?>legal/politica"
                        class="hover:text-green-400 transition-colors">Política de Privacidad</a></li>
                <li><a href="#" class="hover:text-green-400 transition-colors">Preguntas Frecuentes</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-white font-bold text-lg mb-6 border-b border-gray-700 pb-2 inline-block">Contacto</h3>
            <ul class="space-y-4 text-sm">
                <li class="flex items-start gap-3">
                    <i class="fas fa-map-marker-alt text-blue-400 mt-1"></i>
                    <span>Joaquín V. González 50,<br>Concepción, Tucumán</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fas fa-phone-alt text-blue-400"></i>
                    <a href="tel:+543865522356" class="hover:text-white transition">+54 3865 522356</a>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fas fa-envelope text-blue-400"></i>
                    <a href="mailto:info@uvenergiasolar.com.ar"
                        class="hover:text-white transition">info@uvenergiasolar.com.ar</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="border-t border-gray-800 pt-8 mt-8 text-center text-xs text-gray-500">
        <p>&copy; <?php echo date('Y'); ?> UV Energía Solar. Todos los derechos reservados.</p>
        <p class="mt-2">Desarrollado por <a href="https://webinizadev.com"
                class="text-blue-400 hover:text-white transition hover:underline">WebinizaDev</a></p>
    </div>
</footer>

<div id="cookieModal"
    class="fixed bottom-4 right-4 md:bottom-8 md:right-8 z-50 max-w-sm w-full bg-white text-gray-800 rounded-2xl shadow-2xl p-6 border border-gray-200 transform transition-all duration-500 translate-y-full opacity-0 hidden">
    <div class="flex items-start gap-4">
        <div class="text-yellow-500 text-3xl"><i class="fas fa-cookie-bite"></i></div>
        <div>
            <h4 class="font-bold text-gray-900 mb-1">Usamos Cookies 🍪</h4>
            <p class="text-xs text-gray-600 mb-3">
                Para mejorar tu experiencia en nuestro sitio. Al continuar navegando, aceptas nuestra <a
                    href="<?php echo base_url(); ?>legal/politica" class="text-blue-600 hover:underline">política de
                    privacidad</a>.
            </p>
            <button id="btnAcceptCookies"
                class="bg-green-600 hover:bg-green-700 text-white text-xs font-bold py-2 px-4 rounded-lg transition-colors w-full shadow-md">
                Aceptar
            </button>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url(); ?>Assets/js/menu-mobile.js" defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Iniciar animaciones de scroll
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Lógica del Modal de Cookies
        const cookieModal = document.getElementById('cookieModal');
        const btnAccept = document.getElementById('btnAcceptCookies');

        // Si no ha aceptado antes, mostrar
        if (!localStorage.getItem('cookiesAccepted')) {
            setTimeout(() => {
                cookieModal.classList.remove('hidden', 'translate-y-full', 'opacity-0');
            }, 2500); // Aparece a los 2.5 segs
        }

        // Al hacer click, guardar y ocultar
        if (btnAccept) {
            btnAccept.addEventListener('click', () => {
                localStorage.setItem('cookiesAccepted', 'true');
                cookieModal.classList.add('translate-y-full', 'opacity-0');
                setTimeout(() => cookieModal.classList.add('hidden'), 500);
            });
        }
    });
</script>

</body>

</html>