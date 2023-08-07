<?php 


include('conexion.php');






    $query = "SELECT * FROM historial";
    $result = mysqli_query($conn, $query);
    
    if($result){
    
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'fecha' => $row['fecha_operacion'],
                'tipo_operacion' => $row['tipo_operacion'],
                'operacion' => unserialize($row['operaciones']),
                'id' => $row['id_usuario'],
                
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }



