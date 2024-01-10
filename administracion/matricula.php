<?php
session_start();
include_once "../layout/plantilla.php";
include_once "../administracion/menu.php";
include_once '../model/conexion.php';


if (!isset($_SESSION['id']) || empty($_SESSION['nombre']) || empty($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}


?>

<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        margin-top: 20px;
    }
</style>
<!----------------Final del menu------------------->
<main>

    <div class="container">
        <form id="formularioFamilia" action="../controller/procesar_estudiante.php" method="post" enctype="multipart/form-data">
            <h2 class="mb-4">Formulario Estudiantil</h2>

            <!-- Datos Estudiante -->
            <h3>Datos del Estudiante</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cedula_estudiante">1. Cédula del Estudiante</label>
                        <input type="text" class="form-control" id="cedula_estudiante" name="cedula_estudiante"
                            pattern="[0-9]*" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos_estudiante">2. Apellidos del Estudiante</label>
                        <input type="text" class="form-control" id="apellidos_estudiante" name="apellidos_estudiante"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nombres_estudiante">3. Nombres del Estudiante</label>
                        <input type="text" class="form-control" id="nombres_estudiante" name="nombres_estudiante"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="lugar_nacimiento_estudiante">4. Lugar de Nacimiento del Estudiante</label>
                        <input type="text" class="form-control" id="lugar_nacimiento_estudiante"
                            name="lugar_nacimiento_estudiante" required>
                    </div>
                    <div class="form-group">
                        <label for="foto_estudiante">5. Foto del Estudiante</label>
                        <input type="file" class="form-control" id="foto_estudiante" name="foto_estudiante">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="residencia_estudiante">6. Residencia del Estudiante (Ciudad)</label>
                        <input type="text" class="form-control" id="residencia_estudiante" name="residencia_estudiante"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="direccion_estudiante">7. Dirección del Estudiante</label>
                        <input type="text" class="form-control" id="direccion_estudiante" name="direccion_estudiante"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="sector_estudiante">8. Sector donde vive </label>
                        <input type="text" class="form-control" id="sector_estudiante" name="sector_estudiante"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento_estudiante">9. Fecha de Nacimiento del Estudiante</label>
                        <input type="date" class="form-control" id="fecha_nacimiento_estudiante"
                            name="fecha_nacimiento_estudiante" required>
                    </div>

                </div>
            </div>

            <!-- Datos Papá -->
            <h3>Datos del Papá</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cedula_papa">10. Cédula del Papá</label>
                        <input type="text" class="form-control" id="cedula_papa" name="cedula_papa" pattern="[0-9]*"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos_papa">11. Apellidos del Papá</label>
                        <input type="text" class="form-control" id="apellidos_papa" name="apellidos_papa" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres_papa">12. Nombres del Papá</label>
                        <input type="text" class="form-control" id="nombres_papa" name="nombres_papa" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion_papa">13. Dirección del Papá</label>
                        <input type="text" class="form-control" id="direccion_papa" name="direccion_papa" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ocupacion_papa">14. Ocupación del Papá</label>
                        <input type="text" class="form-control" id="ocupacion_papa" name="ocupacion_papa" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono_papa">15. Teléfono/Celular del Papá</label>
                        <input type="text" class="form-control" id="telefono_papa" name="telefono_papa" pattern="[0-9]*"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="correo_papa">16. Correo del Papá</label>
                        <input type="email" class="form-control" id="correo_papa" name="correo_papa" required>
                    </div>
                    <div class="form-group">
                        <label for="foto_papa">17. Foto del Papá</label>
                        <input type="file" class="form-control" id="foto_papa" name="foto_papa">
                    </div>
                </div>
            </div>


            <!-- Datos Mamá -->
            <h3>Datos de la Mamá</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cedula_mama">18. Cédula de la Mamá</label>
                        <input type="text" class="form-control" id="cedula_mama" name="cedula_mama" pattern="[0-9]*"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos_mama">19. Apellidos de la Mamá</label>
                        <input type="text" class="form-control" id="apellidos_mama" name="apellidos_mama" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres_mama">20. Nombres de la Mamá</label>
                        <input type="text" class="form-control" id="nombres_mama" name="nombres_mama" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion_mama">21. Dirección de la Mamá</label>
                        <input type="text" class="form-control" id="direccion_mama" name="direccion_mama" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ocupacion_mama">22. Ocupación de la Mamá</label>
                        <input type="text" class="form-control" id="ocupacion_mama" name="ocupacion_mama" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono_mama">23. Teléfono/Celular de la Mamá</label>
                        <input type="text" class="form-control" id="telefono_mama" name="telefono_mama" pattern="[0-9]*"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="correo_mama">24. Correo de la Mamá</label>
                        <input type="email" class="form-control" id="correo_mama" name="correo_mama" required>
                    </div>
                    <div class="form-group">
                        <label for="foto_mama">25. Foto de la Mamá</label>
                        <input type="file" class="form-control" id="foto_mama" name="foto_mama">
                    </div>
                </div>
            </div>


            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <!-- Alertas de éxito o error -->
        <div id="alerta" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <!-- Aquí se mostrarán las alertas -->
        </div>



</main>
<?php
include_once "./header.php";
?>
<script src="../js/formulario2.js"></script> <!-- Ajusta la ruta según tu estructura de archivos -->

<!-----------------------------Fin del main------------------------------->

<script src="../js/tema.js"></script>
<script src="../js/activo.js"></script>