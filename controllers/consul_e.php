<?php 


include('conexion.php');


    $id = $_POST['id'];

    $query = "SELECT * FROM tecnologia WHERE id_tecnologia = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        $json = array();
        while($row = mysqli_fetch_array($result)){

            $json[] = array(
                'name' => $row['name_T'],
                'cod' => $row['cod_T'],
                'id' => $row['id_tecnologia'],
                'modelo' => $row['modelo_T'],
                'marca' => $row['marca_T'],
                // 'ubi' => $row['ubi_T'],
                'descrip' => $row['descrip_T'],
                'ubicacion' => $row['ambiente'],

                
            );

            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
        }
    }
    


