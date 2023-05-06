-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2023 a las 22:28:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uaigestionbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas_auditadas`
--

CREATE TABLE `areas_auditadas` (
  `id_area_auditada` int(11) NOT NULL,
  `ua_id` int(11) NOT NULL,
  `nombre_aa` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas_auditadas`
--

INSERT INTO `areas_auditadas` (`id_area_auditada`, `ua_id`, `nombre_aa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Dirección de Gestión Económico Financiera', '2023-05-02 19:55:30', NULL, NULL),
(2, 1, 'Tesorería', '2023-05-02 19:55:30', NULL, NULL),
(3, 1, 'Dirección Gestión de Estudios', '2023-05-02 19:55:30', NULL, NULL),
(4, 1, 'Secretaría académica', '2023-05-02 19:55:30', NULL, NULL),
(5, 2, 'General', '2023-05-02 19:55:30', NULL, NULL),
(6, 3, 'General', '2023-05-02 19:55:30', NULL, NULL),
(7, 4, 'General', '2023-05-02 19:55:30', NULL, NULL),
(8, 5, 'General', '2023-05-02 19:55:30', NULL, NULL),
(9, 6, 'General', '2023-05-02 19:55:30', NULL, NULL),
(10, 7, 'General', '2023-05-02 19:55:30', NULL, NULL),
(11, 8, 'General', '2023-05-02 19:55:30', NULL, NULL),
(12, 9, 'General', '2023-05-02 19:55:30', NULL, NULL),
(13, 10, 'Dirección de Gestión y Desarrollo de Personas', '2023-05-02 19:55:30', NULL, NULL),
(14, 10, 'Dirección de Gestión Económico Financiera', '2023-05-02 19:55:30', NULL, NULL),
(15, 10, 'Dirección de Gestión Académica', '2023-05-02 19:55:30', NULL, NULL),
(16, 10, 'Dirección de Gestión de Estudios', '2023-05-02 19:55:30', NULL, NULL),
(17, 11, 'General', '2023-05-02 19:55:30', NULL, NULL),
(18, 12, 'General', '2023-05-02 19:55:30', NULL, NULL),
(19, 13, 'General', '2023-05-02 19:55:30', NULL, NULL),
(20, 14, 'General', '2023-05-02 19:55:30', NULL, NULL),
(21, 15, 'General', '2023-05-02 19:55:30', NULL, NULL),
(22, 16, 'General', '2023-05-02 19:55:30', NULL, NULL),
(23, 17, 'General', '2023-05-02 19:55:30', NULL, NULL),
(24, 18, 'General', '2023-05-02 19:55:30', NULL, NULL),
(25, 19, 'General', '2023-05-02 19:55:30', NULL, NULL),
(26, 20, 'General', '2023-05-02 19:55:30', NULL, NULL),
(27, 21, 'General', '2023-05-02 19:55:30', NULL, NULL),
(28, 22, 'Económico y Financiera', '2023-05-02 19:55:30', NULL, NULL),
(29, 23, 'General', '2023-05-02 19:55:30', NULL, NULL),
(30, 24, 'General', '2023-05-02 19:55:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id_observacion` bigint(20) NOT NULL,
  `area_auditada_id` int(11) NOT NULL,
  `impacto_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `fecha_observacion` date NOT NULL,
  `proyecto` varchar(255) NOT NULL,
  `nro_informe_uai` varchar(150) NOT NULL,
  `detalle_observacion` text NOT NULL,
  `fecha_seguimiento` date NOT NULL,
  `detalle_recomendacion` text NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id_observacion`, `area_auditada_id`, `impacto_id`, `estado_id`, `plan_id`, `fecha_observacion`, `proyecto`, `nro_informe_uai`, `detalle_observacion`, `fecha_seguimiento`, `detalle_recomendacion`, `usuario_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 1, 16, '2023-04-30', 'Prueba', '42465-79', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-04-30', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2023-04-30 19:40:35', NULL, NULL),
(2, 1, 2, 4, 14, '2023-05-01', 'No se que', '2/2014', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Ok', '2023-05-06', 'nosh ggjhuhb e que lallala', 1, '2023-05-03 17:57:43', '2023-05-03 23:25:10', NULL),
(3, 7, 1, 3, 15, '2023-05-12', 'vamos probando', 'r35356', '535tfregrthfefe', '2023-05-27', '43y5yhf grthb grgrt', 1, '2023-05-03 19:37:36', NULL, NULL),
(4, 22, 2, 4, 8, '2023-04-06', 'Otra vez', '123e', 'otra vez seeraa', '2023-05-27', 'odfjidnrkeg rytty', 1, '2023-05-03 19:38:08', NULL, NULL),
(5, 10, 3, 2, 13, '2023-05-27', 'cegae', '2345 0055', 'oksjoifnj ge kgk bnf', '2023-05-28', 'dgfdgdfg uyyiooo', 1, '2023-05-03 19:38:46', NULL, NULL),
(6, 15, 1, 3, 14, '2023-05-28', 'Ultimaaa ya', '1277899', 'beso a beso aaa', '2023-05-20', 'un dos tre un dos tres', 1, '2023-05-03 19:39:33', '2023-05-06 21:48:07', NULL),
(7, 9, 3, 4, 15, '2023-03-02', 'Nunca jamas', '12/2022', 'Ques el detalle de observacion', '2023-03-12', 'Ay nruperta abrile a\r\nla puerta--', 1, '2023-05-04 18:09:50', '2023-05-06 21:47:49', NULL),
(8, 10, 3, 2, 12, '2023-05-05', 'Finish the coro', '12/2019', 'Hello Fani, how are you?', '2023-05-27', 'Let\'s go. She is running at the park', 3, '2023-05-06 17:17:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion_estados`
--

CREATE TABLE `observacion_estados` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `observacion_estados`
--

INSERT INTO `observacion_estados` (`id_estado`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sin acción correctiva', '2023-04-23 22:41:16', NULL, NULL),
(2, 'Con acción correctiva', '2023-04-23 22:41:16', NULL, NULL),
(3, 'En implementación', '2023-04-23 22:41:49', NULL, NULL),
(4, 'Regularizada', '2023-04-23 22:41:49', NULL, NULL),
(5, 'No regularizable', '2023-04-23 22:42:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion_impactos`
--

CREATE TABLE `observacion_impactos` (
  `id_impacto` int(11) NOT NULL,
  `impacto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `observacion_impactos`
--

INSERT INTO `observacion_impactos` (`id_impacto`, `impacto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BAJO', '2023-04-23 22:44:54', NULL, NULL),
(2, 'MEDIO', '2023-04-23 22:44:54', NULL, NULL),
(3, 'ALTO', '2023-04-23 22:45:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion_planes`
--

CREATE TABLE `observacion_planes` (
  `id_plan` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `observacion_planes`
--

INSERT INTO `observacion_planes` (`id_plan`, `plan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2008, '2023-04-28 22:55:49', NULL, NULL),
(2, 2009, '2023-04-30 19:21:50', NULL, NULL),
(3, 2010, '2023-04-30 19:21:50', NULL, NULL),
(4, 2011, '2023-04-30 19:22:01', NULL, NULL),
(5, 2012, '2023-04-30 19:22:01', NULL, NULL),
(6, 2013, '2023-04-30 19:22:13', NULL, NULL),
(7, 2014, '2023-04-30 19:22:13', NULL, NULL),
(8, 2015, '2023-04-30 19:22:38', NULL, NULL),
(9, 2016, '2023-04-30 19:22:38', NULL, NULL),
(10, 2017, '2023-04-30 19:22:49', NULL, NULL),
(11, 2018, '2023-04-30 19:22:49', NULL, NULL),
(12, 2019, '2023-04-30 19:23:01', NULL, NULL),
(13, 2020, '2023-04-30 19:23:01', NULL, NULL),
(14, 2021, '2023-04-30 19:23:11', NULL, NULL),
(15, 2022, '2023-04-30 19:23:11', NULL, NULL),
(16, 2023, '2023-04-30 19:23:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_academicas`
--

CREATE TABLE `unidades_academicas` (
  `id_ua` int(11) NOT NULL,
  `nombre_ua` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades_academicas`
--

INSERT INTO `unidades_academicas` (`id_ua`, `nombre_ua`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Arquitectura y Urbanismo', '2023-04-23 22:32:35', NULL, NULL),
(2, 'Artes, Diseño y Ciencias de la Cultura', '2023-04-23 22:32:35', NULL, NULL),
(3, 'Campus Deodoro Roca', '2023-04-23 22:32:35', NULL, NULL),
(4, 'Campus resistencia', '2023-04-23 22:32:35', NULL, NULL),
(5, 'Campus de la Reforma', '2023-04-23 22:32:35', NULL, NULL),
(6, 'Campus Sargento Cabral', '2023-04-23 22:32:35', NULL, NULL),
(7, 'CEGAE', '2023-04-23 22:32:35', NULL, NULL),
(8, 'Ciencias Agrarias', '2023-04-23 22:32:35', NULL, NULL),
(9, 'Ciencias Económicas', '2023-04-23 22:32:35', NULL, NULL),
(10, 'Ciencias Exactas y Naturales y Agrimensura', '2023-04-23 22:32:35', NULL, NULL),
(11, 'Ciencias Veterinarias', '2023-04-23 22:32:35', NULL, NULL),
(12, 'Derecho y Ciencias Sociales y Políticas', '2023-04-23 22:32:35', NULL, NULL),
(13, 'Dirección de Bibliotecas', '2023-04-23 22:32:35', NULL, NULL),
(14, 'Eragia', '2023-04-23 22:32:35', NULL, NULL),
(15, 'Humanidades', '2023-04-23 22:32:35', NULL, NULL),
(16, 'Ingeniería', '2023-04-23 22:32:35', NULL, NULL),
(17, 'Instituto Agrotécnico', '2023-04-23 22:32:35', NULL, NULL),
(18, 'Instituto de Ciencias Criminalisticas y Criminología', '2023-04-23 22:32:35', NULL, NULL),
(19, 'Instituto de Medicina regional', '2023-04-23 22:32:35', NULL, NULL),
(20, 'Instituto Rectorado', '2023-04-23 22:32:35', NULL, NULL),
(21, 'ISSUNNE', '2023-04-23 22:32:35', NULL, NULL),
(22, 'Medicina', '2023-04-23 22:32:35', NULL, NULL),
(23, 'Odontología', '2023-04-23 22:32:35', NULL, NULL),
(24, 'Secretaria General de Extensión Universitaria', '2023-04-23 22:32:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `telefono`, `foto`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Superadmin', 'UAI', '', 'no-user.jpg', 'superadmin@uaigestion.com', '$2y$10$6O97Y/KXgg3PfEK4UZSEieML92b5tMKHXFXSf8gRv7pJ5rBU/iD1.', '2023-04-23 19:38:55', '2023-04-23 20:36:10', NULL),
(2, 'Supervisor', 'UAI', NULL, 'no-user.jpg', 'supervisor@uaigestion.com', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-05 21:20:38', NULL, NULL),
(3, 'Operador', 'UAI', NULL, 'no-user.jpg', 'operador@uaigestion.com', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-05 21:22:24', NULL, NULL),
(4, 'General', 'UA', NULL, 'no-user.jpg', 'ua_general@uaigestion.com', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-05 21:24:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_permisos`
--

CREATE TABLE `usuarios_permisos` (
  `id_permiso` bigint(20) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `usuario_tipo_id` int(11) NOT NULL,
  `unidad_academica_id` int(11) DEFAULT NULL,
  `area_auditada_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_permisos`
--

INSERT INTO `usuarios_permisos` (`id_permiso`, `usuario_id`, `usuario_tipo_id`, `unidad_academica_id`, `area_auditada_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, '2023-05-05 19:41:31', NULL, NULL),
(2, 2, 2, NULL, NULL, '2023-05-05 21:39:09', NULL, NULL),
(3, 3, 3, NULL, NULL, '2023-05-05 21:40:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tipo`
--

CREATE TABLE `usuarios_tipo` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_tipo`
--

INSERT INTO `usuarios_tipo` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(3, 'OPERADOR'),
(1, 'SUPERADMIN'),
(2, 'SUPERVISOR'),
(4, 'UA_GENERAL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas_auditadas`
--
ALTER TABLE `areas_auditadas`
  ADD PRIMARY KEY (`id_area_auditada`),
  ADD KEY `ua_id` (`ua_id`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id_observacion`),
  ADD KEY `area_auditada_id` (`area_auditada_id`),
  ADD KEY `impacto_id` (`impacto_id`),
  ADD KEY `estado_id` (`estado_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indices de la tabla `observacion_estados`
--
ALTER TABLE `observacion_estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `observacion_impactos`
--
ALTER TABLE `observacion_impactos`
  ADD PRIMARY KEY (`id_impacto`);

--
-- Indices de la tabla `observacion_planes`
--
ALTER TABLE `observacion_planes`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `unidades_academicas`
--
ALTER TABLE `unidades_academicas`
  ADD PRIMARY KEY (`id_ua`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios_permisos`
--
ALTER TABLE `usuarios_permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `usuarios_tipo`
--
ALTER TABLE `usuarios_tipo`
  ADD PRIMARY KEY (`id_tipo_usuario`),
  ADD UNIQUE KEY `tipo_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas_auditadas`
--
ALTER TABLE `areas_auditadas`
  MODIFY `id_area_auditada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id_observacion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `observacion_estados`
--
ALTER TABLE `observacion_estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `observacion_impactos`
--
ALTER TABLE `observacion_impactos`
  MODIFY `id_impacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `observacion_planes`
--
ALTER TABLE `observacion_planes`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `unidades_academicas`
--
ALTER TABLE `unidades_academicas`
  MODIFY `id_ua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios_permisos`
--
ALTER TABLE `usuarios_permisos`
  MODIFY `id_permiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios_tipo`
--
ALTER TABLE `usuarios_tipo`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `areas_auditadas`
--
ALTER TABLE `areas_auditadas`
  ADD CONSTRAINT `areas_auditadas_ibfk_1` FOREIGN KEY (`ua_id`) REFERENCES `unidades_academicas` (`id_ua`);

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`area_auditada_id`) REFERENCES `areas_auditadas` (`id_area_auditada`),
  ADD CONSTRAINT `observaciones_ibfk_2` FOREIGN KEY (`impacto_id`) REFERENCES `observacion_impactos` (`id_impacto`),
  ADD CONSTRAINT `observaciones_ibfk_3` FOREIGN KEY (`estado_id`) REFERENCES `observacion_estados` (`id_estado`),
  ADD CONSTRAINT `observaciones_ibfk_4` FOREIGN KEY (`plan_id`) REFERENCES `observacion_planes` (`id_plan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;