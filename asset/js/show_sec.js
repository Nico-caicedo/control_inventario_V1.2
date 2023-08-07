document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('seccion-1').style.display = 'block';
  
    document.querySelectorAll('button[data-target]').forEach(function(boton) {
      boton.addEventListener('click', function() {
        var target = this.dataset.target;
        document.querySelectorAll('[id^="seccion-"]').forEach(function(seccion) {
          if (seccion.id === target) {
            seccion.style.display = 'block';
          } else {
            seccion.style.display = 'none';
          }
        });
      });
    });

    

  });

