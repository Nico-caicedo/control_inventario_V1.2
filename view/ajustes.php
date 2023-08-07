<?php
session_start();

$name = $_SESSION['nombre'];

// Verificar si el usuario ha iniciado sesión correctamente
if (!isset($_SESSION['nombre'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("location: ../index.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../asset/css/ajustes.css">
    <title>Inventario</title>
</head>

<body>
    <nav class="container_boton">
        <div class="nameLogo">
            <h1>sci</h1>
            <img class="logo" src="https://www.sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="">
        </div>


        <ul class="menu">
            <li> <a href="inventario.php" class="select">Inventario</a></li>

            <li> <a href="agregar2.php" class="no_selec">Agregar</a></li>

            <?php

            if ($_SESSION['rol'] == 1) {
                echo "<li><a href='ajustes.php'>configuración</a></li>";
            }

            ?>


            <li> <a href="../controllers/cerrar.php" class="no_selec">cerrar sesión</a></li>



        </ul>

        <img class="burger" src="../asset/img/menu.svg" alt="">
    </nav>
    <main>
        <section id="column1">
            <button class="boton_change add" id="boton-seccion-1" data-target="seccion-1">Usuarios <img
                    src="../asset/img/users.svg" alt=""></button>
            <button class="boton_change history" id='boton-seccion-2' data-target='seccion-2'>Historial <img
                    src="../asset/img/historial.svg" alt=""></button>

        </section>

        <section id="column2">


            <div id="seccion-1">
                <div class="users_content">
                    <div class="form_users">


                        <h2>Crear Usuario</h2>
                        <form class="formularios" id='form' method="post">


                            <div>
                                <input type="hidden" name="id" id='id'>
                                <p class="nombre">Nombre:</p>
                                <input type="text" id="name" name="nombre">
                            </div>




                            <div>
                                <p class="modelo">Apellidos:</p>
                                <input type="text" id="apellidos" name="apellidos">
                            </div>




                            <div>

                                <p class="estado">cedula:</p>
                                <input type="number" name='cedula' id='cedula'>
                            </div>


                            <div>
                                <p class="">correo</p>
                                <input type="text" id="correo">
                            </div>




                            <input class="boton_enviar" id="crear" type="submit" name="submit_agregar" value="CREAR">
                        </form>
                    </div>
                    <div class="list-aula">

                        <table>
                            <thead>

                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Cedula</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody class="body_table" id="show">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="seccion-2">
                <div class="list-history">

                    <table>
                        <thead>

                            <th>fecha</th>
                            <th>Tipo</th>
                            <th>Datos Operación</th>
                            <th>id</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody class="body_table" id="show_history">


                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>


    <footer>
        <p>ADSO 2023</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="../asset/js/ajustes.js"></script>
    <script src="../asset/js/call_a.js"></script>
    <script src="../asset/js/show_user.js"></script>
    <script src="../asset/js/history.js"></script>
    <script src="../asset/js/call_info_a.js"></script>
    <!-- llama la info de los aulas y los coloca en el header del menú -->
    <script src="../asset/js/inventario.js"></script>


</body>

</html>