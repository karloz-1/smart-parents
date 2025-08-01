DROP DATABASE IF EXISTS smart_parents;
CREATE DATABASE smart_parents;
USE smart_parents;

-- Tabla 1: usuarios
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    rol ENUM('estudiante', 'profesor', 'administrador') NOT NULL,
    identificacion VARCHAR(10) UNIQUE NOT NULL,
    nombre1 VARCHAR(30) NOT NULL,
    nombre2 VARCHAR(30) NULL,
    apellido1 VARCHAR(30) NOT NULL,
    apellido2 VARCHAR(30) NULL,
    email VARCHAR(100) UNIQUE NULL,
    telefono VARCHAR (10) NOT NULL,
    password VARCHAR(255) NOT NULL,
    asignatura ENUM('Administración', 'Matematicas', 'Español', 'Quimica', 'C.Sociales') NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla 2: eventos_estudiantes
CREATE TABLE eventos (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    tipo_evento ENUM('llegada_tarde', 'llamado', 'anotacion', 'falta', 'comentario') NOT NULL,
    descripcion TEXT,
    registrado_por INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (registrado_por) REFERENCES usuarios(id_usuario)
);

-- Usuario admin
INSERT INTO usuarios (rol, identificacion, nombre1, nombre2, apellido1, apellido2, email, telefono, password, asignatura) VALUES ('administrador', '1234567890', 'Admin', 'Prueba', 'Doe', 'Perez', 'admin@gmail.com', '1234567890', '12345', 'Administración');