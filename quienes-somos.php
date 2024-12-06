<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inclunet Space conecta personas comprometidas con el cambio social mediante oportunidades de voluntariado inclusivas.">
    <meta name="keywords" content="voluntariado, inclusión, cambio social, organizaciones, desarrollo personal">
    <meta name="author" content="Inclunet Space">
    <meta property="og:title" content="Inclunet Space - Voluntariado e Inclusión Social">
    <meta property="og:description" content="Descubre oportunidades de voluntariado y ayuda a transformar comunidades con Inclunet Space.">
    <meta property="og:image" content="Imagenes/Hero.jpg">
    <meta property="og:url" content="https://tu-sitio.com">
    <meta name="twitter:card" content="summary_large_image">
    <title>Inclunet Space - Voluntariado e Inclusión Social</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
</head>
<body>
    <header id="header" class="header">
        <div class="logo">
            <img src="Imagenes/logoinclunetspace.png" alt="Inclunet Space logo">
        </div>
        <div>
            <nav>
                <ul>
                    <li><a href="quienes somos.php">Quiénes somos</a></li>
                    <li><a href="voluntariado.html">Voluntariado</a></li>
                    <li><a href="organizaciones.html">Organizaciones</a></li>
                </ul>
                <?php if (!isset($_COOKIE['username'])) { ?>
                    <div class="header-buttons">
                        <a href="login.html">
                            <button class="login-btn">Iniciar sesión</button>
                        </a>
                        <a href="signup.html">
                            <button class="signup-btn">Registrarse</button>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="user-menu-container">
                        <!-- Botón para mostrar el menú -->
                        <button class="login-icon" onclick="toggleDropdown()">Bienvenido, <?php echo htmlspecialchars($_COOKIE['username']); ?> </button>
        
                         <!-- Menú desplegable -->
                        <div id="user-menu" class="dropdown-menu">
                            <a href="profile.html">Mi perfil</a>
                            <a href="settings.html">Configuración</a>
                            <a href="logout.php" onclick="window.location.reload();">Cerrar sesión</a>

                        </div>
                    </div>
                <?php } ?>
            </nav>
        </div>     
    </header>

    <main>
        <!-- Hero Section -->
    <div class="hero">
        <img src="Imagenes/herp_quienes_somos.webp" alt="Personas colaborando en actividades comunitarias">
        <h1>Inclunet Space</h1>
        <h2>Conecta con tu propósito: <br> Haz la diferencia hoy</h2>
        <p>Únete a proyectos que transforman comunidades <br> y deja tu huella en el mundo.</p>
        <a href="voluntariado.html">
            <button  class="cta-hero"> Explorar Oportunidades de Voluntariado</button>
        </a> 
    </div>

        <!-- Misión, Visión, Valores -->
        <section class="mvv">
            <div class="mision">
                <h2>Nuestra Misión</h2>
                <p>Conectar a personas comprometidas con organizaciones que trabajan por el cambio social, promoviendo el voluntariado e impulsando la inclusión en comunidades de todo el mundo.</p>
            </div>
            <div class="vision">
                <h2>Nuestra Visión</h2>
                <p>Ser la plataforma líder en conectar voluntarios con causas significativas, generando un impacto global sostenible y promoviendo una sociedad más inclusiva.</p>
            </div>
            <div class="valores">
                <h2>Nuestros Valores</h2>
                <ul>
                    <li><strong>Compromiso:</strong> Trabajamos con pasión para construir un mundo mejor.</li>
                    <li><strong>Inclusión:</strong> Creemos en la diversidad como motor de cambio.</li>
                    <li><strong>Colaboración:</strong> Juntos logramos más.</li>
                    <li><strong>Sostenibilidad:</strong> Promovemos acciones responsables con el medio ambiente y la sociedad.</li>
                </ul>
            </div>
        </section>

        <!-- Historia -->
        <section class="historia">
            <h2>Nuestra Historia</h2>
            <p>Inclunet Space nació en 2020 como respuesta a la creciente necesidad de conectar voluntarios con causas que realmente hacen la diferencia. Desde entonces, hemos trabajado con cientos de organizaciones y miles de voluntarios en todo el mundo, creando oportunidades que transforman vidas.</p>
            <img src="https://images.unsplash.com/photo-1518609878373-06d740f60d98?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDIwfHxob3BlfGVufDB8fHx8MTY4NTY1NzAxOA&ixlib=rb-1.2.1&q=80&w=1080" alt="Imagen representativa de nuestra historia">
        </section>

        <!-- Equipo -->
        <section class="equipo">
            <h2>Conoce a Nuestro Equipo</h2>
            <div class="miembros">
                <div class="miembro">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDd8fHBlcnNvbnxlbnwwfHx8fDE2ODU2NTc1MTA&ixlib=rb-1.2.1&q=80&w=400" alt="Foto de Juan Pérez, fundador de Inclunet Space">
                    <h3>Juan Pérez</h3>
                    <p><strong>Fundador y Director Ejecutivo</strong></p>
                    <p>Apasionado por el cambio social, Juan lidera nuestra visión global.</p>
                </div>
                <div class="miembro">
                    <img src="https://images.unsplash.com/photo-1528763380143-d52a06b9ac8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDh8fGdpcmx8ZW58MHx8fHwxNjg1NjU3NTM2&ixlib=rb-1.2.1&q=80&w=400" alt="Foto de María García, coordinadora de proyectos">
                    <h3>María García</h3>
                    <p><strong>Coordinadora de Proyectos</strong></p>
                    <p>Experta en gestión de voluntariado, María organiza nuestras iniciativas clave.</p>
                </div>
                <div class="miembro">
                    <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDkxfHxwcm9mZXNzaW9uYWx8ZW58MHx8fHwxNjg1NjU3NTUy&ixlib=rb-1.2.1&q=80&w=400" alt="Foto de Carlos López, encargado de comunicaciones">
                    <h3>Carlos López</h3>
                    <p><strong>Encargado de Comunicaciones</strong></p>
                    <p>Carlos asegura que nuestras historias inspiren a otros a unirse.</p>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="cta">
            <h2>¡Únete a Nuestra Comunidad!</h2>
            <p>Si compartes nuestra visión y valores, queremos saber de ti. Haz clic en el botón para unirte a nuestro equipo de voluntarios.</p>
            <a href="signup.html" class="btn-cta" title="Regístrate ahora como voluntario">Registrarme</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Inclunet Space - Todos los derechos reservados</p>
    </footer>
</body>
</html>
