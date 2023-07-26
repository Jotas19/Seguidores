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

// Generar una cadena aleatoria de 12 caracteres
$longitud = 12;
$bytesAleatorios = random_bytes($longitud);

// Convertir los bytes aleatorios a una cadena legible
$caracteresPermitidos = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_!@#$%^&*()-+=[]{}|;:,.<>?';
$caracteresAleatorios = '';
foreach (str_split($bytesAleatorios) as $byte) {
    $caracteresAleatorios .= $caracteresPermitidos[ord($byte) % strlen($caracteresPermitidos)];
}

// La variable $cadenaAleatoria contendrá la cadena de 12 caracteres generada aleatoriamente
$cadenaAleatoria = $caracteresAleatorios;

// Clave secreta para el cifrado (asegúrate de guardarla de forma segura)
$clave_secreta = $cadenaAleatoria;

// Método de cifrado AES-256-CBC (256 bits)
$method = "aes-256-cbc";

// Vector de inicialización (IV) para agregar aleatoriedad al cifrado
$iv_length = openssl_cipher_iv_length($method);
$iv = openssl_random_pseudo_bytes($iv_length);

// Encriptar los datos
$usuario_encriptado = openssl_encrypt($usuario, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
$contraseña_encriptada = openssl_encrypt($contraseña, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
$tipo_usuario_encriptado = openssl_encrypt($tipo_usuario, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);

// Consultar la tabla para verificar los datos del usuario
$sql = "SELECT * FROM Registro WHERE usuario = '$usuario'";
$resultado = $conn->query($sql);

// Verificar si se encontró un resultado
if ($resultado && $resultado->num_rows > 0) {
    // Obtener los datos del usuario
    $fila = $resultado->fetch_assoc();
    $usuario_desencriptado = openssl_decrypt($usuario_encriptado, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
    $nombre = $fila['nombre'];
    $contraseña_desencriptada = openssl_decrypt($contraseña_encriptada, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
    $contraseña_hash = $fila['contraseña'];
    $tipo_usuario_desencriptado = openssl_decrypt($tipo_usuario_encriptado, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
    $tipo_usuario_db = $fila['tipo_usuario'];

    // Verificar el tipo de usuario
    if ($tipo_usuario_desencriptado == $tipo_usuario_db) {
        // Verificar la contraseña
        if ($contraseña_desencriptada == $contraseña_hash) {
            // La contraseña y el tipo de usuario coinciden, iniciar sesión o redirigir a la página correspondiente
            session_start();
            $_SESSION['usuario'] = $usuario_desencriptado;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['tipo_usuario'] = $tipo_usuario_desencriptado;

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

$usuario_encriptado = openssl_encrypt($usuario, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
$contraseña_encriptada = openssl_encrypt($contraseña, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
$tipo_usuario_encriptado = openssl_encrypt($tipo_usuario, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);

// Cerrar la conexión a la base de datos
$conn->close();
?>
