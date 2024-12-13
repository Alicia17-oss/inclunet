<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizaciones - Inclunet Space</title>
    <meta name="description" content="Conoce las organizaciones aliadas que trabajan junto a Inclunet Space para impulsar el cambio social y la inclusión.">
    <meta name="keywords" content="Organizaciones, inclusión, cambio social, aliados">
    <meta name="author" content="Inclunet Space">
    <link rel="stylesheet" href="stylesG.css">
    <link rel="stylesheet" href="stylesG.css">
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
                            <a href="profile.html">Mi perfil</a>
                            <?php if (isset($_COOKIE['tipo_usuario']) && $_COOKIE['tipo_usuario'] === 'organizacion') { ?>
                                <a href="settings.html">Panel</a>
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
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYfUFkb8wVkzUnBupPhjtX1NzBlQSloibkkw&s" class="hero-img">
      <h1>Únete como Voluntario</h1>
      <p>Descubre las organizaciones que trabajan día a día para mejorar comunidades y
        transformar vidas</p>
  </section>

    <section class="experience-section">
        <div class="image-area">
          <img src="https://cdn.pixabay.com/photo/2015/03/15/14/53/kids-674513_1280.jpg" alt="Adventure View" class="main-image">
          <img src="https://cdn.pixabay.com/photo/2016/03/18/15/21/help-1265227_1280.jpg" alt="Cave View" class="secondary-image">
          <!--<div class="experience-box">
            <span class="years">28</span>
            <span class="description">Years of experience</span>
          </div> -->
        </div>
        <div class="text-area">
          <h2>¿Qué Hacemos Juntos?</h2>
          <ul class="features-list">
            <li>
              <div class="icon"> <i class="fa-solid fa-check"></i></div>
              <div>
                <h3>Colaboramos con diversas organizaciones sin fines de lucro</h3>
                <p>para promover el cambio social en áreas como educación, medio ambiente, salud y más.</p>
              </div>
            </li>
            <li>
              <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
              <div>
                <h3>Nuestro objetivo</h3>
                <p>Conectar a las personas con causas significativas y lograr un impacto positivo en nuestra sociedad.</p>
              </div>
            </li>
            <li>
              <div class="icon"><i class="fa-regular fa-handshake"></i></div>
              <div>
                <h3>Fomentamos la creación de redes solidarias</h3>
                <p>Fomentar un lugar donde voluntarios y organizaciones trabajan mano a mano para alcanzar metas comunes.</p>
              </div>
            </li>
          </ul>
        </div>
      </section>

    <section class="adventure-section">
        <div class="imagead">
          <img src="https://grupoemprender.cl/wp-content/uploads/2019/06/grupoemprender_tuempresa-800x617.jpg" alt="Adventure View">
        </div>
        <div class="textad">
         <!-- <div class="badge">Organiza Tu Propia Iniciativa</div> -->
          <h2>Organiza Tu Propia Iniciativa</h2>
          <p class="subtitle">¿Tienes una Idea? Organiza Tu Propia Iniciativa</p>
          <p class="description">
            ¿Quieres liderar un proyecto de voluntariado? En Inclunet Spaces te brindamos el respaldo
            necesario para hacer realidad tus ideas. Trabajemos juntos para planificar, ejecutar y
            generar un impacto positivo en nuestra sociedad.
          </p>
        </div>
      </section>

      <section class="services-section"> <h1>SERVICIOS</h1> <div class="services-grid"> <div class="service-card"> <div class="number">01</div> <h2>Web Development</h2> <p>Conveniently promote transparent materials and stand-alone strategic theme areas.</p> <a href="#" class="read-more">Read More &rarr;</a> </div> <div class="service-card"> <div class="number">02</div> <h2>UI/UX Design</h2> <p>Conveniently promote transparent materials and stand-alone strategic theme areas.</p> <a href="#" class="read-more">Read More &rarr;</a> </div> <div class="service-card"> <div class="number">03</div> <h2>Digital Marketing</h2> <p>Conveniently promote transparent materials and stand-alone strategic theme areas.</p> <a href="#" class="read-more">Read More &rarr;</a> </div> </div> </section>
                            </main>

    <footer>
        <p>&copy; 2024 Inclunet Space - Todos los derechos reservados</p>
    </footer>
</body>
</html>
