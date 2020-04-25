
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `password`, `rol`, `descripcion`) VALUES
(1, 'user', 'pp@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'usuario', NULL),
(2, 'user1', 'tt@gmail.com', '$2y$10$sWiXnfqwSJfGFkRistH6cePGuxXf1QbFWNxIdilAeIlmNhYGbn/sa', 'usuario', NULL),
(3, 'premium', 'premium@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'premium', NULL),
(4, 'artista', 'artista@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'artista', 'Descripcion de artista'),
(5, 'gestor', 'gestor@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'gestor', NULL),
(6, 'admin', 'admin@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'administrador', NULL);

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id`, `idArtist`, `title`, `releaseDate`) VALUES
(1, 4, 'album1', '2020-04-01'),
(2, 4, 'album2', '2020-04-02'),
(3, 4, 'album3', '2020-04-03');

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `idUser`, `title`, `texto`) VALUES
(1, 4, 'Noticia 1', 'Texto de noticia 1'),
(2, 4, 'Noticia 2', 'Texto de noticia 2');

--
-- Volcado de datos para la tabla `playlists`
--

INSERT INTO `playlists` (`id`, `idUser`, `title`) VALUES
(1, 3, 'playlist1'),
(2, 1, 'playlist2');

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`id`, `idUser`, `idAlbum`, `title`, `duration`, `played`) VALUES
(1, 4, 1, 'cancion11', '00:05:45', 5),
(2, 4, 2, 'cancion22', '00:03:46', 57),
(3, 4, 3, 'cancion33', '00:02:25', 12),
(4, 4, NULL, 'cancion0', '00:03:42', 34);

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`idSong`, `idPlaylist`) VALUES
(1, 1),
(2, 1),
(4, 1),
(4, 2),
(3, 2);



