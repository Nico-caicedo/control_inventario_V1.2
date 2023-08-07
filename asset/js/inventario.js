window.addEventListener('DOMContentLoaded', function() {
  // Muestra todos los contenidos por defecto
  var contenidos = document.getElementsByClassName('contenido');
  for (var i = 0; i < contenidos.length; i++) {
    contenidos[i].style.display = 'block';
  }
});

function mostrarContenido(numero) {
  var contenido = document.getElementById('contenido' + numero);

  // Si el contenido ya está visible, ocultarlo
  if (contenido.style.display === 'block') {
    contenido.style.display = 'none';
  } else {
    // Oculta todos los contenidos
    var contenidos = document.getElementsByClassName('contenido');
    for (var i = 0; i < contenidos.length; i++) {
      contenidos[i].style.display = 'none';
    }

    // Muestra el contenido seleccionado
    contenido.style.display = 'block';
  }
}
