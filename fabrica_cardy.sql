-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2026 a las 01:05:02
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
-- Base de datos: `fabrica_cardy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `documento` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `telefono`, `correo`, `ciudad`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'Conn, Abernathy and Morar', '693891647-9', '3789255222', 'citlalli13@harvey.com', 'Barranquilla', 'Cl 70 #81-89', '2023-10-29 07:46:56', '2026-06-01 17:39:50'),
(2, 'Bednar, Schulist and Stiedemann', '120806604-0', '3128813247', 'rath.kamron@sporer.com', 'Armenia', 'Cl 80 #58-43', '2026-05-29 08:16:47', '2026-06-01 17:39:50'),
(3, 'Brekke and Sons', '159929093-8', '3531916173', 'moises.bogan@price.info', 'Bucaramanga', 'Cl 97 #84-64', '2026-05-05 18:40:15', '2026-06-01 17:39:50'),
(4, 'Lockman Group', '095286007-4', '3318680355', 'nskiles@kozey.net', 'Barranquilla', 'Cl 71 #86-6', '2023-08-15 03:02:14', '2026-06-01 17:39:50'),
(5, 'Walter, Considine and Purdy', '640265621-0', '3685677826', 'priscilla71@schmidt.org', 'Manizales', 'Cl 27 #64-31', '2025-03-11 12:41:22', '2026-06-01 17:39:50'),
(6, 'Roob-Feeney', '795962761-8', '3859664041', 'istroman@cole.com', 'Manizales', 'Cl 25 #30-50', '2025-02-11 11:28:54', '2026-06-01 17:39:50'),
(7, 'Bradtke and Sons', '349098928-7', '3549833066', 'trycia.paucek@hoeger.com', 'Barranquilla', 'Cl 70 #13-91', '2024-02-26 23:15:43', '2026-06-01 17:39:50'),
(8, 'Rolfson and Sons', '298310091-7', '3777308138', 'fgleichner@mraz.com', 'Bucaramanga', 'Cl 5 #37-97', '2026-04-11 14:26:26', '2026-06-01 17:39:50'),
(9, 'Wiegand LLC', '907787998-4', '3293833627', 'gkautzer@mayer.com', 'Ibagué', 'Cl 17 #43-57', '2023-06-02 23:58:58', '2026-06-01 17:39:50'),
(10, 'Wuckert, Champlin and Bartell', '988898585-1', '3464642756', 'lempi.trantow@mcglynn.info', 'Bucaramanga', 'Cl 40 #40-2', '2023-10-21 14:10:57', '2026-06-01 17:39:50'),
(11, 'Kuphal-Runolfsdottir', '771871199-3', '3073418451', 'ebert.andreane@aufderhar.com', 'Manizales', 'Cl 80 #63-47', '2025-06-22 15:35:44', '2026-06-01 17:39:50'),
(12, 'Champlin Ltd', '760806645-0', '3207599096', 'crona.melba@cormier.org', 'Cali', 'Cl 67 #82-7', '2025-04-08 16:04:15', '2026-06-01 17:39:50'),
(13, 'Crist, Streich and Gutmann', '111277318-5', '3026976806', 'powlowski.ida@wisozk.com', 'Bogotá', 'Cl 97 #60-38', '2024-01-12 02:56:55', '2026-06-01 17:39:50'),
(14, 'Bosco LLC', '034819951-8', '3711942622', 'xklein@upton.com', 'Bogotá', 'Cl 2 #86-47', '2023-06-25 16:36:40', '2026-06-01 17:39:50'),
(15, 'Okuneva PLC', '463395938-6', '3684742318', 'hobart.christiansen@batz.info', 'Barranquilla', 'Cl 94 #18-41', '2025-03-09 08:53:03', '2026-06-01 17:39:50'),
(16, 'Bradtke, Nienow and Lehner', '256545860-7', '3883605742', 'cristian.reinger@rogahn.com', 'Barranquilla', 'Cl 92 #79-5', '2024-03-25 11:57:19', '2026-06-01 17:39:50'),
(17, 'Harvey, Bailey and Kuhlman', '310523436-0', '3758668265', 'jamal.berge@cruickshank.net', 'Bucaramanga', 'Cl 93 #32-32', '2024-07-04 05:22:37', '2026-06-01 17:39:50'),
(18, 'Bruen PLC', '402913433-9', '3585484464', 'maryjane83@rath.com', 'Armenia', 'Cl 57 #73-52', '2024-11-15 10:08:16', '2026-06-01 17:39:50'),
(19, 'Feest-Wehner', '408340091-7', '3161255069', 'vglover@hackett.biz', 'Manizales', 'Cl 73 #50-52', '2024-02-14 22:42:19', '2026-06-01 17:39:50'),
(20, 'Grimes, Dibbert and Corkery', '242033350-0', '3385689800', 'roselyn.altenwerth@bashirian.com', 'Ibagué', 'Cl 19 #6-75', '2026-05-06 15:19:01', '2026-06-01 17:39:50'),
(21, 'Herman-Brakus', '126174265-6', '3601743395', 'senger.laney@simonis.com', 'Neiva', 'Cl 30 #42-78', '2024-12-09 04:33:56', '2026-06-01 17:39:50'),
(22, 'Buckridge LLC', '703115304-3', '3981792041', 'rempel.felicity@pagac.com', 'Pereira', 'Cl 40 #88-35', '2023-08-31 21:58:52', '2026-06-01 17:39:50'),
(23, 'Spencer LLC', '086476048-1', '3389337260', 'mroob@hamill.com', 'Barranquilla', 'Cl 81 #72-70', '2024-09-12 01:17:03', '2026-06-01 17:39:50'),
(24, 'Heidenreich, Johns and Ondricka', '214436492-1', '3637413101', 'ndenesik@donnelly.com', 'Pereira', 'Cl 3 #64-53', '2024-05-17 05:01:05', '2026-06-01 17:39:50'),
(25, 'Rodriguez-Wilkinson', '170459472-3', '3497559146', 'abshire.tomasa@deckow.biz', 'Manizales', 'Cl 90 #54-39', '2025-07-20 21:49:05', '2026-06-01 17:39:50'),
(26, 'Davis LLC', '601684006-3', '3379583300', 'watsica.lucile@purdy.org', 'Medellín', 'Cl 63 #10-98', '2023-08-04 03:36:33', '2026-06-01 17:39:50'),
(27, 'Rau-Harber', '541124935-2', '3070350036', 'felix65@schroeder.com', 'Armenia', 'Cl 8 #19-89', '2024-04-28 03:56:29', '2026-06-01 17:39:50'),
(28, 'Oberbrunner, Vandervort and Thompson', '197726028-9', '3232703719', 'blindgren@morissette.com', 'Barranquilla', 'Cl 72 #53-18', '2025-03-16 16:18:33', '2026-06-01 17:39:50'),
(29, 'Beahan and Sons', '151274619-1', '3520299015', 'stiedemann.elinore@wolf.biz', 'Ibagué', 'Cl 69 #84-32', '2023-08-24 14:25:59', '2026-06-01 17:39:50'),
(30, 'Lesch, Boehm and Batz', '679945540-9', '3737047703', 'dylan35@waters.net', 'Pereira', 'Cl 1 #69-37', '2025-05-29 06:53:24', '2026-06-01 17:39:50'),
(31, 'Krajcik, Champlin and Reinger', '206920809-1', '3390431446', 'elda.carroll@eichmann.com', 'Bucaramanga', 'Cl 71 #99-48', '2023-12-01 07:48:06', '2026-06-01 17:39:50'),
(32, 'Ratke, Kilback and Koch', '986391827-2', '3731653591', 'hcrona@rempel.biz', 'Neiva', 'Cl 79 #70-83', '2026-03-02 06:28:35', '2026-06-01 17:39:50'),
(33, 'Lynch-Deckow', '817721216-5', '3832159920', 'etha.effertz@lebsack.info', 'Cali', 'Cl 61 #53-38', '2024-10-14 21:47:42', '2026-06-01 17:39:50'),
(34, 'Frami-Bartoletti', '636883856-8', '3904718490', 'koelpin.daren@douglas.com', 'Armenia', 'Cl 74 #94-35', '2026-02-21 05:31:14', '2026-06-01 17:39:50'),
(35, 'Bosco, Hackett and Feeney', '624115332-2', '3340173890', 'isadore75@stamm.info', 'Pereira', 'Cl 55 #45-64', '2024-10-10 11:30:27', '2026-06-01 17:39:50'),
(36, 'Cummings, Feest and Wiza', '789591965-4', '3092182833', 'hoyt.glover@price.com', 'Armenia', 'Cl 26 #66-87', '2024-11-08 04:52:00', '2026-06-01 17:39:50'),
(37, 'Leuschke PLC', '282034282-8', '3023664103', 'dooley.samantha@ohara.com', 'Pereira', 'Cl 50 #86-47', '2023-10-18 01:31:08', '2026-06-01 17:39:50'),
(38, 'Schumm and Sons', '482391772-1', '3516640963', 'olson.aiden@bednar.org', 'Ibagué', 'Cl 84 #88-41', '2025-10-30 07:58:50', '2026-06-01 17:39:50'),
(39, 'Corkery, Predovic and Ernser', '787052732-1', '3371632113', 'rice.dallin@kulas.net', 'Cali', 'Cl 71 #83-57', '2025-07-20 01:48:18', '2026-06-01 17:39:50'),
(40, 'Lindgren, Hansen and Fadel', '863345095-7', '3163484609', 'wisozk.trever@hackett.org', 'Bogotá', 'Cl 57 #10-96', '2023-12-31 00:23:11', '2026-06-01 17:39:50'),
(41, 'Dicki Ltd', '829891588-3', '3224982559', 'mgutkowski@rath.com', 'Neiva', 'Cl 73 #22-68', '2023-10-27 16:38:56', '2026-06-01 17:39:50'),
(42, 'Schumm, Stiedemann and Stroman', '004890807-9', '3792713980', 'mhyatt@bashirian.org', 'Medellín', 'Cl 5 #92-98', '2023-09-30 13:48:12', '2026-06-01 17:39:50'),
(43, 'McLaughlin PLC', '152414692-9', '3543065988', 'lane.hansen@murray.net', 'Barranquilla', 'Cl 94 #69-86', '2025-08-23 23:02:28', '2026-06-01 17:39:50'),
(44, 'Turcotte-Oberbrunner', '418927054-2', '3859973940', 'khauck@langosh.com', 'Pereira', 'Cl 81 #12-56', '2025-02-25 12:58:44', '2026-06-01 17:39:50'),
(45, 'Jast-Wiza', '207064754-8', '3355471509', 'lou.abbott@brakus.com', 'Medellín', 'Cl 7 #1-38', '2024-10-07 10:14:34', '2026-06-01 17:39:50'),
(46, 'Mann, Hayes and Shields', '381388070-3', '3889293258', 'mohr.matteo@kihn.com', 'Medellín', 'Cl 26 #36-72', '2024-03-24 20:05:32', '2026-06-01 17:39:50'),
(47, 'Hoeger-Lindgren', '099839292-4', '3855402150', 'ahintz@hand.com', 'Bucaramanga', 'Cl 85 #36-35', '2024-09-20 05:06:42', '2026-06-01 17:39:50'),
(48, 'Schultz PLC', '254338653-6', '3381864961', 'white.jasen@batz.com', 'Ibagué', 'Cl 72 #70-56', '2025-12-21 11:07:12', '2026-06-01 17:39:50'),
(49, 'Ortiz, McClure and Volkman', '351731719-2', '3548602106', 'eleanora12@larkin.biz', 'Armenia', 'Cl 94 #88-43', '2025-11-21 15:59:40', '2026-06-01 17:39:50'),
(50, 'Lang Inc', '731218715-9', '3590499017', 'vicenta46@prohaska.com', 'Ibagué', 'Cl 14 #88-66', '2024-04-08 06:47:08', '2026-06-01 17:39:50'),
(51, 'Bins Group', '914928884-3', '3314611398', 'willms.zoey@satterfield.com', 'Barranquilla', 'Cl 16 #3-3', '2024-04-17 09:21:25', '2026-06-01 17:39:50'),
(52, 'Kling, Marquardt and Halvorson', '921364391-8', '3306359465', 'luis20@nader.info', 'Neiva', 'Cl 48 #16-50', '2025-01-26 23:57:27', '2026-06-01 17:39:50'),
(53, 'Boyer-Rippin', '507674140-6', '3569099236', 'pmccullough@spencer.com', 'Bucaramanga', 'Cl 52 #83-32', '2024-04-16 11:20:46', '2026-06-01 17:39:50'),
(54, 'Homenick, Willms and Schimmel', '422581829-7', '3331199472', 'alek95@jones.org', 'Ibagué', 'Cl 60 #95-83', '2024-06-08 09:51:22', '2026-06-01 17:39:50'),
(55, 'Prosacco Group', '466236736-1', '3064751215', 'pfeffer.newell@braun.com', 'Medellín', 'Cl 63 #83-27', '2023-08-05 06:55:06', '2026-06-01 17:39:50'),
(56, 'Padberg, Schamberger and Mayert', '418676064-1', '3533020550', 'reilly.christina@shields.biz', 'Bucaramanga', 'Cl 56 #52-75', '2023-09-12 01:18:31', '2026-06-01 17:39:50'),
(57, 'Christiansen and Sons', '655069286-4', '3743495474', 'enrique.medhurst@reinger.com', 'Armenia', 'Cl 36 #73-74', '2025-03-18 00:11:24', '2026-06-01 17:39:50'),
(58, 'Marquardt, Glover and McDermott', '587127377-2', '3242027637', 'julia91@emard.biz', 'Ibagué', 'Cl 11 #87-74', '2025-12-27 23:17:00', '2026-06-01 17:39:50'),
(59, 'Smitham, White and Huels', '713087433-0', '3949907814', 'roberta.lowe@will.biz', 'Bogotá', 'Cl 60 #55-83', '2025-04-11 00:23:03', '2026-06-01 17:39:50'),
(60, 'Herzog-Wilkinson', '587207026-3', '3640485767', 'iabbott@pacocha.com', 'Bogotá', 'Cl 82 #25-27', '2025-07-07 16:00:33', '2026-06-01 17:39:50'),
(61, 'Dare and Sons', '040535415-1', '3284354611', 'dkiehn@thompson.info', 'Pereira', 'Cl 16 #94-14', '2024-04-24 21:58:34', '2026-06-01 17:39:50'),
(62, 'Vandervort-Ebert', '128845568-3', '3466565226', 'shayne58@heaney.com', 'Armenia', 'Cl 73 #12-63', '2025-12-15 14:29:20', '2026-06-01 17:39:50'),
(63, 'Beer, Bechtelar and Swaniawski', '098103791-6', '3625533347', 'ldickinson@moen.org', 'Manizales', 'Cl 91 #78-40', '2023-10-09 14:01:26', '2026-06-01 17:39:50'),
(64, 'Paucek PLC', '531029366-6', '3212408502', 'linda.murray@ryan.com', 'Medellín', 'Cl 57 #54-73', '2024-10-20 03:41:35', '2026-06-01 17:39:50'),
(65, 'Stamm-Wolf', '163757538-0', '3501264202', 'reina54@hickle.com', 'Bucaramanga', 'Cl 71 #40-66', '2024-12-21 23:57:41', '2026-06-01 17:39:50'),
(66, 'Weimann-Rodriguez', '648047124-9', '3236489686', 'nbogisich@bayer.org', 'Neiva', 'Cl 75 #78-41', '2024-07-30 14:22:20', '2026-06-01 17:39:50'),
(67, 'Metz-Hermiston', '692384967-3', '3615094568', 'flatley.alyce@gusikowski.com', 'Bogotá', 'Cl 76 #97-11', '2025-05-14 21:45:58', '2026-06-01 17:39:50'),
(68, 'Baumbach, Kihn and Dickinson', '994257980-8', '3565035539', 'kemmerich@stracke.biz', 'Cali', 'Cl 23 #27-9', '2025-05-01 01:14:26', '2026-06-01 17:39:50'),
(69, 'Sauer PLC', '045860060-8', '3851694381', 'dayne.abernathy@runte.com', 'Medellín', 'Cl 13 #35-93', '2025-09-27 15:42:42', '2026-06-01 17:39:50'),
(70, 'Ritchie Group', '521234161-7', '3530509157', 'herta.eichmann@torp.info', 'Bucaramanga', 'Cl 83 #5-92', '2025-09-01 08:55:35', '2026-06-01 17:39:50'),
(71, 'Haag-Halvorson', '533379206-7', '3595651378', 'wmarvin@jast.net', 'Neiva', 'Cl 57 #8-39', '2024-11-14 04:12:09', '2026-06-01 17:39:50'),
(72, 'Homenick-Kovacek', '273782919-5', '3533011234', 'sheila.carroll@breitenberg.com', 'Pereira', 'Cl 52 #64-49', '2024-05-13 16:33:41', '2026-06-01 17:39:50'),
(73, 'Flatley Inc', '301984619-1', '3306787764', 'aurore06@reilly.org', 'Cali', 'Cl 27 #99-37', '2025-07-18 18:08:06', '2026-06-01 17:39:50'),
(74, 'O\'Reilly, Pagac and Huel', '504160445-9', '3927278659', 'ucarter@cruickshank.org', 'Bucaramanga', 'Cl 21 #1-36', '2025-05-18 20:56:07', '2026-06-01 17:39:50'),
(75, 'Cremin, Orn and Cummings', '696661262-4', '3571000872', 'tanner.bins@windler.biz', 'Bogotá', 'Cl 26 #17-68', '2024-08-07 10:15:01', '2026-06-01 17:39:50'),
(76, 'Strosin Group', '332387441-5', '3393795105', 'fmills@morar.com', 'Barranquilla', 'Cl 43 #91-35', '2026-04-01 03:00:41', '2026-06-01 17:39:50'),
(77, 'Schroeder, Terry and Bashirian', '992322830-5', '3378359192', 'alexandrine17@blanda.org', 'Bucaramanga', 'Cl 7 #9-88', '2025-06-13 04:08:04', '2026-06-01 17:39:50'),
(78, 'Shanahan LLC', '447699701-4', '3975685426', 'elouise.collier@kovacek.com', 'Armenia', 'Cl 60 #99-46', '2026-05-14 21:22:23', '2026-06-01 17:39:50'),
(79, 'Dicki-Kertzmann', '096339465-0', '3168977533', 'lowell98@weimann.com', 'Barranquilla', 'Cl 59 #67-14', '2024-09-06 10:23:18', '2026-06-01 17:39:50'),
(80, 'Waelchi-Shields', '180689360-4', '3937745453', 'romaguera.mylene@leannon.com', 'Neiva', 'Cl 89 #42-63', '2025-07-27 08:49:03', '2026-06-01 17:39:50'),
(81, 'Armstrong-Wisoky', '593065737-0', '3915396262', 'edd.mraz@bernhard.org', 'Cali', 'Cl 21 #56-7', '2026-01-30 11:44:58', '2026-06-01 17:39:50'),
(82, 'Reilly, Reichert and Hettinger', '420113743-5', '3179716232', 'georgette85@haley.com', 'Pereira', 'Cl 16 #62-76', '2023-06-24 04:30:15', '2026-06-01 17:39:50'),
(83, 'Muller, Nitzsche and Carter', '693939713-4', '3768241192', 'xcartwright@lemke.net', 'Neiva', 'Cl 45 #3-8', '2024-06-29 08:15:09', '2026-06-01 17:39:50'),
(84, 'Lowe-Stamm', '339763891-3', '3767430009', 'kirlin.pamela@doyle.com', 'Neiva', 'Cl 23 #91-7', '2024-04-14 12:39:00', '2026-06-01 17:39:50'),
(85, 'Heaney Ltd', '995919185-1', '3390052734', 'amarvin@crona.net', 'Armenia', 'Cl 52 #40-79', '2024-07-23 03:05:56', '2026-06-01 17:39:50'),
(86, 'Lockman-Konopelski', '695015036-1', '3713956516', 'breanna.ritchie@altenwerth.com', 'Bogotá', 'Cl 58 #12-92', '2026-04-22 21:31:31', '2026-06-01 17:39:50'),
(87, 'Kuhlman, Franecki and Pacocha', '858117198-8', '3264479662', 'tbradtke@wuckert.com', 'Cali', 'Cl 58 #96-64', '2025-02-19 01:13:51', '2026-06-01 17:39:50'),
(88, 'Hagenes-Monahan', '751925607-0', '3573408191', 'crona.deangelo@kilback.net', 'Bogotá', 'Cl 56 #36-86', '2025-05-24 02:33:58', '2026-06-01 17:39:50'),
(89, 'Orn, Romaguera and Smitham', '638491295-7', '3790714740', 'rogahn.sienna@jacobs.info', 'Manizales', 'Cl 5 #5-17', '2026-04-21 19:43:23', '2026-06-01 17:39:50'),
(90, 'Kiehn-Harris', '756779282-7', '3243601612', 'sienna07@huels.info', 'Pereira', 'Cl 75 #1-78', '2025-02-28 06:28:58', '2026-06-01 17:39:50'),
(91, 'Torphy-Kovacek', '814471212-5', '3001082401', 'stark.virgie@luettgen.com', 'Barranquilla', 'Cl 52 #49-81', '2025-04-23 01:15:05', '2026-06-01 17:39:50'),
(92, 'Powlowski PLC', '065829516-1', '3197214131', 'linnie.dickens@kuhic.com', 'Manizales', 'Cl 59 #85-16', '2023-12-31 04:26:19', '2026-06-01 17:39:50'),
(93, 'Kirlin and Sons', '533676289-4', '3887000669', 'jayson.keeling@rowe.org', 'Manizales', 'Cl 85 #20-26', '2026-04-07 02:44:11', '2026-06-01 17:39:50'),
(94, 'Ortiz, Jacobs and Dooley', '104725517-3', '3996376964', 'albina.gerhold@luettgen.com', 'Neiva', 'Cl 50 #25-82', '2025-07-02 00:01:53', '2026-06-01 17:39:50'),
(95, 'Rath, Mitchell and Gutmann', '880502903-9', '3669156224', 'hills.meaghan@rutherford.com', 'Barranquilla', 'Cl 31 #40-46', '2026-01-29 01:21:31', '2026-06-01 17:39:50'),
(96, 'D\'Amore PLC', '768141324-3', '3712900885', 'nswaniawski@lebsack.com', 'Barranquilla', 'Cl 50 #51-21', '2025-07-16 09:02:28', '2026-06-01 17:39:50'),
(97, 'Kerluke and Sons', '627324617-0', '3837711148', 'chasity31@schuster.com', 'Ibagué', 'Cl 56 #42-59', '2023-10-24 22:54:22', '2026-06-01 17:39:50'),
(98, 'Nader Group', '391919608-3', '3952205176', 'tatum76@dooley.net', 'Bucaramanga', 'Cl 48 #11-15', '2024-03-31 08:52:58', '2026-06-01 17:39:50'),
(99, 'Hyatt PLC', '086743849-1', '3463627272', 'prosacco.sarah@mckenzie.com', 'Bogotá', 'Cl 42 #14-20', '2023-11-02 12:49:05', '2026-06-01 17:39:50'),
(100, 'Cronin Inc', '093356250-5', '3940924797', 'fabian43@feil.biz', 'Barranquilla', 'Cl 2 #57-20', '2023-12-18 06:13:21', '2026-06-01 17:39:50'),
(101, 'Larson-Runte', '998713620-2', '3869376874', 'gkrajcik@halvorson.com', 'Barranquilla', 'Cl 24 #3-23', '2023-11-09 15:19:10', '2026-06-01 17:39:50'),
(102, 'Schmitt-Crona', '396266258-3', '3720935809', 'jerald31@rodriguez.com', 'Armenia', 'Cl 87 #62-67', '2025-07-10 16:07:54', '2026-06-01 17:39:50'),
(103, 'Predovic, Schowalter and Legros', '672669285-8', '3460775914', 'ayden.sauer@cartwright.net', 'Medellín', 'Cl 59 #70-28', '2025-04-09 09:14:06', '2026-06-01 17:39:50'),
(104, 'Bednar, Ondricka and Hoeger', '857510768-8', '3435069836', 'mikayla95@vandervort.info', 'Medellín', 'Cl 26 #39-69', '2025-12-17 03:04:49', '2026-06-01 17:39:50'),
(105, 'Stokes, Keebler and Runolfsson', '024721297-1', '3703572247', 'lfriesen@donnelly.biz', 'Neiva', 'Cl 63 #23-77', '2025-05-11 11:57:42', '2026-06-01 17:39:50'),
(106, 'Conn LLC', '701229036-3', '3845241860', 'haylie03@greenholt.biz', 'Medellín', 'Cl 1 #35-60', '2024-03-29 02:04:24', '2026-06-01 17:39:50'),
(107, 'Beier, Blanda and Heidenreich', '798243461-6', '3199678259', 'ethan.sporer@boyer.com', 'Manizales', 'Cl 9 #62-40', '2023-12-20 07:50:50', '2026-06-01 17:39:50'),
(108, 'Beahan Group', '548941264-5', '3281193096', 'arne.cronin@ortiz.biz', 'Cali', 'Cl 79 #14-73', '2025-10-14 18:09:16', '2026-06-01 17:39:50'),
(109, 'Gutkowski, Schuster and Konopelski', '891768793-2', '3845036794', 'damaris.powlowski@jast.net', 'Manizales', 'Cl 88 #43-46', '2024-07-22 08:40:17', '2026-06-01 17:39:50'),
(110, 'Volkman-Doyle', '235109119-0', '3857323227', 'brooks.lowe@botsford.com', 'Armenia', 'Cl 62 #88-38', '2025-04-22 03:07:58', '2026-06-01 17:39:50'),
(111, 'Hayes, Witting and Feil', '323232767-9', '3276272247', 'aletha.mohr@terry.info', 'Barranquilla', 'Cl 18 #88-78', '2024-06-21 03:18:30', '2026-06-01 17:39:50'),
(112, 'Erdman PLC', '261331580-9', '3332805907', 'bednar.lenna@hammes.info', 'Ibagué', 'Cl 76 #95-47', '2025-08-06 04:40:45', '2026-06-01 17:39:50'),
(113, 'Von-Zulauf', '468523885-4', '3246810857', 'schoen.davin@boehm.com', 'Cali', 'Cl 21 #15-47', '2024-12-07 03:14:10', '2026-06-01 17:39:50'),
(114, 'Greenholt, Mertz and Trantow', '561790566-1', '3947308322', 'reinger.toby@stehr.com', 'Pereira', 'Cl 91 #4-27', '2025-01-12 16:22:55', '2026-06-01 17:39:50'),
(115, 'Parisian-Keeling', '138953337-7', '3775502930', 'vlittle@shields.net', 'Pereira', 'Cl 53 #98-43', '2025-04-26 17:49:32', '2026-06-01 17:39:50'),
(116, 'Lemke-Tillman', '961165676-1', '3071640319', 'elta82@bradtke.com', 'Medellín', 'Cl 27 #79-38', '2024-03-02 17:09:21', '2026-06-01 17:39:50'),
(117, 'Predovic-Turner', '159253646-3', '3807641289', 'qmarquardt@schamberger.biz', 'Neiva', 'Cl 24 #22-55', '2025-09-04 00:42:05', '2026-06-01 17:39:50'),
(118, 'Grady, Champlin and Ferry', '720207579-4', '3668414306', 'vonrueden.wilhelm@bogan.biz', 'Manizales', 'Cl 15 #31-28', '2024-02-14 23:10:37', '2026-06-01 17:39:50'),
(119, 'Shanahan LLC', '568991482-5', '3941835686', 'fsmith@farrell.org', 'Armenia', 'Cl 37 #20-46', '2024-02-06 20:24:55', '2026-06-01 17:39:50'),
(120, 'Hagenes Ltd', '385256084-2', '3227385451', 'virginie.lindgren@turner.com', 'Medellín', 'Cl 39 #41-1', '2023-12-19 01:22:06', '2026-06-01 17:39:50'),
(121, 'Friesen, Mante and Tremblay', '569959804-4', '3934965299', 'ncorkery@thompson.com', 'Barranquilla', 'Cl 65 #58-59', '2024-08-01 14:30:08', '2026-06-01 17:39:50'),
(122, 'Casper, Lebsack and Lind', '291375092-0', '3450519107', 'roosevelt69@runolfsdottir.com', 'Cali', 'Cl 38 #19-14', '2025-05-27 09:27:32', '2026-06-01 17:39:50'),
(123, 'Hessel, Lesch and Bechtelar', '273837810-9', '3318606729', 'emard.joey@jacobi.com', 'Medellín', 'Cl 85 #32-31', '2025-12-13 05:14:21', '2026-06-01 17:39:50'),
(124, 'Stiedemann LLC', '255645850-6', '3942458523', 'clint.hickle@aufderhar.com', 'Ibagué', 'Cl 81 #59-2', '2025-07-06 12:21:19', '2026-06-01 17:39:50'),
(125, 'Schuster Group', '076515868-5', '3030969264', 'adriel21@kovacek.com', 'Cali', 'Cl 29 #18-89', '2023-07-05 03:19:30', '2026-06-01 17:39:50'),
(126, 'Heller, Yundt and Schulist', '862018371-3', '3835155249', 'laverne.stroman@deckow.com', 'Medellín', 'Cl 44 #7-27', '2026-04-04 15:58:06', '2026-06-01 17:39:50'),
(127, 'Turner and Sons', '314927265-4', '3455586113', 'gerry.metz@gerlach.net', 'Armenia', 'Cl 46 #21-8', '2023-07-03 08:21:26', '2026-06-01 17:39:50'),
(128, 'Little LLC', '475765801-4', '3209494166', 'gutkowski.lorna@wilderman.com', 'Armenia', 'Cl 52 #39-94', '2024-08-01 04:32:11', '2026-06-01 17:39:50'),
(129, 'Rutherford, Ondricka and Lueilwitz', '333490238-0', '3474489518', 'marc52@hill.org', 'Cali', 'Cl 45 #95-90', '2023-09-29 18:46:24', '2026-06-01 17:39:50'),
(130, 'Juan Carlos Pérez', '1014234567', '3102345678', 'juan.perez@example.com', 'Ibagué', 'Calle 15 # 4-12 Centro', '2026-06-01 17:53:51', '2026-06-01 17:53:51'),
(131, 'María Camila Restrepo', '1020456789', '3154567890', 'maria.restrepo@example.com', 'Bogotá', 'Carrera 7 # 72-10', '2026-06-01 17:53:51', '2026-06-01 17:53:51'),
(133, 'Diana Marcela Silva', '52345678', '3113456789', 'diana.silva@example.com', 'Medellín', 'Calle 50 # 51-24', '2026-06-01 17:53:51', '2026-06-01 17:53:51'),
(134, 'Carlos Eduardo Mendoza', '1032478912', '3174789123', 'carlos.mendoza@example.com', 'Barranquilla', 'Carrera 53 # 74-56', '2026-06-01 17:53:51', '2026-06-01 17:53:51'),
(135, 'Laura Valentina Ortiz', '1018945612', '3189456123', 'laura.ortiz@example.com', 'Ibagué', 'Manzana B Casa 12 Jordán', '2026-06-01 17:53:51', '2026-06-01 17:53:51'),
(136, 'Jorge Eliécer Castro', '19456123', '3004561234', 'jorge.castro@example.com', 'Bogotá', 'Calle 100 # 15-30', '2026-06-01 17:53:51', '2026-06-01 17:53:51'),
(137, 'Sandra Milena Beltrán', '65789123', '3127891234', 'sandra.beltran@example.com', 'Cali', 'Avenida Roosevelt # 34-12', '2026-06-01 17:53:51', '2026-06-01 17:53:51'),
(138, 'Ricardo Antonio Martínez', '91234567', '3162345671', 'ricardo.martinez@example.com', 'Medellín', 'Circular 4 # 73-10', '2026-06-01 17:53:51', '2026-06-01 17:53:51'),
(139, 'Patricia Elena Jaramillo', '43215678', '3132156789', 'patricia.jaramillo@example.com', 'Barranquilla', 'Carrera 46 # 82-11', '2026-06-01 17:53:51', '2026-06-01 17:53:51'),
(140, 'Juan Carlos Pérez', '1014234567', '3102345678', 'juan.perez@example.com', 'Ibagué', 'Calle 15 # 4-12 Centro', '2026-06-01 17:59:40', '2026-06-01 17:59:40'),
(141, 'María Camila Restrepo', '1020456789', '3154567890', 'maria.restrepo@example.com', 'Bogotá', 'Carrera 7 # 72-10', '2026-06-01 17:59:40', '2026-06-01 17:59:40'),
(143, 'Diana Marcela Silva', '52345678', '3113456789', 'diana.silva@example.com', 'Medellín', 'Calle 50 # 51-24', '2026-06-01 17:59:40', '2026-06-01 17:59:40'),
(144, 'Carlos Eduardo Mendoza', '1032478912', '3174789123', 'carlos.mendoza@example.com', 'Barranquilla', 'Carrera 53 # 74-56', '2026-06-01 17:59:40', '2026-06-01 17:59:40'),
(145, 'Laura Valentina Ortiz', '1018945612', '3189456123', 'laura.ortiz@example.com', 'Ibagué', 'Manzana B Casa 12 Jordán', '2026-06-01 17:59:40', '2026-06-01 17:59:40'),
(146, 'Jorge Eliécer Castro', '19456123', '3004561234', 'jorge.castro@example.com', 'Bogotá', 'Calle 100 # 15-30', '2026-06-01 17:59:40', '2026-06-01 17:59:40'),
(147, 'Sandra Milena Beltrán', '65789123', '3127891234', 'sandra.beltran@example.com', 'Cali', 'Avenida Roosevelt # 34-12', '2026-06-01 17:59:40', '2026-06-01 17:59:40'),
(148, 'Ricardo Antonio Martínez', '91234567', '3162345671', 'ricardo.martinez@example.com', 'Medellín', 'Circular 4 # 73-10', '2026-06-01 17:59:40', '2026-06-01 17:59:40'),
(149, 'Patricia Elena Jaramillo', '43215678', '3132156789', 'patricia.jaramillo@example.com', 'Barranquilla', 'Carrera 46 # 82-11', '2026-06-01 17:59:40', '2026-06-01 17:59:40'),
(150, 'Juan Carlos Pérez', '1014234567', '3102345678', 'juan.perez@example.com', 'Ibagué', 'Calle 15 # 4-12 Centro', '2026-06-01 18:17:09', '2026-06-01 18:17:09'),
(151, 'María Camila Restrepo', '1020456789', '3154567890', 'maria.restrepo@example.com', 'Bogotá', 'Carrera 7 # 72-10', '2026-06-01 18:17:09', '2026-06-01 18:17:09'),
(152, 'Andrés Felipe Gómez', '79845123', '3208451234', 'andres.gomez@example.com', 'Cali', 'Avenida 6N # 22-45', '2026-06-01 18:17:09', '2026-06-01 18:17:09'),
(153, 'Diana Marcela Silva', '52345678', '3113456789', 'diana.silva@example.com', 'Medellín', 'Calle 50 # 51-24', '2026-06-01 18:17:09', '2026-06-01 18:17:09'),
(154, 'Carlos Eduardo Mendoza', '1032478912', '3174789123', 'carlos.mendoza@example.com', 'Barranquilla', 'Carrera 53 # 74-56', '2026-06-01 18:17:09', '2026-06-01 18:17:09'),
(155, 'Laura Valentina Ortiz', '1018945612', '3189456123', 'laura.ortiz@example.com', 'Ibagué', 'Manzana B Casa 12 Jordán', '2026-06-01 18:17:09', '2026-06-01 18:17:09'),
(156, 'Jorge Eliécer Castro', '19456123', '3004561234', 'jorge.castro@example.com', 'Bogotá', 'Calle 100 # 15-30', '2026-06-01 18:17:09', '2026-06-01 18:17:09'),
(157, 'Sandra Milena Beltrán', '65789123', '3127891234', 'sandra.beltran@example.com', 'Cali', 'Avenida Roosevelt # 34-12', '2026-06-01 18:17:09', '2026-06-01 18:17:09'),
(158, 'Ricardo Antonio Martínez', '91234567', '3162345671', 'ricardo.martinez@example.com', 'Medellín', 'Circular 4 # 73-10', '2026-06-01 18:17:09', '2026-06-01 18:17:09'),
(159, 'Patricia Elena Jaramillo', '43215678', '3132156789', 'patricia.jaramillo@example.com', 'Barranquilla', 'Carrera 46 # 82-11', '2026-06-01 18:17:10', '2026-06-01 18:17:10'),
(162, 'Juan Carlos Pérez', '1014234567', '3102345678', 'juan.perez@example.com', 'Ibagué', 'Calle 15 # 4-12 Centro', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(163, 'María Camila Restrepo', '1020456789', '3154567890', 'maria.restrepo@example.com', 'Bogotá', 'Carrera 7 # 72-10', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(164, 'Andrés Felipe Gómez', '79845123', '3208451234', 'andres.gomez@example.com', 'Cali', 'Avenida 6N # 22-45', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(165, 'Diana Marcela Silva', '52345678', '3113456789', 'diana.silva@example.com', 'Medellín', 'Calle 50 # 51-24', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(166, 'Carlos Eduardo Mendoza', '1032478912', '3174789123', 'carlos.mendoza@example.com', 'Barranquilla', 'Carrera 53 # 74-56', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(167, 'Laura Valentina Ortiz', '1018945612', '3189456123', 'laura.ortiz@example.com', 'Ibagué', 'Manzana B Casa 12 Jordán', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(168, 'Jorge Eliécer Castro', '19456123', '3004561234', 'jorge.castro@example.com', 'Bogotá', 'Calle 100 # 15-30', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(169, 'Sandra Milena Beltrán', '65789123', '3127891234', 'sandra.beltran@example.com', 'Cali', 'Avenida Roosevelt # 34-12', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(170, 'Ricardo Antonio Martínez', '91234567', '3162345671', 'ricardo.martinez@example.com', 'Medellín', 'Circular 4 # 73-10', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(171, 'Patricia Elena Jaramillo', '43215678', '3132156789', 'patricia.jaramillo@example.com', 'Barranquilla', 'Carrera 46 # 82-11', '2026-06-01 20:31:37', '2026-06-01 20:31:37'),
(172, 'Juan Carlos Pérez', '1014234567', '3102345678', 'juan.perez@example.com', 'Ibagué', 'Calle 15 # 4-12 Centro', '2026-06-01 20:31:55', '2026-06-01 20:31:55'),
(173, 'María Camila Restrepo', '1020456789', '3154567890', 'maria.restrepo@example.com', 'Bogotá', 'Carrera 7 # 72-10', '2026-06-01 20:31:55', '2026-06-01 20:31:55'),
(174, 'Andrés Felipe Gómez', '79845123', '3208451234', 'andres.gomez@example.com', 'Cali', 'Avenida 6N # 22-45', '2026-06-01 20:31:55', '2026-06-01 20:31:55'),
(175, 'Diana Marcela Silva', '52345678', '3113456789', 'diana.silva@example.com', 'Medellín', 'Calle 50 # 51-24', '2026-06-01 20:31:55', '2026-06-01 20:31:55'),
(176, 'Carlos Eduardo Mendoza', '1032478912', '3174789123', 'carlos.mendoza@example.com', 'Barranquilla', 'Carrera 53 # 74-56', '2026-06-01 20:31:55', '2026-06-01 20:31:55'),
(177, 'Laura Valentina Ortiz', '1018945612', '3189456123', 'laura.ortiz@example.com', 'Ibagué', 'Manzana B Casa 12 Jordán', '2026-06-01 20:31:55', '2026-06-01 20:31:55'),
(178, 'Jorge Eliécer Castro', '19456123', '3004561234', 'jorge.castro@example.com', 'Bogotá', 'Calle 100 # 15-30', '2026-06-01 20:31:55', '2026-06-01 20:31:55'),
(179, 'Sandra Milena Beltrán', '65789123', '3127891234', 'sandra.beltran@example.com', 'Cali', 'Avenida Roosevelt # 34-12', '2026-06-01 20:31:55', '2026-06-01 20:31:55'),
(180, 'Ricardo Antonio Martínez', '91234567', '3162345671', 'ricardo.martinez@example.com', 'Medellín', 'Circular 4 # 73-10', '2026-06-01 20:31:55', '2026-06-01 20:31:55'),
(181, 'Patricia Elena Jaramillo', '43215678', '3132156789', 'patricia.jaramillo@example.com', 'Barranquilla', 'Carrera 46 # 82-11', '2026-06-01 20:31:55', '2026-06-01 20:31:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `documento`, `telefono`, `correo`, `ciudad`, `direccion`, `cargo`, `created_at`, `updated_at`) VALUES
(1, 'Miss Daisha Upton', '0892041426', '3570277178', 'hauck.iliana@example.org', 'Pereira', 'Cra 42 #20-31', 'Cortador', '2025-10-03 01:15:58', '2026-06-01 17:39:49'),
(2, 'Otha Kunde DVM', '9732748849', '3447539406', 'clifton.bergnaum@example.com', 'Bogotá', 'Cra 41 #29-5', 'Cortador', '2024-12-10 17:10:42', '2026-06-01 17:39:49'),
(3, 'Sim Rolfson', '3925838148', '3732969275', 'margarita.funk@example.net', 'Barranquilla', 'Cra 32 #97-58', 'Almacenista', '2025-02-28 02:34:32', '2026-06-01 17:39:49'),
(4, 'Palma Dooley', '5741451805', '3708647398', 'bart60@example.org', 'Medellín', 'Cra 1 #63-63', 'Almacenista', '2025-11-20 02:19:34', '2026-06-01 17:39:49'),
(5, 'Ayden Hamill', '6578466560', '3790090715', 'astrid.hartmann@example.net', 'Pereira', 'Cra 42 #31-36', 'Auxiliar', '2024-10-21 02:19:03', '2026-06-01 17:39:49'),
(6, 'Kennith Littel DVM', '3461367359', '3113045685', 'predovic.delta@example.com', 'Bogotá', 'Cra 14 #67-53', 'Costurero', '2023-06-19 02:53:56', '2026-06-01 17:39:49'),
(7, 'Dr. Elena Kuhlman Jr.', '3351116196', '3884891649', 'jbergnaum@example.org', 'Cali', 'Cra 31 #30-61', 'Auxiliar', '2025-01-10 11:32:13', '2026-06-01 17:39:49'),
(8, 'Maymie Conroy', '8870022512', '3689171186', 'gdaniel@example.org', 'Bogotá', 'Cra 3 #1-33', 'Control de Calidad', '2025-08-08 19:22:18', '2026-06-01 17:39:49'),
(9, 'Elsie Murphy', '2188462658', '3439007978', 'nathan.sporer@example.net', 'Ibagué', 'Cra 25 #85-16', 'Cortador', '2025-12-22 00:54:28', '2026-06-01 17:39:49'),
(10, 'Elda Toy', '3828746935', '3577694625', 'witting.kayden@example.net', 'Neiva', 'Cra 49 #45-72', 'Auxiliar', '2025-10-30 20:41:56', '2026-06-01 17:39:49'),
(11, 'Dr. Rahsaan Purdy III', '1495283559', '3049305115', 'cmayert@example.net', 'Bucaramanga', 'Cra 21 #24-93', 'Almacenista', '2023-08-27 08:24:00', '2026-06-01 17:39:49'),
(12, 'Mrs. Martine Farrell MD', '9820865383', '3406208256', 'charlene83@example.net', 'Ibagué', 'Cra 38 #41-99', 'Costurero', '2025-06-17 19:13:58', '2026-06-01 17:39:49'),
(13, 'Samara Schultz', '8411068948', '3402719898', 'oharvey@example.com', 'Medellín', 'Cra 32 #16-85', 'Mensajero', '2024-12-20 19:16:40', '2026-06-01 17:39:49'),
(14, 'Dr. Luisa Kub PhD', '2141596501', '3601540946', 'faye03@example.com', 'Barranquilla', 'Cra 19 #57-15', 'Almacenista', '2025-03-21 04:35:55', '2026-06-01 17:39:49'),
(15, 'Miss Elna Kozey', '4376537886', '3577726468', 'djaskolski@example.com', 'Armenia', 'Cra 35 #17-57', 'Cortador', '2026-04-15 12:08:00', '2026-06-01 17:39:49'),
(16, 'Paula Marks', '3375681015', '3594382000', 'little.jovan@example.net', 'Bogotá', 'Cra 10 #2-56', 'Almacenista', '2024-02-16 17:49:03', '2026-06-01 17:39:49'),
(17, 'Prof. Carmelo Murazik', '8069608882', '3464660189', 'watson.welch@example.com', 'Cali', 'Cra 27 #55-96', 'Control de Calidad', '2023-12-22 08:18:23', '2026-06-01 17:39:49'),
(18, 'Syble Paucek', '8263392667', '3027801920', 'rtrantow@example.org', 'Neiva', 'Cra 44 #30-72', 'Supervisor', '2026-02-10 03:39:12', '2026-06-01 17:39:49'),
(19, 'Peter Frami', '3667757059', '3266940702', 'ygerlach@example.com', 'Bogotá', 'Cra 17 #30-30', 'Cortador', '2024-07-17 19:50:42', '2026-06-01 17:39:49'),
(20, 'Ms. Valentine Bergstrom IV', '7240729531', '3630108428', 'makayla42@example.net', 'Manizales', 'Cra 44 #53-21', 'Cortador', '2025-07-24 07:57:53', '2026-06-01 17:39:49'),
(21, 'Mrs. Shirley Langworth IV', '2467150407', '3147739683', 'howe.gerda@example.net', 'Cali', 'Cra 38 #96-11', 'Control de Calidad', '2024-02-10 06:44:37', '2026-06-01 17:39:49'),
(22, 'Amiya Kuhn', '2475657274', '3776364148', 'orn.vicente@example.org', 'Pereira', 'Cra 7 #18-75', 'Operario', '2025-08-19 22:20:44', '2026-06-01 17:39:49'),
(23, 'Matt Hartmann DDS', '1134979177', '3368894646', 'soledad64@example.com', 'Neiva', 'Cra 18 #66-80', 'Almacenista', '2026-04-15 09:16:44', '2026-06-01 17:39:49'),
(24, 'Dr. Russel Effertz', '9409641829', '3230899562', 'ferry.lilliana@example.org', 'Bogotá', 'Cra 33 #64-22', 'Control de Calidad', '2025-09-12 09:43:07', '2026-06-01 17:39:49'),
(25, 'Prof. Jarrell Ortiz', '4639286709', '3012789498', 'tevin57@example.org', 'Cali', 'Cra 46 #77-94', 'Cortador', '2026-03-18 23:46:16', '2026-06-01 17:39:49'),
(26, 'Deborah Turner', '9299611914', '3640814004', 'stacy.effertz@example.org', 'Barranquilla', 'Cra 7 #90-34', 'Operario', '2025-09-19 12:01:11', '2026-06-01 17:39:49'),
(27, 'Martina Beer', '9867065455', '3409856804', 'jennie02@example.com', 'Manizales', 'Cra 4 #68-92', 'Costurero', '2026-02-25 15:12:22', '2026-06-01 17:39:49'),
(28, 'Jevon McClure', '9543553736', '3035018084', 'jermaine22@example.org', 'Bogotá', 'Cra 7 #29-71', 'Supervisor', '2026-02-04 22:18:25', '2026-06-01 17:39:49'),
(29, 'Dorian O\'Connell', '2365108861', '3940680391', 'kathlyn82@example.com', 'Bogotá', 'Cra 31 #9-61', 'Control de Calidad', '2024-02-23 15:54:53', '2026-06-01 17:39:49'),
(30, 'Annabel Pacocha', '1352770384', '3442734163', 'sophia.trantow@example.net', 'Medellín', 'Cra 6 #49-61', 'Control de Calidad', '2025-02-02 21:54:24', '2026-06-01 17:39:49'),
(31, 'Mr. Lenny Ullrich', '1467296182', '3259581700', 'shields.chadd@example.net', 'Armenia', 'Cra 47 #1-18', 'Mensajero', '2024-12-31 11:36:54', '2026-06-01 17:39:49'),
(32, 'Martin Ryan IV', '8680325449', '3823080533', 'douglas.justina@example.org', 'Barranquilla', 'Cra 37 #18-40', 'Costurero', '2025-05-08 08:55:15', '2026-06-01 17:39:49'),
(33, 'Prof. Bettye Rath PhD', '8015520937', '3300913483', 'jkovacek@example.com', 'Bucaramanga', 'Cra 23 #82-44', 'Control de Calidad', '2024-07-25 06:39:54', '2026-06-01 17:39:49'),
(34, 'Emmitt Cassin', '9166183200', '3329255616', 'mabel73@example.com', 'Bogotá', 'Cra 50 #31-20', 'Operario', '2024-04-06 01:08:31', '2026-06-01 17:39:49'),
(35, 'Jamarcus Batz', '9889265371', '3116499772', 'block.clement@example.org', 'Neiva', 'Cra 8 #53-88', 'Supervisor', '2024-04-13 08:41:55', '2026-06-01 17:39:49'),
(36, 'Travis Kunze', '1106311720', '3008471993', 'price.elaina@example.org', 'Neiva', 'Cra 38 #98-18', 'Cortador', '2024-02-14 03:03:58', '2026-06-01 17:39:49'),
(37, 'Jana Johns', '4007958996', '3167827906', 'elliot.grant@example.net', 'Medellín', 'Cra 4 #13-93', 'Costurero', '2026-01-23 01:21:17', '2026-06-01 17:39:49'),
(38, 'Melvin Stroman', '9199129372', '3208679341', 'derek.lowe@example.com', 'Pereira', 'Cra 20 #6-18', 'Supervisor', '2025-05-06 04:20:24', '2026-06-01 17:39:49'),
(39, 'Myrna Mayert', '6183485044', '3297011481', 'rosalinda.toy@example.org', 'Cali', 'Cra 49 #91-39', 'Operario', '2025-12-08 02:33:01', '2026-06-01 17:39:49'),
(40, 'Eloy Hane', '2838654748', '3676060967', 'ashleigh.ratke@example.net', 'Cali', 'Cra 11 #70-82', 'Auxiliar', '2026-03-04 03:56:35', '2026-06-01 17:39:49'),
(41, 'Anika Pagac', '5055079469', '3535188389', 'smitham.ursula@example.net', 'Cali', 'Cra 26 #53-83', 'Cortador', '2026-05-11 10:06:07', '2026-06-01 17:39:49'),
(42, 'Mary Steuber', '4497950483', '3230006169', 'mgraham@example.net', 'Armenia', 'Cra 47 #53-69', 'Auxiliar', '2025-06-01 03:15:18', '2026-06-01 17:39:49'),
(43, 'Mathilde Hahn', '3699091412', '3711028597', 'xbogan@example.com', 'Ibagué', 'Cra 43 #7-25', 'Auxiliar', '2025-12-23 18:26:35', '2026-06-01 17:39:49'),
(44, 'Faustino Funk', '2363625607', '3032258607', 'aida.pollich@example.net', 'Armenia', 'Cra 33 #67-29', 'Almacenista', '2024-05-28 22:17:24', '2026-06-01 17:39:49'),
(45, 'Jarvis Beer Sr.', '7986625753', '3897287609', 'raleigh.flatley@example.net', 'Manizales', 'Cra 36 #8-18', 'Operario', '2026-05-29 06:18:01', '2026-06-01 17:39:49'),
(46, 'Corine Cole DDS', '6220609199', '3381484157', 'susanna61@example.net', 'Bogotá', 'Cra 3 #7-62', 'Supervisor', '2024-09-10 02:45:44', '2026-06-01 17:39:49'),
(47, 'Samantha Kunze', '4846370350', '3219814095', 'garett.cassin@example.net', 'Bogotá', 'Cra 16 #63-21', 'Almacenista', '2025-12-02 23:45:02', '2026-06-01 17:39:49'),
(48, 'Rosina Buckridge', '7851255600', '3627296959', 'brielle.ledner@example.org', 'Bucaramanga', 'Cra 12 #28-9', 'Auxiliar', '2026-05-04 13:14:43', '2026-06-01 17:39:49'),
(49, 'Prof. Lauren Tremblay', '4649162659', '3842926546', 'catharine.kihn@example.com', 'Bucaramanga', 'Cra 50 #50-8', 'Supervisor', '2024-12-20 11:37:57', '2026-06-01 17:39:49'),
(50, 'Toy Gorczany', '6457125816', '3896383790', 'hardy38@example.com', 'Armenia', 'Cra 11 #60-43', 'Supervisor', '2026-05-25 01:24:47', '2026-06-01 17:39:49'),
(51, 'Dr. Jovan Greenholt', '1593359558', '3465753575', 'obergstrom@example.net', 'Armenia', 'Cra 31 #21-58', 'Auxiliar', '2025-08-29 00:42:15', '2026-06-01 17:39:49'),
(52, 'Cruz Miller III', '9187672563', '3725035351', 'israel89@example.net', 'Medellín', 'Cra 26 #20-33', 'Auxiliar', '2024-11-21 02:10:21', '2026-06-01 17:39:49'),
(53, 'Mrs. Cheyenne Kuphal Sr.', '6130372542', '3912992010', 'mackenzie.predovic@example.com', 'Cali', 'Cra 14 #59-51', 'Control de Calidad', '2025-09-27 08:45:57', '2026-06-01 17:39:49'),
(54, 'Oda Prosacco', '9616542158', '3854528889', 'herbert.dubuque@example.com', 'Bucaramanga', 'Cra 27 #10-51', 'Auxiliar', '2024-01-12 14:05:33', '2026-06-01 17:39:49'),
(55, 'Raven Nader Sr.', '3969904591', '3373002061', 'zsatterfield@example.com', 'Cali', 'Cra 6 #7-56', 'Auxiliar', '2026-01-02 00:56:56', '2026-06-01 17:39:49'),
(56, 'Jovanny Pfeffer DDS', '6339638212', '3556408602', 'dickens.eileen@example.com', 'Cali', 'Cra 40 #83-31', 'Auxiliar', '2026-05-20 20:14:52', '2026-06-01 17:39:49'),
(57, 'Dr. Uriel Kemmer I', '1990955122', '3479580125', 'travon59@example.com', 'Manizales', 'Cra 31 #30-13', 'Auxiliar', '2023-10-29 01:47:19', '2026-06-01 17:39:49'),
(58, 'Alysha Larkin', '0007823799', '3006180849', 'rbergstrom@example.com', 'Neiva', 'Cra 4 #98-77', 'Mensajero', '2025-04-05 02:34:29', '2026-06-01 17:39:49'),
(59, 'Bessie Dibbert PhD', '5708922016', '3693526911', 'nathen.walsh@example.org', 'Armenia', 'Cra 37 #3-4', 'Control de Calidad', '2024-09-03 07:57:23', '2026-06-01 17:39:49'),
(60, 'Jayden Cole DDS', '4845753377', '3964505089', 'freinger@example.net', 'Medellín', 'Cra 45 #87-4', 'Supervisor', '2025-04-19 20:36:31', '2026-06-01 17:39:49'),
(61, 'Myriam Beatty', '5107389662', '3940524177', 'wfeest@example.com', 'Manizales', 'Cra 5 #27-32', 'Operario', '2025-08-27 12:19:16', '2026-06-01 17:39:49'),
(62, 'Mrs. Lizzie Barrows I', '0778100665', '3379150821', 'roberto.casper@example.com', 'Neiva', 'Cra 22 #34-90', 'Supervisor', '2025-01-03 07:45:05', '2026-06-01 17:39:49'),
(63, 'Prof. Meghan Walker', '1285793972', '3484759226', 'fdare@example.com', 'Bucaramanga', 'Cra 29 #34-5', 'Mensajero', '2025-07-22 09:51:36', '2026-06-01 17:39:49'),
(64, 'Ms. Cora Gaylord IV', '2638957066', '3052563144', 'angeline.reynolds@example.com', 'Manizales', 'Cra 25 #50-35', 'Cortador', '2025-11-03 05:27:17', '2026-06-01 17:39:49'),
(65, 'Laurianne Grimes', '3298306946', '3756265330', 'hettinger.erling@example.net', 'Cali', 'Cra 43 #94-39', 'Operario', '2023-06-19 12:10:50', '2026-06-01 17:39:49'),
(66, 'Mitchell Barton', '8102401056', '3271609757', 'hertha89@example.com', 'Medellín', 'Cra 49 #78-44', 'Almacenista', '2024-06-22 14:44:40', '2026-06-01 17:39:49'),
(67, 'Alvah Krajcik', '9358455031', '3605051958', 'arturo19@example.org', 'Medellín', 'Cra 17 #44-5', 'Operario', '2024-09-08 07:56:46', '2026-06-01 17:39:49'),
(68, 'Mr. Judah Kulas', '5454018465', '3122892445', 'rippin.yoshiko@example.org', 'Pereira', 'Cra 23 #85-94', 'Operario', '2026-06-01 03:54:22', '2026-06-01 17:39:49'),
(69, 'Tina Langosh', '7389935652', '3455262478', 'ureichert@example.net', 'Neiva', 'Cra 14 #37-87', 'Supervisor', '2023-08-17 15:26:11', '2026-06-01 17:39:49'),
(70, 'Janick Ondricka', '1904438305', '3391123384', 'libby35@example.com', 'Barranquilla', 'Cra 36 #93-69', 'Operario', '2025-10-23 08:41:25', '2026-06-01 17:39:49'),
(71, 'Lavinia Johnson IV', '7122321944', '3429807038', 'connelly.ova@example.com', 'Medellín', 'Cra 3 #67-57', 'Operario', '2023-12-25 16:30:05', '2026-06-01 17:39:49'),
(72, 'Ethel Gutkowski', '2379055239', '3795406433', 'llynch@example.com', 'Bogotá', 'Cra 9 #70-88', 'Auxiliar', '2024-01-02 16:22:10', '2026-06-01 17:39:49'),
(73, 'Prof. Harley Luettgen', '3490823965', '3975754281', 'ogutmann@example.org', 'Manizales', 'Cra 21 #54-9', 'Almacenista', '2025-03-12 19:01:49', '2026-06-01 17:39:49'),
(74, 'Cecilia Koch', '7770402407', '3497550622', 'lmayert@example.org', 'Barranquilla', 'Cra 2 #45-58', 'Control de Calidad', '2024-12-22 04:46:04', '2026-06-01 17:39:49'),
(75, 'Ava Kling MD', '5273295646', '3320311135', 'eusebio55@example.com', 'Medellín', 'Cra 49 #28-21', 'Costurero', '2025-09-16 01:32:23', '2026-06-01 17:39:49'),
(76, 'Warren Waters', '3024537553', '3220052403', 'nikolas.haley@example.com', 'Bucaramanga', 'Cra 30 #82-9', 'Costurero', '2023-11-23 00:41:40', '2026-06-01 17:39:49'),
(77, 'Katrine Heaney', '7004846753', '3791886308', 'era.jaskolski@example.com', 'Medellín', 'Cra 50 #91-77', 'Costurero', '2023-11-10 00:16:58', '2026-06-01 17:39:49'),
(78, 'Ferne Zieme', '1662320924', '3250849673', 'freida.schuppe@example.net', 'Ibagué', 'Cra 35 #46-45', 'Supervisor', '2023-06-15 18:54:02', '2026-06-01 17:39:49'),
(79, 'Elisabeth Marquardt Sr.', '0440446601', '3777952352', 'bins.tristin@example.net', 'Ibagué', 'Cra 34 #26-21', 'Auxiliar', '2025-04-07 05:33:23', '2026-06-01 17:39:49'),
(80, 'Sigmund Bergnaum', '6765364079', '3663210041', 'milford.denesik@example.com', 'Medellín', 'Cra 11 #94-28', 'Almacenista', '2023-06-02 07:36:28', '2026-06-01 17:39:49'),
(81, 'Prof. Sean Rodriguez', '9541176164', '3492679096', 'herman.gulgowski@example.org', 'Armenia', 'Cra 40 #39-64', 'Operario', '2025-08-31 21:17:36', '2026-06-01 17:39:49'),
(82, 'Freda Lueilwitz', '7256476082', '3525739895', 'krunolfsson@example.org', 'Ibagué', 'Cra 8 #81-66', 'Auxiliar', '2025-11-30 07:28:45', '2026-06-01 17:39:49'),
(83, 'Furman Crona', '9528478330', '3744671635', 'cwalsh@example.com', 'Cali', 'Cra 31 #27-96', 'Almacenista', '2025-06-02 08:06:43', '2026-06-01 17:39:49'),
(84, 'Ms. America Veum Jr.', '2152602403', '3524412695', 'colby.schimmel@example.com', 'Barranquilla', 'Cra 48 #99-79', 'Cortador', '2023-10-28 15:55:15', '2026-06-01 17:39:49'),
(85, 'Dr. Clay Lemke Jr.', '4112058086', '3195129512', 'lavada.ratke@example.net', 'Bogotá', 'Cra 1 #41-45', 'Cortador', '2025-12-26 05:15:24', '2026-06-01 17:39:49'),
(86, 'Oliver Becker', '6368516457', '3192278715', 'isabella.kirlin@example.net', 'Armenia', 'Cra 25 #7-87', 'Operario', '2024-05-03 12:49:37', '2026-06-01 17:39:49'),
(87, 'Ms. Chloe Beahan Jr.', '6542007401', '3688457875', 'kelsi.dubuque@example.org', 'Ibagué', 'Cra 42 #55-32', 'Supervisor', '2025-02-09 20:49:03', '2026-06-01 17:39:49'),
(88, 'Violette Rodriguez', '5147293413', '3096725392', 'ilindgren@example.org', 'Manizales', 'Cra 5 #93-71', 'Operario', '2025-08-26 09:51:53', '2026-06-01 17:39:49'),
(89, 'Mary Sipes IV', '4136029238', '3413613028', 'orval27@example.net', 'Barranquilla', 'Cra 32 #64-39', 'Auxiliar', '2023-07-10 18:25:25', '2026-06-01 17:39:49'),
(90, 'Micah Mann', '5430697014', '3032618541', 'lilian59@example.com', 'Medellín', 'Cra 22 #63-97', 'Mensajero', '2025-03-29 19:00:29', '2026-06-01 17:39:49'),
(91, 'Kyla Emard III', '6378002803', '3976431668', 'nflatley@example.com', 'Cali', 'Cra 7 #83-68', 'Supervisor', '2024-05-03 18:38:58', '2026-06-01 17:39:49'),
(92, 'Dr. Kaelyn O\'Connell DVM', '6152523113', '3317998249', 'cristobal.ritchie@example.net', 'Armenia', 'Cra 12 #79-82', 'Supervisor', '2025-01-26 20:50:06', '2026-06-01 17:39:49'),
(93, 'Oma Hirthe', '3036167174', '3394325378', 'landerson@example.net', 'Bucaramanga', 'Cra 12 #43-53', 'Almacenista', '2023-09-04 22:04:50', '2026-06-01 17:39:49'),
(94, 'Mr. Gonzalo Hammes', '4564338944', '3980899058', 'schneider.johnathan@example.org', 'Armenia', 'Cra 10 #2-47', 'Cortador', '2023-11-13 05:07:58', '2026-06-01 17:39:49'),
(95, 'Carlee Wilderman', '0155449381', '3635816706', 'zkozey@example.net', 'Armenia', 'Cra 40 #78-95', 'Supervisor', '2023-11-29 22:19:04', '2026-06-01 17:39:49'),
(96, 'Fermin Cummerata', '7511992983', '3084488388', 'garfield.kris@example.org', 'Bucaramanga', 'Cra 33 #40-47', 'Auxiliar', '2024-11-24 08:10:08', '2026-06-01 17:39:49'),
(97, 'Merritt Cronin', '6198633803', '3171165747', 'stark.conner@example.net', 'Ibagué', 'Cra 23 #84-13', 'Supervisor', '2025-04-23 16:11:54', '2026-06-01 17:39:49'),
(98, 'Ms. Kathleen Pfannerstill PhD', '5115908903', '3874780177', 'melvina44@example.com', 'Bogotá', 'Cra 35 #96-56', 'Cortador', '2026-01-20 14:41:46', '2026-06-01 17:39:49'),
(99, 'Koby Gleason', '0557850059', '3093734174', 'ffeest@example.org', 'Bucaramanga', 'Cra 41 #62-73', 'Control de Calidad', '2025-07-07 04:05:45', '2026-06-01 17:39:49'),
(100, 'Glen Koepp', '2590310793', '3636361101', 'misty.mante@example.net', 'Pereira', 'Cra 13 #74-66', 'Control de Calidad', '2025-01-15 17:23:58', '2026-06-01 17:39:49'),
(101, 'Marlen Crooks', '6996852026', '3115157013', 'archibald.gislason@example.net', 'Neiva', 'Cra 40 #10-68', 'Mensajero', '2025-08-20 12:03:18', '2026-06-01 17:39:49'),
(102, 'Adele Kuhn I', '3077515498', '3746150781', 'armani.watsica@example.org', 'Cali', 'Cra 41 #61-74', 'Almacenista', '2023-09-12 10:21:05', '2026-06-01 17:39:49'),
(103, 'Ari Wilkinson', '6919020379', '3502642049', 'demario.ryan@example.com', 'Ibagué', 'Cra 42 #6-70', 'Cortador', '2024-05-14 14:30:40', '2026-06-01 17:39:49'),
(104, 'Dr. Jonas Jakubowski', '3247625338', '3742587426', 'mgulgowski@example.net', 'Ibagué', 'Cra 29 #74-85', 'Mensajero', '2024-08-18 03:21:23', '2026-06-01 17:39:49'),
(105, 'Edward Romaguera', '3790135877', '3682515380', 'maida.cartwright@example.org', 'Medellín', 'Cra 40 #91-75', 'Control de Calidad', '2025-04-12 11:02:12', '2026-06-01 17:39:49'),
(106, 'Rita Gaylord', '6203943821', '3326392596', 'mcarter@example.org', 'Medellín', 'Cra 8 #55-99', 'Mensajero', '2025-01-17 04:56:59', '2026-06-01 17:39:49'),
(107, 'Ivah Kuhlman', '1591091763', '3833056332', 'blanda.bernardo@example.net', 'Ibagué', 'Cra 48 #20-36', 'Control de Calidad', '2024-09-15 04:34:44', '2026-06-01 17:39:49'),
(108, 'Mr. Jerry Towne', '2240509347', '3626166466', 'telly49@example.org', 'Cali', 'Cra 9 #47-1', 'Auxiliar', '2025-06-09 17:40:37', '2026-06-01 17:39:49'),
(109, 'Dr. Elwin Pacocha', '8071821643', '3335949388', 'heaney.nedra@example.org', 'Armenia', 'Cra 12 #47-14', 'Cortador', '2024-09-20 16:23:57', '2026-06-01 17:39:49'),
(110, 'Morgan Hansen', '2088522698', '3542419508', 'tressa68@example.com', 'Barranquilla', 'Cra 30 #91-10', 'Control de Calidad', '2024-05-03 04:53:24', '2026-06-01 17:39:49'),
(111, 'Dr. Quinton Windler', '2156648044', '3563817641', 'ernestina.daugherty@example.org', 'Cali', 'Cra 21 #58-51', 'Supervisor', '2025-08-26 06:59:45', '2026-06-01 17:39:49'),
(112, 'Lindsay Hilpert', '2396127609', '3599754159', 'leon28@example.com', 'Armenia', 'Cra 6 #22-87', 'Mensajero', '2023-11-10 10:23:59', '2026-06-01 17:39:49'),
(113, 'Glenda Johns V', '7298511167', '3185812103', 'isadore.gerhold@example.net', 'Neiva', 'Cra 13 #67-32', 'Control de Calidad', '2024-03-30 19:29:50', '2026-06-01 17:39:49'),
(114, 'Velva Hayes', '1859935020', '3005220301', 'jacinto.cormier@example.net', 'Neiva', 'Cra 38 #63-48', 'Costurero', '2024-08-18 04:11:46', '2026-06-01 17:39:49'),
(115, 'Colten Bailey', '3931595098', '3267739240', 'mclaughlin.natalia@example.net', 'Barranquilla', 'Cra 7 #56-72', 'Costurero', '2024-04-28 17:02:25', '2026-06-01 17:39:49'),
(116, 'Ruben Lesch', '3906343843', '3391327425', 'robert09@example.org', 'Neiva', 'Cra 21 #64-27', 'Costurero', '2024-09-29 02:51:44', '2026-06-01 17:39:49'),
(117, 'Monserrat Cormier', '8002022943', '3100434230', 'jacky39@example.com', 'Pereira', 'Cra 19 #84-72', 'Control de Calidad', '2025-08-17 23:05:03', '2026-06-01 17:39:49'),
(118, 'Prof. Carol Ebert', '4822332485', '3104428245', 'dee70@example.org', 'Bucaramanga', 'Cra 7 #50-26', 'Operario', '2026-05-01 09:57:26', '2026-06-01 17:39:49'),
(119, 'Lois Volkman III', '4716896212', '3769554942', 'jaquan26@example.com', 'Neiva', 'Cra 7 #60-79', 'Operario', '2025-03-26 11:19:25', '2026-06-01 17:39:49'),
(120, 'Ayla Crona', '6648983228', '3228952030', 'yadira.roberts@example.com', 'Bogotá', 'Cra 24 #43-2', 'Auxiliar', '2025-10-15 02:36:23', '2026-06-01 17:39:49'),
(121, 'Dr. Conrad Mills', '7200544198', '3922950836', 'heaney.gracie@example.net', 'Pereira', 'Cra 15 #82-20', 'Cortador', '2025-11-08 13:25:44', '2026-06-01 17:39:49'),
(122, 'Margarita Witting', '7615369379', '3091858678', 'brad.mcclure@example.net', 'Medellín', 'Cra 20 #23-36', 'Cortador', '2026-04-23 05:19:19', '2026-06-01 17:39:49'),
(123, 'Prof. Jaclyn Medhurst V', '7368479012', '3469310856', 'claud27@example.com', 'Barranquilla', 'Cra 47 #6-37', 'Auxiliar', '2024-12-11 16:04:58', '2026-06-01 17:39:49'),
(124, 'Erick Kerluke', '6389378926', '3847692496', 'jalon.russel@example.net', 'Ibagué', 'Cra 14 #82-64', 'Costurero', '2025-09-21 02:16:14', '2026-06-01 17:39:49'),
(125, 'Donnie Schmitt', '2057214929', '3752883098', 'rosenbaum.eula@example.net', 'Cali', 'Cra 25 #25-80', 'Costurero', '2025-02-16 07:39:47', '2026-06-01 17:39:49'),
(126, 'Maida Ritchie', '7333003862', '3565323551', 'toconner@example.org', 'Cali', 'Cra 48 #62-60', 'Costurero', '2025-09-22 08:57:50', '2026-06-01 17:39:49'),
(127, 'Weston Schroeder', '6136395987', '3077718133', 'courtney.terry@example.net', 'Barranquilla', 'Cra 3 #93-58', 'Operario', '2024-12-18 12:51:26', '2026-06-01 17:39:49'),
(128, 'Prof. Garrett Brown', '7008396932', '3528927797', 'zluettgen@example.net', 'Manizales', 'Cra 41 #98-42', 'Cortador', '2023-06-30 04:34:31', '2026-06-01 17:39:49'),
(129, 'Neoma Schamberger', '8589879029', '3537812080', 'tschmeler@example.org', 'Armenia', 'Cra 34 #86-82', 'Mensajero', '2023-12-12 12:48:37', '2026-06-01 17:39:49'),
(130, 'Bernita Reynolds', '4164055174', '3924474047', 'bailey.eloisa@example.org', 'Barranquilla', 'Cra 19 #27-42', 'Supervisor', '2025-12-06 04:56:14', '2026-06-01 17:39:49'),
(131, 'Ismael Mitchell', '8827423110', '3949013241', 'roxane.parker@example.org', 'Ibagué', 'Cra 36 #87-7', 'Control de Calidad', '2026-05-11 03:07:25', '2026-06-01 17:39:49'),
(132, 'Ted Ratke III', '0450335361', '3619631064', 'felicia39@example.com', 'Medellín', 'Cra 44 #19-2', 'Mensajero', '2026-04-30 14:43:37', '2026-06-01 17:39:49'),
(133, 'Bailey Hoeger', '2351972567', '3985424634', 'lurline.zboncak@example.com', 'Bucaramanga', 'Cra 10 #41-75', 'Auxiliar', '2024-09-11 08:24:42', '2026-06-01 17:39:49'),
(134, 'Florida Luettgen', '8270793612', '3769902598', 'bahringer.alessia@example.com', 'Bucaramanga', 'Cra 19 #59-30', 'Mensajero', '2023-12-04 14:31:06', '2026-06-01 17:39:49'),
(135, 'Camden Wilderman', '4142742203', '3262210869', 'dfisher@example.org', 'Manizales', 'Cra 29 #20-21', 'Costurero', '2025-03-17 01:17:14', '2026-06-01 17:39:49'),
(136, 'Alisha Block', '7234193639', '3571337735', 'deckow.houston@example.org', 'Pereira', 'Cra 25 #14-25', 'Operario', '2026-01-27 06:48:09', '2026-06-01 17:39:49'),
(137, 'Rupert Gorczany', '6166770806', '3503652285', 'hdeckow@example.org', 'Armenia', 'Cra 26 #19-57', 'Auxiliar', '2025-06-04 12:06:30', '2026-06-01 17:39:49'),
(138, 'Brionna Koepp', '4797920242', '3256983796', 'dario.shields@example.com', 'Bogotá', 'Cra 41 #88-9', 'Costurero', '2025-02-24 05:45:25', '2026-06-01 17:39:49'),
(139, 'Maritza Swift', '3842063113', '3974411257', 'zachary.weissnat@example.com', 'Neiva', 'Cra 46 #55-47', 'Almacenista', '2024-02-01 00:13:37', '2026-06-01 17:39:49'),
(140, 'Daphnee Grimes', '3153704481', '3610871892', 'frederik.beier@example.org', 'Barranquilla', 'Cra 27 #14-55', 'Operario', '2024-06-20 13:05:55', '2026-06-01 17:39:49'),
(141, 'Dr. Brennon Bartell PhD', '4418518373', '3117867066', 'nathanial54@example.org', 'Pereira', 'Cra 42 #52-97', 'Operario', '2025-07-15 05:09:48', '2026-06-01 17:39:49'),
(142, 'Orlando Runte', '4694541531', '3401808699', 'cdeckow@example.net', 'Neiva', 'Cra 33 #33-46', 'Almacenista', '2024-12-16 23:55:48', '2026-06-01 17:39:49'),
(143, 'Prof. Rubye Jerde', '2792273083', '3048612512', 'annette.quitzon@example.net', 'Neiva', 'Cra 47 #3-35', 'Mensajero', '2024-10-29 23:05:27', '2026-06-01 17:39:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_materia_prima`
--

