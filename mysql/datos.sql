
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `name`, `email`, `password`, `rol`, `descripcion`) VALUES
(1, 'user', 'user', 'pp@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'usuario', NULL),
(2, 'user1', 'user1', 'tt@gmail.com', '$2y$10$sWiXnfqwSJfGFkRistH6cePGuxXf1QbFWNxIdilAeIlmNhYGbn/sa', 'usuario', NULL),
(3, 'premium', 'premium', 'premium@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'premium', NULL),
(4, 'artista', 'artista', 'artista@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'artista', 'Descripcion de artista'),
(5, 'gestor', 'gestor', 'gestor@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'gestor', NULL),
(6, 'admin', 'admin', 'admin@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'administrador', NULL),
(7, 'extremoduro', 'Extremoduro', 'extremo@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'artista', 'Grupo español de rock'),
(8, 'capaldi', 'Lewis Capaldi', 'l.capaldi@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'artista', NULL),
(9, 'turtles', 'The Turtles', 'turtles@gmail.com', '$2y$10$.fO4ow1Ptq.WgAzVjCZQA.S5iPtdHi.pbRjLuAWw6gYF5Qu/01d0e', 'artista', NULL);

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id`, `idArtist`, `title`, `releaseDate`) VALUES
(1, 7, 'Agila', '1967-04-28'),
(2, 8, 'Breach', '2018-11-08'),
(3, 9, 'Happy Together', '1996-02-23');

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `idUser`, `title`, `texto`, `accepted`) VALUES
(1, 4, 'Noticia 1', 'Texto de noticia 1', 1),
(2, 4, 'Noticia 2', 'Texto de noticia 2', 0),
(3, 7, 'Noticia 3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.', 1),
(4, 9, 'Noticia 4', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.', 0);

--
-- Volcado de datos para la tabla `playlists`
--

INSERT INTO `playlists` (`id`, `idUser`, `title`) VALUES
(1, 3, 'playlist1'),
(2, 1, 'playlist2');

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`id`, `idUser`, `idAlbum`, `title`, `played`) VALUES
(1, 9, 3, 'Happy Together', 0),
(2, 8, 2, 'Someone you loved', 0),
(3, 7, 1, 'So payaso', 0);

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`idSong`, `idPlaylist`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(3, 2);



