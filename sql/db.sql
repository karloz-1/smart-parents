DROP DATABASE IF EXISTS smart_parents;
CREATE DATABASE smart_parents;
USE smart_parents;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    rol ENUM('estudiante', 'profesor', 'administrador') NOT NULL,
    identificacion VARCHAR(10) UNIQUE NOT NULL,
    nombre1 VARCHAR(20) NOT NULL,
    nombre2 VARCHAR(20) NULL,
    apellido1 VARCHAR(20) NOT NULL,
    apellido2 VARCHAR(20) NULL,
    email VARCHAR(100) UNIQUE NULL,
    telefono VARCHAR (10) NOT NULL,
    password VARCHAR(255) NOT NULL,
    asignatura ENUM('Administración', 'Matematicas', 'Español', 'Quimica', 'C.Sociales') NULL
);

INSERT INTO usuarios (rol, identificacion, nombre1, nombre2, apellido1, apellido2, email, telefono, password, asignatura) VALUES ('administrador', '1234567890', 'Admin', 'Prueba', 'Doe', 'Perez', 'admin@gmail.com', '1234567890', '12345', 'Administración');