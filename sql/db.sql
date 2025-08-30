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
    tipo_evento ENUM('llegada_tarde', 'anotacion', 'inasistencia', 'comentario') NOT NULL,
    descripcion TEXT,
    registrado_por INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (registrado_por) REFERENCES usuarios(id_usuario)
);

-- Usuario admin
/* INSERT INTO usuarios (rol, identificacion, nombre1, nombre2, apellido1, apellido2, email, telefono, password, asignatura) VALUES ('administrador', '1234567890', 'Admin', 'Prueba', 'Doe', 'Perez', 'admin@gmail.com', '1234567890', '$2y$10$MF7J7gglpQUiOOVgf2PkNOJgWwYprlu13iHjFMLvoYMukFSHkH09y', 'Administración'); */ /* Contraseña 12345 */

INSERT INTO `usuarios` (`id_usuario`, `rol`, `identificacion`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `email`, `telefono`, `password`, `asignatura`, `created_at`, `updated_at`) VALUES
(1, 'administrador', '1234567890', 'Admin', 'Prueba', 'Doe', 'Perez', 'admin@gmail.com', '1234567890', '$2y$10$MF7J7gglpQUiOOVgf2PkNOJgWwYprlu13iHjFMLvoYMukFSHkH09y', 'Administración', '2025-08-19 21:13:22', '2025-08-19 21:13:22'),
(2, 'administrador', '0000000001', 'Carlos', 'David', 'Gonzalez', 'Valencia', 'carlos@gmail.com', '0000000001', '$2y$10$xP7WNrxqzr/4tl4vvJUN8uX.RKO8PCw4QLEOc6Fd373to9QyzS2tS', 'Administración', '2025-08-19 21:20:33', '2025-08-19 21:20:33'),
(3, 'administrador', '0000000002', 'Jhonatan', 'David', 'Londoño', 'Muñoz', 'jhonathan@gmail.com', '0000000002', '$2y$10$EA5YKcHgiH1zu7LZhCalJeULU00zdBEpF0T.sqbmhX3rDPIJBcGqm', 'Administración', '2025-08-19 21:23:34', '2025-08-19 21:23:34'),
(4, 'administrador', '0000000003', 'Salome', '', 'Patiño', 'Escobar', 'salome@gmail.com', '0000000003', '$2y$10$6CZHwM50Tyr4O7ZQyrkdJuCsCcFJtGls/jgIyxxKixCyRNW0.eTo.', 'Administración', '2025-08-19 21:27:13', '2025-08-19 21:27:13'),
(5, 'administrador', '0000000004', 'Juan', 'Jose', 'Tabares', 'Villa', 'Juan@gmail.com', '0000000004', '$2y$10$cHQRo.m3ZPMWEjMVZW.yqOlWAI1sGqJqH7hiADsU8Rdp.zZtSio7S', 'Administración', '2025-08-19 21:29:17', '2025-08-19 21:29:17'),
(6, 'administrador', '0000000005', 'Lauren', 'Cristina', 'Villadiego', 'Ortega', 'lauren@gmail.com', '0000000005', '$2y$10$M9muVzGQ3n3uDBIFoUE8z.MVpIixX5E5kC5wRXdoN2mxqfETKzVbK', 'Administración', '2025-08-19 21:30:41', '2025-08-19 21:30:41');