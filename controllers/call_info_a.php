<?php

include("conexion.php");

// Obtener el ID del ambiente enviado desde la solicitud AJAX
$ambienteId = $_GET['ambienteId'];


$sql = "SELECT nombre, cod FROM aulas WHERE id_aula = $ambienteId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $ambienteId;
    $nombreAmbiente = $row["nombre"];
    $codigoAmbiente = $row["cod"];
    // Crear un array con los datos del ambiente
    $ambienteData = array(
        'id' => $id,
        'nombre' => $nombreAmbiente,
        'codigo' => $codigoAmbiente
    );

    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($ambienteData);

} else {
    echo "No se encontró el ambiente en la base de datos.";
}

$conn->close();
?>