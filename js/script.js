document.addEventListener('DOMContentLoaded', function() {
  const addForm = document.getElementById('addForm');
  const withdrawForm = document.getElementById('withdrawForm');

  const handleResponse = (data) => {
      alert(data.message); // Aquí puedes reemplazar esto por un modal personalizado
      if (data.status === 'success') {
          location.reload(); // O actualiza los componentes necesarios de tu página
      }
  };

  addForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(addForm);
      fetch('../controller/añadir_saldo.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.json())
      .then(handleResponse);
  });

  withdrawForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(withdrawForm);
      fetch('../controller/retirar_saldo.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.json())
      .then(handleResponse);
  });
});
