<?php
include('conexion.php');
if (isset($_POST['crear'])) {

   $op = $_POST['categoria'];


      $name = $_POST['name'];
      $marca = $_POST['marca'];
      $code = $_POST['cod'];
      //  $categoria = $_POST['categoria'];
      $ubi = $_POST['ubi'];
      $modelo = $_POST['modelo'];
      $descrip = $_POST['descrip'];
      $estado = 1;
     
      $query = "INSERT INTO tecnologia(name_T, marca_T, cod_T,  modelo_T, descrip_T, estado, ambiente)
     VALUES ('$name','$marca', '$code','$modelo', '$descrip', '$estado', '$ubi')";
      $result = mysqli_query($conn, $query);

      if ($result) {
         echo "elemnto creado";
      } else {
         echo "error al crear elemento";
      }
    
}else if(isset($_POST['Crear'])){
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
   $disp = 1;
   $ambiente = 268;
   $query1 = "INSERT INTO muebles(name_M, color_M, valor_M,  code_M, mante_M, descrip_M, ubi_M, marca_M,  estado, ambiente)
   VALUES ('$name','$color', '$valor','$code', '$estado', '$descrip', '$ubi', '$marca', '$disp','$ambiente')";
    $result1 = mysqli_query($conn, $query1);

    if ($result1) {
       echo "elemnto creado";
    } else {
       echo "error al crear elemento";
    }

}



?>