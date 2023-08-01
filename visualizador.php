<?php
session_start();

// Verificar si el usuario ha iniciado sesión y el tipo de usuario
if (isset($_SESSION['tipo_usuario']) && ($_SESSION['tipo_usuario'] === 'visualizador' || $_SESSION['tipo_usuario'] === 'registrador' || $_SESSION['tipo_usuario'] === 'administrador')) {
    // Página exclusiva para el visualizador, registrador y administrador

    // Función para obtener la conexión a la base de datos
    function getDatabaseConnection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "seguidores";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        return $conn;
    }

    // Obtener la conexión a la base de datos
    $conn = getDatabaseConnection();

    // Procesar el filtrado de resultados si se envió el formulario para "Lugar"
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["lugarSubmit"])) {
        // Obtener los valores del filtro de "Lugar"
        $lugarVotante = $_POST["lugarVotanteSelect"];
        $direccion = $_POST["direccionSelect"];
        $cantidadMesas = $_POST["cantidadMesasSelect"];
        $comuna = $_POST["comunaSelect"];

        // Construir consulta SQL con filtros para "Lugar"
        $sqlLugar = "SELECT * FROM lugar WHERE 1=1";

        if ($lugarVotante !== "") {
            $sqlLugar .= " AND lugar_votante = '$lugarVotante'";
        }

        if ($direccion !== "") {
            $sqlLugar .= " AND direccion_lugar = '$direccion'";
        }

        if ($cantidadMesas !== "") {
            $sqlLugar .= " AND cantidad_mesas = '$cantidadMesas'";
        }

        if ($comuna !== "") {
            $sqlLugar .= " AND comuna = '$comuna'";
        }

        $resultLugar = $conn->query($sqlLugar);
    }

// Procesar el filtrado de resultados si se envió el formulario para "Comuna"
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["comunaSubmit"])) {
    // Obtener los valores del filtro de "Comuna"
    $nombreLugarFk = $_POST["nombreLugarFkSelect"];
    $id_comuna = $_POST["idcomuna"];

    // Construir consulta SQL con filtros para "Comuna"
    $sqlComuna = "SELECT * FROM comuna WHERE 1=1";

    if ($id_comuna !== "") {
        $sqlComuna .= " AND id_comuna = '$id_comuna'";
    }
    if ($nombreLugarFk !== "") {
        $sqlComuna .= " AND nombre_lugar = '$nombreLugarFk'";
    }

    $resultComuna = $conn->query($sqlComuna);
}

// Procesar el filtrado de resultados si se envió el formulario para "Coordinador"
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["coordinadorSubmit"])) {

    $id_cordinador = $_POST["idCoordinador"];
    $nombre_cordinador = $_POST["nombreCoordinador"];
    $direccion_cordinador = $_POST["direccionCoordinador"];
    $telefono_cordinador = $_POST["telefonoCoordinador"];


    $sqlCordinador = "SELECT * FROM cordinador WHERE 1=1";

    if ($id_cordinador !== "") {
        $sqlCordinador .= " AND id_cordinador = '$id_cordinador'";
    }
    if ($nombre_cordinador !== "") {
        $sqlCordinador .= " AND nombre_cordinador = '$nombre_cordinador'";
    }
    if ($direccion_cordinador !== "") {
        $sqlCordinador .= " AND direccion_cordinador = '$direccion_cordinador'";
    }
    if ($telefono_cordinador !== "") {
        $sqlCordinador .= " AND telefono_cordinador = '$telefono_cordinador'";
    }

    $resultCordinador = $conn->query($sqlCordinador);
}

// Procesar el filtrado de resultados si se envió el formulario para "Líder"
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["liderSubmit"])) {

    $id_lider = $_POST["idlider"];
    $nombre_lider = $_POST["nombrelider"];
    $direccion_lider = $_POST["direccionLider"];
    $telefono_lider = $_POST["telefonoLider"];
    $nombre_cordinador = $_POST["nombreCoordinadorLider"];

    $sqlLider = "SELECT * FROM lider WHERE 1=1";

    if ($id_lider !== "") {
        $sqlLider .= " AND id_lider = '$id_lider'";
    }
    if ($nombre_lider !== "") {
        $sqlLider .= " AND nombre_lider = '$nombre_lider'";
    }
    if ($direccion_lider !== "") {
        $sqlLider .= " AND direccion_lider = '$direccion_lider'";
    }
    if ($telefono_lider !== "") {
        $sqlLider .= " AND telefono_lider = '$telefono_lider'";
    }
    if ($nombre_cordinador !== "") {
        $sqlLider .= " AND nombre_cordinador = '$nombre_cordinador'";
    }

    $resultLider = $conn->query($sqlLider);
}

