<?php 


include('conexion.php');


    $id = $_POST['ids'];

    $query = "SELECT * FROM muebles WHERE id_Muebles= '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        $json = array();
        while($row = mysqli_fetch_array($result)){

            $json[] = array(
                'name' => $row['name_M'],
                'cod' => $row['code_M'],
                'id' => $row['id_Muebles'],
                'color' => $row['color_M'],
                'estado' => $row['mante_M'],
                'descrip' => $row['descrip_M'],
                'ubi' => $row['ambiente'],
                'marca' => $row['marca_M'],
                'valor' => $row['valor_M']
               
                
            );

            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
        }
    }
    


