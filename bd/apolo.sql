-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2021 a las 07:10:46
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apolo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `grupo` varchar(255) NOT NULL,
  `unidad` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `visible` varchar(255) NOT NULL,
  `no_archivos_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_materia`
--

CREATE TABLE `asignar_materia` (
  `id_asg_materia` int(11) NOT NULL,
  `profesor_no` varchar(255) NOT NULL, 
  `no_control` varchar(255) NOT NULL,
  `nombre_alumno` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `tipo_clase` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `grupo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignar_materia`
--

INSERT INTO `asignar_materia` (`id_asg_materia`, `no_control`, `nombre_alumno`, `carrera`, `tipo_clase`, `semestre`, `nombre_materia`, `grupo`) VALUES
(4, 'mimiim', 'miiimimim', 'mmimiimi', 'mimimimimi', 'Estudiante', '09:09:00', ''),
(5, 'mmiimimi', '34', '433', '4543', 'Estudiante', '08:08:00', ''),
(7, 'Profesor', 'Sistemas', '5', 'Quimica', '17223212', '10:00:00', ''),
(8, 'Profesor', 'Sistemas', '5', 'mimimi', '17223212', '05:09:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `clave_materia` varchar(255) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `ciclo_escolar_inicio` date NOT NULL,
  `ciclo_escolar_final` date NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `grupo` varchar(255) NOT NULL,
  `profesor_no` varchar(255) NOT NULL,
  `profesor_nombre` varchar(255) NOT NULL,
  `horario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `clave_materia`, `nombre_materia`, `ciclo_escolar_inicio`, `ciclo_escolar_final`, `semestre`, `carrera`, `grupo`, `profesor_no`, `profesor_nombre`, `horario`) VALUES
(2, 'Q11222', 'Quimica', '2021-06-28', '2021-08-18', '5', 'Sistemas', '', '', '', ''),
(4, 'mimimi', 'miimi', '2021-06-30', '2021-06-30', '5', 'Gestion', '', '', '', ''),
(5, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(6, 'mimiim', 'mimimi', '0000-00-00', '0000-00-00', '5', 'Sistemas', '', '', '', ''),
(7, 'mimim', 'miimim', '0000-00-00', '0000-00-00', '4', 'Industrial', '', '', '', ''),
(8, 'mimimi', 'mimiim', '2027-02-08', '0000-00-00', '6', 'Industrial', '', '', '', ''),
(9, 'mimiim', '23', '2021-06-29', '2021-06-29', '3', 'Industrial', '', '', '', ''),
(10, 'M12211', 'Matematicas', '2021-06-28', '2021-06-30', '5', 'Industrial', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `no_control` varchar(255) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `apellido_paterno_usuario` varchar(255) NOT NULL,
  `apellido_materno_usuario` varchar(255) NOT NULL,
  `ocupacion` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `no_control`, `nombre_usuario`, `apellido_paterno_usuario`, `apellido_materno_usuario`, `ocupacion`, `carrera`, `email`, `pass`) VALUES
(9, '17111829', 'Mario', 'Arriaga', 'Colin', 'Estudiante', 'Sistemas', 'mario@gmail.com', '62207ab20e3948e447970895c0f0a6e5d8eb00b8'),
(10, '17223212', 'Miguel', 'Posada', 'no se', 'Profesor', 'Sistemas', 'posi@gmail.com', '3c86951d8d822b422685dd5dad9ff912ae173139'),
(11, '171190023', 'Luis', 'Hernandez', 'No se', 'Administrador', 'Sistemas', 'luis@gmail.com', '62207ab20e3948e447970895c0f0a6e5d8eb00b8'),
(12, 'mmimmim', 'imim', 'mimi', 'mimimi', 'Estudiante', '', 'mimim@gmail.com', 'a5afbf5404a440b5ab910339e8954caafcf756d5'),
(13, 'mimii', 'mimiimi', 'miimim', 'mimimi', '', '', 'mimiim@mimimi.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(14, 'mimimii', 'mimimimi', 'mimiim', 'mimimi', 'Estudiante', '', 'mimim@mimim.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(15, 'mimimimi', 'mimimiim', 'mimiim', 'mimimiim', 'Profesor', 'Industrial', 'mimimi@mimi.com', '8c229568c49fb6c1e0f53bbefef207e57029de2e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `asignar_materia`
--
ALTER TABLE `asignar_materia`
  ADD PRIMARY KEY (`id_asg_materia`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `asignar_materia`
--
ALTER TABLE `asignar_materia`
  MODIFY `id_asg_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