// Procesar el filtrado de resultados si se envió el formulario para "votantes"
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["votanteSubmit"])) {

    $id_votante = $_POST["idvotante"];
    $nombre_votante = $_POST["nombrevotante"];
    $direccion_casa_votante = $_POST["direccioncasavotante"];
    $nombre_lider = $_POST["nombrelidervotante"];
    $lugar_votante = $_POST["lugarvotante"];
    $mesa = $_POST["mesavotante"];

    $sqlvotantes = "SELECT * FROM votantes WHERE 1=1";

    if ($id_votante !== "") {
        $sqlvotantes .= " AND id_votante = '$id_votante'";
    }
    if ($nombre_votante !== "") {
        $sqlvotantes .= " AND nombre_votante = '$nombre_votante'";
    }
    if ($direccion_casa_votante !== "") {
        $sqlvotantes .= " AND direccion_casa_votante = '$direccion_casa_votante'";
    }
    if ($nombre_lider !== "") {
        $sqlvotantes .= " AND nombre_lider = '$nombre_lider'";
    }
    if ($lugar_votante !== "") {
        $sqlvotantes .= " AND lugar_votante = '$lugar_votante'";
    }
    if ($mesa !== "") {
        $sqlvotantes .= " AND mesa = '$mesa'";
    }

    $resultvotantes = $conn->query($sqlvotantes);
}

} else {
    // Redirigir a la página de inicio de sesión si no está autenticado
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<script src="js/script.js"></script>
<link href="css/style.css" rel="stylesheet">
<link href="src/bootstrap-icons-1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguidores - Visualizador</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="src/bootstrap-icons-1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <style>
        /* Estilos personalizados */
        .nav-tabs .nav-link {
            color: orange; 
        }
        .card-footer .page-link {
            color: orange; /* Cambia el color del enlace a naranja */
            color: orange;
        }

        .card-footer .page-link:hover {
            color: purple; /* Cambia el color del enlace en el estado de hover a amarillo */
            outline-color: purple;
        }
        .pagination .page-item.active .page-link {
  border-color: purple;
  background-color: purple;
  color: white;
}

        /* ... Resto de estilos personalizados ... */
    </style>
</head>

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

                                .btn-orange:focus, .btn-orange.focus {
                                 box-shadow: 0 0 0 0.2rem rgba(161, 16, 197, 0.5); 
                                }

                                .btn-orange.disabled, .btn-orange:disabled {
                                background-color: #ff6600; 
                                border-color: #ff6600; 
                                }
</style>


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
                    <a class="nav-link <?php if($_SESSION['tipo_usuario'] === "visualizador"){echo "disabled";} ?>" href="registrador.php">Registrar Datos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="visualizador.php">Visualizacion de Datos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if($_SESSION['tipo_usuario'] === "registrador" || $_SESSION['tipo_usuario'] === "visualizador"){echo "disabled";} ?>" href="#">Gestión de Usuarios</a>
                  </li>
                  <li class="nav-item dropdown d-lg-none ">
                    <a class="nav-link disableddropdown-toggle " href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
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

    <h1 class="h1 m-4 text-center slide-in">Bienvenido al portal de Visualizador</h1>

    <div class="container mt-5 slide-in">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#lugar_tab">Lugar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#comuna_tab">Comuna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tab4" data-bs-toggle="tab" href="#coordinador_tab">Coordinador</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tab5" data-bs-toggle="tab" href="#lider_tab">Líder</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tab6" data-bs-toggle="tab" href="#votantes_tab">Votantes</a>
          </li>
        </ul>
        <script>
  // Función para establecer la pestaña activa en el almacenamiento local.
  function guardarPestanaActiva() {
    var pestanaActiva = document.querySelector('.nav-link.active');
    if (pestanaActiva) {
      localStorage.setItem('pestanaActiva', pestanaActiva.id);
    }
  }

  // Función para restaurar la última pestaña activa desde el almacenamiento local.
  function restaurarPestanaActiva() {
    var pestanaGuardada = localStorage.getItem('pestanaActiva');
    if (pestanaGuardada) {
      var pestana = document.getElementById(pestanaGuardada);
      if (pestana) {
        pestana.click(); // Simula un clic en la pestaña guardada para activarla.
      }
    }
  }

  // Agregar un evento para guardar la pestaña activa cuando se haga clic en una pestaña.
  var pestanas = document.querySelectorAll('.nav-link');
  pestanas.forEach(function (pestana) {
    pestana.addEventListener('click', guardarPestanaActiva);
  });

  // Restaurar la última pestaña activa cuando se cargue la página.
  document.addEventListener('DOMContentLoaded', restaurarPestanaActiva);
</script>
        <div class="tab-content mt-2">
          <div class="tab-pane fade show active" id="lugar_tab">
            <h4>Lugar</h4>
            <p>Conozca toda la información relacionada al Lugar</p>

            <form action="visualizador.php" method="POST">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vista y Filtro</h5>
                        <div class="mb-3">
                            <label for="lugarVotanteSelect" class="form-label">Lugar del Votante</label>
                            <select class="form-select" id="lugarVotanteSelect" name="lugarVotanteSelect">
                                <option value="">Todos</option>
                                <?php
                                $sql = "SELECT DISTINCT lugar_votante FROM Lugar";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['lugar_votante'] . '">' . $row['lugar_votante'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        
        <div class="mb-3">
            <label for="direccionSelect" class="form-label">Dirección del Lugar</label>
            <select class="form-select" id="direccionSelect" name="direccionSelect">
                <option value="">Todos</option>
                <?php
                $sql = "SELECT DISTINCT direccion_lugar FROM Lugar";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['direccion_lugar'] . '">' . $row['direccion_lugar'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidadMesasSelect" class="form-label">Cantidad de Mesas</label>
            <select class="form-select" id="cantidadMesasSelect" name="cantidadMesasSelect">
                <option value="">Todos</option>
                <?php
                $sql = "SELECT DISTINCT cantidad_mesas FROM Lugar";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['cantidad_mesas'] . '">' . $row['cantidad_mesas'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="comunaSelect" class="form-label">Comuna</label>
            <select class="form-select" id="comunaSelect" name="comunaSelect">
                <option value="">Todos</option>
                <?php
                $sql = "SELECT DISTINCT comuna FROM Lugar";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['comuna'] . '">' . $row['comuna'] . '</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-orange" name="lugarSubmit">Filtrar</button>

        </div>
                </div>
            </div>

                  <!-- Mostrar resultados -->

                  <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Resultado de la Vista y Filtro</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Lugar del Votante</th>
                                    <th>Dirección del Lugar</th>
                                    <th>Cantidad de Mesas</th>
                                    <th>Comuna</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conexion = mysqli_connect("localhost", "root", "", "seguidores");
                                
                                // Obtener los valores del filtro si se ha enviado el formulario
                                $nombreVotante = isset($_POST['lugarVotanteSelect']) ? $_POST['lugarVotanteSelect'] : '';
                                $direccionLugar = isset($_POST['direccionSelect']) ? $_POST['direccionSelect'] : '';
                                $cantidadMesas = isset($_POST['cantidadMesasSelect']) ? $_POST['cantidadMesasSelect'] : '';
                                $comuna = isset($_POST['comunaSelect']) ? $_POST['comunaSelect'] : '';

                                // Construir consulta SQL con filtros
                                $SQL = "SELECT * FROM lugar WHERE 1=1";

                                if ($nombreVotante !== '') {
                                    $SQL .= " AND lugar_votante = '$nombreVotante'";
                                }
                                
                                if ($direccionLugar !== '') {
                                    $SQL .= " AND direccion_lugar = '$direccionLugar'";
                                }
                                
                                if ($cantidadMesas !== '') {
                                    $SQL .= " AND cantidad_mesas = '$cantidadMesas'";
                                }
                                
                                if ($comuna !== '') {
                                    $SQL .= " AND comuna = '$comuna'";
                                }


                    // Configuración de la paginación
                    $resultadosPorPagina = 10; // Número de resultados por página
                    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual (por defecto la primera)
                    $inicio = ($paginaActual - 1) * $resultadosPorPagina; // Registro de inicio para la consulta

                    $totalResultados = mysqli_num_rows(mysqli_query($conexion, $SQL)); // Total de resultados
                    $totalPaginas = ceil($totalResultados / $resultadosPorPagina); // Total de páginas

                    // Agregar el límite de resultados para la paginación
                    $SQL .= " LIMIT $inicio, $resultadosPorPagina";

                    $dato = mysqli_query($conexion, $SQL);

                    if (mysqli_num_rows($dato) > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            echo "<tr>";
                            echo "<td>" . $fila['lugar_votante'] . "</td>";
                            echo "<td>" . $fila['direccion_lugar'] . "</td>";
                            echo "<td>" . $fila['cantidad_mesas'] . "</td>";
                            echo "<td>" . $fila['comuna'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
                    }

                    mysqli_close($conexion);
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Selector de Páginas">
                                <ul class="pagination">
                                        <?php if ($paginaActual > 1) { ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?pagina=<?php echo $paginaActual - 1; ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                                            </li>
                                        <?php } else { ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                            </li>
                                        <?php } ?>

                                        <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                                            <?php if ($i == $paginaActual) { ?>
                                                <li class="page-item active" aria-current="page">
                                                    <a class="page-link" href="#"><?php echo $i; ?> <span class="visually-hidden">(Página actual)</span></a>
                                                </li>
                                            <?php } else { ?>
                                                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                            <?php } ?>
                                        <?php } ?>

                                        <?php if ($paginaActual < $totalPaginas) { ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
                                            </li>
                                        <?php } else { ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Siguiente</a>
                                            </li>
                                        <?php } ?>
                                        </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

     <!-- ...  contenidos de la Seccion Comuna ... -->

          <div class="tab-pane fade" id="comuna_tab">
            <h4>Comuna</h4>
            <p>Conozca toda la información relacionada al Comuna</p>

            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Filtrar Comuna</h5>


                        <form method="POST">
                            <div class="mb-3">
                                <label for="idcomuna" class="form-label">ID de la Comuna</label>
                                <select class="form-select" id="idcomuna" name="idcomuna">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT id_comuna FROM comuna";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id_comuna'] . '">' . $row['id_comuna'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nombreLugarFkSelect" class="form-label">Nombre de la comuna</label>
                                <select class="form-select" id="nombreLugarFkSelect" name="nombreLugarFkSelect">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT nombre_lugar FROM comuna";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['nombre_lugar'] . '">' . $row['nombre_lugar'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-orange" name="comunaSubmit">Filtrar</button>
                        </form>


                      </div>
                    </div>
                  </div>
<!-- Mostrar resultados -->
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Resultado de la Vista y Filtro</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID de Comuna</th>
                        <th>Nombre de la comuna</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "seguidores");

                    // Obtener los valores del filtro si se ha enviado el formulario
                    $id_comuna = isset($_POST['idcomuna']) ? $_POST['idcomuna'] : '';
                    $nombreLugarFk = isset($_POST['nombreLugarFkSelect']) ? $_POST['nombreLugarFkSelect'] : '';

                    // Construir consulta SQL con filtros
                    $SQL = "SELECT * FROM Comuna WHERE 1=1";

                    if ($id_comuna !== '') {
                        $SQL .= " AND id_comuna = '$id_comuna'";
                    }

                    if ($nombreLugarFk !== '') {
                        $SQL .= " AND nombre_lugar = '$nombreLugarFk'";
                    }


                      // Configuración de la paginación
                    $resultadosPorPagina = 10; // Número de resultados por página
                    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual (por defecto la primera)
                    $inicio = ($paginaActual - 1) * $resultadosPorPagina; // Registro de inicio para la consulta

                    $totalResultados = mysqli_num_rows(mysqli_query($conexion, $SQL)); // Total de resultados
                    $totalPaginas = ceil($totalResultados / $resultadosPorPagina); // Total de páginas

                    // Agregar el límite de resultados para la paginación
                    $SQL .= " LIMIT $inicio, $resultadosPorPagina";

                    $dato = mysqli_query($conexion, $SQL);
                    ?>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($dato) > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            echo "<tr>";
                            echo "<td>" . $fila['id_comuna'] . "</td>";
                            echo "<td>" . $fila['nombre_lugar'] . "</td>";
                              // Botón Editar
                              echo "<td><button class='btn btn-primary btn-editar' data-bs-toggle='modal' data-bs-target='#actualizarComunaModal' data-id='" . $fila['id_comuna'] . "'><i class='fas fa-edit'></i> Editar</button></td>";

                              // Botón Eliminar
                              echo "<td><a href='url_eliminar?id=" . $fila['id_comuna'] . "' class='btn btn-danger'>Eliminar</a></td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No se encontraron resultados</td></tr>";
                    }

                    mysqli_close($conexion);
                    ?>
                </tbody>
</table>
</div>
<div class="card-footer">
    <div class="d-flex justify-content-end">
        <nav aria-label="Selector de Páginas">
            <ul class="pagination">
                                          <?php if ($paginaActual > 1) { ?>
                                              <li class="page-item">
                                                  <a class="page-link" href="?pagina=<?php echo $paginaActual - 1; ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                                              </li>
                                          <?php } else { ?>
                                              <li class="page-item disabled">
                                                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                              </li>
                                          <?php } ?>
  
                                          <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                                              <?php if ($i == $paginaActual) { ?>
                                                  <li class="page-item active" aria-current="page">
                                                      <a class="page-link" href="#"><?php echo $i; ?> <span class="visually-hidden">(Página actual)</span></a>
                                                  </li>
                                              <?php } else { ?>
                                                  <li class="page-item"><a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                              <?php } ?>
                                          <?php } ?>
  
                                          <?php if ($paginaActual < $totalPaginas) { ?>
                                              <li class="page-item">
                                                  <a class="page-link" href="?pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
                                              </li>
                                          <?php } else { ?>
                                              <li class="page-item disabled">
                                                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Siguiente</a>
                                              </li>
                                          <?php } ?>
                                          </ul>
        </nav>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
 <!-- ...  contenidos de la Seccion Comuna ... -->

                                    <!-- ...  contenidos de la Seccion Coordinador ... -->
                                    
                                    <div class="tab-pane fade" id="coordinador_tab">
            <h4>Coordinador</h4>
            <p>Conozca toda la información relacionada al Coordinador</p>

            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Filtrar Coordinador</h5>


                        <form method="POST">
                            <div class="mb-3">
                                <label for="idCoordinador" class="form-label">ID del Coordinador</label>
                                <select class="form-select" id="idCoordinador" name="idCoordinador">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT id_cordinador FROM cordinador";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id_cordinador'] . '">' . $row['id_cordinador'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nombreCoordinador" class="form-label">Nombre del Coordinador</label>
                                <select class="form-select" id="nombreCoordinador" name="nombreCoordinador">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT nombre_cordinador FROM cordinador";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['nombre_cordinador'] . '">' . $row['nombre_cordinador'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="direccionCoordinador" class="form-label">Direccion Coordinador</label>
                                <select class="form-select" id="direccionCoordinador" name="direccionCoordinador">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT direccion_cordinador FROM cordinador";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['direccion_cordinador'] . '">' . $row['direccion_cordinador'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="telefonoCoordinador" class="form-label">Teléfono Coordinador</label>
                                <select class="form-select" id="telefonoCoordinador" name="telefonoCoordinador">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT telefono_cordinador FROM cordinador";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['telefono_cordinador'] . '">' . $row['telefono_cordinador'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-orange" name="coordinadorSubmit">Filtrar</button>
                        </form>


                      </div>
                    </div>
                  </div>
<!-- Mostrar resultados -->
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Resultado de la Vista y Filtro</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID del Coordinador</th>
                        <th>Nombre del Coordinador</th>
                        <th>Direccion del Coordinador</th>
                        <th>Teléfono del Coordinador</th>
                    </tr>
                </thead>
                
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "seguidores");

                    // Obtener los valores del filtro si se ha enviado el formulario
                    $id_cordinador = isset($_POST['idCoordinador']) ? $_POST['idCoordinador'] : '';
                    $nombre_cordinador = isset($_POST['nombreCoordinador']) ? $_POST['nombreCoordinador'] : '';
                    $direccion_cordinador = isset($_POST['direccionCoordinador']) ? $_POST['direccionCoordinador'] : '';
                    $telefono_cordinador = isset($_POST['telefonoCoordinador']) ? $_POST['telefonoCoordinador'] : '';

                    // Construir consulta SQL con filtros
                    $SQL = "SELECT * FROM cordinador WHERE 1=1";

                    if ($id_cordinador !== "") {
                        $SQL .= " AND id_cordinador = '$id_cordinador'";
                    }
                    if ($nombre_cordinador !== "") {
                        $SQL .= " AND nombre_cordinador = '$nombre_cordinador'";
                    }
                    if ($direccion_cordinador !== "") {
                        $SQL .= " AND direccion_cordinador = '$direccion_cordinador'";
                    }
                    if ($telefono_cordinador !== "") {
                        $SQL .= " AND telefono_cordinador = '$telefono_cordinador'";
                    }

                      // Configuración de la paginación
                    $resultadosPorPagina = 10; // Número de resultados por página
                    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual (por defecto la primera)
                    $inicio = ($paginaActual - 1) * $resultadosPorPagina; // Registro de inicio para la consulta

                    $totalResultados = mysqli_num_rows(mysqli_query($conexion, $SQL)); // Total de resultados
                    $totalPaginas = ceil($totalResultados / $resultadosPorPagina); // Total de páginas

                    // Agregar el límite de resultados para la paginación
                    $SQL .= " LIMIT $inicio, $resultadosPorPagina";

                    $dato = mysqli_query($conexion, $SQL);
                    ?>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($dato) > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            echo "<tr>";
                            echo "<td>" . $fila['id_cordinador'] . "</td>";
                            echo "<td>" . $fila['nombre_cordinador'] . "</td>";
                            echo "<td>" . $fila['direccion_cordinador'] . "</td>";
                            echo "<td>" . $fila['telefono_cordinador'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No se encontraron resultados</td></tr>";
                    }

                    mysqli_close($conexion);
                    ?>
                </tbody>
