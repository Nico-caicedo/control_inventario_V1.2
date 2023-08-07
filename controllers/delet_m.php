<?php
include('conexion.php');

if(isset($_POST['idss'])){
$id = $_POST['idss'];

    $query = "DELETE FROM muebles where id_Muebles = '$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"elemento eliminado";
    }
}