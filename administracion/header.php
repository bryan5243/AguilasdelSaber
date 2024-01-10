<?php

if (!isset($_SESSION['id']) || empty($_SESSION['nombre']) || empty($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}

?>
<head>
    <div class="right">
        <div class="top">
            <button id="menu-btn">
                <span class="material-icons-sharp">menu</span>
            </button>
            <div class="theme-toggler">
                <span class="material-icons-sharp active">light_mode</span>
                <span class="material-icons-sharp">dark_mode</span>
            </div>
            <div class="profile">
                <div class="info">
                    <p>Hola,<b>
                            <?php echo $_SESSION["nombre"]; ?>
                        </b></p>
                    <small class="text-muted">
                        <?php echo $_SESSION["rol"]; ?>
                    </small>
                </div>
                <div class="profile-photo">
                    <img src="../img/usuario.png" alt="">


                    //colocar imagen de usuario de la base de datos

                    <!-- // Conexión a la base de datos
                    include_once '../Model/conexionn.php';
                    $conn = conectarBaseDeDatos();

                    $query = "SELECT imagen FROM usuarios WHERE id = 5";
                    $stmt = $conn->query($query);

                    // Verificar si la consulta fue exitosa
                    if ($stmt) {
                        // Obtener los datos de la imagen en formato bytea
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $imagen_bytea = $row['imagen'];

                        // Crear un archivo temporal para almacenar la imagen
                        $tempFile = tempnam(sys_get_temp_dir(), 'image');
                        file_put_contents($tempFile, $imagen_bytea);

                        // Obtener el tipo de contenido de la imagen
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $contentType = finfo_file($finfo, $tempFile);

                        // Mostrar la imagen en la etiqueta img
                        echo '<img src="data:' . $contentType . ';base64,' . base64_encode(file_get_contents($tempFile)) . '" alt="Imagen">';

                        // Eliminar el archivo temporal
                        unlink($tempFile);
                    } else {
                        echo "Error al obtener la imagen de la base de datos";
                    } -->





                </div>
            </div>
        </div>

    </div>
</head>
