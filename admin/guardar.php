<?php
// Incluye el archivo de conexión correctamente
include 'conexion.php';

// Verifica si se han enviado datos a través del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario si existen
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : null;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
    $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : null;
    $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : null;
    $codigoServicio = isset($_POST['codigoServicio']) ? $_POST['codigoServicio'] : null;

    // TODO: Validaciones adicionales si es necesario

    // Verifica si la cédula no es nula antes de intentar la inserción
    if ($cedula !== null) {
        // Preparar la consulta SQL con marcadores de posición
        $query = "INSERT INTO estudiantes (cedula, apellidos, nombres, fecha_nacimiento, codigo_servicio) 
                  VALUES (:cedula, :apellidos, :nombres, :fechaNacimiento, :codigoServicio)";

        // Preparar la declaración SQL
        $statement = $pdo->prepare($query);

        // Asociar parámetros con los valores obtenidos del formulario
        $statement->bindParam(':cedula', $cedula);
        $statement->bindParam(':apellidos', $apellidos);
        $statement->bindParam(':nombres', $nombres);
        $statement->bindParam(':fechaNacimiento', $fechaNacimiento);
        $statement->bindParam(':codigoServicio', $codigoServicio);

        // Ejecutar la consulta
        try {
            $statement->execute();
            // Redireccionar al formulario con un mensaje de éxito
            header('Location: formulario.php?success=true');
            exit();
        } catch (PDOException $e) {
            echo "Error al insertar datos: " . $e->getMessage();
            exit(); // Si hay un error, termina el script
        }
    } else {
        echo "Error: La cédula no puede ser nula.";
        exit(); // Si hay un error, termina el script
    }
} else {
    echo "Error: Método de solicitud incorrecto.";
    exit(); // Si hay un error, termina el script
}
?>
