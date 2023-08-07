<?php 


include('conexion.php');
$estado = 1;





    $query = "SELECT * FROM muebles where estado = $estado";
$result = mysqli_query($conn, $query);

if($result){

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'name' => $row['name_M'],
            'cod' => $row['code_M'],
            'id' => $row['id_Muebles']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}




