const modalButtons = document.querySelectorAll('.modal-button2');
const closeButtons = document.querySelectorAll('.close-button2');
const modals = document.querySelectorAll('.modal2');

modalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const targetModal = document.querySelector(button.dataset.modalTarget);
    targetModal.style.display = 'block';
  });
});

closeButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.modal2');
    modal.style.display = 'none';
  });
});

modals.forEach(modal => {
  modal.addEventListener('click', (event) => {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
});




