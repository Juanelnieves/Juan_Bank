<!doctype html>
<html lang="en">

<head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../styles/css/home-styles.css" rel="stylesheet">    
    <link href="../styles/css/register-styles.css" rel="stylesheet">    
</head>

<body>
    <div class="navbar">
        <div class="navbar-brand">NEO</div>
        <div>
            <a href="index.php" class="nav-item login">Home</a>
            <a href="register.php" class="nav-item signup">Sign Up</a>
            <a href="login.php" class="nav-item login">Login</a>
        </div>
    </div>

    <main>
        <div class="form-container">
            <div class="form-header">
                <h1>Register</h1>
            </div>
            <form class="form-body" method="post" action="../controller/register.php">
                <label for="nombre" class="form-label">Name</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Your Name" required>

                <label for="apellido" class="form-label">Surname</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Your Surname" required>

                <label for="email" class="form-label">Mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" required>

                <label for="dni" class="form-label">DNI</label>
                <input type="dni" class="form-control" id="dni" name="dni" placeholder="12345678" required>

                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <div id="password-progress">8 caracteres restantes para alcanzar 8, 1 mayúscula, 1 minúscula, 1 número.</div>

                <label for="confirm_password" class="form-label">Repeat Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>

                <button type="submit">Register</button>
            </form>
            <div class="form-footer">
                <a href="login.php" class="login">Login</a>
            </div>
        </div>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../js/validacion_registro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>