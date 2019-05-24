-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2019 a las 14:44:39
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservatodo`
--

CREATE TABLE `reservatodo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `salon` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `fechaemp` time NOT NULL,
  `fechater` time NOT NULL,
  `numero` int(11) NOT NULL,
  `fechavideo` varchar(100) NOT NULL,
  `fechainscripcion` date NOT NULL,
  `Conteocdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservatodo`
--

INSERT INTO `reservatodo` (`id`, `nombre`, `materia`, `salon`, `fecha`, `fechaemp`, `fechater`, `numero`, `fechavideo`, `fechainscripcion`, `Conteocdt`) VALUES
(44, 'aaa', 'COMPUTACION II', 'videobeam', '', '10:00:00', '12:00:00', 0, '2019-05-14', '2019-05-13', 0),
(46, 'gokdari', 'INTRODUCCION A LA COMPUTACION', 'videobeam', '', '10:00:00', '12:00:00', 0, '2019-05-16', '2019-05-14', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cedula` int(11) NOT NULL,
  `Cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `clave`, `email`, `cedula`, `Cargo`) VALUES
(1, 'gokdari', 'ae4173ada576e1a595e1ef731aae977f', 'soisoisoi@gmail.com', 760, 1),
(2, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'iamgod@gmail.com', 1789, 2),
(3, 'lol', '9cdfb439c7876e703e307864c9167a15', 'dogdie3001@gmail.com', 24567811, 2),
(4, 'nin', '2a16a013045dae9a66401eb607faf1c6', 'dogdie3001@gmail.com', 12345121, 1),
(5, 'bbb', '08f8e0260c64418510cefb2b06eee5cd', 'dogdie3001@gmail.com', 23412, 1),
(6, 'eee', 'd2f2297d6e829cd3493aa7de4416a18f', 'dogdie3001@gmail.com', 567890, 1),
(7, 'ffff', 'ece926d8c0356205276a45266d361161', 'dogdie3001@gmail.com', 25612, 1),
(8, 'erer', 'cc0bd5832b4e1465a6987d953bb767af', 'dogdie3001@gmail.com', 231, 2),
(9, 'no', '7fa3b767c460b54a2be4d49030b349c7', 'jesusenrique1996@gmail.com', 232, 2),
(10, 're', '12eccbdd9b32918131341f38907cbbb5', 'jesusenrique1996@gmail.com', 3412, 1),
(11, 'gamzee', '5b4464cffe8f5607811c5ac5ec35df7c', 'dogdie3001@gmail.com', 66666, 1),
(12, 'ereoi', '8721331b3aaa9770e320c00cddf22119', 'dogdie3001@gmail.com', 45123, 2),
(13, 'oro', 'a13314e5b7614acf77e65427af6d3791', 'dogdie3001@gmail.com', 11123341, 2),
(14, 'nogaro', 'a2c9b887387c0ff15c4e77a1c6b41127', 'nogaro@ask-mail.com', 784512, 1),
(15, 'wunotak', 'fa0c604cf77ee62816e6276ccad589c5', 'wunotak@digitalmail.info', 854545, 2),
(16, 'ceyav', 'fd91fd959999a7fda3885e3492fa2f75', 'ceyav@digitalmail.info', 78965425, 2),
(17, 'colaboy', 'f70c978f7ca19db8cdf684e11661a8e6', 'cobaloy@the-first.email', 15678456, 1),
(18, 'yisoxutuk', '2528730b6b8cabbb639db126dd3707e2', 'yisoxutuk@digital-work.net', 19001234, 2),
(19, 'Juan Paiva', '4143a6e6c7900353e5450e861cc5faa5', 'xafuwa@mailing.one', 21014216, 2),
(20, 'Fortunato', '294068dab259d028521b171d91d07b3d', 'wukop@mail-finder.net', 6789452, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservatodo`
--
ALTER TABLE `reservatodo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservatodo`
--
ALTER TABLE `reservatodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
