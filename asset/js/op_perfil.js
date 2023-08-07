function mostrarModal(opcion) {
    const modal = document.getElementById('modal');
    const modalText = document.getElementById('modal-text');
    modalText.textContent = opcion;
    modal.style.display = 'flex';
  }

  function cerrarModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
  }