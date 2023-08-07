$(document).ready(function () {
  // Configuramos la petición AJAX para obtener las opciones
  function fetchData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../controllers/call_a.php");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        var opciones = JSON.parse(xhr.responseText);
        var select = document.getElementById("select-ambiente");
        select.innerHTML = ""; // Limpiamos las opciones existentes
        
        opciones.forEach(function (opcion) {
          var option = document.createElement("option");
          option.value = opcion.id_aula;
          option.text = opcion.nombre;
          select.appendChild(option);
        });
      }
    };
    xhr.send();
  }
  
  // Función para verificar cambios cada cierto intervalo de tiempo
  function checkForChanges() {
    fetchData(); // Llamar a la función para obtener los datos
  
    // Definir el intervalo para verificar cambios (por ejemplo, cada 5 segundos)
    setInterval(fetchData, 10000);
  }
  
  // Llamar a la función inicial para verificar cambios
  checkForChanges();



  // Función para mostrar los elementos en la tabla de inventario
  // función para obtener los datos del inventario según el ambiente seleccionado
  function obtenerDatosInventario(idAmbiente) {
    return $.ajax({
      url: '../controllers/estado.php',
      method: 'POST',
      data: { idAmbiente: idAmbiente }

    });

  }

  // función para actualizar la tabla con los datos del inventario
  function actualizarTablaInventario(datos) {
    // obtener referencia a la tabla
    const tabla = $('#tabla_inventario tbody');

    // limpiar tabla antes de agregar los nuevos datos
    tabla.empty();

    // iterar por cada fila de datos y crear una nueva fila en la tabla
    datos.forEach(dato => {
      const fila = `<tr>
      <td>${dato.id}</td>
      <td>${dato.nombre_aula}</td>
      <td>${dato.nombre_categoria}</td>
      <td>${dato.nombre_elemento}</td>
      <td>${dato.nombre_marca}</td>
      <td>${dato.estado}</td>
    </tr>`;
      tabla.append(fila);
    });
  }

  // evento change del selector de ambiente
  $('#select-ambiente').on('change', function () {
    // obtener el valor seleccionado
    const idAmbiente = $(this).val();
    
    // obtener los datos del inventario según el ambiente seleccionado
    obtenerDatosInventario(idAmbiente).done(function (response) {
      // convertir la respuesta JSON en un arreglo de objetos
      var datos = JSON.stringify(response);
      datos = JSON.parse(datos)
    
      // actualizar la tabla con los nuevos datos
      actualizarTablaInventario(datos);
    });
  });



});
