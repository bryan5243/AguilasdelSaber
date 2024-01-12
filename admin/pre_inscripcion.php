<?php
session_start();
use PgSql\Connection\Connection;

?>
<title>Inscripción</title>
    <link rel="icon" href="../img/logo23.ico" type="image/x-icon">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/pre_inscripcion.css">
<style>
    .card {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        width: 800px; /* Puedes ajustar el ancho según tus necesidades */
        margin: 0 auto;
    }

    .logo-container {
        margin-right: 20px; /* Espacio entre el logo y la información de la escuela */

        text-align: left;
    }

    .logo {
        width: 125px;
        height: 125px;
    }

    .school-container {
        text-align: center;
    }

    .school-info {
        background-color: #ff0000;
        padding: 0px;
        border-radius: 10px;
        margin-top: 0px;
    }

    .school-info h2 {
        color: black; /* Cambiamos el color del texto a negro */
        margin-bottom: 0; /* Ajustamos el margen inferior para reducir el espacio debajo del texto */
    }

    h2 {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .small-text {
        font-size: 12px;
    }
</style>

<main class="container mt-5">
    <form action="" method="post" id="preInscripcionForm">
    <div class="card">
        <div class="logo-container">
            <img src="../img/logo.jpeg" alt="Avatar Logo" class="logo">
        </div>

        <div class="school-container">
            <h2>ESCUELA DE EDUCACIÓN BÁSICA PARTICULAR</h2>
            <div class="school-info">
                <h2>“LAS ÁGUILAS DEL SABER”</h2>
            </div>
            <p class="small-text">RESOLUCIÓN: DEO-DPE: 109-2009</p>
            <p class="small-text">AMIE: 07H01462</p>
            <p class="small-text">EL CAMBIO-MACHALA-ECUADOR</p>
        </div>
    </div>

    <h2>Estudiante</h2>
    <div class="row">
    <div class="col-md-6">
        <!-- Columna izquierda -->
        <div class="mb-3">
            <label for="cedula" class="form-label">1. Cedula:</label>
            <input type="text" class="form-control" name="cedula" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">2. Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" required>
        </div>

        <div class="mb-3">
            <label for="nombres" class="form-label">3. Nombres:</label>
            <input type="text" class="form-control" name="nombres" required>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Columna derecha -->
        <div class="mb-3">
            <label for="discapacidad" class="form-label">4. Posee algún tipo de discapacidad:</label>
            <select class="form-select" name="discapacidad" required>
                <option value="si">Si</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tipoDiscapacidad" class="form-label">5. Tipo de discapacidad:</label>
            <input type="text" class="form-control" name="tipoDiscapacidad">
        </div>

        <div class="mb-3">
            <label for="porcentajeDiscapacidad" class="form-label">6. Porcentaje:</label>
            <input type="text" class="form-control" name="porcentajeDiscapacidad">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Columna para Padre -->
        <h2>Padre</h2>
        <div class="mb-3">
            <label for="cedulaPadre" class="form-label">7. Cedula:</label>
            <input type="text" class="form-control" name="cedulaPadre" required>
        </div>

        <div class="mb-3">
            <label for="apellidosNombresPadre" class="form-label">8. Apellidos y Nombres:</label>
            <input type="text" class="form-control" name="apellidosNombresPadre" required>
        </div>

        <div class="mb-3">
            <label for="telefonoPadre" class="form-label">9. Teléfono Celular:</label>
            <input type="text" class="form-control" name="telefonoPadre">
        </div>
    </div>
    <div class="col-md-6">
        <!-- Columna para Madre -->
        <h2>Madre:</h2>
        <div class="mb-3">
            <label for="cedulaMadre" class="form-label">10. Cedula:</label>
            <input type="text" class="form-control" name="cedulaMadre" required>
        </div>

        <div class="mb-3">
            <label for="apellidosNombresMadre" class="form-label">11. Apellidos y Nombres:</label>
            <input type="text" class="form-control" name="apellidosNombresMadre" required>
        </div>

        <div class="mb-3">
            <label for="telefonoMadre" class="form-label">12. Teléfono Celular:</label>
            <input type="text" class="form-control" name="telefonoMadre">
        </div>
    </div>
</div>


        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/pre_inscripcion.js"></script>
