<?php
include_once '../controller/recuperar_info_usuario.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos del Usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/css/styles.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

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
            <div class="config-section mt-3">
                <a href="movimientos_user.php" class="btn btn-link text-white">Movimientos</a>
            </div>
        </div>
    </div>

    <!--Movimientos del Usuario-->
    <div class="container my-5">
        <h2>Movimientos del Usuario</h2>
        <div class="table-responsive">
            <table class="table table-hover" id="tablaMovimientos">
                <thead class="table-dark">
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody id="movimientosBody">
                    <!-- Los datos se cargarán aquí via JavaScript -->
                </tbody>
            </table>
        </div>
    </div>


    <!--Visualizacion de Préstamos-->
    <div class="container my-5">
        <h3>Mis Préstamos</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cantidad Total</th>
                        <th>Estado</th>
                        <th>Cantidad Restante</th>
                        <th>Fecha Vencimiento</th>
                    </tr>
                </thead>
                <tbody id="loanList">
                    <!-- Los préstamos se cargarán aquí -->
                </tbody>
            </table>
        </div>
    </div>

   

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/script_movimientos.js"></script>
    </body>

</html>