CREATE TABLE `entradas_materia_prima` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materia_prima_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_nombre` varchar(255) NOT NULL,
  `observacion` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `entradas_materia_prima`
--

INSERT INTO `entradas_materia_prima` (`id`, `materia_prima_id`, `cantidad`, `fecha`, `usuario_nombre`, `observacion`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 142, 379, '2024-09-05', 'Emmitt Grimes', 'Compra urgente', 34, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(2, 4, 18, '2024-07-15', 'Miss Christiana Bogan Jr.', 'Devolución proveedor', 72, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(3, 102, 481, '2026-05-15', 'Dasia Goyette IV', 'Reposición de stock', 46, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(4, 140, 76, '2025-09-05', 'Virgie Bergnaum III', 'Reposición de stock', 15, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(5, 152, 211, '2026-03-18', 'Kirk Mitchell', 'Compra urgente', 111, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(6, 113, 190, '2025-05-31', 'Dr. Amir Goyette', 'Pedido mensual', 48, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(7, 27, 217, '2024-10-01', 'Jordyn Schinner', 'Compra adicional', 7, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(8, 53, 209, '2025-11-22', 'Jerald Lynch', 'Compra adicional', 78, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(9, 121, 444, '2024-12-05', 'Cassandra Wiegand', 'Pedido mensual', 52, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(10, 66, 214, '2025-04-03', 'Heidi Schulist', 'Reposición de stock', 16, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(11, 155, 283, '2024-07-24', 'Prof. Kathlyn Maggio', 'Compra adicional', 38, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(12, 120, 370, '2025-07-05', 'Paolo Mertz', 'Compra adicional', 86, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(13, 122, 384, '2025-04-06', 'Aubree Koch', 'Compra urgente', 105, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(14, 88, 384, '2024-12-17', 'Dr. Isom Gutmann', 'Compra adicional', 14, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(15, 11, 150, '2025-11-23', 'Brian Jakubowski', 'Pedido mensual', 12, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(16, 142, 12, '2026-02-02', 'Prof. Mya Zieme', 'Devolución proveedor', 109, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(17, 9, 20, '2025-12-11', 'Rhea Kling', 'Reposición de stock', 84, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(18, 28, 343, '2026-01-09', 'Merle Schmeler', 'Compra adicional', 19, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(19, 94, 61, '2024-07-23', 'Mr. Brain Mayert II', 'Reposición de stock', 127, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(20, 58, 41, '2024-07-19', 'Amaya Skiles', 'Compra adicional', 135, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(21, 28, 34, '2025-05-08', 'Katarina Jast', 'Pedido mensual', 37, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(22, 28, 275, '2025-07-22', 'Miss Itzel Mann DDS', 'Compra urgente', 102, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(23, 64, 402, '2024-09-04', 'Mrs. Kristina DuBuque DVM', 'Compra adicional', 80, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(24, 78, 478, '2025-11-24', 'Prof. Kathlyn Maggio', 'Reposición de stock', 38, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(25, 45, 57, '2025-08-05', 'Fannie Jakubowski', 'Compra adicional', 113, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(26, 81, 242, '2025-01-15', 'Nya Torp', 'Pedido mensual', 97, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(27, 155, 442, '2025-10-27', 'Santina Hessel', 'Devolución proveedor', 115, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(28, 109, 134, '2024-11-08', 'Mr. Carey Kiehn Sr.', 'Compra urgente', 125, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(29, 117, 242, '2026-05-13', 'Amaya Skiles', 'Devolución proveedor', 135, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(30, 138, 82, '2025-07-23', 'Prof. Addie Kessler II', 'Lote importado', 67, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(31, 115, 164, '2025-01-11', 'Nia Haag', 'Lote importado', 133, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(32, 41, 474, '2026-01-05', 'Ryan Schimmel', 'Compra urgente', 89, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(33, 19, 434, '2025-09-01', 'Matilda Bechtelar', 'Compra urgente', 82, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(34, 21, 398, '2026-05-13', 'Candice Jaskolski', 'Pedido mensual', 112, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(35, 110, 370, '2025-11-16', 'Dr. Emmanuelle Ritchie Sr.', 'Compra urgente', 107, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(36, 95, 346, '2025-11-25', 'Paolo Mertz', 'Devolución proveedor', 86, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(37, 74, 365, '2025-08-02', 'Fannie Jakubowski', 'Devolución proveedor', 113, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(38, 144, 280, '2025-11-17', 'Noel Heathcote', 'Compra adicional', 110, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(39, 123, 45, '2025-11-22', 'Miss Itzel Mann DDS', 'Devolución proveedor', 102, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(40, 144, 188, '2024-07-17', 'Mallie Considine', 'Devolución proveedor', 63, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(41, 143, 415, '2025-05-11', 'Vivian Gleason', 'Devolución proveedor', 54, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(42, 78, 370, '2024-08-24', 'Percival McLaughlin II', 'Reposición de stock', 11, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(43, 155, 378, '2024-09-01', 'Dr. Deron Kerluke', 'Pedido mensual', 122, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(44, 5, 460, '2026-04-21', 'Alfred Moen Sr.', 'Compra adicional', 101, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(45, 127, 242, '2025-04-13', 'Damion Lehner', 'Lote importado', 65, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(46, 147, 14, '2025-10-09', 'Daryl Pfeffer', 'Compra urgente', 83, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(47, 85, 239, '2025-10-25', 'Dr. Vivian Klein', 'Pedido mensual', 131, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(48, 74, 420, '2025-06-23', 'Nichole Dickinson DDS', 'Pedido mensual', 76, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(49, 153, 187, '2025-11-09', 'Yoshiko Johnston', 'Pedido mensual', 44, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(50, 90, 270, '2025-10-20', 'Fredrick Rath MD', 'Lote importado', 43, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(51, 21, 420, '2024-12-24', 'Shany Douglas', 'Lote importado', 36, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(52, 60, 486, '2025-10-28', 'Noel Heathcote', 'Compra urgente', 110, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(53, 73, 376, '2024-12-10', 'Eduardo Kovacek', 'Pedido mensual', 123, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(54, 57, 335, '2025-06-01', 'Matilda Bechtelar', 'Compra adicional', 82, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(55, 106, 27, '2026-05-24', 'Miss Odessa Orn DDS', 'Pedido mensual', 77, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(56, 136, 487, '2026-01-09', 'Candice Jaskolski', 'Reposición de stock', 112, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(57, 87, 260, '2026-04-28', 'Prof. Javier Fritsch MD', 'Lote importado', 128, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(58, 127, 212, '2026-02-26', 'Dr. Aric Parisian', 'Devolución proveedor', 92, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(59, 12, 465, '2025-08-17', 'Miss Hassie Rogahn', 'Compra adicional', 31, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(60, 83, 112, '2026-04-13', 'Dawson Swift', 'Reposición de stock', 5, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(61, 137, 500, '2024-06-20', 'Ms. Lea Runte DDS', 'Compra urgente', 56, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(62, 34, 17, '2025-08-14', 'Prof. Owen Bogan', 'Pedido mensual', 121, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(63, 100, 469, '2025-09-05', 'Mrs. Camila Hayes', 'Lote importado', 64, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(64, 60, 325, '2024-06-17', 'Dr. Annamae Rodriguez IV', 'Compra adicional', 23, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(65, 132, 211, '2025-10-18', 'Virgie Bergnaum III', 'Lote importado', 15, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(66, 158, 47, '2025-09-29', 'Eda Smith', 'Lote importado', 4, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(67, 58, 405, '2026-02-25', 'Alexandria Senger', 'Devolución proveedor', 98, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(68, 147, 272, '2025-12-26', 'Ms. Adelle Stracke', 'Compra adicional', 55, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(69, 144, 204, '2024-10-02', 'Jerad Becker', 'Pedido mensual', 81, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(70, 130, 293, '2024-08-10', 'Magdalena Witting', 'Compra adicional', 49, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(71, 50, 27, '2025-04-09', 'Nyah Abernathy', 'Compra urgente', 136, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(72, 66, 313, '2025-06-30', 'Dr. Deron Kerluke', 'Lote importado', 122, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(73, 31, 55, '2026-05-17', 'Miss Odessa Orn DDS', 'Pedido mensual', 77, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(74, 131, 245, '2025-07-22', 'Dr. Terence Kiehn II', 'Reposición de stock', 114, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(75, 85, 296, '2025-01-11', 'Addie Schmeler', 'Compra adicional', 108, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(76, 157, 495, '2026-05-22', 'Prof. Candida Lubowitz PhD', 'Reposición de stock', 129, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(77, 101, 143, '2024-10-24', 'Zola Lubowitz', 'Devolución proveedor', 8, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(78, 105, 467, '2024-12-22', 'Prof. Addie Kessler II', 'Devolución proveedor', 67, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(79, 147, 261, '2024-10-27', 'Korbin Wehner', 'Compra urgente', 103, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(80, 134, 49, '2025-12-22', 'Ned Bosco', 'Pedido mensual', 60, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(81, 132, 367, '2024-06-25', 'Shany Douglas', 'Devolución proveedor', 36, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(82, 73, 317, '2024-09-10', 'Merle Schmeler', 'Reposición de stock', 19, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(83, 147, 254, '2026-05-06', 'Miss Itzel Mann DDS', 'Compra urgente', 102, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(84, 39, 192, '2026-04-29', 'Eliza Lakin', 'Lote importado', 68, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(85, 89, 386, '2025-03-07', 'Flossie Graham', 'Devolución proveedor', 124, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(86, 127, 158, '2026-05-16', 'Heidi Schulist', 'Reposición de stock', 16, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(87, 75, 271, '2026-05-20', 'Nyah Abernathy', 'Pedido mensual', 136, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(88, 128, 252, '2024-11-06', 'Noemi Auer', 'Pedido mensual', 28, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(89, 55, 32, '2025-10-11', 'Virgie Bergnaum III', 'Pedido mensual', 15, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(90, 116, 477, '2025-01-30', 'Prof. Oliver Pouros', 'Reposición de stock', 9, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(91, 100, 342, '2024-10-27', 'Administrador Principal', 'Pedido mensual', 1, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(92, 127, 309, '2025-03-05', 'Miss Odessa Orn DDS', 'Reposición de stock', 77, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(93, 63, 388, '2026-01-08', 'Ms. Bridget Gerlach I', 'Lote importado', 93, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(94, 91, 474, '2024-09-23', 'Eduardo Kovacek', 'Pedido mensual', 123, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(95, 119, 409, '2025-11-09', 'Dr. Isom Gutmann', 'Reposición de stock', 14, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(96, 150, 52, '2025-11-09', 'Loyce Cronin', 'Devolución proveedor', 18, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(97, 43, 158, '2025-02-04', 'Dr. Vivian Klein', 'Compra adicional', 131, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(98, 148, 363, '2024-09-03', 'Rashad Hill', 'Compra urgente', 88, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(99, 65, 240, '2026-03-17', 'Anastasia Lang', 'Compra adicional', 90, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(100, 45, 225, '2024-08-10', 'Fannie Jakubowski', 'Reposición de stock', 113, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(101, 56, 77, '2025-01-25', 'Hudson Hayes', 'Lote importado', 66, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(102, 138, 93, '2024-10-16', 'Giuseppe Botsford', 'Compra adicional', 6, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(103, 140, 171, '2025-11-24', 'Damien Cole', 'Devolución proveedor', 29, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(104, 44, 445, '2025-06-28', 'Mallie Considine', 'Compra adicional', 63, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(105, 74, 433, '2026-04-03', 'Noel Heathcote', 'Pedido mensual', 110, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(106, 132, 488, '2024-07-28', 'Mr. Santa Streich', 'Devolución proveedor', 118, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(107, 158, 448, '2025-01-01', 'Alda Stiedemann', 'Devolución proveedor', 20, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(108, 91, 147, '2025-04-03', 'Melyna Bartell', 'Devolución proveedor', 73, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(109, 98, 459, '2026-03-13', 'Jordyn Schinner', 'Devolución proveedor', 7, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(110, 32, 322, '2024-11-30', 'Dr. Annamae Rodriguez IV', 'Reposición de stock', 23, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(111, 11, 210, '2026-01-25', 'Vivian Gleason', 'Devolución proveedor', 54, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(112, 128, 312, '2025-10-11', 'Sarah Rau', 'Pedido mensual', 17, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(113, 134, 114, '2025-05-22', 'Administrador Principal', 'Lote importado', 1, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(114, 9, 398, '2024-10-24', 'Mrs. Camila Hayes', 'Reposición de stock', 64, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(115, 46, 48, '2024-10-30', 'Merle Schmeler', 'Lote importado', 19, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(116, 13, 275, '2024-10-06', 'Mallie Considine', 'Pedido mensual', 63, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(117, 21, 62, '2026-04-08', 'Kellie Johnson I', 'Compra adicional', 120, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(118, 144, 459, '2025-12-13', 'Ryan Schimmel', 'Lote importado', 89, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(119, 33, 439, '2025-10-05', 'Administrador Principal', 'Pedido mensual', 1, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(120, 64, 489, '2024-07-17', 'Dr. Isom Gutmann', 'Pedido mensual', 14, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(121, 10, 198, '2025-08-20', 'Prof. Else Gaylord', 'Compra urgente', 32, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(122, 62, 475, '2025-02-28', 'Rashad Hill', 'Compra adicional', 88, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(123, 70, 456, '2025-11-28', 'Rosalee Rogahn', 'Pedido mensual', 21, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(124, 148, 63, '2024-10-01', 'Ms. Adelle Stracke', 'Compra adicional', 55, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(125, 117, 66, '2024-12-25', 'Karelle O\'Hara', 'Devolución proveedor', 40, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(126, 4, 88, '2024-07-03', 'Alfred Moen Sr.', 'Pedido mensual', 101, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(127, 125, 314, '2025-05-13', 'Prof. Else Gaylord', 'Compra adicional', 32, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(128, 39, 41, '2026-02-23', 'Mrs. Alexandra Jacobson I', 'Compra urgente', 71, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(129, 4, 34, '2024-06-02', 'Dr. Terence Kiehn II', 'Compra urgente', 114, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(130, 158, 196, '2024-11-22', 'Dr. Deron Kerluke', 'Lote importado', 122, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(131, 69, 11, '2025-06-20', 'Prof. Kathlyn Maggio', 'Compra adicional', 38, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(132, 9, 341, '2025-12-16', 'Breanna Krajcik', 'Devolución proveedor', 57, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(133, 15, 52, '2024-11-07', 'Raegan Grant', 'Lote importado', 74, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(134, 28, 70, '2025-07-06', 'Ms. Lea Runte DDS', 'Compra adicional', 56, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(135, 12, 322, '2025-01-22', 'Dr. Annamae Rodriguez IV', 'Compra urgente', 23, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(136, 23, 126, '2025-11-15', 'Dr. Annamae Rodriguez IV', 'Compra adicional', 23, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(137, 122, 98, '2026-01-20', 'Mr. Santa Streich', 'Devolución proveedor', 118, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(138, 36, 66, '2024-12-22', 'Merle Schmeler', 'Lote importado', 19, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(139, 75, 358, '2026-05-19', 'Dawson Swift', 'Pedido mensual', 5, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(140, 122, 330, '2025-10-14', 'Breanna Krajcik', 'Compra urgente', 57, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(141, 62, 122, '2025-01-29', 'Prof. Candida Lubowitz PhD', 'Compra adicional', 129, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(142, 11, 93, '2025-08-10', 'Prof. Candida Lubowitz PhD', 'Devolución proveedor', 129, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(143, 38, 132, '2026-05-17', 'Matilda Bechtelar', 'Compra urgente', 82, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(144, 14, 263, '2025-01-17', 'Elwin Tremblay', 'Lote importado', 106, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(145, 116, 299, '2026-02-27', 'Prof. Lewis Langosh', 'Compra adicional', 69, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(146, 90, 369, '2025-06-02', 'Breanna Krajcik', 'Reposición de stock', 57, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(147, 75, 242, '2025-12-29', 'Dr. Berenice Tremblay', 'Lote importado', 50, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(148, 27, 226, '2025-04-18', 'Nia Haag', 'Lote importado', 133, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(149, 81, 427, '2024-11-13', 'Jerald Lynch', 'Pedido mensual', 78, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(150, 7, 198, '2025-10-05', 'Lynn Kuhn', 'Compra adicional', 45, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(151, 87, 229, '2025-02-28', 'Mr. Brain Mayert II', 'Compra urgente', 127, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(152, 127, 110, '2026-03-16', 'Westley Friesen', 'Pedido mensual', 42, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(153, 138, 298, '2025-01-21', 'Estrella Towne', 'Pedido mensual', 26, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(154, 155, 436, '2025-09-22', 'Magdalena Witting', 'Compra urgente', 49, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(155, 115, 294, '2024-11-03', 'Asia Jacobson', 'Compra adicional', 132, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(156, 66, 10, '2024-09-17', 'Nyah Abernathy', 'Compra adicional', 136, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(157, 150, 296, '2025-06-12', 'Loyce Cronin', 'Compra urgente', 18, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(158, 83, 309, '2025-05-23', 'Estrella Towne', 'Reposición de stock', 26, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(159, 149, 147, '2026-04-08', 'Prof. Javier Fritsch MD', 'Reposición de stock', 128, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(160, 1, 122, '2025-05-29', 'Dawson Swift', 'Devolución proveedor', 5, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(161, 99, 192, '2025-11-17', 'Sigrid Weber', 'Reposición de stock', 126, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(162, 55, 196, '2026-05-16', 'Eduardo Kovacek', 'Devolución proveedor', 123, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(163, 39, 251, '2026-03-24', 'Prof. Haven Barton', 'Pedido mensual', 75, '2026-06-01 17:39:50', '2026-06-01 17:39:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_primas`
--

