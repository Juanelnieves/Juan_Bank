<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Gestión </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/css/styles.css" rel="stylesheet">

</head>

<body>
    <!-- Barra de Navegación y Banner -->
  <div class="bank-banner">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <!-- Botón para activar la barra lateral desplegable -->
        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <a href="/" class="navbar-brand ms-3">Neo Bank</a>        
      </div>
    </nav>
    <div class="text-center py-2">
      <h1 class="text-black">Bienvenido a NEO</h1>
    </div>
  </div>

  <!-- Barra Lateral Desplegable tipo Offcanvas -->
  <div class="offcanvas offcanvas-start bg-dark text-white" id="sidebar" tabindex="-1" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Neo Bank</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="d-flex justify-content-center align-items-center" style="height: 5 0vh;">
        <a href="../controller/logout.php" class="btn btn-warning">Cerrar Sesión</a>
    </div>
    </div>
  </div>

    <div class="container my-4">
        <h2>Datos de los Usuarios</h2>
        <div id="usersData" class="row">
            <!-- Los datos de los usuarios se cargarán aquí -->
        </div>
    </div>

    <div class="container my-4">
        <h2>Gestión de Préstamos</h2>
        <div id="loanRequests">
            <!-- Los préstamos se cargarán aquí -->
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/admin_script.js"></script>

</body>

</html>