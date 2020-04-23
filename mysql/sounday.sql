-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2020 a las 17:58:38
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `idArtist` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `releaseDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id`, `idArtist`, `title`, `releaseDate`) VALUES
(1, 4, 'album1', '2020-04-01'),
(2, 4, 'album2', '2020-04-02'),
(3, 4, 'album3', '2020-04-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

DROP TABLE IF EXISTS `contiene`;
CREATE TABLE `contiene` (
  `idSong` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`idSong`, `idPlaylist`) VALUES
(1, 1),
(2, 1),
(4, 1),
(4, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `idUser`, `title`, `texto`) VALUES
(1, 4, 'Noticia 1', 'Texto de noticia 1'),
(2, 4, 'Noticia 2', 'Texto de noticia 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlists`
--

DROP TABLE IF EXISTS `playlists`;
CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `playlists`
--

INSERT INTO `playlists` (`id`, `idUser`, `title`) VALUES
(1, 3, 'playlist1'),
(2, 1, 'playlist2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idAlbum` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `duration` time NOT NULL,
  `played` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`id`, `idUser`, `idAlbum`, `title`, `duration`, `played`) VALUES
(1, 4, 1, 'cancion11', '00:05:45', 5),
(2, 4, 2, 'cancion22', '00:03:46', 57),
(3, 4, 3, 'cancion33', '00:02:25', 12),
(4, 4, NULL, 'cancion0', '00:03:42', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(80) NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `password`, `rol`) VALUES
(1, 'user', 'pp@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'usuario'),
(2, 'user1', 'tt@gmail.com', '$2y$10$sWiXnfqwSJfGFkRistH6cePGuxXf1QbFWNxIdilAeIlmNhYGbn/sa', 'usuario'),
(3, 'premium', 'premium@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'premium'),
(4, 'artista', 'artista@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'artista'),
(5, 'gestor', 'gestor@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'gestor'),
(6, 'admin', 'admin@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`idArtist`) REFERENCES `usuarios` (`id`);

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
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`idAlbum`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
