-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 04:36:36
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `minimvc`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `indexUsers` ()  BEGIN
    	SELECT * from usuario WHERE fecha_registro = CURDATE();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_user` (IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `fecha` DATE)  BEGIN
    insert into usuario (nombres,apellidos,fecha_registro) values (nombres,apellidos,CURRENT_DATE());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `searchByUsers` (IN `_nombres` VARCHAR(30), IN `_apellidos` VARCHAR(30), IN `_desde` VARCHAR(30), IN `_hasta` VARCHAR(30))  BEGIN SELECT * FROM usuario WHERE nombres LIKE CONCAT('%', _nombres , '%') and apellidos LIKE CONCAT('%', _apellidos , '%') and fecha_registro
BETWEEN  _desde and _hasta;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `task` text NOT NULL,
  `date` date NOT NULL,
  `date_registred` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(150) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `fecha_registro` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `fecha_registro`) VALUES
(1, 'Chris', 'Ramos Hidalgo', '2021-10-06'),
(2, 'Gilan', 'Robles', '2021-10-27'),
(210, 'mario', 'jose', '2021-11-06'),
(220, 'gilabn', 'robles', '2021-11-06'),
(221, 'Edson', 'Borja', '2021-11-08'),
(222, 'Mario', 'Paco', '2021-11-08'),
(223, 'Antonella', 'Ayala', '2021-11-08'),
(224, 'Jose', 'Alfredo', '2021-11-08'),
(225, 'Sebastian', 'Perez', '2021-11-08'),
(226, 'Renato', 'Romero', '2021-11-08'),
(227, 'Cat', 'Sotelo', '2021-11-08'),
(228, 'Gabs', 'Gabs', '2021-11-08'),
(229, 'gii1', 'ro1', '2021-11-13'),
(230, 'gi2', 'ro2', '2021-11-13'),
(231, 'gi3', 'ro3', '2021-11-13'),
(232, 'gi4', 'ro4', '2021-11-13'),
(233, 'gi5', 'ro5', '2021-11-13'),
(234, 'gi6', 'ro6', '2021-11-13'),
(290, 'a', 'a', NULL),
(291, 'a', 'a', NULL),
(292, 'q', 'q', NULL),
(293, 'a', 'a', '2021-11-16'),
(294, 'ins', 'sert', '2021-11-16'),
(295, 'qq', 'qq', '2021-11-16'),
(296, 'pe', 'pe', '2021-11-16'),
(297, 'jsoe', 'moguel', '2021-11-16'),
(298, 'enrique', 'manuel', '2021-11-16'),
(299, 'pepe', 'augusto', '2021-11-16'),
(300, 'fdf', 'dfdf', '2021-11-16'),
(301, 'lo', 'lo', '2021-11-16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_task_user` (`user_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_task_user` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
