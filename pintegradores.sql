-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2024 a las 15:25:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pintegradores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `correo` varchar(255) NOT NULL,
  `idproyecto` int(11) NOT NULL,
  `perfil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`correo`, `idproyecto`, `perfil`) VALUES
('ayamain.silva@smartin.tecnm.mx', 31, 'Asesor'),
('dianperez@gmail.com', 29, 'estudiante'),
('esther@gmail.com', 1, 'estudiante'),
('israel@hotmail.com', 4, 'Estudiante'),
('jose@gmail.com', 1, 'estudiante'),
('L21250013@smartin.tecnm.mx', 3, 'Estudiante'),
('mich.contreras94@hotmail.com', 2, 'estudiante'),
('uziel@gmail.com', 4, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idproyecto` int(11) NOT NULL,
  `idevaluacion` varchar(10) NOT NULL,
  `evaluador` varchar(50) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `observacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`idproyecto`, `idevaluacion`, `evaluador`, `calificacion`, `observacion`) VALUES
(1, 'seg1', 'Adriana', 90, 'Buen trabajo, pero falta mejorar en la presentación'),
(2, 'seg2', 'Ayamain', 70, 'Necesitas mejorar tus documentos'),
(3, 'seg3', 'Patricia', 100, 'Excelente Trabajo'),
(4, 'seg4', 'Vianney', 100, 'Excelente trabajo'),
(29, 'seg6', 'Fani', 90, 'Buen trabajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `idevaluacion` varchar(18) NOT NULL,
  `fecha` date DEFAULT NULL,
  `periodo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`idevaluacion`, `fecha`, `periodo`) VALUES
