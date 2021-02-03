-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2020 a las 13:24:40
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2aw3_share_2letters`
--
CREATE DATABASE IF NOT EXISTS `2aw3_share_2letters` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `2aw3_share_2letters`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllCategories` ()  NO SQL
SELECT categories.idCategory, categories.categoryName
FROM categories$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllHiresByUsername` (IN `pUser` VARCHAR(50))  NO SQL
SELECT
*
FROM hires
INNER JOIN articles ON articles.idArticle=hires.idArticle
WHERE hires.username = pUser$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spFindUserByUsername` (IN `pUsername` VARCHAR(50))  NO SQL
SELECT * FROM users WHERE users.username = pUsername$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `idArticle` int(11) NOT NULL,
  `article` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` varchar(500) COLLATE utf8_bin NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`idArticle`, `article`, `description`, `idCategory`) VALUES
(1, 'Drill', 'taladro', 1),
(2, 'Lawnmower', 'Cortacesped', 4),
(3, 'Scooter', '125cc scooter', 3),
(4, 'Electric bike', 'BH electric bike\r\n', 3),
(5, 'Led Projector', 'Sony projector\r\n', 2),
(6, 'Hoe', 'Azada', 4),
(7, 'Home cinema', 'With subwoofer', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `idCategory` int(11) NOT NULL,
  `categoryName` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`idCategory`, `categoryName`) VALUES
(1, 'Tools'),
(2, 'Technology'),
(3, 'Vehicles'),
(4, 'Gardening');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hires`
--

CREATE TABLE `hires` (
  `idHire` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `idArticle` int(11) NOT NULL,
  `startingDate` date NOT NULL,
  `returnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `hires`
--

INSERT INTO `hires` (`idHire`, `username`, `idArticle`, `startingDate`, `returnDate`) VALUES
(1, 'peru', 2, '2019-05-01', '2019-05-04'),
(2, 'ana', 1, '2019-05-13', '2019-05-31'),
(3, 'ana', 2, '2019-05-09', '2019-05-12'),
(4, 'ana', 4, '2019-10-23', '2019-10-02'),
(5, 'peru', 3, '2019-09-16', '2019-09-30'),
(6, 'iker', 4, '2019-04-25', '2019-05-04'),
(7, 'peru', 5, '2019-07-11', '2019-07-22'),
(8, 'ana', 7, '2019-05-21', NULL),
(13, 'peru', 6, '2019-08-22', NULL),
(14, 'iker', 4, '2019-04-27', '2019-06-20'),
(15, 'peru', 5, '2019-05-22', '2019-05-28'),
(16, 'ana', 7, '2019-05-21', NULL),
(17, 'peru', 2, '2019-03-12', '2019-03-17'),
(18, 'ana', 1, '2019-05-20', '0000-00-00'),
(19, 'ana', 2, '2019-05-09', '2019-05-12'),
(20, 'ana', 4, '2019-03-11', '2019-05-19'),
(21, 'peru', 3, '2019-05-16', '2019-05-19'),
(22, 'iker', 6, '2019-09-26', NULL),
(23, 'iker', 5, '2019-02-03', '2019-03-06'),
(24, 'iker', 3, '2019-08-01', '2019-09-02'),
(25, 'iker', 3, '2019-05-31', '2019-06-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `tel` varchar(50) COLLATE utf8_bin NOT NULL,
  `keyWord` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `password`, `tel`, `keyWord`) VALUES
('ana', '1234', '900800700', 'practice'),
('iker', '1234', '900654236', 'practice'),
('peru', '1234', '900600700', 'practice');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indices de la tabla `hires`
--
ALTER TABLE `hires`
  ADD PRIMARY KEY (`idHire`),
  ADD KEY `username` (`username`),
  ADD KEY `article` (`idArticle`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `hires`
--
ALTER TABLE `hires`
  MODIFY `idHire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`idCategory`);

--
-- Filtros para la tabla `hires`
--
ALTER TABLE `hires`
  ADD CONSTRAINT `hires_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hires_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `articles` (`idArticle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
