<?php

include( 'model/conexion.php');
include('funcionescom.php');


if(isset($_POST["id_comunicados"])){
    $imagen= obtener_nombre_imagen($_POST["id_comunicados"]);

    if($imagen != ""){
        unlink("img/".$imagen);

    } 
    $stmt= $pdo->prepare(" DELETE FROM comunicados WHERE id=:id");

    $resultado=$stmt->execute(
        array(
        
            ':id'   => $_POST["id_comunicados"]
        )
    );

    if(!empty($resultado)){
        echo 'Registro Borrado';
    
    }

}
?>