('seg1', '2024-07-20', 'Julio-Diciembre 2024'),
('seg2', '2023-01-10', 'Enero-Junio 2023'),
('seg3', '2023-07-25', 'Julio-Diciembre 2023'),
('seg4', '2025-07-10', 'Ago-Dic 2025'),
('seg5', '2025-04-10', 'Ene-Jun-2025'),
('seg6', '2024-11-21', 'ago-dic-2024'),
('seg7', '2024-10-25', 'ago-dic-2024'),
('seg8', '2024-10-18', 'ago-dic-2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idpregunta` int(11) NOT NULL,
  `idevaluacion` varchar(18) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idpregunta`, `idevaluacion`, `descripcion`, `puntos`) VALUES
(0, 'seg2', 'Estás entrevistando al jefe de división', 90),
(1, 'seg1', 'Estás entrevistando al comité del agua potable', 100),
(2, 'seg1', 'Pregunta actualizada de ejemplo', 10),
(3, 'seg1', 'Pregunta de ejemplo', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idproyecto` int(10) NOT NULL,
  `proyecto` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idproyecto`, `proyecto`, `cliente`, `descripcion`) VALUES
(1, 'Agua Potable', 'San Lucas el Grande', 'Sistema web para el comité del agua potable'),
(2, 'Agencia Viajes', 'San Martin', 'Sistema web para el agente de viajes desde el transporte publico '),
(3, 'Ferreteria Guzmán', 'San Miguel', 'Sistema web de la ferreteria'),
(4, 'Punto de Venta', 'San Martin', 'Sistema web para la tienda de abarrotes Uziel'),
(5, 'Agenda de viajes (System of Trips)', 'San Martin', 'Sistema web para la agencia de viajes'),
(21, 'Vehicular', 'Villa Alta', 'Sistema web para el monitoreo de acceso/egreso peatonal y vehicular para el fraccionamiento lomas de Linda Vista'),
(25, 'Floreria Yuli', 'San Juan', 'Sistema web para vender flores'),
(28, 'Dirección de Bienestar Integral', 'Apizaco', 'Diseñar interfaces que permitan visualizar de manera clara y organizada la documentación que se ha entregado por parte de los aspirantes.'),
(29, 'Sistema de Gestión de Tutorías Académicas', 'San Martin', 'El Proyecto Integrador de Tutorías tiene como finalidad establecer un sistema efectivo de apoyo académico para los estudiantes mediante la implementación de tutorías personalizadas. Este proyecto busca abordar las necesidades educativas de los alumnos a través de un enfoque estructurado que fomente el aprendizaje y el desarrollo de habilidades.'),
(31, 'Control de Mascotas', 'Ayamain Silva', 'Controlar las fechas de vacunacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `noControl` varchar(10) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `Appaterno` varchar(50) DEFAULT NULL,
  `Apmaterno` varchar(50) DEFAULT NULL,
  `perfil` varchar(50) DEFAULT NULL,
  `genero` tinyint(4) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`noControl`, `correo`, `contraseña`, `nombre`, `Appaterno`, `Apmaterno`, `perfil`, `genero`, `estado`) VALUES
('0005574', 'vianney.morales@smartin.tecnm.mx', 'vianey1233', 'Vianney', 'Morales', 'Zamora', 'Docente', 2, 'Inactivo'),
('00525581', 'ayamain.silva@smartin.tecnm.mx', 'amya123', 'Ayamain ', 'Silva', 'Pérez', 'Asesor(a)', 2, 'Activo'),
('02010058', 'fani.rodriguez@smartin.tecnm.mx', 'fani8419', 'Fani', 'Rodríguez', 'Flores', 'Docente', 2, 'Inactivo'),
('08240054', 'patricia.trilla@smartin.tecnm.mx', 'patylu90', 'Patricia ', 'Trilla', 'Cortes', 'Docente', 2, 'Inactivo'),
('12240034', 'adrianapedraza@smartin.tecnm.mx', 'adry94', 'Adriana ', 'Pedraza ', 'Varela', 'Docente', 2, 'Activo'),
('19250005', 'favioserrano219@gmail.com', 'ardilla15', 'Miguel Favio', 'Serrano', 'Gutierrez', 'Administrador', 1, 'Activo'),
('19250008', 'L19250008@smartin.tecnm.mx', 'rafa123', 'Rafael', 'Hernández', 'Sánchez', 'Estudiante', 1, 'Inactivo'),
('19250018', 'diegocerezo@gmail.com', 'cerezo123', 'Diego Joaquin  ', 'Cerezo', 'Valdez', 'Estudiante', 1, 'Inactivo'),
('19250047', 'uziel@gmail.com', '674832', 'Edgar Usiel', 'Guzman', 'Estrella', 'Estudiante', 1, 'Inactivo'),
('20240020', 'israel@hotmail.com', 'isra205478', 'Israel  ', 'Flores', 'Quinto', 'Estudiante', 1, 'Inactivo'),
('20240021', 'irma@gmail.com', '674625', 'Irma Xitlali', 'Díaz', 'Casteñada', 'Estudiante', 2, 'Inactivo'),
('20250006', 'mich.contreras94@hotmail.com', 'mich94', 'Ashley Michael', 'Contreras', 'Perez', 'Estudiante', 1, 'Inactivo'),
('21250003', 'jose@gmail.com', 'joss458', 'Joselin', 'Cortes', 'Sanchez', 'Estudiante', 2, 'Inactivo'),
('21250008', 'memox@gmail.com', 'memox02', 'Guillermo ', 'Espinosa', 'Solano', 'Estudiante', 1, 'Inactivo'),
('21250011', 'leydy@gmail.com', 'leydy123', 'Leydy Mayru', 'Reyes', 'Vasquez', 'Estudiante', 2, 'Inactivo'),
('21250013', 'L21250013@smartin.tecnm.mx', 'jesus03', 'Jesus Antonio', 'Ramirez', 'Guzmán', 'Estudiante', 1, 'Inactivo'),
('21250016', 'dianperez@gmail.com', 'dian0003', 'Diana', 'Waldo', 'Perez', 'Estudiante', 2, 'Inactivo'),
('C21250018', 'esther@gmail.com', 'daft458', 'Esther', 'Domínguez', 'Ramírez', 'Estudiante', 2, 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`correo`,`idproyecto`),
  ADD KEY `idproyecto` (`idproyecto`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idproyecto`,`idevaluacion`,`evaluador`),
  ADD KEY `idevaluacion` (`idevaluacion`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`idevaluacion`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idpregunta`),
  ADD KEY `idevaluacion` (`idevaluacion`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`idproyecto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`noControl`),
  ADD KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `idproyecto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`),
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`correo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`idevaluacion`) REFERENCES `evaluacion` (`idevaluacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`idevaluacion`) REFERENCES `evaluacion` (`idevaluacion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
