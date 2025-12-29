<?php
// Detecta si estás en /uvenergiasolar/home o /uvenergiasolar/home/home
$request_uri = $_SERVER['REQUEST_URI'] ?? '';
$esHome = strpos($request_uri, '/uvenergiasolar/home') !== false;
?>
<!DOCTYPE html>
<html lang="es" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['page_title']; ?></title>

    <!-- Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#10B981', // Verde personalizado
                        amarillo: '#FDBA12' // Amarillo personalizado
                    }
                }
            }
        }
    </script>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/carousel.css">

    <!-- Librerías externas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Base URL para usar en JS -->
    <script>
        const base_url = "<?php echo BASE_URL; ?>";
    </script>
</head>

<?php
// Detectar si estamos en la página de cálculo para aplicar clase personalizada
$isCalculadora = strpos($_SERVER['REQUEST_URI'], 'calcular') !== false;
$bodyClass = $isCalculadora ? 'calculadora-page' : '';
?>

<body class="m-0 p-0 w-full overflow-x-hidden text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300 flex flex-col min-h-screen <?php echo $bodyClass; ?>">
    <header class="bg-black/80 text-white shadow-md fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

            <!-- Logo -->
            <a href="<?= base_url(); ?>" class="text-xl font-bold tracking-wide">UV Energía Solar</a>

            <!-- Navegación en desktop -->
            <nav role="navigation" class="hidden md:flex items-center gap-6 font-semibold text-white">
                <a href="<?= base_url(); ?>" class="hover:text-primary">Inicio</a>
                <a href="<?= base_url(); ?>calcular" class="hover:text-primary">Calculadora</a>
                <a href="<?= base_url(); ?>proyectos" class="hover:text-primary">Proyectos</a>
                <a href="<?= base_url(); ?>producto/mostrar" class="hover:text-primary">Productos</a>
                <a href="<?= base_url(); ?>aprende" class="hover:text-primary">Aprende</a>

                <!-- Login o saludo si está autenticado (versión desktop) -->
                <?php if (!empty($_SESSION['usuario'])): ?>
                    <div class="flex items-center gap-3">
                        <span class="text-sm">👋 Hola, <?= $_SESSION['usuario']['nombres']; ?></span>
                        <a href="<?= base_url(); ?>usuarios/logout" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-sm">
                            Cerrar sesión
                        </a>
                    </div>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>usuarios/login" class="hover:text-primary">Login</a>
                <?php endif; ?>
            </nav>

            <!-- Botón menú hamburguesa (solo visible en móvil) -->
            <button id="mobileMenuBtn" class="md:hidden text-3xl text-white focus:outline-none transition-transform">
                <span id="hamburguesa" class="block">☰</span>
                <span id="cerrar" class="hidden">✖</span>
            </button>
        </div>

        <!-- Menú móvil desplegable -->
        <div id="mobileMenu" class="hidden md:hidden px-4 pb-4 space-y-2 bg-black/80 text-white transition-all duration-300 absolute w-full left-0 top-full">
            <a href="<?= $esHome ? '#inicio' : base_url() . 'home#inicio'; ?>" class="block hover:text-primary">Inicio</a>
            <a href="<?= $esHome ? '#quienes-somos' : base_url() . 'home#quienes-somos'; ?>" class="block hover:text-primary">Quienes somos</a>
            <a href="<?= base_url(); ?>calcular" class="block hover:text-primary">Calculadora</a>
            <a href="<?= base_url(); ?>proyectos" class="block hover:text-primary">Proyectos</a>
            <a href="<?= base_url(); ?>producto/mostrar" class="block hover:text-primary">Productos</a>
            <a href="<?= base_url(); ?>aprende" class="block hover:text-primary">Aprende</a>
            <a href="<?= $esHome ? '#contacto' : base_url() . 'home#contacto'; ?>" class="block hover:text-primary">Contactanos</a>

            <!-- Login o saludo si está autenticado -->
            <?php if (!empty($_SESSION['usuario'])): ?>
                <div class="pt-2 space-y-2">
                    <span class="block text-sm">👋 Hola, <?= $_SESSION['usuario']['nombres']; ?></span>
                    <a href="<?= base_url(); ?>usuarios/logout"
                        class="block bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full shadow text-center">
                        Cerrar sesión
                    </a>
                </div>
            <?php else: ?>
                <a href="<?= base_url(); ?>usuarios/login"
                    class="block bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-full shadow text-center">
                    Login
                </a>
            <?php endif; ?>
        </div>
    </header>


    <!-- Inicio del contenido principal -->
    <main class="w-full max-w-none mx-0 px-0 overflow-hidden">