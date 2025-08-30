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
    (1, 'administrador', '1234567890', 'Admin', 'Prueba', 'Doe', 'Perez', 'admin@gmail.com', '1234567890', '$2y$10$MF7J7gglpQUiOOVgf2PkNOJgWwYprlu13iHjFMLvoYMukFSHkH09y', 'Administración', '2025-08-19 21:13:22', '2025-08-19 21:13:22'),
    (2, 'administrador', '0000000001', 'Carlos', 'David', 'Gonzalez', 'Valencia', 'carlos@gmail.com', '0000000001', '$2y$10$xP7WNrxqzr/4tl4vvJUN8uX.RKO8PCw4QLEOc6Fd373to9QyzS2tS', 'Administración', '2025-08-19 21:20:33', '2025-08-19 21:20:33'),
    (3, 'administrador', '0000000002', 'Jhonatan', 'David', 'Londoño', 'Muñoz', 'jhonatan@gmail.com', '0000000002', '$2y$10$EA5YKcHgiH1zu7LZhCalJeULU00zdBEpF0T.sqbmhX3rDPIJBcGqm', 'Administración', '2025-08-19 21:23:34', '2025-08-19 21:23:34'),
    (4, 'administrador', '0000000003', 'Salome', '', 'Patiño', 'Escobar', 'salome@gmail.com', '0000000003', '$2y$10$6CZHwM50Tyr4O7ZQyrkdJuCsCcFJtGls/jgIyxxKixCyRNW0.eTo.', 'Administración', '2025-08-19 21:27:13', '2025-08-19 21:27:13'),
    (5, 'administrador', '0000000004', 'Juan', 'Jose', 'Tabares', 'Villa', 'Juan@gmail.com', '0000000004', '$2y$10$cHQRo.m3ZPMWEjMVZW.yqOlWAI1sGqJqH7hiADsU8Rdp.zZtSio7S', 'Administración', '2025-08-19 21:29:17', '2025-08-19 21:29:17'),
    (6, 'administrador', '0000000005', 'Lauren', 'Cristina', 'Villadiego', 'Ortega', 'lauren@gmail.com', '0000000005', '$2y$10$M9muVzGQ3n3uDBIFoUE8z.MVpIixX5E5kC5wRXdoN2mxqfETKzVbK', 'Administración', '2025-08-19 21:30:41', '2025-08-19 21:30:41'),
    (7, 'estudiante', '1122334455', 'test', '', 'user', '', 'test@test.com', '1122334455', '$2y$10$WM5qJQSgwc/27jHpznwqke3JHAXcRvzgQPjdPTIbgW4Oj/pfdVKeq', NULL, '2025-08-30 18:08:07', '2025-08-30 18:08:07'),
    (8, 'profesor', '1112223334', 'test', '', 'profe', '', 'profe@test.com', '1112223334', '$2y$10$KL/S7nQ0apfe/68M2wW7C.F6FIN9fRfX.AsZ6MW8v.rWpmJIk1Tgm', 'Español', '2025-08-30 19:05:10', '2025-08-30 19:05:10');

    -- EVENTOS --
    INSERT INTO `eventos` (`id_evento`, `id_usuario`, `tipo_evento`, `descripcion`, `registrado_por`, `created_at`, `updated_at`) VALUES
    (1, 3, 'llegada_tarde', 'Se registra la llegada tarde del estudiante a la primera clase del día.', 2, '2025-08-30 14:53:25', '2025-08-30 14:53:25'),
    (2, 5, 'anotacion', 'Anotación en el observador por uso indebido de elementos personales.', 3, '2025-08-30 14:54:51', '2025-08-30 14:54:51'),
    (3, 2, 'inasistencia', 'Se notifica la inasistencia del estudiante a la jornada escolar.', 4, '2025-08-30 14:56:01', '2025-08-30 14:56:01'),
    (4, 4, 'comentario', 'Se solicita una reunión con el acudiente para hacer un seguimiento académico.', 5, '2025-08-30 14:58:07', '2025-08-30 14:58:07'),
    (5, 2, 'llegada_tarde', 'Se notifica la llegada tarde del estudiante a la jornada escolar.', 6, '2025-08-30 14:59:28', '2025-08-30 14:59:28'),
    (6, 4, 'anotacion', 'Se deja constancia de una anotación por irrespeto a un compañero.', 2, '2025-08-30 15:00:36', '2025-08-30 15:00:36'),
    (7, 6, 'inasistencia', 'Se deja constancia de la inasistencia a la jornada escolar.', 3, '2025-08-30 15:02:00', '2025-08-30 15:02:00'),
    (8, 3, 'comentario', 'Se convoca a los acudientes a una reunión para hablar sobre el desempeño del estudiante.', 4, '2025-08-30 15:03:37', '2025-08-30 15:03:37'),
    (9, 6, 'llegada_tarde', 'Se informa la llegada tarde del estudiante a la clase de la mañana.', 5, '2025-08-30 15:04:23', '2025-08-30 15:04:23'),
    (10, 3, 'anotacion', 'Anotación por incumplimiento al manual de convivencia.', 6, '2025-08-30 15:05:13', '2025-08-30 15:05:13'),
    (11, 5, 'inasistencia', 'El estudiante no asistió a la jornada sin excusa.', 2, '2025-08-30 15:06:13', '2025-08-30 15:06:13'),
    (12, 2, 'comentario', 'Se comenta el excelente desempeño del estudiante en una actividad académica.', 3, '2025-08-30 15:07:11', '2025-08-30 15:07:11'),
    (13, 5, 'llegada_tarde', 'El estudiante llegó tarde a la jornada sin justificación.', 4, '2025-08-30 15:08:07', '2025-08-30 15:08:07'),
    (14, 2, 'anotacion', 'Se registra una anotación por comportamiento disruptivo en el aula de clase.', 5, '2025-08-30 15:08:58', '2025-08-30 15:08:58'),
    (15, 4, 'inasistencia', 'Anotación por ausencia a la primera jornada del día.', 6, '2025-08-30 15:10:13', '2025-08-30 15:10:13'),
    (16, 6, 'comentario', 'Se deja un comentario positivo sobre la mejoría académica del estudiante.', 2, '2025-08-30 15:14:40', '2025-08-30 15:14:40'),
    (17, 4, 'llegada_tarde', 'Anotación por llegada tarde a la institución.', 3, '2025-08-30 15:15:40', '2025-08-30 15:15:40'),
    (18, 6, 'anotacion', 'Se anota el incumplimiento de una actividad académica.', 4, '2025-08-30 15:16:31', '2025-08-30 15:16:31'),
    (19, 3, 'inasistencia', 'Se registra una inasistencia injustificada.', 5, '2025-08-30 15:17:19', '2025-08-30 15:17:19'),
    (20, 5, 'comentario', 'Se informa sobre la participación del estudiante en una actividad extracurricular.', 6, '2025-08-30 15:18:21', '2025-08-30 15:18:21');