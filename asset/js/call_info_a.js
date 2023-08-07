$(document).ready(function() {

    // Evento de clic para las opciones de ambiente
    $(document).on("click", ".one", function() {
        var ambienteId = $(this).attr("id");
     
        // Realizar la consulta a la base de datos utilizando AJAX
        $.ajax({
            url: "../controllers/call_info_a.php",
            type: "GET",
            data: { ambienteId: ambienteId },
            dataType: "json",
            success: function(response) {
                // Mostrar el contenido correspondiente
                mostrarContenido(response);

                enviarConsulta_M(response.id);

                enviarConsulta_T(response.id);
            },
            error: function(xhr, status, error) {
                console.log("Error al consultar la base de datos: " + error);
            }
        });
    });

    // Obtener el primer elemento disponible y mostrar su contenido al cargar la página
    var primerElemento = $(".one:first");
    if (primerElemento.length > 0) {
        var primerAmbienteId = primerElemento.attr("id");
        obtenerContenido(primerAmbienteId);
    }

    function obtenerContenido(ambienteId) {
        // Realizar la consulta a la base de datos utilizando AJAX
        $.ajax({
            url: "../controllers/call_info_a.php",
            type: "GET",
            data: { ambienteId: ambienteId },
            dataType: "json",
            success: function(response) {
                // Mostrar el contenido correspondiente
                mostrarContenido(response);

                enviarConsulta_T(response.id);
                enviarConsulta_M(response.id);
            },
            error: function(xhr, status, error) {
                console.log("Error al consultar la base de datos: " + error);
            }
        });
    }

    function mostrarContenido(response) {
        $("#id").val(response.id)
        $("#nombre").text(response.nombre);
        $("#codigo").text("Cod. " + response.codigo);
        $("main div").show();
    }


    function enviarConsulta_T(id) {
        // Realizar la consulta a la base de datos utilizando AJAX
        $.ajax({
            url: "../controllers/consulta.php",
            type: "GET",
            data: { id: id },
            dataType: "json",
            success: function(response) {
                // Procesar los elementos recibidos de la base de datos
                procesarTecnologia(response);
               
            },
            error: function(xhr, status, error) {
                console.log("Error al consultar la base de datos: " + error);
            }
        });
    }

    

    function procesarTecnologia(response) {
        if (response.length === 0) {
            // Display a message when there are no elements
            $("#tableBody").html("<tr><td colspan='3'>Sin elementos asignados</td></tr>");
        } else {
            var rowsHtml = ""; // Variable to store the HTML markup for rows
            
            // Loop through the response data
            for (var i = 0; i < response.length; i++) {
                var element = response[i];
                
                // Generate HTML markup for each row
                var rowHtml = "<tr>";
                // rowHtml += "<td>" + element.id_tecnologia + "</td>";
                rowHtml += "<td>" + element.name_T+ "</td>";
                rowHtml += "<td>" + element.cod_T + "</td>";
                // Add more cells for other properties as needed
                rowHtml += "</tr>";
                
                // Append the row HTML to the rowsHtml variable
                rowsHtml += rowHtml;
            }
            
            // Append the rowsHtml to the table body or any other container element
            $("#tableBody").html(rowsHtml);
        }
    }
    

    function enviarConsulta_M(id) {
        // Realizar la consulta a la base de datos utilizando AJAX
        $.ajax({
            url: "../controllers/consulta_M.php",
            type: "GET",
            data: { id: id },
            dataType: "json",
            success: function(response) {
                // Procesar los elementos recibidos de la base de datos
                procesarMuebles(response);
               
            },
            error: function(xhr, status, error) {
                console.log("Error al consultar la base de datos: " + error);
            }
        });
    }
    

    function procesarMuebles(response) {
        if (response.length === 0) {
            // Display a message when there are no elements
            $("#tableBody2").html("<tr><td colspan='3'>Sin elementos asignados</td></tr>");
        } else {
            var rowsHtml = ""; // Variable to store the HTML markup for rows
            
            // Loop through the response data
            for (var i = 0; i < response.length; i++) {
                let element = response[i];
                
                // Generate HTML markup for each row
                let rowHtml = "<tr>";
                // rowHtml += "<td>" + element.id_tecnologia + "</td>";
                rowHtml += "<td>" + element.name+ "</td>";
                rowHtml += "<td>" + element.code + "</td>";
                // Add more cells for other properties as needed
                rowHtml += "</tr>";
                
                // Append the row HTML to the rowsHtml variable
                rowsHtml += rowHtml;
            }
            
            // Append the rowsHtml to the table body or any other container element
            $("#tableBody2").html(rowsHtml);
        }
    }
    

});
