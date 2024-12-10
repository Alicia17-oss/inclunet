<?php

require_once 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$username = trim($_POST['username']);
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    if (empty($correo) || empty($password)) {
        $error_message = "Por favor, rellene todos los campos.";
        echo $error_message;
    } else {
        try {
            $connection = new connection();
            $PDO = $connection->connect();

            // Consulta combinada para voluntarios y organizaciones
            $sql = "
            SELECT username, correo, contrasenia, 'voluntario' AS tipo_usuario 
            FROM voluntarios 
            WHERE correo = :correo_voluntario
            UNION
            SELECT nombre_organizacion AS username, correo, contrasenia, 'organizacion' AS tipo_usuario 
            FROM organizaciones 
            WHERE correo = :correo_organizacion
            ";

            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':correo_voluntario', $correo);
            $stmt->bindParam(':correo_organizacion', $correo);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['contrasenia'])) {
                setcookie('username', $user['username']);
                setcookie('tipo_usuario', $user['tipo_usuario']);

                // Redirigir según el tipo de usuario
                if ($user['tipo_usuario'] === 'voluntario') {
                    header('Location: index.php');
                } elseif ($user['tipo_usuario'] === 'organizacion') {
                    header('Location: evento_prueba.php');
                }
                exit();
            } else {
                $error_message = "Credenciales incorrectas.";
                echo $error_message;
            }
        } catch (\Throwable $th) {
            $error_message = "Error en la conexión: " . $th->getMessage();
            echo $error_message;
        }
    }
}
?>