</table>
</div>
<div class="card-footer">
    <div class="d-flex justify-content-end">
        <nav aria-label="Selector de Páginas">
            <ul class="pagination">
                                          <?php if ($paginaActual > 1) { ?>
                                              <li class="page-item">
                                                  <a class="page-link" href="?pagina=<?php echo $paginaActual - 1; ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                                              </li>
                                          <?php } else { ?>
                                              <li class="page-item disabled">
                                                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                              </li>
                                          <?php } ?>
  
                                          <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                                              <?php if ($i == $paginaActual) { ?>
                                                  <li class="page-item active" aria-current="page">
                                                      <a class="page-link" href="#"><?php echo $i; ?> <span class="visually-hidden">(Página actual)</span></a>
                                                  </li>
                                              <?php } else { ?>
                                                  <li class="page-item"><a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                              <?php } ?>
                                          <?php } ?>
  
                                          <?php if ($paginaActual < $totalPaginas) { ?>
                                              <li class="page-item">
                                                  <a class="page-link" href="?pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
                                              </li>
                                          <?php } else { ?>
                                              <li class="page-item disabled">
                                                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Siguiente</a>
                                              </li>
                                          <?php } ?>
                                          </ul>
        </nav>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- ...  contenidos de la Seccion Coordinador ... -->



                                    <!-- ...  contenidos de la Seccion Líder ... -->
                                    
                                    <div class="tab-pane fade" id="lider_tab">
            <h4>Líder</h4>
            <p>Conozca toda la información relacionada al Líder</p>


            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Formulario de Líder</h5>


                        <form method="POST">
                            <div class="mb-3">
                                <label for="idlider" class="form-label">ID del Líder</label>
                                <select class="form-select" id="idlider" name="idlider">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT id_lider FROM lider";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id_lider'] . '">' . $row['id_lider'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nombrelider" class="form-label">Nombre del Líder</label>
                                <select class="form-select" id="nombrelider" name="nombrelider">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT nombre_lider FROM lider";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['nombre_lider'] . '">' . $row['nombre_lider'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="direccionLider" class="form-label">Direccion Líder</label>
                                <select class="form-select" id="direccionLider" name="direccionLider">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT direccion_lider FROM lider";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['direccion_lider'] . '">' . $row['direccion_lider'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="telefonoLider" class="form-label">Teléfono Líder</label>
                                <select class="form-select" id="telefonoLider" name="telefonoLider">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT telefono_lider FROM lider";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['telefono_lider'] . '">' . $row['telefono_lider'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nombreCoordinadorLider" class="form-label">Coordinador</label>
                                <select class="form-select" id="nombreCoordinadorLider" name="nombreCoordinadorLider">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT nombre_cordinador FROM lider";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['nombre_cordinador'] . '">' . $row['nombre_cordinador'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-orange" name="liderSubmit">Filtrar</button>
                        </form>


                      </div>
                    </div>
                  </div>
