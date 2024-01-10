<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Representante</title>
    <!-- Agregamos enlace a Bootstrap (puedes descargarlo o enlazarlo desde un CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agregamos nuestro propio archivo de estilos CSS -->
</head>
<body>

<div class="container">
    <h2>Datos Representante</h2>
    <form action="guardar_representante.php" method="post" enctype="multipart/form-data">

        <!-- Campos del formulario del representante -->
        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" pattern="[0-9]*" required>
            <small id="cedulaHelp" class="form-text text-muted">Solo se permiten números.</small>
        </div>
        <div class="form-group">
            <label for="apellidos_nombres">Apellidos y Nombres</label>
            <input type="text" class="form-control" id="apellidos_nombres" name="apellidos_nombres" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <div class="form-group">
            <label for="ocupacion">Ocupación</label>
            <input type="text" class="form-control" id="ocupacion" name="ocupacion" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]*" required>
            <small id="telefonoHelp" class="form-text text-muted">Solo se permiten números.</small>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary">Guardar Representante</button>
    </form>
</div>

<!-- Agregamos los enlaces a Bootstrap y cualquier otro archivo de script que necesitemos -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Agregamos nuestro propio archivo de script JS -->
<script src="scripts.js"></script>

</body>
</html>
