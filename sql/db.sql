DROP DATABASE IF EXISTS smart_parents;
CREATE DATABASE smart_parents;
USE smart_parents;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    rol ENUM('estudiante', 'profesor', 'administrador'),
    identificacion VARCHAR(10) UNIQUE,
    nombre1 VARCHAR(20),
    nombre2 VARCHAR(20) NULL,
    apellido1 VARCHAR(20),
    apellido2 VARCHAR(20) NULL,
    email VARCHAR(100) UNIQUE,
    telefono VARCHAR (15),
    password VARCHAR(255),
    cargo VARCHAR(20) NULL,
    asignatura VARCHAR(20) NULL,
)

INSERT INTO usuarios (rl)