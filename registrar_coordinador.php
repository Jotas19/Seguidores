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

    $idCoordinador = $_POST["inputIdCoordinador"];
    $nombreCoordinador = $_POST["inputNombreCoordinador"];
    $direccionCoordinador = $_POST["inputDireccionCoordinador"];
    $telefonoCoordinador = $_POST["inputTelefonoCoordinador"];

    // Preparar la consulta SQL para insertar el coordinador en la tabla
    $sql = "INSERT INTO Cordinador (id_cordinador, nombre_cordinador, direccion_cordinador, telefono_cordinador) 
            VALUES ('$idCoordinador', '$nombreCoordinador', '$direccionCoordinador', '$telefonoCoordinador')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">El coordinador ha sido agregado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al agregar el coordinador: ' . $conn->error . '</div>';
    }

   
    $conn->close();
}
?>


<a href="registrador.php" class="btn btn-orange">Regresar</a>
