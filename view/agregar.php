<?php
include('../controllers/conexion.php');
if (isset($_POST['enviar'])) {

    $aula = $_POST['aula'];
    $cod = $_POST['cod'];
    $ubi = $_POST['ubicacion'];

    $insert = "INSERT INTO aulas( nombre_aula, ubicacion, cod) VALUES ('$aula', '$ubi', '$cod')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        echo "<script>
        Swal.fire(
            {

                icon:'question',
                html: 'elemento agragado',
                backdrop: false,
                toast: true,
                timer:3000,
                background: 'green',
                padding: '1rem',
                position:'bottom',
                customClass: {
                    popup: 'my-popup-class',
                    icon: 'icon',
                  },
                showConfirmButton: false,

            }
        )
        </script>";
    }

}

?>