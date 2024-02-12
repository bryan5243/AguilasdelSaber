<?php

include( 'model/conexion.php');
include('funcionesgal.php');


if(isset($_POST["id_galeria"])){
    $imagen= obtener_nombre_imagen($_POST["id_galeria"]);

    if($imagen != ""){
        unlink("img/".$imagen);

    } 
    $stmt= $pdo->prepare(" DELETE FROM galeria WHERE id=:id");

    $resultado=$stmt->execute(
        array(
        
            ':id'   => $_POST["id_galeria"]
        )
    );

    if(!empty($resultado)){
        echo 'Registro Borrado';
    
    }

}
?>