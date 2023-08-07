<?php

include('conexion.php');

if (isset($_POST['crear'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $marca = $_POST['marca'];
    $code = $_POST['cod'];
    $categoria = $_POST['categoria'];
    $ubi = $_POST['ubi'];
    $modelo = $_POST['modelo'];
    $descrip = $_POST['descrip'];

    echo $name;
    $query = "UPDATE tecnologia SET name_T = '$name',  marca_T = '$marca' , cod_T = '$code' , ubi_T = '$ubi', modelo_T = '$modelo', descrip_T = '$descrip' where id_tecnologia = '$id' ";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "ambiente actualizado";
    } else {
        echo "algo fallo";
    }
}


?>