document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        // Obtener valores de los campos del formulario
        var email = document.getElementById('email').value.trim();
        var password = document.getElementById('password').value;

        // Validar Email
        if (email === '') {
            alert('Por favor, introduce tu correo electrónico.');
            event.preventDefault(); // Prevenir que el formulario se envíe
            return false;
        } else if (!validateEmail(email)) {
            alert('Por favor, introduce un correo electrónico válido.');
            event.preventDefault(); // Prevenir que el formulario se envíe
            return false;
        }

        // Validar Contraseña
        if (password === '') {
            alert('Por favor, introduce tu contraseña.');
            event.preventDefault(); // Prevenir que el formulario se envíe
            return false;
        }

        // Si todo está bien, el formulario se enviará.
        return true;
    });
});

// Función para validar el correo electrónico con una expresión regular
function validateEmail(email) {
    var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(String(email).toLowerCase());
}
