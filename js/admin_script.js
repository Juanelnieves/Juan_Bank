document.addEventListener('DOMContentLoaded', () => {
    loadUserData();
    loadLoanData();
});

function loadUserData() {
    fetch("../controller/get_info_users.php")
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta de get_info_users.php');
            }
            return response.json();
        })
        .then(users => displayUsers(users))
        .catch(error => {
            console.error('Error al cargar datos de usuarios:', error);
            alert('Hubo un error al cargar los datos de los usuarios.');
        });
}

function loadLoanData() {
    fetch("../controller/get_loan.php")
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta de get_loan.php');
            }
            return response.json();
        })
        .then(data => {
            const requestsContainer = document.getElementById('loanRequests');
            const requestsHTML = data.map(request => {
                return `
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
            }).join('');
            requestsContainer.innerHTML = requestsHTML;
        })
        .catch(error => {
            console.error('Error al cargar datos de préstamos:', error);
            alert('Hubo un error al cargar los datos de los préstamos.');
        });
}

function displayUsers(users) {
    if (!Array.isArray(users)) {
        console.error('La respuesta no es un array:', users);
        return;
    }

    const usersContainer = document.getElementById('usersData');

    // Crear div contenedor responsivo
    const responsiveTableContainer = document.createElement('div');
    responsiveTableContainer.className = 'table-responsive';

    // Crear tabla
    const table = document.createElement('table');
    table.className = 'table table-striped';

    // Crear cabecera de la tabla
    const thead = document.createElement('thead');
    thead.innerHTML = `
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Fecha de Nacimiento</th>
            <th>Dirección</th>
            <th>Código Postal</th>
            <th>Ciudad</th>
            <th>Provincia</th>
            <th>País</th>
            <th>IBAN</th>
            <th>Es Admin</th>
            <th>Saldo</th>
            <th>Moneda Preferida</th>
        </tr>
    `;
    table.appendChild(thead);

    // Crear cuerpo de la tabla
    const tbody = document.createElement('tbody');
    users.forEach(user => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.nombre}</td>
            <td>${user.apellido}</td>
            <td>${user.dni}</td>
            <td>${user.email}</td>
            <td>${user.fecha_nacimiento}</td>
            <td>${user.direccion}</td>
            <td>${user.codigo_postal}</td>
            <td>${user.ciudad}</td>
            <td>${user.provincia}</td>
            <td>${user.pais}</td>
            <td>${user.iban}</td>
            <td>${user.es_admin ? 'Sí' : 'No'}</td>
            <td>${user.saldo}</td>
            <td>${user.moneda_preferida}</td>
            <!-- Agrega aquí más celdas según los datos de usuario -->
        `;
        tbody.appendChild(row);
    });
    table.appendChild(tbody);

    // Agregar la tabla al div contenedor responsivo
    responsiveTableContainer.appendChild(table);

    // Agregar el contenedor responsivo al contenedor principal
    usersContainer.appendChild(responsiveTableContainer);
}




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
