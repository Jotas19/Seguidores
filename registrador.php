<?php
session_start();

// Verificar si el usuario ha iniciado sesión y el tipo de usuario
if (isset($_SESSION['tipo_usuario'])) {
    $tipoUsuario = $_SESSION['tipo_usuario'];

    // Verificar el tipo de usuario permitido para esta página
    if ($tipoUsuario === 'registrador' || $tipoUsuario === 'administrador') {
        // Página exclusiva para el registrador y el administrador
        
        // Aquí va el contenido específico para el registrador
    } else {
        // Redirigir a la página correspondiente
        header("Location: visualizador.php");
        exit();
    }
} else {
    // Redirigir a la página correspondiente
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
    <title>Seguidores - Registrador</title>
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
                    <a class="nav-link" href="registrador.php">Registrar Datos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="visualizador.php">Visualizacion de Datos</a>
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

    

    <div class="container text-center mt-4 slide-in">
        <h1 class="h1 m-4">Bienvenido al portal de registrador</h1>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">
        
        <div class="col-4 mb-4 ampliacion-elemento">
            <div class="card">
              <img src="src/card4_registrador.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">1. Coordinador</h5>
                <p class="card-text">Bienvenido al módulo de gestión de coordinadores. Aquí puedes administrar a los coordinadores responsables de los lugares de votación. Puedes agregar nuevos coordinadores, actualizar información o eliminar coordinadores existentes.</p>
                <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#crearCoordinadorModal">Ver más</button>
              </div>
            </div>
          </div>

          <div class="col-4 mb-4 ampliacion-elemento">
            <div class="card">
              <img src="src/card5_registrador.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">2. Líder</h5>
                <p class="card-text">Bienvenido al módulo de gestión de líderes. Aquí puedes administrar a los líderes de las comunidades. Puedes agregar nuevos líderes, editar información existente o eliminar líderes.</p>
                <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#crearLiderModal">Ver más</button>
              </div>
            </div>
          </div>

          <div class="col-4 mb-4 ampliacion-elemento">
            <div class="card">
              <img src="src/card3_registrador.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">3. Comuna</h5>
                <p class="card-text">Bienvenido al módulo de gestión de comunas. Aquí puedes administrar las comunas en las que se encuentran los lugares de votación. Puedes agregar nuevas comunas, actualizar información o eliminar comunas existentes.</p>
                <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#crearComunaModal">Ver más</button>
              </div>
            </div>
          </div>

        <div class="col-4 mb-4 ampliacion-elemento">
            <div class="card">
              <img src="src/card1_registrador.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">4. Lugar</h5>
                <p class="card-text">Bienvenido al módulo de gestión de lugares. Aquí puedes administrar los lugares disponibles para las votaciones. Puedes agregar nuevos lugares, editar información existente o eliminar lugares.</p>
                <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#crearLugarModal">Ver más</button>
              </div>
            </div>
          </div>

          <div class="col-4 mb-4 ampliacion-elemento">
            <div class="card">
              <img src="src/card6_registrador.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">5. Votantes</h5>
                <p class="card-text">Bienvenido al módulo de gestión de lugares. Aquí puedes administrar los lugares disponibles para las votaciones. Puedes agregar nuevos lugares, editar información existente o eliminar lugares.</p>
                <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#crearVotanteModal">Ver más</button>
              </div>
            </div>
          </div>  
          
              

        </div>
      </div>

      <!--Modales-->
      <!--Modal del Lugar-->
      <div class="modal fade" data-bs-backdrop="static" id="crearLugarModal" tabindex="-1" aria-labelledby="crearLugarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearLugarModalLabel">Crear Lugar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="registrar_lugar.php" method="POST">
                    <div class="mb-3">
                        <label for="inputLugarVotante" class="form-label">Lugar Votante</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputLugarVotante" name="inputLugarVotante">
                    </div>
                    <div class="mb-3">
                        <label for="inputDireccionLugar" class="form-label">Dirección del Lugar</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputDireccionLugar" name="inputDireccionLugar">
                    </div>
                    <div class="mb-3">
                        <label for="inputCantidadMesas" class="form-label">Cantidad de Mesas</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputCantidadMesas" name="inputCantidadMesas">
                    </div>
                    <div class="mb-3">
                        <label for="inputComunaFK" class="form-label">Comuna FK</label>
                        <select class="form-control" id="inputComunaFK" name="inputComunaFK">
                            <?php
                            // Conectar a la base de datos (asegúrate de tener los datos correctos)
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "seguidores";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verificar la conexión
                            if ($conn->connect_error) {
                                die("Error en la conexión: " . $conn->connect_error);
                            }

                            // Consulta SQL para obtener los nombres de las comunas
                            $sql = "SELECT id_comuna, nombre_lugar FROM comuna";
                            $result = $conn->query($sql);

                            // Generar las opciones del select con los nombres de las comunas
                            while ($row = $result->fetch_assoc()) {
                                $idComuna = $row["id_comuna"];
                                $nombreComuna = $row["nombre_lugar"];
                                echo "<option value='$idComuna'>$nombreComuna</option>";
                            }

                            $conn->close();
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-orange">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <!--Modal del Lugar-->
                              

          <!-- Modal de Comuna-->
            <div class="modal fade" data-bs-backdrop="static" id="crearComunaModal" tabindex="-1" aria-labelledby="crearComunaModalLabel" aria-hidden="true">
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
            <!-- Modal de Comuna-->

            <!-- Modal de Coordinador-->
            <div class="modal fade" data-bs-backdrop="static" id="crearCoordinadorModal" tabindex="-1" aria-labelledby="crearCoordinadorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearCoordinadorModalLabel">Crear Coordinador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="registrar_coordinador.php" method="POST">

                    <div class="mb-3">
                        <label for="inputIdCoordinador" class="form-label">ID de Coordinador</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputIdCoordinador" name="inputIdCoordinador">
                    </div>

                    <div class="mb-3">
                        <label for="inputNombreCoordinador" class="form-label">Nombre del Coordinador</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputNombreCoordinador" name="inputNombreCoordinador">
                    </div>

                    <div class="mb-3">
                        <label for="inputDireccionCoordinador" class="form-label">Dirección del Coordinador</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputDireccionCoordinador" name="inputDireccionCoordinador">
                    </div>

                    <div class="mb-3">
                        <label for="inputTelefonoCoordinador" class="form-label">Teléfono del Coordinador</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputTelefonoCoordinador" name="inputTelefonoCoordinador">
                    </div>

                    <button type="submit" class="btn btn-orange">Crear</button>

                </form>
            </div>
        </div>
    </div>
</div>

              <!-- Modal de Coordinador-->

              <!--Modal de Líder-->
                <div class="modal fade" data-bs-backdrop="static" id="crearLiderModal" tabindex="-1" aria-labelledby="crearLiderModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="crearLiderModalLabel">Crear Líder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="registrar_lider.php" method="POST">
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



                            <button type="submit" class="btn btn-orange">Crear</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>     
        
 <!--Modal de Líder-->             

<!-- Modal de Votante -->
<div class="modal fade" data-bs-backdrop="static" id="crearVotanteModal" tabindex="-1" aria-labelledby="crearVotanteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearVotanteModalLabel">Registrar Votante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="registrar_votante.php" method="POST">
                    <div class="mb-3">
                        <label for="inputIdVotante" class="form-label">ID de Votante</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputIdVotante" name="inputIdVotante">
                    </div>
                    <div class="mb-3">
                        <label for="inputNombreVotante" class="form-label">Nombre del Votante</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputNombreVotante" name="inputNombreVotante">
                    </div>
                    <div class="mb-3">
                        <label for="inputDireccionCasaVotante" class="form-label">Dirección del Votante</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputDireccionCasaVotante" name="inputDireccionCasaVotante">
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
                                    echo '<option value="' . $row['nombre_lider'] . '">' . $row['nombre_lider'] . '</option>';
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
                                    echo '<option value="' . $row['lugar_votante'] . '">' . $row['lugar_votante'] . '</option>';
                                }
                            }

                            $conn->close();
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputMesa" class="form-label">Mesa</label>
                        <input type="text" autocomplete="off" class="form-control" id="inputMesa" name="inputMesa">
                    </div>
                    <button type="submit" class="btn btn-orange">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>





    
</body>
</html>

