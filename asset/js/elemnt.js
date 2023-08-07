document.addEventListener("DOMContentLoaded", function () {


 
  var selectOpciones = document.getElementById("selectOpciones");
  var selectDatos = document.getElementById("select-datos");
  var selectDato = document.getElementById("select-dato");

  // Agregamos un listener al evento change del primer select
  selectOpciones.addEventListener("change", function () {
    // Obtenemos el id de la opción seleccionada

    var idOpcion = selectOpciones.value;
    console.log(idOpcion);
    // Hacemos la petición AJAX para obtener los datos relacionados
    var xhrDatos = new XMLHttpRequest();
    xhrDatos.open("GET", "../controllers/datos.php?id_opcion=" + idOpcion);
    xhrDatos.onreadystatechange = function () {
      // de acuerdo a la categoria que se escoja rellenara un select con
      // con las opciones que esten registradas a esa categoria
      if (idOpcion == 4) {
        if (
          xhrDatos.readyState === XMLHttpRequest.DONE &&
          xhrDatos.status === 200
        ) {
          // Parseamos la respuesta JSON
          var datos = JSON.parse(xhrDatos.responseText);
        
          // Borramos las opciones anteriores del segundo select
          selectDatos.innerHTML = "";

          // Recorremos los datos y los añadimos al select
          datos.forEach(function (dato) {
            var option = document.createElement("option");
            option.value = dato.id;
            option.text = dato.nombre;
            selectDatos.appendChild(option);
          });
        }
      } else if (idOpcion == 3) {
        if (
          xhrDatos.readyState === XMLHttpRequest.DONE &&
          xhrDatos.status === 200
        ) {
          // Parseamos la respuesta JSON
          var datos = JSON.parse(xhrDatos.responseText);
      
          // Borramos las opciones anteriores del segundo select
          selectDato.innerHTML = "";

          // Recorremos los datos y los añadimos al select
          datos.forEach(function (dato) {
            var option = document.createElement("option");
            option.value = dato.id;
            option.text = dato.nombre;
            selectDato.appendChild(option);
          });
        }
      }
    };
    xhrDatos.send();
  });

  // Función para rellenar el segundo select con los datos devueltos
  function rellenarSelectDatos(datos) {
    // Borramos las opciones anteriores del segundo select
    selectDatos.innerHTML = "";

    // Recorremos los datos y los añadimos al select
    datos.forEach(function (dato) {
      var option = document.createElement("option");
      option.value = dato.id;
      option.text = dato.nombre;
      selectDatos.appendChild(option);
    });
  }
});
