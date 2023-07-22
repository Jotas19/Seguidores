<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    // Obtener los valores del formulario para registrar el lugar
    $lugarVotante = $_POST["inputLugarVotante"];
    $direccionLugar = $_POST["inputDireccionLugar"];
    $cantidadMesas = $_POST["inputCantidadMesas"];
    $comunaFK = $_POST["inputComunaFK"];

    // Preparar la consulta SQL para insertar el lugar en la tabla
    $sql = "INSERT INTO lugar (lugar_votante, direccion_lugar, cantidad_mesas, comuna) 
            VALUES ('$lugarVotante', '$direccionLugar', '$cantidadMesas', '$comunaFK')";

    // Verificar si el lugar ya existe en la base de datos antes de insertar
    $sql_verificar = "SELECT lugar_votante FROM lugar WHERE lugar_votante = '$lugarVotante'";
    $result_verificar = $conn->query($sql_verificar);

    if ($result_verificar->num_rows > 0) {
        echo "Error: El lugar ya existe en la base de datos.";
    } else {
        // Ejecutar la consulta y verificar si fue exitosa
        if ($conn->query($sql) === TRUE) {
            echo "El lugar ha sido registrado exitosamente.";
        } else {
            echo "Error al registrar el lugar: " . $conn->error;
        }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>





