<?php
// Mostrar errores de PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir archivo de conexión
include('connection.php');

$db = new Connection();
$conn = $db->connect();

// Leer datos enviados por la solicitud
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id_evento'])) {
    $id_evento = $data['id_evento'];

    // Preparar consulta para eliminar
    $sql = "DELETE FROM eventos WHERE id_evento = :id_evento";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([':id_evento' => $id_evento])) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al eliminar el evento']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Datos inválidos']);
}
?>
