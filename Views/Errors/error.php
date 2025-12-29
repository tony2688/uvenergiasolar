<?php
// Intentamos cargar el header del admin si está disponible
if (function_exists('headerAdmin')) {
    headerAdmin($data);
} else {
    // Fallback manual si la función no existe en este contexto
    include 'Views/Templates/header.php';
}
?>

<div class="min-h-[70vh] flex flex-col items-center justify-center bg-gray-50 text-center px-4">
    <div class="animate-bounce mb-4">
        <i class="fas fa-solar-panel text-6xl text-green-600"></i>
    </div>

    <h1 class="text-9xl font-extrabold text-gray-800 drop-shadow-md">404</h1>
    <h2 class="text-3xl md:text-4xl font-bold text-green-700 mt-2 mb-6">¡Ups! Página no encontrada</h2>

    <p class="text-lg text-gray-600 max-w-lg mx-auto mb-8">
        Parece que la página que buscás no existe o fue movida.
        Revisá la dirección o volvé al inicio.
    </p>

    <a href="<?php echo base_url(); ?>"
        class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105">
        Volver al Inicio
    </a>
</div>

<?php
// Cargar footer
if (function_exists('footerAdmin')) {
    footerAdmin($data);
} else {
    include 'Views/Templates/footer.php';
}
?>