<?php 
include('conexion.php');
// Obtenemos los ids de las categorías y marcas seleccionadas
$idCategoria = $_GET["id_categoria"];
$idMarca = $_GET["id_marca"];
$estado = 1;
// Preparamos la consulta SQL para obtener los elementos relacionados
$sql = "SELECT id_elemento, nombre_elemento  FROM elementos WHERE categoria = '$idCategoria' AND marca = '$idMarca' and  estado = $estado";
$result = mysqli_query($conn, $sql);

// Guardamos los resultados en un array
$elementos = array();
while ($row = mysqli_fetch_assoc($result)) {
    $elementos[] = $row;
}

// Devolvemos los resultados en formato JSON
echo json_encode($elementos);

// Cerramos la conexión a la base de datos
mysqli_close($conn);
?>
