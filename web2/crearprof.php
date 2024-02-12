
<?php
include( 'model/conexion.php');
include('funcionesprof.php');


if($_POST["operacion"]=="Crear"){
    $imagen='';
    if($_FILES["foto"]["name"] != ''){
        $imagen= subir_imagen();

    }
    $stmt= $pdo->prepare("INSERT INTO profesores(nombre, cargo, foto) VALUES (:nombre, :cargo, :foto)");

    $resultado=$stmt->execute(
        array(
            ':nombre'   => $_POST["nombre"],
            ':cargo'   => $_POST["cargo"],
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
    $stmt= $pdo->prepare(" UPDATE profesores SET nombre=:nombre, cargo=:cargo, foto=:foto WHERE id=:id");

    $resultado=$stmt->execute(
        array(
            ':nombre'   => $_POST["nombre"],
            ':cargo'   => $_POST["cargo"],
            ':foto'   => $imagen,
            ':id'   => $_POST["id_profesores"]
        )
    );

    if(!empty($resultado)){
        echo 'Registro Actualizado';
        
    }

}



?>
