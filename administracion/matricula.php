<?php
session_start();
include_once "../layout/plantilla.php";
include_once "../administracion/menu.php";
include_once '../model/conexion.php';


if (!isset($_SESSION['id']) || empty($_SESSION['nombre']) || empty($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}


?>
<!----------------Final del menu------------------->
<main>



</main>
<?php
include_once "./header.php";
?>

<!-----------------------------Fin del main------------------------------->

<script src="../js/tema.js"></script>
<script src="../js/activo.js"></script>