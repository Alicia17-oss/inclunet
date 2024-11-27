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
                WHERE correo = :correo
            ";

            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['contrasenia'])) {
                setcookie('username', $user['username']);

                // Redirigir según el tipo de usuario
                if ($user['tipo_usuario'] === 'voluntario') {
                    header('Location: index.php');
                } elseif ($user['tipo_usuario'] === 'organizacion') {
                    header('Location: panel.html');
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
