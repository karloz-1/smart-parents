-- ESTRUCTURA DE LA BASE DE DATOS DE SMART PARENTS

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

-- Tabla 2: eventos
CREATE TABLE eventos (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    tipo_evento ENUM('llegada_tarde', 'anotacion', 'inasistencia', 'comentario') NOT NULL,
    descripcion TEXT NOT NULL,
    registrado_por INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (registrado_por) REFERENCES usuarios(id_usuario)
);

-- INSERT INTOs --
    -- USUARIOS --
    INSERT INTO `usuarios` (`id_usuario`, `rol`, `identificacion`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `email`, `telefono`, `password`, `asignatura`, `created_at`, `updated_at`) VALUES
    (1, 'administrador', '1234567890', 'Admin', 'Prueba', 'Doe', 'Perez', 'admin@gmail.com', '1234567890', '$2y$10$MF7J7gglpQUiOOVgf2PkNOJgWwYprlu13iHjFMLvoYMukFSHkH09y', 'Administración', '2025-08-20 02:13:22', '2025-08-20 02:13:22'),
    (2, 'administrador', '0000000001', 'Carlos', 'David', 'Gonzalez', 'Valencia', 'carlos@gmail.com', '0000000001', '$2y$10$xP7WNrxqzr/4tl4vvJUN8uX.RKO8PCw4QLEOc6Fd373to9QyzS2tS', 'Administración', '2025-08-20 02:20:33', '2025-08-20 02:20:33'),
    (3, 'profesor', '0000000002', 'Jhonatan', 'David', 'Londoño', 'Muñoz', 'jhonatan@gmail.com', '0000000002', '$2y$10$Fut.Ss1/1wG25VBm7Pi4nuChLThGvssaKmWv2wA9616XeI5hjcUXq', 'Matematicas', '2025-08-20 02:23:34', '2025-08-20 02:23:34'),
    (4, 'estudiante', '0000000003', 'Salome', '', 'Patiño', 'Escobar', 'salome@gmail.com', '0000000003', '$2y$10$Odvv9JrPXPv/41PiHe26aOIPiIEo.pAPNJN49Mvk52qUIvBYVRdm.', NULL, '2025-08-20 02:27:13', '2025-08-20 02:27:13'),
    (5, 'administrador', '0000000004', 'Juan', 'Jose', 'Tabares', 'Villa', 'Juan@gmail.com', '0000000004', '$2y$10$cHQRo.m3ZPMWEjMVZW.yqOlWAI1sGqJqH7hiADsU8Rdp.zZtSio7S', 'Administración', '2025-08-20 02:29:17', '2025-08-20 02:29:17'),
    (6, 'profesor', '0000000005', 'Lauren', 'Cristina', 'Villadiego', 'Ortega', 'lauren@gmail.com', '0000000005', '$2y$10$dT2lug1XGnYuxR6pjGNcbu0idzoIlO6TjXSw03nx2cfT1uRdXrNU.', 'Español', '2025-08-20 02:30:41', '2025-08-20 02:30:41');

    -- EVENTOS --
    INSERT INTO `eventos` (`id_evento`, `id_usuario`, `tipo_evento`, `descripcion`, `registrado_por`, `created_at`, `updated_at`) VALUES
    (1, 3, 'llegada_tarde', 'Se registra la llegada tarde del estudiante a la primera clase del día.', 2, '2025-08-30 19:53:25', '2025-08-30 19:53:25'),
    (2, 5, 'anotacion', 'Anotación en el observador por uso indebido de elementos personales.', 3, '2025-08-30 19:54:51', '2025-08-30 19:54:51'),
    (3, 4, 'comentario', 'Se solicita una reunión con el acudiente para hacer un seguimiento académico.', 5, '2025-08-30 19:58:07', '2025-08-30 19:58:07'),
    (4, 2, 'llegada_tarde', 'Se notifica la llegada tarde del estudiante a la jornada escolar.', 6, '2025-08-30 19:59:28', '2025-08-30 19:59:28'),
    (5, 4, 'anotacion', 'Se deja constancia de una anotación por irrespeto a un compañero.', 2, '2025-08-30 20:00:36', '2025-08-30 20:00:36'),
    (6, 6, 'inasistencia', 'Se deja constancia de la inasistencia a la jornada escolar.', 3, '2025-08-30 20:02:00', '2025-08-30 20:02:00'),
    (7, 6, 'llegada_tarde', 'Se informa la llegada tarde del estudiante a la clase de la mañana.', 5, '2025-08-30 20:04:23', '2025-08-30 20:04:23'),
    (8, 3, 'anotacion', 'Anotación por incumplimiento al manual de convivencia.', 6, '2025-08-30 20:05:13', '2025-08-30 20:05:13'),
    (9, 5, 'inasistencia', 'El estudiante no asistió a la jornada sin excusa.', 2, '2025-08-30 20:06:13', '2025-08-30 20:06:13'),
    (10, 2, 'comentario', 'Se comenta el excelente desempeño del estudiante en una actividad académica.', 3, '2025-08-30 20:07:11', '2025-08-30 20:07:11'),
    (11, 2, 'anotacion', 'Se registra una anotación por comportamiento disruptivo en el aula de clase.', 5, '2025-08-30 20:08:58', '2025-08-30 20:08:58'),
    (12, 4, 'inasistencia', 'Anotación por ausencia a la primera jornada del día.', 6, '2025-08-30 20:10:13', '2025-08-30 20:10:13'),
    (13, 6, 'comentario', 'Se deja un comentario positivo sobre la mejoría académica del estudiante.', 2, '2025-08-30 20:14:40', '2025-08-30 20:14:40'),
    (14, 4, 'llegada_tarde', 'Anotación por llegada tarde a la institución.', 3, '2025-08-30 20:15:40', '2025-08-30 20:15:40'),
    (15, 3, 'inasistencia', 'Se registra una inasistencia injustificada.', 5, '2025-08-30 20:17:19', '2025-08-30 20:17:19'),
    (16, 5, 'comentario', 'Se informa sobre la participación del estudiante en una actividad extracurricular.', 6, '2025-08-30 20:18:21', '2025-08-30 20:18:21');
