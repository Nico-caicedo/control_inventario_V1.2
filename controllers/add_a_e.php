<?php
include('conexion.php');
if (isset($_POST['crear'])) {

   
   $aula = $_POST['aula'];
   $categoria = $_POST['categoria'];
   $marca = $_POST['marca'];
   $element = $_POST['id'];
   $estado = 2;
   $query = "INSERT INTO inventario (id_aula, id_categoria, id_marca, id_elemento, estado) VALUES ('$aula', '$categoria', '$marca', '$element', '$estado')";
   $result = mysqli_query($conn, $query);

   if ($result) {
      echo "elemento agregado";
   } else {
      echo "error";
   }

   $consulta = "UPDATE elementos SET estado = '$estado' WHERE id_elemento = $element";
   $insercion = mysqli_query($conn, $consulta);



   // if($result){
   //     $response = array(
   //         "status" => "success",
   //         "message" => "El elemento se ha agregado correctamente."
   //       );

   //       // Convertir el objeto en formato JSON y enviarlo como respuesta al cliente
   //       echo json_encode($response);
   // }else{
   //     // $response = array(
   //     //     "status" => "success",
   //     //     "message" => "El elemento se ha agregado correctamente."
   //     //   );

   //     //   // Convertir el objeto en formato JSON y enviarlo como respuesta al cliente
   //     //   echo json_encode($response);
   // }

}



?>