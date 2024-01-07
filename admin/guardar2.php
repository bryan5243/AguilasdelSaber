<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_estudiante = isset($_POST['id_estudiante']) ? $_POST['id_estudiante'] : null;
    $cedula_representante = isset($_POST['cedula_representante']) ? $_POST['cedula_representante'] : null;
    $nombre_representante = isset($_POST['nombre_representante']) ? $_POST['nombre_representante'] : null;
    $lugar_trabajo_representante = isset($_POST['lugar_trabajo_representante']) ? $_POST['lugar_trabajo_representante'] : null;
    $direccion_domicilio_representante = isset($_POST['direccion_domicilio_representante']) ? $_POST['direccion_domicilio_representante'] : null;
    $celular_representante = isset($_POST['celular_representante']) ? $_POST['celular_representante'] : null;
    $nombre_papa = isset($_POST['nombre_papa']) ? $_POST['nombre_papa'] : null;
    $cedula_papa = isset($_POST['cedula_papa']) ? $_POST['cedula_papa'] : null;
    $lugar_trabajo_papa = isset($_POST['lugar_trabajo_papa']) ? $_POST['lugar_trabajo_papa'] : null;
    $direccion_domicilio_papa = isset($_POST['direccion_domicilio_papa']) ? $_POST['direccion_domicilio_papa'] : null;
    $celular_papa = isset($_POST['celular_papa']) ? $_POST['celular_papa'] : null;
    $nombre_mama = isset($_POST['nombre_mama']) ? $_POST['nombre_mama'] : null;
    $cedula_mama = isset($_POST['cedula_mama']) ? $_POST['cedula_mama'] : null;
    $lugar_trabajo_mama = isset($_POST['lugar_trabajo_mama']) ? $_POST['lugar_trabajo_mama'] : null;
    $direccion_domicilio_mama = isset($_POST['direccion_domicilio_mama']) ? $_POST['direccion_domicilio_mama'] : null;
    $celular_mama = isset($_POST['celular_mama']) ? $_POST['celular_mama'] : null;
    $fecha_inscripcion = isset($_POST['fecha_inscripcion']) ? $_POST['fecha_inscripcion'] : null;

    if ($cedula_representante !== null) {
        $query = "INSERT INTO inscripcion (
            id_estudiante,
            cedula_representante,
            nombre_representante,
            lugar_trabajo_representante,
            direccion_domicilio_representante,
            celular_representante,
            nombre_papa,
            cedula_papa,
            lugar_trabajo_papa,
            direccion_domicilio_papa,
            celular_papa,
            nombre_mama,
            cedula_mama,
            lugar_trabajo_mama,
            direccion_domicilio_mama,
            celular_mama,
            fecha_inscripcion
        ) VALUES (
            :id_estudiante,
            :cedula_representante,
            :nombre_representante,
            :lugar_trabajo_representante,
            :direccion_domicilio_representante,
            :celular_representante,
            :nombre_papa,
            :cedula_papa,
            :lugar_trabajo_papa,
            :direccion_domicilio_papa,
            :celular_papa,
            :nombre_mama,
            :cedula_mama,
            :lugar_trabajo_mama,
            :direccion_domicilio_mama,
            :celular_mama,
            :fecha_inscripcion
        )";

        $statement = $pdo->prepare($query);

        $statement->bindParam(':id_estudiante', $id_estudiante);
        $statement->bindParam(':cedula_representante', $cedula_representante);
        $statement->bindParam(':nombre_representante', $nombre_representante);
        $statement->bindParam(':lugar_trabajo_representante', $lugar_trabajo_representante);
        $statement->bindParam(':direccion_domicilio_representante', $direccion_domicilio_representante);
        $statement->bindParam(':celular_representante', $celular_representante);
        $statement->bindParam(':nombre_papa', $nombre_papa);
        $statement->bindParam(':cedula_papa', $cedula_papa);
        $statement->bindParam(':lugar_trabajo_papa', $lugar_trabajo_papa);
        $statement->bindParam(':direccion_domicilio_papa', $direccion_domicilio_papa);
        $statement->bindParam(':celular_papa', $celular_papa);
        $statement->bindParam(':nombre_mama', $nombre_mama);
        $statement->bindParam(':cedula_mama', $cedula_mama);
        $statement->bindParam(':lugar_trabajo_mama', $lugar_trabajo_mama);
        $statement->bindParam(':direccion_domicilio_mama', $direccion_domicilio_mama);
        $statement->bindParam(':celular_mama', $celular_mama);
        $statement->bindParam(':fecha_inscripcion', $fecha_inscripcion);

        if ($statement->execute()) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar el formulario";
        }
    } else {
        echo "La cédula del representante no puede estar vacía";
    }
} else {
    echo "Método no permitido";
}
?>
