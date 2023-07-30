<?php
    $conexion = mysqli_connect("localhost", "root", "", "seguidores");
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    $tabla = isset($_POST['tabla']) ? $_POST['tabla'] : '';
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';

    // Registro tabla
    if ($tabla === 'registro') {
        if ($accion === 'editar_registro') {
            editar_registro();
        } elseif ($accion === 'eliminar_registro') {
            // Llamar a la función para eliminar un usuario
            eliminar_registro();
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }



    // Registro tabla
    } elseif ($tabla === 'lugar') {
        if ($accion === 'editar_lugar') {
            // Llamar a la función para editar un usuario
            editar_lugar();
        } elseif ($accion === 'eliminar_lugar') {
            // Llamar a la función para eliminar un usuario
            eliminar_lugar();
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }




    // Registro tabla    
    } elseif ($tabla === 'comuna') {
        if ($accion === 'editar_comuna') {
            // Llamar a la función para editar un usuario
            editar_comuna();
        } elseif ($accion === 'eliminar_comuna') {
            // Llamar a la función para eliminar un usuario
            eliminar_comuna();
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }


    } elseif ($tabla === 'lider'){
        if ($accion === 'editar_lider') {
            // Llamar a la función para editar un usuario
            editar_lider();
        } elseif ($accion === 'eliminar_lider') {
            // Llamar a la función para eliminar un usuario
            eliminar_lider();
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }


    // Registro tabla    
    } elseif ($tabla === 'votante'){
        if ($accion === 'editar_votante') {
            // Llamar a la función para editar un usuario
            editar_votante();
        } elseif ($accion === 'eliminar_votante') {
            // Llamar a la función para eliminar un usuario
            eliminar_votante();
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }



    // Registro tabla    
    } elseif ($tabla === 'cordinador'){
        if ($accion === 'editar_cordinador') {
            // Llamar a la función para editar un usuario
            editar_cordinador();
        } elseif ($accion === 'eliminar_cordinador') {
            // Llamar a la función para eliminar un usuario
            eliminar_cordinador();
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }
    }
    


