<?php
session_start();

// Verificar si el usuario ha iniciado sesión y el tipo de usuario
if (isset($_SESSION['tipo_usuario']) && ($_SESSION['tipo_usuario'] === 'visualizador' || $_SESSION['tipo_usuario'] === 'registrador' || $_SESSION['tipo_usuario'] === 'administrador')) {
    // Página exclusiva para el visualizador y el registrador
    
    // Aquí va el contenido específico para el visualizador
} else {
    // Redirigir a la página correspondiente
     {
        header("Location: login.php");
    }
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

    <style>
        .nav-tabs .nav-link {
            color: orange; 
        }
        .card-footer .page-link {
            color: orange; /* Cambia el color del enlace a naranja */
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

            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Vista y Filtro</h5>
                        <form>
                          <div class="mb-3">
                            <label for="registraInput" class="form-label">Registra</label>
                            <input type="text" class="form-control" id="registraInput">
                          </div>
                          <div class="mb-3">
                            <label for="lugarVotanteInput" class="form-label">Lugar del Votante</label>
                            <input type="text" class="form-control" id="lugarVotanteInput">
                          </div>
                          <div class="mb-3">
                            <label for="direccionInput" class="form-label">Dirección del Lugar</label>
                            <input type="text" class="form-control" id="direccionInput">
                          </div>
                          <div class="mb-3">
                            <label for="cantidadMesasInput" class="form-label">Cantidad de Mesas</label>
                            <input type="number" class="form-control" id="cantidadMesasInput">
                          </div>
                          <div class="mb-3">
                            <label for="nombreLugarInput" class="form-label">Nombre del Lugar PK</label>
                            <input type="text" class="form-control" id="nombreLugarInput">
                          </div>
                          <div class="mb-3">
                            <label for="comunaSelect" class="form-label">Comuna</label>
                            <select class="form-select" id="comunaSelect">
                              <option value="">Seleccionar</option>
                              <option value="comuna1">Comuna 1</option>
                              <option value="comuna2">Comuna 2</option>
                              <option value="comuna3">Comuna 3</option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-orange">Filtrar</button>
                        </form>
                      </div>
                    </div>
                  </div>
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
                                    
                                    // Configuración de la paginación
                                    $resultadosPorPagina = 10; // Número de resultados por página
                                    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual (por defecto la primera)
                                    $inicio = ($paginaActual - 1) * $resultadosPorPagina; // Registro de inicio para la consulta
                                    
                                    $SQL = "SELECT * FROM lugar LIMIT $inicio, $resultadosPorPagina";
                                    $totalResultados = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM lugar")); // Total de resultados
                                    $totalPaginas = ceil($totalResultados / $resultadosPorPagina); // Total de páginas

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
          <div class="tab-pane fade" id="mesa_tab">
            <h4>Mesa</h4>
            <p>Conozca toda la información relacionada al Mesa</p>

            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Formulario de Mesa</h5>
                        <form>
                          <div class="mb-3">
                            <label for="numeroMesaInput" class="form-label">Número de Mesa</label>
                            <input type="number" class="form-control" id="numeroMesaInput">
                          </div>
                          <div class="mb-3">
                            <label for="mesaPkInput" class="form-label">Mesa PK</label>
                            <input type="text" class="form-control" id="mesaPkInput">
                          </div>
                          <button type="submit" class="btn btn-orange">Guardar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Resultado del Formulario de Mesa</h5>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Número de Mesa</th>
                              <th>Mesa PK</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $conexion = mysqli_connect("localhost", "root", "", "seguidores");

                            // Configuración de la paginación
                            $resultadosPorPagina = 5; // Número de resultados por página
                            $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual (por defecto la primera)
                            $inicio = ($paginaActual - 1) * $resultadosPorPagina; // Registro de inicio para la consulta

                            $SQL = "SELECT * FROM mesa LIMIT $inicio, $resultadosPorPagina";
                            $totalResultados = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM mesa")); // Total de resultados
                            $totalPaginas = ceil($totalResultados / $resultadosPorPagina); // Total de páginas

                            $dato = mysqli_query($conexion, $SQL);

                            if (mysqli_num_rows($dato) > 0) {
                              while ($fila = mysqli_fetch_array($dato)) {
                                echo "<tr>";
                                echo "<td>" . $fila['numero_mesa'] . "</td>";
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
          <div class="tab-pane fade" id="comuna_tab">
            <h4>Comuna</h4>
            <p>Conozca toda la información relacionada al Comuna</p>

            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Formulario de Comuna</h5>
                        <form>
                          <div class="mb-3">
                            <label for="idComunaInput" class="form-label">ID de Comuna</label>
                            <input type="text" class="form-control" id="idComunaInput">
                          </div>
                          <div class="mb-3">
                            <label for="nombreLugarFkInput" class="form-label">Nombre del Lugar FK</label>
                            <input type="text" class="form-control" id="nombreLugarFkInput">
                          </div>
                          <button type="submit" class="btn btn-orange">Guardar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Resultado del Formulario de Comuna</h5>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>ID de Comuna</th>
                              <th>Nombre del Lugar FK</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Lugar 1</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Lugar 2</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Lugar 3</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Lugar 4</td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Lugar 5</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer">
                        <div class="d-flex justify-content-end">
                          <nav aria-label="Selector de Páginas">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                              </li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">1 <span class="visually-hidden">(Página actual)</span></a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                              </li>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>






          </div>
          <div class="tab-pane fade" id="coordinador_tab">
            <h4>Coordinador</h4>
            <p>Conozca toda la información relacionada al Coordinador</p>

            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Formulario de Coordinador</h5>
                        <form>
                          <div class="mb-3">
                            <label for="idCoordinadorInput" class="form-label">ID de Coordinador</label>
                            <input type="text" class="form-control" id="idCoordinadorInput">
                          </div>
                          <div class="mb-3">
                            <label for="cedulaInput" class="form-label">Cédula</label>
                            <input type="text" class="form-control" id="cedulaInput">
                          </div>
                          <div class="mb-3">
                            <label for="nombreCoordinadorInput" class="form-label">Nombre del Coordinador</label>
                            <input type="text" class="form-control" id="nombreCoordinadorInput">
                          </div>
                          <div class="mb-3">
                            <label for="direccionCoordinadorInput" class="form-label">Dirección del Coordinador</label>
                            <input type="text" class="form-control" id="direccionCoordinadorInput">
                          </div>
                          <div class="mb-3">
                            <label for="telefonoCoordinadorInput" class="form-label">Teléfono del Coordinador</label>
                            <input type="text" class="form-control" id="telefonoCoordinadorInput">
                          </div>
                          <button type="submit" class="btn btn-orange">Guardar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Resultado del Formulario de Coordinador</h5>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>ID de Coordinador</th>
                              <th>Cédula</th>
                              <th>Nombre del Coordinador</th>
                              <th>Dirección del Coordinador</th>
                              <th>Teléfono del Coordinador</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>1234567890</td>
                              <td>Coordinador 1</td>
                              <td>Dirección 1</td>
                              <td>1234567890</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>0987654321</td>
                              <td>Coordinador 2</td>
                              <td>Dirección 2</td>
                              <td>0987654321</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>2468135790</td>
                              <td>Coordinador 3</td>
                              <td>Dirección 3</td>
                              <td>2468135790</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>1357924680</td>
                              <td>Coordinador 4</td>
                              <td>Dirección 4</td>
                              <td>1357924680</td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>5678901234</td>
                              <td>Coordinador 5</td>
                              <td>Dirección 5</td>
                              <td>5678901234</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer">
                        <div class="d-flex justify-content-end">
                          <nav aria-label="Selector de Páginas">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                              </li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">1 <span class="visually-hidden">(Página actual)</span></a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                              </li>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>




          </div>
          <div class="tab-pane fade" id="lider_tab">
            <h4>Líder</h4>
            <p>Conozca toda la información relacionada al Líder</p>


            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Formulario de Líder</h5>
                        <form>
                          <div class="mb-3">
                            <label for="idLiderInput" class="form-label">ID de Líder</label>
                            <input type="text" class="form-control" id="idLiderInput">
                          </div>
                          <div class="mb-3">
                            <label for="cedulaInput" class="form-label">Cédula</label>
                            <input type="text" class="form-control" id="cedulaInput">
                          </div>
                          <div class="mb-3">
                            <label for="nombreLiderInput" class="form-label">Nombre del Líder</label>
                            <input type="text" class="form-control" id="nombreLiderInput">
                          </div>
                          <div class="mb-3">
                            <label for="direccionLiderInput" class="form-label">Dirección del Líder</label>
                            <input type="text" class="form-control" id="direccionLiderInput">
                          </div>
                          <div class="mb-3">
                            <label for="telefonoLiderInput" class="form-label">Teléfono del Líder</label>
                            <input type="text" class="form-control" id="telefonoLiderInput">
                          </div>
                          <div class="mb-3">
                            <label for="nombreCoordinadorInput" class="form-label">Nombre del Coordinador FK</label>
                            <input type="text" class="form-control" id="nombreCoordinadorInput">
                          </div>
                          <button type="submit" class="btn btn-orange">Guardar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Resultado del Formulario de Líder</h5>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>ID de Líder</th>
                              <th>Cédula</th>
                              <th>Nombre del Líder</th>
                              <th>Dirección del Líder</th>
                              <th>Teléfono del Líder</th>
                              <th>Nombre del Coordinador FK</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>1234567890</td>
                              <td>Líder 1</td>
                              <td>Dirección 1</td>
                              <td>1234567890</td>
                              <td>Coordinador 1</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>0987654321</td>
                              <td>Líder 2</td>
                              <td>Dirección 2</td>
                              <td>0987654321</td>
                              <td>Coordinador 2</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>2468135790</td>
                              <td>Líder 3</td>
                              <td>Dirección 3</td>
                              <td>2468135790</td>
                              <td>Coordinador 3</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>1357924680</td>
                              <td>Líder 4</td>
                              <td>Dirección 4</td>
                              <td>1357924680</td>
                              <td>Coordinador 4</td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>5678901234</td>
                              <td>Líder 5</td>
                              <td>Dirección 5</td>
                              <td>5678901234</td>
                              <td>Coordinador 5</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer">
                        <div class="d-flex justify-content-end">
                          <nav aria-label="Selector de Páginas">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                              </li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">1 <span class="visually-hidden">(Página actual)</span></a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                              </li>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


          </div>
          <div class="tab-pane fade" id="votantes_tab">
            <h4>Votantes</h4>
            <p>Conozca toda la información relacionada al Votantes</p>

            <div class="container mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Formulario de Votantes</h5>
                        <form>
                          <div class="mb-3">
                            <label for="idVotanteInput" class="form-label">ID de Votante</label>
                            <input type="text" class="form-control" id="idVotanteInput">
                          </div>
                          <div class="mb-3">
                            <label for="nombreVotanteInput" class="form-label">Nombre del Votante</label>
                            <input type="text" class="form-control" id="nombreVotanteInput">
                          </div>
                          <div class="mb-3">
                            <label for="direccionCasaVotanteInput" class="form-label">Dirección de Casa del Votante</label>
                            <input type="text" class="form-control" id="direccionCasaVotanteInput">
                          </div>
                          <div class="mb-3">
                            <label for="liderVotanteSelect" class="form-label">Líder del Votante</label>
                            <select class="form-select" id="liderVotanteSelect">
                              <option value="">Seleccionar</option>
                              <option value="lider1">Líder 1</option>
                              <option value="lider2">Líder 2</option>
                              <option value="lider3">Líder 3</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="lugarVotanteSelect" class="form-label">Lugar del Votante</label>
                            <select class="form-select" id="lugarVotanteSelect">
                              <option value="">Seleccionar</option>
                              <option value="lugar1">Lugar 1</option>
                              <option value="lugar2">Lugar 2</option>
                              <option value="lugar3">Lugar 3</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="mesasSelect" class="form-label">Mesas</label>
                            <select class="form-select" id="mesasSelect">
                              <option value="">Seleccionar</option>
                              <option value="mesa1">Mesa 1</option>
                              <option value="mesa2">Mesa 2</option>
                              <option value="mesa3">Mesa 3</option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-orange">Guardar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Resultado del Formulario de Votantes</h5>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>ID de Votante</th>
                              <th>Nombre del Votante</th>
                              <th>Dirección de Casa del Votante</th>
                              <th>Líder del Votante</th>
                              <th>Lugar del Votante</th>
                              <th>Mesas</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Votante 1</td>
                              <td>Dirección 1</td>
                              <td>Líder 1</td>
                              <td>Lugar 1</td>
                              <td>Mesa 1</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Votante 2</td>
                              <td>Dirección 2</td>
                              <td>Líder 2</td>
                              <td>Lugar 2</td>
                              <td>Mesa 2</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Votante 3</td>
                              <td>Dirección 3</td>
                              <td>Líder 3</td>
                              <td>Lugar 3</td>
                              <td>Mesa 3</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Votante 4</td>
                              <td>Dirección 4</td>
                              <td>Líder 4</td>
                              <td>Lugar 4</td>
                              <td>Mesa 4</td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Votante 5</td>
                              <td>Dirección 5</td>
                              <td>Líder 5</td>
                              <td>Lugar 5</td>
                              <td>Mesa 5</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer">
                        <div class="d-flex justify-content-end">
                          <nav aria-label="Selector de Páginas">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                              </li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">1 <span class="visually-hidden">(Página actual)</span></a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                              </li>
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
        </div>
      
      

    
</body>
</html>