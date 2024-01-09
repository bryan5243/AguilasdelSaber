<?php
// Evitar el almacenamiento en caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if (!isset($_SESSION['id']) || empty($_SESSION['nombre']) || empty($_SESSION['rol'])) {
    session_destroy();


    header("location: login.php");
}

?>

<div class="container">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="../img/logo23.png">
                <h2 class="logo-name"><span class="divina">AGUILAS</span> <span class="mise">DEL SABER</span></h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>

            </div>
        </div>

        <div class="sidebar">
            <a href="dashboard.php" class="active">
                <span class="las la-home"></span>
                <h3>Inicio</h3>
            </a>


            <a href="matricula.php">
                <span class="material-symbols-outlined">
                    group_add
                </span>
                <h3>Matricula</h3>
            </a>

            <a href="estudiantes.php">
                <span class="material-symbols-outlined">
                    clinical_notes
                </span>
                <h3>Estudiantes</h3>
            </a>

            <a href="#">
                <span class="material-symbols-outlined">
                    settings
                </span>
                <h3>Opciones</h3>
            </a>

            <a href="../model/cerrar_session.php">
                <span class="material-icons-sharp">logout</span>
                <h3>Salir</h3>
            </a>

        </div>
    </aside>