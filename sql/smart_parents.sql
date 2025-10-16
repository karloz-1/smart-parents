-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-10-2025 a las 03:38:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `smart_parents`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_evento` enum('llegada_tarde','anotacion','inasistencia','comentario') NOT NULL,
  `descripcion` text NOT NULL,
  `registrado_por` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `id_usuario`, `tipo_evento`, `descripcion`, `registrado_por`, `created_at`, `updated_at`) VALUES
(1, 3, 'llegada_tarde', 'Se registra la llegada tarde del estudiante a la primera clase del día.', 2, '2025-08-31 00:53:25', '2025-08-31 00:53:25'),
(2, 5, 'anotacion', 'Anotación en el observador por uso indebido de elementos personales.', 3, '2025-08-31 00:54:51', '2025-08-31 00:54:51'),
(3, 4, 'comentario', 'Se solicita una reunión con el acudiente para hacer un seguimiento académico.', 5, '2025-08-31 00:58:07', '2025-08-31 00:58:07'),
(4, 2, 'llegada_tarde', 'Se notifica la llegada tarde del estudiante a la jornada escolar.', 6, '2025-08-31 00:59:28', '2025-08-31 00:59:28'),
(5, 4, 'anotacion', 'Se deja constancia de una anotación por irrespeto a un compañero.', 2, '2025-08-31 01:00:36', '2025-08-31 01:00:36'),
(6, 6, 'inasistencia', 'Se deja constancia de la inasistencia a la jornada escolar.', 3, '2025-08-31 01:02:00', '2025-08-31 01:02:00'),
(7, 6, 'llegada_tarde', 'Se informa la llegada tarde del estudiante a la clase de la mañana.', 5, '2025-08-31 01:04:23', '2025-08-31 01:04:23'),
(8, 3, 'anotacion', 'Anotación por incumplimiento al manual de convivencia.', 6, '2025-08-31 01:05:13', '2025-08-31 01:05:13'),
(9, 5, 'inasistencia', 'El estudiante no asistió a la jornada sin excusa.', 2, '2025-08-31 01:06:13', '2025-08-31 01:06:13'),
(10, 2, 'comentario', 'Se comenta el excelente desempeño del estudiante en una actividad académica.', 3, '2025-08-31 01:07:11', '2025-08-31 01:07:11'),
(11, 2, 'anotacion', 'Se registra una anotación por comportamiento disruptivo en el aula de clase.', 5, '2025-08-31 01:08:58', '2025-08-31 01:08:58'),
(12, 4, 'inasistencia', 'Anotación por ausencia a la primera jornada del día.', 6, '2025-08-31 01:10:13', '2025-08-31 01:10:13'),
(13, 6, 'comentario', 'Se deja un comentario positivo sobre la mejoría académica del estudiante.', 2, '2025-08-31 01:14:40', '2025-08-31 01:14:40'),
(14, 4, 'llegada_tarde', 'Anotación por llegada tarde a la institución.', 3, '2025-08-31 01:15:40', '2025-08-31 01:15:40'),
(15, 3, 'inasistencia', 'Se registra una inasistencia injustificada.', 5, '2025-08-31 01:17:19', '2025-08-31 01:17:19'),
(16, 5, 'comentario', 'Se informa sobre la participación del estudiante en una actividad extracurricular.', 6, '2025-08-31 01:18:21', '2025-08-31 01:18:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rol` enum('estudiante','profesor','administrador') NOT NULL,
  `identificacion` varchar(10) NOT NULL,
  `nombre1` varchar(30) NOT NULL,
  `nombre2` varchar(30) DEFAULT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `asignatura` enum('Administración','Matematicas','Español','Quimica','C.Sociales') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `identificacion`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `email`, `telefono`, `password`, `asignatura`, `created_at`, `updated_at`) VALUES
(1, 'administrador', '1234567890', 'Admin', 'Prueba', 'Doe', 'Perez', 'admin@gmail.com', '1234567890', '$2y$10$MF7J7gglpQUiOOVgf2PkNOJgWwYprlu13iHjFMLvoYMukFSHkH09y', 'Administración', '2025-08-20 07:13:22', '2025-08-20 07:13:22'),
(2, 'administrador', '0000000001', 'Carlos', 'David', 'Gonzalez', 'Valencia', 'carlos@gmail.com', '0000000001', '$2y$10$xP7WNrxqzr/4tl4vvJUN8uX.RKO8PCw4QLEOc6Fd373to9QyzS2tS', 'Administración', '2025-08-20 07:20:33', '2025-08-20 07:20:33'),
(3, 'profesor', '0000000002', 'Jhonatan', 'David', 'Londoño', 'Muñoz', 'jhonatan@gmail.com', '0000000002', '$2y$10$Fut.Ss1/1wG25VBm7Pi4nuChLThGvssaKmWv2wA9616XeI5hjcUXq', 'Matematicas', '2025-08-20 07:23:34', '2025-08-20 07:23:34'),
(4, 'estudiante', '0000000003', 'Salome', '', 'Patiño', 'Escobar', 'salome@gmail.com', '0000000003', '$2y$10$Odvv9JrPXPv/41PiHe26aOIPiIEo.pAPNJN49Mvk52qUIvBYVRdm.', NULL, '2025-08-20 07:27:13', '2025-08-20 07:27:13'),
(5, 'administrador', '0000000004', 'Juan', 'Jose', 'Tabares', 'Villa', 'Juan@gmail.com', '0000000004', '$2y$10$cHQRo.m3ZPMWEjMVZW.yqOlWAI1sGqJqH7hiADsU8Rdp.zZtSio7S', 'Administración', '2025-08-20 07:29:17', '2025-08-20 07:29:17'),
(6, 'profesor', '0000000005', 'Lauren', 'Cristina', 'Villadiego', 'Ortega', 'lauren@gmail.com', '0000000005', '$2y$10$dT2lug1XGnYuxR6pjGNcbu0idzoIlO6TjXSw03nx2cfT1uRdXrNU.', 'Español', '2025-08-20 07:30:41', '2025-08-20 07:30:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `registrado_por` (`registrado_por`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `identificacion` (`identificacion`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`registrado_por`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
