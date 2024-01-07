<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 2</title>
    <link rel="stylesheet" href="formulario2.css"> <!-- Ajusta la ruta según tu estructura de archivos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Formulario 2</h2>
 <!-- Alerta flotante para campos vacíos -->
 <div class="alert alert-danger alert-dismissible fade show" id="emptyFieldsAlert" role="alert">
        <strong>¡Recuerde!</strong> Todos los campos deben estar llenos.
        <!-- Usa 'button' en lugar de 'submit' para el botón de cierre -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

        <form id="form2" action="guardar2.php" method="post">
            <!-- ID del Estudiante -->
            <div class="mb-3">
                <label for="id_estudiante" class="form-label">6. ID del Estudiante</label>
                <input type="tel" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" class="form-control" id="id_estudiante" name="id_estudiante" required>
            </div>

            <!-- Campos de la primera fila -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="cedula_representante" class="form-label">7. Cédula del Representante</label>
                    <input type="tel" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" class="form-control" id="cedula_representante" name="cedula_representante" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="nombre_representante" class="form-label">8. Nombre del Representante</label>
                    <input type="text" class="form-control" id="nombre_representante" name="nombre_representante" required>
                </div>
            </div>

            <!-- Campos de la segunda fila -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="lugar_trabajo_representante" class="form-label">9. Lugar de Trabajo del Representante</label>
                    <input type="text" class="form-control" id="lugar_trabajo_representante" name="lugar_trabajo_representante" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="direccion_domicilio_representante" class="form-label">10. Dirección de Domicilio del Representante</label>
                    <input type="text" class="form-control" id="direccion_domicilio_representante" name="direccion_domicilio_representante" required>
                </div>
            </div>

            <!-- Campos de la tercera fila -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="celular_representante" class="form-label">11. Celular del Representante</label>
                    <input type="tel" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" class="form-control" id="celular_representante" name="celular_representante" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="nombre_papa" class="form-label">12. Nombre del Papá</label>
                    <input type="text" class="form-control" id="nombre_papa" name="nombre_papa" required>
                </div>
            </div>

            <!-- Campos de la cuarta fila -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="cedula_papa" class="form-label">13. Cédula del Papá</label>
                    <input type="tel" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" class="form-control" id="cedula_papa" name="cedula_papa" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lugar_trabajo_papa" class="form-label">14. Lugar de Trabajo del Papá</label>
                    <input type="text" class="form-control" id="lugar_trabajo_papa" name="lugar_trabajo_papa" required>
                </div>
            </div>

            <!-- Campos de la quinta fila -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="direccion_domicilio_papa" class="form-label">15. Dirección de Domicilio del Papá</label>
                    <input type="text" class="form-control" id="direccion_domicilio_papa" name="direccion_domicilio_papa" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="celular_papa" class="form-label">16. Celular del Papá</label>
                    <input type="tel" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" class="form-control" id="celular_papa" name="celular_papa" required>
                </div>
            </div>

            <!-- Campos de la sexta fila -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="nombre_mama" class="form-label">17. Nombre de la Mamá</label>
                    <input type="text" class="form-control" id="nombre_mama" name="nombre_mama" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="cedula_mama" class="form-label">18. Cédula de la Mamá</label>
                    <input type="tel" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" class="form-control" id="cedula_mama" name="cedula_mama" required>
                </div>
            </div>

            <!-- Campos de la séptima fila -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="lugar_trabajo_mama" class="form-label">19. Lugar de Trabajo de la Mamá</label>
                    <input type="text" class="form-control" id="lugar_trabajo_mama" name="lugar_trabajo_mama" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="direccion_domicilio_mama" class="form-label">20. Dirección de Domicilio de la Mamá</label>
                    <input type="text" class="form-control" id="direccion_domicilio_mama" name="direccion_domicilio_mama" required>
                </div>
            </div>

            <!-- Campos de la octava fila -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="celular_mama" class="form-label">21. Celular de la Mamá</label>
                    <input type="tel" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" class="form-control" id="celular_mama" name="celular_mama" required>
                </div>
            </div>

            <!-- Fecha de inscripción -->
            <div class="mb-3">
                <label for="fecha_inscripcion" class="form-label">22. Fecha de Inscripción</label>
                <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" required>
            </div>

            <!-- Agrega más campos según sea necesario -->

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <!-- Script de validación y Bootstrap -->
    <script src="formulario2.js"></script> <!-- Ajusta la ruta según tu estructura de archivos -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
