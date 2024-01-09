<?php
session_start();
use PgSql\Connection\Connection;

include_once "../layout/plantilla.php";
include_once "../administracion/menu.php";
include_once "../model/conexion.php";

if (!isset($_SESSION['id']) || empty($_SESSION['nombre']) || empty($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}

?>

<style>
    :root {
        --color-dark-variant: #222425;

    }

    .dark-theme-variables {

        --color-dark-variant: #a3bdcc;

    }


    select,
    p,
    label,
    input,
    li,
    ul,
    button,
    i,
    td,
    th,
    ul,
    nav,
    #example_previous,
    #example_paginate,
    #example_info,
    #example_next {
        color: var(--color-dark-variant);
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: none;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn i {
        margin-right: 5px;
    }

    .hand-cursor {
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="../src/datables/DataTables-1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../src/datables//Responsive-2.4.1/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
    integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-..." crossorigin="anonymous">
<main>

    <div class="date" style="margin-bottom: 50px;">
        <input type="date" id="datePicker" readonly>
    </div>

    <table id="example" class="display compact nowrap" style="width:100%;min-width: 480px">
        <thead>
            <tr>

                <th>N°</th>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Grado</th>
                <th>Representante</th>
                <th>Dir.domicilio </th>
                <th>Celular Representante</th>
                <th>Opciones</th>


            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>

</main>
<?php
include_once "./header.php";
?>
< !-----------------------------Fin del main------------------------------->
    <script src="../js/tema.js"></script>
    <script src="../js/activo.js"></script>

    <script src="../src/datables/jquery-3.5.1.js"></script>

    <script src="../src/datables/DataTables-1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="../src/datables/Responsive-2.4.1/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                responsive: true,
                autoWhidth: true,
                language: {
                    url: '../src/datables/español.json',
                },
            });
        });
    </script>