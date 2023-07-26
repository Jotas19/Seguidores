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

    $idVotante = $_POST["inputIdVotante"];
    $nombreVotante = $_POST["inputNombreVotante"];
    $direccionCasaVotante = $_POST["inputDireccionCasaVotante"];
    $nombreLider = $_POST["inputNombreLider"];
    $lugarVotante = $_POST["inputLugarVotante"]; // Aquí obtenemos directamente el valor del select
    $mesa = $_POST["inputMesa"];

    // Verificar si el nombre del líder existe en la tabla "lider"
    $sqlLider = "SELECT nombre_lider FROM lider WHERE nombre_lider = '$nombreLider'";
    $resultLider = $conn->query($sqlLider);
    if ($resultLider->num_rows === 0) {
        echo '<div class="alert alert-danger" role="alert">El líder especificado no existe.</div>';
        $conn->close();
        exit();
    }

    // Verificar si el lugar de votante existe en la tabla "lugar"
    $sqlLugar = "SELECT lugar_votante FROM lugar WHERE lugar_votante = '$lugarVotante'";
    $resultLugar = $conn->query($sqlLugar);
    if ($resultLugar->num_rows === 0) {
        echo '<div class="alert alert-danger" role="alert">El lugar de votante especificado no existe.</div>';
        $conn->close();
        exit();
    }

    $sql = "INSERT INTO votantes (id_votante, nombre_votante, direccion_casa_votante, nombre_lider, lugar_votante, mesa) 
            VALUES ('$idVotante', '$nombreVotante', '$direccionCasaVotante', '$nombreLider', '$lugarVotante', '$mesa')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">El votante ha sido registrado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al registrar el votante: ' . $conn->error . '</div>';
    }

    $conn->close();
}
?>

<a href="registrador.php" class="btn btn-primary">Regresar</a>