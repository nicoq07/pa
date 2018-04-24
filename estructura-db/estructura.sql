-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-04-2018 a las 13:26:48
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `padb`
--
CREATE DATABASE IF NOT EXISTS `padb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `padb`;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ciudad` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `codigo_postal` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nro_documento` varchar(16) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `colegio` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre_madre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre_padre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email_padre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email_madre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular_padre` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular_madre` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `referencia_foto` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `edad` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'edad'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `ciudad`, `codigo_postal`, `telefono`, `celular`, `nro_documento`, `email`, `observacion`, `colegio`, `nombre_madre`, `nombre_padre`, `email_padre`, `email_madre`, `celular_padre`, `celular_madre`, `created`, `modified`, `active`, `referencia_foto`, `fecha_baja`, `edad`) VALUES
(2, 'Nicolas', 'Quiroga', '2013-04-21', '', '', '', '', '', '38776090', '', 'asd', '', '', '', '', '', '', '', '2018-04-21 18:03:10', '2018-04-21 18:12:05', 1, NULL, NULL, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `aprobado` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `nombre`, `valor`, `aprobado`, `created`, `modified`) VALUES
(1, 'Sobresaliente', 10, 1, '2017-08-31 18:23:54', '2017-08-31 18:23:54'),
(2, 'Muy bueno', 8, 1, '2017-08-31 18:24:13', '2017-08-31 18:24:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclolectivo`
--

CREATE TABLE `ciclolectivo` (
  `id` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `descripcion` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ciclolectivo`
--

INSERT INTO `ciclolectivo` (`id`, `fecha_inicio`, `fecha_fin`, `descripcion`, `created`, `modified`, `active`) VALUES
(1, '2017-08-24 18:22:00', '2017-12-24 18:22:00', 'c', '2017-08-24 18:22:55', '2017-08-24 18:22:55', 1),
(2, '2018-04-21 20:43:00', '2018-11-21 20:43:00', 'Ciclo 2018', '2018-04-21 20:43:20', '2018-04-21 21:45:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `operador_id` int(11) DEFAULT NULL,
  `horario_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `programa_adolescencia` tinyint(1) DEFAULT '0',
  `alumno_count` int(10) UNSIGNED DEFAULT NULL COMMENT 'cantidad de alumnos por clase',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `profesor_id`, `operador_id`, `horario_id`, `disciplina_id`, `programa_adolescencia`, `alumno_count`, `created`, `modified`, `active`) VALUES
