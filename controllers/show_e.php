<?php 


include('conexion.php');
$estado = 1;
$op = 4;




    $query = "SELECT * FROM tecnologia where estado = $estado";
    $result = mysqli_query($conn, $query);
    
    if($result){
    
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'name' => $row['name_T'],
                'cod' => $row['cod_T'],
                'id' => $row['id_tecnologia']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }



