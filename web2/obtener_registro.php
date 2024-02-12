<?php
include( 'model/conexion.php');
include('funciones.php');

    if(isset($_POST["id_padres"])){

        $salida =array();
        $stmt= $pdo->prepare("SELECT * FROM padres WHERE id='".$_POST["id_padres"]."' LIMIT 1 ");
        $stmt->execute();
        $resultado= $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["parentesco"]= $fila["parentesco"];
            $salida["nombre"]= $fila["nombre"];
            $salida["comentario"]= $fila["comentario"];
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