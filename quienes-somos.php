<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quienes Somos - Inclunet Space</title>
    <meta name="description" content="Descubre quiénes somos: una plataforma dedicada a conectar voluntarios con organizaciones sin fines de lucro, promoviendo la solidaridad y creando impacto positivo en las comunidades.">
    <meta name="keywords" content="Voluntariado, inclusión, ayuda social, cambio positivo">
    <meta name="author" content="Inclunet Space">
    <link rel="stylesheet" href="stylesG.css">
    <link rel="stylesheet" href="stylesQ.css">
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
    <section class="hero">
        <img src="Imagenes/herp_quienes_somos.jpg" alt="Personas colaborando en actividades comunitarias">
        <h1>Inclunet Space</h1>
        <h2>Conecta con tu propósito: <br> Haz la diferencia hoy</h2>
        <p>Únete a proyectos que transforman comunidades <br> y deja tu huella en el mundo.</p>
        <a href="voluntariado.html">
            <button  class="cta-hero"> Explorar Oportunidades de Voluntariado</button>
        </a> 
    </section>

    <section class="container-unidos">
        <div class="card-unidos">
            <img src="Imagenes/Inclunet-space.webp" alt="Team Working">
            <div class="content-unidos">
                <h2> <span class="title-second-color">Inclunet Space: </span> Unidos por un Propósito Mayor</h2>
                <p>En Inclunet Space, creemos que el cambio comienza con una pequeña acción, 
                    una chispa de generosidad y un deseo sincero de marcar la diferencia. Por eso, 
                    hemos creado un espacio donde las personas con corazones dispuestos a ayudar 
                    puedan conectar con organizaciones que comparten su visión de un mundo mejor.
                </p>
            </div>
        </div>
    </section>

    <section class="container-valores">
        <div class="card-valores">
            <div class="content-valores">
                <h2><span class="title-second-color">Nuestros valores</span></h2>
                <ul>
                    <li><strong>Compromiso:</strong> Trabajamos con pasión para construir un mundo mejor.</li>
                    <li><strong>Inclusión:</strong> Creemos en la diversidad como motor de cambio.</li>
                    <li><strong>Colaboración:</strong> Juntos logramos más.</li>
                    <li><strong>Sostenibilidad:</strong> Promovemos acciones responsables con el medio ambiente y la sociedad.</li>
                </ul>
            </div>
        </div>

        <div class="side-cards">
            <div class="side-card">
                <h2>Nuestra vision</h2>
                <p>Ser la plataforma líder en conectar voluntarios con causas significativas, generando un impacto global sostenible y promoviendo una sociedad más inclusiva.</p>
            </div>
            <div class="side-card">
                <h2>Nuestra mision</h2>
                <p>Conectar a personas comprometidas con organizaciones que trabajan por el cambio social, promoviendo el voluntariado e impulsando la inclusión en comunidades de todo el mundo.</p>
            </div>
        </div>
    </section>

    <section class="team-section"> 
        <h2>Conoce a <span class="title-second-color">nuestro equipo</span></h2> 
        <p>"Solos podemos hacer muy poco, juntos podemos hacer mucho."</p> 
        <div class="team-members"> 
            <div class="member-card"> 
                <img src="https://via.placeholder.com/250" alt="Brandon James"> 
                <div class="member-info"> 
                    <h3>Angi Herrera </h3> 
                    <p>Founder</p> 
                    <div class="social-icons"> 
                        <a href="#"><i class="fab fa-facebook-f"></i></a> 
                        <a href="#"><i class="fab fa-twitter"></i></a> 
                        <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                    </div> 
                </div> 
            </div> 
            <div class="member-card"> 
                <img src="https://via.placeholder.com/250" alt="Alex Parker"> 
                <div class="member-info"> 
                    <h3>Cristal Osorio </h3> 
                    <p>Co-Founder</p> 
                    <div class="social-icons"> 
                        <a href="#"><i class="fab fa-facebook-f"></i>
                        </a> <a href="#"><i class="fab fa-twitter"></i></a> 
                        <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                    </div>
                </div> 
            </div> 
            <div class="member-card"> 
                <img src="https://via.placeholder.com/250" alt="Victoria Thomas"> 
                <div class="member-info"> 
                    <h3>Russell Sanchez</h3> 
                    <p>Business Manager</p> 
                    <div class="social-icons"> 
                        <a href="#"><i class="fab fa-facebook-f"></i></a> 
                        <a href="#"><i class="fab fa-twitter"></i></a> 
                        <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                    </div> 
                </div> 
            </div> 
            <div class="member-card"> 
                <img src="https://via.placeholder.com/250" alt="Brandon James"> 
                <div class="member-info"> 
                    <h3>Ivania Texna</h3> 
                    <p>Founder</p> 
                    <div class="social-icons"> 
                        <a href="#"><i class="fab fa-facebook-f"></i></a> 
                        <a href="#"><i class="fab fa-twitter"></i></a> 
                        <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </section>
   
    </main>

    <footer>
        <p>&copy; 2024 Inclunet Space - Todos los derechos reservados</p>
    </footer>
</body>
</html>
