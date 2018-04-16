define('URGENTE', 1);
define('NORMAL', 2);
define('BAJA', 3);
-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-09-2017 a las 16:31:07
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `sibadb`
--

-- --------------------------------------------------------
ALTER TABLE `alumnos` CHANGE `fecha_nacimiento` `fecha_nacimiento` DATE NULL DEFAULT NULL;
ALTER TABLE `profesores` CHANGE `fecha_nacimiento` `fecha_nacimiento` DATE NULL DEFAULT NULL
--
-- Estructura de tabla para la tabla `gestor_tareas`
--

CREATE TABLE `gestor_tareas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `prioridad_id` int(11) DEFAULT NULL,
  `fecha_vencimiento` datetime DEFAULT NULL,
   `resuelta` tinyint DEFAULT FALSE,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gestor_tareas`
--

INSERT INTO `gestor_tareas` (`id`, `titulo`, `descripcion`, `prioridad_id`, `fecha_vencimiento`, `created`, `modified`) VALUES
(1, 'Llamada', 'llamar a omar', 2, '2017-11-06 01:00:00', '2017-09-22 10:28:47', '2017-09-22 10:28:47'),
(2, 'Llamada', 'Llamar a graciela', 1, NULL, '2017-09-22 11:03:17', '2017-09-22 11:03:17'),
(3, 'Llamada', 'Jefe', 3, NULL, '2017-09-22 11:07:24', '2017-09-22 11:07:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestor_tareas_prioridad`
--

CREATE TABLE `gestor_tareas_prioridad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(1) NOT NULL,
  `color` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'color css'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gestor_tareas_prioridad`
--

INSERT INTO `gestor_tareas_prioridad` (`id`, `nombre`, `valor`, `color`) VALUES
(1, 'Urgente', 1, '#c23b23'),
(2, 'Normal', 2, '#fbfe94'),
(3, 'Baja', 3, '#77de76');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gestor_tareas`
--
ALTER TABLE `gestor_tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PrioridadGestorTareas` (`prioridad_id`);

--
-- Indices de la tabla `gestor_tareas_prioridad`
--
ALTER TABLE `gestor_tareas_prioridad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gestor_tareas`
--
ALTER TABLE `gestor_tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `gestor_tareas_prioridad`
--
ALTER TABLE `gestor_tareas_prioridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gestor_tareas`
--
ALTER TABLE `gestor_tareas`
  ADD CONSTRAINT `FK_PrioridadGestorTareas` FOREIGN KEY (`prioridad_id`) REFERENCES `gestor_tareas_prioridad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
