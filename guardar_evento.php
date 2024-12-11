<?php
session_start();

// Verifica si el usuario está logueado
if (!isset($_COOKIE['username'])) {
    // Mensaje de redirección en lugar de error abrupto
    header('Location: login.php?error=not_logged_in');
    exit();
}

// Incluir archivo de conexión a la base de datos
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitización y validación de datos
    $nombre_evento = htmlspecialchars(trim($_POST['nombre_evento']));
    $descripcion = htmlspecialchars(trim($_POST['descripcion']));
    $fecha_evento = $_POST['fecha_evento'];
    $hora_evento = $_POST['hora_evento'];
    $ubicacion = htmlspecialchars(trim($_POST['ubicacion']));
    $capacidad = intval($_POST['capacidad']);
    $id_organizacion = htmlspecialchars(trim($_POST['id_organizacion']));

    // Verificación de campos obligatorios
    if (empty($nombre_evento) || empty($descripcion) || empty($fecha_evento) || 
        empty($hora_evento) || empty($ubicacion) || empty($capacidad) || empty($id_organizacion)) {
        header('Location: formulario_eventos.html?error=missing_fields');
        exit();
    }

    // Subida de imagen
    $imagen_evento = null;
    if (isset($_FILES['imagen_evento']) && $_FILES['imagen_evento']['error'] === 0) {
        $target_dir = "uploads/";
        $unique_name = uniqid('evento_', true) . "." . strtolower(pathinfo($_FILES['imagen_evento']['name'], PATHINFO_EXTENSION));
        $target_file = $target_dir . $unique_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if ($_FILES['imagen_evento']['size'] <= 5000000) {
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                if (move_uploaded_file($_FILES['imagen_evento']['tmp_name'], $target_file)) {
                    $imagen_evento = $target_file;
                } else {
                    header('Location: formulario_eventos.html?error=upload_failed');
                    exit();
                }
            } else {
                header('Location: formulario_eventos.html?error=image_too_large');
                exit();
            }
        } else {
            header('Location: formulario_eventos.html?error=invalid_image_format');
            exit();
        }
    }

    // Conexión a la base de datos
    try {
        $conn = (new Connection())->connect();
        $sql = "INSERT INTO eventos 
                (nombre_evento, descripcion, fecha_evento, hora_evento, ubicacion, capacidad, imagen_evento, id_organizacion, creado_en) 
                VALUES 
                (:nombre_evento, :descripcion, :fecha_evento, :hora_evento, :ubicacion, :capacidad, :imagen_evento, :id_organizacion, NOW())";
        $stmt = $conn->prepare($sql);

        // Vinculación de parámetros
        $stmt->bindParam(':nombre_evento', $nombre_evento);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_evento', $fecha_evento);
        $stmt->bindParam(':hora_evento', $hora_evento);
        $stmt->bindParam(':ubicacion', $ubicacion);
        $stmt->bindParam(':capacidad', $capacidad);
        $stmt->bindParam(':imagen_evento', $imagen_evento);
        $stmt->bindParam(':id_organizacion', $id_organizacion);

        $stmt->execute();

        // Redirección a evento_prueba.html después de guardar
        header('Location: index.php?success=event_created');
        exit();
    } catch (PDOException $e) {
        // Muestra mensaje amigable de error en lugar de detalles técnicos
        header('Location: formulario_eventos.php?error=database_error');
        error_log("Error al guardar el evento: " . $e->getMessage());
        exit();
    }
}
?>  