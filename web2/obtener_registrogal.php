<?php
include( 'model/conexion.php');
include('funcionesgal.php');

    if(isset($_POST["id_galeria"])){

        $salida =array();
        $stmt= $pdo->prepare("SELECT * FROM galeria WHERE id='".$_POST["id_galeria"]."' LIMIT 1 ");
        $stmt->execute();
        $resultado= $stmt->fetchAll();
        foreach($resultado as $fila){
            if($fila["foto"] != " "){
                $salida["foto"]= '<img src="img/'. $fila["foto"]. '" class="img-thumbnail" width="100" height="50"/>
                <input type="hidden" name="foto_oculta" value="'.$fila["foto"].'" /> ' ;

            } else{
                $salida["foto"]= '<input type="hidden" name="foto_oculta" value="" />';
            }

        }

        echo json_encode($salida);

    }


?>