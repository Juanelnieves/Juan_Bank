<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Gestión </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

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

    <div class="d-flex justify-content-end">
        <a href="../controller/logout.php" class="btn btn-warning">Cerrar Sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/admin_script.js"></script>

</body>

</html>