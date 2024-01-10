<?php
include 'conexion.php';
session_start(); // Inicia la sesión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificamos si se recibieron los datos esperados y la variable de sesión está presente
    if (isset($_SESSION['id_estudiante'])){ // Obtenemos los datos del formulario
        $idEstudiante = $_SESSION['id_estudiante'];
        $cedula = $_POST['cedula'];
        $apellidosNombres = $_POST['apellidos_nombres'];
        $direccion = $_POST['direccion'];
        $ocupacion = $_POST['ocupacion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $foto = isset($_FILES['foto']) ? $_FILES['foto']['name'] : '';
        try {
            // Insertamos los datos en la tabla Representante
            $stmt = $pdo->prepare('INSERT INTO Representante (id_estudiante, cedula, apellidos_nombres, direccion, ocupacion, telefono, correo, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$idEstudiante, $cedula, $apellidosNombres, $direccion, $ocupacion, $telefono, $correo, $foto]);

            echo json_encode(['success' => true, 'message' => 'Datos del representante guardados correctamente.']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Error al procesar los datos del representante: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
