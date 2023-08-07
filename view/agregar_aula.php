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
    <link rel="stylesheet" href="../asset/css/agregar_aula.css">
    <title>Crear Aula</title>
</head>

<body>
    <nav class="container_boton">
    <h1 id="big">Sistema gestor de inventario</h1>
    <h2 id="small">sgi</h1>

            <ul id="menu">
                <li> <a href="inventario.php" class="no_selec">Inventario</a></li>

                <li> <a href="agregar_aula.php" class="select">Aulas</a></li>
                <li><a href="agregar_elemento.php">elementos</a></li>
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

                    <th>Nombre de aula</th>
                    <th>código</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody class="body_table" id="show-a">


                </tbody>
            </table>

        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="../asset/js/add.js"></script>
    <script src="../asset/js/validar.js"></script>
</body>

</html>