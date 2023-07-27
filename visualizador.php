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

    // Procesar el filtrado de resultados si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtener los valores del filtro
        $lugarVotante = $_POST["lugarVotanteSelect"];
        $direccion = $_POST["direccionSelect"];
        $cantidadMesas = $_POST["cantidadMesasSelect"];
        $comuna = $_POST["comunaSelect"];

        // Construir consulta SQL con filtros
        $sql = "SELECT * FROM lugar WHERE 1=1";

        if ($lugarVotante !== "") {
            $sql .= " AND lugar_votante = '$lugarVotante'";
        }

        if ($direccion !== "") {
            $sql .= " AND direccion_lugar = '$direccion'";
        }

        if ($cantidadMesas !== "") {
            $sql .= " AND cantidad_mesas = '$cantidadMesas'";
        }

        if ($comuna !== "") {
            $sql .= " AND comuna = '$comuna'";
        }

        $result = $conn->query($sql);
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
            <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#mesa_tab">Mesa</a>
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
                <option value="">Seleccionar</option>
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
                <option value="">Seleccionar</option>
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
                <option value="">Seleccionar</option>
                <?php
                $sql = "SELECT DISTINCT comuna FROM Lugar";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['comuna'] . '">' . $row['comuna'] . '</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-orange">Filtrar</button>
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
                                
                                // Construir consulta SQL con filtros
                                $SQL = "SELECT * FROM lugar WHERE 1=1";

                                if ($nombreVotante !== "") {
                                    $SQL .= " AND lugar_votante = '$nombreVotante'";
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
</form>
    <!-- ... Otros contenidos de la página ... -->

</body>
</html>
