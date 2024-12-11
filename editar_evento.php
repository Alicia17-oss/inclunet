<?php
// Mostrar errores de PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión a la base de datos
include('connection.php');

// Conectar a la base de datos
$db = new Connection();
$conn = $db->connect();

if (!$conn) {
    die("Error en la conexión a la base de datos");
}

// Obtener el ID del evento
$id_evento = $_GET['id_evento'] ?? null;

if (!$id_evento) {
    die("ID del evento no especificado");
}

// Consultar los datos del evento
$sql = "SELECT * FROM eventos WHERE id_evento = :id_evento";
$stmt = $conn->prepare($sql);
$stmt->execute([':id_evento' => $id_evento]);

$evento = $stmt->fetch();

if (!$evento) {
    die("Evento no encontrado");
}

// Procesar actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_evento'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha_evento'];
    $hora = $_POST['hora_evento'];
    $ubicacion = $_POST['ubicacion'];
    $capacidad = $_POST['capacidad'];

    $sql_update = "UPDATE eventos SET nombre_evento = :nombre, descripcion = :descripcion, fecha_evento = :fecha, hora_evento = :hora, ubicacion = :ubicacion, capacidad = :capacidad WHERE id_evento = :id_evento";
    $stmt_update = $conn->prepare($sql_update);

    if ($stmt_update->execute([
        ':nombre' => $nombre,
        ':descripcion' => $descripcion,
        ':fecha' => $fecha,
        ':hora' => $hora,
        ':ubicacion' => $ubicacion,
        ':capacidad' => $capacidad,
        ':id_evento' => $id_evento
    ])) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al actualizar el evento";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: auto; /* Permite desplazamiento si el contenido es mayor que la ventana */
        }

        .form-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            height: auto; /* El formulario se ajusta al contenido */
            min-height: 400px; /* Altura mínima para que el formulario no se haga demasiado pequeño */
        }

        h1 {
            font-size: 1.5rem;
            color: #333;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Editar Evento</h1>
        <form method="POST">
            <label for="nombre_evento">Nombre:</label>
            <input type="text" id="nombre_evento" name="nombre_evento" value="<?php echo htmlspecialchars($evento['nombre_evento']); ?>" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($evento['descripcion']); ?></textarea>

            <label for="fecha_evento">Fecha:</label>
            <input type="date" id="fecha_evento" name="fecha_evento" value="<?php echo htmlspecialchars($evento['fecha_evento']); ?>" required>

            <label for="hora_evento">Hora:</label>
            <input type="time" id="hora_evento" name="hora_evento" value="<?php echo htmlspecialchars($evento['hora_evento']); ?>" required>

            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" value="<?php echo htmlspecialchars($evento['ubicacion']); ?>" required>

            <label for="capacidad">Capacidad:</label>
            <input type="number" id="capacidad" name="capacidad" value="<?php echo htmlspecialchars($evento['capacidad']); ?>" required>

            <button type="submit">Guardar Cambios</button>
        </form>
        <a href="index.php">Cancelar</a>
    </div>
</body>
</html>
