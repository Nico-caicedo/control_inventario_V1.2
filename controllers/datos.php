<?php 
include('conexion.php');
// Obtenemos el id de la opción seleccionada
$idOpcion = $_GET["id_opcion"];




// Consulta para obtener los datos relacionados a la opción
$query = "SELECT id, nombre FROM marca WHERE categoria = $idOpcion";
$resultado = $conn->query($query);

// Creamos un array con los datos obtenidos
$datos = array();
while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

// Devolvemos los datos en formato JSON
header("Content-Type: application/json");
echo json_encode($datos);


?>