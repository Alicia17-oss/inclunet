<?php

require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $password = $_POST['contrasenia'];
    $password_confirm = $_POST['confirmar-contrasenia'];
    $tipo_usuario = $_POST['tipo_usuario'];  // Tipo de usuario: voluntario u organizacion
    $correo = $_POST['correo'];

    // Verificar que las contraseñas coincidan
    if ($password !== $password_confirm) {
        die("Las contrasenias no coinciden.");
    }

    // Encriptar la contraseña
    $password_encriptada = password_hash($password, PASSWORD_BCRYPT);

    // Conexión a la base de datos
    try {
        $connection = new connection();
        $PDO = $connection->connect();

        // Insertar en la tabla correspondiente dependiendo del tipo de usuario
        if ($tipo_usuario === 'voluntario') {
            $username = $_POST['username'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];

            // Preparar la consulta SQL para insertar un nuevo voluntario
            $sql = "INSERT INTO voluntarios (username, nombres, apellidos, correo, contrasenia, tipo_usuario) 
                    VALUES (:username, :nombres, :apellidos, :correo, :contrasenia, :tipo_usuario)";
        
            // Preparar la declaración
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':nombres', $nombres);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasenia', $password_encriptada);
            $stmt->bindParam(':tipo_usuario', $tipo_usuario);

        } elseif ($tipo_usuario === 'organizacion') {
            $nombre_org = $_POST['nombre_org'];
            $telefono_org = $_POST['telefono_org'];

            // Preparar la consulta SQL para insertar una nueva organización
            $sql = "INSERT INTO organizaciones (nombre_organizacion, telefono, correo, contrasenia, tipo_usuario) 
                    VALUES (:nombre_org, :telefono_org, :correo, :contrasenia, :tipo_usuario)";
            
            // Preparar la declaración
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':nombre_org', $nombre_org);
            $stmt->bindParam(':telefono_org', $telefono_org);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasenia', $password_encriptada);
            $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        }

    } catch (\Throwable $th) {
        die("Error de conexión: " . $th->getMessage());
    }

    // Ejecutar la consulta y verificar si fue exitosa
    try {
        $stmt->execute();
        echo "<script>
        alert('usuario registrado coreectamente');
        window.location.href = 'login.html';
        </script>";

       // echo "Nuevo registro creado con éxito";
    } catch (\PDOException $e) {
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
}
?>
