<?php
if (isset($_POST['editar_lugar'])) {
    // Obtener los valores del formulario
    $lugar_votante = $_POST['lugar_votante'];
    $direccion_lugar = $_POST['direccion_lugar'];
    $cantidad_mesas = $_POST['cantidad_mesas'];
    $comuna = $_POST['comuna'];

    // Crear la consulta SQL para actualizar los campos
    $sql = "UPDATE Lugar SET direccion_lugar = '$direccion_lugar', cantidad_mesas = '$cantidad_mesas', comuna = '$comuna' WHERE lugar_votante = '$lugar_votante'";

    // Ejecutar la consulta
    $conexion = mysqli_connect("localhost", "usuario_db", "contraseña_db", "nombre_db");
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


              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              