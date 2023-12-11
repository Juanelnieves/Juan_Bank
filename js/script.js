document.addEventListener('DOMContentLoaded', function() {
    const addForm = document.getElementById('addForm');
    const withdrawForm = document.getElementById('withdrawForm');

    const handleResponse = (data) => {
        alert(data.message); 
        if (data.status === 'success') {
            // Asegúrate de que 'data.userSaldo' esté presente en la respuesta
            document.getElementById('userSaldo').innerText = `${data.userSaldo}€`;
        }
    }


    if (addForm) {
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
    }

    if (withdrawForm) {
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
    }
});