CREATE TABLE `materia_primas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `empleado_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materia_primas`
--

INSERT INTO `materia_primas` (`id`, `nombre`, `tipo`, `color`, `stock`, `precio`, `empleado_id`, `created_at`, `updated_at`) VALUES
(1, 'Accesorio necessitatibus 1', 'Accesorio', 'Café', 510, 43501.38, 123, '2024-03-15 12:27:58', '2026-06-01 17:39:49'),
(2, 'Pegante hic 2', 'Pegante', 'Blanco', 1686, 75125.50, 21, '2024-03-22 17:12:30', '2026-06-01 17:39:49'),
(3, 'Hilo quaerat 3', 'Hilo', 'Plateado', 243, 58893.39, 39, '2025-04-15 12:26:00', '2026-06-01 17:39:49'),
(4, 'Suela nemo 4', 'Suela', 'Blanco', 805, 17486.42, 103, '2024-04-20 03:28:28', '2026-06-01 17:39:49'),
(5, 'Tela occaecati 5', 'Tela', 'Dorado', 998, 78209.88, 52, '2025-03-12 12:48:59', '2026-06-01 17:39:49'),
(6, 'Plantilla nulla 6', 'Plantilla', 'Blanco', 621, 73595.70, 3, '2023-07-21 09:06:14', '2026-06-01 17:39:49'),
(7, 'Tela ut 7', 'Tela', 'Café', 1939, 3746.61, 13, '2024-10-22 04:21:25', '2026-06-01 17:39:49'),
(8, 'Plantilla temporibus 8', 'Plantilla', 'Azul', 118, 34621.60, 52, '2023-06-27 01:14:44', '2026-06-01 17:39:49'),
(9, 'Cuero recusandae 9', 'Cuero', 'Verde', 1456, 41982.03, 25, '2026-01-17 14:13:55', '2026-06-01 17:39:49'),
(10, 'Plantilla qui 10', 'Plantilla', 'Beige', 1381, 74008.65, 103, '2023-07-08 11:16:55', '2026-06-01 17:39:49'),
(11, 'Hilo vero 11', 'Hilo', 'Dorado', 83, 19148.70, 22, '2024-09-16 08:06:46', '2026-06-01 17:39:49'),
(12, 'Pegante quo 12', 'Pegante', 'Beige', 295, 20938.72, 123, '2024-09-26 02:33:26', '2026-06-01 17:39:49'),
(13, 'Cuero quos 13', 'Cuero', 'Negro', 103, 15823.60, 129, '2024-08-02 23:10:42', '2026-06-01 17:39:49'),
(14, 'Plantilla quae 14', 'Plantilla', 'Gris', 1170, 39848.86, 24, '2024-05-17 18:05:13', '2026-06-01 17:39:49'),
(15, 'Tela et 15', 'Tela', 'Gris', 298, 10090.02, 53, '2023-07-07 04:16:24', '2026-06-01 17:39:49'),
(17, 'Espuma hic 17', 'Espuma', 'Blanco', 1732, 31788.23, 25, '2023-11-07 19:19:17', '2026-06-01 17:39:49'),
(18, 'Espuma alias 18', 'Espuma', 'Gris', 1852, 25891.00, 3, '2025-03-14 22:49:02', '2026-06-01 17:39:49'),
(19, 'Plantilla accusamus 19', 'Plantilla', 'Café', 1956, 51237.06, 14, '2024-05-19 23:49:01', '2026-06-01 17:39:49'),
(20, 'Suela qui 20', 'Suela', 'Blanco', 1234, 45852.45, 129, '2024-11-09 06:52:17', '2026-06-01 17:39:49'),
(21, 'Cuero cupiditate 21', 'Cuero', 'Café', 560, 53649.84, 89, '2024-02-21 05:10:22', '2026-06-01 17:39:49'),
(22, 'Hilo deserunt 22', 'Hilo', 'Dorado', 1881, 60507.06, 82, '2023-12-12 00:30:55', '2026-06-01 17:39:49'),
(23, 'Pegante eum 23', 'Pegante', 'Café', 450, 17745.85, 39, '2025-12-19 18:40:00', '2026-06-01 17:39:49'),
(24, 'Pegante fugiat 24', 'Pegante', 'Dorado', 490, 52602.92, 65, '2024-01-02 08:34:38', '2026-06-01 17:39:49'),
(25, 'Suela quidem 25', 'Suela', 'Beige', 635, 63296.96, 142, '2025-11-26 08:19:06', '2026-06-01 17:39:49'),
(26, 'Tela nihil 26', 'Tela', 'Verde', 1622, 32389.26, 88, '2026-03-31 21:32:20', '2026-06-01 17:39:49'),
(27, 'Suela dolores 27', 'Suela', 'Verde', 1154, 22310.22, 105, '2023-06-10 14:25:28', '2026-06-01 17:39:49'),
(28, 'Hilo consequuntur 28', 'Hilo', 'Gris', 1175, 70935.07, 92, '2024-05-29 22:51:20', '2026-06-01 17:39:49'),
(29, 'Accesorio aspernatur 29', 'Accesorio', 'Gris', 950, 32545.55, 120, '2026-04-28 15:08:56', '2026-06-01 17:39:49'),
(30, 'Cuero et 30', 'Cuero', 'Azul', 1101, 78433.28, 69, '2023-06-15 10:52:09', '2026-06-01 17:39:49'),
(31, 'Hilo sed 31', 'Hilo', 'Beige', 1400, 61771.47, 80, '2024-02-18 14:38:01', '2026-06-01 17:39:49'),
(32, 'Espuma deleniti 32', 'Espuma', 'Café', 703, 49047.69, 90, '2023-10-16 10:04:57', '2026-06-01 17:39:49'),
(33, 'Espuma asperiores 33', 'Espuma', 'Café', 1241, 18808.03, 18, '2023-07-10 21:27:03', '2026-06-01 17:39:49'),
(34, 'Espuma ex 34', 'Espuma', 'Plateado', 168, 28604.38, 51, '2023-09-02 14:45:44', '2026-06-01 17:39:49'),
(35, 'Pegante ullam 35', 'Pegante', 'Blanco', 1703, 69606.22, 107, '2026-05-25 23:27:54', '2026-06-01 17:39:49'),
(36, 'Pegante et 36', 'Pegante', 'Dorado', 1116, 62665.02, 130, '2025-10-04 08:22:27', '2026-06-01 17:39:49'),
(37, 'Plantilla voluptatem 37', 'Plantilla', 'Rojo', 1109, 66899.73, 142, '2025-08-03 08:57:02', '2026-06-01 17:39:49'),
(38, 'Espuma ullam 38', 'Espuma', 'Rojo', 1284, 19148.07, 103, '2025-10-24 11:17:18', '2026-06-01 17:39:49'),
(39, 'Plantilla voluptatum 39', 'Plantilla', 'Plateado', 1809, 78474.74, 73, '2024-11-26 18:58:32', '2026-06-01 17:39:49'),
(40, 'Hilo reprehenderit 40', 'Hilo', 'Plateado', 1162, 50512.80, 77, '2025-04-28 01:55:56', '2026-06-01 17:39:49'),
(41, 'Plantilla ducimus 41', 'Plantilla', 'Blanco', 1527, 8838.77, 40, '2026-05-15 01:59:29', '2026-06-01 17:39:49'),
(42, 'Suela nulla 42', 'Suela', 'Azul', 1424, 79272.10, 64, '2025-06-10 06:10:09', '2026-06-01 17:39:49'),
(43, 'Plantilla ipsum 43', 'Plantilla', 'Negro', 1464, 3063.85, 28, '2025-03-07 13:50:54', '2026-06-01 17:39:49'),
(44, 'Espuma hic 44', 'Espuma', 'Verde', 299, 75561.15, 64, '2024-06-14 14:59:36', '2026-06-01 17:39:49'),
(45, 'Espuma ab 45', 'Espuma', 'Blanco', 766, 5632.35, 137, '2025-11-07 16:04:11', '2026-06-01 17:39:49'),
(46, 'Suela molestiae 46', 'Suela', 'Beige', 1683, 39715.78, 85, '2025-07-19 08:49:06', '2026-06-01 17:39:49'),
(47, 'Plantilla dignissimos 47', 'Plantilla', 'Plateado', 1882, 65674.98, 94, '2024-03-07 07:12:44', '2026-06-01 17:39:49'),
(48, 'Pegante velit 48', 'Pegante', 'Azul', 1504, 37982.87, 132, '2025-09-28 01:32:52', '2026-06-01 17:39:49'),
(49, 'Accesorio non 49', 'Accesorio', 'Blanco', 481, 43925.10, 143, '2024-12-19 23:40:09', '2026-06-01 17:39:49'),
(50, 'Accesorio pariatur 50', 'Accesorio', 'Plateado', 982, 69845.46, 65, '2024-10-02 02:35:01', '2026-06-01 17:39:49'),
(51, 'Pegante veritatis 51', 'Pegante', 'Dorado', 588, 74415.80, 123, '2023-08-10 08:36:30', '2026-06-01 17:39:49'),
(52, 'Accesorio quibusdam 52', 'Accesorio', 'Gris', 865, 23169.11, 70, '2025-03-28 22:32:24', '2026-06-01 17:39:49'),
(53, 'Tela consequuntur 53', 'Tela', 'Azul', 658, 69621.27, 97, '2026-02-19 19:32:54', '2026-06-01 17:39:49'),
(54, 'Plantilla ut 54', 'Plantilla', 'Dorado', 1685, 4994.48, 58, '2025-03-04 10:38:47', '2026-06-01 17:39:49'),
(55, 'Plantilla facilis 55', 'Plantilla', 'Verde', 82, 9417.68, 66, '2023-06-04 01:27:23', '2026-06-01 17:39:49'),
(56, 'Pegante in 56', 'Pegante', 'Dorado', 127, 13673.17, 87, '2024-04-15 05:19:18', '2026-06-01 17:39:49'),
(57, 'Espuma minima 57', 'Espuma', 'Azul', 628, 72380.82, 125, '2023-11-23 08:07:46', '2026-06-01 17:39:49'),
(58, 'Cuero error 58', 'Cuero', 'Café', 325, 27067.67, 23, '2024-10-24 01:21:00', '2026-06-01 17:39:49'),
(59, 'Espuma ipsam 59', 'Espuma', 'Azul', 1740, 2718.25, 112, '2024-07-27 00:49:22', '2026-06-01 17:39:49'),
(60, 'Cuero eum 60', 'Cuero', 'Rojo', 1811, 18851.90, 111, '2025-05-20 02:13:31', '2026-06-01 17:39:49'),
(61, 'Plantilla facere 61', 'Plantilla', 'Plateado', 1766, 17284.61, 56, '2026-01-06 18:31:29', '2026-06-01 17:39:49'),
(62, 'Pegante nulla 62', 'Pegante', 'Rojo', 849, 11738.93, 60, '2023-08-20 09:36:13', '2026-06-01 17:39:49'),
(63, 'Accesorio voluptatem 63', 'Accesorio', 'Azul', 1387, 32240.87, 34, '2025-06-20 12:12:14', '2026-06-01 17:39:49'),
(64, 'Pegante vero 64', 'Pegante', 'Rojo', 1115, 32058.25, 17, '2024-12-18 23:43:32', '2026-06-01 17:39:49'),
(65, 'Suela voluptates 65', 'Suela', 'Negro', 1239, 35517.82, 106, '2023-11-02 05:12:24', '2026-06-01 17:39:49'),
(66, 'Tela neque 66', 'Tela', 'Gris', 477, 4767.87, 132, '2025-07-17 11:24:53', '2026-06-01 17:39:49'),
(67, 'Hilo eos 67', 'Hilo', 'Verde', 551, 46874.01, 87, '2025-06-06 16:46:49', '2026-06-01 17:39:49'),
(68, 'Suela facilis 68', 'Suela', 'Azul', 1826, 54161.51, 7, '2024-06-25 19:35:57', '2026-06-01 17:39:49'),
(69, 'Tela debitis 69', 'Tela', 'Plateado', 1855, 3512.65, 5, '2024-06-23 16:46:00', '2026-06-01 17:39:49'),
(70, 'Plantilla cumque 70', 'Plantilla', 'Negro', 984, 39921.28, 100, '2024-09-05 17:58:35', '2026-06-01 17:39:49'),
(71, 'Pegante eaque 71', 'Pegante', 'Rojo', 69, 41443.80, 17, '2023-09-05 04:54:33', '2026-06-01 17:39:49'),
(72, 'Espuma aut 72', 'Espuma', 'Café', 227, 77662.31, 4, '2025-08-08 12:43:45', '2026-06-01 17:39:49'),
(73, 'Plantilla tempora 73', 'Plantilla', 'Café', 339, 4701.68, 72, '2024-06-28 19:16:15', '2026-06-01 17:39:49'),
(74, 'Cuero praesentium 74', 'Cuero', 'Dorado', 115, 20707.96, 141, '2025-02-01 14:36:01', '2026-06-01 17:39:49'),
(75, 'Suela aperiam 75', 'Suela', 'Azul', 1713, 2278.86, 15, '2024-02-06 13:11:06', '2026-06-01 17:39:49'),
(76, 'Cuero dolores 76', 'Cuero', 'Café', 1192, 16257.47, 79, '2023-11-20 20:36:56', '2026-06-01 17:39:49'),
(77, 'Plantilla recusandae 77', 'Plantilla', 'Café', 389, 24939.34, 140, '2024-08-03 02:10:24', '2026-06-01 17:39:49'),
(78, 'Suela tempore 78', 'Suela', 'Café', 1185, 48171.25, 134, '2024-06-14 01:58:33', '2026-06-01 17:39:49'),
(80, 'Accesorio sit 80', 'Accesorio', 'Beige', 1019, 9400.19, 134, '2025-10-29 07:19:16', '2026-06-01 17:39:49'),
(81, 'Cuero porro 81', 'Cuero', 'Verde', 841, 51617.61, 104, '2023-12-22 05:23:22', '2026-06-01 17:39:49'),
(82, 'Suela officiis 82', 'Suela', 'Dorado', 1704, 69407.97, 26, '2025-12-26 05:16:05', '2026-06-01 17:39:49'),
(83, 'Hilo rerum 83', 'Hilo', 'Azul', 1405, 7182.60, 42, '2025-01-18 16:32:50', '2026-06-01 17:39:49'),
(84, 'Accesorio laudantium 84', 'Accesorio', 'Café', 1574, 16483.20, 136, '2023-10-22 18:00:39', '2026-06-01 17:39:49'),
(85, 'Hilo reiciendis 85', 'Hilo', 'Plateado', 1680, 39618.13, 88, '2024-11-27 10:55:30', '2026-06-01 17:39:49'),
(86, 'Suela deleniti 86', 'Suela', 'Blanco', 1271, 53682.52, 79, '2025-09-20 16:27:38', '2026-06-01 17:39:49'),
(87, 'Hilo culpa 87', 'Hilo', 'Azul', 1358, 59329.87, 137, '2025-04-11 03:03:22', '2026-06-01 17:39:49'),
(88, 'Espuma quia 88', 'Espuma', 'Verde', 1337, 46666.35, 61, '2024-01-05 23:24:45', '2026-06-01 17:39:49'),
(89, 'Suela saepe 89', 'Suela', 'Dorado', 1628, 73895.21, 83, '2024-08-06 11:00:27', '2026-06-01 17:39:49'),
(90, 'Hilo perspiciatis 90', 'Hilo', 'Blanco', 713, 4570.27, 35, '2025-01-26 08:44:43', '2026-06-01 17:39:49'),
(91, 'Accesorio iusto 91', 'Accesorio', 'Dorado', 1805, 76476.37, 115, '2025-02-28 20:18:24', '2026-06-01 17:39:49'),
(92, 'Accesorio consequatur 92', 'Accesorio', 'Gris', 1898, 52877.04, 46, '2025-06-21 01:54:03', '2026-06-01 17:39:49'),
(93, 'Tela corrupti 93', 'Tela', 'Gris', 1140, 11022.38, 122, '2024-01-09 04:06:10', '2026-06-01 17:39:49'),
(94, 'Hilo eaque 94', 'Hilo', 'Beige', 1124, 28825.59, 12, '2025-07-01 13:17:18', '2026-06-01 17:39:49'),
(95, 'Hilo eius 95', 'Hilo', 'Azul', 399, 20587.35, 24, '2023-07-09 04:43:01', '2026-06-01 17:39:49'),
(96, 'Pegante occaecati 96', 'Pegante', 'Azul', 1055, 12007.79, 55, '2024-10-29 09:55:15', '2026-06-01 17:39:49'),
(97, 'Cuero est 97', 'Cuero', 'Negro', 1323, 2587.99, 80, '2025-01-13 10:39:15', '2026-06-01 17:39:49'),
(98, 'Suela sed 98', 'Suela', 'Rojo', 1063, 35915.47, 29, '2023-07-21 14:56:25', '2026-06-01 17:39:49'),
(99, 'Plantilla illo 99', 'Plantilla', 'Plateado', 1023, 36298.26, 106, '2024-04-16 02:22:27', '2026-06-01 17:39:49'),
(100, 'Plantilla sit 100', 'Plantilla', 'Blanco', 1954, 60386.62, 61, '2023-07-31 15:37:55', '2026-06-01 17:39:49'),
(101, 'Tela molestiae 101', 'Tela', 'Verde', 216, 47498.01, 85, '2024-12-22 00:14:17', '2026-06-01 17:39:49'),
(102, 'Pegante a 102', 'Pegante', 'Gris', 1589, 3392.83, 63, '2024-05-27 05:41:55', '2026-06-01 17:39:49'),
(103, 'Tela numquam 103', 'Tela', 'Negro', 856, 2061.66, 108, '2025-10-04 11:21:33', '2026-06-01 17:39:49'),
(104, 'Espuma praesentium 104', 'Espuma', 'Negro', 1559, 62876.80, 114, '2023-11-23 18:16:34', '2026-06-01 17:39:49'),
(105, 'Tela minus 105', 'Tela', 'Rojo', 1575, 4432.68, 139, '2026-01-26 02:17:18', '2026-06-01 17:39:49'),
(106, 'Espuma beatae 106', 'Espuma', 'Plateado', 1390, 63121.00, 47, '2024-07-12 20:29:24', '2026-06-01 17:39:49'),
(107, 'Suela sed 107', 'Suela', 'Café', 1379, 23109.84, 96, '2025-04-26 16:40:53', '2026-06-01 17:39:49'),
(108, 'Accesorio quo 108', 'Accesorio', 'Negro', 838, 68163.21, 76, '2025-01-19 19:14:23', '2026-06-01 17:39:49'),
(109, 'Suela nam 109', 'Suela', 'Dorado', 1382, 55970.06, 130, '2026-04-12 22:44:20', '2026-06-01 17:39:49'),
(110, 'Pegante corrupti 110', 'Pegante', 'Dorado', 349, 59894.99, 31, '2024-04-14 03:54:01', '2026-06-01 17:39:49'),
(111, 'Plantilla sint 111', 'Plantilla', 'Negro', 1628, 67122.84, 18, '2024-04-19 06:54:17', '2026-06-01 17:39:49'),
(112, 'Pegante autem 112', 'Pegante', 'Negro', 769, 26804.42, 54, '2025-12-04 05:03:53', '2026-06-01 17:39:49'),
(113, 'Plantilla harum 113', 'Plantilla', 'Beige', 56, 57972.51, 113, '2023-07-01 14:06:47', '2026-06-01 17:39:49'),
(114, 'Plantilla voluptas 114', 'Plantilla', 'Beige', 935, 35814.47, 86, '2024-01-15 09:58:10', '2026-06-01 17:39:49'),
(115, 'Plantilla sunt 115', 'Plantilla', 'Verde', 1612, 52987.70, 27, '2025-03-23 02:00:01', '2026-06-01 17:39:49'),
(116, 'Hilo doloremque 116', 'Hilo', 'Beige', 1242, 48573.54, 53, '2025-09-24 21:15:46', '2026-06-01 17:39:49'),
(117, 'Suela vel 117', 'Suela', 'Café', 1651, 55649.21, 4, '2023-08-09 09:39:14', '2026-06-01 17:39:49'),
(118, 'Hilo voluptatem 118', 'Hilo', 'Negro', 1069, 75535.40, 7, '2024-04-15 04:12:39', '2026-06-01 17:39:49'),
(119, 'Suela repudiandae 119', 'Suela', 'Plateado', 389, 38252.62, 17, '2025-04-02 02:01:35', '2026-06-01 17:39:49'),
(120, 'Plantilla dignissimos 120', 'Plantilla', 'Negro', 1928, 8692.41, 27, '2026-04-11 08:08:33', '2026-06-01 17:39:49'),
(121, 'Espuma quo 121', 'Espuma', 'Rojo', 1390, 55732.66, 124, '2023-11-13 08:03:23', '2026-06-01 17:39:49'),
(122, 'Cuero ullam 122', 'Cuero', 'Dorado', 538, 34878.18, 134, '2026-04-12 00:36:11', '2026-06-01 17:39:49'),
(123, 'Pegante sapiente 123', 'Pegante', 'Plateado', 671, 43784.89, 121, '2024-07-01 05:05:45', '2026-06-01 17:39:49'),
(124, 'Plantilla maiores 124', 'Plantilla', 'Plateado', 1869, 49283.18, 63, '2023-11-13 23:06:54', '2026-06-01 17:39:49'),
(125, 'Suela maiores 125', 'Suela', 'Plateado', 1032, 78647.64, 40, '2025-01-07 04:41:31', '2026-06-01 17:39:49'),
(126, 'Tela et 126', 'Tela', 'Beige', 308, 72128.68, 33, '2024-10-03 18:35:04', '2026-06-01 17:39:49'),
(127, 'Hilo odio 127', 'Hilo', 'Azul', 1065, 43531.90, 67, '2024-03-26 17:25:00', '2026-06-01 17:39:49'),
(128, 'Accesorio et 128', 'Accesorio', 'Dorado', 1948, 10032.34, 17, '2024-03-26 12:02:43', '2026-06-01 17:39:49'),
(129, 'Tela corrupti 129', 'Tela', 'Beige', 1736, 25600.43, 85, '2025-12-09 11:47:28', '2026-06-01 17:39:49'),
(130, 'Tela sunt 130', 'Tela', 'Dorado', 1338, 16378.06, 49, '2024-04-09 03:48:48', '2026-06-01 17:39:49'),
(131, 'Cuero sunt 131', 'Cuero', 'Verde', 338, 61297.70, 61, '2026-01-22 19:33:38', '2026-06-01 17:39:49'),
(132, 'Pegante error 132', 'Pegante', 'Beige', 518, 50195.28, 104, '2023-06-18 22:35:57', '2026-06-01 17:39:49'),
(133, 'Pegante facere 133', 'Pegante', 'Verde', 1886, 78279.12, 117, '2023-07-01 14:54:25', '2026-06-01 17:39:49'),
(134, 'Pegante id 134', 'Pegante', 'Gris', 613, 68376.79, 13, '2025-07-22 18:24:36', '2026-06-01 17:39:49'),
(135, 'Accesorio veniam 135', 'Accesorio', 'Negro', 1232, 46660.26, 97, '2023-12-14 17:29:43', '2026-06-01 17:39:49'),
(136, 'Accesorio odio 136', 'Accesorio', 'Dorado', 1416, 54285.69, 65, '2025-02-25 09:16:04', '2026-06-01 17:39:49'),
(137, 'Espuma aut 137', 'Espuma', 'Negro', 269, 77075.10, 95, '2023-12-04 15:58:09', '2026-06-01 17:39:49'),
(138, 'Espuma dolor 138', 'Espuma', 'Beige', 1090, 19104.98, 21, '2024-11-12 07:46:38', '2026-06-01 17:39:49'),
(139, 'Hilo exercitationem 139', 'Hilo', 'Café', 717, 33500.74, 124, '2025-02-13 09:33:29', '2026-06-01 17:39:49'),
(140, 'Suela dignissimos 140', 'Suela', 'Azul', 194, 17101.07, 5, '2025-03-01 11:05:28', '2026-06-01 17:39:49'),
(141, 'Espuma at 141', 'Espuma', 'Beige', 337, 70402.76, 113, '2024-03-04 05:45:54', '2026-06-01 17:39:49'),
(142, 'Suela dicta 142', 'Suela', 'Gris', 1961, 69767.99, 91, '2024-03-31 21:43:41', '2026-06-01 17:39:49'),
(143, 'Espuma aut 143', 'Espuma', 'Café', 169, 20260.41, 60, '2024-08-09 16:44:23', '2026-06-01 17:39:49'),
(144, 'Plantilla possimus 144', 'Plantilla', 'Plateado', 1959, 59052.59, 133, '2024-08-13 09:34:05', '2026-06-01 17:39:49'),
(145, 'Cuero ad 145', 'Cuero', 'Verde', 339, 23030.71, 123, '2023-09-10 09:10:11', '2026-06-01 17:39:49'),
(146, 'Suela consequatur 146', 'Suela', 'Rojo', 1712, 35432.30, 96, '2025-09-24 06:45:18', '2026-06-01 17:39:49'),
(147, 'Hilo fugit 147', 'Hilo', 'Plateado', 1985, 6307.15, 40, '2024-10-20 07:26:38', '2026-06-01 17:39:49'),
(148, 'Pegante consequatur 148', 'Pegante', 'Plateado', 478, 20006.95, 124, '2024-06-09 19:43:06', '2026-06-01 17:39:49'),
(149, 'Plantilla velit 149', 'Plantilla', 'Café', 980, 52294.13, 69, '2025-03-21 17:32:16', '2026-06-01 17:39:49'),
(150, 'Plantilla ducimus 150', 'Plantilla', 'Café', 1192, 31996.17, 68, '2025-03-01 02:54:10', '2026-06-01 17:39:49'),
(152, 'Hilo officiis 152', 'Hilo', 'Plateado', 385, 31010.95, 143, '2023-11-21 04:12:32', '2026-06-01 17:39:49'),
(153, 'Plantilla vitae 153', 'Plantilla', 'Plateado', 1986, 54440.39, 13, '2023-09-16 12:35:37', '2026-06-01 17:39:49'),
(154, 'Suela non 154', 'Suela', 'Beige', 1130, 41206.01, 83, '2025-05-27 03:03:15', '2026-06-01 17:39:49'),
(155, 'Espuma qui 155', 'Espuma', 'Beige', 1977, 24198.49, 123, '2025-06-21 14:23:57', '2026-06-01 17:39:49'),
(156, 'Cuero maxime 156', 'Cuero', 'Café', 385, 56151.60, 50, '2024-05-14 15:29:22', '2026-06-01 17:39:49'),
(157, 'Accesorio quas 157', 'Accesorio', 'Blanco', 195, 76644.20, 53, '2026-03-05 06:10:26', '2026-06-01 17:39:49'),
(158, 'Hilo hic 158', 'Hilo', 'Blanco', 1290, 20798.07, 132, '2023-11-25 04:53:33', '2026-06-01 17:39:49'),
(159, 'medallas', 'plastico', 'negro', 29, 2500.00, 22, '2026-06-01 20:27:17', '2026-06-01 20:27:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_16_201905_create_proveedores_table', 1),
(5, '2026_04_07_030000_create_empleados_table', 1),
(6, '2026_04_07_032834_create_materia_primas_table', 1),
(7, '2026_04_07_033333_create_productos_table', 1),
(8, '2026_04_07_044810_create_clientes_table', 1),
(9, '2026_04_07_050000_update_empleados_table', 1),
(10, '2026_04_07_140000_create_roles_table', 1),
(11, '2026_04_20_231846_create_entradas_materia_prima_table', 1),
(12, '2026_04_20_231851_create_salidas_materia_prima_table', 1),
(13, '2026_04_20_231854_create_salidas_productos_table', 1),
(14, '2026_04_28_000001_add_user_id_to_movimientos_tables', 1),
(15, '2026_05_26_000001_create_pagos_proveedores_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ver_dashboard', 'Ver panel principal', '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(2, 'gestionar_usuarios', 'Crear y editar usuarios', '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(3, 'gestionar_productos', 'Crear y editar productos', '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(4, 'gestionar_clientes', 'Crear y editar clientes', '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(5, 'gestionar_proveedores', 'Crear y editar proveedores', '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(6, 'gestionar_empleados', 'Crear y editar empleados', '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(7, 'ver_reportes', 'Ver e imprimir reportes', '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(8, 'gestionar_materia_prima', 'Entradas y salidas de materia prima', '2026-06-01 17:39:49', '2026-06-01 17:39:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `materia_prima_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`, `materia_prima_id`, `created_at`, `updated_at`) VALUES
(1, 'Zapato casual niño talla 39', 93043.99, 82, 69, '2026-05-08 01:16:55', '2026-06-01 17:39:49'),
(2, 'Deportivo unisex talla 45', 117865.88, 178, 53, '2026-05-09 16:54:16', '2026-06-01 17:39:49'),
(3, 'Zapato casual hombre talla 43', 152613.55, 158, 62, '2026-03-14 16:24:58', '2026-06-01 17:39:49'),
(4, 'Zapato casual niño talla 29', 327170.55, 204, 118, '2025-08-06 17:24:29', '2026-06-01 17:39:49'),
(5, 'Zapato casual hombre talla 35', 196160.59, 143, 117, '2025-06-07 14:18:42', '2026-06-01 17:39:49'),
(6, 'Deportivo unisex talla 28', 349403.10, 205, 145, '2025-06-04 11:21:15', '2026-06-01 17:39:49'),
(7, 'Zapato formal mujer talla 42', 229247.38, 208, 91, '2026-02-16 13:50:57', '2026-06-01 17:39:49'),
(8, 'Zueco unisex talla 41', 261543.13, 136, 147, '2025-07-28 22:06:33', '2026-06-01 17:39:49'),
(9, 'Deportivo niño talla 29', 172600.38, 58, 56, '2025-11-05 06:07:13', '2026-06-01 17:39:49'),
(10, 'Mocasín mujer talla 44', 89547.77, 55, 135, '2024-12-06 13:47:05', '2026-06-01 17:39:49'),
(11, 'Zueco niña talla 28', 69793.42, 48, 132, '2026-05-13 13:18:03', '2026-06-01 17:39:49'),
(12, 'Zapato formal niña talla 37', 71199.35, 240, 20, '2025-09-22 02:52:31', '2026-06-01 17:39:49'),
(13, 'Deportivo unisex talla 35', 132149.74, 61, 46, '2024-06-05 13:17:43', '2026-06-01 17:39:49'),
(14, 'Mocasín unisex talla 44', 344731.51, 294, 89, '2024-10-08 06:56:07', '2026-06-01 17:39:49'),
(15, 'Pantufla niño talla 30', 157748.81, 116, 129, '2025-06-16 05:49:21', '2026-06-01 17:39:49'),
(16, 'Deportivo unisex talla 41', 79541.15, 133, 65, '2026-02-23 05:52:59', '2026-06-01 17:39:49'),
(17, 'Pantufla hombre talla 32', 145046.71, 85, 58, '2025-04-14 19:15:01', '2026-06-01 17:39:49'),
(18, 'Pantufla mujer talla 44', 134068.95, 150, 72, '2026-05-31 09:42:44', '2026-06-01 17:39:49'),
(19, 'Pantufla niña talla 35', 133535.52, 280, 37, '2025-06-17 13:57:10', '2026-06-01 17:39:49'),
(20, 'Zapato casual mujer talla 33', 349579.15, 202, 118, '2025-02-25 14:17:31', '2026-06-01 17:39:49'),
(21, 'Calzado infantil unisex talla 41', 105837.04, 175, 22, '2025-07-09 18:17:24', '2026-06-01 17:39:49'),
(22, 'Zapato casual unisex talla 43', 225619.60, 265, 69, '2025-04-08 08:48:10', '2026-06-01 17:39:49'),
(23, 'Mocasín niño talla 30', 302666.32, 80, 41, '2025-01-25 18:28:47', '2026-06-01 17:39:49'),
(24, 'Mocasín unisex talla 42', 239224.85, 224, 109, '2026-03-14 12:50:55', '2026-06-01 17:39:49'),
(25, 'Deportivo hombre talla 32', 55143.63, 299, 135, '2026-05-29 22:20:41', '2026-06-01 17:39:49'),
(26, 'Zapato formal niño talla 31', 273857.71, 82, 50, '2025-05-07 05:33:14', '2026-06-01 17:39:49'),
(27, 'Pantufla niña talla 38', 151408.44, 56, 31, '2025-06-29 17:48:09', '2026-06-01 17:39:49'),
(28, 'Zapato formal niña talla 41', 183555.05, 259, 132, '2026-04-09 09:29:32', '2026-06-01 17:39:49'),
(29, 'Mocasín niño talla 38', 273908.80, 103, 80, '2025-08-26 06:36:02', '2026-06-01 17:39:49'),
(30, 'Alpargata niño talla 28', 320432.94, 273, 50, '2025-06-01 21:14:33', '2026-06-01 17:39:49'),
(31, 'Alpargata unisex talla 34', 278354.80, 295, 117, '2025-12-22 03:31:47', '2026-06-01 17:39:49'),
(32, 'Zapato casual hombre talla 30', 315084.93, 291, 59, '2026-02-11 07:44:21', '2026-06-01 17:39:49'),
(33, 'Zapato formal mujer talla 39', 168297.82, 178, 100, '2025-03-01 08:36:17', '2026-06-01 17:39:49'),
(34, 'Deportivo unisex talla 39', 181687.83, 221, 47, '2024-09-28 01:40:14', '2026-06-01 17:39:49'),
(35, 'Mocasín mujer talla 35', 127849.58, 131, 157, '2026-05-11 03:43:03', '2026-06-01 17:39:49'),
(36, 'Bota hombre talla 29', 190876.49, 203, 1, '2024-11-25 13:12:49', '2026-06-01 17:39:49'),
(37, 'Zapato casual niño talla 29', 275203.04, 113, 101, '2026-02-08 18:18:17', '2026-06-01 17:39:49'),
(38, 'Pantufla mujer talla 35', 76183.08, 61, 82, '2025-10-01 17:45:56', '2026-06-01 17:39:49'),
(39, 'Deportivo unisex talla 33', 93507.97, 147, 22, '2025-01-16 05:43:02', '2026-06-01 17:39:49'),
(40, 'Alpargata unisex talla 45', 344057.04, 204, 21, '2024-06-10 10:57:54', '2026-06-01 17:39:49'),
(41, 'Zapato casual mujer talla 39', 222835.14, 34, 6, '2025-12-11 10:57:58', '2026-06-01 17:39:49'),
(42, 'Zueco mujer talla 31', 167481.29, 83, 118, '2024-07-24 00:50:40', '2026-06-01 17:39:49'),
(43, 'Alpargata unisex talla 29', 294979.32, 218, 39, '2025-10-26 10:40:46', '2026-06-01 17:39:49'),
(44, 'Zapato formal mujer talla 45', 69402.58, 167, 50, '2024-12-20 01:06:34', '2026-06-01 17:39:49'),
(45, 'Zapato formal unisex talla 37', 86361.64, 90, 153, '2026-03-29 08:37:45', '2026-06-01 17:39:49'),
(46, 'Zapato casual mujer talla 39', 140016.82, 196, 73, '2024-11-17 21:39:10', '2026-06-01 17:39:49'),
(47, 'Bota niña talla 28', 82488.47, 223, 4, '2024-07-01 13:02:25', '2026-06-01 17:39:49'),
(48, 'Zueco hombre talla 30', 197524.25, 217, 67, '2025-12-24 18:57:19', '2026-06-01 17:39:49'),
(49, 'Sandalia niña talla 41', 117300.93, 177, 62, '2025-04-08 21:14:40', '2026-06-01 17:39:49'),
(50, 'Calzado infantil niño talla 28', 85384.05, 206, 11, '2024-12-18 05:53:37', '2026-06-01 17:39:49'),
(51, 'Zapato casual hombre talla 29', 74229.94, 269, 157, '2024-10-08 07:21:49', '2026-06-01 17:39:49'),
(52, 'Alpargata unisex talla 34', 295677.49, 18, 26, '2025-08-26 05:45:30', '2026-06-01 17:39:49'),
(53, 'Calzado infantil niña talla 36', 254981.11, 44, 50, '2026-03-04 07:11:33', '2026-06-01 17:39:49'),
(54, 'Bota mujer talla 39', 113882.85, 280, 2, '2025-11-28 21:20:22', '2026-06-01 17:39:49'),
(55, 'Zueco mujer talla 29', 54415.93, 279, 100, '2025-01-18 10:53:16', '2026-06-01 17:39:49'),
(56, 'Zapato formal mujer talla 40', 74654.55, 237, 71, '2026-01-12 23:22:23', '2026-06-01 17:39:49'),
(57, 'Deportivo mujer talla 28', 186810.54, 148, 34, '2026-03-18 19:34:30', '2026-06-01 17:39:49'),
(58, 'Zapato casual mujer talla 44', 247095.23, 131, 6, '2025-10-15 02:27:39', '2026-06-01 17:39:49'),
(59, 'Zapato casual niño talla 32', 264936.20, 205, 93, '2024-07-31 21:02:43', '2026-06-01 17:39:49'),
(60, 'Sandalia hombre talla 28', 334300.65, 225, 32, '2026-02-07 05:39:55', '2026-06-01 17:39:49'),
(61, 'Alpargata niño talla 38', 288138.06, 126, 71, '2026-02-16 09:20:10', '2026-06-01 17:39:49'),
(62, 'Zapato formal niña talla 42', 321292.16, 202, 153, '2025-06-25 08:06:21', '2026-06-01 17:39:49'),
(63, 'Calzado infantil mujer talla 30', 313895.99, 176, 82, '2025-01-03 11:47:56', '2026-06-01 17:39:49'),
(64, 'Deportivo niña talla 44', 169899.48, 117, 85, '2025-03-15 23:48:52', '2026-06-01 17:39:49'),
(65, 'Zapato casual hombre talla 30', 293324.42, 204, 152, '2026-05-11 19:51:41', '2026-06-01 17:39:49'),
(66, 'Deportivo hombre talla 38', 202147.74, 290, 27, '2025-03-18 16:07:34', '2026-06-01 17:39:49'),
(67, 'Sandalia niña talla 37', 57022.90, 262, 102, '2025-08-20 07:09:29', '2026-06-01 17:39:49'),
(68, 'Alpargata mujer talla 36', 297662.68, 47, 11, '2025-09-29 15:35:59', '2026-06-01 17:39:49'),
(69, 'Deportivo niña talla 30', 279386.06, 86, 30, '2025-07-11 05:52:30', '2026-06-01 17:39:49'),
(70, 'Alpargata hombre talla 40', 224711.83, 247, 119, '2026-02-27 09:54:55', '2026-06-01 17:39:49'),
(71, 'Calzado infantil niño talla 33', 113324.08, 98, 97, '2026-01-14 21:52:39', '2026-06-01 17:39:49'),
(72, 'Calzado infantil hombre talla 35', 262779.51, 257, 63, '2024-09-26 00:20:40', '2026-06-01 17:39:49'),
(73, 'Alpargata niña talla 39', 299341.63, 47, 8, '2024-10-27 06:30:51', '2026-06-01 17:39:49'),
(74, 'Sandalia unisex talla 44', 178231.20, 89, 152, '2025-12-22 23:43:58', '2026-06-01 17:39:49'),
(75, 'Bota mujer talla 41', 150548.00, 290, 40, '2024-11-27 19:11:29', '2026-06-01 17:39:49'),
(76, 'Mocasín mujer talla 44', 283740.46, 144, 9, '2025-12-25 21:49:46', '2026-06-01 17:39:49'),
(77, 'Sandalia mujer talla 39', 324915.69, 30, 32, '2025-06-28 08:34:56', '2026-06-01 17:39:49'),
(78, 'Calzado infantil hombre talla 32', 208580.11, 110, 106, '2025-11-16 14:49:24', '2026-06-01 17:39:49'),
(79, 'Mocasín niña talla 44', 299699.08, 55, 36, '2026-05-10 12:03:04', '2026-06-01 17:39:49'),
(80, 'Zapato formal niña talla 42', 245014.03, 169, 46, '2024-10-12 00:38:51', '2026-06-01 17:39:49'),
(81, 'Zueco hombre talla 43', 175513.07, 280, 140, '2025-01-16 11:14:14', '2026-06-01 17:39:49'),
(82, 'Pantufla unisex talla 38', 106349.98, 265, 59, '2025-05-16 19:39:05', '2026-06-01 17:39:49'),
(83, 'Calzado infantil mujer talla 44', 248446.34, 85, 106, '2025-05-11 03:43:12', '2026-06-01 17:39:49'),
(84, 'Zueco hombre talla 40', 314405.71, 136, 53, '2025-06-02 17:49:22', '2026-06-01 17:39:49'),
(85, 'Zueco hombre talla 42', 169115.10, 143, 52, '2025-06-14 16:53:17', '2026-06-01 17:39:49'),
(86, 'Zapato formal hombre talla 32', 302945.30, 122, 115, '2025-12-08 21:27:58', '2026-06-01 17:39:49'),
(87, 'Zueco hombre talla 43', 78626.76, 50, 24, '2026-02-20 12:04:50', '2026-06-01 17:39:49'),
(88, 'Mocasín mujer talla 44', 315925.61, 123, 57, '2024-11-11 22:58:13', '2026-06-01 17:39:49'),
(89, 'Calzado infantil niño talla 34', 331617.07, 55, 22, '2024-08-18 20:44:22', '2026-06-01 17:39:49'),
(90, 'Alpargata niño talla 33', 315928.38, 297, 9, '2026-04-03 08:47:12', '2026-06-01 17:39:49'),
(91, 'Zapato formal hombre talla 30', 80422.24, 289, 70, '2026-04-01 22:11:16', '2026-06-01 17:39:49'),
(92, 'Pantufla niño talla 37', 72244.00, 271, 19, '2025-12-03 06:25:28', '2026-06-01 17:39:49'),
(93, 'Mocasín niño talla 28', 199741.00, 10, 68, '2026-04-20 01:25:10', '2026-06-01 17:39:49'),
(94, 'Zapato formal hombre talla 36', 52910.42, 130, 22, '2026-02-06 03:58:21', '2026-06-01 17:39:49'),
(95, 'Zapato casual niña talla 42', 291390.86, 191, 158, '2025-09-02 10:39:31', '2026-06-01 17:39:49'),
(96, 'Pantufla niña talla 32', 300249.78, 200, 154, '2026-03-02 07:00:04', '2026-06-01 17:39:49'),
(97, 'Zapato formal unisex talla 39', 179435.70, 291, 99, '2025-06-05 23:09:26', '2026-06-01 17:39:49'),
(98, 'Deportivo mujer talla 28', 321234.65, 127, 42, '2026-02-15 14:36:48', '2026-06-01 17:39:49'),
(99, 'Deportivo unisex talla 38', 299448.93, 210, 25, '2025-06-21 11:24:54', '2026-06-01 17:39:49'),
(100, 'Zueco hombre talla 31', 90687.91, 214, 140, '2025-10-13 06:53:23', '2026-06-01 17:39:49'),
(101, 'Calzado infantil niña talla 33', 256203.47, 74, 4, '2025-06-07 05:49:46', '2026-06-01 17:39:49'),
(102, 'Deportivo unisex talla 36', 181504.35, 264, 51, '2024-09-01 02:28:27', '2026-06-01 17:39:49'),
(103, 'Mocasín niño talla 45', 245322.75, 248, 73, '2024-07-14 15:35:50', '2026-06-01 17:39:49'),
(104, 'Sandalia hombre talla 43', 72690.54, 169, 110, '2024-08-30 22:57:27', '2026-06-01 17:39:49'),
(105, 'Zueco niño talla 30', 206812.97, 217, 25, '2025-01-05 14:52:07', '2026-06-01 17:39:49'),
(106, 'Calzado infantil unisex talla 31', 239983.93, 288, 136, '2026-04-06 03:33:49', '2026-06-01 17:39:49'),
(107, 'Zapato formal niño talla 32', 274359.71, 92, 58, '2024-10-05 04:20:17', '2026-06-01 17:39:49'),
(108, 'Zapato formal hombre talla 39', 68651.45, 153, 150, '2026-03-07 05:56:16', '2026-06-01 17:39:49'),
(109, 'Zapato casual mujer talla 43', 253264.35, 171, 73, '2026-04-01 01:40:26', '2026-06-01 17:39:49'),
(110, 'Deportivo unisex talla 29', 283841.67, 72, 14, '2025-03-24 03:56:09', '2026-06-01 17:39:49'),
(111, 'Bota niña talla 37', 130261.67, 181, 48, '2024-08-09 07:31:57', '2026-06-01 17:39:49'),
(112, 'Alpargata niña talla 34', 202628.28, 204, 150, '2024-07-17 14:35:38', '2026-06-01 17:39:49'),
(113, 'Zapato casual unisex talla 30', 349634.87, 78, 134, '2025-01-29 23:28:10', '2026-06-01 17:39:49'),
(114, 'Calzado infantil niña talla 41', 306235.93, 67, 44, '2026-01-22 06:15:17', '2026-06-01 17:39:49'),
(115, 'Zueco niña talla 40', 51749.36, 78, 81, '2025-03-27 23:19:55', '2026-06-01 17:39:49'),
(116, 'Alpargata mujer talla 42', 156190.88, 299, 17, '2024-12-31 21:50:15', '2026-06-01 17:39:49'),
(117, 'Bota niña talla 33', 339101.89, 250, 2, '2024-11-28 01:46:37', '2026-06-01 17:39:49'),
(118, 'Bota hombre talla 39', 221917.05, 132, 133, '2025-09-25 17:55:51', '2026-06-01 17:39:49'),
(119, 'Zapato formal mujer talla 32', 270383.08, 68, 142, '2025-02-22 02:41:35', '2026-06-01 17:39:49'),
(120, 'Zapato formal niño talla 44', 68730.81, 67, 27, '2025-09-28 22:59:42', '2026-06-01 17:39:49'),
(121, 'Calzado infantil niña talla 41', 252378.07, 222, 126, '2024-07-13 09:51:31', '2026-06-01 17:39:49'),
(122, 'Pantufla mujer talla 36', 234936.88, 245, 86, '2026-02-26 15:29:44', '2026-06-01 17:39:49'),
(123, 'Alpargata niña talla 35', 160844.00, 110, 87, '2025-04-07 19:55:48', '2026-06-01 17:39:49'),
(124, 'Zueco niño talla 31', 234773.96, 47, 34, '2025-08-18 02:29:04', '2026-06-01 17:39:49'),
(125, 'Zapato casual niña talla 39', 139523.86, 145, 45, '2025-05-03 16:36:09', '2026-06-01 17:39:49'),
(126, 'Zapato formal unisex talla 38', 206133.55, 173, 139, '2024-12-31 02:07:46', '2026-06-01 17:39:49'),
(127, 'Zapato formal mujer talla 34', 89087.06, 116, 18, '2024-10-25 12:47:27', '2026-06-01 17:39:49'),
(128, 'Pantufla niño talla 44', 345670.58, 280, 17, '2025-04-02 21:44:20', '2026-06-01 17:39:49'),
(129, 'Bota hombre talla 33', 195381.05, 241, 102, '2024-12-28 05:03:33', '2026-06-01 17:39:49'),
(130, 'Mocasín mujer talla 30', 83001.83, 20, 7, '2026-01-26 13:31:14', '2026-06-01 17:39:49'),
(131, 'Sandalia mujer talla 40', 166711.89, 247, 112, '2026-05-17 21:11:12', '2026-06-01 17:39:49'),
(132, 'Zapato casual mujer talla 45', 298294.03, 233, 69, '2024-09-07 11:41:57', '2026-06-01 17:39:49'),
(133, 'Zapato formal niña talla 34', 58261.56, 125, 131, '2026-01-31 22:37:30', '2026-06-01 17:39:49'),
(134, 'Calzado infantil niño talla 39', 110042.80, 74, 64, '2024-07-28 12:55:34', '2026-06-01 17:39:49'),
(135, 'Sandalia niño talla 43', 270652.98, 49, 21, '2025-02-01 21:38:44', '2026-06-01 17:39:49'),
(136, 'Zapato formal hombre talla 42', 110685.29, 115, 48, '2024-07-23 00:56:01', '2026-06-01 17:39:49'),
(137, 'Pantufla unisex talla 42', 164686.50, 107, 17, '2025-12-17 05:34:15', '2026-06-01 17:39:49'),
(138, 'Deportivo mujer talla 41', 103939.18, 74, 8, '2025-01-29 12:52:07', '2026-06-01 17:39:49'),
(139, 'Zapato formal unisex talla 45', 327817.41, 204, 102, '2025-09-13 09:28:58', '2026-06-01 17:39:49'),
(140, 'Pantufla niña talla 42', 189684.51, 234, 19, '2025-01-10 02:51:39', '2026-06-01 17:39:49'),
(141, 'Alpargata hombre talla 42', 55548.71, 242, 93, '2025-05-20 06:07:01', '2026-06-01 17:39:49'),
(142, 'Calzado infantil unisex talla 41', 341609.55, 96, 114, '2025-07-26 12:38:48', '2026-06-01 17:39:49'),
(143, 'Sandalia niño talla 33', 309296.94, 193, 73, '2026-05-14 02:41:54', '2026-06-01 17:39:49'),
(144, 'Mocasín mujer talla 43', 60581.88, 69, 86, '2026-03-16 12:51:28', '2026-06-01 17:39:49'),
(145, 'Deportivo niña talla 28', 275183.52, 12, 126, '2025-11-07 14:42:34', '2026-06-01 17:39:49'),
(146, 'Sandalia hombre talla 37', 322732.33, 185, 45, '2025-02-10 02:35:23', '2026-06-01 17:39:49'),
(147, 'Bota niño talla 35', 349239.67, 82, 138, '2024-10-29 09:37:42', '2026-06-01 17:39:49'),
(148, 'Sandalia niña talla 34', 215616.28, 260, 55, '2025-01-05 06:47:07', '2026-06-01 17:39:49'),
(149, 'Zapato casual mujer talla 38', 68373.81, 98, 88, '2025-09-12 13:38:39', '2026-06-01 17:39:49'),
(150, 'Zapato formal niña talla 43', 233774.12, 230, 158, '2025-12-11 19:22:34', '2026-06-01 17:39:49'),
(151, 'Alpargata niño talla 32', 134792.03, 191, 7, '2025-08-07 10:23:45', '2026-06-01 17:39:49'),
(152, 'Calzado infantil niña talla 36', 160794.54, 214, 7, '2025-05-24 09:36:15', '2026-06-01 17:39:49'),
(153, 'Alpargata niña talla 38', 196119.46, 28, 15, '2026-02-28 17:59:56', '2026-06-01 17:39:49'),
(154, 'Zapato casual niño talla 35', 154677.69, 123, 148, '2024-08-10 23:32:31', '2026-06-01 17:39:49'),
(155, 'Zueco hombre talla 40', 55718.36, 123, 38, '2025-05-04 22:20:15', '2026-06-01 17:39:49'),
(156, 'Sandalia mujer talla 32', 242571.41, 85, 43, '2025-01-21 14:10:51', '2026-06-01 17:39:49'),
(157, 'Calzado infantil niño talla 31', 343260.50, 145, 78, '2025-01-17 14:23:09', '2026-06-01 17:39:49'),
(158, 'Sandalia hombre talla 44', 191166.68, 200, 67, '2025-08-23 23:14:58', '2026-06-01 17:39:49'),
(159, 'Deportivo niño talla 34', 215550.23, 253, 118, '2026-03-09 11:30:18', '2026-06-01 17:39:49'),
(160, 'Zapato formal niña talla 33', 132159.89, 167, 40, '2026-02-18 13:55:42', '2026-06-01 17:39:49'),
(161, 'Calzado infantil hombre talla 34', 273909.66, 277, 41, '2024-06-30 07:16:23', '2026-06-01 17:39:49'),
(162, 'Bota mujer talla 29', 197474.83, 234, 85, '2025-08-12 10:02:04', '2026-06-01 17:39:49'),
(163, 'Zapato casual hombre talla 32', 349948.27, 61, 112, '2026-04-16 14:41:33', '2026-06-01 17:39:49'),
(164, 'Pantufla niña talla 41', 205868.61, 163, 83, '2024-07-21 01:21:20', '2026-06-01 17:39:49'),
(165, 'Zapato formal niño talla 41', 225067.06, 66, 26, '2024-06-14 21:50:52', '2026-06-01 17:39:49'),
(166, 'Zapato casual niña talla 28', 313801.47, 88, 59, '2026-05-06 21:24:16', '2026-06-01 17:39:49'),
(167, 'Zapato casual unisex talla 29', 321778.79, 272, 43, '2025-07-05 23:08:25', '2026-06-01 17:39:49'),
(168, 'Pantufla unisex talla 31', 311097.16, 232, 107, '2026-04-03 07:48:58', '2026-06-01 17:39:49'),
(169, 'Deportivo hombre talla 37', 186779.38, 89, 32, '2024-11-06 15:43:41', '2026-06-01 17:39:49'),
(170, 'Zapato formal unisex talla 40', 150356.42, 193, 27, '2024-12-22 17:00:57', '2026-06-01 17:39:49'),
(171, 'Deportivo niña talla 30', 282279.41, 151, 146, '2025-08-09 14:16:42', '2026-06-01 17:39:49'),
(172, 'Mocasín mujer talla 37', 276695.10, 57, 78, '2024-12-10 02:19:02', '2026-06-01 17:39:49'),
(173, 'Alpargata', 198000.00, 30, 58, '2026-06-01 20:23:57', '2026-06-01 20:24:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `mercancia` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `empresa`, `documento`, `telefono`, `fecha_nacimiento`, `correo`, `ciudad`, `direccion`, `mercancia`, `created_at`, `updated_at`) VALUES
(1, 'Vita Turner', 'Ruecker-Bosco', '5023202167', '3152562543', '2002-04-19', 'reinger.alycia@example.net', 'Medellín', 'Cra 41 #89-95', 'Accesorios', '2026-02-12 08:35:41', '2026-06-01 17:39:50'),
(2, 'April Becker', 'Zemlak, Kemmer and Rippin', '9795661966', '3202894184', '1982-02-04', 'alberta.schulist@example.net', 'Ibagué', 'Cra 30 #30-64', 'Cuero sintético', '2024-05-26 09:06:42', '2026-06-01 17:39:50'),
(3, 'Viva Rice', 'Dickens and Sons', '1433543310', '3981281812', '1972-03-27', 'watsica.oceane@example.net', 'Manizales', 'Cra 47 #14-64', 'Cuero sintético', '2026-04-11 06:13:05', '2026-06-01 17:39:50'),
(4, 'Santa Rolfson', 'Gaylord, Gorczany and Dooley', '1631515350', '3664652380', '1980-03-12', 'erich.ondricka@example.com', 'Cali', 'Cra 9 #87-64', 'Telas textiles', '2023-07-29 06:12:50', '2026-06-01 17:39:50'),
(5, 'Ed Abshire DDS', 'Schneider, Denesik and Grady', '6708014863', '3190563342', '1969-05-20', 'kyle42@example.org', 'Neiva', 'Cra 31 #37-52', 'Cuero sintético', '2026-04-09 17:36:51', '2026-06-01 17:39:50'),
(6, 'Imogene Hegmann', 'Schaden, Jones and Durgan', '1654374624', '3320023777', '2004-12-15', 'jaylen.fahey@example.net', 'Medellín', 'Cra 56 #31-93', 'Pegantes', '2023-07-07 00:17:38', '2026-06-01 17:39:50'),
(7, 'Darrin Glover', 'Konopelski-Maggio', '9300542718', '3748297234', '1995-07-21', 'ferry.carrie@example.net', 'Cali', 'Cra 64 #76-24', 'Plantillas EVA', '2024-02-13 04:48:35', '2026-06-01 17:39:50'),
(8, 'Reina Fahey', 'Littel and Sons', '9622361264', '3149091329', '1976-12-05', 'rath.kathleen@example.org', 'Neiva', 'Cra 37 #55-50', 'Accesorios', '2023-08-16 00:10:32', '2026-06-01 17:39:50'),
(9, 'Prof. Hulda Kertzmann DDS', 'Ryan, Franecki and Homenick', '8377412801', '3943500855', '1987-07-27', 'jones.london@example.org', 'Medellín', 'Cra 55 #36-56', 'Suelas de caucho', '2025-09-06 07:41:26', '2026-06-01 17:39:50'),
(10, 'Mr. Trevion King', 'Schuppe Ltd', '4917276787', '3861950386', '1991-12-10', 'windler.floy@example.net', 'Armenia', 'Cra 44 #74-53', 'Suelas de caucho', '2024-05-08 02:21:17', '2026-06-01 17:39:50'),
(11, 'Margaretta Kuhn', 'Becker, Mohr and Dietrich', '9970190489', '3084048134', '2000-09-07', 'elenora.gottlieb@example.net', 'Neiva', 'Cra 47 #41-45', 'Espumas', '2024-01-15 12:55:59', '2026-06-01 17:39:50'),
(12, 'Alexane Hamill', 'Johns-D\'Amore', '7700639608', '3652301724', '2006-01-03', 'simone.smitham@example.com', 'Armenia', 'Cra 44 #40-29', 'Hebillas metálicas', '2024-08-10 05:33:35', '2026-06-01 17:39:50'),
(13, 'Jovani Miller', 'D\'Amore, Botsford and Hammes', '8360836780', '3558323306', '1985-02-20', 'romaguera.mellie@example.org', 'Manizales', 'Cra 7 #54-41', 'Hebillas metálicas', '2025-07-11 12:47:44', '2026-06-01 17:39:50'),
(14, 'Audra Swift', 'Abshire PLC', '2686298774', '3442313509', '1974-05-01', 'claudine.auer@example.com', 'Cali', 'Cra 3 #31-17', 'Accesorios', '2024-02-11 05:29:26', '2026-06-01 17:39:50'),
(15, 'Prof. Brenden Howell', 'Quitzon-Jakubowski', '4785620144', '3079615547', '1973-04-23', 'upadberg@example.net', 'Neiva', 'Cra 12 #56-14', 'Hilos industriales', '2025-10-04 08:57:32', '2026-06-01 17:39:50'),
(16, 'Birdie Gerlach', 'Hills, Lowe and Block', '8054752941', '3469405970', '1989-01-05', 'ullrich.maddison@example.com', 'Medellín', 'Cra 4 #11-72', 'Hebillas metálicas', '2024-08-26 08:55:38', '2026-06-01 17:39:50'),
(17, 'Dr. Reese Grimes DDS', 'Volkman-Yost', '8553673193', '3953350962', '1978-02-04', 'goodwin.evalyn@example.net', 'Neiva', 'Cra 39 #73-75', 'Hebillas metálicas', '2024-11-29 04:45:51', '2026-06-01 17:39:50'),
(18, 'Lorena Walter', 'McGlynn-Stehr', '3266453615', '3982081584', '1966-11-07', 'jklein@example.net', 'Ibagué', 'Cra 14 #62-98', 'Telas textiles', '2023-09-08 08:02:05', '2026-06-01 17:39:50'),
(19, 'Shawn Wilkinson', 'Torphy, Ferry and Weimann', '8460276227', '3560351285', '1968-07-31', 'jayden73@example.net', 'Armenia', 'Cra 68 #90-44', 'Hilos industriales', '2026-04-24 05:01:16', '2026-06-01 17:39:50'),
(20, 'Laisha Hoppe', 'Jacobs, Brown and Russel', '0178826334', '3383912982', '1982-09-08', 'qyundt@example.org', 'Pereira', 'Cra 72 #23-25', 'Hebillas metálicas', '2025-02-21 10:49:53', '2026-06-01 17:39:50'),
(21, 'Mrs. Madelyn Witting', 'Brown, Kohler and Sauer', '8912492503', '3275794115', '1987-08-29', 'fabernathy@example.org', 'Barranquilla', 'Cra 14 #46-35', 'Telas textiles', '2024-05-23 02:42:02', '2026-06-01 17:39:50'),
(22, 'Treva Armstrong', 'Greenholt-Morar', '3747107718', '3465956229', '2002-07-03', 'cwuckert@example.net', 'Manizales', 'Cra 78 #27-32', 'Cuero natural', '2024-12-20 22:22:41', '2026-06-01 17:39:50'),
(23, 'Prof. Carlotta Kovacek DDS', 'Streich Ltd', '1247853589', '3675382265', '2003-11-22', 'osbaldo48@example.org', 'Cali', 'Cra 66 #65-73', 'Cuero natural', '2026-03-18 21:06:50', '2026-06-01 17:39:50'),
(24, 'Christy Ward Sr.', 'Mante Inc', '3927128077', '3454214765', '1977-03-19', 'thiel.emmanuelle@example.com', 'Bucaramanga', 'Cra 75 #14-92', 'Plantillas EVA', '2023-11-05 09:29:03', '2026-06-01 17:39:50'),
(25, 'Jaqueline Ziemann', 'Herman-Jacobi', '4098250485', '3113745706', '1972-11-14', 'barrows.juston@example.net', 'Bogotá', 'Cra 13 #83-58', 'Cuero sintético', '2025-12-14 16:08:42', '2026-06-01 17:39:50'),
(26, 'Brent Watsica', 'Goyette PLC', '7467344628', '3656641787', '1978-06-20', 'lebsack.sabina@example.org', 'Bogotá', 'Cra 45 #67-23', 'Espumas', '2024-01-03 09:18:10', '2026-06-01 17:39:50'),
(27, 'Hulda Aufderhar', 'Sawayn Ltd', '4686049364', '3552784988', '1971-06-12', 'kelli.beier@example.net', 'Pereira', 'Cra 61 #38-66', 'Plantillas EVA', '2023-06-02 09:49:44', '2026-06-01 17:39:50'),
(28, 'Carol Koch DVM', 'Bergstrom, Cole and McClure', '3701564315', '3155896229', '1980-11-12', 'esta07@example.org', 'Medellín', 'Cra 64 #64-35', 'Plantillas EVA', '2026-02-27 15:12:48', '2026-06-01 17:39:50'),
(29, 'Kraig Cremin', 'Gibson-Cummings', '1136788546', '3661412057', '1979-05-10', 'weissnat.geovanni@example.org', 'Cali', 'Cra 75 #84-8', 'Telas textiles', '2023-10-06 18:15:51', '2026-06-01 17:39:50'),
(30, 'Lucius Koch', 'Fay, Mayert and Zboncak', '1114015423', '3597949760', '1976-06-23', 'adela.turner@example.com', 'Bogotá', 'Cra 21 #88-21', 'Plantillas EVA', '2025-01-12 18:18:46', '2026-06-01 17:39:50'),
(31, 'Mr. Eldon Dickens III', 'Mills PLC', '6968085484', '3947721316', '2002-08-21', 'candace.murray@example.org', 'Ibagué', 'Cra 50 #41-46', 'Espumas', '2026-03-28 16:37:17', '2026-06-01 17:39:50'),
(32, 'Dr. Amber O\'Reilly V', 'Kertzmann, Kling and Rice', '3987632149', '3041960183', '1975-01-21', 'ledner.leslie@example.net', 'Pereira', 'Cra 21 #72-11', 'Cuero natural', '2025-08-23 07:52:22', '2026-06-01 17:39:50'),
(33, 'Dr. Brock Herman', 'Kohler LLC', '5174677977', '3343900244', '1992-09-05', 'rutherford.zion@example.com', 'Neiva', 'Cra 3 #58-35', 'Hilos industriales', '2026-02-10 16:32:14', '2026-06-01 17:39:50'),
(34, 'Kamren Hackett', 'Nienow, Muller and Pollich', '2118839743', '3893230627', '1981-09-24', 'iprohaska@example.net', 'Bucaramanga', 'Cra 53 #56-3', 'Accesorios', '2024-08-15 22:25:55', '2026-06-01 17:39:50'),
(35, 'Alejandrin Purdy', 'Shields-Wilderman', '4732545838', '3065852095', '1968-05-21', 'zfranecki@example.org', 'Armenia', 'Cra 25 #88-52', 'Cuero natural', '2023-06-02 07:07:36', '2026-06-01 17:39:50'),
(36, 'Enrico Robel Sr.', 'Watsica, Stracke and Crona', '2962147045', '3467701294', '1970-04-15', 'mason.carter@example.org', 'Bucaramanga', 'Cra 49 #92-56', 'Telas textiles', '2025-04-17 00:46:31', '2026-06-01 17:39:50'),
(37, 'Dr. Breanna Cole', 'Hamill, Fisher and Deckow', '1602120055', '3968253270', '1978-07-29', 'west.amanda@example.org', 'Ibagué', 'Cra 33 #91-2', 'Telas textiles', '2025-09-16 01:54:59', '2026-06-01 17:39:50'),
(38, 'Brett O\'Hara', 'Heaney-Jacobs', '0733745016', '3859392813', '1968-10-29', 'xweber@example.org', 'Neiva', 'Cra 80 #74-50', 'Cuero natural', '2025-11-14 08:08:15', '2026-06-01 17:39:50'),
(39, 'Isac Morissette', 'O\'Reilly, Wuckert and Lemke', '9261166833', '3333455412', '1998-10-07', 'alysha.hansen@example.net', 'Neiva', 'Cra 9 #82-3', 'Cuero natural', '2025-05-01 11:09:13', '2026-06-01 17:39:50'),
(40, 'Prof. Elisabeth McLaughlin', 'Rodriguez Ltd', '3857633823', '3280543191', '1981-01-05', 'dagmar59@example.net', 'Pereira', 'Cra 79 #58-86', 'Hilos industriales', '2024-07-14 02:43:29', '2026-06-01 17:39:50'),
(41, 'Christine Hoeger Jr.', 'Spencer-Hettinger', '7533427488', '3517743534', '1986-03-05', 'oleffler@example.net', 'Bucaramanga', 'Cra 53 #60-68', 'Espumas', '2025-08-20 17:12:17', '2026-06-01 17:39:50'),
(42, 'Miss Makenzie Johnston', 'McGlynn, Nitzsche and Kulas', '7041758862', '3122906374', '1975-04-16', 'durgan.erick@example.net', 'Bucaramanga', 'Cra 68 #86-55', 'Telas textiles', '2024-07-11 16:58:14', '2026-06-01 17:39:50'),
(43, 'Monique Zemlak', 'Reynolds-Kozey', '1299436066', '3817784211', '1989-12-29', 'qmetz@example.net', 'Cali', 'Cra 53 #63-53', 'Suelas de caucho', '2024-05-20 20:15:27', '2026-06-01 17:39:50'),
(44, 'Melisa Ryan V', 'Monahan LLC', '4835693822', '3357710924', '2001-07-13', 'oral.stoltenberg@example.net', 'Manizales', 'Cra 42 #54-51', 'Hebillas metálicas', '2023-06-17 16:47:36', '2026-06-01 17:39:50'),
(45, 'Sienna Tillman', 'Stoltenberg-Hegmann', '5586687180', '3288267884', '1976-06-20', 'earlene.mcglynn@example.org', 'Cali', 'Cra 51 #93-30', 'Pegantes', '2026-02-12 10:07:06', '2026-06-01 17:39:50'),
(46, 'Margarette Schuster PhD', 'Waelchi Group', '8046871844', '3983089604', '2006-03-10', 'koconner@example.org', 'Bogotá', 'Cra 42 #96-54', 'Pegantes', '2026-04-26 05:32:20', '2026-06-01 17:39:50'),
(47, 'Alford Grimes', 'Wisoky-Botsford', '8791267274', '3095404227', '1974-07-04', 'kemmer.ryan@example.net', 'Bogotá', 'Cra 41 #98-57', 'Suelas de caucho', '2025-03-27 09:34:26', '2026-06-01 17:39:50'),
(48, 'Prof. Luisa Kuphal II', 'Moore PLC', '6491222954', '3915853268', '1985-08-15', 'noemie63@example.net', 'Bogotá', 'Cra 61 #72-87', 'Suelas de caucho', '2025-12-23 12:20:06', '2026-06-01 17:39:50'),
(49, 'Leonie Flatley', 'Parker Ltd', '1911929791', '3016794543', '2002-08-26', 'witting.tanner@example.com', 'Bucaramanga', 'Cra 12 #23-21', 'Telas textiles', '2024-12-27 06:24:46', '2026-06-01 17:39:50'),
(50, 'Lonnie Shields', 'Bradtke, Kuhn and Wyman', '1266544470', '3707739353', '1993-06-05', 'yasmeen25@example.org', 'Cali', 'Cra 8 #21-46', 'Hilos industriales', '2025-07-22 19:59:46', '2026-06-01 17:39:50'),
(51, 'Prof. Marcelle Goyette II', 'Schoen, Ortiz and Gulgowski', '0345612570', '3357194632', '1986-03-22', 'christiansen.reyna@example.com', 'Pereira', 'Cra 28 #19-25', 'Hilos industriales', '2026-04-28 07:08:02', '2026-06-01 17:39:50'),
(52, 'Pattie Hodkiewicz', 'Okuneva-Lowe', '4869906559', '3035183787', '1983-04-16', 'kaylin33@example.net', 'Manizales', 'Cra 43 #90-30', 'Plantillas EVA', '2023-11-14 02:38:21', '2026-06-01 17:39:50'),
(53, 'Breanne Doyle V', 'Feil Group', '0024530418', '3193034567', '1972-07-26', 'kkshlerin@example.org', 'Medellín', 'Cra 1 #8-47', 'Pegantes', '2024-12-26 12:17:59', '2026-06-01 17:39:50'),
(54, 'Prof. Deonte Nader DVM', 'Hauck-Casper', '5511969042', '3376238894', '1967-03-05', 'leonardo42@example.org', 'Manizales', 'Cra 40 #38-62', 'Cuero sintético', '2023-10-24 10:29:09', '2026-06-01 17:39:50'),
(55, 'Josie Spinka PhD', 'Adams PLC', '7846993096', '3027835202', '1991-01-08', 'jerde.haley@example.org', 'Neiva', 'Cra 14 #99-82', 'Hebillas metálicas', '2024-10-18 01:43:27', '2026-06-01 17:39:50'),
(56, 'Buck Rosenbaum', 'O\'Conner Inc', '6457688268', '3415823365', '1998-04-18', 'ikautzer@example.net', 'Ibagué', 'Cra 32 #11-12', 'Cuero sintético', '2025-05-01 13:39:26', '2026-06-01 17:39:50'),
(57, 'Dr. Owen Sporer', 'Keeling Inc', '2057637090', '3795539021', '1982-12-18', 'santos.mccullough@example.com', 'Barranquilla', 'Cra 34 #2-38', 'Hebillas metálicas', '2025-10-09 17:08:34', '2026-06-01 17:39:50'),
(58, 'Darion Kub', 'Harber PLC', '7726624707', '3211570531', '1968-01-14', 'ila48@example.org', 'Medellín', 'Cra 23 #71-26', 'Suelas de caucho', '2024-05-24 04:06:39', '2026-06-01 17:39:50'),
(59, 'Deshaun Wolf', 'Hintz-Bahringer', '4934083786', '3789327305', '1988-11-06', 'fay.macie@example.net', 'Barranquilla', 'Cra 23 #35-38', 'Pegantes', '2026-05-09 19:44:01', '2026-06-01 17:39:50'),
(60, 'Archibald Kovacek', 'Swaniawski, Boyle and Quitzon', '6683114875', '3292640052', '1994-01-25', 'ferne.berge@example.com', 'Bucaramanga', 'Cra 80 #51-27', 'Pegantes', '2026-02-01 13:28:40', '2026-06-01 17:39:50'),
(61, 'Elizabeth Bergnaum', 'Schuppe Inc', '8088352931', '3519356417', '2000-04-06', 'bernard.nienow@example.net', 'Bogotá', 'Cra 41 #84-58', 'Plantillas EVA', '2025-04-16 10:22:40', '2026-06-01 17:39:50'),
(62, 'Ms. Lavada Treutel Sr.', 'Reilly Inc', '3120207055', '3327606275', '1993-02-02', 'mertie01@example.com', 'Neiva', 'Cra 60 #16-8', 'Plantillas EVA', '2025-12-25 04:11:27', '2026-06-01 17:39:50'),
(63, 'Baby Berge IV', 'Little Ltd', '9191580040', '3512121744', '1982-08-09', 'lwitting@example.com', 'Bogotá', 'Cra 76 #81-28', 'Hilos industriales', '2025-02-27 23:47:17', '2026-06-01 17:39:50'),
(64, 'Dr. Cicero Stiedemann', 'Walsh Ltd', '0424974492', '3971321225', '1973-11-30', 'retta73@example.org', 'Bucaramanga', 'Cra 39 #45-19', 'Plantillas EVA', '2023-08-05 03:16:06', '2026-06-01 17:39:50'),
(65, 'Therese Monahan', 'Grady-Ortiz', '2183744002', '3136163440', '1999-08-18', 'uoconnell@example.net', 'Bucaramanga', 'Cra 26 #90-93', 'Accesorios', '2023-12-29 02:32:47', '2026-06-01 17:39:50'),
(66, 'Merle Waters II', 'Corwin-Parisian', '5307334463', '3848058306', '1991-07-31', 'germaine77@example.net', 'Barranquilla', 'Cra 54 #47-57', 'Cuero sintético', '2024-03-19 12:59:03', '2026-06-01 17:39:50'),
(67, 'Kip Towne', 'Nitzsche-Herman', '9131464150', '3027100795', '1979-07-19', 'nannie88@example.com', 'Medellín', 'Cra 51 #92-34', 'Hebillas metálicas', '2025-09-08 14:25:43', '2026-06-01 17:39:50'),
(68, 'Bryon Simonis', 'Hammes Ltd', '6535576742', '3739894776', '2003-07-30', 'cade30@example.org', 'Pereira', 'Cra 49 #71-36', 'Espumas', '2024-01-10 09:26:07', '2026-06-01 17:39:50'),
(69, 'Keshawn Konopelski Sr.', 'Kirlin-White', '8223973498', '3030359942', '1979-10-04', 'mia.morissette@example.com', 'Cali', 'Cra 22 #29-29', 'Espumas', '2024-07-04 03:20:39', '2026-06-01 17:39:50'),
(70, 'Boyd White', 'Graham LLC', '1370798567', '3688867922', '1979-12-22', 'demard@example.net', 'Neiva', 'Cra 1 #7-98', 'Hilos industriales', '2024-11-18 11:41:40', '2026-06-01 17:39:50'),
(71, 'Ivy Tremblay', 'Fahey-Predovic', '6292657988', '3834211894', '1968-01-09', 'rmueller@example.com', 'Bogotá', 'Cra 9 #48-49', 'Hilos industriales', '2023-09-16 00:39:50', '2026-06-01 17:39:50'),
(72, 'Vidal Lueilwitz', 'Boehm LLC', '8536658667', '3193472431', '1966-11-30', 'nolan.brandon@example.net', 'Medellín', 'Cra 20 #84-96', 'Pegantes', '2024-11-10 10:21:00', '2026-06-01 17:39:50'),
(73, 'Shanny Torphy', 'Halvorson Group', '6104784645', '3106221524', '1983-03-02', 'sigurd.reinger@example.com', 'Armenia', 'Cra 7 #28-31', 'Suelas de caucho', '2023-12-11 02:54:45', '2026-06-01 17:39:50'),
(74, 'Mrs. Fay Bartoletti PhD', 'D\'Amore-O\'Conner', '6359659458', '3057367276', '1998-09-14', 'brad48@example.org', 'Ibagué', 'Cra 78 #35-98', 'Pegantes', '2023-07-20 15:55:55', '2026-06-01 17:39:50'),
(75, 'Justyn Kuhic', 'Feest, Corwin and Mohr', '9607487309', '3511661304', '1994-02-09', 'garfield38@example.net', 'Bogotá', 'Cra 25 #77-39', 'Cuero natural', '2024-03-13 05:51:51', '2026-06-01 17:39:50'),
(76, 'Elmer Pfeffer', 'Senger-Legros', '4514437880', '3316185392', '1990-06-29', 'marge23@example.net', 'Bucaramanga', 'Cra 9 #75-3', 'Hilos industriales', '2024-06-28 18:39:11', '2026-06-01 17:39:50'),
(77, 'Thurman Lindgren', 'Simonis Ltd', '1674730845', '3708448883', '1984-11-20', 'weber.faye@example.org', 'Barranquilla', 'Cra 21 #89-43', 'Suelas de caucho', '2026-01-26 09:45:05', '2026-06-01 17:39:50'),
(78, 'Prof. Leonardo Wisozk II', 'Zemlak-Zulauf', '0275425146', '3602366625', '1994-09-08', 'nbergnaum@example.com', 'Cali', 'Cra 42 #51-80', 'Suelas de caucho', '2025-06-23 14:48:05', '2026-06-01 17:39:50'),
(79, 'Nora Abernathy Sr.', 'Simonis PLC', '4153386014', '3389967852', '1975-12-21', 'acassin@example.org', 'Barranquilla', 'Cra 10 #55-77', 'Espumas', '2025-11-14 10:17:32', '2026-06-01 17:39:50'),
(80, 'Jeff Jones', 'Rohan PLC', '4753131443', '3092893402', '1997-03-17', 'anderson.houston@example.net', 'Pereira', 'Cra 1 #57-75', 'Hebillas metálicas', '2023-09-04 15:10:04', '2026-06-01 17:39:50'),
(81, 'Carter Thiel Sr.', 'Ferry-Cummings', '0956494691', '3882224761', '1981-08-24', 'mustafa.johnson@example.org', 'Manizales', 'Cra 29 #2-51', 'Espumas', '2023-12-01 01:30:55', '2026-06-01 17:39:50'),
(82, 'Hailie Runolfsson Jr.', 'Bartoletti-Ward', '1825366446', '3749833441', '1999-05-01', 'dbeer@example.com', 'Neiva', 'Cra 49 #49-34', 'Plantillas EVA', '2023-10-30 17:28:27', '2026-06-01 17:39:50'),
(83, 'Adelia Emard DDS', 'Rodriguez-Okuneva', '0435065421', '3084043840', '1971-06-18', 'stroman.shyann@example.org', 'Bucaramanga', 'Cra 39 #60-45', 'Pegantes', '2023-12-06 08:16:40', '2026-06-01 17:39:50'),
(84, 'Tod Collier', 'Lockman Group', '2484151291', '3218932116', '2002-08-18', 'calista50@example.com', 'Manizales', 'Cra 1 #39-48', 'Pegantes', '2025-01-26 01:20:49', '2026-06-01 17:39:50'),
(85, 'Alphonso Pfeffer', 'Collier and Sons', '5296902614', '3958621283', '1967-05-27', 'casimir49@example.com', 'Armenia', 'Cra 60 #66-73', 'Hilos industriales', '2023-12-31 01:04:39', '2026-06-01 17:39:50'),
(86, 'Dr. Myrtice Goldner', 'Rippin-Heaney', '3841259501', '3600381683', '1978-07-11', 'icollins@example.org', 'Bogotá', 'Cra 68 #19-46', 'Telas textiles', '2024-04-12 03:30:40', '2026-06-01 17:39:50'),
(87, 'Trisha Altenwerth', 'Dach, Hansen and Schimmel', '0676230422', '3473544518', '1980-04-03', 'janiya.bogan@example.org', 'Barranquilla', 'Cra 5 #86-27', 'Cuero natural', '2024-03-11 16:10:21', '2026-06-01 17:39:50'),
(88, 'Dolly Bosco II', 'Powlowski Group', '5535527908', '3223383520', '2000-01-29', 'carmen.simonis@example.net', 'Armenia', 'Cra 60 #52-3', 'Telas textiles', '2025-07-23 21:17:26', '2026-06-01 17:39:50'),
(89, 'Dr. Lorenz Breitenberg Jr.', 'Schaden-Lakin', '6437835304', '3077735231', '2006-01-04', 'eula37@example.org', 'Manizales', 'Cra 4 #46-83', 'Telas textiles', '2024-09-06 17:08:13', '2026-06-01 17:39:50'),
(90, 'Prof. Olin Schaden', 'McCullough, Lowe and Leffler', '4614408665', '3369251800', '1981-07-07', 'domenick68@example.org', 'Barranquilla', 'Cra 73 #29-47', 'Suelas de caucho', '2026-04-17 20:09:12', '2026-06-01 17:39:50'),
(91, 'Marina Dietrich Jr.', 'Herzog PLC', '7632958316', '3147022345', '1987-11-23', 'juvenal.jacobson@example.com', 'Neiva', 'Cra 77 #71-27', 'Accesorios', '2024-12-27 22:15:25', '2026-06-01 17:39:50'),
(92, 'Sarai Crist', 'Gusikowski and Sons', '1327517105', '3271613026', '1993-12-15', 'gabriel21@example.com', 'Bogotá', 'Cra 22 #72-88', 'Plantillas EVA', '2024-02-03 14:34:44', '2026-06-01 17:39:50'),
(93, 'Toney Prosacco V', 'Kris, McKenzie and Price', '6007586894', '3892228781', '2003-01-01', 'ted.gleichner@example.net', 'Medellín', 'Cra 4 #56-85', 'Cuero sintético', '2025-10-22 23:25:24', '2026-06-01 17:39:50'),
(94, 'Mrs. Lina Muller', 'Christiansen Group', '3784687977', '3477268216', '1993-11-09', 'alvah.schneider@example.org', 'Bogotá', 'Cra 42 #45-15', 'Plantillas EVA', '2024-08-31 12:47:49', '2026-06-01 17:39:50'),
(95, 'Prof. Westley Sauer IV', 'Lockman, Lehner and Moore', '5635101146', '3947987719', '1998-05-26', 'guy.murazik@example.net', 'Barranquilla', 'Cra 64 #14-7', 'Hebillas metálicas', '2024-01-21 19:17:02', '2026-06-01 17:39:50'),
(96, 'Delpha Leffler', 'Barrows, Gutkowski and Herzog', '5506493377', '3802396176', '1983-09-29', 'wkemmer@example.org', 'Pereira', 'Cra 24 #65-3', 'Hilos industriales', '2023-07-20 11:17:38', '2026-06-01 17:39:50'),
(97, 'Dr. Aida O\'Connell II', 'Schuppe-Little', '6335289979', '3660744533', '1974-10-11', 'kariane.marvin@example.org', 'Ibagué', 'Cra 28 #66-64', 'Telas textiles', '2024-03-01 21:01:15', '2026-06-01 17:39:50'),
(98, 'Justine Senger', 'Sawayn, Cremin and Quigley', '9620558026', '3582431896', '1969-04-15', 'qpfeffer@example.org', 'Ibagué', 'Cra 29 #73-14', 'Hilos industriales', '2024-09-11 02:27:52', '2026-06-01 17:39:50'),
(99, 'Dr. Tremaine Glover III', 'Greenholt Inc', '6307465683', '3308347239', '1973-07-31', 'gweimann@example.org', 'Armenia', 'Cra 14 #68-33', 'Suelas de caucho', '2024-09-30 04:58:14', '2026-06-01 17:39:50'),
(100, 'Kayli Schowalter', 'Langosh, Orn and Beahan', '6945820800', '3112240688', '2000-11-20', 'edyth06@example.net', 'Armenia', 'Cra 7 #95-10', 'Pegantes', '2024-03-09 10:20:56', '2026-06-01 17:39:50'),
(101, 'Joan Legros', 'Grimes PLC', '1133230343', '3022108401', '1990-11-06', 'turner94@example.net', 'Barranquilla', 'Cra 24 #87-75', 'Cuero natural', '2023-10-12 02:10:17', '2026-06-01 17:39:50'),
(102, 'Mya Ryan MD', 'Dickinson Ltd', '1577028551', '3062104676', '1997-10-29', 'bernhard.rhoda@example.net', 'Armenia', 'Cra 68 #87-21', 'Cuero sintético', '2023-11-11 13:58:39', '2026-06-01 17:39:50'),
(103, 'Dr. Dedric Lesch', 'Skiles-Doyle', '0405330565', '3877278690', '1969-09-07', 'darrin.harber@example.com', 'Bucaramanga', 'Cra 69 #64-93', 'Hilos industriales', '2024-06-02 12:18:41', '2026-06-01 17:39:50'),
(104, 'Prof. Abagail Brown', 'Jacobson Inc', '0459031371', '3156227699', '2005-07-26', 'zwalter@example.org', 'Ibagué', 'Cra 58 #51-6', 'Hebillas metálicas', '2025-01-24 00:04:22', '2026-06-01 17:39:50'),
(105, 'Janiya Swift', 'Wiegand Inc', '9227362469', '3633335425', '1988-01-03', 'watsica.raphaelle@example.com', 'Cali', 'Cra 58 #16-84', 'Plantillas EVA', '2025-03-24 10:49:06', '2026-06-01 17:39:50'),
(106, 'Mr. Howell Schmidt Sr.', 'Becker-Lindgren', '5820717848', '3069963081', '1971-02-21', 'royal17@example.net', 'Pereira', 'Cra 43 #30-23', 'Hebillas metálicas', '2023-08-02 10:42:39', '2026-06-01 17:39:50'),
(107, 'Joany Braun', 'Hartmann, Romaguera and Lesch', '5071700783', '3829009354', '1984-11-25', 'kreiger.krystina@example.org', 'Bogotá', 'Cra 25 #77-28', 'Telas textiles', '2025-12-24 12:54:41', '2026-06-01 17:39:50'),
(108, 'Mr. Brady Koelpin III', 'Cummerata Group', '4462116045', '3707721900', '1978-03-10', 'vfeeney@example.org', 'Medellín', 'Cra 78 #53-72', 'Telas textiles', '2025-02-01 22:09:46', '2026-06-01 17:39:50'),
(109, 'Percival Treutel', 'Rau-Hansen', '9351667212', '3709537012', '2005-01-03', 'ernestina87@example.net', 'Bucaramanga', 'Cra 68 #97-68', 'Hilos industriales', '2026-05-10 06:32:33', '2026-06-01 17:39:50'),
(110, 'Lorenzo Graham DDS', 'Hessel, Maggio and Lindgren', '6273099197', '3506129151', '1995-04-26', 'schinner.brando@example.net', 'Manizales', 'Cra 68 #27-93', 'Hebillas metálicas', '2025-07-01 11:48:06', '2026-06-01 17:39:50'),
(111, 'Marianne Swift Jr.', 'Raynor-Mante', '8128422026', '3510873996', '2000-12-08', 'veum.rex@example.net', 'Ibagué', 'Cra 34 #15-41', 'Accesorios', '2024-06-17 12:26:19', '2026-06-01 17:39:50'),
(112, 'Prof. Margaretta Davis', 'Monahan, Emard and Bauch', '3842277796', '3369609856', '2004-12-30', 'brad48@example.com', 'Bogotá', 'Cra 10 #25-9', 'Hilos industriales', '2024-07-21 00:57:17', '2026-06-01 17:39:50'),
(113, 'Phyllis Pagac', 'Maggio-Turner', '7761421699', '3627371612', '1970-03-01', 'bfunk@example.com', 'Bucaramanga', 'Cra 15 #42-65', 'Telas textiles', '2023-11-19 13:09:04', '2026-06-01 17:39:50'),
(114, 'Icie Bartell', 'Okuneva, Greenfelder and Thiel', '2850495694', '3756299859', '1983-02-28', 'jared77@example.com', 'Bogotá', 'Cra 19 #18-73', 'Accesorios', '2024-03-09 10:19:50', '2026-06-01 17:39:50'),
(115, 'Osborne Terry', 'Carter, Heaney and Heaney', '2832096924', '3818867072', '2002-06-12', 'shea.stoltenberg@example.com', 'Cali', 'Cra 74 #34-56', 'Hilos industriales', '2025-07-09 19:15:18', '2026-06-01 17:39:50'),
(116, 'Dr. Kevin Herman MD', 'Treutel, Mann and Denesik', '9795349875', '3665600441', '1993-06-18', 'schroeder.ryann@example.com', 'Bucaramanga', 'Cra 25 #31-74', 'Cuero natural', '2025-04-06 13:56:25', '2026-06-01 17:39:50'),
(117, 'Jamel Zemlak', 'D\'Amore Ltd', '2453929333', '3723970830', '1993-03-02', 'zelma.howell@example.com', 'Neiva', 'Cra 18 #95-6', 'Pegantes', '2026-04-20 03:29:47', '2026-06-01 17:39:50'),
(118, 'Dan Schroeder Sr.', 'Walter and Sons', '3219429448', '3227972171', '1985-04-22', 'oconnell.frances@example.org', 'Neiva', 'Cra 44 #80-24', 'Pegantes', '2024-06-11 21:13:50', '2026-06-01 17:39:50'),
(119, 'Mr. Lonzo Herman MD', 'Parisian-Brakus', '1857320403', '3371196895', '2002-05-27', 'jrice@example.com', 'Armenia', 'Cra 15 #66-56', 'Plantillas EVA', '2025-08-22 17:22:36', '2026-06-01 17:39:50'),
(120, 'Mariana Schamberger', 'Harber-Schneider', '7068990088', '3633046847', '2001-12-21', 'troberts@example.org', 'Manizales', 'Cra 78 #62-70', 'Espumas', '2025-02-16 11:32:19', '2026-06-01 17:39:50'),
(121, 'Miss Layla Satterfield', 'Hermann, Casper and Abshire', '2960948351', '3268570251', '1990-02-26', 'ckovacek@example.com', 'Pereira', 'Cra 27 #52-8', 'Hilos industriales', '2024-09-12 01:21:31', '2026-06-01 17:39:50'),
(122, 'Mr. Rex Hills Sr.', 'Walter, Howe and DuBuque', '6865789199', '3703468682', '1971-09-25', 'michaela.blanda@example.org', 'Bogotá', 'Cra 68 #53-57', 'Hebillas metálicas', '2024-06-17 17:50:00', '2026-06-01 17:39:50'),
(123, 'Heather Hammes PhD', 'Hoeger LLC', '8079282526', '3564256731', '1990-09-10', 'pbrown@example.com', 'Ibagué', 'Cra 8 #86-61', 'Accesorios', '2025-06-21 05:33:01', '2026-06-01 17:39:50'),
(124, 'Abbigail Olson Sr.', 'Mayert Inc', '0447511854', '3091933032', '1981-03-19', 'osinski.sabina@example.org', 'Ibagué', 'Cra 76 #39-50', 'Telas textiles', '2024-01-22 04:22:34', '2026-06-01 17:39:50'),
(125, 'Erica Adams', 'Huel-Block', '1406328205', '3232294795', '1992-10-18', 'robel.bernardo@example.com', 'Neiva', 'Cra 56 #39-64', 'Cuero sintético', '2025-01-03 18:07:55', '2026-06-01 17:39:50'),
(126, 'Furman Breitenberg', 'Kihn and Sons', '6088807757', '3930696962', '2000-01-17', 'otho95@example.org', 'Manizales', 'Cra 38 #19-73', 'Hilos industriales', '2024-10-26 09:59:12', '2026-06-01 17:39:50'),
(127, 'Mr. Juwan Cummerata I', 'Miller and Sons', '5002250137', '3117070323', '1995-04-22', 'hgislason@example.net', 'Neiva', 'Cra 41 #83-73', 'Suelas de caucho', '2023-07-11 10:42:42', '2026-06-01 17:39:50'),
(128, 'Mr. Rudy Runolfsson', 'Cartwright Ltd', '9085415810', '3128117597', '1993-09-25', 'sigrid16@example.net', 'Medellín', 'Cra 79 #58-13', 'Telas textiles', '2024-11-10 19:02:55', '2026-06-01 17:39:50'),
(129, 'Katelin Beer', 'Kunze, Braun and Hills', '5620169523', '3897436641', '1979-12-10', 'devon.swift@example.com', 'Bogotá', 'Cra 47 #45-35', 'Plantillas EVA', '2024-03-10 16:55:20', '2026-06-01 17:39:50'),
(130, 'Imogene Ullrich', 'Schoen Ltd', '4909454312', '3273346245', '1990-08-17', 'wunsch.buck@example.com', 'Manizales', 'Cra 54 #30-82', 'Espumas', '2024-11-16 07:28:02', '2026-06-01 17:39:50'),
(131, 'Rebeca Schmeler', 'Dooley, Littel and Crona', '1889477949', '3472371419', '1977-11-14', 'dorris88@example.com', 'Pereira', 'Cra 18 #30-38', 'Hilos industriales', '2025-09-18 02:07:21', '2026-06-01 17:39:50'),
(132, 'Ms. Cathryn Becker', 'Ritchie, White and Fahey', '0941959233', '3312248849', '1967-10-16', 'nyasia.schuster@example.org', 'Neiva', 'Cra 64 #57-40', 'Suelas de caucho', '2024-04-19 19:19:42', '2026-06-01 17:39:50'),
(133, 'Laisha Howell III', 'Kutch, Lang and Ward', '7243370992', '3654179303', '2006-05-02', 'velma97@example.org', 'Ibagué', 'Cra 56 #24-61', 'Cuero natural', '2024-09-22 11:08:39', '2026-06-01 17:39:50'),
(134, 'Prof. Kris Fritsch III', 'Tromp, Beier and Herman', '2499429125', '3792686222', '2001-02-03', 'rharber@example.net', 'Armenia', 'Cra 21 #73-46', 'Hilos industriales', '2025-07-09 17:36:53', '2026-06-01 17:39:50'),
(135, 'Ms. Jazmin Cronin', 'Davis, Luettgen and Feeney', '5365195408', '3174915359', '1967-09-19', 'blair.mckenzie@example.net', 'Medellín', 'Cra 73 #18-76', 'Plantillas EVA', '2025-06-08 04:32:42', '2026-06-01 17:39:50'),
(136, 'Madelyn Klein', 'Fahey-DuBuque', '6776558943', '3206010036', '2001-06-25', 'ullrich.adela@example.net', 'Bogotá', 'Cra 43 #6-22', 'Telas textiles', '2026-04-25 13:21:14', '2026-06-01 17:39:50'),
(137, 'Nathan White', 'Altenwerth-Waters', '6851581704', '3694539629', '2000-11-14', 'koelpin.madisyn@example.net', 'Bogotá', 'Cra 76 #66-33', 'Telas textiles', '2025-01-10 20:00:47', '2026-06-01 17:39:50'),
(138, 'Tatyana Lesch II', 'Jacobi and Sons', '6446882509', '3323518307', '1980-07-08', 'iwaelchi@example.com', 'Manizales', 'Cra 30 #91-94', 'Telas textiles', '2025-01-13 10:42:50', '2026-06-01 17:39:50'),
(139, 'Araceli Thiel DVM', 'Roob, Mohr and Bruen', '9309140877', '3873420326', '1999-02-23', 'mraz.kiara@example.org', 'Armenia', 'Cra 1 #78-25', 'Cuero natural', '2024-05-16 19:51:10', '2026-06-01 17:39:50'),
(140, 'Jackeline McCullough', 'Oberbrunner-Shields', '0164893188', '3877709272', '1990-01-06', 'cummerata.evelyn@example.net', 'Neiva', 'Cra 39 #40-88', 'Espumas', '2024-11-20 07:22:03', '2026-06-01 17:39:50'),
(141, 'Rylan Dibbert', 'Greenholt-Daugherty', '0275365655', '3096987752', '1992-04-12', 'stracke.anjali@example.org', 'Neiva', 'Cra 24 #6-28', 'Plantillas EVA', '2024-10-22 10:19:06', '2026-06-01 17:39:50'),
(142, 'Mr. Ethan Kuhic', 'Bergstrom, Gorczany and Kessler', '1265669049', '3408081974', '1970-10-02', 'cyrus.ferry@example.org', 'Medellín', 'Cra 70 #68-77', 'Pegantes', '2025-04-07 08:56:20', '2026-06-01 17:39:50'),
(143, 'Dr. Kristin Doyle', 'Mraz-Schumm', '9653080586', '3591402964', '1996-10-26', 'ryleigh85@example.com', 'Barranquilla', 'Cra 74 #52-54', 'Telas textiles', '2023-12-11 00:14:50', '2026-06-01 17:39:50'),
(144, 'Dr. Alek Goodwin', 'Strosin-Moen', '0356349636', '3290257947', '1992-11-24', 'maye63@example.org', 'Neiva', 'Cra 67 #28-39', 'Plantillas EVA', '2026-05-15 11:41:59', '2026-06-01 17:39:50'),
(145, 'Prof. Nikolas Connelly MD', 'Smitham, Crist and Quigley', '0355785035', '3043161277', '1984-08-11', 'genesis.labadie@example.com', 'Barranquilla', 'Cra 13 #99-87', 'Telas textiles', '2025-04-19 19:55:49', '2026-06-01 17:39:50'),
(146, 'Brenna Berge', 'Goldner-Conroy', '8215783659', '3870730171', '2004-02-03', 'jmraz@example.net', 'Bogotá', 'Cra 62 #77-6', 'Suelas de caucho', '2024-12-07 00:50:12', '2026-06-01 17:39:50'),
(147, 'Roger Walter', 'Lindgren and Sons', '1966155002', '3009216471', '1972-01-04', 'cleora.rath@example.com', 'Barranquilla', 'Cra 26 #36-60', 'Suelas de caucho', '2025-11-21 07:06:12', '2026-06-01 17:39:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Acceso total al sistema', '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(2, 'Bodeguero', 'Gestión de inventario y movimientos', '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(3, 'Vendedor', 'Gestión de clientes y salidas de productos', '2026-06-01 17:39:49', '2026-06-01 17:39:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 1),
(2, 3),
(2, 8),
(3, 1),
(3, 4),
(3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas_materia_prima`
--

