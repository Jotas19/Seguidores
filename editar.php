<?php
// editar.php

// Verificar si se ha enviado el ID del registro a editar
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Consulta SQL para editar el registro de la base de datos

$conexion = mysqli_connect("localhost", "root", "", "seguidores");

// Verificar la conexión
if (!$conexion) {
 die("Error de conexión: " . mysqli_connect_error());
}
 
    // Consulta SQL para seleccionar el registro de la base de datos
    $sql = "SELECT * FROM tu_tabla WHERE id = $id";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>

        <form method="POST" action="actualizar.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label>Nombre:</label>
            <input type="text" name="nuevo_nombre" value="<?php echo $row['nombre']; ?>"><br>
            <label>Email:</label>
            <input type="email" name="nuevo_email" value="<?php echo $row['email']; ?>"><br>
            <input type="submit" value="Actualizar">
        </form>

        <?php
    } else {
        echo "Registro no encontrado.";
    }
} else {
    echo "ID de registro no especificado.";
}
?>