<?php
session_start();
include_once "conexion.php";

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["contrasena"])) {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        try {
            $conexion = conectarBaseDeDatos();

            $sql = "SELECT id, usuario, rol, estado FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                if ($result['estado'] == true) {
                    $_SESSION["id"] = $result['id'];
                    $_SESSION["nombre"] = $result['usuario'];
                    $_SESSION["rol"] = $result['rol'];

                    if ($result['rol'] == 'disenador') {
                        // Redirigir al diseñador a una página específica
                        header("Location: ../web2/administrativo.php");
                    } else {
                        // Redirigir a la página principal del dashboard
                        header("Location: dashboard.php");
                    }
                    exit(); // Salir del script después de redireccionar
                } else {
                    mostrarAlerta("Acceso no permitido", "El acceso no está permitido en este momento.");
                }
            } else {
                mostrarAlerta("Error", "Usuario o contraseña incorrectos!");
            }

            $stmt->closeCursor(); // Cerrar el cursor antes de cerrar la conexión
            $conexion = null; // Cerrar la conexión
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

function mostrarAlerta($title, $text)
{
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "error",
                title: "' . $title . '",
                text: "' . $text . '",
            });
        });
    </script>';
}
?>
