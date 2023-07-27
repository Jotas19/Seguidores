<?php


    $accion = isset($_GET['accion']) ? $_GET['accion'] : '';
    echo $accion; // Esto mostrará "jotas"
    $tabla = isset($_GET['tabla']) ? $_GET['tabla'] : '';
    echo $tabla; // Esto mostrará "jotas"
    $usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';
    echo $usuario; // Esto mostrará "jotas"


    // Registro tabla
    if ($tabla === 'registro') {
        if ($accion === 'editar_registro') {
            // Llamar a la función para editar un usuario
            editar_registro($usuario);
        } elseif ($accion === 'eliminar_registro') {
            // Llamar a la función para eliminar un usuario
            eliminarUsuario($id);
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }



    // Registro tabla
    } elseif ($tabla === 'lugar') {
        if ($accion === 'editar_lugar') {
            // Llamar a la función para editar un usuario
            editarUsuario($id);
        } elseif ($accion === 'eliminar_lugar') {
            // Llamar a la función para eliminar un usuario
            eliminarUsuario($id);
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }




    // Registro tabla    
    } elseif ($tabla === 'comuna') {
        if ($accion === 'editar_comuna') {
            // Llamar a la función para editar un usuario
            editarUsuario($id);
        } elseif ($accion === 'eliminar_comuna') {
            // Llamar a la función para eliminar un usuario
            eliminarUsuario($id);
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }
    } elseif ($tabla === 'lider'){
        if ($accion === 'editar_lider') {
            // Llamar a la función para editar un usuario
            editarUsuario($id);
        } elseif ($accion === 'eliminar_lider') {
            // Llamar a la función para eliminar un usuario
            eliminarUsuario($id);
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }


    // Registro tabla    
    } elseif ($tabla === 'votante'){
        if ($accion === 'editar_votante') {
            // Llamar a la función para editar un usuario
            editarUsuario($id);
        } elseif ($accion === 'eliminar_votante') {
            // Llamar a la función para eliminar un usuario
            eliminarUsuario($id);
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }



    // Registro tabla    
    } elseif ($tabla === 'cordinador'){
        if ($accion === 'editar_cordinador') {
            // Llamar a la función para editar un usuario
            editarUsuario($id);
        } elseif ($accion === 'eliminar_cordinador') {
            // Llamar a la función para eliminar un usuario
            eliminarUsuario($id);
        } else {
            // Acción no válida, mostrar algún mensaje de error o redirigir
            echo "Acción no válida";
        }
    }
    


// Función para editar un usuario
function editar_registro($usuario) {
    // editar.php
    // Verificar si se ha enviado el ID del registro a editar
    if (isset($_GET["usuario"])) {
        $usuario = $_GET["usuario"];

        // Consulta SQL para editar el registro de la base de datos

    $conexion = mysqli_connect("localhost", "root", "", "seguidores");

    // Verificar la conexión
    if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
    }
    
        // Consulta SQL para seleccionar el registro de la base de datos
        $sql = "SELECT * FROM registro WHERE usuario = '$usuario'";
        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>

            <h1>Funciono, creo</h1>

            <?php
        } else {
            echo "Registro no encontrado.";
        }
    } else {
        echo "ID de registro no especificado.";
    }
    echo "Función editarUsuario() llamada para el ID: " . $usuario;
}

// Función para eliminar un usuario
function eliminarUsuario($id) {
    // Código para eliminar el usuario con el ID proporcionado
    echo "Función eliminarUsuario() llamada para el ID: " . $id;
}

// Función para agregar un usuario
function agregarUsuario() {
    // Código para agregar un nuevo usuario
    echo "Función agregarUsuario() llamada";
}




?>