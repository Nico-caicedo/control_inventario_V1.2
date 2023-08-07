<?php 

include('conexion.php');


$correo = $_POST['correo'];


$consulta = "SELECT * FROM users WHERE correo = $correo";
$ejecucion = mysqli_query($conn, $consulta);


if(mysqli_num_rows($ejecucion) > 0){
    echo "exists";
}