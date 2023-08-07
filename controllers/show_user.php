<?php 


include('conexion.php');
$rol = 2;





    $query = "SELECT * FROM users where rol = $rol";
    $result = mysqli_query($conn, $query);
    
    if($result){
    
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'name' => $row['nombre'],
                'apellidos' => $row['apellidos'],
                'cod' => $row['cedula'],
                'id' => $row['id'],
                
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }



