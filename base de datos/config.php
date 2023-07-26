<?php
// Configura la clave de encriptación (reemplaza 'tu_clave_secreta' con una clave segura)
$clave_encriptacion = '33f9f97aeb0d171c53181dd17a1a97f8';

// Encriptar la clave con una función hash segura (SHA-256) antes de guardarla
$clave_encriptada = hash('sha256', $clave_encriptacion);

// Guardar la clave en un archivo de configuración
file_put_contents('config.php', '<?php define(\'CLAVE_ENCRYPT\', \'' . $clave_encriptada . '\'); ?>');
?>
