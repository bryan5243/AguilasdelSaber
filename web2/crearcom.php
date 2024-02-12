
<?php
include( 'model/conexion.php');
include('funcionescom.php');


if($_POST["operacion"]=="Crear"){
    $imagen='';
    if($_FILES["foto"]["name"] != ''){
        $imagen= subir_imagen();

    }
    $stmt= $pdo->prepare("INSERT INTO comunicados (foto) VALUES (:foto)");

    $resultado=$stmt->execute(
        array(
            ':foto'   => $imagen
        )
    );

    if(!empty($resultado)){
        echo 'Registro Creado';
    }

}

if($_POST["operacion"]=="Editar"){
    $imagen='';
    if($_FILES["foto"]["name"] != ''){
        $imagen= subir_imagen();

    } else{
        $imagen=$_POST["foto_oculta"];
    }
    $stmt= $pdo->prepare(" UPDATE comunicados SET foto=:foto WHERE id=:id");

    $resultado=$stmt->execute(
        array(
        
            ':foto'   => $imagen,
            ':id'   => $_POST["id_comunicados"]
        )
    );

    if(!empty($resultado)){
        echo 'Registro Actualizado';
        
    }

}



?>
