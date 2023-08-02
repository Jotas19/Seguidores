<?php

if (isset($_POST['editar_comuna'])) {
    // Obtener los datos del formulario
    $id_comuna = $_POST['id_comuna_encontrado'];
    $nombre_lugar = $_POST['nombre_lugar_encontrado'];
    // Agrega aquí los demás campos que desees actualizar

    // Crear la consulta SQL para actualizar la comuna
    $sql = "UPDATE Comuna SET nombre_lugar = '$nombre_lugar' WHERE id_comuna = '$id_comuna'";

    // Ejecutar la consulta
    $conexion = mysqli_connect("localhost", "root", "", "seguidores");
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "La comuna se actualizó correctamente.";
    } else {
        echo "Error al actualizar la comuna: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Redireccionar y detener la ejecución del script
    header('Location: ../visualizador.php');
    exit;
}
    ?>