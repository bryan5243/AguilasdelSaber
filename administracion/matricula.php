<?php
if (!isset($_SESSION['id']) || empty($_SESSION['nombre']) || empty($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}
include_once '../model/conexion.php';
?>




<!----------------Final del menu-----------------
    -->
<main>
    <center>
        <h2><b>DATOS DEL ESTUDIANTE</b></h2>
    </center>



    <div class="form-container" style="display: flex; flex-wrap: wrap;">

        <div class="form">
            <label for="foto">
                <h3>Foto del estudiante:</h3><br>
            </label>
            <input type="file" name="imagen" id="fileInput" class="custom-file-input" onchange="validarImagen(event)"
                required>
            <label for="fileInput" class="custom-file-label">Seleccionar archivo</label>
            <br>
            <div id="mensaje-error" style="display: none; color: red;"></div>
            <br><br>
            <img id="imagen-preview" class="preview" style="display: none; width: 148px; height: 184px;">
            <span class="input-border"></span>
        </div>
    </div>

    <div class="form-container" style="display: flex; flex-wrap: wrap;">

        <div class="form">

            <label for="cedula_estudiante">
                <p>1. Cédula del Estudiante</p>
            </label>
            <input class="input" type=" text" id="cedula" id="cedula_estudiante" name="cedula_estudiante"
                pattern="[0-9]*" required>
            <span class="input-border"></span>

        </div>
        <div class="form">

            <label for="apellidos_estudiante">
                <p>2. Apellidos del Estudiante</p>
            </label>
            <input class="input" type=" text" id="apellidos_estudiante" name="apellidos_estudiante" required>
            <span class="input-border"></span>

        </div>
        <div class="form">
            <label for="nombres_estudiante">
                <p>3. Nombres del Estudiante </p>
            </label>

            <input type="text" class="input" id="nombres_estudiante" name="nombres_estudiante" required>
            <span class="input-border"></span>
        </div>
        <div class="form">

            <label for="lugar_nacimiento_estudiante">
                <p>4. Lugar de Nacimiento del Estudiante</p>
            </label>
            <input type="text" class="input" id="lugar_nacimiento_estudiante" name="lugar_nacimiento_estudiante"
                required>
            <span class="input-border"></span>
        </div>

    </div>

    <div class="form-container" style="display: flex; flex-wrap: wrap;">


    </div>

    <!-- <div class="container">
            <form id="formularioFamilia" action="../controller/procesar_estudiante.php" method="post"
                enctype="multipart/form-data">
                <h2 class="mb-4">Formulario Estudiantil</h2>

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
                            <input type="text" class="form-control" id="apellidos_estudiante"
                                name="apellidos_estudiante" required>
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
                            <input type="text" class="form-control" id="residencia_estudiante"
                                name="residencia_estudiante" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion_estudiante">7. Dirección del Estudiante</label>
                            <input type="text" class="form-control" id="direccion_estudiante"
                                name="direccion_estudiante" required>
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
                            <input type="text" class="form-control" id="telefono_papa" name="telefono_papa"
                                pattern="[0-9]*" required>
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
                            <input type="text" class="form-control" id="telefono_mama" name="telefono_mama"
                                pattern="[0-9]*" required>
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


                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

            <div id="alerta" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            </div>
    </div> -->


</main>