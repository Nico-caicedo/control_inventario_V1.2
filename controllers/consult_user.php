<?php 


include('conexion.php');


    $id = $_POST['id'];

    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        $json = array();
        while($row = mysqli_fetch_array($result)){

            $json[] = array(
                'name' => $row['nombre'],
                'apellidos' => $row['apellidos'],
                'cedula' => intval($row['cedula']),
                'correo' => $row['correo'],
                'id' => $row['id'],
                
                
            );

            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
        }
    }
    


