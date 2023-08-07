$(document).ready(function() {
    $("#Form").on("submit", function(e) {
      e.preventDefault(); // Evita el envío del formulario por defecto
      
      var input = $("#name").val();
      if (input === "") {
        $("#error-message").text("El campo está vacío, por favor ingrese un valor");
         // Eliminar el evento "submit" del formulario para evitar que se vuelva a enviar después de mostrar el mensaje de error
      $(this).off("submit");
      } else {
        $.ajax({
          type: "POST",
          url: "enviar-datos.php",
          data: $(this).serialize(),
          success: function(response) {
            // Haz algo aquí si el envío de datos es exitoso
          }
        });
      }
    });
  });
  
  
  
  
