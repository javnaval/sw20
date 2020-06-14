-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2020 a las 18:28:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sounday`
--

/* Usuario con todos los privilegios: 'sounday' */
/* Constraseña: sounday2020 */
/* Base de datos: 'sounday' */

CREATE USER IF NOT EXISTS 'sounday'@'%' IDENTIFIED VIA mysql_native_password USING '*54790E3CED1D1BF1B1E1C8A54AE8F7C3899F7FD8';
GRANT USAGE ON *.* TO 'sounday'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `sounday`;
GRANT ALL PRIVILEGES ON `sounday`.* TO 'sounday'@'%';

-- --------------------------------------------------------

USE `sounday`;

DROP TABLE IF EXISTS `comentarios`;
DROP TABLE IF EXISTS `foros`;
DROP TABLE IF EXISTS `meGustacomentarios`;
DROP TABLE IF EXISTS `seguidores`;
DROP TABLE IF EXISTS `contiene`;
DROP TABLE IF EXISTS `songs`;
DROP TABLE IF EXISTS `playlists`;
DROP TABLE IF EXISTS `noticias`;
DROP TABLE IF EXISTS `albums`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `descargas`;


--
-- Estructura de tabla para la tabla `meGustaComentarios`
--

CREATE TABLE `meGustacomentarios` (
  `idUser` int(11) NOT NULL,
  `idComentarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros`
--

CREATE TABLE `foros` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSong` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargas`
--

CREATE TABLE `descargas` (
  `idUser` int(11) NOT NULL,
  `idSong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `idArtist` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `releaseDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `idSong` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `accepted` boolean NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idAlbum` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `played` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(80) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `solicitado` boolean NOT NULL,
  `bloqueado` boolean NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--


CREATE TABLE `seguidores` (
  `idUser` int(11) NOT NULL,
  `idSeguidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--


CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSong` int(11) NOT NULL,
  `texto` text DEFAULT NULL,
  `MeGusta` bigint(100)  DEFAULT NULL,
  `Respuesta` int(11) NOT NULL,
  `idForo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `meGustacomentarios`
--
ALTER TABLE `meGustacomentarios`
  ADD KEY `meGustacomentarios_ibfk_1` (`idUser`),
  ADD KEY `idComentarios` (`idComentarios`);

--
-- Indices de la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD KEY `descargas_ibfk_1` (`idUser`),
  ADD KEY `idSong` (`idSong`);

--
-- Indices de la tabla `foros`
--
ALTER TABLE `foros`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `idArtist` (`idArtist`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD KEY `contiene_ibfk_1` (`idPlaylist`),
  ADD KEY `idSong` (`idSong`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs_ibfk_1` (`idAlbum`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idSong` (`idSong`);

--
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idSeguidor` (`idSeguidor`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meGustacomentarios`
--
ALTER TABLE `meGustacomentarios`
  ADD PRIMARY KEY( `idUser`, `idComentarios`);

--
-- Indices de la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD PRIMARY KEY( `idUser`, `idSong`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY( `idSong`, `idPlaylist`);

--
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY( `idUser`, `idSeguidor`);



--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `foros`
--
ALTER TABLE `foros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--


--
-- Filtros para la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD CONSTRAINT `descargas_ibfk_1` FOREIGN KEY (`idSong`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `descargas_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`idArtist`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`idPlaylist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`idSong`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idSong`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `meGustacomentarios`
--
ALTER TABLE `meGustacomentarios`
  ADD CONSTRAINT `meGustacomentarios_ibfk_1` FOREIGN KEY (`idComentarios`) REFERENCES `comentarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meGustacomentarios_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`idSeguidor`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
