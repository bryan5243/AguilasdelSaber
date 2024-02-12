<?php

include( 'model/conexion.php');
include('funciones.php');


if(isset($_POST["id_padres"])){
    $imagen= obtener_nombre_imagen($_POST["id_padres"]);

    if($imagen != ""){
        unlink("img/".$imagen);

    } 
    $stmt= $pdo->prepare(" DELETE FROM padres WHERE id=:id");

    $resultado=$stmt->execute(
        array(
        
            ':id'   => $_POST["id_padres"]
        )
    );

    if(!empty($resultado)){
        echo 'Registro Borrado';
    
    }

}
?>