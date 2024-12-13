<?php
// Mostrar errores de PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión a la base de datos
include('connection.php');

// Crear una nueva instancia de la clase Connection
$db = new Connection();
$conn = $db->connect();

if (!$conn) {
    die("Error en la conexión a la base de datos");
}

// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_evento'])) {
    // Obtener el nombre de usuario desde las cookies
    if (isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];

        // Supongamos que obtienes el ID del voluntario a partir del nombre de usuario
        $voluntario_sql = "SELECT id FROM voluntarios WHERE username = :username";
        $voluntario_stmt = $conn->prepare($voluntario_sql);
        $voluntario_stmt->bindParam(':username', $username);
        $voluntario_stmt->execute();
        $voluntario = $voluntario_stmt->fetch(PDO::FETCH_ASSOC);

        if ($voluntario) {
            $voluntario_id = $voluntario['id'];
            $evento_id = $_POST['id_evento'];

            // Verificar que el ID del evento existe en la tabla 'eventos'
            $check_evento_sql = "SELECT * FROM eventos WHERE id_evento = :evento_id";
            $check_evento_stmt = $conn->prepare($check_evento_sql);
            $check_evento_stmt->bindParam(':evento_id', $evento_id);
            $check_evento_stmt->execute();

            if ($check_evento_stmt->rowCount() > 0) {
                // Insertar la inscripción en la tabla 'inscripciones'
                $sql = "INSERT INTO inscripciones (id_voluntario, id_evento) VALUES (:voluntario_id, :evento_id)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':voluntario_id', $voluntario_id);
                $stmt->bindParam(':evento_id', $evento_id);

                if ($stmt->execute()) {
                    echo "<p>Inscripción exitosa.</p>";
                } else {
                    echo "<p>Error al inscribir al voluntario.</p>";
                }
            } else {
                echo "<p>El ID del evento no existe.</p>";
            }
        } else {
            echo "<p>Error: No se encontró el ID del voluntario correspondiente al nombre de usuario.</p>";
        }
    } else {
        echo "<p>Error: No se encontró el nombre de usuario en las cookies.</p>";
    }
} else {
    echo "<p>Error en la solicitud. No se enviaron los datos correctos.</p>";
}
?>



