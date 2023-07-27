-- Tabla Comuna
INSERT INTO Comuna (id_comuna, nombre_lugar) VALUES ('comuna4', 'Comuna D');
INSERT INTO Comuna (id_comuna, nombre_lugar) VALUES ('comuna5', 'Comuna E');
INSERT INTO Comuna (id_comuna, nombre_lugar) VALUES
('comuna16', 'Comuna P'),
('comuna17', 'Comuna Q'),
('comuna18', 'Comuna R'),
('comuna19', 'Comuna S'),
('comuna20', 'Comuna T'),
('comuna21', 'Comuna U'),
('comuna22', 'Comuna V'),
('comuna23', 'Comuna W'),
('comuna24', 'Comuna X'),
('comuna25', 'Comuna Y');

-- Tabla Cordinador
INSERT INTO Cordinador (id_cordinador, nombre_cordinador, direccion_cordinador, telefono_cordinador) VALUES ('coordinador4', 'Luis García', 'Calle Principal 456', '111111222');
INSERT INTO Cordinador (id_cordinador, nombre_cordinador, direccion_cordinador, telefono_cordinador) VALUES ('coordinador5', 'Ana Rodríguez', 'Avenida Central 789', '222222333');
INSERT INTO Coordinador (id_cordinador, nombre_cordinador, direccion_cordinador, telefono_cordinador) VALUES
('coordinador16', 'Carlos Ramírez', 'Calle Principal 999', '111000888'),
('coordinador17', 'Ana Gómez', 'Avenida Central 777', '222333444'),
('coordinador18', 'Luis Sánchez', 'Calle del Sol 222', '444555666'),
('coordinador19', 'Marta Torres', 'Avenida del Mar 333', '777888999'),
('coordinador20', 'Pedro Martínez', 'Calle Luna 444', '999000111'),
('coordinador21', 'Laura Ramírez', 'Avenida de la Luna 555', '222333444'),
('coordinador22', 'Sofía Gómez', 'Calle del Sol 666', '555666777'),
('coordinador23', 'Manuel Sánchez', 'Avenida Central 777', '888999000'),
('coordinador24', 'Camila Torres', 'Calle del Mar 888', '111222333'),
('coordinador25', 'Javier Martínez', 'Avenida del Sol 999', '444555666');


-- Tabla Lider
INSERT INTO Lider (id_lider, nombre_lider, direccion_lider, telefono_lider, nombre_cordinador) VALUES ('lider4', 'Laura Pérez', 'Calle Principal 456', '444444555', 'Luis García');
INSERT INTO Lider (id_lider, nombre_lider, direccion_lider, telefono_lider, nombre_cordinador) VALUES ('lider5', 'Mario Torres', 'Avenida Central 789', '555555666', 'Ana Rodríguez');
INSERT INTO Lider (id_lider, nombre_lider, direccion_lider, telefono_lider, nombre_cordinador) VALUES
('lider16', 'Laura López', 'Calle Principal 999', '777888999', 'Carlos Ramírez'),
('lider17', 'Sergio Gómez', 'Avenida Central 777', '111222333', 'Ana Gómez'),
('lider18', 'María Sánchez', 'Calle del Sol 222', '444555666', 'Luis Sánchez'),
('lider19', 'Carlos Torres', 'Avenida del Mar 333', '888999000', 'Marta Torres'),
('lider20', 'Sofía Martínez', 'Calle Luna 444', '222333444', 'Pedro Martínez'),
('lider21', 'Jorge Ramírez', 'Avenida de la Luna 555', '555666777', 'Laura Ramírez'),
('lider22', 'Ana Gómez', 'Calle del Sol 666', '888999000', 'Sofía Gómez'),
('lider23', 'Luis Sánchez', 'Avenida Central 777', '111222333', 'Manuel Sánchez'),
('lider24', 'Marta Torres', 'Calle del Mar 888', '444555666', 'Camila Torres'),
('lider25', 'Pedro Martínez', 'Avenida del Sol 999', '777888999', 'Javier Martínez');


