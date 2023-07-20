CREATE DATABASE seguidores;

USE seguidores;

DROP TABLE IF EXISTS Votantes;
DROP TABLE IF EXISTS Lugar;
DROP TABLE IF EXISTS Lider;
DROP TABLE IF EXISTS Cordinador;
DROP TABLE IF EXISTS Comuna;
DROP TABLE IF EXISTS Registro;


CREATE TABLE Comuna (
    id_comuna VARCHAR(50) NOT NULL,
    nombre_lugar VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_comuna)
);

CREATE TABLE Cordinador (
    id_cordinador VARCHAR(50) NOT NULL,
    nombre_cordinador VARCHAR(50) NOT NULL,
    direccion_cordinador VARCHAR(50) NOT NULL,
    telefono_cordinador VARCHAR(50) NOT NULL,
    PRIMARY KEY (nombre_cordinador)
);

CREATE TABLE Lider (
    id_lider VARCHAR(50) NOT NULL,
    nombre_lider VARCHAR(50) NOT NULL,
    direccion_lider VARCHAR(50) NOT NULL,
    telefono_lider VARCHAR(50) NOT NULL,
    nombre_cordinador VARCHAR(50) NOT NULL,
    PRIMARY KEY (nombre_lider),
    FOREIGN KEY (nombre_cordinador) REFERENCES Cordinador(nombre_cordinador)
);

CREATE TABLE Lugar (
    lugar_votante VARCHAR(50) NOT NULL,
    direccion_lugar VARCHAR(50) NOT NULL,
    cantidad_mesas VARCHAR(50) NOT NULL,
    comuna VARCHAR(50) NOT NULL,
    PRIMARY KEY (lugar_votante),
    FOREIGN KEY (comuna) REFERENCES Comuna(id_comuna)
);

CREATE TABLE Registro (
    nombre VARCHAR(50) NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    contraseña VARCHAR(50) NOT NULL,
    tipo_usuario VARCHAR(50) NOT NULL,
    PRIMARY KEY (usuario)
);

CREATE TABLE Votantes (
    id_votante VARCHAR(50) NOT NULL,
    nombre_votante VARCHAR(50) NOT NULL,
    direccion_casa_votante VARCHAR(50) NOT NULL,
    nombre_lider VARCHAR(50) NOT NULL,
    lugar_votante VARCHAR(50) NOT NULL,
    mesa VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_votante),
    FOREIGN KEY (nombre_lider) REFERENCES Lider(nombre_lider),
    FOREIGN KEY (lugar_votante) REFERENCES Lugar(lugar_votante),
);

