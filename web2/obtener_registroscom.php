<?php
include( 'model/conexion.php');
include('funcionescom.php');


$query=" ";
$salida= array();
$recordsTotal = obtener_todos_registros(); 
$query = "SELECT * FROM comunicados ";



$stmt = $pdo->prepare($query);
$stmt->execute();
$resultado= $stmt->fetchAll();
$datos=array();
$stmt->rowCount();
foreach($resultado as $fila){
    $imagen='';
    if($fila["foto"]!= ''){
        $imagen= '<img src="img/'. $fila["foto"]. '" class="img-thumbnail" width="100" height="50"/>' ;

    }else{
        $imagen='';
    }

    $sub_array=array();
    $sub_array[]= $fila["id"];
    $sub_array[]= $imagen;
    $sub_array[]= '<button type="button" name="editar" id="'.$fila["id"].'" class="btn btn-warning btn-xs editar">Editar <i class="icon_fa fas fa-edit"></i></button>';
    $sub_array[]= '<button type="button" name="borrar" id="'.$fila["id"].'" class="btn btn-danger btn-xs borrar">Borrar <i class="icon_fa fas fa-trash"></i></button>';
    $datos[] = $sub_array; 

}

$salida = array(
    
    
    
    
        "draw" => intval($_POST["draw"]), // Agregar el parámetro "draw" recibido de DataTables
        "recordsTotal" => $recordsTotal,
        "recordsFiltered" => $recordsTotal, // Esto debe ser el número total después de la búsqueda/filtrado. Si no hay búsqueda, es igual a recordsTotal.
        "data" => $datos
    
    
);

echo json_encode ($salida);


?>