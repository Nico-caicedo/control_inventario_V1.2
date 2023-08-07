<?php
include('conexion.php');

if(isset($_POST['ids'])){
$id = $_POST['ids'];

    $query = "DELETE FROM tecnologia where id_tecnologia = '$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"elemento eliminado";
    }
}