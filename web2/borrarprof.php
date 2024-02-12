<?php

include( 'model/conexion.php');
include('funcionesprof.php');


if(isset($_POST["id_profesores"])){
    $imagen= obtener_nombre_imagen($_POST["id_profesores"]);

    if($imagen != ""){
        unlink("img/".$imagen);

    } 
    $stmt= $pdo->prepare(" DELETE FROM profesores WHERE id=:id");

    $resultado=$stmt->execute(
        array(
        
            ':id'   => $_POST["id_profesores"]
        )
    );

    if(!empty($resultado)){
        echo 'Registro Borrado';
    
    }

}
?>