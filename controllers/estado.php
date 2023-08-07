<?php

// header("Location: http://localhost/code/control_ia.V.1.1/php/inventario.php".$_REQUEST_URI);

include('conexion.php'); // incluir archivo de conexión a la base de datos
if(isset($_POST['idAmbiente'])){


$idAmbiente = $_POST['idAmbiente'];

$sql = "SELECT inventario.id, aulas.nombre AS nombre_aula, categoria.nombre AS nombre_categoria, marca.nombre AS nombre_marca, elementos.nombre_elemento AS nombre_elemento, inventario.estado
    FROM inventario
    INNER JOIN aulas ON inventario.id_aula = aulas.id_aula
    INNER JOIN categoria ON inventario.id_categoria = categoria.id
    INNER JOIN marca ON inventario.id_marca = marca.id
    INNER JOIN elementos ON inventario.id_elemento = elementos.id_elemento
    WHERE inventario.id_aula = $idAmbiente ";

// realizar la consulta


$result = mysqli_query($conn, $sql); // ejecutar consulta

// Verificar si hay resultados
if ($result) {
    // Almacenar resultados en un array
    $inventario = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $inventario[] = $row;
    }

    // Liberar memoria del resultado
    mysqli_free_result($result);

    // Cerrar conexión a la base de datos
    mysqli_close($conn);

    // Especificar tipo de contenido como JSON
    header('Content-Type: application/json');

    // Enviar resultados como JSON
    echo json_encode($inventario);
} else {
    // En caso de error en la consulta
    echo "Error en la consulta: " . mysqli_error($conn);
}
}

?>