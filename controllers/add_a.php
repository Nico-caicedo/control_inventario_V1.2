<?php  
session_start();
include('conexion.php');
if(isset($_POST['crear'])){
    $name = $_POST['name'];
    $cod = $_POST['cod'];
      $query = "INSERT INTO aulas(nombre, cod) VALUES ('$name', '$cod')";
     $result = mysqli_query($conn, $query);

     if($result){
        echo"aula creada";
     }else{
        echo "error al crear aula";    
     }


     $datos = array($name, $cod);
     $datos_s = serialize($datos);   
     $tipo = 'Creación Ambiente';
     $fecha_actual = date("Y-m-d h:i:s");
     $id_usuario = $_SESSION['id'];
     $query2 = "INSERT INTO historial(fecha_operacion,tipo_operacion, operaciones, id_usuario) VALUES ('$fecha_actual','$tipo','$datos_s', '$id_usuario')";
     $resulto = mysqli_query($conn, $query2);
 


   // Recuperar datos de la tabla "historial"



 }
    




?>