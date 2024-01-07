<?php
// Incluye el archivo de conexión correctamente
include 'conexion.php';

// Consulta para obtener datos de ambas tablas
$query = "SELECT 
            e.id AS estudiante_id,
            e.cedula AS estudiante_cedula,
            e.apellidos AS estudiante_apellidos,
            e.nombres AS estudiante_nombres,
            e.fecha_nacimiento AS estudiante_fecha_nacimiento,
            e.codigo_servicio AS estudiante_codigo_servicio,
            i.id AS inscripcion_id,
            i.cedula_representante,
            i.nombre_representante,
            i.lugar_trabajo_representante,
            i.direccion_domicilio_representante,
            i.celular_representante,
            i.nombre_papa,
            i.cedula_papa,
            i.lugar_trabajo_papa,
            i.direccion_domicilio_papa,
            i.celular_papa,
            i.nombre_mama,
            i.cedula_mama,
            i.lugar_trabajo_mama,
            i.direccion_domicilio_mama,
            i.celular_mama,
            i.fecha_inscripcion
          FROM estudiantes e
          LEFT JOIN inscripcion i ON e.id = i.id_estudiante";

$stmt = $pdo->prepare($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .card {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 700px; /* Puedes ajustar el ancho según tus necesidades */
            margin: 0 auto;
        }

        .logo-container {
            margin-right: 20px; /* Espacio entre el logo y la información de la escuela */
            text-align: center;
        }

        .logo {
            width: 140px;
            height: 140px;
        }

        .school-container {
            text-align: center;
        }

        .school-info {
    background-color: #ff0000; /* Cambiado a rojo */
    padding: 0px; /* Ajustado para reducir el espacio entre el borde y el contenido */
    border-radius: 10px; /* Ajustado para hacer los bordes más pequeños */
    margin-top: 0px;
}


        h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .small-text {
            font-size: 12px;
        }
    </style>
</head>
<body>
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

    <h2>Estudiantes Inscritos</h2>
    <table>
        <tr>
            <th>ID Estudiante</th>
            <th>Cédula Estudiante</th>
            <th>Apellidos Estudiante</th>
            <th>Nombres Estudiante</th>
            <th>ID Inscripción</th>
            <th>Cédula Representante</th>
            <th>Nombre Representante</th>
            <th>Celular Representante</th>
            <th>Acciones</th>
        </tr>

        <?php
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                        <td>'.$row['estudiante_id'].'</td>
                        <td>'.$row['estudiante_cedula'].'</td>
                        <td>'.$row['estudiante_apellidos'].'</td>
                        <td>'.$row['estudiante_nombres'].'</td>
                        <td>'.$row['inscripcion_id'].'</td>
                        <td>'.$row['cedula_representante'].'</td>
                        <td>'.$row['nombre_representante'].'</td>
                        <td>'.$row['celular_representante'].'</td>
                        <td><a href="generar_pdf.php?estudiante_id='.$row['estudiante_id'].'">Generar PDF</a></td>
                    </tr>';
            }
        } else {
            echo "Error en la consulta SQL";
        }
        ?>
    </table>
</body>
</html>
