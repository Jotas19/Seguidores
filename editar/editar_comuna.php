<?php
session_start();
$tipoUsuario = $_SESSION['tipo_usuario'];
$accion = "editar_comuna";
$posicion_comuna = $_POST['posicion_editar'];





$conexion = mysqli_connect("localhost", "root", "", "seguidores");
   $SQL = "SELECT * FROM comuna";
   $dato = mysqli_query($conexion, $SQL);
   $posicion_comuna = isset($_POST['posicion_editar']) ? $_POST['posicion_editar'] : null;
   if (isset($_POST['posicion_editar']) && !empty($posicion_comuna)) {
     
     
     // Verificamos si hay datos en la consulta
     if ($dato && mysqli_num_rows($dato) > 0) {
         // Reiniciamos el puntero de la consulta al principio
         mysqli_data_seek($dato, 0);
         
         // Iteramos sobre los resultados
         while ($fila = mysqli_fetch_array($dato)) {
             if ($posicion_comuna == 1) { // En la primera iteración, encontramos el resultado deseado
                 $id_comuna_encontrado = $fila['id_comuna'];
                 $nombre_lugar_encontrado = $fila['nombre_lugar'];
                 
                 // Puedes detener el bucle si ya encontraste el resultado deseado
                 break;
             }
             $posicion_comuna--; // Decrementamos la posición para continuar buscando
         }
 
         if (isset($id_comuna_encontrado)) {
             // Ahora puedes utilizar los valores encontrados según tus necesidades
             
         } else {
             echo "No se encontró ningún resultado en la posición especificada.";
         }
     } else {
         echo "No se encontraron resultados.";
     }
 } else {
     echo "No se especificó una posición válida.";
 }
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

    <?php

?>

    <div class="d-flex align-items-center justify-content-center vh-100 ">
    <div class="card slide-in">
        <div class="card-header">
            <h5 class="card-title text-center">Crear Comuna</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="../functions/editar_comuna.php"> <!-- Asegúrate de agregar method="POST" aquí -->
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                <div class="mb-3">
                <label for="inputIdComuna" class="form-label">ID de Comuna</label>
                <input type="text" autocomplete="off" class="form-control" id="inputIdComuna" name="inputIdComuna" value="<?php echo $id_comuna_encontrado; ?>">
                    </div>
                <div class="mb-3">
                <label for="inputNombreLugarFK" class="form-label">Nombre del Lugar FK</label>
                <input type="text" autocomplete="off" class="form-control" id="inputNombreLugarFK" name="inputNombreLugarFK" value="<?php echo $nombre_lugar_encontrado; ?>">
                </div>
                <button type="submit" name="editar_comuna" class="btn btn-orange d-block mx-auto">Editar</button>
            </form>
        </div>
    </div>
    </div>





</body>

</html>
