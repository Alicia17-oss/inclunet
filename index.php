<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclunet Space</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel = 'stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
<body> 
    <!-- Header -->
    <div class="header" id="header">
        <div><img src="Imagenes/logoinclunetspace.png" alt="Inclunet Space logo" height="60" width="60"></div>
        <div>
            <nav>
                <ul>
                    <li><a href="quienes somos.html">Quiénes somos</a></li>
                    <li><a href="voluntariado.html">Voluntariado</a></li>
                    <li><a href="organizaciones.html">Organizaciones</a></li>
                </ul>
            </nav>
        </div>

        <?php if(!isset($_SESSION['username'])) { ?>
          <div class="login-icon" onclick="toggleDropdown()">
              <i class="fa-regular fa-circle-user"></i>
              
              <!-- Menú desplegable -->
              <div id="dropdown-menu" class="dropdown-menu">
                  <a href="login.html">Iniciar Sesión</a>
                  <a href="signup.html">Registrarse</a>
              </div>
          </div>
        <?php } ?>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <img src="Imagenes/Hero.jpg" />
        <h1>Ayuda a miles de personas</h1>
        <a href="#" class="Participar">Let's Explore</a> 
    </div>

    <!-- Estructura HTML del Slider -->
<div class="slider-container">

    <div class="card-slider">
        <div class="card"> 
            <div class="card-icon"></div>
            <h3>Salud</h3>
            <p>Lorem ipsum is simply sit of free text dolor.</p>
        </div>
        <div class="card"> 
            <div class="card-icon"></div>
            <h3>loreum ipsum</h3>
            <p>Lorem ipsum is simply sit of free text dolor.</p>
        </div>
        <div class="card active"> <!-- Tarjeta central en verde -->
            <div class="card-icon"></div>
            <h3>lorem</h3>
            <p>Lorem ipsum is simply sit of free text dolor.</p>
        </div>
        <div class="card"> 
            <div class="card-icon"></div>
            <h3>lorem ipsum</h3>
            <p>Lorem ipsum is simply sit of free text dolor.</p>
        </div>
        <div class="card"> 
            <div class="card-icon"></div>
            <h3>Exploration</h3>
            <p>Lorem ipsum is simply sit of free text dolor.</p>
        </div>
    </div>
   
</div>

    


<section class="mision">
    <h2>Nuestra Misión</h2>
    <p>Nuestra misión es conectar a personas comprometidas con el cambio social a través del voluntariado. Buscamos empoderar a las comunidades locales y promover la inclusión social, ofreciendo oportunidades para que cada persona pueda contribuir con sus habilidades y talentos.</p>
</section>

<section class="beneficios">
    <h2>Beneficios de Voluntariado</h2>
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
            <p><strong>Redes Sociales:</strong> Conoce a personas con intereses similares y crea nuevas amistades.</p>
        </div>
        <div class="beneficio">
            <i class="fa-solid fa-face-smile"></i>
            <p><strong>Satisfacción Personal:</strong> Siente el orgullo de hacer una diferencia en la vida de otros.</p>
        </div>
        <div class="beneficio">
            <img src="Imagenes/Oportunidad_de_aprendizaje.png" alt="Oportunidades de Aprendizaje" class="icono"> <!-- Cambia la ruta -->
            <p><strong>Oportunidades de Aprendizaje:</strong> Participa en talleres y eventos que enriquecerán tu conocimiento.</p>
        </div>
    </div>
</section>

<section class="eventos-recientes"> 
    <h2>Eventos Recientes</h2>
    <div class="eventos">
        <div class="evento">
            <h3>Evento 1: Jornada de Voluntariado</h3>
            <p>Únete a nuestra jornada de voluntariado en apoyo a la comunidad local. ¡Te esperamos!</p>
            <time datetime="2024-10-10">10 de octubre, 2024</time>
        </div>
        <div class="evento">
            <h3>Evento 2: Taller de Inclusión Social</h3>
            <p>Aprende sobre estrategias de inclusión social en este taller interactivo.</p>
            <time datetime="2024-11-05">5 de noviembre, 2024</time>
        </div>
        <div class="evento">
            <h3>Evento 3: Conferencia Anual de Voluntariado</h3>
            <p>Asiste a nuestra conferencia anual donde compartimos experiencias y planes futuros.</p>
            <time datetime="2024-12-15">15 de diciembre, 2024</time>
        </div>
    </div>
</section>

<section class="cta">
    <h2>¡Únete a Nosotros!</h2>
    <p>Conviértete en parte del cambio y haz la diferencia en tu comunidad. Regístrate como voluntario y descubre cómo puedes ayudar.</p>
    <a href="signup.html" class="btn-cta">Registrarme como Voluntario</a>
</section>

<section class="organizaciones">
    <h2>Organizaciones Asociadas</h2>
    <div class="lista-organizaciones">
        <div class="organizacion">
            <img src="logo-organizacion1.png" alt="Logo Organización 1" height="100">
            <h3>Organización 1</h3>
            <p>Descripción breve de la organización y su misión.</p>
        </div>
        <div class="organizacion">
            <img src="logo-organizacion2.png" alt="Logo Organización 2" height="100">
            <h3>Organización 2</h3>
            <p>Descripción breve de la organización y su misión.</p>
        </div>
        <div class="organizacion">
            <img src="logo-organizacion3.png" alt="Logo Organización 3" height="100">
            <h3>Organización 3</h3>
            <p>Descripción breve de la organización y su misión.</p>
        </div>
    </div>
    <a href="organizaciones.html" class="ver-todas">Ver todas las organizaciones</a>
</section>

<script src="script.js"></script>
</body>

<footer>
    <div class="footer-content">
        <h3>Inclunet Space</h3>
        <p>Conéctate con nosotros y sé parte del cambio social.</p>
        <ul class="footer-links">
            <li><a href="como funciona.html">Cómo funciona</a></li>
            <li><a href="quienes somos.html">Quiénes somos</a></li>
            <li><a href="voluntariado.html">Voluntariado</a></li>
            <li><a href="organizaciones.html">Organizaciones</a></li>
            <li><a href="#">App. móvil</a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Inclunet Space. Todos los derechos reservados.</p>
    </div>
</footer>