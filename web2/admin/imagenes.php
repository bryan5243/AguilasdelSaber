<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include_once 'model/conexion.php';

// Obtener las rutas de las imágenes de la base de datos
$cantidad_imagenes = 19;
$query = "SELECT img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, img11, img12, img13, img14, img15, img16, img17, img18, img19 FROM imagenes";
$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $updateQueryParts = [];
    for ($i = 1; $i <= $cantidad_imagenes; $i++) {
        $updateQueryParts[] = "img$i = ?";
    }
    $updateQuery = "UPDATE imagenes SET " . implode(', ', $updateQueryParts);
    $updateStatement = $pdo->prepare($updateQuery);

    $imagePaths = [];
    $changes = false;

    for ($i = 1; $i <= $cantidad_imagenes; $i++) {
        $nombre_campo = "imagen$i";

        if (isset($_FILES[$nombre_campo]) && $_FILES[$nombre_campo]['error'] === UPLOAD_ERR_OK) {
            $archivo = $_FILES[$nombre_campo];
            $nombreArchivo = basename($archivo['name']);
            $rutaTemporal = $archivo['tmp_name'];
            $rutaDestino = "../web2/img/" . $nombreArchivo;

            if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                $imagePaths[] = $rutaDestino;
                $changes = true;
            } else {
                // Manejar error al mover el archivo
                $imagePaths[] = $result["img$i"]; // Mantener la ruta existente si falla la carga
            }
        } else {
            $imagePaths[] = $result["img$i"]; // Mantener la ruta existente si no hay carga
        }
    }

    if ($changes && $updateStatement->execute($imagePaths)) {
            echo '<script>
            Swal.fire({
                title: "Cambios guardados",
                text: "Las imágenes se han actualizado correctamente.",
                icon: "success"
            }).then(function() {
                window.location.href = "admin8.php";
            });
        </script>';
            exit();
    } else {
        // Si no hay cambios o hay un error, mostrar una alerta
        echo '<script>
                Swal.fire({
                    title: "Sin cambios o error",
                    text: "No se seleccionó ninguna imagen nueva o hubo un error al actualizar las imágenes.",
                    icon: "info"
                });
              </script>';
    }
    exit(); // Evitar que el formulario HTML se renderice después de procesar la solicitud
}
?>


<main>
    <div class="container"> 
        
    

    <div style="margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: flex-start; padding-top: 20px;">

        <style>
            /* Estilos de los formularios destacados */
            .formulario-destacado {
                flex: 1; /* Ajuste para dar un poco más de espacio entre las cajas */
                background-color: white;
                border: 1px solid #ccc;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                box-sizing: border-box;
                text-align: center; /* Centrar el contenido */
                overflow-y: auto; /* Habilitar la barra de desplazamiento vertical */
                max-height: 750px; /* Altura máxima antes de que aparezca la barra de desplazamiento */
            }

            /* Estilos de los formularios destacados 2 */
            .formulario-destacado2 {
                display: inline-block; /* Mostrar en línea y permitir que se ubiquen horizontalmente */
                width: 400px; /* Ancho fijo para el formulario-destacado2 */
                margin-right: 10px; /* Ajuste de margen entre los formularios destacados 2 */
                border: 2px solid black; /* Borde negro */
                padding: 10px; /* Ajuste de margen entre los formularios destacados 2 */
            }

            /* Estilos de las imágenes dentro de los formularios destacados 2 */
            .formulario-destacado2 img {
                max-width: 390px;
                height: 300px; /* Tamaño fijo para la vista previa */
                object-fit: fill; /* Hace que la imagen llene la vista previa sin distorsionarse */
                border-radius: 5px; /* Esquinas redondeadas */
                margin-bottom: 20px; /* Separación entre la vista previa y los botones */
            }

            /* Estilos del botón Guardar */
            .guardar-archivo {
                background-color: #3498db;
                color: white;
                border: none;
                padding: 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                border-radius: 5px;
                transition: background-color 0.3s;
                width: 200px; /* Hacer que los botones ocupen todo el ancho del div */
                margin-bottom: 20px; /* Separación entre botones */
            }

            .guardar-archivo:hover {
                background-color: #2980b9;
            }
        </style>

        <div class="formulario-destacado">
            <form method="post" enctype="multipart/form-data">
            <?php
                    for ($i = 1; $i <= $cantidad_imagenes; $i++) {
                        echo '<div class="formulario-destacado2">';
                        if (!empty($result["img$i"])) {
                            // Asegúrate de que el path a la imagen sea correcto
                            echo '<img id="imagen-preview' . $i . '" alt="Vista previa de la imagen" src="' . htmlspecialchars($result["img$i"]) . '">';
                        }
                        echo '<label for="imagen' . $i . '">Seleccionar Archivo</label>';
                        echo '<input type="file" id="imagen' . $i . '" name="imagen' . $i . '" accept="image/png, image/jpeg, image/jpg" onchange="mostrarVistaPrevia' . $i . '()">';
                        echo '</div>';
                    }
                    ?>
                <!-- Botón Guardar para todas las imágenes -->
                <button type="submit" class="guardar-archivo" name="guardar">Guardar</button>
            </form>
        </div>

        <script>
    <?php
    for ($i = 1; $i <= $cantidad_imagenes; $i++) {
        echo "function mostrarVistaPrevia$i() {
            var input = document.getElementById('imagen$i');
            var vistaPrevia = document.getElementById('imagen-preview$i');
            if (input.files && input.files[0]) {
                var lector = new FileReader();
                lector.onload = function (e) {
                    vistaPrevia.src = e.target.result;
                };
                lector.readAsDataURL(input.files[0]);
            }
        }";
    }
    ?>
</script>
    </div>
    </div>
</main>



