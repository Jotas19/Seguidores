<?php
if (isset($_POST['editar_lider'])) {
    // Obtener los valores del formulario
    $id_lider = $_POST['id_lider'];
    $nombre_lider = $_POST['nombre_lider'];
    $direccion_lider = $_POST['direccion_lider'];
    $telefono_lider = $_POST['telefono_lider'];
    $nombre_coordinador = $_POST['nombre_cordinador'];

    // Crear la consulta SQL para actualizar los campos
    $sql = "UPDATE Lider SET nombre_lider = '$nombre_lider', direccion_lider = '$direccion_lider', telefono_lider = '$telefono_lider', nombre_cordinador = '$nombre_coordinador' WHERE id_lider = '$id_lider'";

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