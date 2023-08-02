<?php
session_start();
$tipoUsuario = $_SESSION['tipo_usuario'];
$acción = "editar_votante";


$conexion = mysqli_connect("localhost", "root", "", "seguidores");
   $SQL = "SELECT * FROM votantes";
   $dato = mysqli_query($conexion, $SQL);
   $posicion_votante = isset($_POST['posicionvotante']) ? $_POST['posicionvotante'] : null;
   if (isset($_POST['posicionvotante']) && !empty($posicion_votante)) {
     
     
     // Verificamos si hay datos en la consulta
     if ($dato && mysqli_num_rows($dato) > 0) {
         // Reiniciamos el puntero de la consulta al principio
         mysqli_data_seek($dato, 0);
         
         // Iteramos sobre los resultados
         while ($fila = mysqli_fetch_array($dato)) {
             if ($posicion_votante == 1) { // En la primera iteración, encontramos el resultado deseado

                $id_votante_encontrado = $fila['id_votante'];
                $nombre_votante_encontrado = $fila['nombre_votante'];
                $direccion_casa_votante_encontrado = $fila['direccion_casa_votante'];
                $nombre_lider_encontrado = $fila['nombre_lider'];
                $lugar_votante_encontrado = $fila['lugar_votante'];
                $mesa_encontrada = $fila['mesa'];
                 
                 // Puedes detener el bucle si ya encontraste el resultado deseado
                 break;
             }
             $posicion_votante--; // Decrementamos la posición para continuar buscando
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
            <h5 class="card-title text-center">Editar votante</h5>
        </div>
        <div class="card-body">
        <form action="editar.php" method="POST">
        <input type="hidden" name="accion" value="<?php echo $accion; ?>">

                    <div class="mb-3">
    <label for="inputIdVotante" class="form-label">ID de Votante</label>
    <input type="text" autocomplete="off" class="form-control" id="inputIdVotante" name="inputIdVotante" value="<?php echo $id_votante_encontrado; ?>">
            </div>
            <div class="mb-3">
                <label for="inputNombreVotante" class="form-label">Nombre del Votante</label>
                <input type="text" autocomplete="off" class="form-control" id="inputNombreVotante" name="inputNombreVotante" value="<?php echo $nombre_votante_encontrado; ?>">
            </div>
            <div class="mb-3">
                <label for="inputDireccionCasaVotante" class="form-label">Dirección del Votante</label>
                <input type="text" autocomplete="off" class="form-control" id="inputDireccionCasaVotante" name="inputDireccionCasaVotante" value="<?php echo $direccion_casa_votante_encontrado; ?>">
            </div>
            <div class="mb-3">
                <label for="inputNombreLider" class="form-label">Nombre del Líder</label>
                <select class="form-select" id="inputNombreLider" name="inputNombreLider">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "seguidores";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Error en la conexión: " . $conn->connect_error);
                    }

                    $sql = "SELECT nombre_lider FROM lider";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $selected = ($row['nombre_lider'] == $nombre_lider_encontrado) ? "selected" : "";
                            echo '<option value="' . $row['nombre_lider'] . '" ' . $selected . '>' . $row['nombre_lider'] . '</option>';
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="inputLugarVotante" class="form-label">Lugar del Votante</label>
                <select class="form-select" id="inputLugarVotante" name="inputLugarVotante">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "seguidores";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Error en la conexión: " . $conn->connect_error);
                    }

                    $sql = "SELECT lugar_votante FROM lugar";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $selected = ($row['lugar_votante'] == $lugar_votante_encontrado) ? "selected" : "";
                            echo '<option value="' . $row['lugar_votante'] . '" ' . $selected . '>' . $row['lugar_votante'] . '</option>';
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="inputMesa" class="form-label">Mesa</label>
                <input type="text" autocomplete="off" class="form-control" id="inputMesa" name="inputMesa" value="<?php echo $mesa_encontrada; ?>">
            </div>
            <button type="submit" class="btn btn-orange">Editar</button>

                </form>
        </div>
    </div>
    </div>



</body>

</html>