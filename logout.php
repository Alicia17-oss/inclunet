<?php

include('connection.php');  // Incluye la conexión para asegurarte de que se establece la base de datos

session_start(); // Inicia o retoma la sesión existente

// Verificar si la sesión ya existe
if (isset($_SESSION['username'])) {
    // Eliminar todas las variables de sesión
    $_SESSION = [];
    
    // Eliminar la cookie de sesión si está configurada
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, 
            $params["path"], $params["domain"], 
            $params["secure"], $params["httponly"]
        );
    }

    // Destruir la sesión en el servidor
    session_destroy();

    // Redirigir al usuario al inicio de sesión
    header('Location: login.html');
    exit();
} else {
    // Si no hay sesión activa, podrías redirigir o mostrar un mensaje
    echo "No hay sesión activa.";
}
?>
