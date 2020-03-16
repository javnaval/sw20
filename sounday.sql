-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2020 a las 13:06:34
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

--
-- Usuario con todos los privilegios: 'sounday'
-- Constraseña: sounday2020
-- Base de datos: 'sounday'
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `artista` varchar(25) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`artista`, `genero`, `descripcion`) VALUES
('Extremoduro', 'Rock', 'Extremoduro es un grupo español de rock fundado por Roberto Iniesta en la ciudad extremeña de Plasencia en 1987.​ Ellos mismos han definido su estilo como rock transgresivo, basado en un rock duro agresivo y sucio con letras explícitas que tratan temas terrenales y marginales —como el sexo, las drogas y el amor— en contraste con frecuentes alusiones poéticas. Con el tiempo, la poesía acabó predominando aún más en la lírica mientras que la composición musical se acercó al rock progresivo y sinfónico.'),
('Lewis Capaldi', 'Pop', 'Lewis Capaldi es un cantante y compositor que nació el 7 de octubre de 1996 en una localidad de Escocia, ubicada entre Glasgow y Edimburgo, la cual lleva por nombre Whitburn. Es un artista que en poco tiempo ha logrado acumular grandes éxitos gracias a su gerente Ryan Walter, ubicándose en el primer lugar de la lista de ventas en el Reino Unido. Desde que hizo público el tema con el que realizó su debut su carrera va en ascenso.'),
('The turtles', 'Pop rock', 'Uno de los mejores grupos pop y folk rock estadounidenses surgidos en los años 60.\r\nLos Turtles se crearon en la ciudad californiana de Los Ángeles en 1964 por varios amigos del instituto Westchester High que ya estaban tocando música surf en una banda denominada The Nightriders.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `cancion` varchar(20) NOT NULL,
  `artista` varchar(25) NOT NULL,
  `album` varchar(30) NOT NULL,
  `user` varchar(15) NOT NULL,
  `ruta` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`cancion`, `artista`, `album`, `user`, `ruta`) VALUES
('Happy together', 'The turtles', 'Happy together', 'user', 'img\\Happy Together.mp3'),
('So payaso', 'Extremoduro', 'Agila', 'user1', 'img\\So Payaso.mp3'),
('Someone you loved', 'Lewis Capaldi', 'Divinely Uninspired To A Helli', 'user', 'img\\Someone You Loved.mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user`, `password`, `email`) VALUES
('user', 'pass', 'pp@pepe.com'),
('user1', 'pass1', 'tt@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`artista`);

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`cancion`,`artista`,`album`,`user`),
  ADD UNIQUE KEY `audio` (`ruta`) USING HASH,
  ADD KEY `usuarioCancion` (`user`),
  ADD KEY `artista` (`artista`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `artista` FOREIGN KEY (`artista`) REFERENCES `artistas` (`artista`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioCancion` FOREIGN KEY (`user`) REFERENCES `usuarios` (`user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
