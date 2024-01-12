<?php
include_once("../model/validacion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="icon" href="../img/logo23.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>



</head>


<body class="d-flex justify-content-center align-items-center vh-100">


    <div class=" p-5  text-secondary shadow"
        style="border-radius: 20px; width: 30rem ;height:35rem; background: rgba(255, 255, 255, 0.50);">

        <div class="d-flex justify-content-center">
            <img src="../img/logo23.png" alt="login-icon" style="height: 10rem" />
        </div class="text-center fs-3 fw-bold">

        <div style="-webkit-text-fill-color: #ec1d17;" class="text-center fs-4 fw-bold">LAS AGUILAS</div>
        <div class="text-center fs-5 fw-bold" style="color: #ec1d17;">DEL SABER</div>


        <?php

        use PgSql\Connection\Connection;

        include_once('../model/conexion.php');

        ?>
        <form action="" method="post">


            <div class="input-group mt-4  " style="height: 3rem;">
                <div class="input-group-text bg-light ">
                    <span class="material-icons-sharp">person</span>
                </div>

                <input class="form-control bg-light" type="text" placeholder="Usuario" name="usuario" />
            </div>

            <div class="input-group mt-3" style="height: 3rem;">
                <div class="input-group-text bg-light">
                    <span class="material-icons-sharp">lock</span>
                </div>

                <input class="password form-control bg-light" type="password" placeholder="Contraseña"
                    name="contrasena">

                <span class="  input-group-text">
                    <button class="btn-show-pass" type="button" onclick="showPassword()">

                        <i class="icon fas fa-eye-slash"></i>
                    </button>
            </div>



            <div class="d-flex justify-content-around mt-1">

                <!-- /* <div class="pt-1 ">
                    <a href="#" class="text-decoration-none " style="font-size: 1rem;color: #167bae;padding-left: 50px;">Recordar su contraseña?</a>
                </div>*/ -->
            </div>
            <button style="border-radius: 10px;background: #ec1d17;"
                class="btn  text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" name="btningresar"
                value="Iniciar Sesion">
                INGRESAR
            </button>

        </form>
    </div>
</body>


<script src="../js/contra.js"> </script>
</body>

</html>