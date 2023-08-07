
$(document).ready(function(){
// funciona para llamar los ambientes a select

// Creamos una instancia del objeto XMLHttpRequest
var xhrr = new XMLHttpRequest();

// Configuramos la petición
xhrr.open("GET", "../controllers/all_a_e.php");

// Definimos la función que se ejecutará cuando la respuesta esté lista
xhrr.onreadystatechange = function () {
    if (xhrr.readyState === XMLHttpRequest.DONE && xhrr.status === 200) {
        // Parseamos la respuesta JSON
        var opciones = JSON.parse(xhrr.responseText);

        // Referenciamos la etiqueta select
        var select = document.getElementById("lista-aulas2");
        
        // Recorremos las opciones y las añadimos al select
        opciones.forEach(function (opcion) {
            var option = document.createElement("option");
            option.value = opcion.id_aula;
            option.text = opcion.nombre;
            select.appendChild(option);
        });
    }
};

// Enviamos la petición
xhrr.send();





//  ---funciona para llamar las categorias a una selec
// Creamos una instancia del objeto XMLHttpRequest
var xhr = new XMLHttpRequest();

// Configuramos la petición
xhr.open("GET", "../controllers/opciones.php");

// Definimos la función que se ejecutará cuando la respuesta esté lista
xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Parseamos la respuesta JSON
        var opciones = JSON.parse(xhr.responseText);

        // Referenciamos la etiqueta select
        var select = document.getElementById("lista-opciones2");
        
        // Recorremos las opciones y las añadimos al select
        opciones.forEach(function (opcion) {
            var option = document.createElement("option");
            option.value = opcion.id;
            option.text = opcion.nombre;
            select.appendChild(option);
        });
    }
};

// Enviamos la petición
xhr.send();






// rellena el segundo select

// Referenciamos los elementos select
var selectOpciones = document.getElementById("lista-opciones2");
var selectDatos = document.getElementById("select-datos2");

// Agregamos un listener al evento change del primer select
selectOpciones.addEventListener("change", function () {
    // Obtenemos el id de la opción seleccionada
    var idOpcion = selectOpciones.value;

    // Hacemos la petición AJAX para obtener los datos relacionados
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../controllers/datos.php?id_opcion=" + idOpcion);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Parseamos la respuesta JSON
            var datos = JSON.parse(xhr.responseText);

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
    };
    xhr.send();
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



//funciona para llamar los elementos relacionados a categoria y elemento

var selectElementos = document.getElementById("select-elementos2");

// Agregamos un listener al evento change del segundo select
selectDatos.addEventListener("change", function () {
    // Obtenemos los ids de las opciones seleccionadas
    var idCategoria = selectOpciones.value;
    var idMarca = selectDatos.value;
    
    // Hacemos la petición AJAX para obtener los datos relacionados
    var xh = new XMLHttpRequest();
    xh.open("GET", "../controllers/elementos.php?id_categoria=" + idCategoria + "&id_marca=" + idMarca);
    xh.onreadystatechange = function () {
        if (xh.readyState === XMLHttpRequest.DONE && xh.status === 200) {
            // Parseamos la respuesta JSON
            var elementos = JSON.parse(xh.responseText);
            
            // Borramos las opciones anteriores del tercer select
            selectElementos.innerHTML = "";

            // Recorremos los datos y los añadimos al select
            elementos.forEach(function (elemento) {
                var option = document.createElement("option");
                option.value = elemento.id_elemento;
                option.text = elemento.nombre_elemento;
                selectElementos.appendChild(option);
                console.log(option);
            });
           
        }
    };
    xh.send();
});


})
