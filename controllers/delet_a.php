<?php
include('conexion.php');

if(isset($_POST['id'])){
$id = $_POST['id'];

    $query = "DELETE FROM aulas where id_aula = '$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"aula eliminada";
    }
}