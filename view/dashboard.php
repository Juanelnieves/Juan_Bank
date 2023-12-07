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

  <!-- Barra de Navegación y Banner -->
  <div class="bank-banner bg-success">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <!-- Botón para activar la barra lateral desplegable -->
        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <a href="/" class="navbar-brand ms-3">Neo Bank</a>

        <!-- Menú Desplegable para Cambiar Moneda -->
        <div class="dropdown ms-auto">
          <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownCurrencyButton" data-bs-toggle="dropdown" aria-expanded="false">
            Cambiar Moneda
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownCurrencyButton">
            <form action="../controller/cambiar_divisa.php" method="post">
              <li><button class="dropdown-item" type="submit" name="currency" value="EUR">Euro (EUR)</button></li>
              <li><button class="dropdown-item" type="submit" name="currency" value="USD">Dólar (USD)</button></li>
              <li><button class="dropdown-item" type="submit" name="currency" value="JPY">Yen (JPY)</button></li>
              <li><button class="dropdown-item" type="submit" name="currency" value="GBP">Libra (GBP)</button></li>
              <li><button class="dropdown-item" type="submit" name="currency" value="RUB">Rublo (RUB)</button></li>
            </form>
          </ul>
        </div>
      </div>
    </nav>
    <div class="text-center py-2">
      <h1 class="text-white">Bienvenido a NEO</h1>
    </div>
  </div>

  <!-- Barra Lateral Desplegable tipo Offcanvas -->
  <div class="offcanvas offcanvas-start bg-dark text-white" id="sidebar">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Neo Bank</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <!-- Contenido de la sidebar aquí -->
    </div>
  </div>
  <!-- Contenido Principal -->
  <div class="main-content" id="mainContent">

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

      <div class="row">
        <!-- Formulario para Añadir Saldo -->
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Añadir Saldo</h5>
              <form action="../controller/añadir_saldo.php" method="post">
                <div class="mb-3">
                  <label for="addAmount" class="form-label">Cantidad</label>
                  <input type="number" class="form-control" id="addAmount" name="addAmount" min="0.01" step="0.01" required>
                </div>
                <div class="mb-3">
                  <label for="addConcept" class="form-label">Concepto</label>
                  <input type="text" class="form-control" id="addConcept" name="addConcept" required>
                </div>
                <button type="submit" class="btn btn-success">Añadir Saldo</button>
              </form>
            </div>
          </div>
        </div>

        <!-- Formulario para Retirar Saldo -->
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Retirar Saldo</h5>
              <form action="../controller/retirar_saldo.php"  id="withdrawForm" method="post">
                <div class="mb-3">
                  <label for="withdrawAmount" class="form-label">Cantidad</label>
                  <input type="number" class="form-control" id="withdrawAmount" name="withdrawAmount" min="0.01" step="0.01" required>
                </div>
                <div class="mb-3">
                  <label for="withdrawConcept" class="form-label">Concepto</label>
                  <input type="text" class="form-control" id="withdrawConcept" name="withdrawConcept" required>
                </div>
                <div class="modal" id="conceptModal">
                  <div class="modal-content">
                    <input type="text" id="conceptInput" placeholder="Ingresa un concepto para la transacción">
                    <button id="confirmTransaction">Confirmar</button>
                  </div>
                </div>
                <button type="submit" class="btn btn-danger">Retirar Saldo</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="d-flex justify-content-end">
      <a href="../controller/logout.php" class="btn btn-warning">Cerrar Sesión</a>
    </div>



    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/cambiar_divisa.js"></script>
    <script src="../js/script.js"></script>

</body>

</html>