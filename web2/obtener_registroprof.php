<?php
include( 'model/conexion.php');
include('funcionesprof.php');

    if(isset($_POST["id_profesores"])){

        $salida =array();
        $stmt= $pdo->prepare("SELECT * FROM profesores WHERE id='".$_POST["id_profesores"]."' LIMIT 1 ");
        $stmt->execute();
        $resultado= $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["nombre"]= $fila["nombre"];
            $salida["cargo"]= $fila["cargo"];
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