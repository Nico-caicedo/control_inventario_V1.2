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
<html>

<head>
    <title>Agregar Elemento</title>
    <link rel="stylesheet" href="../asset/css/agregar_e.css">
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <nav class="container_boton">
        <h1 id="big">Sistema gestor de inventario</h1>
    <h2 id="small">sgi</h1>

            <ul id="menu">
            <li> <a href="inventario.php" class="no_select">Inventario</a></li>

                <li> <a href="agregar_aula.php" class="no_selec">Aulas</a></li>
                <li><a href="agregar_elemento.php" class="select">elementos</a></li>
                <?php

                if ($_SESSION['rol'] == 0) {
                    echo "<li><a href='usuario.php'>usuarios</a>";
                }

                ?>

                <li> <a href="cerrar.php" class="no_selec">cerrar sesión</a></li>



            </ul>

            <img class="burger" src="../asset/img/menu.svg" alt="">
    </nav>




    <main>
        <p class="title_form">Agregar Elemento</p>
        <div class="container-top">






            <form class="form_container" id='form' method="post">
                <div class="container_ubi">
                    <div class="column1">
                        <div>
                            <input type="hidden" id="id">
                            <p class="nombre">Nombre de equipo:</p>
                            <input type="text" id="name" name="nombre" autocomplete="off" required>
                        </div>

                        <div>
                            <p class="">categoria</p>

                            <select id="lista-opciones">
                                <option value="o">escoger</option>
                            </select>

                        </div>
                        <div>
                            <p class="marca">marca:</p>
                            <select id="select-datos">
                                <option value="o">escoger</option>
                            </select>
                        </div>

                        <div>
                            <p class="modelo">codigo:</p>
                            <input type="number" id="cod" >
                        </div>
                        <div>
                            
                            <p class="estado">descripción:</p>
                            <input type="text" name='estado' id='descripcion'>
                        </div>
                    </div>
                    <div class="column2">
                        <div>
                            <p class="">modelo</p>
                            <input type="text" id="modelo">
                        </div>
                        <div>
                            <p class="">ubicación</p>
                            <input type="text" name="ubicacion" id="ubi">
                        </div>
                        <!-- <div>
                            <p class="">estado</p>
                            <input type="text">
                        </div>
                        <div>
                            <p class="">estado</p>
                            <input type="text">
                        </div> -->
                    </div>


                </div>

                <input class="boton_enviar" id="crear" type="submit" name="submit_agregar" value="crear">
            </form>
            <div class="list-aula">

                <table>
                    <thead>

                        <th>Nombre de elemento</th>
                        <th>código</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody class="body_table" id="show-e">


                    </tbody>
                </table>
            </div>
        </div>
        <!-- permite desplegar una pestaña para agregar elementos al aula -->
        <button class="modal-button2" data-modal-target="#modal1">Agregar elementos a aula</button>
        <div class="modal2" id="modal1">
            <div class="modal-content2">
                <div class="close">
                    <h1>agregar elemento a aula </h1>
                    <button class="close-button2">x</button>
                </div>
                <form id="form2" method="post">
                    <div>
                        <p class="aula">Aula:</p>
                        <select name="" id="lista-aulas2">
                            <option value="0">Aula</option>
                        </select>
                    </div>
                    <div>
                        <p class="">Categoria</p>

                        <select id="lista-opciones2">
                            <option value="o">Escoger</option>
                        </select>

                    </div>
                    <div>
                        <p class="marca">Marca:</p>
                        <select id="select-datos2">
                            <option value="o">Escoger</option>
                        </select>
                    </div>


                    <div>
                        <p class="">Elemento</p>
                        <select name="" id="select-elementos2">
                            <option value="0">Producto</option>
                        </select>
                    </div>

                    <button id="crear" class="crear_a" value="enviar">cargar</button>
                </form>




            </div>
        </div>

    </main>

    <footer>
        <p>ADSO 2023</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- agrega un elemento -->
    <script src="../asset/js/add_e.js"></script>
    <!-- rellena el el selector de categorias con datos -->
    <script src="../asset/js/elemnt.js"></script>
    <!-- abre las ventanas para editar los valores, aún sin funcionar -->
    <script src="../asset/js/modal.js"></script>

    <!-- rellena el valor del selector de aulas  -->
    <script src="../asset/js/all_a_e.js"></script>
    <!-- agrega el elemento a un aula  -->
    <script src="../asset/js/add-a-e.js"></script>

</body>

</html>