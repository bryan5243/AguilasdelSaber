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

    @media screen and (max-width:768px) {

        aside {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            /* Ancho del menú lateral */
            overflow-y: auto;
        }
    }


    #menu-btn {
        cursor: pointer;
    }

    #close-btn {
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="../src/datables//Responsive-2.4.1/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
    integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-..." crossorigin="anonymous">


<!-- //link de botones  -->
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
                <th>fecha de nacimiento </th>
                <th>Grado</th>
                <th>Representante</th>
                <th>Dir.domicilio </th>
                <th>Celular Representante</th>
                <th>Opciones</th>


            </tr>
        </thead>
        <tbody>
            <?php
            $conn = conectarBaseDeDatos();
            $sql = "SELECT 
            e.id,
            e.cedula,
            e.nombres,
            e.apellidos,
            e.fecha_nacimiento,
            g.grado,
            r.apellidos_nombres,
            r.direccion,
            r.telefono
        FROM estudiante e
        JOIN grado g ON e.id = g.id_estudiante
        JOIN representante r ON e.ID = r.ID_estudiante;";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error al obtener los datos: " . $conn->errorInfo()[2];
                exit;
            }
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['cedula'] . '</td>
                <td>' . $row['nombres'] . '</td>
                <td>' . $row['apellidos'] . '</td>
                <td>' . $row['fecha_nacimiento'] . '</td>
                <td>' . $row['grado'] . '</td>
                <td>' . $row['apellidos_nombres'] . '</td>

                <td>' . $row['direccion'] . '</td>
                <td>' . $row['telefono'] . '</td>
                <td>';
                echo '<div style="display: flex; align-items: center;" >
                <form action="" method="post" id="actForm">
                    <input type="hidden" name="id" value="' . $row['id'] . '">
                    <button id="actualizar" class="hand-cursor" type="submit" value="' . $row['id'] . '" style="background-color: var(--c);">
                    <i class="fas fa-pen-to-square" style="font-size: 28px; color: #167bae;"></i>
                    </button>
                </form>';
                echo '<form id="form_' . $row['id'] . '" action="../controller/reporte_estudiantes.php" method="post" target="_blank">
                <button class="hand-cursor" type="submit" name="generar_reporte" value="' . $row['id'] . '" style="background-color: var(--c);">
                    <i class="fas fa-print" style="font-size: 28px; color: #167bae; margin-left:10px;"></i>
                </button>
            </form>
            <form action="" method="post" id="eliminarForm">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                <button class="hand-cursor" type="button" onclick="alerta_eliminar(' . $row['id'] . ')" style="background-color: var(--c);">
                    <i class="fas fa-trash-alt" style="font-size: 28px; color: #167bae; margin-left:10px;"></i>
                </button>
            </form>
        </div>
                </td>';
            }
            ?>

        </tbody>
    </table>

</main>
<?php
include_once "./header.php";
?>

<script src="../js/tema.js"></script>
<script src="../js/activo.js"></script>
<script src="../js/menu.js"></script>






<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>






<script src="../src/datables/Responsive-2.4.1/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            autoWidth: true,
            language: {
                url: '../src/datables/español.json',
            },
            buttons: [

                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },

                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                }
            ]
        });
    });
</script>
<script>
    // JavaScript to handle button click and submit the form
    document.addEventListener('DOMContentLoaded', function () {
        const reportButtons = document.querySelectorAll('button[name="generar_reporte"]');
        reportButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Evita la acción de envío por defecto del botón

                const estudianteId = this.value;
                const form = document.getElementById('form_' + estudianteId); // Obtiene el formulario correspondiente por ID
                const input = document.createElement('input');
                input.setAttribute('type', 'hidden');
                input.setAttribute('name', 'generar_reporte');
                input.setAttribute('value', estudianteId);
                form.appendChild(input);
                form.submit();
            });
        });
    });
</script>