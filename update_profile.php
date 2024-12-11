<?php
require_once 'connection.php';
session_start();

// Verificar si las cookies 'username' y 'tipo_usuario' están presentes
if (!isset($_COOKIE['username']) || !isset($_COOKIE['tipo_usuario'])) {
    header("Location: login.php"); // Redirigir al inicio de sesión si no hay cookies activas
    exit();
}

try {
    $connection = new connection();
    $PDO = $connection->connect();
    
    // Obtener username y tipo de usuario desde las cookies
    $username = $_COOKIE['username'];
    $user_type = $_COOKIE['tipo_usuario']; // 'voluntario' o 'organizacion'
    
    // Variables comunes
    $params = [
        ':correo' => $_POST['correo'],
        ':username' => $username
    ];

    // Definir la consulta y parámetros según el tipo de usuario
    if ($user_type === 'voluntario') {
        // Parámetros específicos para voluntarios
        $params[':nuevo_username'] = $_POST['username'];
        $params[':nombres'] = $_POST['nombres'];
        $params[':apellidos'] = $_POST['apellidos'];
        
        // Si se quiere cambiar la contraseña
        if (!empty($_POST['contrasenia'])) {
            if ($_POST['contrasenia'] === $_POST['confirmar-contrasenia']) {
                $hashedPassword = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
                $sql = "UPDATE voluntarios SET username = :nuevo_username, nombres = :nombres, apellidos = :apellidos, correo = :correo, contrasenia = :contrasenia WHERE username = :username";
                $params[':contrasenia'] = $hashedPassword;
            } else {
                echo "Las contraseñas no coinciden.";
                exit();
            }
        } else {
            $sql = "UPDATE voluntarios SET username = :nuevo_username, nombres = :nombres, apellidos = :apellidos, correo = :correo WHERE username = :username";
        }
    } elseif ($user_type === 'organizacion') {
        $params[':nombre_organizacion'] = $_POST['nombre_organizacion'];
        $params[':telefono'] = $_POST['telefono'];
        
        if (!empty($_POST['contrasenia'])) {
            if ($_POST['contrasenia'] === $_POST['confirmar-contrasenia']) {
                $hashedPassword = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
                $sql = "UPDATE organizaciones SET nombre_organizacion = :nombre_organizacion, telefono = :telefono, correo = :correo, contrasenia = :contrasenia WHERE nombre_organizacion = :username";
                $params[':contrasenia'] = $hashedPassword;
            } else {
                echo "Las contraseñas no coinciden.";
                exit();
            }
        } else {
            $sql = "UPDATE organizaciones SET nombre_organizacion = :nombre_organizacion, telefono = :telefono, correo = :correo WHERE nombre_organizacion = :username";
        }
    }

    $stmt = $PDO->prepare($sql);
    $stmt->execute($params);

    // Confirmación y redirección
    header("Location: login.html"); // Redirigir al perfil del usuario
    exit();

} catch (PDOException $e) {
    echo "Error al actualizar los datos: " . $e->getMessage();
}
?>




