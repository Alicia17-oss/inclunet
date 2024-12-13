<?php
// Mostrar errores de PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión a la base de datos
include('connection.php');

// Crear una nueva instancia de la clase Connection
$db = new Connection();
$conn = $db->connect();

if (!$conn) {
    die("Error en la conexión a la base de datos");
}

// Consultar los eventos en la base de datos
$sql = "SELECT * FROM eventos";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Obtener todos los eventos
$eventos = $stmt->fetchAll();

if (empty($eventos)) {
    echo "<p>No se encontraron eventos.</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntariado - Inclunet Space</title>
    <meta name="description" content="Descubre cómo puedes participar como voluntario y contribuir a nuestra misión de promover la inclusión social y el cambio positivo.">
    <meta name="keywords" content="Voluntariado, inclusión, ayuda social, cambio positivo">
    <meta name="author" content="Inclunet Space">
    <link rel="stylesheet" href="stylesG.css">
    <link rel="stylesheet" href="stylesV.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer">
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
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="quienes-somos.php">Quiénes somos</a></li>
                    <li><a href="voluntariado.php">Voluntariado</a></li>
                    <li><a href="organizaciones.php">Organizaciones</a></li>
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
                            <a href="perfil.html">Mi perfil</a>
                            <?php if (isset($_COOKIE['tipo_usuario']) && $_COOKIE['tipo_usuario'] === 'organizacion') { ?>
                                <a href="evento_pueba.php">Panel</a>
                            <?php } ?>
                            <a href="logout.php" onclick="window.location.reload();">Cerrar sesión</a>
                        </div>
                    </div>
                <?php } ?>
            </nav>
        </div>     
    </header>


    <main>
        <!-- Hero Section -->
        <section class="hero">
            <img src="Imagenes/hero-voluntarios" class="hero-img">
            <h2>Únete como Voluntario</h2>
        </section>

        <section class="process-section">
            <div class="process-header">
                <h2>Tipos de Voluntariado</h2>
                <p class="process-description">
                    En Inclunet Space, tenemos una amplia variedad de oportunidades de voluntariado en diferentes áreas. Aquí encontrarás una opción que se adapte a ti.
                </p>
            </div>
            <div class="process-steps">
                <div class="step">
                    <div class="step-icon">🔧</div>
                    <h3 class="step-title">Educación</h3>
                    <p class="step-description">Lorem ipsum dolor sit amet consectetur adipiscing elit placerat.</p>
                </div>
                <div class="step">
                    <div class="step-icon">✏️</div>
                    <h3 class="step-title">Salud</h3>
                    <p class="step-description">Lorem ipsum dolor sit amet consectetur adipiscing elit placerat.</p>
                </div>
                <div class="step">
                    <div class="step-icon">💻</div>
                    <h3 class="step-title">Medio ambiente</h3>
                    <p class="step-description">Lorem ipsum dolor sit amet consectetur adipiscing elit placerat.</p>
                </div>
                <div class="step">
                    <div class="step-icon">🚀</div>
                    <h3 class="step-title">Animales</h3>
                    <p class="step-description">Lorem ipsum dolor sit amet consectetur adipiscing elit placerat.</p>
                </div>
            </div>
        </section>

    <!--<section class="news-section"> 
            <h1>NEWS & ARTICLES</h1> 
            <p>Get Every Single Update Blog.</p> 
            <div class="articles-grid"> 
                <div class="article-card"> 
                    <img src="https://via.placeholder.com/300" alt="Regional Manager limited time management"> 
                    <div class="article-info"> 
                        <div class="article-meta">13 Feb, 2023 | 3 Comments</div> 
                        <h2>Regional Manager limited time management</h2> 
                        <p>By Webteck</p> 
                        <a href="#" class="read-more">READ MORE &rarr;</a> 
                    </div> 
                </div> 
                <div class="article-card"> 
                    <img src="https://via.placeholder.com/300" alt="What’s Holding Back the IT Solution Industry?"> 
                    <div class="article-info"> 
                        <div class="article-meta">13 Feb, 2023 | 3 Comments</div> 
                        <h2>What’s Holding Back the IT Solution Industry?</h2> 
                        <p>By Webteck</p> 
                        <a href="#" class="read-more">READ MORE &rarr;</a> 
                    </div> 
                </div> 
                <div class="article-card"> 
                    <img src="https://via.placeholder.com/300" alt="Latin derived from Cicero’s 1st-century BC"> 
                    <div class="article-info"> 
                        <div class="article-meta">13 Feb, 2023 | 3 Comments</div> 
                        <h2>Latin derived from Cicero’s 1st-century BC</h2> 
                        <p>By Webteck</p> 
                        <a href="#" class="read-more">READ MORE &rarr;</a> 
                    </div> 
                </div> 
            </div> 
        </section> -->

        <section class="news-section">
            <h1>NEWS & ARTICLES</h1>
            <p>Get Every Single Update Blog.</p>
            <div class="articles-grid">
                <?php
                    foreach($eventos as $event) {
                ?>
                    <div class="article-card">
                        <img src="<?php echo htmlspecialchars($event['imagen_evento']); ?>" alt="Imagen del evento">
                        <div class="article-info">
                            <div class="article-meta">
                                <?php 
                                    // Verifica si la clave 'date' existe
                                    if (isset($event['fecha_evento'])) {
                                        echo date('d M, Y', strtotime($event['fecha_evento']));
                                    } else {
                                        echo "Fecha no disponible";
                                    }
                                ?> | 
                                <?php 
                                    // Verifica si 'id evento' existe
                                    echo isset($event['id_evento']) ? htmlspecialchars($event['id_evento']) : 'ID no disponible';
                                ?>
                                
                            </div>
                            <h2>
                                <?php 
                                    // Verifica si 'title' existe
                                    echo isset($event['nombre_evento']) ? htmlspecialchars($event['nombre_evento']) : 'Título no disponible';
                                ?>
                            </h2>
                            <p> 
                                <?php 
                                    // Verifica si 'descripcion' existe
                                    echo isset($event['descripcion']) ? htmlspecialchars($event['descripcion']) : 'descripcion no disponible';
                                ?>
                            </p>
                            <div class="read-more">READ MORE &rarr;</div>
                            <!-- Formulario para inscribirse en el evento --> 
                             <form method="POST" action="inscripcion.php"> 
                                <input type="hidden" name="id_evento" value="<?php echo $event['id_evento']; ?>">
                                <button type="submit">Unirse al Evento</button>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </section>


        <section class="metodologia-section"> 
            <h2>Beneficios del Voluntariado</h2> 
            <div class="fila"> 
                <div class="tarjeta"> 
                    <div class="icono">🎯</div> 
                    <h3>Crecimiento personal:</h3> 
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p> 
                </div> 
                <div class="tarjeta"> 
                    <div class="icono">👥</div> 
                    <h3>Conexión con personas afines</h3> 
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p> 
                </div> 
                <div class="tarjeta"> 
                    <div class="icono">🔗</div> 
                    <h3>Desarrollo profesional</h3> 
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p> 
                </div>
            </div> 
            <div class="fila">
                <div class="tarjeta"> 
                    <div class="icono">📊</div> 
                    <h3>Impacto duradero</h3> 
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p> 
                </div> 
                <div class="tarjeta"> 
                    <div class="icono">📡</div> 
                    <h3>Mejora de la salud mental</h3> 
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p> 
                </div> <div class="tarjeta"> 
                    <div class="icono">🔄</div> 
                    <h3>Sentimiento de propósito</h3> 
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p> 
                </div>  
            </div>
        </section>
    
    <!--
    <div class="card">
        <div class="card-image">
            <span class="badge featured">Recientes</span>
            <img src="data:image/png;base64,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" alt="Cottages In The Middle Of Beach">
            <span class="gallery-icon"></span>
        </div>
        <div class="card-content">
            <h3>Salud para todos</h3>
            <p><i class="fa fa-map-marker"></i> Ofrecemos servicios de salid integral 
                de manera accesible, con medicina general, atencion psicologica y nutricional</p>
            <p><i class="fa fa-dollar"></i> <span class="price"></span></p>
            <div class="info">
                <span><i class="fa fa-clock"></i> 3/dic/24  <br></span>
                <span><i class="fa fa-user"></i> 12:30 <br> </span> 
                
            </div><button class="explore-button" onclick="joinEvent(this)">Ayudar</button>
        </div>
    </div>  

    <div class="container"> 
        <h1>PROCESS</h1> 
        <p>We work at the intersection of strategy, creativity, and technology to help our clients digitally reinvent their businesses.</p> 
        <div class="process-cards"> 
            <div class="card"> 
                <div class="card-icon">🔍</div> 
                <h2>Discovery</h2> 
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit placerat.</p> 
            </div> 
            <div class="card"> 
                <div class="card-icon">🎨</div> 
                <h2>Design</h2> 
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit placerat.</p> 
            </div> <div class="card"> 
                <div class="card-icon">💻</div> 
                <h2>Development</h2> 
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit placerat.</p> 
            </div> <div class="card"> 
                <div class="card-icon">🚀</div> 
                <h2>Launch</h2> 
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit placerat.</p> 
            </div> 
        </div> 
    </div>

    <section class="projects-section"> 
        <h1>Projects, we are proud of.</h1> 
        <div class="projects-grid"> 
            <div class="project-card"> 
                <div class="project-hero"> 
                    <img src="https://via.placeholder.com/300" alt="Orizon Web Development"> 
                    <div class="title-overlay">Orizon Web Development</div> 
                </div> 
                <div class="project-info"> 
                    <h2>Orizon Web Development</h2> 
                    <p>Web Development, Wireframe & Prototyping</p> 
                </div> 
            </div> 
            <div class="project-card"> 
                <div class="project-hero"> 
                    <img src="https://via.placeholder.com/300" alt="Arno Business Consulting"> 
                    <div class="title-overlay">Arno Business Consulting</div> 
                </div> 
                <div class="project-info"> 
                    <h2>Arno Business Consulting</h2> 
                    <p>Web Development, Branding, Marketing</p> 
                </div> 
            </div> 
            <div class="project-card"> 
                <div class="project-hero"> 
                    <img src="https://via.placeholder.com/300" alt="Palet Branding"> 
                    <div class="title-overlay">Palet Branding</div> 
                </div> 
                <div class="project-info"> 
                    <h2>Palet Branding</h2> 
                    <p>Branding, User Research, Corporate Identity</p> 
                </div> 
            </div> 
        </div> 
    </section>-->

    <div class="container-organizaciones"> 
        <h1>Transform your <span>brand today!</span></h1> 
        <a href="#" class="cta-button">Let's Discuss a Project &rarr;</a> </div>

<!---
    Sección 5: Recursos para Voluntarios 
    <section id="recursos" class="section">
        <h2>Recursos para Voluntarios</h2>
        <p>Para que tu experiencia de voluntariado sea lo más enriquecedora posible, te proporcionamos recursos útiles que te ayudarán a ser más efectivo en tu rol y aprovechar al máximo tu tiempo.</p>
        <ul>
            <li><strong>Guías de voluntariado:</strong> Consejos para ser un voluntario exitoso y cómo adaptarte rápidamente al entorno.</li>
            <li><strong>Consejos de seguridad y bienestar:</strong> Información sobre cómo garantizar tu seguridad durante el voluntariado y cuidar tu bienestar personal.</li>
        </ul>
        <a href="guia.html" class="btn">Ver guías para voluntarios</a>
        <a href="formacion.html" class="btn">Accede a formación gratuita</a>
        <a href="seguridad.html" class="btn">Leer consejos de seguridad</a>
    </section>

    
    Sección 6: Preguntas Frecuentes 
    <section id="faq" class="section">
        <h2>Preguntas Frecuentes</h2>
        <p>Aquí resolvemos algunas de las preguntas más comunes que nos hacen los nuevos voluntarios. Si tienes alguna duda, ¡no dudes en contactarnos!</p>
        <dl>
            <dt>¿Qué tipo de voluntariado puedo realizar?</dt>
            <dd>Ofrecemos tanto oportunidades presenciales como virtuales, en áreas como educación, salud, medio ambiente, y mucho más.</dd>
            <dt>¿Cuánto tiempo debo comprometerme?</dt>
            <dd>La duración del voluntariado depende de la oportunidad. Algunas son a corto plazo, otras requieren un compromiso más largo.</dd>
            <dt>¿Recibiré algún tipo de reconocimiento por mi trabajo voluntario?</dt>
            <dd>Sí, al completar una experiencia de voluntariado, podrás recibir un certificado de participación y/o una carta de recomendación.</dd>
        </dl>
    </section>

     Sección 7: Contacto 
    <section id="contacto" class="section">
        <h2>Contacto para Voluntarios</h2>
        <p>Si tienes alguna pregunta sobre las oportunidades de voluntariado o necesitas ayuda para comenzar, estamos aquí para ayudarte.</p>
        <form action="contacto.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
            <button type="submit" class="btn">Enviar mensaje</button>
        </form>
    </section> -->

   
    </main>
     <script src="script.js"></script>
    <footer>
        <p>&copy; 2024 Inclunet Space - Todos los derechos reservados</p>
    </footer>
</body>
</html>
