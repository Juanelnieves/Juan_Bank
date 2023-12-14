<?php
include_once '../controller/recuperar_info_usuario.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Usuario</title>
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



    <div class="container my-4">
        <h2>Configuración de Usuario</h2>

        <!-- Mostrar la foto de perfil actual -->
        <div class="row mb-4">
            <div class="col-12">
                <label>Foto de Perfil Actual:</label>
                <div>
                    <img src="<?php echo htmlspecialchars($fotoPerfilActual); ?>" alt="Foto de perfil" class="img-fluid" style="max-width: 200px; height: auto;">
                </div>
            </div>
        </div>

        <form action="../controller/actualizar_usuario.php" method="post" enctype="multipart/form-data">
            <!-- Foto de perfil -->
            <div class="mb-3">
                <label for="userPhoto" class="form-label">Foto de Perfil:</label>
                <input type="file" class="form-control" id="userPhoto" name="userPhoto" accept="image/*">
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="dni">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="<?php echo htmlspecialchars($dniActual); ?>">
                </div>
                <div class="col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo htmlspecialchars($emailActual); ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="<?php echo htmlspecialchars($direccionActual); ?>">
                </div>
                <div class="col-md-6">
                    <label for="codigoPostal">Código Postal:</label>
                    <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="<?php echo htmlspecialchars($codigo_postalActual); ?>">
                </div>

            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="<?php echo htmlspecialchars($ciudadActual); ?>">
                </div>
                <div class="col-md-6">
                    <label for="provincia">Provincia:</label>
                    <input type="text" class="form-control" id="provincia" name="provincia" placeholder="<?php echo htmlspecialchars($provinciaActual); ?>">
                </div>

            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pais">País:</label>
                    <input type="text" class="form-control" id="pais" name="pais" placeholder="<?php echo htmlspecialchars($paisActual); ?>">
                </div>
                <div class="col-md-6">
                    <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" placeholder="<?php echo htmlspecialchars($fechaNacimientoActual); ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>