// Función para editar un usuario
function editar_registro() {
    // Verificar si el formulario ha sido enviado y el botón "Editar" ha sido presionado
    if (isset($_POST['editar'])) {

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

// Función para eliminar un usuario
function eliminar_registro() {
// Verificar si el formulario ha sido enviado y el botón "Eliminar Registro" ha sido presionado
if (isset($_POST['eliminar_registro'])) {
    // Obtener el nombre de usuario a eliminar
    $nombre_usuario = $_POST['usuario'];

    // Crear la consulta SQL para eliminar el registro
    $sql = "DELETE FROM Registro WHERE usuario = '$nombre_usuario'";

    // Ejecutar la consulta
    $conexion = mysqli_connect("localhost", "usuario_db", "contraseña_db", "nombre_db");
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "El registro se eliminó correctamente.";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Redireccionar y detener la ejecución del script
    header('Location: admin.php');
    exit;
}
}

// Función para editar un usuario en la tabla 'lugar'
function editar_lugar() {
// Verificar si el formulario ha sido enviado y el botón "Editar Lugar" ha sido presionado
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
}

// Función para eliminar un usuario de la tabla 'lugar'
function eliminar_lugar() {
// Verificar si el formulario ha sido enviado y el botón "Eliminar Lugar" ha sido presionado
if (isset($_POST['eliminar_lugar'])) {
    // Obtener el nombre del lugar a eliminar
    $lugar_votante = $_POST['lugar_votante'];

    // Crear la consulta SQL para eliminar el lugar
    $sql = "DELETE FROM Lugar WHERE lugar_votante = '$lugar_votante'";

    // Ejecutar la consulta
    $conexion = mysqli_connect("localhost", "root", "", "seguidores");
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "El lugar se eliminó correctamente.";
    } else {
        echo "Error al eliminar el lugar: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Redireccionar y detener la ejecución del script
    header('Location: admin.php');
    exit;
}
}

// Función para editar un usuario en la tabla 'comuna'
function editar_comuna() {
    if (isset($_POST['eliminar_comuna'])) {
        // Obtener el ID de la comuna a eliminar
        $id_comuna = $_POST['id_comuna'];
    
        // Crear la consulta SQL para eliminar la comuna
        $sql = "DELETE FROM Comuna WHERE id_comuna = '$id_comuna'";
    
        // Ejecutar la consulta
        $conexion = mysqli_connect("localhost", "root", "", "seguidores");
        $resultado = mysqli_query($conexion, $sql);
    
        // Verificar si la consulta fue exitosa
        if ($resultado) {
            echo "La comuna se eliminó correctamente.";
        } else {
            echo "Error al eliminar la comuna: " . mysqli_error($conexion);
        }
    
        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    
        // Redireccionar y detener la ejecución del script
        header('Location: admin.php');
        exit;
    }
}

// Función para eliminar un usuario de la tabla 'comuna'
function eliminar_comuna() {
    if (isset($_POST['eliminar_comuna'])) {
        // Obtener el ID de la comuna a eliminar
        $id_comuna = $_POST['id_comuna'];
    
        // Crear la consulta SQL para eliminar la comuna
        $sql = "DELETE FROM Comuna WHERE id_comuna = '$id_comuna'";
    
        // Ejecutar la consulta
        $conexion = mysqli_connect("localhost", "usuario_db", "contraseña_db", "nombre_db");
        $resultado = mysqli_query($conexion, $sql);
    
        // Verificar si la consulta fue exitosa
        if ($resultado) {
            echo "La comuna se eliminó correctamente.";
        } else {
            echo "Error al eliminar la comuna: " . mysqli_error($conexion);
        }
    
        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    
        // Redireccionar y detener la ejecución del script
        header('Location: admin.php');
        exit;
    }
}

// Función para editar un usuario en la tabla 'lider'
function editar_lider() {
// Verificar si el formulario ha sido enviado y el botón "Editar Líder" ha sido presionado
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
}

// Función para eliminar un usuario de la tabla 'lider'
function eliminar_lider() {
// Verificar si el formulario ha sido enviado y el botón "Eliminar Lider" ha sido presionado
if (isset($_POST['eliminar_lider'])) {
    // Obtener el ID del líder a eliminar
    $id_lider = $_POST['id_lider'];

    // Crear la consulta SQL para eliminar el líder
    $sql = "DELETE FROM Lider WHERE id_lider = '$id_lider'";

    // Ejecutar la consulta
    $conexion = mysqli_connect("localhost", "usuario_db", "contraseña_db", "nombre_db");
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "El líder se eliminó correctamente.";
    } else {
        echo "Error al eliminar el líder: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Redireccionar y detener la ejecución del script
    header('Location: admin.php');
    exit;
}
}

// Función para editar un usuario en la tabla 'votante'
function editar_votante() {
// Verificar si el formulario ha sido enviado y el botón "Editar Votante" ha sido presionado
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
}

// Función para eliminar un usuario de la tabla 'votante'
function eliminar_votante() {
    if (isset($_POST['eliminar_votante'])) {
        // Obtener el ID del votante a eliminar
        $id_votante = $_POST['id_votante'];
    
        // Crear la consulta SQL para eliminar el votante
        $sql = "DELETE FROM Votantes WHERE id_votante = '$id_votante'";
    
        // Ejecutar la consulta
        $conexion = mysqli_connect("localhost", "root", "", "seguidores");
        $resultado = mysqli_query($conexion, $sql);
    
        // Verificar si la consulta fue exitosa
        if ($resultado) {
            echo "El votante se eliminó correctamente.";
        } else {
            echo "Error al eliminar el votante: " . mysqli_error($conexion);
        }
    
        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    
        // Redireccionar y detener la ejecución del script
        header('Location: admin.php');
        exit;
    }
}

// Función para editar un usuario en la tabla 'cordinador'
function editar_cordinador() {
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
}


// Función para eliminar un usuario de la tabla 'cordinador'
function eliminar_cordinador() {
    // Verificar si el formulario ha sido enviado y el botón "Eliminar Coordinador" ha sido presionado
if (isset($_POST['eliminar_coordinador'])) {
    // Obtener el nombre del coordinador a eliminar
    $nombre_coordinador = $_POST['nombre_cordinador'];

    // Crear la consulta SQL para eliminar el coordinador
    $sql = "DELETE FROM Cordinador WHERE nombre_cordinador = '$nombre_coordinador'";

    // Ejecutar la consulta
    $conexion = mysqli_connect("localhost", "root", "", "seguidores");
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "El coordinador se eliminó correctamente.";
    } else {
        echo "Error al eliminar el coordinador: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Redireccionar y detener la ejecución del script
    header('Location: admin.php');
    exit;
}
}

?>