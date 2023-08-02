<?php
    if (isset($_POST['editar_coordinador'])) {
        // Obtener los valores del formulario
        $id_coordinador = $_POST['id_cordinador'];
        $nombre_coordinador = $_POST['nombre_cordinador'];
        $direccion_coordinador = $_POST['direccion_cordinador'];
        $telefono_coordinador = $_POST['telefono_cordinador'];
    
        // Crear la consulta SQL para actualizar los campos
        $sql = "UPDATE Cordinador SET nombre_cordinador = '$nombre_coordinador', direccion_cordinador = '$direccion_coordinador', telefono_cordinador = '$telefono_coordinador' WHERE id_cordinador = '$id_coordinador'";
    
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