window.onload = function () {
    fetch("../controller/get_loan.php")
        .then(response => response.json())
        .then(data => {
            const requestsContainer = document.getElementById('loanRequests');
            data.forEach(request => {
                requestsContainer.innerHTML += `
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Solicitud #${request.id}</h5>
                        <p>Cantidad solicitada: ${request.cantidad}</p>
                        <p>Motivo: ${request.motivo}</p>
                        <div id="loanTerms${request.id}" style="display: none;">
                            <input type="number" id="paymentAmount${request.id}" placeholder="Cantidad del Pago" min="1">
                            <input type="number" id="paymentFrequency${request.id}" placeholder="Frecuencia (días)" min="1">
                        </div>
                        <button onclick="toggleLoanTerms(${request.id})">Definir Términos</button>
                        <button onclick="manageLoan(${request.id}, 'aprobar')">Aprobar</button>
                        <button onclick="manageLoan(${request.id}, 'rechazar')">Rechazar</button>
                    </div>
                </div>
            `;
            });
        });
};

function toggleLoanTerms(id) {
    const termsDiv = document.getElementById(`loanTerms${id}`);
    termsDiv.style.display = termsDiv.style.display === 'none' ? 'block' : 'none';
}

function manageLoan(id, action) {
    let paymentAmount, paymentFrequency;
    if (action === 'aprobar') {
        paymentAmount = document.getElementById(`paymentAmount${id}`).value;
        paymentFrequency = document.getElementById(`paymentFrequency${id}`).value;
        if (!paymentAmount || !paymentFrequency) {
            alert('Por favor, defina los términos del préstamo.');
            return;
        }
    }

    fetch("../controller/manage_loan.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id, action, paymentAmount, paymentFrequency })
    })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        });
}


