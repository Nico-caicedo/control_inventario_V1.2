<?php
 
include('conexion.php');

if (isset($_POST['crear'])) {


    $id = $_POST['id'];
    $name = $_POST['name'];
    $cod = $_POST['cod'];

    echo $name;
    $query = "UPDATE aulas SET nombre = '$name',  cod = '$cod' where id_aula = '$id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "ambiente actualizado";
    } else {
        echo "algo fallo";
    } 
}


?>