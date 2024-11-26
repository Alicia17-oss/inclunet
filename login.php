<?php

require_once 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error_message = "Por favor, rellene todos los campos.";
    } else {
        try {
            $connection = new connection();
            $PDO = $connection->connect();

            // Consulta combinada para voluntarios y organizaciones
            $sql = "
                SELECT username, correo, password, 'voluntario' AS tipo_usuario 
                FROM voluntarios 
                WHERE username = :username
                UNION
                SELECT username, correo, password, 'organizacion' AS tipo_usuario 
                FROM organizaciones 
                WHERE username = :username
            ";

            $stmt = $PDO->prepare($sql);
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Guardar datos del usuario en la sesión
                $_SESSION['correo'] = $user['correo'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['tipo_usuario'] = $user['tipo_usuario'];

                // Redirigir según el tipo de usuario
                if ($user['tipo_usuario'] === 'voluntario') {
                    header('Location: index.html');
                } elseif ($user['tipo_usuario'] === 'organizacion') {
                    header('Location: panel.html');
                }
                exit();
            } else {
                $error_message = "Credenciales incorrectas.";
            }
        } catch (\Throwable $th) {
            $error_message = "Error en la conexión: " . $th->getMessage();
        }
    }
}
?>
