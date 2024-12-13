<?php
require_once 'connection.php';
session_start();

// Verificar si el usuario está autenticado
if (!isset($_COOKIE['username']) || !isset($_COOKIE['tipo_usuario'])) {
    echo "Debe iniciar sesión para acceder a su perfil.";
    header("Refresh: 3; url=login.php"); // Redirigir al inicio de sesión después de 3 segundos
    exit();
}

$username = $_COOKIE['username'];
$tipo_usuario = $_COOKIE['tipo_usuario'];

try {
    $connection = new connection();
    $PDO = $connection->connect();

    // Obtener datos del usuario según el tipo
    $table = ($tipo_usuario === 'voluntario') ? 'voluntarios' : 'organizaciones';
    $field = ($tipo_usuario === 'voluntario') ? 'username' : 'nombre_organizacion';

    // Modificar la consulta para incluir el id
    $sql = "SELECT id, $field AS username, correo FROM $table WHERE $field = :username";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "No se encontró información del usuario.";
        exit();
    }
} catch (\Throwable $th) {
    error_log("Error al cargar el perfil: " . $th->getMessage());
    echo "Ocurrió un error al cargar el perfil. Por favor, inténtelo más tarde.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 3rem;
        }
        .title {
            text-align: center;
            margin-bottom: 2rem;
        }
        .profile-info {
            margin-bottom: 2rem;
        }
        .profile-info p {
            font-size: 1.2rem;
            line-height: 1.5;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            text-decoration: none;
            color: #fff;
            background: #007bff;
            border: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Perfil de Usuario</h1>
        <div class="profile-info">
            <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p> <!-- Mostrar el ID -->
            <p><strong>Nombre de Usuario:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($user['correo']); ?></p>
            <p><strong>Tipo de Usuario:</strong> <?php echo htmlspecialchars($tipo_usuario); ?></p>
        </div>
        <a class="btn" href="editar_perfil.php">Editar Perfil</a>
        <a class="btn" href="index.php">Ir al Inicio</a>
    </div>

    <!-- Mostrar los eventos en los que está inscrito -->
<?php if (!empty($events)): ?>
    <h2>Eventos en los que estás inscrito</h2>
    <div class="events-container">
        <?php foreach ($events as $event): ?>
            <div class="event-card">
                <h3><?php echo htmlspecialchars($event['nombre_evento']); ?></h3>
                <p><strong>Fecha:</strong> <?php echo date('d M, Y', strtotime($event['fecha_evento'])); ?></p>
                <p><strong>Descripción:</strong> <?php echo htmlspecialchars($event['descripcion']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No estás inscrito en ningún evento.</p>
<?php endif; ?>

<style>
    /* Contenedor de los eventos */
.events-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

/* Estilo de las tarjetas */
.event-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.event-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

/* Títulos de los eventos */
.event-card h3 {
    color: #333;
    font-size: 1.5em;
    margin-bottom: 10px;
}

/* Descripción de los eventos */
.event-card p {
    color: #555;
    line-height: 1.6;
}

.event-card p strong {
    font-weight: bold;
    color: #333;
}
</body>
</html>




