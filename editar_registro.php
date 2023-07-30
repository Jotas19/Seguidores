<?php

    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    $tabla = isset($_POST['tabla']) ? $_POST['tabla'] : '';
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';

    if ($tabla === 'registro') {
        if ($accion === 'editar_registro') {
            editar_registro();
        } elseif ($accion === 'eliminar_registro') {
            // Llamar a la función para eliminar un usuario
            eliminarUsuario($id);
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }
    }

    function editar_registro(){
        // Verificar si el formulario ha sido enviado y el botón "Editar" ha sido presionado
    if (isset($_POST['editar'])) {

        $conexion=mysqli_connect("localhost","root","","seguidores");

        // Obtener los valores del formulario
        $tipo_usuario = $_POST['tipo_usuario'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $confirmPassword = $_POST['confirmPassword'];

        // Verificar si las contraseñas coinciden
        if ($contraseña !== $confirmPassword) {
            echo "Las contraseñas no coinciden. Por favor, verifica.";
        } else {
            // Crear la consulta SQL para actualizar los campos
            $sql = "UPDATE Registro SET tipo_usuario = '$tipo_usuario', nombre = '$nombre', contraseña = '$contraseña' WHERE usuario = '$usuario'";

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
    }

    }
    
?>