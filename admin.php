<?php
session_start();

// Verificar si el usuario ha iniciado sesión y el tipo de usuario
if (isset($_SESSION['tipo_usuario']) && ($_SESSION['tipo_usuario'] === 'administrador')) {
    // Página exclusiva para el administrador y el registrador
    
    // Aquí va el contenido específico para el administrador
    
} else {
  // Redirigir a la página correspondiente
  header("Location: login.php");
  exit();
}
?>



<!DOCTYPE html>
<html lang="es">
<script src="js/script.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="css/style.css" rel="stylesheet">
<link href="src/bootstrap-icons-1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguidores - Administrador</title>
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
                    <a class="nav-link" href="admin.php">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="registrador.php">Registrar Datos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="visualizador.php">Visualizacion de Datos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Gestión de Usuarios</a>
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


    <h1 class="h1 m-4 text-center slide-in">Bienvenido al portal de Administrador</h1>
    <div class="container mt-4 slide-in">
        <div class="row justify-content-center">
          <div class="col-3 mb-4 ampliacion-elemento">
            <div class="card ampliacion-elemento" style="width: 18rem;">
              <img src="src/card1_admin.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Crea, elimina, actualiza y elimina los datos.</h5>
                <p class="card-text">En esta pestaña, puedes realizar diversas acciones para interactuar con los datos almacenados en la base de datos.</p>
                <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#exampleModal">Ver más</button>
              </div>
            </div>
          </div>
          <div class="col-3 mb-4 ampliacion-elemento">
            <div class="card ampliacion-elemento" style="width: 18rem;">
              <img src="src/card5_admin.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Visualiza y filtra los datos.</h5>
                <p class="card-text">En esta pestaña, puedes visualizar y filtrar los datos almacenados en la base de datos de manera eficiente. Estas opciones te brindan la flexibilidad necesaria para visualizar y analizar los datos de forma eficaz.</p>
                <a href="#" class="btn btn-orange">Ver más</a>
              </div>
            </div>
          </div>
          <div class="col-3 mb-4 ampliacion-elemento">
            <div class="card ampliacion-elemento" style="width: 18rem;">
              <img src="src/card3_admin.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Gestiona los usuarios del Software.</h5>
                <p class="card-text">En esta función, puedes gestionar los usuarios del software de una manera efectiva y eficiente. Te ofrecemos diversas opciones para administrar y controlar los usuarios según tus necesidades específicas.</p>
                <a href="#" data-bs-target="#manejo_usuario_modal" data-bs-toggle="modal" class="btn btn-orange">Ver más</a>
              </div>
            </div>
          </div>
          <div class="col-3 mb-4 ampliacion-elemento">
            <div class="card ampliacion-elemento" style="width: 18rem;">
              <img src="src/card4_admin.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Información adicional</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-orange">Ver más</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      

      <!-- Modal CRUD-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog moda-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">Coordinador</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Líder</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Comuna</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Lugar</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Votantes</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-orange">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal -->

        <!-- Modal Gestión de Usuarios-->
        <div class="modal fade" id="manejo_usuario_modal" tabindex="-1" aria-labelledby="userManagementModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userManagementModalLabel">Gestión de Usuarios</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container mt-4">
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#content1">Crear Usuario</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#content2">Ver Usuario</a>
                          </li>
                          
                        </ul>
                        <div class="tab-content mt-2">
                          <div class="tab-pane fade show active" id="content1">
                            <!-- Formulario para crear nuevos usuarios -->
                            <form action="validar.php" id="createUserForm" method="post">
                                <div class="mb-3">
                                    <label for="userType" class="form-label">Tipo de Usuario:</label>
                                    <select class="form-select" id="userType" name="tipo_usuario">
                                        <option value="administrador">Administrador</option>
                                        <option value="visualizador">Visualizador</option>
                                        <option value="registrador">Registrador</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nombre</label>
                                    <input type="text" autocomplete="off" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Usuario:</label>
                                    <input type="text" autocomplete="off" class="form-control" id="usuario" name="usuario">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="contraseña" name="contraseña">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirmar Contraseña:</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                </div>
                                <button type="submit" class="btn btn-orange" name="registrar">Crear Usuario</button>
                            </form>
                          </div>
                          <div class="tab-pane fade" id="content2">
                            
                            <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Tipo de Usuario</th>
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Usuario</th>
                                      <th scope="col">Contraseña</th>
                                      <th scope="col">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                  <?php
                                  $conexion = mysqli_connect("localhost", "root", "", "seguidores");
                                  $SQL = "SELECT * FROM registro";
                                  $dato = mysqli_query($conexion, $SQL);
                                  $tabla = "registro";
                                  header("Location: editar.php?tabla=" . urlencode($tabla));
                                  $usuario = $fila['usuario'];
                                  header("Location: editar.php?usuario=" . urlencode($usuario));
                                  $accion = '';

                                  // Verificar si se ha enviado el formulario

                                  
                                  

                                  if($dato->num_rows > 0)
                                  {
                                    while($fila = mysqli_fetch_array($dato))
                                    {
                                      // Aquí puedes realizar alguna operación con los datos obtenidos de la consulta
                                      // Por ejemplo, puedes acceder a los valores de las columnas usando $fila['nombre_columna']
                                      // Ejemplo: $nombre = $fila['nombre'];
                                      ?>
                                      <tr>
                                      <td><?php echo $fila['tipo_usuario']; ?></td>
                                      <td><?php echo $fila['nombre']; ?></td>
                                      <td><?php echo $fila['usuario']; ?></td>
                                      <td><?php echo $fila['contraseña']; ?></td>

                                      <td>
                                      
                                      <form method="post" action="">
                                          
                                          <button type="submit" name="editar" class="btn btn-warning" href="editar.php">
                                              <i class="bi bi-pencil-fill"></i> Editar
                                          </button>

                                          
                                          <button type="submit" name="eliminar" class="btn btn-danger" href="eliminar.php">
                                              <i class="bi bi-trash-fill"></i> Eliminar
                                          </button>
                                      </form>

                                      </td>

                                    </tr>
                                      <?php
                                    }
                                  }

                                  // Recuerda cerrar la conexión a la base de datos al finalizar
                                  mysqli_close($conexion);
                                  ?>


                                  </tbody>
                                </table>
                              </div>



                          </div>
                          
                        </div>
                      </div>
                    <div class="modal-body">
                        
        
                        <!-- Botón para abrir el modal -->

                        <!-- Modal -->
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        
      
      
    
</body>
</html>