CREATE TABLE `salidas_materia_prima` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materia_prima_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_nombre` varchar(255) NOT NULL,
  `observacion` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salidas_materia_prima`
--

INSERT INTO `salidas_materia_prima` (`id`, `materia_prima_id`, `cantidad`, `fecha`, `usuario_nombre`, `observacion`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 47, 60, '2025-07-12', 'Dr. Mariana Cummings', 'Fabricación sandalias', 96, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(3, 53, 155, '2024-11-30', 'Administrador Principal', 'Merma de producción', 1, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(4, 30, 75, '2026-03-30', 'Prof. Addie Kessler II', 'Costura botas', 67, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(5, 147, 66, '2026-04-15', 'Nichole Dickinson DDS', 'Fabricación sandalias', 76, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(7, 78, 16, '2024-10-31', 'Jordyn Schinner', 'Uso en plantillas', 7, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(8, 9, 147, '2025-08-20', 'Virgie Bergnaum III', 'Fabricación sandalias', 15, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(9, 112, 90, '2025-07-04', 'Dr. Mariana Cummings', 'Merma de producción', 96, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(10, 30, 151, '2026-05-13', 'Zola Lubowitz', 'Costura botas', 8, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(11, 138, 183, '2026-04-20', 'Prof. Else Gaylord', 'Producción calzado infantil', 32, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(12, 130, 55, '2026-02-01', 'Percival McLaughlin II', 'Producción calzado infantil', 11, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(13, 131, 87, '2025-06-10', 'Prof. Reynold Ward', 'Fabricación sandalias', 24, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(15, 71, 75, '2025-11-18', 'Eduardo Kovacek', 'Producción lote zapatos', 123, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(16, 25, 126, '2024-07-23', 'Fannie Eichmann', 'Producción calzado infantil', 119, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(17, 19, 110, '2024-10-29', 'Amaya Skiles', 'Uso en plantillas', 135, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(18, 68, 133, '2025-01-20', 'Yoshiko Johnston', 'Fabricación sandalias', 44, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(19, 128, 199, '2025-09-29', 'Eliza Lakin', 'Merma de producción', 68, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(20, 7, 94, '2025-12-08', 'Santina Hessel', 'Costura botas', 115, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(21, 63, 36, '2026-05-06', 'Prof. Else Gaylord', 'Merma de producción', 32, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(22, 88, 146, '2025-03-17', 'Zola Lubowitz', 'Merma de producción', 8, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(23, 38, 102, '2025-11-15', 'Dr. Aric Parisian', 'Merma de producción', 92, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(24, 39, 127, '2026-03-26', 'Dr. Vivian Klein', 'Uso en plantillas', 131, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(25, 88, 62, '2025-06-10', 'Westley Friesen', 'Producción lote zapatos', 42, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(26, 51, 50, '2025-01-23', 'Sebastian O\'Hara III', 'Producción calzado infantil', 27, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(27, 40, 20, '2025-06-24', 'Candice Jaskolski', 'Producción lote zapatos', 112, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(28, 84, 106, '2025-07-25', 'Ashlynn Kuhlman', 'Costura botas', 25, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(29, 31, 116, '2025-02-13', 'Administrador Principal', 'Costura botas', 1, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(30, 57, 40, '2025-04-25', 'Fannie Eichmann', 'Fabricación sandalias', 119, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(31, 37, 51, '2026-05-14', 'Fredrick Rath MD', 'Fabricación sandalias', 43, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(32, 95, 160, '2024-07-29', 'Yoshiko Johnston', 'Merma de producción', 44, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(33, 156, 141, '2024-06-30', 'Yoshiko Johnston', 'Producción calzado infantil', 44, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(34, 82, 160, '2024-11-01', 'Alexandria Senger', 'Uso en plantillas', 98, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(35, 49, 109, '2026-02-25', 'Savannah Schimmel I', 'Producción lote zapatos', 2, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(36, 131, 147, '2025-05-29', 'Kelley Koss', 'Uso en plantillas', 116, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(37, 98, 146, '2026-04-16', 'Prof. Mya Zieme', 'Producción calzado infantil', 109, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(38, 100, 85, '2025-01-28', 'Ms. Danielle Goyette V', 'Producción lote zapatos', 59, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(39, 39, 14, '2025-01-09', 'Miss Hassie Rogahn', 'Producción lote zapatos', 31, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(40, 59, 186, '2025-11-16', 'Virgie Bergnaum III', 'Uso en plantillas', 15, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(41, 71, 168, '2025-03-09', 'Rosalyn Greenholt', 'Merma de producción', 30, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(42, 9, 200, '2025-11-14', 'Giuseppe Botsford', 'Costura botas', 6, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(43, 128, 135, '2026-06-01', 'Ryan Schimmel', 'Uso en plantillas', 89, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(44, 118, 161, '2024-11-01', 'Ms. Bridget Gerlach I', 'Fabricación sandalias', 93, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(45, 124, 77, '2024-07-20', 'Prof. Haven Barton', 'Uso en plantillas', 75, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(46, 101, 189, '2024-12-04', 'Dr. Terence Kiehn II', 'Producción lote zapatos', 114, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(47, 67, 184, '2024-09-28', 'Dr. Mariana Cummings', 'Costura botas', 96, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(48, 67, 131, '2025-07-10', 'Dasia Goyette IV', 'Uso en plantillas', 46, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(49, 37, 88, '2025-03-25', 'Mrs. Kristina DuBuque DVM', 'Fabricación sandalias', 80, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(50, 18, 153, '2025-12-02', 'Dayton Feest', 'Producción calzado infantil', 33, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(51, 121, 131, '2025-07-21', 'Ms. Lea Runte DDS', 'Uso en plantillas', 56, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(52, 101, 142, '2026-04-28', 'Dawson Swift', 'Costura botas', 5, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(53, 111, 6, '2025-02-21', 'Prof. Kathlyn Maggio', 'Merma de producción', 38, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(54, 21, 47, '2024-10-30', 'Miss Hassie Rogahn', 'Merma de producción', 31, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(55, 102, 131, '2025-01-10', 'Sebastian O\'Hara III', 'Merma de producción', 27, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(56, 9, 177, '2024-07-16', 'Prof. Else Gaylord', 'Merma de producción', 32, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(57, 113, 43, '2026-01-02', 'Sebastian O\'Hara III', 'Uso en plantillas', 27, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(58, 75, 191, '2025-09-25', 'Merle Schmeler', 'Fabricación sandalias', 19, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(59, 97, 81, '2025-03-23', 'Miss Christiana Bogan Jr.', 'Fabricación sandalias', 72, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(60, 88, 149, '2025-07-03', 'Dayton Feest', 'Costura botas', 33, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(61, 28, 81, '2025-05-09', 'Mallie Considine', 'Fabricación sandalias', 63, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(62, 82, 175, '2024-11-05', 'Nichole Dickinson DDS', 'Fabricación sandalias', 76, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(63, 155, 112, '2024-06-17', 'Stefan Medhurst', 'Costura botas', 91, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(64, 156, 131, '2025-11-13', 'Alexandria Senger', 'Producción lote zapatos', 98, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(65, 109, 169, '2024-10-26', 'Ms. Bridget Gerlach I', 'Merma de producción', 93, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(66, 54, 118, '2024-11-14', 'Sarah Rau', 'Costura botas', 17, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(67, 39, 196, '2025-05-19', 'Prof. Loy Hilpert', 'Costura botas', 117, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(68, 65, 19, '2026-02-22', 'Mr. Cordell Greenfelder', 'Fabricación sandalias', 22, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(69, 92, 188, '2025-03-11', 'Dr. Alfonzo Wiegand', 'Merma de producción', 51, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(70, 120, 43, '2025-07-11', 'Loyce Cronin', 'Producción lote zapatos', 18, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(71, 121, 166, '2026-05-07', 'Rhea Kling', 'Producción lote zapatos', 84, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(72, 63, 74, '2025-10-07', 'Doris Dicki', 'Costura botas', 95, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(74, 150, 116, '2024-09-26', 'Shany Douglas', 'Uso en plantillas', 36, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(75, 3, 163, '2025-07-16', 'Miss Odessa Orn DDS', 'Merma de producción', 77, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(76, 78, 138, '2025-12-28', 'Rhea Kling', 'Uso en plantillas', 84, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(77, 41, 196, '2024-11-23', 'Breanna Krajcik', 'Merma de producción', 57, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(78, 75, 85, '2026-05-05', 'Mrs. Kristina DuBuque DVM', 'Fabricación sandalias', 80, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(79, 107, 127, '2026-03-25', 'Shany Douglas', 'Costura botas', 36, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(80, 147, 46, '2025-02-09', 'Jordyn Schinner', 'Producción lote zapatos', 7, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(81, 81, 69, '2025-10-27', 'Westley Friesen', 'Uso en plantillas', 42, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(82, 117, 178, '2026-02-05', 'Dr. Aric Parisian', 'Producción calzado infantil', 92, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(83, 119, 112, '2024-06-04', 'Ms. Danielle Goyette V', 'Costura botas', 59, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(84, 129, 15, '2025-02-10', 'Kelley Koss', 'Producción lote zapatos', 116, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(85, 115, 37, '2026-01-27', 'Daryl Pfeffer', 'Producción lote zapatos', 83, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(86, 91, 150, '2026-02-28', 'Eda Smith', 'Producción calzado infantil', 4, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(87, 53, 175, '2025-03-21', 'Doris Dicki', 'Producción lote zapatos', 95, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(88, 8, 43, '2025-09-23', 'Mr. Jamaal Stanton II', 'Costura botas', 41, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(89, 116, 133, '2026-01-08', 'Elwin Tremblay', 'Uso en plantillas', 106, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(91, 85, 33, '2026-05-19', 'Mallie Considine', 'Producción calzado infantil', 63, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(92, 112, 188, '2025-04-08', 'Percival McLaughlin II', 'Costura botas', 11, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(93, 21, 105, '2025-12-17', 'Prof. Owen Bogan', 'Fabricación sandalias', 121, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(94, 48, 147, '2024-12-11', 'Doris Dicki', 'Costura botas', 95, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(95, 9, 140, '2026-01-14', 'Miss Christiana Bogan Jr.', 'Producción calzado infantil', 72, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(96, 111, 67, '2026-02-18', 'Fannie Eichmann', 'Uso en plantillas', 119, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(97, 112, 138, '2025-12-04', 'Alexandria Senger', 'Producción lote zapatos', 98, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(98, 14, 153, '2025-10-29', 'Mrs. Edyth Hand Sr.', 'Uso en plantillas', 39, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(99, 73, 96, '2024-07-11', 'Damien Cole', 'Costura botas', 29, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(100, 88, 101, '2024-07-13', 'Emmitt Grimes', 'Producción lote zapatos', 34, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(101, 119, 84, '2025-06-13', 'Karelle O\'Hara', 'Uso en plantillas', 40, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(102, 90, 160, '2025-09-16', 'Damion Lehner', 'Fabricación sandalias', 65, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(103, 37, 87, '2026-05-22', 'Sarah Rau', 'Producción lote zapatos', 17, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(104, 21, 130, '2025-03-11', 'Katarina Jast', 'Producción lote zapatos', 37, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(105, 104, 47, '2026-03-02', 'Prof. Candida Lubowitz PhD', 'Merma de producción', 129, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(106, 143, 58, '2024-12-24', 'Prof. Else Gaylord', 'Uso en plantillas', 32, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(107, 7, 118, '2025-02-17', 'Lia Steuber PhD', 'Merma de producción', 3, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(108, 86, 181, '2025-11-04', 'Magdalena Witting', 'Producción lote zapatos', 49, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(109, 40, 63, '2025-06-07', 'Dr. Annamae Rodriguez IV', 'Uso en plantillas', 23, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(110, 6, 43, '2024-06-23', 'Prof. Jazmyne Prosacco II', 'Producción calzado infantil', 13, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(111, 59, 69, '2024-12-08', 'Prof. Candida Lubowitz PhD', 'Costura botas', 129, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(112, 15, 78, '2025-06-03', 'Elwin Tremblay', 'Producción lote zapatos', 106, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(113, 97, 106, '2024-10-20', 'Jerald Lynch', 'Producción lote zapatos', 78, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(114, 50, 66, '2025-09-06', 'Dr. Isom Gutmann', 'Merma de producción', 14, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(115, 55, 65, '2026-01-02', 'Dasia Goyette IV', 'Costura botas', 46, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(116, 109, 87, '2026-03-29', 'Alfred Moen Sr.', 'Costura botas', 101, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(117, 33, 60, '2024-10-07', 'Virgie Bergnaum III', 'Fabricación sandalias', 15, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(118, 20, 165, '2026-04-27', 'Sigrid Weber', 'Merma de producción', 126, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(119, 15, 91, '2025-12-27', 'Dr. Alfonzo Wiegand', 'Merma de producción', 51, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(120, 78, 84, '2024-07-23', 'Mr. Saul Gerhold IV', 'Producción lote zapatos', 134, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(121, 149, 75, '2025-11-01', 'Santina Hessel', 'Producción calzado infantil', 115, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(122, 113, 79, '2025-07-17', 'Eduardo Kovacek', 'Producción lote zapatos', 123, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(123, 69, 29, '2024-10-06', 'Mrs. Camila Hayes', 'Uso en plantillas', 64, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(124, 106, 39, '2026-04-16', 'Katarina Jast', 'Merma de producción', 37, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(125, 115, 146, '2024-06-08', 'Heidi Schulist', 'Producción lote zapatos', 16, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(126, 62, 74, '2025-01-14', 'Prof. Oliver Pouros', 'Producción calzado infantil', 9, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(127, 13, 17, '2024-12-02', 'Rhea Kling', 'Costura botas', 84, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(128, 136, 27, '2025-03-05', 'Sigrid Weber', 'Uso en plantillas', 126, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(129, 114, 24, '2026-02-06', 'Melyna Bartell', 'Costura botas', 73, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(130, 130, 138, '2025-02-13', 'Kassandra Brown', 'Fabricación sandalias', 70, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(131, 133, 179, '2025-07-01', 'Yoshiko Johnston', 'Merma de producción', 44, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(132, 67, 63, '2025-04-04', 'Sigrid Weber', 'Uso en plantillas', 126, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(133, 128, 160, '2025-04-25', 'Prof. Else Gaylord', 'Fabricación sandalias', 32, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(134, 134, 115, '2025-09-21', 'Stefan Medhurst', 'Costura botas', 91, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(135, 71, 153, '2024-11-27', 'Mr. Cordell Greenfelder', 'Fabricación sandalias', 22, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(136, 117, 193, '2024-10-30', 'Karelle O\'Hara', 'Costura botas', 40, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(137, 157, 197, '2025-09-26', 'Lia Steuber PhD', 'Fabricación sandalias', 3, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(138, 122, 33, '2026-01-11', 'Rosalee Rogahn', 'Merma de producción', 21, '2026-06-01 17:39:50', '2026-06-01 17:39:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas_productos`
--

CREATE TABLE `salidas_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_nombre` varchar(255) NOT NULL,
  `observacion` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salidas_productos`
--

INSERT INTO `salidas_productos` (`id`, `producto_id`, `cliente_id`, `cantidad`, `fecha`, `usuario_nombre`, `observacion`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 60, 106, 49, '2026-02-16', 'Mr. Cordell Greenfelder', 'Venta online', 22, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(2, 4, 7, 19, '2024-12-16', 'Dr. Alfonzo Wiegand', 'Pedido cliente', 51, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(3, 47, 1, 21, '2025-12-15', 'Breanna Krajcik', 'Pedido cliente', 57, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(4, 89, 58, 3, '2025-10-25', 'Kellie Johnson I', 'Venta online', 120, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(5, 28, 16, 15, '2025-02-19', 'Dr. Isom Gutmann', 'Venta online', 14, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(6, 5, 71, 96, '2025-06-13', 'Ms. Bridget Gerlach I', 'Venta online', 93, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(7, 57, 59, 87, '2024-11-07', 'Jerad Becker', 'Venta online', 81, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(8, 171, 49, 96, '2025-09-09', 'Dr. Terence Kiehn II', 'Exportación', 114, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(9, 36, 109, 23, '2026-01-30', 'Damion Lehner', 'Despacho mayorista', 65, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(10, 11, 97, 84, '2024-07-22', 'Candice Jaskolski', 'Pedido cliente', 112, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(11, 49, 81, 84, '2025-12-30', 'Mrs. Jailyn Reichel', 'Exportación', 87, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(12, 45, 40, 91, '2024-07-03', 'Matilda Bechtelar', 'Venta directa', 82, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(13, 54, 126, 19, '2026-05-29', 'Administrador Principal', 'Pedido cliente', 1, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(14, 148, 40, 16, '2024-10-04', 'Estrella Towne', 'Venta online', 26, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(15, 8, 11, 9, '2024-12-24', 'Lia Steuber PhD', 'Pedido cliente', 3, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(16, 47, 80, 43, '2025-09-12', 'Cassandra Wiegand', 'Venta directa', 52, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(17, 46, 55, 24, '2025-11-19', 'Prof. Darrell Heller', 'Despacho mayorista', 35, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(18, 103, 123, 66, '2025-09-26', 'Damien Cole', 'Despacho mayorista', 29, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(19, 130, 20, 47, '2025-07-03', 'Heidi Schulist', 'Venta online', 16, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(20, 99, 62, 29, '2024-08-10', 'Fannie Eichmann', 'Pedido corporativo', 119, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(21, 40, 86, 72, '2026-02-05', 'Damien Cole', 'Venta online', 29, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(22, 120, 9, 84, '2026-04-29', 'Flossie Graham', 'Exportación', 124, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(23, 63, 49, 28, '2024-12-12', 'Ms. Lea Runte DDS', 'Venta directa', 56, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(24, 31, 36, 12, '2025-01-27', 'Mrs. Edyth Hand Sr.', 'Pedido cliente', 39, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(25, 160, 26, 10, '2026-02-17', 'Dasia Goyette IV', 'Pedido cliente', 46, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(26, 99, 69, 73, '2026-03-03', 'Prof. Candida Lubowitz PhD', 'Pedido corporativo', 129, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(27, 57, 19, 54, '2026-02-08', 'Mrs. Camila Hayes', 'Pedido cliente', 64, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(28, 139, 7, 43, '2024-06-27', 'Dr. Isom Gutmann', 'Despacho mayorista', 14, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(29, 163, 31, 61, '2024-10-28', 'Nichole Dickinson DDS', 'Pedido cliente', 76, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(30, 63, 110, 89, '2025-05-07', 'Katarina Jast', 'Venta online', 37, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(31, 144, 15, 59, '2025-09-19', 'Rashad Hill', 'Exportación', 88, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(32, 1, 110, 22, '2025-02-03', 'Jerald Lynch', 'Exportación', 78, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(33, 110, 32, 3, '2025-11-14', 'Noel Heathcote', 'Pedido corporativo', 110, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(34, 48, 95, 75, '2026-05-12', 'Mrs. Alexandra Jacobson I', 'Venta directa', 71, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(35, 125, 8, 12, '2024-09-30', 'Dr. Deron Kerluke', 'Pedido cliente', 122, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(36, 11, 35, 13, '2024-06-20', 'Ned Bosco', 'Exportación', 60, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(37, 167, 8, 59, '2025-03-10', 'Kelley Koss', 'Venta directa', 116, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(38, 47, 115, 77, '2025-11-06', 'Savannah Schimmel I', 'Exportación', 2, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(39, 12, 102, 48, '2026-04-22', 'Dr. Berenice Tremblay', 'Exportación', 50, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(40, 111, 70, 2, '2024-11-24', 'Cassandra Wiegand', 'Pedido corporativo', 52, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(41, 33, 22, 17, '2025-04-12', 'Vivian Gleason', 'Pedido cliente', 54, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(42, 9, 10, 23, '2025-07-13', 'Prof. Javier Fritsch MD', 'Exportación', 128, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(43, 29, 16, 66, '2026-04-29', 'Prof. Javier Fritsch MD', 'Exportación', 128, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(44, 66, 60, 55, '2025-08-16', 'Estrella Towne', 'Venta online', 26, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(45, 48, 88, 29, '2026-03-01', 'Nya Torp', 'Despacho mayorista', 97, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(46, 25, 66, 21, '2025-07-06', 'Prof. Haven Barton', 'Pedido corporativo', 75, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(47, 43, 16, 34, '2025-09-08', 'Raegan Grant', 'Exportación', 74, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(48, 147, 83, 7, '2026-01-17', 'Prof. Owen Bogan', 'Despacho mayorista', 121, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(49, 84, 26, 75, '2025-06-06', 'Alexandria Senger', 'Venta online', 98, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(50, 10, 73, 73, '2024-10-01', 'Kellie Johnson I', 'Venta directa', 120, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(51, 55, 18, 50, '2025-11-25', 'Prof. Lewis Langosh', 'Pedido cliente', 69, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(52, 9, 63, 37, '2025-07-04', 'Ms. Bridget Gerlach I', 'Despacho mayorista', 93, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(53, 118, 32, 77, '2024-11-19', 'Lyda Considine Jr.', 'Exportación', 94, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(54, 63, 6, 24, '2024-10-20', 'Nya Torp', 'Venta online', 97, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(55, 4, 7, 37, '2025-01-13', 'Prof. Jazmyne Prosacco II', 'Exportación', 13, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(56, 26, 3, 69, '2024-09-09', 'Prof. Darrell Heller', 'Venta online', 35, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(57, 99, 128, 74, '2025-04-28', 'Karelle O\'Hara', 'Pedido cliente', 40, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(58, 146, 119, 35, '2025-01-03', 'Dasia Goyette IV', 'Pedido corporativo', 46, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(59, 143, 56, 45, '2025-10-17', 'Miss Christiana Bogan Jr.', 'Venta directa', 72, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(60, 23, 104, 82, '2025-11-23', 'Dr. Alfonzo Wiegand', 'Pedido corporativo', 51, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(61, 28, 13, 49, '2024-09-07', 'Administrador Principal', 'Exportación', 1, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(62, 114, 4, 86, '2025-01-02', 'Mr. Thad Pollich I', 'Pedido corporativo', 85, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(63, 58, 69, 45, '2024-08-30', 'Dawson Swift', 'Pedido cliente', 5, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(64, 25, 67, 1, '2024-10-04', 'Doris Dicki', 'Venta directa', 95, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(65, 2, 8, 92, '2024-08-17', 'Prof. Kathlyn Maggio', 'Exportación', 38, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(66, 144, 68, 47, '2025-06-07', 'Prof. Javier Fritsch MD', 'Pedido cliente', 128, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(67, 149, 112, 52, '2025-03-05', 'Paolo Mertz', 'Pedido corporativo', 86, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(68, 100, 53, 53, '2025-02-28', 'Rhea Kling', 'Despacho mayorista', 84, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(69, 79, 61, 26, '2024-12-30', 'Lia Steuber PhD', 'Venta online', 3, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(70, 86, 61, 58, '2026-04-01', 'Yoshiko Johnston', 'Exportación', 44, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(71, 54, 122, 7, '2026-02-26', 'Prof. Mya Zieme', 'Pedido corporativo', 109, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(72, 21, 111, 87, '2025-03-18', 'Prof. Bell Predovic', 'Venta directa', 79, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(73, 107, 23, 11, '2025-08-30', 'Emmitt Grimes', 'Exportación', 34, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(74, 128, 59, 15, '2024-12-29', 'Percival McLaughlin II', 'Venta online', 11, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(75, 81, 4, 8, '2025-03-02', 'Elisabeth Spinka', 'Pedido cliente', 130, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(76, 154, 80, 56, '2024-09-25', 'Yoshiko Johnston', 'Venta online', 44, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(77, 31, 20, 77, '2025-11-19', 'Mrs. Jailyn Reichel', 'Pedido corporativo', 87, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(78, 132, 84, 52, '2025-12-24', 'Jordyn Schinner', 'Despacho mayorista', 7, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(79, 85, 103, 39, '2026-01-05', 'Sigrid Weber', 'Exportación', 126, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(80, 96, 83, 12, '2024-10-19', 'Mr. Tobin Labadie', 'Venta online', 47, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(81, 81, 18, 97, '2026-04-28', 'Giuseppe Botsford', 'Pedido corporativo', 6, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(82, 80, 128, 5, '2025-11-06', 'Dr. Deron Kerluke', 'Pedido corporativo', 122, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(83, 28, 50, 65, '2025-03-19', 'Noemi Auer', 'Pedido corporativo', 28, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(84, 130, 11, 9, '2025-03-01', 'Alexandria Senger', 'Pedido corporativo', 98, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(85, 101, 90, 39, '2025-02-01', 'Prof. Haven Barton', 'Exportación', 75, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(86, 3, 98, 10, '2026-04-02', 'Monica Upton', 'Pedido cliente', 53, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(87, 46, 5, 22, '2026-01-11', 'Percival McLaughlin II', 'Venta directa', 11, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(88, 14, 51, 47, '2025-01-09', 'Miss Christiana Bogan Jr.', 'Venta directa', 72, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(89, 104, 106, 88, '2025-05-14', 'Prof. Javier Fritsch MD', 'Despacho mayorista', 128, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(90, 169, 88, 63, '2025-12-25', 'Ms. Bridget Gerlach I', 'Pedido cliente', 93, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(91, 172, 64, 8, '2026-01-24', 'Sebastian O\'Hara III', 'Despacho mayorista', 27, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(92, 133, 127, 41, '2025-05-21', 'Sebastian O\'Hara III', 'Pedido cliente', 27, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(93, 50, 104, 38, '2025-07-20', 'Prof. Candida Lubowitz PhD', 'Pedido corporativo', 129, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(94, 128, 17, 59, '2024-07-31', 'Yoshiko Johnston', 'Pedido corporativo', 44, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(95, 66, 21, 13, '2025-01-02', 'Ashlynn Kuhlman', 'Exportación', 25, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(96, 81, 62, 14, '2025-07-19', 'Rosalee Rogahn', 'Pedido corporativo', 21, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(97, 69, 53, 31, '2025-01-14', 'Lynn Kuhn', 'Pedido corporativo', 45, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(98, 151, 88, 1, '2025-03-12', 'Rashad Hill', 'Pedido cliente', 88, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(99, 125, 118, 30, '2024-07-04', 'Stefan Medhurst', 'Despacho mayorista', 91, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(100, 37, 32, 11, '2025-03-02', 'Giuseppe Botsford', 'Exportación', 6, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(101, 64, 5, 9, '2026-03-21', 'Katarina Jast', 'Pedido cliente', 37, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(102, 167, 78, 64, '2026-03-16', 'Paolo Mertz', 'Despacho mayorista', 86, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(103, 95, 73, 4, '2025-07-20', 'Prof. Mya Zieme', 'Pedido cliente', 109, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(104, 131, 38, 23, '2026-05-07', 'Miss Odessa Orn DDS', 'Exportación', 77, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(105, 35, 113, 57, '2024-09-29', 'Ms. Bridget Gerlach I', 'Despacho mayorista', 93, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(106, 109, 28, 72, '2024-06-26', 'Asia Jacobson', 'Exportación', 132, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(107, 163, 84, 51, '2025-04-08', 'Alexandria Senger', 'Despacho mayorista', 98, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(108, 64, 35, 17, '2025-02-09', 'Prof. Haven Barton', 'Pedido corporativo', 75, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(109, 121, 37, 51, '2026-02-22', 'Damion Lehner', 'Venta directa', 65, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(110, 111, 67, 81, '2024-08-26', 'Raegan Grant', 'Despacho mayorista', 74, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(111, 166, 3, 51, '2024-12-29', 'Santina Hessel', 'Venta online', 115, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(112, 46, 62, 57, '2025-11-28', 'Vivian Gleason', 'Despacho mayorista', 54, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(113, 123, 2, 9, '2026-03-23', 'Ashlynn Kuhlman', 'Pedido corporativo', 25, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(114, 74, 11, 84, '2024-07-23', 'Eliza Lakin', 'Despacho mayorista', 68, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(115, 24, 26, 70, '2025-10-19', 'Emmitt Grimes', 'Despacho mayorista', 34, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(116, 39, 99, 70, '2024-07-31', 'Kelley Koss', 'Exportación', 116, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(117, 113, 52, 79, '2025-09-24', 'Ms. Concepcion Wilkinson', 'Venta online', 137, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(118, 15, 82, 35, '2025-12-03', 'Mrs. Kristina DuBuque DVM', 'Pedido cliente', 80, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(119, 43, 34, 23, '2025-02-02', 'Candice Jaskolski', 'Pedido cliente', 112, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(120, 147, 23, 44, '2025-02-12', 'Dr. Terence Kiehn II', 'Exportación', 114, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(121, 104, 42, 17, '2025-10-26', 'Jordyn Schinner', 'Pedido cliente', 7, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(122, 141, 40, 59, '2025-11-07', 'Korbin Wehner', 'Venta directa', 103, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(123, 93, 50, 42, '2024-10-09', 'Jerad Becker', 'Pedido corporativo', 81, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(124, 107, 51, 63, '2024-11-15', 'Fannie Eichmann', 'Pedido cliente', 119, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(125, 140, 85, 39, '2025-08-30', 'Nyah Abernathy', 'Venta online', 136, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(126, 161, 8, 46, '2025-02-19', 'Prof. Else Gaylord', 'Venta directa', 32, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(127, 80, 33, 30, '2026-02-18', 'Alfred Moen Sr.', 'Exportación', 101, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(128, 149, 101, 43, '2025-10-13', 'Rashad Hill', 'Pedido cliente', 88, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(129, 12, 117, 62, '2025-09-08', 'Hudson Hayes', 'Pedido cliente', 66, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(130, 109, 116, 52, '2025-08-29', 'Mr. Brain Mayert II', 'Venta directa', 127, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(131, 24, 76, 74, '2024-08-07', 'Eda Smith', 'Pedido corporativo', 4, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(132, 155, 7, 87, '2026-04-18', 'Eda Smith', 'Pedido corporativo', 4, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(133, 75, 92, 63, '2024-08-12', 'Rosalee Rogahn', 'Exportación', 21, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(134, 119, 129, 82, '2026-04-24', 'Mrs. Edyth Hand Sr.', 'Pedido corporativo', 39, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(135, 123, 27, 78, '2024-11-03', 'Damien Cole', 'Pedido corporativo', 29, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(136, 84, 16, 17, '2025-11-19', 'Doris Dicki', 'Venta online', 95, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(137, 73, 123, 5, '2025-05-26', 'Dasia Goyette IV', 'Pedido corporativo', 46, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(138, 37, 6, 50, '2024-12-29', 'Savannah Schimmel I', 'Despacho mayorista', 2, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(139, 105, 106, 40, '2025-03-20', 'Ryan Schimmel', 'Venta online', 89, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(140, 65, 76, 85, '2025-05-07', 'Dr. Terence Kiehn II', 'Pedido cliente', 114, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(141, 58, 97, 67, '2025-12-24', 'Prof. Haven Barton', 'Venta directa', 75, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(142, 135, 2, 13, '2024-12-21', 'Giuseppe Botsford', 'Venta online', 6, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(143, 112, 26, 74, '2024-12-06', 'Miss Odessa Orn DDS', 'Venta online', 77, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(144, 52, 73, 44, '2025-12-06', 'Jerald Lynch', 'Despacho mayorista', 78, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(145, 71, 118, 12, '2026-01-20', 'Lia Steuber PhD', 'Exportación', 3, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(146, 96, 41, 98, '2026-04-08', 'Rhea Kling', 'Exportación', 84, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(147, 149, 60, 25, '2024-06-17', 'Ashlynn Kuhlman', 'Venta directa', 25, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(148, 37, 8, 33, '2025-01-24', 'Kirk Mitchell', 'Pedido cliente', 111, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(149, 132, 129, 74, '2025-05-17', 'Prof. Candida Lubowitz PhD', 'Despacho mayorista', 129, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(150, 35, 54, 6, '2025-03-04', 'Estrella Towne', 'Exportación', 26, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(151, 59, 110, 46, '2025-10-05', 'Anastasia Lang', 'Despacho mayorista', 90, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(152, 11, 70, 75, '2025-07-15', 'Mrs. Camila Hayes', 'Pedido corporativo', 64, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(153, 3, 63, 61, '2025-02-23', 'Prof. Haven Barton', 'Exportación', 75, '2026-06-01 17:39:50', '2026-06-01 17:39:50'),
(154, 33, 106, 64, '2025-03-06', 'Emmitt Grimes', 'Venta directa', 34, '2026-06-01 17:39:50', '2026-06-01 17:39:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DX8dwUL3r9kBVxk9A2n5HYvfuRfWB5fXbqypEdhk', 140, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRlBlZjFLRU9qb0FnVDRpYXJvbllIa1dOTndjWlNaRzBGdDNpcnVoSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE0MDt9', 1780328130),
('EyhVIbr9EyCxr726RkYjZ7tvlalPD0HHjtLE6HhI', 139, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaDh4OXdIUllVR3c2VGlraER4cWxYQjAwWXBQcVZMTnRjR1kwRzlBayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm92ZWVkb3JlcyI7czo1OiJyb3V0ZSI7czoxNzoicHJvdmVlZG9yZXMuaW5kZXgiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM5O30=', 1780324781),
('Hg5tbWDt1H6Jf2q945JcxexnWEsRKGTflUw2ZScw', 139, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.121.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUXpHd1VoQjlma2lCWmFlTGNYUTdiSUlSQkhjc0xZTFpzSEpSVENGWCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzOTt9', 1780324217),
('q4Qtz2jp8PqhBMx1BPn9bTzLu6Xq965RPAjKNnvW', 139, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidWpMUjhHU0tjU0Yxd1dtSjNsOFJqQkt2N3JXVVBtYnAwWHkzdWNqTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzOTt9', 1780527358);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador Principal', 'admin@fabricacardy.com', '2026-06-01 17:39:49', 1, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-06-01 17:39:49', '2026-06-01 17:39:49'),
(2, 'Savannah Schimmel I', 'hillary.king@example.net', '2026-06-01 17:39:49', 1, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-04-30 05:33:58', '2026-06-01 19:52:36'),
(3, 'Lia Steuber PhD', 'pollich.katrine@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-12-21 10:18:54', '2026-06-01 19:52:27'),
(4, 'Eda Smith', 'upton.marlin@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-11-18 22:33:10', '2026-06-01 17:39:49'),
(5, 'Dawson Swift', 'bria62@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-10-21 08:25:49', '2026-06-01 17:39:49'),
(6, 'Giuseppe Botsford', 'luettgen.henriette@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-09-20 01:50:58', '2026-06-01 17:39:49'),
(7, 'Jordyn Schinner', 'destany.vonrueden@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-02-18 22:40:39', '2026-06-01 17:39:49'),
(8, 'Zola Lubowitz', 'pparker@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-02-07 14:08:45', '2026-06-01 17:39:49'),
(9, 'Prof. Oliver Pouros', 'ugleichner@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-03-01 09:47:36', '2026-06-01 17:39:49'),
(10, 'Mae Schoen', 'willard.nikolaus@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-12-15 07:10:52', '2026-06-01 17:39:49'),
(11, 'Percival McLaughlin II', 'lester.kovacek@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-06-07 04:58:28', '2026-06-01 17:39:49'),
(12, 'Brian Jakubowski', 'vcremin@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-05-15 12:16:01', '2026-06-01 17:39:49'),
(13, 'Prof. Jazmyne Prosacco II', 'max68@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-10-26 00:35:53', '2026-06-01 17:39:49'),
(14, 'Dr. Isom Gutmann', 'kaya.schaefer@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-01-02 12:05:39', '2026-06-01 17:39:49'),
(15, 'Virgie Bergnaum III', 'zita.bogan@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-01-10 07:49:32', '2026-06-01 17:39:49'),
(16, 'Heidi Schulist', 'alicia00@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-08-13 08:20:02', '2026-06-01 17:39:49'),
(17, 'Sarah Rau', 'schultz.marjory@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-06-09 09:53:00', '2026-06-01 17:39:49'),
(18, 'Loyce Cronin', 'sschroeder@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-05-06 00:58:14', '2026-06-01 17:39:49'),
(19, 'Merle Schmeler', 'reagan.crist@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-03-17 15:16:31', '2026-06-01 17:39:49'),
(20, 'Alda Stiedemann', 'ned.kihn@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-08-06 23:09:38', '2026-06-01 17:39:49'),
(21, 'Rosalee Rogahn', 'heidenreich.reggie@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-10-17 08:31:59', '2026-06-01 17:39:49'),
(22, 'Mr. Cordell Greenfelder', 'leonora.lueilwitz@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-04-21 03:21:39', '2026-06-01 17:39:49'),
(23, 'Dr. Annamae Rodriguez IV', 'lulu.kemmer@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-12-17 10:32:08', '2026-06-01 17:39:49'),
(24, 'Prof. Reynold Ward', 'marquise31@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-11-21 07:07:30', '2026-06-01 17:39:49'),
(25, 'Ashlynn Kuhlman', 'umills@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-09-20 02:10:58', '2026-06-01 17:39:49'),
(26, 'Estrella Towne', 'gutmann.august@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-05-02 07:58:25', '2026-06-01 17:39:49'),
(27, 'Sebastian O\'Hara III', 'robb25@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-09-22 23:04:49', '2026-06-01 17:39:49'),
(28, 'Noemi Auer', 'jbashirian@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-07-17 18:38:35', '2026-06-01 17:39:49'),
(29, 'Damien Cole', 'magdalena.wilderman@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-04-23 04:03:06', '2026-06-01 17:39:49'),
(30, 'Rosalyn Greenholt', 'mueller.matilde@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-12-26 15:21:20', '2026-06-01 17:39:49'),
(31, 'Miss Hassie Rogahn', 'marcus55@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-04-27 09:25:18', '2026-06-01 17:39:49'),
(32, 'Prof. Else Gaylord', 'dooley.maia@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-12-27 19:14:32', '2026-06-01 17:39:49'),
(33, 'Dayton Feest', 'btrantow@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-08-18 04:52:02', '2026-06-01 17:39:49'),
(34, 'Emmitt Grimes', 'sophie.morar@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-02-27 09:52:00', '2026-06-01 17:39:49'),
(35, 'Prof. Darrell Heller', 'taurean80@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-12-18 16:50:43', '2026-06-01 17:39:49'),
(36, 'Shany Douglas', 'ogoldner@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-05-03 06:17:32', '2026-06-01 17:39:49'),
(37, 'Katarina Jast', 'ktorp@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-01-30 12:04:16', '2026-06-01 17:39:49'),
(38, 'Prof. Kathlyn Maggio', 'coconner@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-11-03 23:35:56', '2026-06-01 17:39:49'),
(39, 'Mrs. Edyth Hand Sr.', 'shakira.larson@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-06-07 23:27:53', '2026-06-01 17:39:49'),
(40, 'Karelle O\'Hara', 'lucinda92@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-09-15 22:29:37', '2026-06-01 17:39:49'),
(41, 'Mr. Jamaal Stanton II', 'kiana99@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-04-09 13:48:05', '2026-06-01 17:39:49'),
(42, 'Westley Friesen', 'mariah.leannon@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-05-08 09:12:14', '2026-06-01 17:39:49'),
(43, 'Fredrick Rath MD', 'blick.kolby@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-05-03 19:49:51', '2026-06-01 17:39:49'),
(44, 'Yoshiko Johnston', 'alana.powlowski@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-05-16 19:30:07', '2026-06-01 17:39:49'),
(45, 'Lynn Kuhn', 'greenholt.renee@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-08-06 01:55:03', '2026-06-01 17:39:49'),
(46, 'Dasia Goyette IV', 'jalyn94@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-08-09 17:19:25', '2026-06-01 17:39:49'),
(47, 'Mr. Tobin Labadie', 'bosco.kailey@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-02-02 12:51:36', '2026-06-01 17:39:49'),
(48, 'Dr. Amir Goyette', 'cornell.lang@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-09-11 18:54:05', '2026-06-01 17:39:49'),
(49, 'Magdalena Witting', 'adelia.mayer@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-12-12 19:10:15', '2026-06-01 17:39:49'),
(50, 'Dr. Berenice Tremblay', 'albina42@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-05-15 21:55:54', '2026-06-01 17:39:49'),
(51, 'Dr. Alfonzo Wiegand', 'baumbach.harvey@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-03-08 06:23:05', '2026-06-01 17:39:49'),
(52, 'Cassandra Wiegand', 'noe64@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-05-03 20:47:45', '2026-06-01 17:39:49'),
(53, 'Monica Upton', 'rkuphal@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-03-24 07:02:44', '2026-06-01 17:39:49'),
(54, 'Vivian Gleason', 'dan.schneider@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-05-04 20:17:59', '2026-06-01 17:39:49'),
(55, 'Ms. Adelle Stracke', 'meggie.rath@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-07-12 09:01:47', '2026-06-01 17:39:49'),
(56, 'Ms. Lea Runte DDS', 'norma26@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-01-19 23:45:54', '2026-06-01 17:39:49'),
(57, 'Breanna Krajcik', 'daniela14@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-06-08 20:44:21', '2026-06-01 17:39:49'),
(58, 'Owen Gulgowski Jr.', 'mylene40@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-08-06 01:48:35', '2026-06-01 17:39:49'),
(59, 'Ms. Danielle Goyette V', 'carley.padberg@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-06-10 00:15:02', '2026-06-01 17:39:49'),
(60, 'Ned Bosco', 'lois79@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-08-05 07:07:15', '2026-06-01 17:39:49'),
(61, 'Ms. Abby Cremin', 'cmills@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-04-25 22:00:09', '2026-06-01 17:39:49'),
(62, 'Vivian Daniel', 'zemlak.mya@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-05-13 13:53:15', '2026-06-01 17:39:49'),
(63, 'Mallie Considine', 'marcus50@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-07-17 09:48:04', '2026-06-01 17:39:49'),
(64, 'Mrs. Camila Hayes', 'amely89@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-11-30 07:41:12', '2026-06-01 17:39:49'),
(65, 'Damion Lehner', 'columbus27@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-06-08 20:19:51', '2026-06-01 17:39:49'),
(66, 'Hudson Hayes', 'hoyt.romaguera@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-02-13 20:02:14', '2026-06-01 17:39:49'),
(67, 'Prof. Addie Kessler II', 'hettinger.julio@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-08-07 09:48:43', '2026-06-01 17:39:49'),
(68, 'Eliza Lakin', 'mclaughlin.lucienne@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-03-06 08:41:55', '2026-06-01 17:39:49'),
(69, 'Prof. Lewis Langosh', 'dustin60@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-02-04 21:09:30', '2026-06-01 17:39:49'),
(70, 'Kassandra Brown', 'hermina.cronin@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-10-17 08:09:51', '2026-06-01 17:39:49'),
(71, 'Mrs. Alexandra Jacobson I', 'hodkiewicz.mike@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-07-29 14:38:01', '2026-06-01 17:39:49'),
(72, 'Miss Christiana Bogan Jr.', 'phuels@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-07-24 21:35:05', '2026-06-01 17:39:49'),
(73, 'Melyna Bartell', 'omer79@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-04-16 06:04:39', '2026-06-01 17:39:49'),
(74, 'Raegan Grant', 'antonio09@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-09-08 09:20:45', '2026-06-01 17:39:49'),
(75, 'Prof. Haven Barton', 'ericka92@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-09-26 08:07:01', '2026-06-01 17:39:49'),
(76, 'Nichole Dickinson DDS', 'nullrich@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-11-23 11:21:59', '2026-06-01 17:39:49'),
(77, 'Miss Odessa Orn DDS', 'mabelle87@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-11-06 02:24:28', '2026-06-01 17:39:49'),
(78, 'Jerald Lynch', 'srohan@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-01-17 17:38:31', '2026-06-01 17:39:49'),
(79, 'Prof. Bell Predovic', 'lauryn85@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-09-14 05:11:10', '2026-06-01 17:39:49'),
(80, 'Mrs. Kristina DuBuque DVM', 'rosenbaum.mohamed@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-10-19 06:17:31', '2026-06-01 17:39:49'),
(81, 'Jerad Becker', 'hartmann.clare@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-04-19 14:01:34', '2026-06-01 17:39:49'),
(82, 'Matilda Bechtelar', 'buckridge.carolyne@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-02-07 05:53:15', '2026-06-01 17:39:49'),
(83, 'Daryl Pfeffer', 'dino.ortiz@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-10-18 20:08:52', '2026-06-01 17:39:49'),
(84, 'Rhea Kling', 'huel.janick@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-02-28 22:36:05', '2026-06-01 17:39:49'),
(85, 'Mr. Thad Pollich I', 'vanessa25@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-02-22 19:13:14', '2026-06-01 17:39:49'),
(86, 'Paolo Mertz', 'kutch.augustine@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-10-28 06:02:28', '2026-06-01 17:39:49'),
(87, 'Mrs. Jailyn Reichel', 'srunolfsson@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-01-16 23:34:58', '2026-06-01 17:39:49'),
(88, 'Rashad Hill', 'cummings.aglae@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-09-03 21:15:27', '2026-06-01 17:39:49'),
(89, 'Ryan Schimmel', 'lea93@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-08-01 17:00:10', '2026-06-01 17:39:49'),
(90, 'Anastasia Lang', 'sydney96@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-10-03 02:06:51', '2026-06-01 17:39:49'),
(91, 'Stefan Medhurst', 'nikolaus.simone@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-12-31 15:34:11', '2026-06-01 17:39:49'),
(92, 'Dr. Aric Parisian', 'leffler.tiana@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-02-01 00:51:27', '2026-06-01 17:39:49'),
(93, 'Ms. Bridget Gerlach I', 'haley.dorothea@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-12-21 10:27:04', '2026-06-01 17:39:49'),
(94, 'Lyda Considine Jr.', 'hcorwin@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-10-22 14:48:18', '2026-06-01 17:39:49'),
(95, 'Doris Dicki', 'ignacio80@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-08-26 09:44:12', '2026-06-01 17:39:49'),
(96, 'Dr. Mariana Cummings', 'ullrich.floyd@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-05-30 11:23:47', '2026-06-01 17:39:49'),
(97, 'Nya Torp', 'tstracke@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-06-15 01:27:15', '2026-06-01 17:39:49'),
(98, 'Alexandria Senger', 'lacy12@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-12-06 19:49:52', '2026-06-01 17:39:49'),
(99, 'Prof. Reymundo Herman', 'annabel70@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-03-08 15:45:44', '2026-06-01 17:39:49'),
(100, 'Prof. Constance Runolfsdottir', 'stiedemann.brittany@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-05-02 09:00:03', '2026-06-01 17:39:49'),
(101, 'Alfred Moen Sr.', 'lquigley@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-03-28 04:55:14', '2026-06-01 17:39:49'),
(102, 'Miss Itzel Mann DDS', 'tanya.cormier@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-05-22 10:20:33', '2026-06-01 17:39:49'),
(103, 'Korbin Wehner', 'hegmann.junius@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-10-05 05:09:02', '2026-06-01 17:39:49'),
(104, 'Rasheed Waters', 'romaine25@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-08-22 00:27:30', '2026-06-01 17:39:49'),
(105, 'Aubree Koch', 'bosco.jacquelyn@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-03-29 15:23:24', '2026-06-01 17:39:49'),
(106, 'Elwin Tremblay', 'liliane.block@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-10-17 10:47:11', '2026-06-01 17:39:49'),
(107, 'Dr. Emmanuelle Ritchie Sr.', 'cremin.richard@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-07-08 04:24:56', '2026-06-01 17:39:49'),
(108, 'Addie Schmeler', 'cheyanne60@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-11-12 07:28:23', '2026-06-01 17:39:49'),
(109, 'Prof. Mya Zieme', 'jmueller@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-12-11 15:41:26', '2026-06-01 17:39:49'),
(110, 'Noel Heathcote', 'esteuber@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-12-15 16:25:07', '2026-06-01 17:39:49'),
(111, 'Kirk Mitchell', 'brigitte97@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-03-11 02:04:22', '2026-06-01 17:39:49'),
(112, 'Candice Jaskolski', 'otto.rodriguez@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-11-09 11:56:12', '2026-06-01 17:39:49'),
(113, 'Fannie Jakubowski', 'block.tyra@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-04-29 03:33:36', '2026-06-01 17:39:49'),
(114, 'Dr. Terence Kiehn II', 'jacobi.wilber@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-01-17 16:59:37', '2026-06-01 17:39:49'),
(115, 'Santina Hessel', 'dspencer@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-08-19 21:44:52', '2026-06-01 17:39:49'),
(116, 'Kelley Koss', 'jason15@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-04-22 01:18:46', '2026-06-01 17:39:49'),
(117, 'Prof. Loy Hilpert', 'hschuppe@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-02-14 08:23:48', '2026-06-01 17:39:49'),
(118, 'Mr. Santa Streich', 'vorn@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-09-25 12:41:43', '2026-06-01 17:39:49'),
(119, 'Fannie Eichmann', 'schinner.angus@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-10-02 09:47:07', '2026-06-01 17:39:49'),
(120, 'Kellie Johnson I', 'abdullah99@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-12-08 07:11:38', '2026-06-01 17:39:49'),
(121, 'Prof. Owen Bogan', 'mhayes@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-09-30 21:16:40', '2026-06-01 17:39:49'),
(122, 'Dr. Deron Kerluke', 'ccassin@example.com', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-12-24 14:30:36', '2026-06-01 17:39:49'),
(123, 'Eduardo Kovacek', 'jpadberg@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-05-19 00:33:06', '2026-06-01 17:39:49'),
(124, 'Flossie Graham', 'gwilderman@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-05-07 15:26:49', '2026-06-01 17:39:49'),
(125, 'Mr. Carey Kiehn Sr.', 'angie16@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-04-30 19:46:21', '2026-06-01 17:39:49'),
(126, 'Sigrid Weber', 'buddy08@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-06-11 12:21:15', '2026-06-01 17:39:49'),
(127, 'Mr. Brain Mayert II', 'bauch.shanon@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-07-31 15:40:32', '2026-06-01 17:39:49'),
(128, 'Prof. Javier Fritsch MD', 'shaun18@example.org', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-06-10 14:58:41', '2026-06-01 17:39:49'),
(129, 'Prof. Candida Lubowitz PhD', 'gennaro.padberg@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-04-14 11:23:56', '2026-06-01 17:39:49'),
(130, 'Elisabeth Spinka', 'tillman.zoe@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-02-17 06:17:05', '2026-06-01 17:39:49'),
(131, 'Dr. Vivian Klein', 'dwatsica@example.com', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-05-01 07:21:38', '2026-06-01 17:39:49'),
(132, 'Asia Jacobson', 'rau.kayley@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-01-06 08:10:55', '2026-06-01 17:39:49'),
(133, 'Nia Haag', 'rortiz@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2024-07-17 22:43:39', '2026-06-01 17:39:49'),
(134, 'Mr. Saul Gerhold IV', 'dandre33@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-09-17 14:56:03', '2026-06-01 17:39:49'),
(135, 'Amaya Skiles', 'abner44@example.org', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2026-01-24 01:10:42', '2026-06-01 17:39:49'),
(136, 'Nyah Abernathy', 'ashton.bernhard@example.net', '2026-06-01 17:39:49', 2, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-02-06 17:36:22', '2026-06-01 17:39:49'),
(137, 'Ms. Concepcion Wilkinson', 'vidal09@example.net', '2026-06-01 17:39:49', 3, '$2y$12$XjdZDAcNyEeu3iiPAikJge.V8uWbF8ylfwfqNeEpZ/yGo97bkiOqO', NULL, '2025-08-27 19:20:27', '2026-06-01 17:39:49'),
(138, 'Carlos Administrador', 'carlos@cardy.com', NULL, NULL, '$2y$12$pB4OTIXOoPPzaXEyFLTRLO6iZ756VhWiq6t.EkJ5NiSh5mSESbBau', NULL, '2026-06-01 17:41:34', '2026-06-01 17:41:34'),
(139, 'Administrador', 'admin@cardy.com', NULL, 1, '$2y$12$bv.wF1NzrWdNmA4x8asU6.la45vwNWPbls.ptpQR8x1UwfUic6/Bm', NULL, '2026-06-01 17:46:07', '2026-06-01 17:50:24'),
(140, 'Carlos Mario Acosta Rodriguez', 'carlosmarioacostarodriguez@gmail.com', NULL, 2, '$2y$12$n/QLYbtdxlGVrRbX5uZKveRGSqCqGgUe1WhbDFqdgwjuqMfP4R6o6', NULL, '2026-06-01 18:34:34', '2026-06-01 18:34:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empleados_documento_unique` (`documento`),
  ADD UNIQUE KEY `empleados_correo_unique` (`correo`);

--
-- Indices de la tabla `entradas_materia_prima`
--
ALTER TABLE `entradas_materia_prima`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entradas_materia_prima_materia_prima_id_foreign` (`materia_prima_id`),
  ADD KEY `entradas_materia_prima_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia_primas`
--
ALTER TABLE `materia_primas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia_primas_empleado_id_foreign` (`empleado_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_materia_prima_id_foreign` (`materia_prima_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proveedores_correo_unique` (`correo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `role_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indices de la tabla `salidas_materia_prima`
--
ALTER TABLE `salidas_materia_prima`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salidas_materia_prima_materia_prima_id_foreign` (`materia_prima_id`),
  ADD KEY `salidas_materia_prima_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `salidas_productos`
--
ALTER TABLE `salidas_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salidas_productos_producto_id_foreign` (`producto_id`),
  ADD KEY `salidas_productos_cliente_id_foreign` (`cliente_id`),
  ADD KEY `salidas_productos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `entradas_materia_prima`
--
ALTER TABLE `entradas_materia_prima`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_primas`
--
ALTER TABLE `materia_primas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salidas_materia_prima`
--
ALTER TABLE `salidas_materia_prima`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `salidas_productos`
--
ALTER TABLE `salidas_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas_materia_prima`
--
ALTER TABLE `entradas_materia_prima`
  ADD CONSTRAINT `entradas_materia_prima_materia_prima_id_foreign` FOREIGN KEY (`materia_prima_id`) REFERENCES `materia_primas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entradas_materia_prima_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `materia_primas`
--
ALTER TABLE `materia_primas`
  ADD CONSTRAINT `materia_primas_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_materia_prima_id_foreign` FOREIGN KEY (`materia_prima_id`) REFERENCES `materia_primas` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `salidas_materia_prima`
--
ALTER TABLE `salidas_materia_prima`
  ADD CONSTRAINT `salidas_materia_prima_materia_prima_id_foreign` FOREIGN KEY (`materia_prima_id`) REFERENCES `materia_primas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `salidas_materia_prima_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `salidas_productos`
--
ALTER TABLE `salidas_productos`
  ADD CONSTRAINT `salidas_productos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `salidas_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `salidas_productos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
