document.addEventListener('DOMContentLoaded', function () {
    cargarPrestamos();
    cargarOpcionesPrestamo();
    const addForm = document.getElementById('addForm');
    const withdrawForm = document.getElementById('withdrawForm');

    const handleResponse = (data) => {
        alert(data.message);
        if (data.status === 'success') {
            document.getElementById('userSaldo').innerText = `${data.userSaldo}€`;
        }
    }


    if (addForm) {
        addForm.addEventListener('submit', function (e) {

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
        withdrawForm.addEventListener('submit', function (e) {
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

    document.getElementById('requestLoanForm').addEventListener('submit', function (event) {
        var loanAmount = document.getElementById('loanAmount').value;
        var loanReason = document.getElementById('loanReason').value;

        if (loanAmount <= 0 || loanReason.trim() === '') {
            alert("La cantidad debe ser mayor que cero.");
            event.preventDefault();
            return false;
        }
    });


    document.getElementById('makeLoanPaymentForm').addEventListener('submit', function (event) {
        event.preventDefault();
        var paymentAmount = document.getElementById('paymentAmount').value;
        var loanId = document.getElementById('loanId').value;

        if (paymentAmount <= 0 || loanId.trim() === '') {
            alert("Por favor, selecciona un préstamo válido y especifica un monto de pago correcto.");
            return;
        }

        fetch('../controller/realizar_pago_prestamo.php', {
            method: 'POST',
            body: new FormData(this)
        })
            .then(response => response.json())
            .then(data => {
                alert(data);
            })
            .catch(error => console.error('Error:', error));
    });


    const requestLoanForm = document.getElementById('requestLoanForm');
    const makeLoanPaymentForm = document.getElementById('makeLoanPaymentForm');

    if (requestLoanForm) {
        requestLoanForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);
            fetch('../controller/solicitar_prestamo.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un error al procesar tu solicitud.');
                });
        });
    }

    if (makeLoanPaymentForm) {
        makeLoanPaymentForm.addEventListener('submit', function (event) {
        });
    }
});

function cargarPrestamos() {
    fetch('../controller/get_user_loan.php')
        .then(response => response.json())
        .then(prestamos => {
            const loanList = document.getElementById('loanList');
            prestamos.forEach(prestamo => {
                loanList.innerHTML += `
                    <tr>
                        <td>${prestamo.id}</td>
                        <td>${prestamo.cantidad}</td>
                        <td>${prestamo.estado}</td>
                        <td>${prestamo.cantidad_restante}</td>
                        <td>${formatDate(prestamo.fecha_vencimiento)}</td>
                    </tr>
                `;
            });
        })
        .catch(error => {
            console.error('Error al cargar préstamos:', error);
        });
}

function formatDate(dateString) {
    const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

function cargarOpcionesPrestamo() {
    fetch('../controller/get_user_loan.php')
        .then(response => response.json())
        .then(prestamos => {
            const loanSelect = document.getElementById('loanId');
            prestamos.forEach(prestamo => {
                if (prestamo.estado === 'aprobado') {
                    loanSelect.innerHTML += `<option value="${prestamo.id}">${prestamo.id} - ${prestamo.cantidad}€ - Pendiente: ${prestamo.cantidad_restante}€</option>`;
                }
            });
        })
        .catch(error => console.error('Error al cargar préstamos:', error));
}
