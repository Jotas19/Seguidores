<?php
session_start();
$tipoUsuario = $_SESSION['tipo_usuario'];
$acción = "editar_lider";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguidores - Registrador</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="src/bootstrap-icons-1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <style>
        .header {
            background-color: #6a006a;
            color: white;
        }

        .btn-orange {
            background-color: #ff6600;
            border-color: #ff6600;
        }

        .btn-orange:hover {
            background-color: #6a006a;
            border-color: #e65c00;
            color: #f7f2f2;
        }

        .btn-orange:focus,
        .btn-orange.focus {
            box-shadow: 0 0 0 0.2rem rgba(161, 16, 197, 0.5);
        }

        .btn-orange.disabled,
        .btn-orange:disabled {
            background-color: #ff6600;
            border-color: #ff6600;
        }
    </style>

</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Seguidores</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php if($_SESSION['tipo_usuario'] === "registrador" || $_SESSION['tipo_usuario'] === "visualizador"){echo "disabled";} ?>" href="admin.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registrador.php">Registrar Datos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="visualizador.php">Visualizacion de Datos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($_SESSION['tipo_usuario'] === "registrador" || $_SESSION['tipo_usuario'] === "visualizador"){echo "disabled";} ?>" href="#">Gestión de Usuarios</a>
                        </li>
                        <li class="nav-item dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                Bienvenido, <?php echo $_SESSION['nombre']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navbar-toggler dropdown d-none d-lg-flex justify-content-end">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        Bienvenido, <?php echo $_SESSION['nombre']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>



<div class="d-flex align-items-center justify-content-center vh-100 ">
<div class="card slide-in">
        <div class="card-header">
            <h5 class="card-title text-center">Editar líder</h5>
        </div>
        <div class="card-body">
        

            <form action="editar.php" method="POST">
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                        <div class="mb-3">
                        <label for="inputIdLider" class="form-label">ID de Líder</label>
                        <input type="text"  autocomplete="off" class="form-control" id="inputIdLider" name="inputIdLider">
                    </div>

                    <div class="mb-3">
                        <label for="inputNombreLider" class="form-label">Nombre del Líder</label>
                        <input type="text"  autocomplete="off" class="form-control" id="inputNombreLider" name="inputNombreLider">
                    </div>

                    <div class="mb-3">
                        <label for="inputDireccionLider" class="form-label">Dirección del Líder</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputDireccionLider" name="inputDireccionLider">
                    </div>

                    <div class="mb-3">
                        <label for="inputTelefonoLider" class="form-label">Teléfono del Líder</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputTelefonoLider" name="inputTelefonoLider">
                    </div>

                    <div class="mb-3">
                        <label for="inputNombreCoordinador" class="form-label">Nombre del Coordinador</label>
                        <input type="text"  autocomplete="off" class="form-control" id="inputNombreCoordinador" name="inputNombreCoordinador">
                    </div>



                <button type="submit" class="btn btn-orange">Editar</button>
            </form>
        </div>
    </div>
    </div>



</body>

</html>
