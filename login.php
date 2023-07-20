<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguidores - Inicio de Sesión</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="vh-100" style="background-color: #791fc2;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong slide slide-in" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Iniciar sesión</h3>

                            <form action="validar_login.php" method="POST">

                                <div class="form-outline mb-4">
                                    <label for="tipoUsuario" class="form-label">¿Qué tipo de usuario eres?</label>
                                    <select class="form-select" name="tipo_usuario" id="tipoUsuario"
                                        aria-label="Tipo de usuario">
                                        <option value="administrador">Administrador</option>
                                        <option value="registrador">Registrador</option>
                                        <option value="visualizador">Visualizador</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <input type="text" autocomplete="off" class="form-control" name="usuario" 
                                        id="exampleFormControlInput1" placeholder="Correo Electrónico o Usuario">
                                </div>

                                <div class="mb-3">
                                    <input type="password" class="form-control" name="contraseña"
                                        id="exampleFormControlInput1" placeholder="Contraseña">
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                    <label class="form-check-label" for="form1Example3">Recordar contraseña</label>
                                </div>

                            <style>
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


                                <button class="btn btn-orange btn-lg btn-block btn-orange" type="submit">Iniciar sesión</button>



                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
