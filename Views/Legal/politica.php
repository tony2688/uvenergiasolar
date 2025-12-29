<!-- politica.php -->
<?php include 'Views/Templates/header.php'; ?>

<section class="bg-gray-50 py-24 px-6 text-gray-800">
  <div class="max-w-5xl mx-auto">
    <h1 class="text-4xl md:text-5xl font-extrabold text-green-600 mb-6">Política de Privacidad</h1>

    <p class="mb-6 text-lg">En <strong>UV Energía Solar</strong>, nos comprometemos a proteger la privacidad de nuestros usuarios. Esta política explica cómo recopilamos, usamos y resguardamos la información personal proporcionada a través de nuestro sitio web.</p>

    <h2 class="text-2xl font-bold text-green-700 mt-10 mb-4">1. Información que recopilamos</h2>
    <ul class="list-disc pl-5 space-y-2">
      <li>Nombre, dirección de correo electrónico y número de teléfono.</li>
      <li>Datos sobre consumo eléctrico ingresados en la calculadora solar.</li>
      <li>Dirección IP, navegador, y comportamiento de navegación (cookies).</li>
    </ul>

    <h2 class="text-2xl font-bold text-green-700 mt-10 mb-4">2. Uso de la información</h2>
    <p>Utilizamos la información recopilada para:</p>
    <ul class="list-disc pl-5 space-y-2">
      <li>Responder a consultas o solicitudes realizadas por el usuario.</li>
      <li>Mejorar nuestros productos y servicios.</li>
      <li>Enviar información comercial o promocional, si el usuario lo acepta.</li>
    </ul>

    <h2 class="text-2xl font-bold text-green-700 mt-10 mb-4">3. Seguridad</h2>
    <p>Implementamos medidas de seguridad adecuadas para proteger la información del usuario contra accesos no autorizados o usos indebidos.</p>

    <h2 class="text-2xl font-bold text-green-700 mt-10 mb-4">4. Compartir información</h2>
    <p>No compartimos información personal con terceros, salvo que sea requerido por ley o con consentimiento explícito del usuario.</p>

    <h2 class="text-2xl font-bold text-green-700 mt-10 mb-4">5. Derechos del usuario</h2>
    <p>El usuario puede solicitar la modificación o eliminación de sus datos personales en cualquier momento, escribiendo a <a href="mailto:info@uvenergiasolar.com" class="text-blue-600 hover:underline">info@uvenergiasolar.com</a>.</p>

    <h2 class="text-2xl font-bold text-green-700 mt-10 mb-4">6. Cambios en la política</h2>
    <p>Nos reservamos el derecho de modificar esta política en cualquier momento. Cualquier cambio será publicado en esta página.</p>

    <div class="mt-10">
      <a href="<?php echo BASE_URL; ?>Assets/docs/politica_privacidad.pdf" download
         class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded shadow">
        Descargar versión PDF
      </a>
    </div>
  </div>
</section>

<?php include 'Views/Templates/footer.php'; ?>