(1, 3, 1, 7, 1, 0, 0, '2018-04-16 18:38:07', '2018-04-16 18:38:07', 1),
(2, 2, 1, 14, 1, 0, 0, '2018-04-19 22:36:55', '2018-04-21 21:52:09', 1),
(7, 3, 2, 13, 1, 0, 1, '2018-04-21 21:45:36', '2018-04-21 21:45:36', 1),
(8, 1, 2, 14, 1, 0, 0, '2018-04-21 21:45:59', '2018-04-21 21:51:19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_alumnos`
--

CREATE TABLE `clases_alumnos` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `clases_alumnos`
--

INSERT INTO `clases_alumnos` (`id`, `alumno_id`, `clase_id`, `created`, `modified`, `active`) VALUES
(1, 2, 1, '2018-04-21 18:06:16', '2018-04-21 18:06:16', 1),
(5, 2, 7, '2018-04-21 21:45:36', '2018-04-21 21:45:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `descripcion`, `created`, `modified`, `active`) VALUES
(1, 'Bajo', '2017-08-24 18:23:05', '2017-08-24 18:23:05', 1),
(2, 'Guitarra', '2017-08-24 18:33:38', '2017-08-24 18:33:38', 1),
(3, 'Lecto Escritura', '2017-09-02 17:22:39', '2017-09-02 17:22:39', 1),
(4, 'Informatica', '2017-09-02 17:22:47', '2017-09-02 17:22:47', 1),
(5, 'Testing', '2017-09-03 10:23:33', '2017-09-03 10:23:33', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `clase_alumno_id` int(11) DEFAULT NULL,
  `periodo` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `aprobado` tinyint(1) NOT NULL DEFAULT '0',
  `calificacion` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'valor para calificación',
  `audioperceptiva` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'valor para audioperceptiva',
  `practica_ensamble` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'valor para practica_ensamble',
  `trabajos_practicos` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'valor para trabajos_practicos',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestor_tareas`
--

CREATE TABLE `gestor_tareas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `prioridad_id` int(11) DEFAULT NULL,
  `fecha_vencimiento` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `resuelta` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gestor_tareas`
--

INSERT INTO `gestor_tareas` (`id`, `titulo`, `descripcion`, `prioridad_id`, `fecha_vencimiento`, `created`, `modified`, `resuelta`) VALUES
(1, 'Llamada', 'llamar a omar', 2, '2017-11-06 01:00:00', '2017-09-22 10:28:47', '2017-09-23 10:32:49', 1),
(2, 'Llamada', 'Llamar a graciela', 1, NULL, '2017-09-22 11:03:17', '2017-09-23 10:30:36', 1),
(3, 'Llamada', 'Jefe', 3, NULL, '2017-09-22 11:07:24', '2017-09-23 10:25:14', 1),
(4, 'Hacer programas', 'programas san pedro', 2, '2017-09-29 00:00:00', '2017-09-24 13:11:59', '2017-09-24 13:12:23', 1),
(5, 'holis', 'Jefe', 3, '2017-09-24 00:00:00', '2017-09-24 14:51:13', '2017-09-24 15:08:17', 1),
(6, 'Llamada', 'Jefe', 2, '2017-09-24 00:00:00', '2017-09-24 15:12:02', '2017-09-24 17:13:35', 1),
(7, 'holis', 'olis', NULL, '2017-09-27 00:00:00', '2017-09-27 09:57:39', '2017-09-28 18:53:57', 1),
(8, 'E', 'w', 1, '2017-09-27 00:00:00', '2017-09-27 10:01:14', '2017-09-28 18:53:58', 1),
(9, 'e', 'e', 2, '2017-10-24 00:00:00', '2017-10-24 20:14:09', '2017-10-26 22:18:22', 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `ciclolectivo_id` int(11) NOT NULL,
  `nombre_dia` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `num_dia` int(1) DEFAULT NULL COMMENT 'valor numero del dia de 1 a 5',
  `hora` time NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `ciclolectivo_id`, `nombre_dia`, `num_dia`, `hora`, `created`, `modified`, `active`) VALUES
(1, 1, 'Tuesday', 2, '18:30:00', '2017-08-24 18:23:00', '2017-08-24 18:23:00', 1),
(2, 1, 'Thursday', 4, '18:30:00', '2017-08-24 18:33:29', '2017-08-24 18:33:29', 1),
(3, 1, 'Wednesday', 3, '10:30:00', '2017-09-02 10:37:01', '2017-09-02 10:37:01', 1),
(4, 1, 'Thursday', 4, '10:30:00', '2017-09-02 17:22:17', '2017-09-02 17:22:17', 1),
(5, 1, 'Thursday', 4, '21:30:00', '2017-09-02 17:22:22', '2017-09-02 17:22:22', 1),
(6, 1, 'Friday', 5, '09:00:00', '2017-09-08 08:47:42', '2017-09-08 08:47:42', 1),
(7, 1, 'Monday', 1, '14:30:00', '2017-11-20 21:31:13', '2017-11-20 21:31:13', 1),
(8, 1, 'Saturday', 6, '15:00:00', '2017-12-09 15:04:28', '2017-12-09 15:04:28', 1),
(9, 1, 'Saturday', 6, '18:00:00', '2017-12-09 15:04:39', '2017-12-09 15:04:39', 1),
(10, 1, 'Sunday', 7, '18:00:00', '2017-12-17 15:52:09', '2017-12-17 15:52:09', 1),
(11, 1, 'Sunday', 7, '19:30:00', '2017-12-17 16:37:46', '2017-12-17 16:37:46', 1),
(13, 2, 'Monday', 1, '21:00:00', '2018-04-21 20:55:07', '2018-04-21 20:55:07', 1),
(14, 2, 'Tuesday', 2, '21:00:00', '2018-04-21 20:55:19', '2018-04-21 20:55:19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `emisor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  `leida` tinyint(1) NOT NULL DEFAULT '0',
  `broadcast` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `descripcion`, `emisor`, `receptor`, `leida`, `broadcast`, `created`) VALUES
(2, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(3, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(4, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(5, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(6, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(7, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(8, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(9, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(10, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(11, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(12, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(13, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(14, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(15, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(16, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(17, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(18, 'hola', 1, 6, 1, 0, '2017-09-10 19:33:23'),
(19, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(20, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(21, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(22, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(23, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(24, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(25, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(26, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(27, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(28, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(29, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(30, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(31, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(32, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(33, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(34, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(35, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(36, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(37, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(38, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(39, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(40, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(41, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(42, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(43, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(44, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(45, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(46, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(47, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(48, 'hola', 1, 6, 0, 0, '2017-09-10 19:33:23'),
(49, 'hola', 1, 6, 1, 0, '2017-09-10 21:33:23'),
(50, 'holis', 1, 4, 1, 1, '2017-09-19 09:39:33'),
(51, 'holis', 1, 5, 1, 1, '2017-09-19 09:39:33'),
(52, 'holis', 1, 6, 1, 1, '2017-09-19 09:39:33'),
(53, 'holis', 1, 7, 1, 1, '2017-09-19 09:39:33'),
(54, 'test', 1, 4, 1, 0, '2017-09-19 10:12:43'),
(55, 'test desde hugo', 5, 1, 1, 0, '2017-09-19 10:14:29'),
(56, 'test', 5, 1, 1, 0, '2017-09-19 10:38:13'),
(57, 'holiiis', 5, 1, 1, 0, '2017-09-19 10:47:23'),
(58, 'e', 1, 4, 1, 1, '2017-09-19 10:55:54'),
(59, 'e', 1, 5, 1, 1, '2017-09-19 10:55:54'),
(60, 'e', 1, 6, 1, 1, '2017-09-19 10:55:54'),
(61, 'e', 1, 7, 1, 1, '2017-09-19 10:55:54'),
(62, 'jfslasfjlhfskj', 1, 6, 1, 0, '2017-09-19 23:31:32'),
(63, 'k', 1, 4, 1, 1, '2017-09-24 17:13:44'),
(64, 'k', 1, 5, 0, 1, '2017-09-24 17:13:44'),
(65, 'k', 1, 6, 1, 1, '2017-09-24 17:13:44'),
(66, 'k', 1, 7, 1, 1, '2017-09-24 17:13:44'),
(67, '5', 1, 4, 1, 1, '2017-09-24 17:14:40'),
(68, '5', 1, 5, 0, 1, '2017-09-24 17:14:40'),
(69, '5', 1, 6, 1, 1, '2017-09-24 17:14:40'),
(70, '5', 1, 7, 1, 1, '2017-09-24 17:14:40'),
(71, 'hola', 4, 1, 1, 0, '2017-10-06 20:42:02'),
(72, 'test', 4, 1, 1, 0, '2017-10-06 20:42:35'),
(73, 'hola', 4, 1, 1, 0, '2017-10-06 20:45:08'),
(74, 'hola', 8, 1, 1, 0, '2017-11-20 21:42:59'),
(75, 'todo bien?', 1, 4, 0, 1, '2017-11-20 21:45:00'),
(76, 'todo bien?', 1, 5, 0, 1, '2017-11-20 21:45:00'),
(77, 'todo bien?', 1, 6, 1, 1, '2017-11-20 21:45:00'),
(78, 'todo bien?', 1, 7, 1, 1, '2017-11-20 21:45:00'),
(79, 'todo bien?', 1, 8, 1, 1, '2017-11-20 21:45:00'),
(80, 'chau', 1, 8, 1, 0, '2017-11-20 21:45:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

CREATE TABLE `operadores` (
  `id` int(11) NOT NULL,
  `legajo_numero` int(11) DEFAULT NULL,
  `apellido` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `nro_documento` varchar(16) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ciudad` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `codigo_postal` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cuit` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre_contacto` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `celular_contacto` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `titulo` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`id`, `legajo_numero`, `apellido`, `nombre`, `nro_documento`, `direccion`, `ciudad`, `codigo_postal`, `email`, `cuit`, `telefono`, `celular`, `nombre_contacto`, `celular_contacto`, `titulo`, `observacion`, `created`, `modified`, `active`, `fecha_nacimiento`) VALUES
(1, 1, 'Operador1', 'Operador1', '67436522', '', '', '', 'mailoperador@gmail.com', '', '', '', '', '', 'NO PRESTENTA', '', '2017-11-19 14:56:49', '2017-11-19 14:56:49', 1, '1994-11-19'),
(2, NULL, 'Alyio', 'Juan', '4555555', '', '', '', 'jaaa2@gmail.com', '', '', '', '', '', 'No tiene', '', '2018-04-21 18:33:40', '2018-04-21 18:33:40', 1, '2013-04-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_alumnos`
--

CREATE TABLE `pagos_alumnos` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `mes` varchar(2) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'mes correspondiente al pago',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `monto` decimal(30,2) DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `fecha_pagado` datetime DEFAULT NULL COMMENT 'fecha cuando se paga '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `pagos_alumnos`
--

INSERT INTO `pagos_alumnos` (`id`, `alumno_id`, `mes`, `created`, `modified`, `monto`, `pagado`, `user_id`, `fecha_pagado`) VALUES
(1, 2, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(2, 3, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(3, 4, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(4, 5, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(5, 6, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(6, 7, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(7, 8, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(8, 9, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(9, 11, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(10, 12, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(11, 13, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(12, 14, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(13, 15, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(14, 16, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(15, 20, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(16, 21, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(17, 23, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(18, 26, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(19, 27, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(20, 28, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(21, 30, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(22, 31, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(23, 32, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(24, 33, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(25, 34, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(26, 35, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(27, 36, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(28, 37, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(29, 38, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(30, 39, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(31, 40, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(32, 42, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(33, 43, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(34, 44, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(35, 45, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(36, 46, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(37, 47, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(38, 48, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(39, 49, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(40, 50, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(41, 52, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(42, 53, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(43, 55, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(44, 56, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(45, 57, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(46, 58, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(47, 59, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(48, 60, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(49, 61, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(50, 62, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(51, 63, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(52, 64, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(53, 65, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(54, 66, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(55, 67, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(56, 68, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(57, 69, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(58, 70, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '1480.10', 0, NULL, NULL),
(59, 1141, '11', '2017-11-20 19:39:16', '2017-11-20 19:39:16', '19000.00', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `legajo_numero` int(11) DEFAULT NULL,
  `apellido` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `nro_documento` varchar(16) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ciudad` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `codigo_postal` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cuit` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre_contacto` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `celular_contacto` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `titulo` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `legajo_numero`, `apellido`, `nombre`, `nro_documento`, `direccion`, `ciudad`, `codigo_postal`, `email`, `cuit`, `telefono`, `celular`, `nombre_contacto`, `celular_contacto`, `titulo`, `observacion`, `created`, `modified`, `active`, `fecha_nacimiento`) VALUES
(1, NULL, 'Loge', 'Nicolas', '38776090', '', '', '', '', '2038776090', '', '', 'a', '', '', '', '2017-08-24 18:23:35', '2017-08-24 18:23:35', 1, '2012-08-24'),
(2, NULL, 'Gavbriel', 'Juan', '', '', '', '', '', '', '', '', '', '', '', '', '2017-09-03 10:23:22', '2017-09-03 10:23:22', 1, '2012-09-03'),
(3, NULL, 'Pelozzo', 'Ignacion', '45465465132', '', '', '', '', '', '', '', '', '', '', '', '2017-09-09 15:49:46', '2017-09-09 15:49:46', 1, '2012-09-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`, `created`, `modified`, `active`) VALUES
(1, 'Administrador', '2017-08-12 19:10:55', '2017-08-12 19:10:55', 1),
(2, 'Profesor', '2017-08-12 19:11:20', '2017-08-12 19:11:20', 1),
(3, 'Operador', '2017-08-12 19:11:20', '2017-08-12 19:11:20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos_programa`
--

CREATE TABLE `seguimientos_programa` (
  `id` int(11) NOT NULL,
  `clase_alumno_id` int(11) DEFAULT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `presente` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `seguimientos_programa`
--

INSERT INTO `seguimientos_programa` (`id`, `clase_alumno_id`, `observacion`, `presente`, `fecha`, `created`, `modified`) VALUES
(1, 5, 'SIN DATOS', 1, '2018-04-16 00:00:00', '2018-04-21 21:45:36', '2018-04-21 23:51:25'),
(2, 5, 'SIN DATOS', 0, '2018-04-30 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(3, 5, 'SIN DATOS', 0, '2018-05-07 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(4, 5, 'SIN DATOS', 0, '2018-05-14 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(5, 5, 'SIN DATOS', 0, '2018-05-21 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(6, 5, 'SIN DATOS', 0, '2018-05-28 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(7, 5, 'SIN DATOS', 0, '2018-06-04 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(8, 5, 'SIN DATOS', 0, '2018-06-11 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(9, 5, 'SIN DATOS', 0, '2018-06-18 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(10, 5, 'SIN DATOS', 0, '2018-06-25 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(11, 5, 'SIN DATOS', 0, '2018-07-02 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(12, 5, 'SIN DATOS', 0, '2018-07-09 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(13, 5, 'SIN DATOS', 0, '2018-07-16 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(14, 5, 'SIN DATOS', 0, '2018-07-23 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(15, 5, 'SIN DATOS', 0, '2018-07-30 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(16, 5, 'SIN DATOS', 0, '2018-08-06 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(17, 5, 'SIN DATOS', 0, '2018-08-13 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(18, 5, 'SIN DATOS', 0, '2018-08-20 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(19, 5, 'SIN DATOS', 0, '2018-08-27 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(20, 5, 'SIN DATOS', 0, '2018-09-03 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(21, 5, 'SIN DATOS', 0, '2018-09-10 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(22, 5, 'SIN DATOS', 0, '2018-09-17 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(23, 5, 'SIN DATOS', 0, '2018-09-24 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(24, 5, 'SIN DATOS', 0, '2018-10-01 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(25, 5, 'SIN DATOS', 0, '2018-10-08 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(26, 5, 'SIN DATOS', 0, '2018-10-15 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(27, 5, 'SIN DATOS', 0, '2018-10-22 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(28, 5, 'SIN DATOS', 0, '2018-10-29 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(29, 5, 'SIN DATOS', 0, '2018-11-05 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(30, 5, 'SIN DATOS', 0, '2018-11-12 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36'),
(31, 5, 'SIN DATOS', 0, '2018-11-19 00:00:00', '2018-04-21 21:45:36', '2018-04-21 21:45:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `dni` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `profesor_id` int(11) DEFAULT NULL,
  `operador_id` int(14) DEFAULT NULL,
  `nombre` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_usuario` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `fondo` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'fondo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `profesor_id`, `operador_id`, `nombre`, `apellido`, `nombre_usuario`, `password`, `rol_id`, `created`, `modified`, `active`, `fondo`) VALUES
(1, '1231231230', NULL, NULL, 'Maxi', 'Pedro', 'admin', '$2y$10$Z.8RpendMZXAetiQuBjL9.TYU/Lmkv86LxkGs1XekUhZapbKIsnra', 1, '2017-08-12 19:11:37', '2017-11-21 23:04:51', 1, 'piano.jpg'),
(4, '', NULL, NULL, 'Nicolas', 'Quiroga', 'profe', '$2y$10$Z.8RpendMZXAetiQuBjL9.TYU/Lmkv86LxkGs1XekUhZapbKIsnra', 2, '2017-08-21 22:24:13', '2017-11-12 23:17:32', 1, 'ruta.jpg'),
(5, NULL, NULL, NULL, 'Hugo', 'Castro', 'hcastro', '$2y$10$Z.8RpendMZXAetiQuBjL9.TYU/Lmkv86LxkGs1XekUhZapbKIsnra', 1, '2017-08-23 00:41:01', '2017-08-23 00:41:01', 1, NULL),
(6, '2038776090', 1, NULL, 'Nicolas', 'Loge', 'profe2', '$2y$10$Z.8RpendMZXAetiQuBjL9.TYU/Lmkv86LxkGs1XekUhZapbKIsnra', 2, '2017-08-24 18:32:36', '2017-11-18 13:04:45', 1, 'bajo.jpg'),
(7, '', 3, NULL, 'Ignacion', 'Pelozzo', 'igni', '$2y$10$Z.8RpendMZXAetiQuBjL9.TYU/Lmkv86LxkGs1XekUhZapbKIsnra', 2, '2017-09-09 15:50:41', '2017-12-09 15:23:21', 1, 'ruta.jpg'),
(8, '', NULL, 1, 'Operador1', 'Operador1', 'ope1', '$2y$10$0FfqzLePQNkjIaWNfeni..T0SicFWoihlqJONo7iJ0GRxKqvCSB/K', 3, '2017-11-20 21:01:15', '2017-11-20 21:02:31', 1, 'bateria.jpg'),
(9, '', 2, NULL, 'Juan', 'Gavbriel', 'juan', '$2y$10$HWwQj9fUvlDivtOAFH/zruk0V/RW6XzhjcqMGw3L545CFjLarKJIO', 2, '2017-12-17 15:53:12', '2017-12-17 15:54:07', 1, 'montanas.jpg');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_a_clases`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_a_clases` (
`nom_dia` varchar(10)
,`hora` time
,`clase_id` int(11)
,`dia` int(1)
,`disci` varchar(100)
,`profesor_id` int(11)
,`profesor` varchar(257)
,`operador_id` int(11)
,`operador` varchar(257)
,`cantAlu` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_clases`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_clases` (
`nom_dia` varchar(10)
,`hora` time
,`clase_id` int(11)
,`dia` int(1)
,`disci` varchar(100)
,`profesor_id` int(11)
,`profesor` varchar(257)
,`cantAlu` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_a_clases`
--
DROP TABLE IF EXISTS `view_a_clases`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_a_clases`  AS  select `h`.`nombre_dia` AS `nom_dia`,`h`.`hora` AS `hora`,`c`.`id` AS `clase_id`,`h`.`num_dia` AS `dia`,`d`.`descripcion` AS `disci`,`p`.`id` AS `profesor_id`,concat_ws(' ',`p`.`nombre`,`p`.`apellido`) AS `profesor`,`o`.`id` AS `operador_id`,concat_ws(' ',`o`.`nombre`,`o`.`apellido`) AS `operador`,count(`ca`.`id`) AS `cantAlu` from (((((`clases` `c` join `horarios` `h` on((`c`.`horario_id` = `h`.`id`))) join `profesores` `p` on((`c`.`profesor_id` = `p`.`id`))) join `operadores` `o` on((`c`.`operador_id` = `o`.`id`))) join `disciplinas` `d` on((`c`.`disciplina_id` = `d`.`id`))) left join `clases_alumnos` `ca` on((`c`.`id` = `ca`.`clase_id`))) where (`c`.`active` = 1) group by `c`.`id` order by `h`.`num_dia`,`h`.`hora` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_clases`
--
DROP TABLE IF EXISTS `view_clases`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_clases`  AS  select `h`.`nombre_dia` AS `nom_dia`,`h`.`hora` AS `hora`,`c`.`id` AS `clase_id`,`h`.`num_dia` AS `dia`,`d`.`descripcion` AS `disci`,`p`.`id` AS `profesor_id`,concat_ws(' ',`p`.`nombre`,`p`.`apellido`) AS `profesor`,count(`ca`.`id`) AS `cantAlu` from ((((`clases` `c` join `horarios` `h` on((`c`.`horario_id` = `h`.`id`))) join `profesores` `p` on((`c`.`profesor_id` = `p`.`id`))) join `disciplinas` `d` on((`c`.`disciplina_id` = `d`.`id`))) left join `clases_alumnos` `ca` on((`c`.`id` = `ca`.`clase_id`))) where (`c`.`active` = 1) group by `c`.`id` order by `h`.`num_dia`,`h`.`hora` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciclolectivo`
--
ALTER TABLE `ciclolectivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profesor_id` (`profesor_id`,`operador_id`,`horario_id`,`disciplina_id`),
  ADD KEY `FK_DisciplinaClase_idx` (`disciplina_id`),
  ADD KEY `FK_ProfesorClase_idx` (`profesor_id`),
  ADD KEY `FK_HorarioClase_idx` (`horario_id`),
  ADD KEY `FK_OperadorClase` (`operador_id`);

--
-- Indices de la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AlumnoClase_idx` (`alumno_id`),
  ADD KEY `FK_ClaseClase_idx` (`clase_id`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ClaseAlumnoExamen_idx` (`clase_alumno_id`);

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
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ciclolectivo_id` (`ciclolectivo_id`,`nombre_dia`,`num_dia`,`hora`),
  ADD KEY `FK_CicloLectivoHorario_idx` (`ciclolectivo_id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserReceptor_idx` (`receptor`),
  ADD KEY `FK_UserEmisor_idx` (`emisor`);

--
-- Indices de la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos_alumnos`
--
ALTER TABLE `pagos_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AlumnoPago_idx` (`alumno_id`),
  ADD KEY `FK_UserPago_idx` (`user_id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimientos_programa`
--
ALTER TABLE `seguimientos_programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ClasesAlumnoSeguimientosPrograma_idx` (`clase_alumno_id`),
  ADD KEY `clase_id` (`clase_alumno_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RolUser_idx` (`rol_id`),
  ADD KEY `FK_ProfesorUser` (`profesor_id`),
  ADD KEY `FK_OperadorUser` (`operador_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ciclolectivo`
--
ALTER TABLE `ciclolectivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `gestor_tareas`
--
ALTER TABLE `gestor_tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `gestor_tareas_prioridad`
--
ALTER TABLE `gestor_tareas_prioridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pagos_alumnos`
--
ALTER TABLE `pagos_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `seguimientos_programa`
--
ALTER TABLE `seguimientos_programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `FK_DisciplinaClase` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`),
  ADD CONSTRAINT `FK_HorarioClase` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`),
  ADD CONSTRAINT `FK_OperadorClase` FOREIGN KEY (`operador_id`) REFERENCES `operadores` (`id`),
  ADD CONSTRAINT `FK_ProfesorClase` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`);

--
-- Filtros para la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  ADD CONSTRAINT `FK_AlumnoClaseAlumno` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `FK_ClaseClaseAlumno` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`);

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `FK_ClaseAlumnoExamen` FOREIGN KEY (`clase_alumno_id`) REFERENCES `clases_alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestor_tareas`
--
ALTER TABLE `gestor_tareas`
  ADD CONSTRAINT `FK_PrioridadGestorTareas` FOREIGN KEY (`prioridad_id`) REFERENCES `gestor_tareas_prioridad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `FK_CicloLectivoHorario` FOREIGN KEY (`ciclolectivo_id`) REFERENCES `ciclolectivo` (`id`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `FK_UserEmisor` FOREIGN KEY (`emisor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_UserReceptor` FOREIGN KEY (`receptor`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pagos_alumnos`
--
ALTER TABLE `pagos_alumnos`
  ADD CONSTRAINT `FK_AlumnoPago` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `FK_UserPago` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `seguimientos_programa`
--
ALTER TABLE `seguimientos_programa`
  ADD CONSTRAINT `FK_ClasesAlumnoSeguimientosPrograma` FOREIGN KEY (`clase_alumno_id`) REFERENCES `clases_alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_OperadorUser` FOREIGN KEY (`operador_id`) REFERENCES `operadores` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_ProfesorUser` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_RolUser` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;
