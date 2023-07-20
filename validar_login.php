<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seguidores";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si se estableció correctamente la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario de inicio de sesión
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$tipo_usuario = $_POST['tipo_usuario'];

// Consultar la tabla para verificar los datos del usuario
$sql = "SELECT * FROM Registro WHERE usuario = '$usuario'";
$resultado = $conn->query($sql);

// Verificar si se encontró un resultado
if ($resultado && $resultado->num_rows > 0) {
    // Obtener los datos del usuario
    $fila = $resultado->fetch_assoc();
    $nombre = $fila['nombre'];
    $contraseña_hash = $fila['contraseña'];
    $tipo_usuario_db = $fila['tipo_usuario'];

    // Verificar el tipo de usuario
    if ($tipo_usuario == $tipo_usuario_db) {
        // Verificar la contraseña
        if ($contraseña == $contraseña_hash) {
            // La contraseña y el tipo de usuario coinciden, iniciar sesión o redirigir a la página correspondiente
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['tipo_usuario'] = $tipo_usuario;

            // Redirigir según el tipo de usuario
            if ($tipo_usuario == "registrador") {
                header("Location: registrador.php");
            } elseif ($tipo_usuario == "administrador") {
                header("Location: admin.php");
            } elseif ($tipo_usuario == "visualizador") {
                header("Location: visualizador.php");
            }
            exit();
        } else {
            // La contraseña es incorrecta
            echo "<script>alert('La contraseña ingresada es incorrecta'); window.location.href = 'login.php';</script>";
        }
    } else {
        // El tipo de usuario no coincide
        echo "<script>alert('El tipo de usuario no coincide'); window.location.href = 'login.php';</script>";
        echo $tipo_usuario;
    }
} else {
    // No se encontró el usuario en la base de datos
    echo "<script>alert('No se encontró el usuario en la base de datos'); window.location.href = 'login.php';</script>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
