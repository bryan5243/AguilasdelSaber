<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="formulario.css">
    <title>Formulario de Estudiante</title>

    <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Incluye Bootstrap JS (incluyendo Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Incluye formulario.js después de jQuery -->
    <script src="../js/formulario.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Formulario Inicial</h2>

    <!-- Alerta flotante para campos vacíos -->
    <div class="alert alert-danger alert-dismissible fade show" id="emptyFieldsAlert" role="alert">
        <strong>¡Recuerde!</strong> Todos los campos deben estar llenos.
        <!-- Usa 'button' en lugar de 'submit' para el botón de cierre -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!-- Primer formulario con botón de registro -->
    <form id="studentForm" action="guardar.php" method="post">
        <div class="mb-3">
            <label for="cedula" class="form-label">1. Cédula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" pattern="[0-9]{10}" title="La cédula debe contener solo 10 números" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">2. Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
        <div class="mb-3">
            <label for="nombres" class="form-label">3. Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" required>
        </div>
        <div class="mb-3">
            <label for="fechaNacimiento" class="form-label">4. Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
        </div>
        <div class="mb-3">
            <label for="codigoServicio" class="form-label">5. Código único de Servicio Básico (Planilla de Luz)</label>
            <input type="text" class="form-control" id="codigoServicio" name="codigoServicio" pattern="[0-9]+" title="El código de servicio debe contener solo números" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <button type="button" class="btn btn-secondary" onclick="redirigirFormulario2()">Ir a Formulario 2</button>
    </form>
</div>

<!-- Modal para mensaje de éxito -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro Exitoso</h5>
                <!-- Usa 'button' en lugar de 'submit' para el botón de cierre -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¡El estudiante se registró con éxito!
            </div>
        </div>
    </div>
</div>

</body>
</html>