<!-- Mostrar resultados -->
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Resultado de la Vista y Filtro</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID del Líder</th>
                        <th>Nombre del Líder</th>
                        <th>Direccion del Líder</th>
                        <th>Teléfono del Líder</th>
                        <th>Coordinador</th>
                    </tr>
                </thead>
                
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "seguidores");

                    // Obtener los valores del filtro si se ha enviado el formulario
                    $id_lider = isset($_POST['idlider']) ? $_POST['idlider'] : '';
                    $nombre_lider = isset($_POST['nombrelider']) ? $_POST['nombrelider'] : '';
                    $direccion_lider = isset($_POST['direccionLider']) ? $_POST['direccionLider'] : '';
                    $telefono_lider = isset($_POST['telefonoLider']) ? $_POST['telefonoLider'] : '';
                    $nombre_cordinador = isset($_POST['nombreCoordinadorLider']) ? $_POST['nombreCoordinadorLider'] : '';
                    // Construir consulta SQL con filtros
                    $SQL = "SELECT * FROM lider WHERE 1=1";

                    if ($id_lider !== "") {
                        $SQL .= " AND id_lider = '$id_lider'";
                    }
                    if ($nombre_lider !== "") {
                        $SQL .= " AND nombre_lider = '$nombre_lider'";
                    }
                    if ($direccion_lider !== "") {
                        $SQL .= " AND direccion_lider = '$direccion_lider'";
                    }
                    if ($telefono_lider !== "") {
                        $SQL .= " AND telefono_lider = '$telefono_lider'";
                    }
                    if ($nombre_cordinador !== "") {
                        $SQL .= " AND nombre_cordinador = '$nombre_cordinador'";
                    }

                      // Configuración de la paginación
                    $resultadosPorPagina = 10; // Número de resultados por página
                    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual (por defecto la primera)
                    $inicio = ($paginaActual - 1) * $resultadosPorPagina; // Registro de inicio para la consulta

                    $totalResultados = mysqli_num_rows(mysqli_query($conexion, $SQL)); // Total de resultados
                    $totalPaginas = ceil($totalResultados / $resultadosPorPagina); // Total de páginas

                    // Agregar el límite de resultados para la paginación
                    $SQL .= " LIMIT $inicio, $resultadosPorPagina";

                    $dato = mysqli_query($conexion, $SQL);
                    ?>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($dato) > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            echo "<tr>";
                            echo "<td>" . $fila['id_lider'] . "</td>";
                            echo "<td>" . $fila['nombre_lider'] . "</td>";
                            echo "<td>" . $fila['direccion_lider'] . "</td>";
                            echo "<td>" . $fila['telefono_lider'] . "</td>";
                            echo "<td>" . $fila['nombre_cordinador'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No se encontraron resultados</td></tr>";
                    }

                    mysqli_close($conexion);
                    ?>
                </tbody>
