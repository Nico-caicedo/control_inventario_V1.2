<?php 


include('conexion.php');


$query = "SELECT * FROM aulas";
$result = mysqli_query($conn, $query);

if($result){

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'name' => $row['nombre'],
            'cod' => $row['cod'],
            'id' => $row['id_aula']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}


