<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    include_once 'model/conexion.php';

    // Obtener datos del formulario
    $descripcion1 = isset($_POST["descripcion1"]) ? $_POST["descripcion1"] : "";
    $horarios = isset($_POST["horarios"]) ? $_POST["horarios"] : "";
    $horas = isset($_POST["horas"]) ? $_POST["horas"] : "";

    // Modificar datos en la base de datos
    $update_query = "UPDATE contacto SET 
        descripcion1=?, horarios=?, horas=?";
    
    $stmt = $pdo->prepare($update_query);
    $stmt->bindParam(1, $descripcion1);
    $stmt->bindParam(2, $horarios);
    $stmt->bindParam(3, $horas);

    $success = $stmt->execute();
    $stmt->closeCursor();

    // Mostrar alerta después de realizar cambios
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    if ($success) {
        echo '<script>
                Swal.fire("Cambios guardados!", "Los cambios se han guardado correctamente.", "success");
            </script>';
    } else {
        echo '<script>
                Swal.fire("Error", "Hubo un error al guardar los cambios.", "error");
            </script>';
    }
}
?>



<main>

<div class="container"> 

<div class="form-container" style=" margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between;" >

    <style>
    .container {
    max-width: 90%; /* Ajusta al 90% del ancho de la ventana para hacer el contenedor un poco más pequeño */
    margin: 0 auto;
    padding: 20px;
}

.form-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Estilo del formulario destacado */
.formulario-destacado {
    background: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada */
    overflow-y: auto;
    max-height: 700px;
}

/* Estilos de los campos y etiquetas del formulario */
.formulario-destacado label {
    display: block;
    margin-bottom: 0.5em;
    color: #333333;
    font-weight: 600;
}

.formulario-destacado input[type="text"],
.formulario-destacado textarea {
    width: calc(100% - 1.5em); /* Resta el padding para mantener el diseño */
    padding: 0.75em;
    border: 1px solid #dcdcdc;
    border-radius: 4px;
    margin-bottom: 1em;
}

.formulario-destacado textarea {
    min-height: 120px;
    resize: vertical;
}

/* Estilo para los botones */
.formulario-destacado input[type="submit"] {
    width: 100%; /* Hace que el botón se extienda a lo ancho del formulario */
    padding: 1em; /* Aumenta el padding para un botón más grande */
    background-color: #007bff; /* Color más claro que el anterior */
    color: #ffffff;
    border: none;
    border-radius: 30px; /* Bordes más redondeados */
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.2); /* Sombra suave para el botón */
    margin-top: 1em; /* Asegura un espacio por encima del botón si es necesario */
}

.formulario-destacado input[type="submit"]:hover {
    background-color: #0069d9; /* Color ligeramente más oscuro para el hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Sombra más pronunciada en hover */
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 20px 10px; /* Menos padding en dispositivos móviles */
    }

    .formulario-destacado {
        max-height: none; /* No limitar la altura en dispositivos móviles */
        padding: 20px; /* Menos padding en dispositivos móviles */
    }

    .formulario-destacado input[type="text"],
    .formulario-destacado textarea {
        width: calc(100% - 40px); /* Ajuste para el padding en dispositivos móviles */
    }
}


</style>



<?php
include_once 'model/conexion.php';

// Obtener datos de la base de datos
$query = "SELECT * FROM contacto";
$result = $pdo->query($query);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="formulario-destacado">';
    echo '<form method="post" action="" id="form-' . $row['Id'] . '" enctype="multipart/form-data">';

    $campos = array(
        "descripcion1", "horarios", "horas"
    );

    foreach ($campos as $campo) {
        echo '<div class="campo">';
        echo '<label for="' . $campo . '">' . ucfirst($campo) . ':</label>';

        // Verificar si la clave existe en la fila actual antes de acceder a ella
        $valorCampo = isset($row[$campo]) ? $row[$campo] : '';

        // Usar textarea para los campos que deben ser grandes
        if (strpos($campo, 'descripcion') !== false) {
            echo '<textarea name="' . $campo . '" required>' . $valorCampo . '</textarea>';
        } else {
            echo '<input type="text" name="' . $campo . '" value="' . $valorCampo . '" required>';
        }

        echo '</div>';
    }

    echo '<input type="submit" name="submitForm" value="Guardar Cambios">';
    echo '</form>';
    echo '</div>';
}

// Cerrar la conexión
$pdo = null;
?>




    </div>
</div>
    

</main>