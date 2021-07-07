-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2021 a las 05:24:09
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
  `profesor_no` varchar(255) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `grupo` varchar(255) NOT NULL,
  `unidad` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `visible` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivo`, `profesor_no`, `matricula`, `nombre_archivo`, `materia`, `grupo`, `unidad`, `semestre`, `visible`) VALUES
(133, '171122233', 'AEC-1061', 'FMP_5401R06041223H4328ME.pdf', 'Sistemas Operativos', '5SIS', '4', '5', 'si'),
(134, '171122233', 'AEC-1061', 'aptoide-latest.apk', 'Sistemas Operativos', '5SIS', '3', '5', 'si'),
(135, '171122233', 'AEC-1034', 'Materias.sql', 'Fundamentos de Telecomunicaciones', '5SIS', '3', '5', 'si');

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

INSERT INTO `asignar_materia` (`id_asg_materia`, `profesor_no`, `no_control`, `nombre_alumno`, `carrera`, `tipo_clase`, `semestre`, `nombre_materia`, `grupo`) VALUES
(20, '171122233', '17111829', 'Mario Arriaga Colin', 'Sistemas', 'Ordinario', '5', '  Sistemas Operativos', '5SIS'),
(22, '171122233', '17111829', 'Mario Arriaga Colin', 'Sistemas', 'Ordinario', '5', '  Fundamentos de Telecomunicaciones', '5SIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `id_contador` int(11) NOT NULL,
  `matricula_materia` varchar(255) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `profesor_no` varchar(255) NOT NULL,
  `grupo` varchar(255) NOT NULL,
  `numero_archivos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id_contador`, `matricula_materia`, `nombre_materia`, `profesor_no`, `grupo`, `numero_archivos`) VALUES
(9, 'AEC-1061', '  Sistemas Operativos', '171122233', '5SIS', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `creditos` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `clave`, `nombre`, `creditos`, `semestre`, `carrera`) VALUES
(1, 'ACF-0901', 'Cálculo Diferencial', '3-2-5', '1', 'sistemas'),
(2, 'SCD-1008', 'Fundamentos de Programación', '2-3-5', '1', 'sistemas'),
(3, 'ACA-0907', 'Taller de Ética', '0-4-4', '1', 'sistemas'),
(4, 'AEF-1041', 'Matemáticas Discretas', '3-2-5', '1', 'sistemas'),
(5, 'SCH-1024', 'Taller de Administración', '1-3-4', '1', 'sistemas'),
(6, 'ACC-0906', 'Fundamentos de Investigación', '2-2-4', '1', 'sistemas'),
(7, 'ACF-0902', 'Cálculo Integral ', '3-2-5', '2', 'sistemas'),
(8, 'SCD-1020', 'Programación Orientada a Objetos', '2-3-5', '2', 'sistemas'),
(9, 'SCC-1010', 'Graficación', '2-2-4', '2', 'sistemas'),
(10, 'AEC-1058', 'Química', '2-2-4', '2', 'sistemas'),
(11, 'ACF-0903', 'Algebra Lineal', '3-2-5', '2', 'sistemas'),
(12, 'AEF-1052 ', 'Probabilidad y Estadistica', '3-2-5', '2', 'sistemas'),
(13, 'ACF-0904', 'Cálculo Vectorial', '3-2-5', '3', 'sistemas'),
(14, 'AED-1026', 'Estructura de Datos', '2-3-5', '3', 'sistemas'),
(15, 'SCC-1013', 'Investigación de Operaciones', '2-2-4', '3', 'sistemas'),
(16, 'AEF-1031', 'Fundamentos de Base de Datos', '3-2-5', '3', 'sistemas'),
(17, 'ACD-0908', 'Desarrollo Sustentable', '2-3-5', '3', 'sistemas'),
(18, 'AEC-1008', 'Contabilidad Financiera', '2-2-4', '3', 'sistemas'),
(19, 'ACF-0905', 'Ecuaciones Diferenciales', '3-2-5', '4', 'sistemas'),
(20, 'SCD-1027', 'Topicos Avanzados de Programación', '2-3-5', '4', 'sistemas'),
(21, 'SCC-1017', 'Métodos Numéricos', '2-2-4', '4', 'sistemas'),
(22, 'SCA-1025', 'Taller de Base de Datos', '0-4-4', '4', 'sistemas'),
(23, 'SCF-1006 ', 'Física General', '3-2-5', '4', 'sistemas'),
(24, 'SCD-1018', 'Principios Eléctricos y Aplicaciones Digitales', '2-3-5', '4', 'sistemas'),
(25, 'SCC-1005 ', 'Cultura Empresarial', '2-2-4', '4', 'sistemas'),
(26, 'AEC-1034', 'Fundamentos de Telecomunicaciones', '2-2-4', '5', 'sistemas'),
(27, 'AEB-1055', 'Programación Web', '1-4-5', '5', 'sistemas'),
(28, 'AEC-1061', 'Sistemas Operativos', '2-2-4', '5', 'sistemas'),
(29, 'SCB-1001', 'Administración de Bases de Datos', '1-4-5', '5', 'sistemas'),
(30, 'SCD-1022', 'Simulación', '2-3-5', '5', 'sistemas'),
(31, 'SCD-1003', 'Arquitectura de Computadoras', '2-3-5', '5', 'sistemas'),
(32, 'SCD-1015', 'Lenguajes y Autómatas I', '2-3-5', '6', 'sistemas'),
(33, 'DSB-1903', 'Sistemas WEB', '1-4-5', '6', 'sistemas'),
(34, 'SCA-1026', 'Taller de Sistemas Operativos', '0-4-4', '6', 'sistemas'),
(35, 'SCD-1021', 'Redes de Computadoras', '2-3-5', '6', 'sistemas'),
(36, 'SCC-1007', 'Fundamentos de Ingeniería de Software', '2-2-4', '6', 'sistemas'),
(37, 'SCC-1014', 'Lenguajez de Interfáz', '2-2-4', '6', 'sistemas'),
(38, 'SCD-1016', 'Lenguajes y Autómatas II', '2-3-5', '7', 'sistemas'),
(39, 'DSB-1901', 'Aplicaciones Móviles', '1-4-5', '7', 'sistemas'),
(40, 'ACA-0909', 'Taller de Investigación', '0-4-4 ', '7', 'sistemas'),
(41, 'SCD-1004', 'Conmutación y Enrutamient en Redes de Datos', '2-3-5 ', '7', 'sistemas'),
(42, 'SCD-1011', 'Ingeniería de Software', '2-3-5', '7', 'sistemas'),
(43, 'SCC-1023', 'Sistemas Programables', '2-2-4', '7', 'sistemas'),
(44, 'SCC-1019', 'Programación Lógica y Funcional', '2-2-4', '8', 'sistemas'),
(45, 'DSB-1902', 'Virtualización de Servidores', '1-4-5', '8', 'sistemas'),
(46, 'ACA-0910', 'Taller de Investigación II', '0-4-4', '8', 'sistemas'),
(47, 'SCA-1002', 'Administración de Redes', '0-4-4', '8', 'sistemas'),
(48, 'SCG-1009', 'Gestión de Proyectos de Software', '3-3-6', '8', 'sistemas'),
(49, 'DSB-1904', 'MEAN Stack para Front-End', '1-4-5', '8', 'sistemas'),
(50, 'SCC-1012', 'Inteligencia Artificial', '2-2-4', '9', 'sistemas'),
(51, 'DSX-1905', 'MEAN Stack para Back-End', '1-5-6', '9', 'sistemas'),
(52, 'ACC-09606', 'Fundamentos de Investigación', '2-2-4', '1', 'gestion'),
(53, 'ACF-0901', 'Cálculo Diferencial', '3-2-5', '1', 'gestion'),
(54, 'GEC-0905', 'Desarrollo Humano', '2-2-4', '1', 'gestion'),
(55, 'AEF-1074', 'Fundamentos de Gestión Empresarial', '3-2-5', '1', 'gestion'),
(56, 'GEC-0909', 'Fundamentos de Física', '2-2-4', '1', 'gestion'),
(57, 'GEF-0910', 'Fundamentos de Química', '3-2-5', '1', 'gestion'),
(58, 'AEB-1082', 'Software de Aplcación Ejecutivo', '1-4-5', '2', 'gestion'),
(59, 'ACF-0902', 'Cálculo Integral', '3-2-5', '2', 'gestion'),
(60, 'GED-0903', 'Contabilidad Orientada a los Negocios', '2-3-5', '2', 'gestion'),
(61, 'AEC-1014', 'Dinámica Social', '2-2-4', '2', 'gestion'),
(62, 'ACA-0907', 'Taller de Ética', '0-4-4', '2', 'gestion'),
(63, 'GEE-0918', 'Legislación Laboral', '3-1-4', '2', 'gestion'),
(64, 'AEC-1078', 'Marco Legal de las Organizaciones', '2-2-4', '3', 'gestion'),
(65, 'GED-0921', 'Probabilidad y Estadística Descriptiva', '2-3-5', '3', 'gestion'),
(66, 'GED-0904', 'Costos Empresariales', '2-3-5', '3', 'gestion'),
(67, 'GEC-0913', 'Habilidades Directivas I', '2-2-4', '3', 'gestion'),
(68, 'AEF-1071', 'Economía Empresarial', '3-2-5', '3', 'gestion'),
(69, 'ACF-0903', 'Algebra Lineal', '3-2-5', '3', 'gestion'),
(70, 'GEF-0916', 'Ingeniería Económica', '3-2-5', '4', 'gestion'),
(71, 'GEG-0907', 'Estadística Inferencial I', '3-3-6', '4', 'gestion'),
(72, 'GED-0917', 'Instrumentos de Presupuestación Empresarial', '2-3-5', '4', 'gestion'),
(73, 'GEC-0914', 'Habilidades Directivas II', '2-2-4', '4', 'gestion'),
(74, 'GEF-0906', 'Entorno Macroeconómico', '3-2-5', '4', 'gestion'),
(75, 'AEF-1076', 'Investigación de Operaciones', '3-2-5', '4', 'gestion'),
(76, 'AEF-1073', 'Finanzas en las Organizaciones', '3-2-5', '5', 'gestion'),
(77, 'GEC-0908', 'Estadística Inferencial II', '3-3-6', '5', 'gestion'),
(78, 'GEF-0915', 'Ingeniería de Procesos', '3-2-5', '5', 'gestion'),
(79, 'AEG-0909', 'Gestión del Capital Humano', '3-3-6', '5', 'gestion'),
(80, 'ACA-0909', 'Taller de Investigación I', '0-4-4', '5', 'gestion'),
(81, 'GEF-0919', 'Mercadotecnía', '3-2-5', '5', 'gestion'),
(82, 'AED-1072', 'El emprendedor y la Innovación', '2-3-5', '5', 'gestion'),
(83, 'GEF-0901', 'Administración de la Salud y Seguridad Ocupacional', '3-2-5', '6', 'gestion'),
(84, 'GEC-0911', 'Gestión de la Producción I', '2-2-4', '6', 'gestion'),
(85, 'AED-1015', 'Diseño Organizacional', '2-3-5', '6', 'gestion'),
(86, 'ACA-0910', 'Taller de Investigación II', '0-4-4', '6', 'gestion'),
(87, 'GED-0922', 'Sistemas de Información de la Mercadotecnia', '2-3-5', '6', 'gestion'),
(88, 'GDH-2001', 'Administración de la Micro, Pequeña y Mediana Empresa', '1-3-4', '6', 'gestion'),
(89, 'GDC-2002', 'Análisis Regional del Entorno desde una Perspectiva de Negocio.', '2-2-4', '6', 'gestion'),
(90, 'AED-1069', 'Calidad Aplicada a la Gestión Empresarial', '2-3-5', '7', 'gestion'),
(91, 'GED-0920', 'Plan de Negocios', '2-3-5', '7', 'gestion'),
(92, 'GEC-0912', 'Gestión de la producción II', '2-2-4', '7', 'gestion'),
(93, 'AED-1035', 'Gestión Estratégica', '2-3-5', '7', 'gestion'),
(94, 'ACD-0908', 'Desarrollo Sustentable', '2-3-5', '7', 'gestion'),
(95, 'GDG-2003', 'Entorno Legal y Fiscal de las organizaciones', '3-3-6', '7', 'gestion'),
(96, 'GDM-2004', 'Mercadotecnia 4.0 y la Inoovación', '2-3-5', '7', 'gestion'),
(97, 'AEB-1045', 'Mercadotecnia Electrónica', '1-4-5', '8', 'gestion'),
(98, 'GDM-2005', 'Tópicos para la gestión integral de las organizaciones', '2-4-6', '8', 'gestion'),
(99, 'GDF-2006', 'La innovación Empresarial y los Sistemas de Calidad', '3-2-5', '8', 'gestion'),
(100, 'GEF-092', 'Cadena de Suministros', '3-2-5', '8', 'gestion'),
(101, 'ACC-09606', 'Fundamentos de Investigación', '2-2-4', '1', 'industrial'),
(102, 'ACF-0901', 'Cálculo Diferencial', '3-2-5', '1', 'industrial'),
(103, 'INC-1025', 'Química', '2-2-4', '1', 'industrial'),
(104, 'INH-1029', 'Taller de Herramientas', '1-3-4', '1', 'industrial'),
(105, 'INN-1008', 'Dibujo Industrial', '0-6-6', '1', 'industrial'),
(106, 'ACA-0907', 'Taller de Etica', '0-4-4', '1', 'industrial'),
(107, 'INC-1013', 'Física', '2-2-4', '2', 'industrial'),
(108, 'ACF-0902', 'Cálculo Integral', '3-2-5', '2', 'industrial'),
(109, 'AEC-1048', 'Metrología y Normalización', '2-2-4', '2', 'industrial'),
(110, 'INR-1017', 'Ingeniería de Sistemas', '2-1-3', '2', 'industrial'),
(111, 'AEC-1053', 'Probabilidad y Estadística', '2-2-4', '2', 'industrial'),
(112, 'INQ-1006', 'Análisis de la Realidad Nacional', '1-2-3', '2', 'industrial'),
(113, 'INC-1030', 'Taller de Liderazgo', '2-2-4', '2', 'industrial'),
(114, 'INC-1024', 'Propiedad de los Materiales', '2-2-4', '3', 'industrial'),
(115, 'ACF-0903', 'Algebra Lineal', '3-2-5', '3', 'industrial'),
(116, 'INC-1023', 'Procesos de Fabricación', '2-2-4', '3', 'industrial'),
(117, 'AEC-10-18', 'Economía', '2-2-4', '3', 'industrial'),
(118, 'AEF-1024', 'Estadística Inferencial I', '3-2-5', '3', 'industrial'),
(119, 'INJ-1011', 'Estudio del Trabajo I', '4-2-6', '3', 'industrial'),
(120, 'ACF-0904', 'Cálculo Vectorial', '3-2-5', '4', 'industrial'),
(121, 'INC-1009', 'Electricidad y Electrónica Industrial', '2-2-4', '4', 'industrial'),
(122, 'INC-1005', 'Algoritmos y Lenguajes de', '2-2-4', '4', 'industrial'),
(123, 'INC-1018', 'Investigación de Operaciones I', '2-2-4', '4', 'industrial'),
(124, 'AEF-1025', 'Estadística Inferencial II', '3-2-5', '4', 'industrial'),
(125, 'INJ-1012', 'Estudio del Trabajo II', '4-2-6', '4', 'industrial'),
(126, 'INF-1016', 'Higiene y Seguridad Industrial', '3-2-5', '4', 'industrial'),
(127, 'INR-1003', 'Administración de Proyectos', '2-1-3', '5', 'industrial'),
(128, 'INC-1014', 'Gestión de Costos', '2-2-4', '5', 'industrial'),
(129, 'INC-1001', 'Administración de las Operaciones I', '2-2-4', '5', 'industrial'),
(130, 'INC-1019', 'Investigación de las Operaciones II', '2-2-4', '5', 'industrial'),
(131, 'INF-1007', 'Control Estadístico de la Calidad', '3-2-5', '5', 'industrial'),
(132, 'INF-1010', 'Ergonomía', '3-2-5', '5', 'industrial'),
(133, 'ACD-0908', 'Desarrollo Sustentable', '2-3-5', '5', 'industrial'),
(134, 'ACA-0909', 'Taller de Investigación I', '0-4-4', '6', 'industrial'),
(135, 'AEC-1037', 'Ingeniería Económica', '2-2-4', '6', 'industrial'),
(136, 'INC-1002', 'Administración de las Operaciones II', '2-2-4', '6', 'industrial'),
(137, 'INC-1027', 'Simulación', '2-2-4', '6', 'industrial'),
(138, 'INC-1004', 'Administración del Mantenimiento', '2-2-4', '6', 'industrial'),
(139, 'AEC-1044', 'Mercadotecnia', '2-3-5', '6', 'industrial'),
(140, 'INC-1015 ', 'Gestión de los Sistemas de Calidad', '2-2-4', '6', 'industrial'),
(141, 'ACA-0910', 'Taller de Investigación II', '0-4-4', '7', 'industrial'),
(142, 'INC-1021', 'Planeación Financiera', '2-2-4', '7', 'industrial'),
(143, 'INC-1022', 'Planeación y Diseño de', '2-2-4', '7', 'industrial'),
(144, 'INF-1028', 'Sistemas de Manufactura', '3-2-5', '7', 'industrial'),
(145, 'INH-1020', 'Logística y Cadenas de Suministro', '1-3-4', '7', 'industrial'),
(146, 'DMD-1706', 'MANUFACTURA SUSTENTABLE', '2-3-5', '7', 'industrial'),
(147, 'DMM-1701', 'DISEÑO ASISTIDO POR COMPUTADOR', '2-4-6', '7', 'industrial'),
(148, 'AED-1030', 'Formulación y Evaluación de', '2-3-5', '8', 'industrial'),
(149, 'INC-1026', 'Relaciones Industriales', '2-2-4', '8', 'industrial'),
(150, 'DMM-1703', 'DISEÑO ASISTIDO POR', '2-4-6', '8', 'industrial'),
(151, 'DMD-1702', 'TECNOLOGIAS PARA EL', '2-3-5', '8', 'industrial'),
(152, 'DMD-1705', 'CONTROLADORES LÓGICOS PROGRAMABLES', '2-3-5', '8', 'industrial'),
(153, 'DMD-1704', 'MANUFACTURA ESBELTA', '2-2-4', '8', 'industrial');

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
  `horario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `clave_materia`, `nombre_materia`, `ciclo_escolar_inicio`, `ciclo_escolar_final`, `semestre`, `carrera`, `grupo`, `profesor_no`, `profesor_nombre`, `horario`) VALUES
(22, 'AEC-1061', '  Sistemas Operativos', '2021-07-06', '2021-11-30', '5', 'sistemas', '5SIS', '171122233', 'Roldan Aquino Segura', 'L 07:00 AM-08:00 AM\nMi 07:00 AM-08:00 AM\nV 07:00 AM-08:00 AM\n'),
(24, 'SCB-1001', '  Administración de Bases de Datos', '2021-07-06', '2021-10-29', '5', 'sistemas', '5SIS', '171122233', 'Roldan Aquino Segura', 'L 07:00 AM-08:00 AM\nMi 07:00 AM-08:00 AM\nV 07:00 AM-08:00 AM\n'),
(25, 'GED-0917', '  Instrumentos de Presupuestación Empresarial', '2021-07-06', '2021-08-31', '4', 'gestion', '4GES', '171122233', 'Roldan Aquino Segura', 'L 07:00 AM-08:00 AM\nMi 07:00 AM-08:00 AM\nV 07:00 AM-08:00 AM\n');

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
(18, '171122233', 'Roldan', 'Aquino', 'Segura', 'Profesor', 'Gestion', 'roldan@gmail.com', '62207ab20e3948e447970895c0f0a6e5d8eb00b8'),
(26, '1222111', 'Ricardo', 'Tapia', 'Gonzales', 'Profesor', 'Gestion', 'ricardo@milpaalta2.tecnm.mx', '62207ab20e3948e447970895c0f0a6e5d8eb00b8');

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
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`id_contador`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

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
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `asignar_materia`
--
ALTER TABLE `asignar_materia`
  MODIFY `id_asg_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `contador`
--
ALTER TABLE `contador`
  MODIFY `id_contador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
