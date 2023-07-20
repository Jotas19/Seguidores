-- Tabla Comuna
INSERT INTO Comuna (id_comuna, nombre_lugar) VALUES ('comuna4', 'Comuna D');
INSERT INTO Comuna (id_comuna, nombre_lugar) VALUES ('comuna5', 'Comuna E');

-- Tabla Cordinador
INSERT INTO Cordinador (id_cordinador, nombre_cordinador, direccion_cordinador, telefono_cordinador) VALUES ('coordinador4', 'Luis García', 'Calle Principal 456', '111111222');
INSERT INTO Cordinador (id_cordinador, nombre_cordinador, direccion_cordinador, telefono_cordinador) VALUES ('coordinador5', 'Ana Rodríguez', 'Avenida Central 789', '222222333');

-- Tabla Lider
INSERT INTO Lider (id_lider, nombre_lider, direccion_lider, telefono_lider, nombre_cordinador) VALUES ('lider4', 'Laura Pérez', 'Calle Principal 456', '444444555', 'Luis García');
INSERT INTO Lider (id_lider, nombre_lider, direccion_lider, telefono_lider, nombre_cordinador) VALUES ('lider5', 'Mario Torres', 'Avenida Central 789', '555555666', 'Ana Rodríguez');

-- Tabla Lugar
INSERT INTO Lugar (lugar_votante, direccion_lugar, cantidad_mesas, comuna) VALUES ('lugar4', 'Calle Principal 456', '5', 'comuna4');
INSERT INTO Lugar (lugar_votante, direccion_lugar, cantidad_mesas, comuna) VALUES ('lugar5', 'Avenida Central 789', '3', 'comuna5');

-- Tabla Registro
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Administrador2', 'admin2', 'admin123', 'administrador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Registrador2', 'registrador2', 'reg123', 'registrador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Visualizador2', 'visualizador2', 'vis123', 'visualizador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Administrador3', 'admin3', 'admin123', 'administrador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Registrador3', 'registrador3', 'reg123', 'registrador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Visualizador3', 'visualizador3', 'vis123', 'visualizador');

-- Tabla Votantes
INSERT INTO Votantes (id_votante, nombre_votante, direccion_casa_votante, nombre_lider, lugar_votante, mesa) VALUES ('votante4', 'Carlos Pérez', 'Calle Principal 456', 'Laura Pérez', 'lugar4', 'mesa4');
INSERT INTO Votantes (id_votante, nombre_votante, direccion_casa_votante, nombre_lider, lugar_votante, mesa) VALUES ('votante5', 'María Torres', 'Avenida Central 789', 'Mario Torres', 'lugar5', 'mesa5');