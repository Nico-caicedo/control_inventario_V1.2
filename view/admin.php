<?php 
session_start();

$name = $_SESSION['nombre'];

// Verificar si el usuario ha iniciado sesión correctamente
if (!isset($_SESSION['nombre']) ) {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("location: ../index.php");
    exit;
}else if( $_SESSION['rol'] == 2){
    header("location: user.php ");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrador</title>
</head>
<body>
    <h1>administrador</h1>
    <p>hola eres <?php echo  $name?> </p>
    <a href="cerrar.php">cerrar sesion</a>
</body>
</html>