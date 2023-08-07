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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="../asset/css/agregar.css">
</head>

<body onload="mostrarContenido()">
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
                echo "<li><a href='ajustes.php'>usuarios</a></li>";
            }

            ?>


            <li> <a href="../controllers/cerrar.php" class="no_selec">cerrar sesión</a></li>



        </ul>

        <img class="burger" src="../asset/img/menu.svg" alt="">
    </nav>
    <main>
        <header>
            <button class="boton_change" id="boton-seccion-1" data-target="seccion-1">Elementos</button>
            <button class="boton_change" id='boton-seccion-2' data-target='seccion-2'>Ambientes</button>

        </header>
        <main>

            <div id="seccion-1">
                <div class="opc">
                    <select id="selectOpciones" onchange="mostrarContenido()">
                        <option value="4">Tecnología</option>
                        <option value="3">Muebles</option>
                        <option value="opcion3">Electrodomesticos</option>
                    </select>
                    <i></i>
                </div>


                <div class="show_opc">


                    <div class="forms" id="contenidoOpcion1" style="display:none;">
                        <!-- Permite agregar elementos  -->

                        <h2>Tecnología</h2>
                        <form class="formularios" id='form_e' method="post">

                            <div class="columns">


                                <div class="column1">
                                    <div>
                                        <p class="marca">marca:</p>
                                        <select id="select-datos">
                                            <option value="o">escoger</option>
                                        </select>
                                    </div>

                                    <div>
                                        <input type="hidden" id="id_e">
                                        <p class="nombre">Nombre de equipo:</p>
                                        <input type="text" id="name_e" name="nombre">
                                    </div>




                                    <div>
                                        <p class="modelo">codigo:</p>
                                        <input type="number" id="cod_e">
                                    </div>
                                </div>


                                <div class="column2">
                                    <div>

                                        <p class="estado">descripción:</p>
                                        <input type="text" name='estado_e' id='descripcion_e'>
                                    </div>


                                    <div>
                                        <p class="">modelo</p>
                                        <input type="text" id="modelo_e">
                                    </div>
                                    <div>
                                        <p class="marca">ubicacion:</p>
                                        <select id="select-ubicacion">
                                            <option value="o">escoger</option>
                                        </select>
                                    </div>

                                </div>
                            </div>






                            <input class="boton_enviar" id="crear_e" type="submit" name="submit_agregar" value="CREAR">
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

                    <div class="forms" id="contenidoOpcion2" style="display:none;">
                        <h2>Muebles</h2>
                        <div class="opcionesT">
                            <form class="formularios" id="form_m" action="" method="post">
                                <div>
                                    <p class="marca">marca:</p>
                                    <select id="select-dato">
                                        <option value="o">escoger</option>
                                    </select>
                                </div>

                                <div>
                                    <input type="hidden" id="id_m">
                                    <label for="">Nombre</label>
                                    <input type="text" id="name_m">
                                </div>

                                <div>
                                    <label for="">Código</label>
                                    <input type="number" id="code_m" id="">
                                </div>
                                <div>
                                    <label for="">Color</label>
                                    <input type="text" id="color">
                                </div>

                                <div>
                                    <label for="">valor de adquisición</label>
                                    <input type="number" id="valor">
                                </div>

                                <div>
                                    <label for="">mantenimiento</label>
                                    <input type="text" id="estado">

                                </div>

                                <div>
                                    <label for="">Descripción</label>
                                    <input type="text" id="descripcion_m">
                                </div>
                                <div>
                                    <p class="marca">ubicacion:</p>
                                    <select id="select-ubicaciones">
                                        <option value="o">escoger</option>
                                    </select>
                                </div>
                                <input type="submit" name="crear_m" value="crear_m" id="crear_m">


                            </form>
                            <div class="list-aula">

                                <table>
                                    <thead>

                                        <th>Nombre de elemento</th>
                                        <th>código</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody class="body_table" id="show-m">


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="forms" id="contenidoOpcion3" style="display:none;">
                    <h2>Electrodomesticos</h2>
                    <div>
                        <form action="" method="post">
                            <label>Nombre</label>
                            <input type="text">

                        </form>

                    </div>
                </div>


            </div>
            </div>
            </div>

            <div id="seccion-2">
                <div class="add_aula">
                    <div class="form_container">

                        <form action="" class="form" id='form'>
                            <p class="form_header">Crear Ambiente</p>
                            <div class="form-input">
                                <input type="hidden" id="id">
                                <input type="text" id="name" placeholder="Nombre">
                                <span id="error-message"></span>
                            </div>

                            <div class="form-input">

                                <input type="number" id="cod" placeholder="Código">
                            </div>
                            <button class="boton" id="crear">Crear</button>
                            <div id="alert">

                            </div>
                        </form>
                    </div>
                    <div class="list-aula">
                        <table>
                            <thead>

                                <th>Ambiente</th>
                                <th>código</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody class="body_table" id="show-a">


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </main>
    </main>

    <script src="../asset/js/show_sec.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="../asset/js/add.js"></script>
    <script src="../asset/js/validar.js"></script>
    <script src="../asset/js/op.js"></script>
    <script src="../asset/js/call_ambiente.js"></script>
    <!-- agrega un elemento -->
    <script src="../asset/js/add_e.js"></script>
    <script src="../asset/js/add_m.js"></script>
    <!-- rellena el el selector de categorias con datos -->
    <script src="../asset/js/elemnt.js"></script>
    <!-- abre las ventanas para editar los valores, aún sin funcionar -->
    <script src="../asset/js/modal.js"></script>
  
  
</body>
<footer>

</footer>

</html>