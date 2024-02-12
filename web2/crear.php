
<?php
include( 'model/conexion.php');
include('funciones.php');


if($_POST["operacion"]=="Crear"){
    $imagen='';
    if($_FILES["foto"]["name"] != ''){
        $imagen= subir_imagen();

    }
    $stmt= $pdo->prepare("INSERT INTO padres(parentesco, nombre, comentario, foto) VALUES (:parentesco, :nombre, :comentario, :foto)");

    $resultado=$stmt->execute(
        array(
            ':parentesco'   => $_POST["parentesco"],
            ':nombre'   => $_POST["nombre"],
            ':comentario'   => $_POST["comentario"],
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
    $stmt= $pdo->prepare(" UPDATE padres SET parentesco=:parentesco, nombre=:nombre, comentario=:comentario, foto=:foto WHERE id=:id");

    $resultado=$stmt->execute(
        array(
            ':parentesco'   => $_POST["parentesco"],
            ':nombre'   => $_POST["nombre"],
            ':comentario'   => $_POST["comentario"],
            ':foto'   => $imagen,
            ':id'   => $_POST["id_padres"]
        )
    );

    if(!empty($resultado)){
        echo 'Registro Actualizado';
        
    }

}



?>
