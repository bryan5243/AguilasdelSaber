<?php

if (!isset($_SESSION['id']) || empty($_SESSION['nombre']) || empty($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}

?>

<header>
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
                    <p>hola,<b>  <?php echo $_SESSION["nombre"]; ?></b></p>
                    <small class="text-muted">  <?php echo $_SESSION["rol"]; ?></small>
                </div>
                <div class="profile-photo">
                    <img src="../img/juan.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
