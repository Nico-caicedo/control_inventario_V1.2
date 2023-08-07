$(document).ready(function () {
    // Llamar al archivo PHP que obtiene los ambientes
    $.ajax({
        url: "../controllers/call_a.php",
        type: "GET",
        success: function (response) {
            // Insertar los ambientes en el contenedor
            $("#ambientes-container").prepend(response);
        },
        error: function (xhrñ, status, error) {
            console.log("Error al cargar los ambientes: " + error);
        }
    });
});