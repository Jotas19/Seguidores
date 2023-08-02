<?php
if (isset($_POST['editar_votante'])) {
    // Obtener los valores del formulario
    $id_votante = $_POST['id_votante'];
    $nombre_votante = $_POST['nombre_votante'];
    $direccion_casa_votante = $_POST['direccion_casa_votante'];
    $nombre_lider = $_POST['nombre_lider'];
    $lugar_votante = $_POST['lugar_votante'];
    $mesa = $_POST['mesa'];

    // Crear la consulta SQL para actualizar los campos
    $sql = "UPDATE Votantes SET nombre_votante = '$nombre_votante', direccion_casa_votante = '$direccion_casa_votante', nombre_lider = '$nombre_lider', lugar_votante = '$lugar_votante', mesa = '$mesa' WHERE id_votante = '$id_votante'";

    // Ejecutar la consulta
    $conexion = mysqli_connect("localhost", "root", "", "seguidores");
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "Los datos se actualizaron correctamente.";
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Redireccionar y detener la ejecución del script
    header('Location: admin.php');
    exit;
}
?>

