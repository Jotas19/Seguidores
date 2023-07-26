<?php
$conexion=mysqli_connect("localhost","root","","seguidores");

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



if(isset($_POST['registrar']))
{
    if(strlen($_POST['tipo_usuario'])>=1 && strlen($_POST['nombre'])>=1 && strlen($_POST['usuario']) && strlen($_POST['contraseña'])>=1)
    {
        $tipo_usuario = trim($_POST['tipo_usuario']);
        $nombre = trim($_POST['nombre']);
        $usuario = trim($_POST['usuario']);
        $contraseña = trim($_POST['contraseña']);

        $tipo_usuario_encriptado = openssl_encrypt($tipo_usuario, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
        $nombre_encriptado = openssl_encrypt($nombre, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
        $usuario_encriptado = openssl_encrypt($usuario, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
        $contraseña_encriptada = openssl_encrypt($contraseña, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);

        $tipo_usuario_desencriptado = openssl_decrypt($tipo_usuario_encriptado, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
        $nombre_desencriptado = openssl_decrypt($nombre_encriptado, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
        $usuario_desencriptado = openssl_decrypt($usuario_encriptado, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);
        $contraseña_desencriptada = openssl_decrypt($contraseña_encriptada, $method, $clave_secreta, OPENSSL_RAW_DATA, $iv);


        $consulta = "INSERT INTO registro (tipo_usuario,nombre,usuario,contraseña)
        VALUES ('$tipo_usuario_desencriptado','$nombre_desencriptado','$usuario_desencriptado','$contraseña_desencriptada')";

        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);

        header('Location: ../admin.php');

    }
}



?>