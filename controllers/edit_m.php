<?php

include('conexion.php');

if (isset($_POST['crear'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $marca = $_POST['marca'];
    $code = $_POST['cod'];
    //  $categoria = $_POST['categoria'];
    $ubi = $_POST['ubi'];
    // $modelo = $_POST['modelo'];
    $descrip = $_POST['descrip'];
    $estado = $_POST['estado'];
    $valor = $_POST['valor'];
    $color = $_POST['color'];

    echo $name;
    $query = "UPDATE muebles SET name_M = '$name',  marca_M = '$marca' , code_M = '$code' , ubi_M = '$ubi', descrip_M = '$descrip', valor_M = '$valor', color_M = '$color', mante_M = '$estado'  where id_tecnologia = '$id' ";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "ambiente actualizado";
    } else {
        echo "algo fallo";
    }
}


?>