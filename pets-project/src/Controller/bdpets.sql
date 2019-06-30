-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2019 a las 02:55:50
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdpets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anunciopet`
--

CREATE TABLE `anunciopet` (
  `idanuncio` int(11) NOT NULL,
  `idtipofk` int(11) NOT NULL,
  `idcatefk` int(11) NOT NULL,
  `iduserfk` int(11) NOT NULL,
  `idcantonfk` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `imag1` longblob NOT NULL,
  `img2` longblob NOT NULL,
  `img3` longblob NOT NULL,
  `img4` longblob NOT NULL,
  `img5` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantones`
--

CREATE TABLE `cantones` (
  `idcanton` int(11) NOT NULL,
  `nomcanton` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idprovifk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cantones`
--

INSERT INTO `cantones` (`idcanton`, `nomcanton`, `idprovifk`) VALUES
(1, 'CUENCA', 1),
(2, 'GIRÓN', 1),
(3, 'GUALACEO', 1),
(4, 'NABÓN', 1),
(5, 'PAUTE', 1),
(6, 'PUCARÁ', 1),
(7, 'SAN FERNANDO', 1),
(8, 'SANTA ISABEL', 1),
(9, 'SIGSIG', 1),
(10, 'OÑA', 1),
(11, 'CHORDELEG', 1),
(12, 'EL PAN', 1),
(13, 'SEVILLA DE ORO', 1),
(14, 'GUACHAPALA', 1),
(15, 'CAMILO PONCE ENRÍQUEZ', 1),
(16, 'GUARANDA', 2),
(17, 'CALUMA', 2),
(18, 'CHILLANES', 2),
(19, 'CHIMBO', 2),
(20, 'ECHEANDÍA', 2),
(21, 'LAS NAVES', 2),
(22, 'SAN MIGUEL', 2),
(23, 'AZOGUES', 3),
(24, 'BIBLIÁN', 3),
(25, 'CAÑAR', 3),
(26, 'LA TRONCAL', 3),
(27, 'EL TAMBO', 3),
(28, 'DELEG', 3),
(29, 'SUSCAL', 3),
(30, 'TULCÁN', 4),
(31, 'BOLIVAR', 4),
(32, 'ESPEJO', 4),
(33, 'MIRA', 4),
(34, 'MONTÚFAR', 4),
(35, 'SAN PEDRO DE HUACA', 4),
(36, 'LATACUNGA', 5),
(37, 'LA MANÁ', 5),
(38, 'PANGUA', 5),
(39, 'PUJILÍ', 5),
(40, 'SALCEDO', 5),
(41, 'SAQUISILÍ', 5),
(42, 'SIGCHOS', 5),
(43, 'RIOBAMBA', 6),
(44, 'ALAUSÍ', 6),
(45, 'CHAMBO', 6),
(46, 'CHUNCHI', 6),
(47, 'COLTA', 6),
(48, 'CUMANDÁ', 6),
(49, 'GUAMOTE', 6),
(50, 'GUANO', 6),
(51, 'PALLATANGA', 6),
(52, 'PENIPE', 6),
(53, 'MACHALA', 7),
(54, 'ARENILLAS', 7),
(55, 'ATHAUALPA', 7),
(56, 'BALSAS', 7),
(57, 'CHILLA', 7),
(58, 'EL GUABO', 7),
(59, 'HUAQUILLAS', 7),
(60, 'LAS LAJAS', 7),
(61, 'MARCABELÍ', 7),
(62, 'PASAJE', 7),
(63, 'PIÑAS', 7),
(64, 'PORTOVELO', 7),
(65, 'SANTA ROSA', 7),
(66, 'ZARUMA', 7),
(67, 'ESMERALDAS', 8),
(68, 'ATACAMES', 8),
(69, 'ELOY  ALFARO', 8),
(70, 'MUISNE', 8),
(71, 'QUINIDÉ', 8),
(72, 'RIOVERDE', 8),
(73, 'SAN LORENZO', 8),
(74, 'GUAYAQUIL', 9),
(75, 'ALFREDO BAQUERIZO MORENO', 9),
(76, 'BALAO', 9),
(77, 'BALZAR', 9),
(78, 'COLIMES', 9),
(79, 'DAULE', 9),
(80, 'DURÁN', 9),
(81, 'EL EMPALME', 9),
(82, 'EL TRIUNFO', 9),
(83, 'GENERAL ANTONIO ELIZALDE', 9),
(84, 'ISIDRO AYORA', 9),
(85, 'LOMAS DE SARGENTILLO', 9),
(86, 'MARCELINO MARIDUEÑA', 9),
(87, 'MILAGRO', 9),
(88, 'NARANJAL', 9),
(89, 'NARANJITO', 9),
(90, 'NOBOL', 9),
(91, 'PALESTINA', 9),
(92, 'PEDRO CARBO', 9),
(93, 'PLAYAS', 9),
(94, 'SALITRE', 9),
(95, 'SAMBORONDÓN', 9),
(96, 'SANTA LUCIA', 9),
(97, 'SIMÓN BOLIVAR', 9),
(98, 'YAGUACHI', 9),
(99, 'IBARRA', 10),
(100, 'ANTONIO ANTE', 10),
(101, 'COTACACHI', 10),
(102, 'OTAVALO', 10),
(103, 'PAMAMPIRO', 10),
(104, 'LOJA', 11),
(105, 'CALVAS', 11),
(106, 'CATAMAYO', 11),
(107, 'CELICA', 11),
(108, 'CHAGUARPAMBA', 11),
(109, 'ESPÍNDOLA', 11),
(110, 'GONZANAMÁ', 11),
(111, 'MACARÁ', 11),
(112, 'OLMEDO', 11),
(113, 'PALTAS', 11),
(114, 'PINDAL', 11),
(115, 'PUYANGO', 11),
(116, 'QUILANGA', 11),
(117, 'SARAGURO', 11),
(118, 'SOZORANGA', 11),
(119, 'ZAPOTILLO', 11),
(120, 'BABAHOYO', 12),
(121, 'BABA', 12),
(122, 'BUENA FE', 12),
(123, 'MOCACHE', 12),
(124, 'MONTALVO', 12),
(125, 'PALENQUE', 12),
(126, 'PUEBLO VIEJO', 12),
(127, 'QUEVEDO', 12),
(128, 'QUINSALOMA', 12),
(129, 'URDANETA', 12),
(130, 'VALENCIA', 12),
(131, 'VENTANAS', 12),
(132, 'VINCES', 12),
(133, 'PORTOVIEJO', 13),
(134, '24 DE MAYO', 13),
(135, 'BOLIVAR', 13),
(136, 'CHONE', 13),
(137, 'EL CARMEN', 13),
(138, 'FLAVIO ALFARO', 13),
(139, 'JAMA', 13),
(140, 'JARAMIJÓ', 13),
(141, 'JIPIJAPA', 13),
(142, 'JUNÍN', 13),
(143, 'MANTA', 13),
(144, 'MONTECRISTI', 13),
(145, 'OLMEDO', 13),
(146, 'PAJÁN', 13),
(147, 'PEDERNALES', 13),
(148, 'PICHINCHA', 13),
(149, 'PUERTO LÓPEZ', 13),
(150, 'ROCAFUERTE', 13),
(151, 'SAN VICENTE', 13),
(152, 'SANTA ANA', 13),
(153, 'SUCRE', 13),
(154, 'TOSAGUA', 13),
(155, 'MORONA', 14),
(156, 'GUALAPIZA', 14),
(157, 'HUAMBOYA', 14),
(158, 'LIMÓN INDANZA', 14),
(159, 'LOGROÑO', 14),
(160, 'PABLO SEXTO', 14),
(161, 'PALORA', 14),
(162, 'SAN JUAN BOSCO', 14),
(163, 'SANTIAGO DE MÉNDEZ', 14),
(164, 'SUCÚA', 14),
(165, 'TAISHA', 14),
(166, 'TIWINTZA', 14),
(167, 'TENA', 15),
(168, 'ARCHIDONA', 15),
(169, 'CARLOS JULIO AROSEMENA TOLA', 15),
(170, 'EL CHACO', 15),
(171, 'QUIJOS', 15),
(172, 'PASTAZA', 16),
(173, 'ARAUJO', 16),
(174, 'MERA', 16),
(175, 'SANTA CLARA', 16),
(176, 'QUITO', 17),
(177, 'CAYAMBE', 17),
(178, 'MEJÍA', 17),
(179, 'PEDRO MONCAYO', 17),
(180, 'RUMIÑAHUI', 17),
(181, 'SAN MIGUEL DE LOS BANCOS', 17),
(182, 'PEDRO VICENTE MALDONADO', 17),
(183, 'PUERTO QUITO', 17),
(184, 'AMBATO', 18),
(185, 'BAÑOS', 18),
(186, 'CEVALLOS', 18),
(187, 'MOCHA', 18),
(188, 'PATATE', 18),
(189, 'PELILEO', 18),
(190, 'QUERO', 18),
(191, 'SANTIAGO DE PÍLLARO', 18),
(192, 'TISALEO', 18),
(193, 'ZAMORA', 19),
(194, 'CENTINELA DEL CÓNDOR', 19),
(195, 'CHINCHIPE', 19),
(196, 'EL PANGUI', 19),
(197, 'NANGARITZA', 19),
(198, 'PALANDA', 19),
(199, 'PAQUISHA', 19),
(200, 'YACUAMBI', 19),
(201, 'YANTZAZA', 19),
(202, 'SAN CRISTÓBAL', 20),
(203, 'ISABELA', 20),
(204, 'SANTA CRUZ', 20),
(205, 'LAGO AGRIO', 21),
(206, 'CASCALES', 21),
(207, 'CUYABENO', 21),
(208, 'GONZALO PIZARRO', 21),
(209, 'PUTUMAYO', 21),
(210, 'SHUSHUFINDI', 21),
(211, 'SUCUMBIOS', 21),
(212, 'FRANCISCO DE ORELLANA', 22),
(213, 'AGUARICO', 22),
(214, 'LA JOYA DE LOS SACHAS', 22),
(215, 'LORETO', 22),
(216, 'SANTO DOMINGO DE LOS COLORADOS', 23),
(217, 'LA CONCORDIA', 23),
(218, 'SANTA ELENA', 24),
(219, 'LA LIBERTAD', 24),
(220, 'SALINAS', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catepet`
--

CREATE TABLE `catepet` (
  `idcategoria` int(11) NOT NULL,
  `descripet` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `catepet`
--

INSERT INTO `catepet` (`idcategoria`, `descripet`) VALUES
(1, 'CANINOS'),
(2, 'FELINOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `idchat` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatdetalle`
--

CREATE TABLE `chatdetalle` (
  `idchatdetalle` int(11) NOT NULL,
  `idchatfk` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `mensaje` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `leido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `idprovi` int(11) NOT NULL,
  `nomprovi` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`idprovi`, `nomprovi`) VALUES
(1, 'AZUAY'),
(2, 'BOLIVAR'),
(3, 'CAÑAR'),
(4, 'CARCHI'),
(5, 'COTOPAXI'),
(6, 'CHIMBORAZO'),
(7, 'EL ORO'),
(8, 'ESMERALDAS'),
(9, 'GUAYAS'),
(10, 'IMBABURA'),
(11, 'LOJA'),
(12, 'LOS  RIOS'),
(13, 'MANABÍ'),
(14, 'MORONA SANTIAGO'),
(15, 'NAPO'),
(16, 'PASTAZA'),
(17, 'PICHINCHA'),
(18, 'TUNGURAHUA'),
(19, 'ZAMORA CHINCHIPE'),
(20, 'GALÁPAGOS'),
(21, 'SUCUMBIOS'),
(22, 'ORELLANA'),
(23, 'SANTO DOMINGO DE LOS TSÁCHILAS'),
(24, 'SANTA ELENA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoanuncio`
--

CREATE TABLE `tipoanuncio` (
  `idtipo` int(11) NOT NULL,
  `descritipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipoanuncio`
--

INSERT INTO `tipoanuncio` (`idtipo`, `descritipo`) VALUES
(1, 'ADOPTAR'),
(2, 'REPORTAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser` int(11) NOT NULL,
  `nomuser` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apeuser` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `emailuser` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telfuser` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `passuser` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `idcantonfk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anunciopet`
--
ALTER TABLE `anunciopet`
  ADD PRIMARY KEY (`idanuncio`),
  ADD KEY `idcatefk` (`idcatefk`),
  ADD KEY `idtipofk` (`idtipofk`),
  ADD KEY `iduserfk` (`iduserfk`),
  ADD KEY `idcantonfk` (`idcantonfk`);

--
-- Indices de la tabla `cantones`
--
ALTER TABLE `cantones`
  ADD PRIMARY KEY (`idcanton`),
  ADD KEY `idprovifk` (`idprovifk`);

--
-- Indices de la tabla `catepet`
--
ALTER TABLE `catepet`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idchat`),
  ADD KEY `de` (`de`),
  ADD KEY `para` (`para`);

--
-- Indices de la tabla `chatdetalle`
--
ALTER TABLE `chatdetalle`
  ADD PRIMARY KEY (`idchatdetalle`),
  ADD KEY `idchatfk` (`idchatfk`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`idprovi`);

--
-- Indices de la tabla `tipoanuncio`
--
ALTER TABLE `tipoanuncio`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `idcantonfk` (`idcantonfk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anunciopet`
--
ALTER TABLE `anunciopet`
  MODIFY `idanuncio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cantones`
--
ALTER TABLE `cantones`
  MODIFY `idcanton` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT de la tabla `catepet`
--
ALTER TABLE `catepet`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chatdetalle`
--
ALTER TABLE `chatdetalle`
  MODIFY `idchatdetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `idprovi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tipoanuncio`
--
ALTER TABLE `tipoanuncio`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anunciopet`
--
ALTER TABLE `anunciopet`
  ADD CONSTRAINT `anunciopet_ibfk_1` FOREIGN KEY (`idcatefk`) REFERENCES `catepet` (`idcategoria`),
  ADD CONSTRAINT `anunciopet_ibfk_2` FOREIGN KEY (`idtipofk`) REFERENCES `tipoanuncio` (`idtipo`),
  ADD CONSTRAINT `anunciopet_ibfk_3` FOREIGN KEY (`iduserfk`) REFERENCES `usuarios` (`iduser`),
  ADD CONSTRAINT `anunciopet_ibfk_4` FOREIGN KEY (`idcantonfk`) REFERENCES `cantones` (`idcanton`);

--
-- Filtros para la tabla `cantones`
--
ALTER TABLE `cantones`
  ADD CONSTRAINT `cantones_ibfk_1` FOREIGN KEY (`idprovifk`) REFERENCES `provincias` (`idprovi`);

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`de`) REFERENCES `usuarios` (`iduser`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`para`) REFERENCES `usuarios` (`iduser`);

--
-- Filtros para la tabla `chatdetalle`
--
ALTER TABLE `chatdetalle`
  ADD CONSTRAINT `chatdetalle_ibfk_1` FOREIGN KEY (`idchatfk`) REFERENCES `chat` (`idchat`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idcantonfk`) REFERENCES `cantones` (`idcanton`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
