<?php 

include('conexion.php');


$cedula = $_POST['cedula'];


$consulta = "SELECT * FROM users WHERE cedula = $cedula";
$ejecucion = mysqli_query($conn, $consulta);


if(mysqli_num_rows($ejecucion)>0){
    echo "exists";
}