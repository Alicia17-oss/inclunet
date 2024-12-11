<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 15px;
            color: #555;
        }
        input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .cancel {
            background-color: #ccc;
            color: #333;
        }
        .cancel:hover {
            background-color: #999;
        }
        .actions {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Editar Perfil</h1>
    <form action="update_profile.php" method="POST">

        <?php if (isset($_COOKIE['tipo_usuario']) && $_COOKIE['tipo_usuario'] === 'organizacion') { ?>
            <!-- Campos para organizaciones -->
            <div id="organizacion-fields">
                <label for="nombre_org">Nombre de la Organización*</label>
                <input type="text" id="nombre_org" name="nombre_organizacion" required>

                <label for="telefono_org">Teléfono de la Organización*</label>
                <input type="tel" id="telefono_org" name="telefono" required>
            </div>
        <?php } ?>

        <?php if (isset($_COOKIE['tipo_usuario']) && $_COOKIE['tipo_usuario'] === 'voluntario') { ?>
            <!-- Campos para voluntarios -->
            <div id="voluntario-fields">
                <label for="username">Username*</label>
                <input type="text" id="username" name="username" required>

                <label for="nombres">Nombres*</label>
                <input type="text" id="nombres" name="nombres" required>

                <label for="apellidos">Apellidos*</label>
                <input type="text" id="apellidos" name="apellidos" required>
            </div>
        <?php } ?>

        <!-- Campos comunes -->
        <label for="correo">Correo Electrónico*</label>
        <input type="email" id="correo" name="correo" required>

        <label for="contrasenia">Nueva Contraseña</label>
        <input type="password" id="contrasenia" name="contrasenia" placeholder="Deja en blanco si no deseas cambiarla">

        <label for="confirmar-contrasenia">Confirmar Nueva Contraseña</label>
        <input type="password" id="confirmar-contrasenia" name="confirmar-contrasenia" placeholder="Deja en blanco si no deseas cambiarla">

        <div class="actions">
            <button type="submit">Guardar Cambios</button>
            <button type="button" class="cancel" onclick="window.location.href='perfil.php';">Cancelar</button>
        </div>
    </form>
</div>

</body>
</html>