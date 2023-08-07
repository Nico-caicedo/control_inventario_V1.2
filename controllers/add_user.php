<?php
session_start();
include('conexion.php');



if (isset($_POST['crear'])) {

    $name = $_POST['name'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $id = $_POST['cedula'];
    $clave = $id;
    $rol = 2;

    $query = "INSERT INTO users(nombre, apellidos, cedula,  correo, clave, rol)
     VALUES ('$name','$apellidos', '$id','$correo', '$clave', '$rol')";
    $result = mysqli_query($conn, $query);


    $datos = array($name, $apellidos, $correo, $id);
    $datos_s = serialize($datos);
    $tipo = 'Crear Usuario';
    $fecha_actual = date("Y-m-d h:i:s");
    $id_usuario = $_SESSION['cedula'];
    $query2 = "INSERT INTO historial(fecha_operacion,tipo_operacion, operaciones, id_usuario) VALUES ('$fecha_actual','$tipo','$datos_s', '$id_usuario')";
    $resulto = mysqli_query($conn, $query2);


    if ($result) {
        $response = array("success" => true);


    } else {
        $response = array("success" => false, "message" => "Error al actualizar elemento: " . mysqli_error($conn));
    }
    echo json_encode($response);
}