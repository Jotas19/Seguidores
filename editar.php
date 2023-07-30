<?php
    
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
    // Código para eliminar el usuario con el ID proporcionado
    
}

// Función para editar un usuario en la tabla 'lugar'
function editar_lugar() {
    // Código para editar un usuario en la tabla 'lugar'
    // Aquí puedes realizar la consulta y el proceso de edición según tus necesidades
}

// Función para eliminar un usuario de la tabla 'lugar'
function eliminar_lugar() {
    // Código para eliminar un usuario de la tabla 'lugar'
    // Aquí puedes realizar la consulta y el proceso de eliminación según tus necesidades
}

// Función para editar un usuario en la tabla 'comuna'
function editar_comuna() {
    // Código para editar un usuario en la tabla 'comuna'
    // Aquí puedes realizar la consulta y el proceso de edición según tus necesidades
}

// Función para eliminar un usuario de la tabla 'comuna'
function eliminar_comuna() {
    // Código para eliminar un usuario de la tabla 'comuna'
    // Aquí puedes realizar la consulta y el proceso de eliminación según tus necesidades
}

// Función para editar un usuario en la tabla 'lider'
function editar_lider() {
    // Código para editar un usuario en la tabla 'lider'
    // Aquí puedes realizar la consulta y el proceso de edición según tus necesidades
}

// Función para eliminar un usuario de la tabla 'lider'
function eliminar_lider() {
    // Código para eliminar un usuario de la tabla 'lider'
    // Aquí puedes realizar la consulta y el proceso de eliminación según tus necesidades
}

// Función para editar un usuario en la tabla 'votante'
function editar_votante() {
    // Código para editar un usuario en la tabla 'votante'
    // Aquí puedes realizar la consulta y el proceso de edición según tus necesidades
}

// Función para eliminar un usuario de la tabla 'votante'
function eliminar_votante() {
    // Código para eliminar un usuario de la tabla 'votante'
    // Aquí puedes realizar la consulta y el proceso de eliminación según tus necesidades
}

// Función para editar un usuario en la tabla 'cordinador'
function editar_cordinador() {
    // Código para editar un usuario en la tabla 'cordinador'
    // Aquí puedes realizar la consulta y el proceso de edición según tus necesidades
}

// Función para eliminar un usuario de la tabla 'cordinador'
function eliminar_cordinador() {
    // Código para eliminar un usuario de la tabla 'cordinador'
    // Aquí puedes realizar la consulta y el proceso de eliminación según tus necesidades
}


?>