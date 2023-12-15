<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/css/home-styles.css" rel="stylesheet">

</head>

<body>

    <div class="navbar">
        <div class="navbar-brand">NEO</div>
        <div>
            <a href="index.php" class="nav-item signup">Home</a>
            <a href="register.php" class="nav-item signup">Sign Up</a>
            <a href="login.php" class="nav-item login">Login</a>
        </div>
    </div>

    <div class="login-container">
        <div class="login-header">
            <img loading="lazy" srcset="https://cdn.builder.io/api/v1/image/assets%2Faccc33d4b1c0439f94b5d6fee6daf0c3%2Fb847471e01bd40e78828b2b66a141f20?width=100 100w, https://cdn.builder.io/api/v1/image/assets%2Faccc33d4b1c0439f94b5d6fee6daf0c3%2Fb847471e01bd40e78828b2b66a141f20?width=200 200w, https://cdn.builder.io/api/v1/image/assets%2Faccc33d4b1c0439f94b5d6fee6daf0c3%2Fb847471e01bd40e78828b2b66a141f20?width=400 400w, https://cdn.builder.io/api/v1/image/assets%2Faccc33d4b1c0439f94b5d6fee6daf0c3%2Fb847471e01bd40e78828b2b66a141f20?width=800 800w, https://cdn.builder.io/api/v1/image/assets%2Faccc33d4b1c0439f94b5d6fee6daf0c3%2Fb847471e01bd40e78828b2b66a141f20?width=1200 1200w, https://cdn.builder.io/api/v1/image/assets%2Faccc33d4b1c0439f94b5d6fee6daf0c3%2Fb847471e01bd40e78828b2b66a141f20?width=1600 1600w, https://cdn.builder.io/api/v1/image/assets%2Faccc33d4b1c0439f94b5d6fee6daf0c3%2Fb847471e01bd40e78828b2b66a141f20?width=2000 2000w, https://cdn.builder.io/api/v1/image/assets%2Faccc33d4b1c0439f94b5d6fee6daf0c3%2Fb847471e01bd40e78828b2b66a141f20" class="header-img" />
            <h1>NEO</h1>
        </div>
        <form class="login-form" method="POST" action="../controller/login.php">
            <input type="email" name="email" placeholder="Enter your Email" required>
            <input type="password" name="password" placeholder="Enter your Password" required>
            <button type="submit">Login</button>
            <a href="register.php" class="sign-up">Sign Up</a>
        </form>
    </div>

    <script src="../js/validacion_login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>