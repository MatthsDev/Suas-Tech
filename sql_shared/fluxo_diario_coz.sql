-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2023 at 01:56 AM
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
-- Table structure for table `fluxo_diario_coz`
--

DROP TABLE IF EXISTS `fluxo_diario_coz`;
CREATE TABLE IF NOT EXISTS `fluxo_diario_coz` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nis_benef` varchar(11) NOT NULL,
  `num_doc` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dt_nasc` date NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `cpf_benef` varchar(14) NOT NULL,
  `data_de_entrega` date NOT NULL,
  `encaminhado_cras` varchar(70) NOT NULL,
  `qtd_pessoa` int NOT NULL,
  `qtd_marmita` int NOT NULL,
  `marm_entregue` int NOT NULL,
  `gpte` varchar(40) NOT NULL,
  `limiter` varchar(1) NOT NULL,
  `entregue` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fluxo_diario_coz`
--

INSERT INTO `fluxo_diario_coz` (`id`, `nis_benef`, `num_doc`, `nome`, `dt_nasc`, `nome_mae`, `cpf_benef`, `data_de_entrega`, `encaminhado_cras`, `qtd_pessoa`, `qtd_marmita`, `marm_entregue`, `gpte`, `limiter`, `entregue`) VALUES
(1, '21230775449', '1/2023', 'DIEGO MOREIRA DE ANDRADE', '0000-00-00', '', '134.087.114-96', '0000-00-00', 'SUPORTE', 1, 1, 1, '', '', 'ok'),
(2, '21208025777', '2/2023', 'AMANDA DA SILVA OLIVEIRA', '0000-00-00', '', '070.843.344-83', '0000-00-00', 'SUPORTE', 1, 1, 1, '', '', 'ok'),
(3, '16249192329', '3/2023', 'JANIELSON FERREIRA GUIMARAES', '0000-00-00', '', '107.082.144-60', '0000-00-00', 'SUPORTE', 1, 2, 0, '', '', 'ok'),
(4, '16598616760', '4/2023', 'RENATTA BRITTO DE ALMEIDA', '0000-00-00', '', '111.487.914-26', '0000-00-00', 'SUPORTE', 2, 2, 2, '', '', 'ok'),
(5, '13401269452', '5/2023', 'EDJA RIBEIRO DA SILVA', '0000-00-00', '', '024.135.924-40', '0000-00-00', 'SUPORTE', 5, 5, 4, '', '', 'ok'),
(6, '12017667171', '6/2023', 'FRANCISCO DE ASSIS SILVA', '0000-00-00', '', '060.482.038-02', '0000-00-00', 'SUPORTE', 2, 2, 0, '', '', 'ok');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
