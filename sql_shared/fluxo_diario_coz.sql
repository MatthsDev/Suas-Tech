-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2023 at 05:41 PM
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
  `dt_nasc` varchar(10) NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `cpf_benef` varchar(14) NOT NULL,
  `data_de_entrega` varchar(10) NOT NULL,
  `encaminhado_cras` varchar(70) NOT NULL,
  `qtd_pessoa` int NOT NULL,
  `qtd_marmita` int NOT NULL,
  `marm_entregue` int NOT NULL,
  `limiter` varchar(1) NOT NULL,
  `entregue` varchar(4) NOT NULL,
  `prioridade` int NOT NULL,
  `data_limite` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fluxo_diario_coz`
--

INSERT INTO `fluxo_diario_coz` (`id`, `nis_benef`, `num_doc`, `nome`, `dt_nasc`, `nome_mae`, `cpf_benef`, `data_de_entrega`, `encaminhado_cras`, `qtd_pessoa`, `qtd_marmita`, `marm_entregue`, `limiter`, `entregue`, `prioridade`, `data_limite`) VALUES
(1, '20911237172', '3/2023', 'CLEONICE JUSTINO DA SILVA', '', '', '067.026.184-09', '', 'SUPORTE', 2, 2, 0, '', 'não', 3, ''),
(2, '23635903155', '4/2023', 'MARCIA CORREIA SOUZA', '', '', '705.559.694-79', '', 'SUPORTE', 3, 3, 0, '', 'não', 3, ''),
(3, '16249289543', '5/2023', 'JULIANA MARIA DA SILVA', '', '', '117.138.034-88', '', 'SUPORTE', 7, 7, 0, '', 'não', 3, ''),
(4, '23864006763', '6/2023', 'JANAINA HERMES DE MELO', '', '', '895.068.714-34', '', 'SUPORTE', 4, 4, 0, '', 'não', 3, ''),
(5, '16644914919', '7/2023', 'NADJA DA SILVA', '', '', '720.293.184-26', '', 'SUPORTE', 3, 3, 0, '', 'não', 3, ''),
(6, '16249241419', '8/2023', 'JOSELI VIEIRA DE AZEVEDO', '', '', '039.738.884-50', '', 'SUPORTE', 7, 7, 0, '', 'não', 3, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
