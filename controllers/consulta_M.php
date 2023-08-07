<?php
// conexion
include("conexion.php");

// Obtener el valor del parámetro "id" enviado por AJAX
$id = $_GET['id'];

// Consultar los elementos con el mismo valor de "id"
$sql = "SELECT * FROM muebles WHERE ambiente = $id";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los elementos encontrados
    $elements = array();

    // Recorrer los resultados y almacenarlos en el array
    while ($row = $result->fetch_assoc()) {
        $element = array(
            "name" => $row["name_M"],
            "code" => $row["code_M"],
            // "property3" => $row["property3"]
            // Agregar más propiedades según sea necesario
        );

        // Agregar el elemento al array
        $elements[] = $element;
    }

    // Devolver los elementos como respuesta en formato JSON
    echo json_encode($elements);
} else {
    // No se encontraron elementos, devolver un array vacío en formato JSON
    echo json_encode(array());
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
