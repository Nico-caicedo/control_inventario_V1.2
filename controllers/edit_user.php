<?php
session_start();
include('conexion.php');



    $id = $_POST['id'];
    $name = $_POST['name'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $cedula = $_POST['cedula'];


  
    $query = "UPDATE users SET nombre = '$name',  apellidos = '$apellidos' , cedula = '$cedula' , correo = '$correo' where id = '$id' ";

    $result = mysqli_query($conn, $query);

    // codigo para historial

    $consulta = "SELECT * FROM users WHERE id = '$id'";
    $ejecucion = mysqli_query($conn, $consulta);

    if ($ejecucion) {
        $row = mysqli_fetch_assoc($ejecucion);

        $name = $row['nombre'];
        $apellidos = $row['apellidos'];
        $cedula = $row['cedula'];
        $correo = $row['correo'];
    }

    $datos = array($name, $apellidos, $cedula);
    $datos_s = serialize($datos);
    $tipo = 'Modificación usuario';
    $fecha_actual = date("Y-m-d h:i:s");
    $id_usuario = $_SESSION['cedula'];
    $query2 = "INSERT INTO historial(fecha_operacion,tipo_operacion, operaciones, id_usuario) VALUES ('$fecha_actual','$tipo','$datos_s', '$id_usuario')";
    $resulto = mysqli_query($conn, $query2);


    if ($result) {
        $response = array("success" => true); ;
    } else {
        $response = array("success" => false, "message" => "Error al actualizar elemento: " . mysqli_error($conn));
    }
    echo json_encode($response);




   


?>