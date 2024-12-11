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
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <style>
        body {
    font-family: "Kumbh Sans", sans-serif;
    background-color: #696984;
    margin: 0;
    padding: 0;
    margin-top: 60px; /* Ajusta el tamaño al alto del header */
}

.btn-subir-evento-contairner {
    display: flex;
    justify-content: flex-start; /* Alinea el contenido a la izquierda */
}

.btn-subir-evento {
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
    border: 2px solid rgba(28, 216, 237, 0.9);
    border-radius: 80px;
    background-color: rgba(28, 216, 237, 0.9);
    color: #FFFFFF;
    transition: background-color 0.3s, transform 0.3s;
    margin-top: 10px;
}

        .item-columns {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            padding: 2rem;
        }

        .booking-one__single {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 340px;
            padding: 10px;
            position: relative;
        }

        .booking-one__single img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }

        .delete-icon,
        .edit-icon {
            position: absolute;
            top: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 50%;
            padding: 8px;
            cursor: pointer;
            display: none;
        }

        .delete-icon {
            right: 10px;
            background-color: rgba(255, 0, 0, 0.7);
        }

        .edit-icon {
            right: 50px;
            background-color: rgba(0, 128, 0, 0.7);
        }

        .booking-one__single:hover .delete-icon,
        .booking-one__single:hover .edit-icon {
            display: block;
        }
    </style>
</head>
<body>
    <header id="header" class="header">
        <div class="logo">
            <img src="Imagenes/logoinclunetspace.png" alt="Inclunet Space logo">
        </div>
        <div>
            <nav>
                <ul>
                    <li><a href="ïndex.php"> Inicio</a></li>
                    <!--<li><a href="quienes somos.php">Quiénes somos</a></li>
                    <li><a href="voluntariado.php">Voluntariado</a></li>
                    <li><a href="organizaciones.php">Organizaciones</a></li>-->
                    <li><a href="evento_prueba.php">Eventos</a></li>
                </ul>
                <?php if (!isset($_COOKIE['username'])) { ?>
                    <div class="header-buttons">
                        <a href="login.html">
                            <button class="login-btn">Iniciar sesión</button>
                        </a>
                        <a href="signup.html">
                            <button class="signup-btn">Registrarse</button>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="user-menu-container">
                        <!-- Botón para mostrar el menú -->
                        <button class="login-icon" onclick="toggleDropdown()">Bienvenido, <?php echo htmlspecialchars($_COOKIE['username']); ?> </button>
        
                         <!-- Menú desplegable -->
                        <div id="user-menu" class="dropdown-menu">
                            <a href="profile.html">Mi perfil</a>
                            <?php if (isset($_COOKIE['tipo_usuario']) && $_COOKIE['tipo_usuario'] === 'organizacion') { ?>
                                <a href="evento_prueba.php">Panel</a>
                            <?php } ?>
                            <a href="logout.php" onclick="window.location.reload();">Cerrar sesión</a>
                        </div>
                    </div>
                <?php } ?>
            </nav>
        </div>     
    </header>
    
    <div class="btn-subir-evento-contairner">
        <a href="formulario_eventos.html">
            <button  class="btn-subir-evento"> Subir evento</button>
        </a> 
    </div>

    <div class="item-columns">
        <?php
        if (!empty($eventos)) {
            foreach ($eventos as $evento) {
                ?>
                <div class="booking-one__single" data-id="<?php echo htmlspecialchars($evento['id_evento']); ?>">
                    <div class="delete-icon" title="Eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </div>
                    <div class="edit-icon" title="Editar">
                        <i class="fas fa-edit"></i>
                    </div>
                    <img src="<?php echo htmlspecialchars($evento['imagen_evento']); ?>" alt="Imagen del evento">
                    <h2><?php echo htmlspecialchars($evento['nombre_evento']); ?></h2>
                    <p><?php echo htmlspecialchars($evento['descripcion']); ?></p>
                    <p><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($evento['fecha_evento']); ?></p>
                    <p><i class="fas fa-clock"></i> <?php echo htmlspecialchars($evento['hora_evento']); ?></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($evento['ubicacion']); ?></p>
                    <p><i class="fas fa-users"></i> Capacidad: <?php echo htmlspecialchars($evento['capacidad']); ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p>No se encontraron eventos.</p>";
        }
        ?>
    </div>

    <script>
        document.querySelectorAll('.delete-icon').forEach(icon => {
            icon.addEventListener('click', function () {
                const eventContainer = this.closest('.booking-one__single');
                const eventId = eventContainer.dataset.id;

                if (confirm('¿Estás seguro de que deseas eliminar este evento?')) {
                    fetch('eliminar_evento.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ id_evento: eventId }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Evento eliminado correctamente.');
                            eventContainer.remove();
                        } else {
                            alert('Error al eliminar el evento: ' + data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('No se pudo conectar al servidor.');
                    });
                }
            });
        });

        document.querySelectorAll('.edit-icon').forEach(icon => {
            icon.addEventListener('click', function () {
                const eventContainer = this.closest('.booking-one__single');
                const eventId = eventContainer.dataset.id;
                window.location.href = `editar_evento.php?id_evento=${eventId}`;
            });
        });
    </script>
</body>
</html>
