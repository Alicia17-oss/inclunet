<?php

// Iniciar sesión
session_start();

// Verificar si la cookie 'username' existe
if (isset($_COOKIE['username'])) {
    // Eliminar la cookie al establecer su tiempo de expiración en el pasado
    setcookie('username', '', time() - 3600, '/');  // Expira una hora antes
}

// Destruir las variables de sesión
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirigir a la página de login o cualquier página que desees
header('Location:' .$URL.); 
exit();
?>
