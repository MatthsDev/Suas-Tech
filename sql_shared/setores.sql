-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2023 at 08:15 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `setores`
--

DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cod_contrato` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `instituicao` varchar(50) NOT NULL,
  `nome_instit` varchar(70) NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` varchar(4) DEFAULT NULL,
  `bairro` varchar(30) NOT NULL,
  `email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cod_instit` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `responsavel` varchar(30) NOT NULL,
  `cpf_coord` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `setores`
--

INSERT INTO `setores` (`id`, `cod_contrato`, `instituicao`, `nome_instit`, `rua`, `numero`, `bairro`, `email`, `cod_instit`, `responsavel`, `cpf_coord`) VALUES
(1, '7020334', 'CADASTRO ÚNICO', 'SECRETARIS DE ASSISTÊNCIA SOCIAL', 'AV. OSWALDO CELSO MACIEL', '122', 'CENTRO', 'cadunico.sbu2021@gmail.co', '', 'DIEGO EMMANUEL CADETE', '092.349.874-54'),
(2, '7040012', 'CRAS', 'ANTONIO MATIAS', 'RUA CINCO', 'SN', 'IRAQUE', 'CRAS.SBU2021@GMAIL.COM', '', 'MARIA RAFAELLA COSTA', '078.158.234-24'),
(3, '1234', 'COZINHA COMUNITÁRIA', 'NEUZA MARIA DA SILVA', 'RUA VAVÁ MORAES', 'S/N', 'CENTRO', 'cuz@cus.com', '', 'AGENTE.TEC 1', '092.349.874-54'),
(4, '7020345678', 'CREAS', 'GILDO SOARES', 'RUA DA ALEGRIA', 'S/N', 'CENTRO', 'creas.sbu2010@gmail.com', '', 'AGENTE TECNICO', '000.000.000-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
