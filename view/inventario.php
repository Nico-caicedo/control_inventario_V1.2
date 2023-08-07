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

    <link rel="stylesheet" href="../asset/css/inventario.css">
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


            <?php

            if ($_SESSION['rol'] == 1) {
                echo "
                <li> <a href='agregar2.php' class='no_selec'>Agregar</a></li>
                <li><a href='ajustes.php'>configuración</a></li>
                <li> <a href='../controllers/cerrar.php' class='no_selec'>Cerrar Sesión</a></li>
 
";

            }

            ?>



            <?php


            $img = $_SESSION['foto'];
            $name = $_SESSION['nombre'] . ' ' . $_SESSION['apellidos'];
            if ($_SESSION['rol'] == 2) {
                echo "<div id='contenedor' class='perfil'>
                
                    <img class='foto_perfil' src='$img' alt='Imagen'>
                    <p class='name_perfil'> $name <p>;
                
                <div id='opciones'>
                    <a class='cerrar' href='../controllers/cerrar.php' onclick='mostrarModal('Opción 1')'>cerrar
                        sesion</a>
                    <p onclick='mostrarModal('Opción 2')'>cambiar datos</p>
                    <p onclick='mostrarModal('Opción 3')'>Opción 3</p>

                </div>
            </div>
            <div id='modal'>
                <div id='modal-content'>
                    <p id='modal-text'>Cambiar foto</p>
                    <p>uuuu</p>
                    <input type='subtmit' value='cargar Imagen'>
                    <button onclick='cerrarModal()'>Cerrar</button>
                </div>
            </div>";
            }
            ?>


        </ul>

        <img class="burger" src="../asset/img/menu.svg" alt="">
    </nav>

    <main class="main">
        <!-- permite escoger el ambiente para mostrar el dato  -->
        <section class="choose">
            <article id="ambientes-container">
                <img class="down" src="../asset/img/botom.svg" alt="">
            </article>
        </section>

        <!-- donde se estaran mostrando los datos  -->
        <section class="show">
            <header>

                <div>
                    <input type="hidden" name="" id="id">
                    <p id="nombre">ambiente</p>
                    <p class="divisor"></p>
                    <p id="codigo">Cod. 00 </p>
                </div>
                <p class="divisor2"></p>
                <p>Tipo Ambiente: Normal</p>
            </header>
            <main class="section_opc">
                <div class="containers_opc">

                    <details>
                        <summary>
                            Tecnologia
                        </summary>
                        <div id="tableBody">

                        </div>
                    </details>
                    <!-- <div class="contenedor" onclick="mostrarContenido(1)">Tecnologia</div>
                    <div class="contenido" id="contenido1">
                        <div id="tableBody">

                        </div>
                    </div> -->

                    <details>
                        <summary>Muebles</summary>
                        <div id="tableBody2">

                        </div>

                    </details>
                    <details>
                        <summary>electrodomesticos</summary>
                        <div>
                            sin elementos asignados
                        </div>
                    </details>



                </div>
            </main>
        </section>
    </main>
    <footer>
        <p>ADSO 2023</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
   
    <script src="../asset/js/call_a.js"></script>
    <script src="../asset/js/op_perfil.js"></script>

    <script src="../asset/js/call_info_a.js"></script>
    <!-- llama la info de los aulas y los coloca en el header del menú -->
    <script src="../asset/js/inventario.js"></script>


</body>

</html>