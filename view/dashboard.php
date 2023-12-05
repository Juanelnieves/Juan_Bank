<?php include_once '../controller/recogida_datos.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard del Banco</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../styles/css/styles.css" rel="stylesheet">
</head>

<body>

  <!-- Botón para activar la barra lateral desplegable -->
  <button class="btn btn-danger" type="button" id="sidebarToggle">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Barra Lateral Desplegable tipo Offcanvas -->
  <div class="sidebar bg-dark text-white" id="sidebar">
    <!-- Contenido de la barra lateral offcanvas -->
    <div class="offcanvas-header">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Neo Bank</span>
      </a>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    </div>

  </div>

  <!-- Contenido Principal -->
  <div class="main-content" id="mainContent">
    <!-- Barra Superior de Configuración del Usuario y más contenido... -->
    <div class="bank-banner bg-success text-white text-center py-3">
      <h1>Bienvenido a Neo Bank</h1>
    </div>

    <!-- Mensaje de Bienvenida y Tarjeta de Estilo Bancario -->
    <div class="container my-5">
      <div class="welcome-message mb-4">
        <h2>Hola <strong><?php echo htmlspecialchars($userName); ?></strong>, hoy es <strong><?php echo date("l"); ?></strong> <strong><?php echo date("j"); ?></strong> de <strong><?php echo date("F Y"); ?></strong>.</h2>
      </div>

      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Detalles de la Cuenta</h5>
          <p>Saldo: <strong><?php echo htmlspecialchars($userSaldo); ?>€</strong></p>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      <a href="../controller/logout.php" class="btn btn-warning">Cerrar Sesión</a>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>

</body>

</html>