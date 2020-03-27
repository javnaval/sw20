-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2020 a las 20:43:04
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Usuario con todos los privilegios: 'sounday'
-- Constraseña: sounday2020
-- Base de datos: 'sounday'

-- --------------------------------------------------------


CREATE USER IF NOT EXISTS 'sounday'@'%' IDENTIFIED VIA mysql_native_password USING 'sounday2020';
GRANT ALL PRIVILEGES ON *.* TO 'sounday'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `sounday`;GRANT ALL PRIVILEGES ON `sounday`.* TO 'sounday'@'%';

USE `sounday`;

--
-- Estructura de tabla para la tabla `albums`
--


CREATE TABLE `albums` (
  `id` int(15) NOT NULL,
  `releaseDate` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `idArtist` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id`, `releaseDate`, `title`, `idArtist`) VALUES
(1, '1967-04-28', 'Happy Together', 3),
(2, '2018-11-08', 'Breach', 2),
(3, '1996-02-23', 'Agila', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`id`, `name`, `genre`) VALUES
(1, 'Extremoduro', 'Rock'),
(2, 'Lewis Capaldi', 'Pop'),
(3, 'The turtles', 'Pop rock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

CREATE TABLE `songs` (
  `id` int(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  `duration` time NOT NULL,
  `played` bigint(100) NOT NULL,
  `idUser` int(15) NOT NULL,
  `idArtist` int(15) NOT NULL,
  `idAlbum` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`id`, `title`, `duration`, `played`, `idUser`, `idArtist`, `idAlbum`) VALUES
(1, 'Happy Together', '00:02:54', 0, 1, 3, 1),
(2, 'Someone you loved', '00:03:01', 0, 1, 2, 2),
(3, 'So payaso', '00:04:38', 0, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `user` varchar(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `name`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'user', NULL, NULL, NULL, 'pp@pepe.com', 'pass'),
(2, 'user1', NULL, NULL, NULL, 'tt@gmail.com', 'pass1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artistAlbum` (`idArtist`);

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`idArtist`),
  ADD KEY `album` (`idAlbum`),
  ADD KEY `user` (`idUser`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `artistAlbum` FOREIGN KEY (`idArtist`) REFERENCES `artists` (`id`);

--
-- Filtros para la tabla `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `album` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artist` FOREIGN KEY (`idArtist`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
