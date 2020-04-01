--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id`, `releaseDate`, `title`, `idArtist`) VALUES
(1, '1967-04-28', 'Happy Together', 3),
(2, '2018-11-08', 'Breach', 2),
(3, '1996-02-23', 'Agila', 1);

---------------------------------------------

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`id`, `name`, `genre`) VALUES
(1, 'Extremoduro', 'Rock'),
(2, 'Lewis Capaldi', 'Pop'),
(3, 'The turtles', 'Pop rock');


---------------------------------------------

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`id`, `title`, `duration`, `played`, `idUser`, `idArtist`, `idAlbum`) VALUES
(1, 'Happy Together', '00:02:54', 0, 1, 3, 1),
(2, 'Someone you loved', '00:03:01', 0, 1, 2, 2),
(3, 'So payaso', '00:04:38', 0, 1, 1, 3);


---------------------------------------------

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `name`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'user', NULL, NULL, NULL, 'pp@pepe.com', 'pass'),
(2, 'user1', NULL, NULL, NULL, 'tt@gmail.com', 'pass1');