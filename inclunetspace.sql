-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2024 a las 05:01:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inclunetspace`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `ubicacion` varchar(150) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `imagen_evento` varchar(255) NOT NULL,
  `id_organizacion` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizaciones`
--

CREATE TABLE `organizaciones` (
  `id` int(11) NOT NULL,
  `nombre_organizacion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `tipo_usuario` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `organizaciones`
--

INSERT INTO `organizaciones` (`id`, `nombre_organizacion`, `telefono`, `correo`, `contrasenia`, `tipo_usuario`, `created_at`) VALUES
(1, 'dejando huellas', '9983544140', 'cristal@gmail.com', '$2y$10$TAxypRFSKZ8VmQKSI7FwUOg.xaD0KlNiPYjUJrnYfsJ2dywoEs./G', NULL, '2024-11-20 04:20:56'),
(2, 'karlacorp', '01297381232', 'karla@gmail.com', '$2y$10$SgdNoKqJcltzdkvqlI6nPuCfPVPL2O/ApFBdUgSK9or.dfp8jklfK', NULL, '2024-11-20 17:22:27'),
(3, 'karlacorp', '01297381232', 'alexi@gmail.com', '$2y$10$ollHEschjyM4LrmAXsdeJejkfUFa2CcfctpYBW6BkiTmYDBvm.EbC', NULL, '2024-11-20 17:23:59'),
(4, 'mxoiadjxpoad', '1232445465', 'galeana@gmial.com', '$2y$10$dTBesxBTL19zVf7oa3hmqOiP/urhklShiCv6mAgduYp/BkTuWuI5u', 'organizacion', '2024-11-20 18:33:35'),
(5, 'cskmcns', '1232445465', 'csdcss@gmial.com', '$2y$10$oNPX4Rj7qUA.lS6TyrIcjONWA9Sxkw.L4E8C4DnTNFerNIQ45qczC', 'organizacion', '2024-11-20 18:40:44'),
(6, 'rata', '9191212021', 'rata@gmail.com', '$2y$10$1HLmCaspQqG72eczDrebkOyJkdtO6e78DTEdRLQzzt4HnJ4PyIx1y', 'organizacion', '2024-11-20 20:06:28'),
(7, 'natycorp', '123456789', 'naty@gmail.com', '$2y$10$JfKVMZAIS4XSWGtKKKJ9l.3RaAMwA7KPIFTjiCJz8tflAGr.Cs.yS', 'organizacion', '2024-11-21 20:06:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntarios`
--

CREATE TABLE `voluntarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `tipo_usuario` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `voluntarios`
--

INSERT INTO `voluntarios` (`id`, `username`, `nombres`, `apellidos`, `correo`, `contrasenia`, `tipo_usuario`, `created_at`) VALUES
(5, 'russy', 'Russell Alecio ', 'Sanchez Ake', 'rusel_1244@outlook.com', '$2y$10$2I5q6Pl4ROMrSTY9dyx0BOBnCgqgh6DVKjgJfI.d3jpLNvTo3e1yK', NULL, '2024-11-15 20:30:15'),
(6, 'alxis89', 'carl', 'juarez ', 'angel@gmail.com', '$2y$10$AIeHT3QQOtQVp3Ml3EYbg.hLK/gjvr4qgvNSVJAxQkO8UX13KgnMK', NULL, '2024-11-15 21:34:27'),
(7, 'holasoyyo', 'angel', 'angel', 'cristal@gmail.com', '$2y$10$..f1SKCJ2b87v2sHfbc0nuIhMFGKvY84.nyFJzZxtbTj8J0rDmyk6', NULL, '2024-11-20 04:25:47'),
(8, 'wedwedwe', 'dwedwe', 'dwedwe', 'perro@gmail.com', '$2y$10$Eu1uQUzXimds6pz3.fuE8.3ogtaWFbfxXjSaTh/d5UPjiBNfCnVDe', NULL, '2024-11-20 04:53:52'),
(9, 'karlangas', 'karla guadalupe', 'salguero solorzano', 'karla@gmail.com', '$2y$10$nxYy7KDkPqqv/WvlfBHPIeon8oeMCm7ExmXFOW.4tD2LV450zfH.u', NULL, '2024-11-20 17:23:30'),
(10, 'karlangas', 'karla guadalupe', 'salguero solorzano', 'alexi@gmail.com', '$2y$10$texBYh.iJkxeDBTlzgH1s.nchwv6NKcNjWKIbtl7TbMn5q.lz/vZW', NULL, '2024-11-20 17:23:52'),
(11, 'valeriana', 'valeria jimenes', 'lopez', 'viudas@gmail.com', '$2y$10$5wvPxErAv7H6FneD8AsMZehUh27pSTK7te/zjFZsyUa4UuMr3xqlK', NULL, '2024-11-20 17:31:35'),
(12, 'oijdciusndiovs', 'galeana', 'hernandez ', 'galeana@gmial.com', '$2y$10$1ElhmgdkQ1xT0872NM378emluOAdVYEYexmvRBUstPI60rLGiciBm', 'voluntario', '2024-11-20 18:36:34'),
(14, 'oogvs', 'galeana', 'hernandez ', 'ghysizas@gmial.com', '$2y$10$ksSYJoOKC1DW8ZfkWVla..IC0rPOm0XTVdJtgg0EOlq5THd5Fd3sO', 'voluntario', '2024-11-20 18:37:21'),
(15, 'rata', 'ivania', 'texna', 'rata@gmail.com', '$2y$10$wDYfbEwyyIE.1tZiyCavvup19RpbkxAWQ91uyX17Y6DKdzCHW5Ylm', 'voluntario', '2024-11-20 20:06:20'),
(16, 'naty ', 'angy natali', 'herrera', 'naty@gmail.com', '$2y$10$vO4vR.rTApgYdzryhNdi/eq5y7m65jGxGrdTOjyCOx/DeBPbrmwTC', 'voluntario', '2024-11-21 20:10:05'),
(17, 'villareal', 'enrique', 'villada', 'villada@gmial.com', '$2y$10$cf0zQJI.qDw7/M0yF6O0VuuBq5/wAklP5rqUFhTrwpgftOnYHHNma', 'voluntario', '2024-11-21 20:11:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_organizacion` (`id_organizacion`);

--
-- Indices de la tabla `organizaciones`
--
ALTER TABLE `organizaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `organizaciones`
--
ALTER TABLE `organizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `voluntarios`
--
ALTER TABLE `voluntarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_organizacion`) REFERENCES `organizaciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
