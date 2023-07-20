<?php
$conexion=mysqli_connect("localhost","root","","seguidores");

if(isset($_POST['registrar']))
{
    if(strlen($_POST['tipo_usuario'])>=1 && strlen($_POST['nombre'])>=1 && strlen($_POST['usuario']) && strlen($_POST['contraseña'])>=1)
    {
        $tipo_usuario = trim($_POST['tipo_usuario']);
        $nombre = trim($_POST['nombre']);
        $usuario = trim($_POST['usuario']);
        $contraseña = trim($_POST['contraseña']);
        $consulta = "INSERT INTO registro (tipo_usuario,nombre,usuario,contraseña)
        VALUES ('$tipo_usuario','$nombre','$usuario','$contraseña')";

        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);

        header('Location: ../admin.php');

    }
}



?>