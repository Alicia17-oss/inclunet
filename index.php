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
            <img src="Imagenes/logoinclunetspace.png" alt="Logotipo de Inclunet Space" height="60" width="60">
        </div>
        <div>
        <nav>
            <ul>
                <li><a href="quienes somos.html">Quiénes somos</a></li>
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
            <p style="color:#fff;">Bienvenido, <?php echo htmlspecialchars($_COOKIE['username']); ?></p>
            <?php } ?>
        </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <img src="Imagenes/Hero.jpg" alt="Personas colaborando en actividades comunitarias">
            <h1>Ayuda a miles de personas</h1>
            <a href="#" class="Participar" title="Explora oportunidades de voluntariado">Let's Explore</a>
        </section>

        <!-- Slider -->
        <section class="slider-container">
            <div class="card-slider">
                <article class="card">
                    <div class="card-icon"></div>
                    <h3>Salud</h3>
                    <p style="color:#444;">Apoya proyectos que mejoran la salud de comunidades vulnerables.</p>
                </article>
                <article class="card">
                    <div class="card-icon"></div>
                    <h3>Educación</h3>
                    <p style="color:#444;">Involúcrate en actividades educativas para todas las edades.</p>
                </article>
                <article class="card active">
                    <div class="card-icon"></div>
                    <h3>Medio Ambiente</h3>
                    <p>Contribuye a la conservación y cuidado de nuestro planeta.</p>
                </article>
                <article class="card">
                    <div class="card-icon"></div>
                    <h3>Inclusión</h3>
                    <p style="color:#444;">Participa en proyectos que promueven la igualdad y diversidad.</p>
                </article>
                <article class="card">
                    <div class="card-icon"></div>
                    <h3>Exploración</h3>
                    <p style="color:#444;">Descubre formas innovadoras de marcar la diferencia.</p>
                </article>
            </div>
        </section>

        <!-- Misión -->
        <section class="mision">
            <h2>Nuestra Misión</h2>
            <p>Nuestra misión es conectar a personas comprometidas con el cambio social a través del voluntariado. Buscamos empoderar comunidades locales y promover la inclusión social, ofreciendo oportunidades para contribuir con habilidades y talentos únicos.</p>
        </section>

        <!-- Beneficios -->
        <section class="beneficios">
            <h2>Beneficios del Voluntariado</h2>
            <div class="beneficios-container">
                <div class="beneficio">
                    <i class="fa-solid fa-stairs"></i>
                    <p><strong>Desarrollo Personal:</strong> Mejora tus habilidades y adquiere experiencia valiosa.</p>
                </div>
                <div class="beneficio">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <p><strong>Contribución a la Comunidad:</strong> Ayuda a mejorar la calidad de vida de los demás.</p>
                </div>
                <div class="beneficio">
                    <i class="fa-solid fa-users"></i>
                    <p><strong>Redes Sociales:</strong> Conoce a personas con intereses similares.</p>
                </div>
                <div class="beneficio">
                    <i class="fa-solid fa-face-smile"></i>
                    <p><strong>Satisfacción Personal:</strong> Siente el orgullo de marcar la diferencia.</p>
                </div>
                <div class="beneficio">
                    <img src="Imagenes/Oportunidad_de_aprendizaje.png" alt="Icono de aprendizaje" class="icono">
                    <p><strong>Oportunidades de Aprendizaje:</strong> Participa en talleres y eventos enriquecedores.</p>
                </div>
            </div>
        </section>

        <!-- Eventos recientes -->
        <section class="eventos-recientes">
            <h2>Eventos Recientes</h2>
            <div class="eventos">
                <article class="evento">
                    <h3>Jornada de Voluntariado</h3>
                    <p>Únete a nuestra jornada de voluntariado en apoyo a la comunidad local. ¡Te esperamos!</p>
                    <time datetime="2024-10-10">10 de octubre, 2024</time>
                </article>
                <article class="evento">
                    <h3>Taller de Inclusión Social</h3>
                    <p>Aprende estrategias de inclusión social en este taller interactivo.</p>
                    <time datetime="2024-11-05">5 de noviembre, 2024</time>
                </article>
                <article class="evento">
                    <h3>Conferencia Anual de Voluntariado</h3>
                    <p>Asiste a nuestra conferencia anual donde compartimos experiencias y planes futuros.</p>
                    <time datetime="2024-12-15">15 de diciembre, 2024</time>
                </article>
            </div>
        </section>

        <!-- CTA -->
        <section class="cta">
            <h2>¡Únete a Nosotros!</h2>
            <p>Conviértete en parte del cambio. Regístrate como voluntario y descubre cómo puedes ayudar.</p>
            <a href="signup.html" class="btn-cta" title="Regístrate ahora como voluntario">Registrarme como Voluntario</a>
        </section>

        <!-- Organizaciones -->
        <section class="organizaciones">
            <h2>Organizaciones Asociadas</h2>
            <div class="lista-organizaciones">
                <div class="organizacion">
                    <img src="logo-organizacion1.png" alt="Logo de Organización 1" height="100">
                    <h3>Organización 1</h3>
                    <p>Descripción breve de la organización y su misión.</p>
                </div>
                <div class="organizacion">
                    <img src="logo-organizacion2.png" alt="Logo de Organización 2" height="100">
                    <h3>Organización 2</h3>
                    <p>Descripción breve de la organización y su misión.</p>
                </div>
                <div class="organizacion">
                    <img src="logo-organizacion3.png" alt="Logo de Organización 3" height="100">
                    <h3>Organización 3</h3>
                    <p>Descripción breve de la organización y su misión.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Inclunet Space - Todos los derechos reservados</p>
    </footer>
</body>
</html>
