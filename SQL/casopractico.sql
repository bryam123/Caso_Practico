-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2023 a las 01:17:28
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casopractico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apostador`
--

CREATE TABLE `apostador` (
  `id_apo` int(11) NOT NULL,
  `cod_apo` varchar(10) NOT NULL,
  `nom_apo` varchar(40) NOT NULL,
  `ape_pat_apo` varchar(40) NOT NULL,
  `ape_mat_apo` varchar(40) NOT NULL,
  `nac_apo` date NOT NULL,
  `eda_apo` int(11) NOT NULL,
  `dni_apo` varchar(25) NOT NULL,
  `gen_apo` varchar(15) NOT NULL,
  `dom_apo` varchar(100) NOT NULL,
  `cor_apo` varchar(50) NOT NULL,
  `tel_apo` varchar(15) NOT NULL,
  `ava_apo` varchar(100) NOT NULL,
  `bil_act_apo` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `us_tip_apo` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apostador`
--

INSERT INTO `apostador` (`id_apo`, `cod_apo`, `nom_apo`, `ape_pat_apo`, `ape_mat_apo`, `nac_apo`, `eda_apo`, `dni_apo`, `gen_apo`, `dom_apo`, `cor_apo`, `tel_apo`, `ava_apo`, `bil_act_apo`, `status`, `us_tip_apo`) VALUES
(1, '', 'bryam', 'Mollocondo', 'ramos', '1999-12-12', 24, '10441275', 'Femenino', 'la pradera m. 6', 'a_bmollocondor@unjbg.edu.pe', '951752842', '', 2665, 0, 0),
(2, '44r44', 'luizus', 'mario', 'razo', '2019-03-02', 16, '12315314', 'Masculino', 'las praderaa', 'asiio@unjbg', '930485126', '', 2000, 1, 2),
(3, '44r44', 'luizus', 'mario', 'razo', '2019-03-02', 16, '12315314', 'Masculino', 'las praderaa', 'asiio@unjbg', '930485126', '', 2048, 1, 2),
(4, '', 'BRYAM ALFREDO', 'MOLLOCONDO', 'RAMOS', '2000-12-12', 23, '00488776', 'Masculino', 'CORONELVIDAL210B', 'brianoctlibra@gmail.com', '930004853', '', 14500, 0, 0),
(5, '', 'Ramón', 'Diéguez', 'Jordá', '1998-03-08', 24, '42849685', 'Masculino', '', '', '980337164', '', 2334, 1, 2),
(6, '', 'Paulina', 'Escalona', 'Montero', '1982-01-26', 41, '99602324', 'Femenino', '', '', '992641490', '', 1976, 1, 2),
(7, '', 'Bernardita', 'Borrell', 'Villalobos', '1986-01-14', 37, '96138769', 'Femenino', '', '', '937338858', '', 4416, 1, 2),
(8, '', 'Lalo', 'Cerro', 'Peiró', '1996-02-01', 27, '50280926', 'Femenino', '', '', '905826907', '', 1335, 1, 2),
(9, '', 'Cruz', 'Palma', 'Mena', '1998-06-14', 24, '24168321', 'Femenino', '', '', '907871011', '', 2623, 1, 2),
(10, '', 'Ariel', 'Álamo', 'Cerezo', '1984-10-11', 38, '02912672', 'Femenino', '', '', '961516024', '', 1593, 1, 2),
(11, '', 'Griselda', 'de Redondo', '', '1992-05-14', 30, '55529903', 'Femenino', '', '', '933030853', '', 2632, 1, 2),
(12, '', 'Eutropio', 'Campos', '', '1986-03-12', 36, '27874280', 'Masculino', '', '', '922481606', '', 201, 1, 2),
(13, '', 'Priscila', 'Rico', 'Elorza', '1983-03-13', 39, '05422128', 'Femenino', '', '', '969305380', '', 2213, 1, 2),
(14, '', 'Irma', 'Vázquez', '', '1989-06-08', 33, '58823461', 'Femenino', '', '', '998042487', '', 1771, 1, 2),
(15, '', 'Carla', 'Esparza', 'Llamas', '1996-11-08', 26, '52806182', 'Femenino', '', '', '995136958', '', 1473, 1, 2),
(16, '', 'Anabel', 'Girona', 'Pina', '1984-06-20', 38, '36799298', 'Femenino', '', '', '997905808', '', 2476, 1, 2),
(17, '', 'Wilfredo', 'de', 'Cabeza', '1982-06-20', 40, '43693513', 'Masculino', '', '', '941643310', '', 3353, 1, 2),
(18, '', 'Mauricio Yago', 'Vallejo', 'Castells', '1996-06-15', 26, '84120691', 'Masculino', '', '', '900672652', '', 4098, 1, 2),
(19, '', 'Manu', 'Lumbreras', 'Velasco', '1989-10-02', 33, '59464411', 'Masculino', '', '', '947274562', '', 3406, 1, 2),
(20, '', 'Ximena', 'Fonseca', 'Mercader', '1986-03-20', 36, '28480360', 'Masculino', '', '', '972265111', '', 2618, 1, 2),
(21, '', 'Jimena', 'Bermúdez', 'Roman', '1982-10-24', 40, '87758566', 'Femenino', '', '', '972997181', '', 2133, 1, 2),
(22, '', 'Albano', 'Valls', 'Solera', '1991-05-28', 31, '89724615', 'Masculino', '', '', '991211320', '', 623, 1, 2),
(23, '', 'Ámbar', 'Mateu', 'Carpio', '1980-01-24', 43, '19146297', 'Masculino', '', '', '952866860', '', 3700, 1, 2),
(24, '', 'Fortunata', 'Castejón', 'Lorenzo', '1988-01-10', 35, '97154079', 'Femenino', '', '', '982612987', '', 2575, 1, 2),
(25, '', 'Arsenio', 'Borja', 'Sevilla', '1987-06-20', 35, '57668506', 'Masculino', '', '', '905434089', '', 2514, 1, 2),
(26, '', 'Inmaculada Leandra', 'Mena', 'Vicens', '1997-03-03', 25, '45566047', 'Femenino', '', '', '995941269', '', 2426, 1, 2),
(27, '', 'Marcelino', 'Moliner', 'España', '1991-01-18', 32, '37546786', 'Masculino', '', '', '911632160', '', 2865, 1, 2),
(28, '', 'Javier', 'Benavent', 'Verdugo', '1986-02-05', 37, '43507577', 'Masculino', '', '', '960529005', '', 1666, 1, 2),
(29, '', 'Vicenta', 'Guillen', 'Serna', '1997-03-11', 25, '24597869', 'Femenino', '', '', '938934510', '', 710, 1, 2),
(30, '', 'Angelita', 'Sacristán', '', '1986-03-01', 37, '02620537', 'Femenino', '', '', '989734921', '', 3008, 1, 2),
(31, '', 'Consuelo', 'Mayol', 'Vendrell', '1985-08-26', 37, '13439721', 'Masculino', '', '', '962289831', '', 1717, 1, 2),
(32, '', 'Rosario', 'Berrocal', 'Oliva', '1996-04-20', 26, '62352403', 'Femenino', '', '', '967658422', '', 1690, 1, 2),
(33, '', 'Rafaela', 'Alvarado', 'Cózar', '2000-09-02', 22, '45713424', 'Femenino', '', '', '942843923', '', 4479, 1, 2),
(34, '', 'Sebastian', 'Villar', 'Pozuelo', '1983-01-25', 40, '70951241', 'Femenino', '', '', '907167690', '', 2526, 1, 2),
(35, '', 'Severo', 'de Neira', '', '1987-05-08', 35, '59232087', 'Masculino', '', '', '933444969', '', 1975, 1, 2),
(36, '', 'Celia', 'Alcaraz', 'Moraleda', '1995-03-05', 27, '17999886', 'Femenino', '', '', '935757904', '', 3260, 1, 2),
(37, '', 'Aristides', 'Canals', '', '1982-03-27', 40, '13651186', 'Femenino', '', '', '988829517', '', 3628, 1, 2),
(38, '', 'Emelina', 'Céspedes', '', '1994-11-18', 28, '94320886', 'Femenino', '', '', '945801385', '', 4681, 1, 2),
(39, '', 'Ruy Teobaldo', 'Linares', 'Rincón', '1991-03-17', 31, '23559425', 'Masculino', '', '', '936760536', '', 1073, 1, 2),
(40, '', 'Evaristo', 'Maza', '', '2000-03-20', 22, '37759331', 'Masculino', '', '', '904861536', '', 146, 1, 2),
(41, '', 'Juan', 'Zabala', 'Cámara', '1994-02-10', 29, '63765978', 'Masculino', '', '', '916056478', '', 1901, 1, 2),
(42, '', 'Iris', 'Sierra', 'Rosado', '2000-04-06', 22, '62802776', 'Masculino', '', '', '923866443', '', 2148, 1, 2),
(43, '', 'Inocencio', 'Galindo', 'Haro', '1980-06-15', 42, '02725992', 'Masculino', '', '', '943705727', '', 4367, 1, 2),
(44, '', 'Carlota', 'Arévalo', 'Lamas', '1990-02-21', 33, '67267770', 'Masculino', '', '', '945347696', '', 2919, 1, 2),
(45, '', 'Ulises', 'Espinosa', 'Ramis', '1998-08-26', 24, '44290403', 'Masculino', '', '', '970544532', '', 3732, 1, 2),
(46, '', 'Guiomar', 'de Nuñez', '', '1992-02-06', 31, '72092377', 'Masculino', '', '', '979926317', '', 2762, 1, 2),
(47, '', 'Íñigo', 'Bermejo', 'Falcón', '1981-08-05', 41, '16381663', 'Masculino', '', '', '942347036', '', 2271, 1, 2),
(48, '', 'María Carmen', 'Estrada', 'Castro', '1988-01-14', 35, '92819627', 'Femenino', '', '', '951411635', '', 2517, 1, 2),
(49, '', 'Cruz Bustos', 'Fabregat', '', '1986-03-15', 36, '58314309', 'Masculino', '', '', '953913558', '', 1600, 1, 2),
(50, '', 'Gastón Aarón', 'Echevarría', 'Laguna', '1991-06-17', 31, '70884404', 'Masculino', '', '', '963040905', '', 1266, 1, 2),
(51, '', 'Micaela', 'Priego', 'Alberola', '1982-09-05', 40, '75518349', 'Femenino', '', '', '967199131', '', 1792, 1, 2),
(52, '', 'Carmina', 'Mora', 'Mendez', '1998-09-05', 24, '11511723', 'Femenino', '', '', '999749229', '', 125, 1, 2),
(53, '', 'Feliciano', 'Pedraza', 'Iborra', '2000-06-22', 22, '23754459', 'Masculino', '', '', '945302119', '', 139, 1, 2),
(54, '', 'Ale', 'Ordóñez', 'Cortés', '1986-02-05', 37, '83044263', 'Femenino', '', '', '922988440', '', 1006, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotores`
--

CREATE TABLE `promotores` (
  `id_pro` int(11) NOT NULL,
  `dni_log` varchar(25) NOT NULL,
  `nom_log` varchar(50) NOT NULL,
  `ape_log` varchar(50) NOT NULL,
  `con_log` varchar(255) NOT NULL,
  `fech_log` date NOT NULL,
  `tel_log` varchar(50) NOT NULL,
  `dir_log` varchar(50) NOT NULL,
  `cor_log` varchar(50) NOT NULL,
  `sex_log` varchar(25) NOT NULL,
  `ad_log` varchar(300) NOT NULL,
  `ava_log` varchar(255) NOT NULL,
  `us_tip_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promotores`
--

INSERT INTO `promotores` (`id_pro`, `dni_log`, `nom_log`, `ape_log`, `con_log`, `fech_log`, `tel_log`, `dir_log`, `cor_log`, `sex_log`, `ad_log`, `ava_log`, `us_tip_log`) VALUES
(1, '70174172', 'Bryam', 'mollocondo', '$2y$10$y6qnZsPtteqbccNw6VcRWOXU2gPESI/QeE.ZW6HrTcPwqKPeNp87u', '2000-02-10', '930004853', 'alto mirave', 'tacna@peru', 'masculino', '', '618d69a3b2639-avatar-male2.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_recibos`
--

CREATE TABLE `registros_recibos` (
  `id_reg_rec` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `id_apo` int(11) NOT NULL,
  `fec_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `can_cum_reg` varchar(15) NOT NULL,
  `ban_reg` varchar(20) NOT NULL,
  `monto_reg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros_recibos`
--

INSERT INTO `registros_recibos` (`id_reg_rec`, `id_pro`, `id_apo`, `fec_reg`, `can_cum_reg`, `ban_reg`, `monto_reg`) VALUES
(1, 1, 1, '2023-02-28 15:22:14', 'WhatsApp', 'NACION', 500),
(3, 1, 2, '2023-03-01 12:04:06', 'WhatsApp', 'mibanco', 1500),
(4, 1, 4, '2023-03-01 14:20:03', 'WhatsApp', 'mibanco', 2000),
(5, 1, 4, '2023-03-01 14:20:27', 'WhatsApp', 'mibanco', 2000),
(6, 1, 4, '2023-03-01 14:21:52', 'TeleGram', 'mibanco', 2000),
(7, 1, 4, '2023-03-01 14:21:57', 'TeleGram', 'mibanco', 2000),
(8, 1, 4, '2023-03-01 14:23:19', 'TeleGram', 'mibanco', 1500),
(9, 1, 4, '2023-03-01 14:23:32', 'TeleGram', 'mibanco', 1500),
(10, 1, 4, '2023-03-01 14:24:03', 'TeleGram', 'mibanco', 1500),
(12, 1, 19, '2022-09-18 11:24:15', 'TeleGram', 'Mibanco', 684),
(13, 1, 27, '2022-10-24 19:24:13', 'WhatsApp', 'Mibanco', 548),
(14, 1, 15, '2020-03-08 17:55:06', 'WhatsApp', 'Mibanco', 516),
(15, 1, 33, '2022-03-08 18:08:07', 'WhatsApp', 'Mibanco', 754),
(16, 1, 20, '2022-06-09 01:17:05', 'WhatsApp', 'Mibanco', 862),
(17, 1, 49, '2020-12-03 07:07:44', 'WhatsApp', 'Mibanco', 857),
(18, 1, 23, '2021-01-21 11:25:57', 'WhatsApp', 'Mibanco', 506),
(19, 1, 34, '2023-07-23 11:25:13', 'TeleGram', 'Mibanco', 991),
(20, 1, 17, '0000-00-00 00:00:00', 'WhatsApp', 'Mibanco', 871),
(22, 1, 47, '2020-09-17 02:36:40', 'WhatsApp', 'Mibanco', 663),
(23, 1, 23, '2022-03-17 10:45:47', 'TeleGram', 'Mibanco', 853),
(24, 1, 36, '2021-01-20 01:21:37', 'TeleGram', 'Mibanco', 863),
(25, 1, 34, '0000-00-00 00:00:00', 'WhatsApp', 'Mibanco', 788),
(26, 1, 43, '2023-08-28 15:11:37', 'WhatsApp', 'Mibanco', 551),
(27, 1, 48, '2023-00-02 01:06:44', 'WhatsApp', 'Mibanco', 962),
(28, 1, 45, '2022-10-20 09:41:49', 'WhatsApp', 'Mibanco', 864),
(29, 1, 46, '2023-10-13 17:39:57', 'TeleGram', 'Mibanco', 895),
(30, 1, 42, '2023-02-27 08:09:55', 'WhatsApp', 'Mibanco', 740),
(31, 1, 24, '2023-11-25 02:42:12', 'TeleGram', 'Mibanco', 730),
(32, 1, 8, '2020-08-21 08:58:42', 'TeleGram', 'Mibanco', 558),
(33, 1, 47, '2023-09-00 19:51:03', 'WhatsApp', 'Mibanco', 545),
(34, 1, 41, '2023-09-16 10:32:49', 'WhatsApp', 'Mibanco', 783),
(35, 1, 16, '2020-00-12 10:21:00', 'WhatsApp', 'Mibanco', 683),
(36, 1, 1, '2022-11-28 01:44:12', 'TeleGram', 'Mibanco', 657),
(37, 1, 10, '2021-12-08 03:42:38', 'WhatsApp', 'Mibanco', 653),
(38, 1, 38, '2021-10-09 21:41:24', 'WhatsApp', 'Mibanco', 903),
(39, 1, 17, '2021-07-06 15:05:42', 'WhatsApp', 'Mibanco', 679),
(40, 1, 45, '2023-03-25 03:26:57', 'TeleGram', 'Mibanco', 944),
(41, 1, 38, '2023-09-26 23:44:56', 'WhatsApp', 'Mibanco', 912),
(42, 1, 7, '2020-09-03 16:26:51', 'TeleGram', 'Mibanco', 510),
(43, 1, 42, '2023-03-21 09:32:03', 'TeleGram', 'Mibanco', 510),
(44, 1, 33, '2022-01-22 09:14:39', 'WhatsApp', 'Mibanco', 689),
(45, 1, 1, '2022-02-15 21:04:12', 'TeleGram', 'Mibanco', 760),
(46, 1, 44, '2020-03-11 20:04:15', 'WhatsApp', 'Mibanco', 603),
(47, 1, 13, '0000-00-00 00:00:00', 'WhatsApp', 'Mibanco', 956),
(48, 1, 30, '2022-00-25 03:33:36', 'WhatsApp', 'Mibanco', 989),
(49, 1, 6, '2022-05-13 18:01:53', 'WhatsApp', 'Mibanco', 673),
(50, 1, 18, '2021-02-13 02:38:36', 'TeleGram', 'Mibanco', 590),
(51, 1, 43, '2020-00-08 12:44:56', 'WhatsApp', 'Mibanco', 633),
(52, 1, 48, '2023-10-04 08:09:39', 'WhatsApp', 'Mibanco', 799),
(53, 1, 5, '2022-12-25 08:46:12', 'WhatsApp', 'Mibanco', 810),
(54, 1, 11, '2020-00-07 07:00:23', 'TeleGram', 'Mibanco', 633),
(55, 1, 3, '2021-08-27 08:56:58', 'WhatsApp', 'Mibanco', 994),
(56, 1, 36, '2023-07-15 13:17:51', 'TeleGram', 'Mibanco', 509),
(57, 1, 45, '2022-07-27 13:50:28', 'TeleGram', 'Mibanco', 566),
(58, 1, 33, '2021-03-07 04:42:11', 'TeleGram', 'Mibanco', 761),
(59, 1, 21, '2021-00-15 08:56:55', 'TeleGram', 'Mibanco', 929),
(60, 1, 35, '2020-01-08 10:06:35', 'TeleGram', 'Mibanco', 730),
(61, 1, 33, '2021-12-27 10:45:33', 'WhatsApp', 'Mibanco', 550),
(62, 1, 7, '2023-09-09 21:54:49', 'WhatsApp', 'Mibanco', 742),
(63, 1, 7, '2021-12-20 14:06:56', 'WhatsApp', 'Mibanco', 927),
(64, 1, 38, '2021-07-05 23:20:59', 'WhatsApp', 'Mibanco', 713),
(65, 1, 14, '2021-12-10 09:07:41', 'WhatsApp', 'Mibanco', 923),
(66, 1, 43, '2021-09-03 09:46:37', 'TeleGram', 'Mibanco', 981),
(67, 1, 44, '2020-06-25 03:25:36', 'WhatsApp', 'Mibanco', 719),
(68, 1, 18, '2023-00-18 11:58:12', 'TeleGram', 'Mibanco', 829),
(69, 1, 15, '2023-02-03 03:45:22', 'TeleGram', 'Mibanco', 926),
(71, 1, 39, '2023-09-01 10:30:23', 'WhatsApp', 'Mibanco', 728),
(72, 1, 19, '2023-10-00 10:58:03', 'TeleGram', 'Mibanco', 882),
(73, 1, 30, '2023-09-17 07:51:12', 'TeleGram', 'Mibanco', 747),
(74, 1, 37, '2021-07-23 20:01:11', 'TeleGram', 'Mibanco', 917),
(75, 1, 21, '2023-05-10 13:02:17', 'WhatsApp', 'Mibanco', 548),
(76, 1, 1, '2020-03-12 04:35:42', 'WhatsApp', 'Mibanco', 748),
(77, 1, 29, '2023-06-00 01:43:19', 'TeleGram', 'Mibanco', 660),
(78, 1, 9, '2023-02-07 11:30:53', 'WhatsApp', 'Mibanco', 678),
(79, 1, 33, '2021-07-06 05:04:04', 'TeleGram', 'Mibanco', 953),
(80, 1, 19, '2022-11-09 13:54:47', 'TeleGram', 'Mibanco', 814),
(81, 1, 45, '2023-09-28 03:51:58', 'WhatsApp', 'Mibanco', 606),
(82, 1, 11, '0000-00-00 00:00:00', 'TeleGram', 'Mibanco', 834),
(83, 1, 18, '2020-01-22 07:08:24', 'WhatsApp', 'Mibanco', 776),
(84, 1, 3, '2021-06-11 06:33:50', 'TeleGram', 'Mibanco', 554),
(85, 1, 43, '2021-09-19 07:20:56', 'WhatsApp', 'Mibanco', 578),
(86, 1, 30, '2023-06-05 01:47:39', 'TeleGram', 'Mibanco', 802),
(87, 1, 38, '2022-09-22 15:07:43', 'WhatsApp', 'Mibanco', 653),
(88, 1, 7, '2022-02-04 21:42:43', 'TeleGram', 'Mibanco', 742),
(89, 1, 20, '2021-06-08 13:22:39', 'WhatsApp', 'Mibanco', 822),
(90, 1, 35, '0000-00-00 00:00:00', 'WhatsApp', 'Mibanco', 780),
(91, 1, 26, '0000-00-00 00:00:00', 'WhatsApp', 'Mibanco', 881),
(92, 1, 28, '2022-07-15 15:31:06', 'WhatsApp', 'Mibanco', 796),
(93, 1, 37, '2020-03-01 18:11:21', 'TeleGram', 'Mibanco', 944),
(94, 1, 27, '2022-07-06 10:56:32', 'TeleGram', 'Mibanco', 587),
(95, 1, 25, '0000-00-00 00:00:00', 'WhatsApp', 'Mibanco', 701),
(96, 1, 32, '2020-08-13 01:52:11', 'WhatsApp', 'Mibanco', 585),
(97, 1, 25, '2020-03-22 07:35:56', 'TeleGram', 'Mibanco', 578),
(98, 1, 36, '2020-02-12 07:29:29', 'TeleGram', 'Mibanco', 565),
(99, 1, 43, '2020-06-02 20:10:16', 'WhatsApp', 'Mibanco', 997),
(100, 1, 23, '2023-01-13 01:06:30', 'WhatsApp', 'Mibanco', 680),
(101, 1, 38, '2021-12-08 14:18:59', 'WhatsApp', 'Mibanco', 774),
(102, 1, 4, '2023-03-01 18:37:06', 'WhatsApp', 'Mibanco', 2000);

--
-- Disparadores `registros_recibos`
--
DELIMITER $$
CREATE TRIGGER `billetera_apostador` BEFORE INSERT ON `registros_recibos` FOR EACH ROW UPDATE apostador SET bil_act_apo = (bil_act_apo + NEW.monto_reg) WHERE id_apo = NEW.id_apo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `billetera_apostador_DEL` AFTER DELETE ON `registros_recibos` FOR EACH ROW UPDATE apostador SET bil_act_apo = bil_act_apo - old.monto_reg WHERE id_apo = OLD.id_apo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `billetera_apostador_UP` BEFORE UPDATE ON `registros_recibos` FOR EACH ROW UPDATE apostador SET bil_act_apo = (bil_act_apo + NEW.monto_reg-OLD.monto_reg) WHERE id_apo = NEW.id_apo
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apostador`
--
ALTER TABLE `apostador`
  ADD PRIMARY KEY (`id_apo`);

--
-- Indices de la tabla `promotores`
--
ALTER TABLE `promotores`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indices de la tabla `registros_recibos`
--
ALTER TABLE `registros_recibos`
  ADD PRIMARY KEY (`id_reg_rec`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `id_apo` (`id_apo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apostador`
--
ALTER TABLE `apostador`
  MODIFY `id_apo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `promotores`
--
ALTER TABLE `promotores`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `registros_recibos`
--
ALTER TABLE `registros_recibos`
  MODIFY `id_reg_rec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros_recibos`
--
ALTER TABLE `registros_recibos`
  ADD CONSTRAINT `registros_recibos_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `promotores` (`id_pro`),
  ADD CONSTRAINT `registros_recibos_ibfk_2` FOREIGN KEY (`id_apo`) REFERENCES `apostador` (`id_apo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
