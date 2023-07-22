-- Configura la clave de encriptación (reemplaza 'tu_clave_secreta' con una clave segura)
SET @clave_encriptacion = '33f9f97aeb0d171c53181dd17a1a97f8';

-- Tabla Comuna
UPDATE Comuna SET nombre_lugar = AES_ENCRYPT(nombre_lugar, @clave_encriptacion);

-- Tabla Cordinador
UPDATE Cordinador 
SET 
  nombre_cordinador = AES_ENCRYPT(nombre_cordinador, @clave_encriptacion),
  direccion_cordinador = AES_ENCRYPT(direccion_cordinador, @clave_encriptacion),
  telefono_cordinador = AES_ENCRYPT(telefono_cordinador, @clave_encriptacion);

-- Tabla Lider
UPDATE Lider 
SET 
  nombre_lider = AES_ENCRYPT(nombre_lider, @clave_encriptacion),
  direccion_lider = AES_ENCRYPT(direccion_lider, @clave_encriptacion),
  telefono_lider = AES_ENCRYPT(telefono_lider, @clave_encriptacion),
  nombre_cordinador = AES_ENCRYPT(nombre_cordinador, @clave_encriptacion);

-- Tabla Lugar
UPDATE Lugar SET direccion_lugar = AES_ENCRYPT(direccion_lugar, @clave_encriptacion);

-- Tabla Registro
UPDATE Registro 
SET 
  nombre = AES_ENCRYPT(nombre, @clave_encriptacion),
  usuario = AES_ENCRYPT(usuario, @clave_encriptacion),
  contraseña = AES_ENCRYPT(contraseña, @clave_encriptacion),
  tipo_usuario = AES_ENCRYPT(tipo_usuario, @clave_encriptacion);

-- Tabla Votantes
UPDATE Votantes 
SET 
  nombre_votante = AES_ENCRYPT(nombre_votante, @clave_encriptacion),
  direccion_casa_votante = AES_ENCRYPT(direccion_casa_votante, @clave_encriptacion),
  nombre_lider = AES_ENCRYPT(nombre_lider, @clave_encriptacion),
  lugar_votante = AES_ENCRYPT(lugar_votante, @clave_encriptacion),
  mesa = AES_ENCRYPT(mesa, @clave_encriptacion);
