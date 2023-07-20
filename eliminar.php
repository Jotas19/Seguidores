<?php
// eliminar.php

// Verificar si se ha enviado el ID del registro a eliminar
if (isset($_GET["lugar_votante"])) {
    $id = $_GET["lugar_votante"];
  
// Consulta SQL para eliminar el registro de la base de datos

$conexion = mysqli_connect("localhost", "root", "", "seguidores");

   // Verificar la conexión
   if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
    
   
$SQL = "DELETE FROM lugar WHERE lugar_votante = '" . mysqli_real_escape_string($conexion, $id) . "'";

// Ejecutar la consulta
if (mysqli_query($conexion, $SQL)) 
{
    echo "Registro eliminado correctamente.";
} 

else 
{
    echo "Error al eliminar el registro: " . mysqli_error($conexion) . " - SQL: " . $SQL;
}

 // Cerrar la conexión
 mysqli_close($conexion);
} 

else 
{
    echo "ID de registro no especificado.";
}
?>