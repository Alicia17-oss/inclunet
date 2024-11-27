<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizaciones - Inclunet Space</title>
    <meta name="description" content="Conoce las organizaciones aliadas que trabajan junto a Inclunet Space para impulsar el cambio social y la inclusión.">
    <meta name="keywords" content="Organizaciones, inclusión, cambio social, aliados">
    <meta name="author" content="Inclunet Space">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="script.js" defer></script>
</head>
<body>
    <header id="header" class="header">
        <div class="logo">
            <img src="Imagenes/logoinclunetspace.png" alt="Logotipo de Inclunet Space" height="60" width="60">
        </div>
        <nav>
            <ul>
                <li><a href="quienes somos.html" title="Conoce más sobre nosotros">Quiénes somos</a></li>
                <li><a href="voluntariado.html" title="Descubre cómo puedes ayudar">Voluntariado</a></li>
                <li><a href="organizaciones.html" title="Organizaciones asociadas">Organizaciones</a></li>
            </ul>
        </nav>
        <?php if (!isset($_COOKIE['username'])) { ?>
        <div class="login-icon" onclick="toggleDropdown()">
            <i class="fa-regular fa-circle-user"></i>
            <div id="dropdown-menu" class="dropdown-menu">
                <a href="login.html" title="Accede a tu cuenta">Iniciar Sesión</a>
                <a href="signup.html" title="Regístrate ahora">Registrarse</a>
            </div>
        </div>
        <?php } else { ?>
        <p style="color:#fff;">Bienvenido, <?php echo htmlspecialchars($_COOKIE['username']); ?></p>
        <?php } ?>
    </header>

    <main>
        <!-- Hero -->
        <section class="hero">
            <img src="https://www.soycest.mx/hubfs/cest/blog/2020/03/original-07711d987aba6a53810c67913aebe0b6.jpg" class="hero-img">
            <h1>Organizaciones Asociadas</h1>
        </section>

        <!-- Lista de organizaciones -->
        <section class="organizaciones">
            <h2>Nuestras Aliadas</h2>
            <ul>
                <li><strong>Fundación Esperanza:</strong> Trabajando por la igualdad educativa.</li>
                <li><strong>Red Solidaria:</strong> Apoyo a comunidades vulnerables.</li>
                <li><strong>Green Earth:</strong> Promoviendo la sostenibilidad ambiental.</li>
            </ul>
        </section>

        <!-- Testimonios -->
        <section class="testimonios">
            <h2>Testimonios de Aliados</h2>
            <div class="testimonio">
                <img src="https://images.unsplash.com/photo-1595793389746-fab86dbd34a7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDZ8fHRlYW19ZW58MHx8fHwxNjg1NjYwNzA2&ixlib=rb-1.2.1&q=80&w=400" alt="Retrato de Laura Gómez">
                <blockquote>"Trabajar con Inclunet Space ha ampliado nuestra capacidad de impacto en las comunidades."</blockquote>
                <p><strong>- Laura Gómez, Fundación Esperanza</strong></p>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="cta">
            <h2>¿Eres una Organización?</h2>
            <p>Únete a nuestra red y trabajemos juntos para lograr un cambio sostenible.</p>
            <a href="signup-organization.html" class="btn-cta">Colaborar con Nosotros</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Inclunet Space - Todos los derechos reservados</p>
    </footer>
</body>
</html>