</table>
</div>
<div class="card-footer">
    <div class="d-flex justify-content-end">
        <nav aria-label="Selector de Páginas">
            <ul class="pagination">
                                          <?php if ($paginaActual > 1) { ?>
                                              <li class="page-item">
                                                  <a class="page-link" href="?pagina=<?php echo $paginaActual - 1; ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                                              </li>
                                          <?php } else { ?>
                                              <li class="page-item disabled">
                                                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                              </li>
                                          <?php } ?>
  
                                          <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                                              <?php if ($i == $paginaActual) { ?>
                                                  <li class="page-item active" aria-current="page">
                                                      <a class="page-link" href="#"><?php echo $i; ?> <span class="visually-hidden">(Página actual)</span></a>
                                                  </li>
                                              <?php } else { ?>
                                                  <li class="page-item"><a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                              <?php } ?>
                                          <?php } ?>
  
                                          <?php if ($paginaActual < $totalPaginas) { ?>
                                              <li class="page-item">
                                                  <a class="page-link" href="?pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
                                              </li>
                                          <?php } else { ?>
                                              <li class="page-item disabled">
                                                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Siguiente</a>
                                              </li>
                                          <?php } ?>
                                          </ul>
        </nav>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- ...  contenidos de la Seccion Líder ... -->



                                    <!-- ...  contenidos de la Seccion Votante ... -->
                                    
                                  
          <div class="tab-pane fade" id="votantes_tab">
            <h4>Votantes</h4>
            <p>Conozca toda la información relacionada al Votantes</p>

            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Formulario de Votantes</h5>


                        <form method="POST">
                            <div class="mb-3">
                                <label for="idvotante" class="form-label">ID del Votante</label>
                                <select class="form-select" id="idvotante" name="idvotante">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT id_votante  FROM votantes";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id_votante'] . '">' . $row['id_votante'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nombrevotante" class="form-label">Nombre del Votante</label>
                                <select class="form-select" id="nombrevotante" name="nombrevotante">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT nombre_votante FROM votantes";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['nombre_votante'] . '">' . $row['nombre_votante'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="direccioncasavotante" class="form-label">Direccion del Votante</label>
                                <select class="form-select" id="direccioncasavotante" name="direccioncasavotante">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT direccion_casa_votante FROM votantes";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['direccion_casa_votante'] . '">' . $row['direccion_casa_votante'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nombrelidervotante" class="form-label">Líder del Votante</label>
                                <select class="form-select" id="nombrelidervotante" name="nombrelidervotante">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT nombre_lider FROM votantes";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['nombre_lider'] . '">' . $row['nombre_lider'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="lugarvotante" class="form-label">Lugar de Votacion </label>
                                <select class="form-select" id="lugarvotante" name="lugarvotante">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT lugar_votante FROM votantes";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['lugar_votante'] . '">' . $row['lugar_votante'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="mesavotante" class="form-label">mesa de Votacion </label>
                                <select class="form-select" id="mesavotante" name="mesavotante">
                                    <option value="">Todos</option>
                                    <?php
                                    $sql = "SELECT DISTINCT mesa FROM votantes";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['mesa'] . '">' . $row['mesa'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-orange" name="votanteSubmit">Filtrar</button>
                        </form>


                      </div>
                    </div>
                  </div>
<!-- Mostrar resultados -->
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Resultado de la Vista y Filtro</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID del votante</th>
                        <th>Nombre del votante</th>
                        <th>Direccion del votante</th>
                        <th>Nombre del Líder</th>
                        <th>Lugar de votación</th>
                        <th>mesa</th>
                    </tr>
                </thead>
                
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "seguidores");

                    // Obtener los valores del filtro si se ha enviado el formulario
                    $id_votante = isset($_POST['idvotante']) ? $_POST['idvotante'] : '';
                    $nombre_votante = isset($_POST['nombrevotante']) ? $_POST['nombrevotante'] : '';
                    $direccion_casa_votante = isset($_POST['direccioncasavotante']) ? $_POST['direccioncasavotante'] : '';
                    $nombre_lider = isset($_POST['nombrelidervotante']) ? $_POST['nombrelidervotante'] : '';
                    $lugar_votante = isset($_POST['lugarvotante']) ? $_POST['lugarvotante'] : '';
                    $mesa = isset($_POST['mesavotante']) ? $_POST['mesavotante'] : '';
                    // Construir consulta SQL con filtros
                    $SQL = "SELECT * FROM votantes WHERE 1=1";

                    if ($id_votante !== "") {
                        $SQL .= " AND id_votante = '$id_votante'";
                    }
                    if ($nombre_votante !== "") {
                        $SQL .= " AND nombre_votante = '$nombre_votante'";
                    }
                    if ($direccion_casa_votante !== "") {
                        $SQL .= " AND direccion_casa_votante = '$direccion_casa_votante'";
                    }
                    if ($nombre_lider !== "") {
                        $SQL .= " AND nombre_lider = '$nombre_lider'";
                    }
                    if ($lugar_votante !== "") {
                        $SQL .= " AND lugar_votante = '$lugar_votante'";
                    }
                    if ($mesa !== "") {
                        $SQL .= " AND mesa = '$mesa'";
                    }

                      // Configuración de la paginación
                    $resultadosPorPagina = 10; // Número de resultados por página
                    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual (por defecto la primera)
                    $inicio = ($paginaActual - 1) * $resultadosPorPagina; // Registro de inicio para la consulta

                    $totalResultados = mysqli_num_rows(mysqli_query($conexion, $SQL)); // Total de resultados
                    $totalPaginas = ceil($totalResultados / $resultadosPorPagina); // Total de páginas

                    // Agregar el límite de resultados para la paginación
                    $SQL .= " LIMIT $inicio, $resultadosPorPagina";

                    $dato = mysqli_query($conexion, $SQL);
                    ?>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($dato) > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            echo "<tr>";
                            echo "<td>" . $fila['id_votante'] . "</td>";
                            echo "<td>" . $fila['nombre_votante'] . "</td>";
                            echo "<td>" . $fila['direccion_casa_votante'] . "</td>";
                            echo "<td>" . $fila['nombre_lider'] . "</td>";
                            echo "<td>" . $fila['lugar_votante'] . "</td>";
                            echo "<td>" . $fila['mesa'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No se encontraron resultados</td></tr>";
                    }

                    mysqli_close($conexion);
                    ?>
                </tbody>
