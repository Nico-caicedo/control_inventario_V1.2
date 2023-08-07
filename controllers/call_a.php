
<?php 
// Conexión a la base de datos
 include('conexion.php');


// Consulta para obtener las opciones
// $resultado = $conn->query("SELECT id_aula, nombre FROM aulas");

// Array para almacenar las opciones
// $opciones = array();

// Recorremos el resultado y añadimos cada opción al array
// while ($fila = $resultado->fetch_assoc()) {
//     $opciones[] = $fila;
// }

// Devolvemos las opciones en formato JSON
// echo json_encode($opciones);
// 

$sql = "SELECT id_aula, nombre, cod FROM aulas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generar el código HTML para cada ambiente
    while ($row = $result->fetch_assoc()) {

        echo '<div class="one" id="'. $row["id_aula"] . '"  >' . $row["nombre"] . '</div>';
    }
} else {
    echo "No se encontraron ambientes en la base de datos.";
}

// Cerrar la conexión a la base de datos
$conn->close();


    