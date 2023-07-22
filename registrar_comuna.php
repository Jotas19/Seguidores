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
    echo "La comuna ha sido creada exitosamente.";
    
    // Redireccionar a la página registrador.php después de 2 segundos
    header("Refresh: 2; url=registrador.php");
} else {
    echo "Error al crear la comuna: " . $conn->error;
    }
    $conn->close();
}
?>

