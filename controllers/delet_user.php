<?php
include('conexion.php');
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $consulta = "SELECT * FROM users WHERE id = '$id'";
    $ejecucion = mysqli_query($conn, $consulta);

    if ($ejecucion) {
        $row = mysqli_fetch_assoc($ejecucion);

        $name = $row['nombre'];
        $apellidos = $row['apellidos'];
        $cedula = $row['cedula'];
    }

    $datos = array($name, $apellidos, $cedula);
    $datos_s = serialize($datos);
    $tipo = 'Eliminación Usuario';
    $fecha_actual = date("Y-m-d h:i:s");
    $id_usuario = $_SESSION['cedula'];
    $query2 = "INSERT INTO historial(fecha_operacion,tipo_operacion, operaciones, id_usuario) VALUES ('$fecha_actual','$tipo','$datos_s', '$id_usuario')";
    $resulto = mysqli_query($conn, $query2);




    $query = "DELETE FROM users where id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "elemento eliminado";
    }


}