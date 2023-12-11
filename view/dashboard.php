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
  <link href="../styles/css/credit_card.css" rel="stylesheet">

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
  <div class="offcanvas offcanvas-start bg-dark text-white" id="sidebar" tabindex="-1" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Neo Bank</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="config-section mt-3">
        <a href="dashboard.php" class="btn btn-link text-white">Inicio</a>
      </div>
      <div class="config-section mt-3">
        <a href="configuracion.php" class="btn btn-link text-white">Configuración</a>
      </div>
    </div>
  </div>
  <!-- Contenido Principal -->
  <div class="main-content" id="mainContent">

    <!-- Mensaje de Bienvenida y Tarjeta de Estilo Bancario -->
    <div class="container my-5">
      <div class="welcome-message mb-4">
        <h2>Hola <strong><?php echo htmlspecialchars($userName); ?></strong>, hoy es <strong><?php echo date("l"); ?></strong> <strong><?php echo date("j"); ?></strong> de <strong><?php echo date("F Y"); ?></strong>.</h2>
      </div>

      <div class="d-flex justify-content-around flex-wrap">
        <!-- Detalles de la Cuenta -->
        <div class="container my-5">
          <div class="row">
            <!-- Detalles de la Cuenta - Uso de columnas responsivas -->
            <div class="col-lg-6 col-md-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Detalles de la Cuenta</h5>
                  <p>Saldo: <strong id="userSaldo"><?php echo htmlspecialchars($userSaldo); ?>€</strong></p>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-12">

              <section id="credit_card" class="credit_card">
                <div id="highlight"></div>
                <section class="credit_card__front">
                  <div class="credit_card__header">
                    <div>CreditCard</div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40" width="60" id="svg895" version="1.1" viewBox="-96 -98.908 832 593.448">
                      <path id="rect887" display="inline" fill="#ff5f00" stroke-width="5.494" d="M224.833 42.298h190.416v311.005H224.833z" />
                      <path id="path889" d="M244.446 197.828a197.448 197.448 0 0175.54-155.475 197.777 197.777 0 100 311.004 197.448 197.448 0 01-75.54-155.53z" fill="#eb001b" stroke-width="5.494" />
                      <path id="path891" d="M621.101 320.394v-6.372h2.747v-1.319h-6.537v1.319h2.582v6.373zm12.691 0v-7.69h-1.978l-2.307 5.493-2.308-5.494h-1.977v7.691h1.428v-5.823l2.143 5h1.483l2.143-5v5.823z" class="e" fill="#f79e1b" stroke-width="5.494" />
                      <path id="path893" d="M640 197.828a197.777 197.777 0 01-320.015 155.474 197.777 197.777 0 000-311.004A197.777 197.777 0 01640 197.773z" class="e" fill="#f79e1b" stroke-width="5.494" />
                    </svg>
                  </div>
                  <div id="credit_card_number" class="credit_card__number">
                    <span>#<br></span>
                    <span>#<br></span>
                    <span>#<br></span>
                    <span>#<br></span>

                    <span>#<br></span>
                    <span>#<br></span>
                    <span>#<br></span>
                    <span>#<br></span>

                    <span>#<br></span>
                    <span>#<br></span>
                    <span>#<br></span>
                    <span>#<br></span>

                    <span>#<br></span>
                    <span>#<br></span>
                    <span>#<br></span>
                    <span>#<br></span>
                  </div>
                  <div class="credit_card__footer">
                    <div class="credit_card__holder">
                      <div class="credit_card__section__title">Card Holder</div>
                      <div id="credit_card_holder">Name on card</div>
                    </div>
                    <div class="credit_card__expires">
                      <div class="credit_card__section__title">Expires</div>
                      <span id="credit_card_expires_month">MM</span>/<span id="credit_card_expires_year">YY</span>
                    </div>
                  </div>
                </section>
                <section class="credit_card__back">
                  <div class="credit_card__hide_line"></div>

                  <div class="credit_card_cvv">
                    <span>CVV</span>
                    <div id="credit_card_cvv_field" class="credit_card_cvv_field"></div>
                  </div>
                </section>
              </section>
            </div>
          </div>

          <br>

          <div class="row">
            <!-- Formulario para Añadir Saldo -->
            <div class="col-md-6">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">Añadir Saldo</h5>
                  <form id="addForm" action="../controller/añadir_saldo.php" method="post">
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
                  <form action="../controller/retirar_saldo.php" id="withdrawForm" method="post">
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
        <script src="../js/bank_card.js"></script>

</body>

</html>