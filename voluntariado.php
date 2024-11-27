<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntariado - Inclunet Space</title>
    <meta name="description" content="Descubre cómo puedes participar como voluntario y contribuir a nuestra misión de promover la inclusión social y el cambio positivo.">
    <meta name="keywords" content="Voluntariado, inclusión, ayuda social, cambio positivo">
    <meta name="author" content="Inclunet Space">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer">
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
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYfUFkb8wVkzUnBupPhjtX1NzBlQSloibkkw&s" class="hero-img">
            <h1>Únete como Voluntario</h1>
        </section>

        <!-- Beneficios del voluntariado -->
        <section class="beneficios">
            <h2>¿Por qué ser Voluntario?</h2>
            <ul>
                <li><strong>Contribuye al cambio:</strong> Marca una diferencia real en comunidades necesitadas.</li>
                <li><strong>Aprende nuevas habilidades:</strong> Amplía tus conocimientos y experiencia.</li>
                <li><strong>Crea conexiones:</strong> Únete a una red global de personas apasionadas por el cambio social.</li>
            </ul>
        </section>

        <!-- Testimonios -->
        <section class="testimonios">
            <h2>Lo que dicen nuestros voluntarios</h2>
            <div class="testimonio">
                <img src="https://images.unsplash.com/photo-1600186348470-df88307f8d5e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDV8fHBlcnNvbnxlbnwwfHx8fDE2ODU2NjAzNjE&ixlib=rb-1.2.1&q=80&w=400" alt="Retrato de Ana">
                <blockquote>"El voluntariado con Inclunet Space ha sido una de las experiencias más gratificantes de mi vida."</blockquote>
                <p><strong>- Ana Martínez</strong></p>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="cta">
            <h2>¡Sé parte del cambio!</h2>
            <p>Completa nuestro formulario para unirte a la comunidad de voluntarios. Estamos ansiosos por conocerte.</p>
            <a href="signup.html" class="btn-cta">Quiero Ser Voluntario</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Inclunet Space - Todos los derechos reservados</p>
    </footer>
</body>
</html>
