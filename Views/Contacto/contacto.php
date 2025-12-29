<?php headerAdmin($data); ?>

<div class="bg-gray-900 pt-32 pb-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('<?php echo BASE_URL; ?>Assets/images/solar-pattern.png')] opacity-10"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 animate-fade-in">
            Hablemos de <span class="text-green-500">Energía</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto animate-fade-in-up">
            Estamos listos para asesorarte en tu proyecto solar. Contáctanos y empecemos a ahorrar.
        </p>
    </div>
</div>

<section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div class="container mx-auto px-4">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">

            <div class="space-y-8 animate-fade-in">

                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg border-l-4 border-green-500">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Información de Contacto</h3>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone-alt text-green-600 dark:text-green-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 font-semibold uppercase">Llámanos</p>
                                <p class="text-lg font-bold text-gray-800 dark:text-white">+54 9 3865 586322</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Lun a Vie: 9:00 - 18:00</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 font-semibold uppercase">Escribinos
                                </p>
                                <p class="text-lg font-bold text-gray-800 dark:text-white">info@uvenergiasolar.com.ar
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-yellow-600 dark:text-yellow-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 font-semibold uppercase">Ubicación
                                </p>
                                <p class="text-lg font-bold text-gray-800 dark:text-white">Tucumán, Argentina</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Cobertura en todo el NOA</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="https://wa.me/5493865586322" target="_blank"
                            class="flex items-center justify-center gap-2 w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-xl shadow-md transition transform hover:scale-[1.02]">
                            <i class="fab fa-whatsapp text-2xl"></i> Chat Directo por WhatsApp
                        </a>
                    </div>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg h-64 border border-gray-200 dark:border-gray-700">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227822.4586940332!2d-65.2072023!3d-26.8322676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94223792d6c56903%3A0xf88d5b92b5c56527!2sSan%20Miguel%20de%20Tucum%C3%A1n%2C%20Tucum%C3%A1n!5e0!3m2!1ses-419!2sar!4v1709240000000!5m2!1ses-419!2sar"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-8 lg:p-10 rounded-2xl shadow-xl animate-fade-in-up delay-100">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Envíanos un mensaje</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-8">Completá el formulario y te responderemos en menos de
                    24hs.</p>

                <form id="formContacto" class="space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre
                                *</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition">
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Empresa</label>
                            <input type="text" id="empresa" name="empresa" placeholder="Opcional"
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email
                                *</label>
                            <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" required
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition">
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" placeholder="Ej: 381 123456"
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Asunto *</label>
                        <select id="asunto" name="asunto" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition">
                            <option value="">Seleccioná un motivo</option>
                            <option value="Presupuesto">Solicitar Presupuesto</option>
                            <option value="Asesoramiento">Asesoramiento Técnico</option>
                            <option value="Soporte">Soporte Post-Venta</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mensaje *</label>
                        <textarea id="mensaje" name="mensaje" rows="4"
                            placeholder="Contanos sobre tu proyecto o duda..." required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-gray-900 hover:bg-black dark:bg-green-600 dark:hover:bg-green-700 text-white font-bold py-4 rounded-xl shadow-lg transition duration-300 flex items-center justify-center gap-2">
                        <span>ENVIAR CONSULTA</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>

                </form>
            </div>

        </div>
    </div>
</section>

<script>
    const base_url = "<?php echo BASE_URL; ?>";
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo BASE_URL; ?>Assets/js/contacto.js"></script>

<?php footerAdmin($data); ?>