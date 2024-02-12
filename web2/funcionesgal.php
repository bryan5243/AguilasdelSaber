<?php
    function subir_imagen(){
        if(isset($_FILES["foto"])){
            $extension=explode('.', $_FILES["foto"]['name']);
            $nuevo_nombre= rand().'.'.$extension[0];
            $ubicacion= '../web2/img/'. $nuevo_nombre;
            move_uploaded_file($_FILES["foto"]['tmp_name'],$ubicacion);
            return $nuevo_nombre;
        }
    
    }

    function obtener_nombre_imagen($id_galeria){
        include( 'model/conexion.php');
        $stmt=$pdo->prepare("SELECT foto FROM galeria WHERE id='$id_galeria'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["foto"];

        }
        

    }

    function obtener_todos_registros(){
        include( 'model/conexion.php');
        $stmt=$pdo->prepare("SELECT * FROM galeria");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $stmt->rowCount();
        

    }

?>