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

    $idLider = $_POST["inputIdLider"];
    $nombreLider = $_POST["inputNombreLider"];
    $direccionLider = $_POST["inputDireccionLider"];
    $telefonoLider = $_POST["inputTelefonoLider"];
    $nombreCoordinador = $_POST["inputNombreCoordinador"];

   
    $existeCoordinador = false;

    if ($nombreCoordinador !== "") {
      
        $sql = "SELECT nombre_cordinador FROM Cordinador WHERE nombre_cordinador = '$nombreCoordinador'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $existeCoordinador = true;
        }
    }


    if ($existeCoordinador) {
        // Preparar la consulta SQL para insertar el líder en la tabla
        $sql = "INSERT INTO lider (id_lider, nombre_lider, direccion_lider, telefono_lider, nombre_cordinador) 
                VALUES ('$idLider', '$nombreLider', '$direccionLider', '$telefonoLider', '$nombreCoordinador')";

        // Verificar si el líder ya existe en la base de datos antes de insertar
        $sql_verificar = "SELECT nombre_lider FROM lider WHERE nombre_lider = '$nombreLider'";
        $result_verificar = $conn->query($sql_verificar);

        if ($result_verificar->num_rows > 0) {
            echo '<div class="alert alert-danger" role="alert">Error: El líder ya existe en la base de datos.</div>';
        } else {
            // Ejecutar la consulta y verificar si fue exitosa
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">El líder ha sido agregado exitosamente.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al agregar el líder: ' . $conn->error . '</div>';
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: El coordinador seleccionado no existe en la base de datos.</div>';
    }

  
    $conn->close();
}
?>

<a href="registrador.php" class="btn btn-primary">Regresar</a>
