<?php

include('connection.php');

session_start();

if(isset($_COOKIE['username'])){
    echo "existe sesión";
    session_destroy();
    header('Location:'.$URL.'connection.php');?>
    <div class="header-buttons">
            <a href="login.html">
                <button class="login-btn">Iniciar sesión</button>
            </a>
            <a href="signup.html">
                <button class="signup-btn">Registrarse</button>
            </a>
       </div>    
    <?php }else{
    //echo "no existe sesión";
}

?>

<?php  


    if (!isset($_COOKIE['username'])) { ?>
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
