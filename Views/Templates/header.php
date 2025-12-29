<?php
// Detecta si estás en /uvenergiasolar/home o /uvenergiasolar/home/home
$request_uri = $_SERVER['REQUEST_URI'] ?? '';
$esHome = strpos($request_uri, '/uvenergiasolar/home') !== false;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['page_title'] ?? 'UV Energía Solar | Soluciones Sustentables en Tucumán'; ?></title>

    <meta name="description"
        content="<?php echo $data['page_description'] ?? 'Soluciones integrales en energía solar para hogares y empresas en Tucumán y Argentina.'; ?>">

    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>Assets/images/favicon.png">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#10B981',
                        amarillo: '#FDBA12'
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/custom.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/design-system.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/nav-premium.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/carousel.css?v=<?php echo time(); ?>">>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@400;600;800&display=swap"
        rel="stylesheet">

    <script>
        const base_url = "<?php echo BASE_URL; ?>";
    </script>
</head>

<?php
$isCalculadora = strpos($_SERVER['REQUEST_URI'], 'calcular') !== false;
$bodyClass = $isCalculadora ? 'calculadora-page' : '';
?>

<body
    class="m-0 p-0 w-full overflow-x-hidden text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300 flex flex-col min-h-screen <?php echo $bodyClass; ?>">

    <header
        class="bg-black/70 backdrop-blur-lg text-white shadow-lg fixed top-0 w-full z-50 transition-all duration-300 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="<?= base_url(); ?>" class="flex items-center gap-3 group">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-lg flex items-center justify-center shadow-lg group-hover:shadow-green-500/50 transition-all duration-300 group-hover:scale-105">
                    <i class="fas fa-solar-panel text-2xl text-white"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-extrabold tracking-tight leading-none">UV Energía Solar</span>
                    <span class="text-xs text-gray-300 font-light tracking-wide">Soluciones Sustentables</span>
                </div>
            </a>

            <nav role="navigation" class="hidden md:flex items-center gap-8 font-semibold text-white">
                <a href="<?= base_url(); ?>"
                    class="nav-link relative group py-2 hover:text-green-400 transition-colors duration-300">
                    Inicio
                    <span class="nav-underline"></span>
                </a>
                <a href="<?= base_url(); ?>calcular"
                    class="nav-link relative group py-2 hover:text-green-400 transition-colors duration-300">
                    Calculadora
                    <span class="nav-underline"></span>
                </a>
                <a href="<?= base_url(); ?>proyectos"
                    class="nav-link relative group py-2 hover:text-green-400 transition-colors duration-300">
                    Proyectos
                    <span class="nav-underline"></span>
                </a>
                <a href="<?= base_url(); ?>producto/mostrar"
                    class="nav-link relative group py-2 hover:text-green-400 transition-colors duration-300">
                    Productos
                    <span class="nav-underline"></span>
                </a>
                <a href="<?= base_url(); ?>aprende"
                    class="nav-link relative group py-2 hover:text-green-400 transition-colors duration-300">
                    Aprende
                    <span class="nav-underline"></span>
                </a>

                <?php if (!empty($_SESSION['usuario'])): ?>
                    <div class="flex items-center gap-3">
                        <span class="text-sm">👋 Hola, <?= $_SESSION['usuario']['nombres']; ?></span>
                        <a href="<?= base_url(); ?>usuarios/logout"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-sm transition-colors">
                            Cerrar sesión
                        </a>
                    </div>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>usuarios/login"
                        class="nav-link relative group py-2 hover:text-green-400 transition-colors duration-300">
                        Login
                        <span class="nav-underline"></span>
                    </a>
                <?php endif; ?>

                <!-- CTA Button Premium -->
                <a href="<?= base_url(); ?>calcular"
                    class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-6 py-2.5 rounded-full font-bold text-sm shadow-lg shadow-green-500/30 hover:shadow-green-500/50 transition-all duration-300 hover:scale-105 flex items-center gap-2">
                    <i class="fas fa-calculator"></i>
                    Calculá tu Ahorro
                </a>
            </nav>

            <button id="mobileMenuBtn"
                class="md:hidden text-3xl text-white focus:outline-none transition-transform active:scale-95">
                <span id="hamburguesa" class="block"><i class="fas fa-bars"></i></span>
                <span id="cerrar" class="hidden"><i class="fas fa-times"></i></span>
            </button>
        </div>

        <div id="mobileMenu"
            class="hidden md:hidden px-4 pb-4 space-y-2 bg-black/90 text-white transition-all duration-300 absolute w-full left-0 top-full shadow-xl border-t border-gray-700">
            <a href="<?= $esHome ? '#inicio' : base_url() . 'home#inicio'; ?>"
                class="block py-2 hover:text-primary">Inicio</a>
            <a href="<?= $esHome ? '#quienes-somos' : base_url() . 'home#quienes-somos'; ?>"
                class="block py-2 hover:text-primary">Quienes somos</a>
            <a href="<?= base_url(); ?>calcular" class="block py-2 hover:text-primary">Calculadora</a>
            <a href="<?= base_url(); ?>proyectos" class="block py-2 hover:text-primary">Proyectos</a>
            <a href="<?= base_url(); ?>producto/mostrar" class="block py-2 hover:text-primary">Productos</a>
            <a href="<?= base_url(); ?>aprende" class="block py-2 hover:text-primary">Aprende</a>
            <a href="<?= $esHome ? '#contacto' : base_url() . 'home#contacto'; ?>"
                class="block py-2 hover:text-primary">Contactanos</a>

            <div class="pt-4 border-t border-gray-700 mt-2">
                <?php if (!empty($_SESSION['usuario'])): ?>
                    <div class="space-y-3">
                        <span class="block text-sm font-medium text-gray-300">👋 Hola,
                            <?= $_SESSION['usuario']['nombres']; ?></span>
                        <a href="<?= base_url(); ?>usuarios/logout"
                            class="block w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow text-center transition">
                            Cerrar sesión
                        </a>
                    </div>
                <?php else: ?>
                    <a href="<?= base_url(); ?>usuarios/login"
                        class="block w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-4 py-2 rounded-lg shadow text-center transition">
                        Iniciar Sesión
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/5493865586322?text=Hola!%20Me%20interesa%20una%20consulta%20sobre%20energía%20solar"
        target="_blank" rel="noopener noreferrer"
        class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white w-16 h-16 rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 group"
        aria-label="Contactar por WhatsApp">
        <i class="fab fa-whatsapp text-3xl group-hover:scale-110 transition-transform"></i>
        <span
            class="absolute -top-2 -left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full animate-pulse">
            En línea
        </span>
    </a>

    <script>
        // Sticky Header con cambio de fondo al hacer scroll
        window.addEventListener('scroll', function () {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.remove('bg-black/70');
                header.classList.add('bg-gray-900/95', 'shadow-xl', 'backdrop-blur-xl');
            } else {
                header.classList.remove('bg-gray-900/95', 'shadow-xl', 'backdrop-blur-xl');
                header.classList.add('bg-black/70');
            }
        });
    </script>

    <main class="w-full max-w-none mx-0 px-0 overflow-hidden">