-- Tabla Lugar
INSERT INTO Lugar (lugar_votante, direccion_lugar, cantidad_mesas, comuna) VALUES ('lugar4', 'Calle Principal 456', '5', 'comuna4');
INSERT INTO Lugar (lugar_votante, direccion_lugar, cantidad_mesas, comuna) VALUES ('lugar5', 'Avenida Central 789', '3', 'comuna5');
INSERT INTO Lugar (lugar_votante, direccion_lugar, cantidad_mesas, comuna) VALUES
('lugar16', 'Calle Principal 999', '3', 'comuna16'),
('lugar17', 'Avenida Central 777', '4', 'comuna17'),
('lugar18', 'Calle del Sol 222', '5', 'comuna18'),
('lugar19', 'Avenida del Mar 333', '3', 'comuna19'),
('lugar20', 'Calle Luna 444', '6', 'comuna20'),
('lugar21', 'Avenida de la Luna 555', '2', 'comuna21'),
('lugar22', 'Calle del Sol 666', '5', 'comuna22'),
('lugar23', 'Avenida Central 777', '4', 'comuna23'),
('lugar24', 'Calle del Mar 888', '3', 'comuna24'),
('lugar25', 'Avenida del Sol 999', '6', 'comuna25');


-- Tabla Registro
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Administrador2', 'admin2', 'admin123', 'administrador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Registrador2', 'registrador2', 'reg123', 'registrador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Visualizador2', 'visualizador2', 'vis123', 'visualizador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Administrador3', 'admin3', 'admin123', 'administrador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Registrador3', 'registrador3', 'reg123', 'registrador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES ('Visualizador3', 'visualizador3', 'vis123', 'visualizador');
INSERT INTO Registro (nombre, usuario, contraseña, tipo_usuario) VALUES
('Administrador8', 'admin8', 'admin123', 'administrador'),
('Registrador8', 'registrador8', 'reg123', 'registrador'),
('Visualizador8', 'visualizador8', 'vis123', 'visualizador'),
('Administrador9', 'admin9', 'admin123', 'administrador'),
('Registrador9', 'registrador9', 'reg123', 'registrador'),
('Visualizador9', 'visualizador9', 'vis123', 'visualizador'),
('Administrador10', 'admin10', 'admin123', 'administrador'),
('Registrador10', 'registrador10', 'reg123', 'registrador'),
('Visualizador10', 'visualizador10', 'vis123', 'visualizador');


-- Tabla Votantes
INSERT INTO Votantes (id_votante, nombre_votante, direccion_casa_votante, nombre_lider, lugar_votante, mesa) VALUES ('votante4', 'Carlos Pérez', 'Calle Principal 456', 'Laura Pérez', 'lugar4', 'mesa4');
INSERT INTO Votantes (id_votante, nombre_votante, direccion_casa_votante, nombre_lider, lugar_votante, mesa) VALUES ('votante5', 'María Torres', 'Avenida Central 789', 'Mario Torres', 'lugar5', 'mesa5');
INSERT INTO Votantes (id_votante, nombre_votante, direccion_casa_votante, nombre_lider, lugar_votante, mesa) VALUES
('votante16', 'Laura Martínez', 'Calle Principal 999', 'Laura López', 'lugar16', 'mesa16'),
('votante17', 'Sergio Gómez', 'Avenida Central 777', 'Sergio Gómez', 'lugar17', 'mesa17'),
('votante18', 'María Sánchez', 'Calle del Sol 222', 'María Sánchez', 'lugar18', 'mesa18'),
('votante19', 'Carlos Torres', 'Avenida del Mar 333', 'Carlos Torres', 'lugar19', 'mesa19'),
('votante20', 'Sofía Martínez', 'Calle Luna 444', 'Sofía Martínez', 'lugar20', 'mesa20'),
('votante21', 'Jorge Ramírez', 'Avenida de la Luna 555', 'Jorge Ramírez', 'lugar21', 'mesa21'),
('votante22', 'Ana Gómez', 'Calle del Sol 666', 'Ana Gómez', 'lugar22', 'mesa22'),
('votante23', 'Luis Sánchez', 'Avenida Central 777', 'Luis Sánchez', 'lugar23', 'mesa23'),
('votante24', 'Marta Torres', 'Calle del Mar 888', 'Marta Torres', 'lugar24', 'mesa24'),
('votante25', 'Pedro Martínez', 'Avenida del Sol 999', 'Pedro Martínez', 'lugar25', 'mesa25');
