<!doctype html>
<html lang="en">

<head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Lexend', sans-serif;
            background-color: #0d0d0d;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .navbar {
            position: absolute;
            top: 0;
            width: 100%;
            background-color: #111;
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 1rem;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 500;
            color: #caff33;
        }

        .nav-item {
            padding: 0.5rem 1rem;
            margin-left: 0.5rem;
            border-radius: 0.3rem;
            font-weight: 500;
            text-decoration: none;
            color: #fff;
        }

        .nav-item.signup {
            background-color: #caff33;
            color: #121212;
        }

        .nav-item.login {
            background-color: transparent;
            color: #caff33;
        }

        .nav-item:hover {
            opacity: 0.8;
        }

        .form-container {
            background: #1c1c1c;
            border-radius: 8px;
            padding: 40px;
            margin-top: 60px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 640px;
        }

        .form-header h1 {
            color: #e4e4e7;
            font-size: 24px;
            text-align: center;
            margin: 20px 0;
        }

        .form-body input,
        .form-body .form-control {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #FFFFFF;
            border: none;
            border-radius: 5px;
            color: #0d0d0d;
            font-size: 16px;
        }

        .form-body .form-label {
            color: #e4e4e7;
            margin-bottom: 5px;
        }

        .form-body button {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #caff33;
            color: #1c1c1c;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }


        .form-body button:hover {
            background-color: #b3cc2a;
        }

        .form-body #password-progress {
            color: #e4e4e7;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .form-footer {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .login {
            color: #e4e4e7;
            text-decoration: none;
        }
    </style>
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