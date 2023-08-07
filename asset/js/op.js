function mostrarContenido() {
    var select = document.getElementById("selectOpciones");
    var opcionSeleccionada = select.value;

    var contenidoOpcion1 = document.getElementById("contenidoOpcion1");
    var contenidoOpcion2 = document.getElementById("contenidoOpcion2");
    var contenidoOpcion3 = document.getElementById("contenidoOpcion3");

    contenidoOpcion1.style.display = "none";
    contenidoOpcion2.style.display = "none";
    contenidoOpcion3.style.display = "none";

    if (opcionSeleccionada === "4") {
        contenidoOpcion1.style.display = "block";
    } else if (opcionSeleccionada === "3") {
        contenidoOpcion2.style.display = "block";
    } else if (opcionSeleccionada === "opcion3") {
        contenidoOpcion3.style.display = "block";
    }
}