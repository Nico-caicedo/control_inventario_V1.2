<?php
include("conexion.php");
// Obtener el valor del parámetro 'id' enviado por GET
$id = $_GET['id'];


// Construir la consulta SQL para obtener los elementos que coinciden con el valor proporcionado
$sql = "SELECT * FROM tecnologia WHERE ambiente = '$id'";

// Ejecutar la consulta y obtener el resultado
$result = $conn->query($sql);

// Verificar si se encontraron elementos
if ($result->num_rows > 0) {
    // Crear un arreglo para almacenar los elementos
    $elements = array();

    // Recorrer cada fila del resultado y agregar los elementos al arreglo
    while ($row = $result->fetch_assoc()) {
        $elements[] = $row;
    }

    // Devolver los elementos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($elements);
} else {
    // No se encontraron elementos

    echo json_encode(array());
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
