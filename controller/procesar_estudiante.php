<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedulaEstudiante = $_POST['cedula_estudiante'];
    $apellidosEstudiante = $_POST['apellidos_estudiante'];
    $nombresEstudiante = $_POST['nombres_estudiante'];
    $lugarNacimientoEstudiante = $_POST['lugar_nacimiento_estudiante'];
    $residenciaEstudiante = $_POST['residencia_estudiante'];
    $direccionEstudiante = $_POST['direccion_estudiante'];
    $sectorEstudiante = $_POST['sector_estudiante'];
    $fechaNacimientoEstudiante = $_POST['fecha_nacimiento_estudiante'];
    $fotoEstudiante = isset($_FILES['foto_estudiante']) ? $_FILES['foto_estudiante']['name'] : '';

    $cedulaPapa = $_POST['cedula_papa'];
    $apellidosNombresPapa = $_POST['apellidos_papa'];
    $direccionPapa = $_POST['direccion_papa'];
    $ocupacionPapa = $_POST['ocupacion_papa'];
    $telefonoPapa = $_POST['telefono_papa'];
    $correoPapa = $_POST['correo_papa'];
    $fotoPapa = isset($_FILES['foto_papa']) ? $_FILES['foto_papa']['name'] : '';

    $cedulaMama = $_POST['cedula_mama'];
    $apellidosNombresMama = $_POST['apellidos_mama'];
    $direccionMama = $_POST['direccion_mama'];
    $ocupacionMama = $_POST['ocupacion_mama'];
    $telefonoMama = $_POST['telefono_mama'];
    $correoMama = $_POST['correo_mama'];
    $fotoMama = isset($_FILES['foto_mama']) ? $_FILES['foto_mama']['name'] : '';

    try {
        $pdo->beginTransaction();

        // Insertar datos del estudiante
        $stmtEstudiante = $pdo->prepare('INSERT INTO Estudiante (cedula, apellidos, nombres, lugar_nacimiento, residencia, direccion, sector, fecha_nacimiento, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmtEstudiante->execute([$cedulaEstudiante, $apellidosEstudiante, $nombresEstudiante, $lugarNacimientoEstudiante, $residenciaEstudiante, $direccionEstudiante, $sectorEstudiante, $fechaNacimientoEstudiante, $fotoEstudiante]);
        
        $idEstudiante = $pdo->lastInsertId();
        $_SESSION['id_estudiante'] = $idEstudiante;

        // In$_SESSION['id_estudiante'] = $pdo->lastInsertId();sertar datos del papá
        $stmtPapa = $pdo->prepare('INSERT INTO Papa (id_estudiante, cedula, apellidos_nombres, direccion, ocupacion, telefono, correo, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmtPapa->execute([$idEstudiante, $cedulaPapa, $apellidosNombresPapa, $direccionPapa, $ocupacionPapa, $telefonoPapa, $correoPapa, $fotoPapa]);

        // Insertar datos de la mamá
        $stmtMama = $pdo->prepare('INSERT INTO Mama (id_estudiante, cedula, apellidos_nombres, direccion, ocupacion, telefono, correo, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmtMama->execute([$idEstudiante, $cedulaMama, $apellidosNombresMama, $direccionMama, $ocupacionMama, $telefonoMama, $correoMama, $fotoMama]);
        
        $pdo->commit();

        // Agregar la URL de redirección a la respuesta JSON
        header("Location: representante.php");
        
    } catch (Exception $e) {
        $pdo->rollBack();

        echo json_encode(['success' => false, 'message' => 'Error al procesar los datos: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
