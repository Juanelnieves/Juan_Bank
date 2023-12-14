document.addEventListener("DOMContentLoaded", function () {
    cargarPrestamos();
    cargarMovimientos();
});

function cargarMovimientos() {
    const tablaMovimientos = document.getElementById('tablaMovimientos');
    if (!tablaMovimientos) {
        console.error('Elemento tablaMovimientos no encontrado');
        return;
    }

    fetch('../controller/movimientos.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Respuesta del servidor no es OK');
            }
            if (!response.headers.get("content-type").includes("application/json")) {
                throw new Error('Respuesta no es JSON');
            }
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data)) {
                throw new Error("La respuesta no es un arreglo");
            }
            const tbody = tablaMovimientos.getElementsByTagName('tbody')[0];
            data.forEach(mov => {
                let fila = tbody.insertRow();
                fila.insertCell().textContent = mov.fecha_hora;
                fila.insertCell().textContent = mov.tipo;
                fila.insertCell().textContent = mov.cantidad;
                fila.insertCell().textContent = mov.concepto;
            });
        })
        .catch(error => {
            console.error('Error procesando la respuesta:', error);
        });
}

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