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

// Consultar los eventos en la base de datos
$sql = "SELECT * FROM eventos";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Obtener todos los eventos
$eventos = $stmt->fetchAll();

if (empty($eventos)) {
    echo "<p>No se encontraron eventos.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    :root {
    --wp--preset--font-size--normal: 16px;
    --wp--preset--font-size--huge: 42px;
    --wp--preset--color--black: #000;
    --wp--preset--color--white: #fff;
    --gowilds-font-sans-serif: "Kumbh Sans", sans-serif;
    --e-global-color-primary: #63AB45;
    --e-global-color-text: #82828A;
    --blue-color: #007bff;
}

body {
    font-family: var(--gowilds-font-sans-serif);
    font-size: var(--wp--preset--font-size--normal);
    color: var(--e-global-color-text);
    line-height: 1.8em;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.header {
    text-align: right;
    padding: 20px;
}

.header button {
    padding: 10px 20px;
    background-color: var(--blue-color);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s;
}

.header button:hover {
    background-color: #0056b3;
}

.header button a {
    text-decoration: none;
    color: white;
}

/* Contenedor de las tarjetas (eventos) */
.item-columns {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    justify-content: center;
    padding: 2rem;
    margin-top: 2rem;
}

/* Estilo de cada tarjeta de evento */
.booking-one__single {
    background: var(--wp--preset--color--white);
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 340px; /* Ancho ajustado */
    height: 400px; /* Altura ajustada */
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding: 10px;
    position: relative;
    transition: transform 0.3s ease;
    overflow: hidden;
}

.booking-one__single:hover {
    transform: scale(1.05);
}

/* Imagen que será opacada al pasar el mouse */
.booking-one__single img {
    width: 100%;
    height: 200px; /* Altura fija para la imagen */
    object-fit: cover; /* Recorta la imagen para ajustarse al contenedor */
    border-radius: 5px;
    transition: opacity 0.3s ease;
}

/* Descripción sobre la imagen */
.booking-one__single .description-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 1rem;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 5px;
}

.booking-one__single:hover img {
    opacity: 0.3;
}

.booking-one__single:hover .description-overlay {
    opacity: 1;
    visibility: visible;
}

/* Botón de registrarse */
.booking-one__single .btn-book {
    margin-top: 10px;
    padding: 10px;
    background-color: var(--blue-color);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    text-align: center;
    transition: background-color 0.3s;
}

.booking-one__single .btn-book:hover {
    background-color: #0056b3;
}

/* Combinación de fecha y hora en un solo espacio */
.booking-one__content p {
    display: inline-block;
    margin-right: 10px;
}

.booking-one__content .icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Asegurar 3 columnas en filas */
@media (min-width: 768px) {
    .item-columns {
        grid-template-columns: repeat(3, 1fr); /* 3 columnas en pantallas más grandes */
        gap: 2rem;
    }
}

@media (max-width: 767px) {
    .item-columns {
        grid-template-columns: repeat(2, 1fr); /* 2 columnas en pantallas pequeñas */
        gap: 1rem;
    }
}

    </style>
</head>
<body>
    <!-- Botón para subir evento -->

     <?php if (isset($_COOKIE['tipo_usuario']) && $_COOKIE['tipo_usuario'] === 'organizacion') { ?>
     <div class="header">
         <button>
            <a href="formulario_eventos.html">Subir evento</a>
         </button>
     </div>                   
     <?php } ?>
    

    <!-- Contenedor para los eventos -->
    <div class="item-columns">
    <?php
    // Recorrer los eventos y mostrarlos en contenedores dinámicos
    foreach ($eventos as $evento) {
        ?>
        <div class="booking-one__single">
            <div class="booking-one__content">
                <img src="<?php echo htmlspecialchars($evento['imagen_evento']); ?>" alt="Imagen del evento">
                <!-- Descripción sobre la imagen que aparece al pasar el mouse -->
                <div class="description-overlay">
                    <p><i class="fas fa-info-circle"></i> <?php echo htmlspecialchars($evento['descripcion']); ?></p>
                </div>
                <h2><?php echo htmlspecialchars($evento['nombre_evento']); ?></h2>
                <div class="icon-wrapper">
                    <p><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($evento['fecha_evento']); ?></p>
                    <p><i class="fas fa-clock"></i> <?php echo htmlspecialchars($evento['hora_evento']); ?></p>
                </div>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($evento['ubicacion']); ?></p>
                <p><i class="fas fa-users"></i> Capacidad: <?php echo htmlspecialchars($evento['capacidad']); ?></p>
                <button class="btn-book">Registrarse</button>
            </div>
        </div>
        <?php
    }
    ?>
</div>

</body>
</html>