</table>
</div>
<div class="card-footer">
    <div class="d-flex justify-content-end">
        <nav aria-label="Selector de Páginas">
            <ul class="pagination">
                                          <?php if ($paginaActual > 1) { ?>
                                              <li class="page-item">
                                                  <a class="page-link" href="?pagina=<?php echo $paginaActual - 1; ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                                              </li>
                                          <?php } else { ?>
                                              <li class="page-item disabled">
                                                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                              </li>
                                          <?php } ?>
  
                                          <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                                              <?php if ($i == $paginaActual) { ?>
                                                  <li class="page-item active" aria-current="page">
                                                      <a class="page-link" href="#"><?php echo $i; ?> <span class="visually-hidden">(Página actual)</span></a>
                                                  </li>
                                              <?php } else { ?>
                                                  <li class="page-item"><a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                              <?php } ?>
                                          <?php } ?>
  
                                          <?php if ($paginaActual < $totalPaginas) { ?>
                                              <li class="page-item">
                                                  <a class="page-link" href="?pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
                                              </li>
                                          <?php } else { ?>
                                              <li class="page-item disabled">
                                                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Siguiente</a>
                                              </li>
                                          <?php } ?>
                                          </ul>
        </nav>
    </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
           <!-- ...  contenidos de la Seccion Votante ... -->

           <div class="modal fade" data-bs-backdrop="static" id="actualizarComunaModal" tabindex="-1" aria-labelledby="crearComunaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="crearComunaModalLabel">Crear Comuna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST"> <!-- Asegúrate de agregar method="POST" aquí -->
                    <div class="mb-3">
                        <label for="inputIdComuna" class="form-label">ID de Comuna</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputIdComuna" name="inputIdComuna">
                    </div>
                    <div class="mb-3">
                        <label for="inputNombreLugarFK" class="form-label">Nombre del Lugar FK</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputNombreLugarFK" name="inputNombreLugarFK">
                    </div>
                    <button type="submit" class="btn btn-orange">Crear</button>
                </form>

                                    </div>
                                </div>
                                </div>
                            </div>
                            <?php

                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                  
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "seguidores";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    
                    if ($conn->connect_error) {
                        die("Error en la conexión: " . $conn->connect_error);
                    }

                  
                    $idComuna = $_POST["inputIdComuna"];
                    $nombreLugarFK = $_POST["inputNombreLugarFK"];

                  
                    $sql = "INSERT INTO comuna (id_comuna, nombre_lugar) 
                            VALUES ('$idComuna', '$nombreLugarFK')";

                    if ($conn->query($sql) === TRUE) {
                        echo '<div class="alert alert-success" role="alert">La comuna ha sido creada exitosamente.</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Error al crear la comuna: ' . $conn->error . '</div>';
                    }

                    
                    $conn->close();
                }
                ?>

</body>
</html>
