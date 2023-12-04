document.addEventListener('DOMContentLoaded', function () {
    var passwordInput = document.getElementById('password');
    var passwordProgress = document.getElementById('password-progress');
    var MIN_PASSWORD_LENGTH = 8;

    passwordInput.addEventListener('input', function() {
        var progress = passwordInput.value.length;
        var remainingChars = MIN_PASSWORD_LENGTH - progress;
        var strengthText = 'Falta: ' + (remainingChars > 0 ? remainingChars : 0) + ' caracteres, ' + 
            (/[A-Z]/.test(passwordInput.value) ? '' : '1 mayúscula, ') +
            (/[a-z]/.test(passwordInput.value) ? '' : '1 minúscula, ') +
            (/[0-9]/.test(passwordInput.value) ? '' : '1 número.');

        // Actualizar el texto del indicador de progreso
        passwordProgress.textContent = strengthText;
    });

    var form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        var nombre = document.getElementById('nombre').value.trim();
        var apellido = document.getElementById('apellido').value.trim();
        var email = document.getElementById('email').value.trim();
        var password = passwordInput.value;
        var confirm_password = document.getElementById('confirm_password').value;

        // Validaciones
        if (!isFormValid(nombre, apellido, email, password, confirm_password)) {
            event.preventDefault();
            return false;
        }
        return true; // Si todas las validaciones pasan, el formulario se enviará.
    });
});

function isFormValid(nombre, apellido, email, password, confirm_password) {
    // Validar Nombre
    if (nombre === '') {
        alert('Por favor, introduce tu nombre.');
        return false;
    }

    // Validar Apellido
    if (apellido === '') {
        alert('Por favor, introduce tu apellido.');
        return false;
    }

    // Validar Email
    if (email === '') {
        alert('Por favor, introduce tu correo electrónico.');
        return false;
    } else if (!validateEmail(email)) {
        alert('Por favor, introduce un correo electrónico válido.');
        return false;
    }

    // Validar Contraseña
    if (!isPasswordStrong(password)) {
        alert('La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula y un número.');
        return false;
    }

    // Validar que las contraseñas coincidan
    if (password !== confirm_password) {
        alert('Las contraseñas no coinciden.');
        return false;
    }

    return true;
}

function validateEmail(email) {
    var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(String(email).toLowerCase());
}

function isPasswordStrong(password) {
    var minLength = password.length >= MIN_PASSWORD_LENGTH;
    var hasUpperCase = /[A-Z]/.test(password);
    var hasLowerCase = /[a-z]/.test(password);
    var hasNumbers = /[0-9]/.test(password);
    return minLength && hasUpperCase && hasLowerCase && hasNumbers;
}
