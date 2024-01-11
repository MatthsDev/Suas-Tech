-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2024 at 02:13 AM
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
  `nome_operador` varchar(70) NOT NULL,
  `data_registro` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fluxo_diario_coz`
--

INSERT INTO `fluxo_diario_coz` (`id`, `nis_benef`, `num_doc`, `nome`, `dt_nasc`, `nome_mae`, `cpf_benef`, `data_de_entrega`, `encaminhado_cras`, `qtd_pessoa`, `qtd_marmita`, `marm_entregue`, `limiter`, `entregue`, `prioridade`, `data_limite`, `nome_operador`, `data_registro`) VALUES
(24, '23753939826', '27/2024', 'MARIA KAROLINA DE LIMA MARTINS', '', '', '107.467.854-02', '', 'CRAS - ANTONIO MATIAS', 3, 42, 0, '', 'não', 3, '2024-01-11', 'USUARIO TESTE ADM', '10/01/2024'),
(28, '22821769554', '30/2024', 'QUITERIA MARIA DE LIMA', '', '', '112.612.224-66', '', 'SUPORTE', 6, 6, 0, '', 'não', 3, '2024-01-12', 'AGENTE TECNICO', '10/01/2024'),
(31, '16573680120', '33/2024', 'RUZAREIA MELO DOS SANTOS', '', '', '113.718.684-41', '2024-01-10', 'CRAS - ANTONIO MATIAS', 2, 26, 2, '', 'ok', 3, '2024-04-09', 'USUARIO TESTE ADM', '10/01/2024'),
(17, '16215703223', '25/2024', 'JAQUELINE BEZERRA FERREIRA', '', '', '117.932.834-51', '', 'CRAS - ANTONIO MATIAS', 4, 28, 0, '', 'não', 1, '2024-01-11', 'USUARIO TESTE ADM', '10/01/2024'),
(25, '13103458451', '28/2024', 'EDSON LUIS DA SILVA', '', '', '054.868.794-31', '', 'CRAS - ANTONIO MATIAS', 1, 12, 0, '', 'não', 3, '2024-01-11', 'USUARIO TESTE ADM', '10/01/2024'),
(26, '16186693415', '29/2024', 'IVONETE BERNARDO DA SILVA', '', '', '011.051.064-03', '2024-01-10', 'CRAS - ANTONIO MATIAS', 1, 70, 70, '', 'ok', 3, '2024-04-09', 'USUARIO TESTE ADM', '10/01/2024'),
(29, '16593789942', '31/2024', 'SAMILLE DE OLIVEIRA GUIMARAES', '', '', '130.298.314-85', '', 'SUPORTE', 5, 5, 0, '', 'não', 2, '2024-01-10', 'AGENTE TECNICO', '10/01/2024'),
(32, '10000687712', '34/2024', 'ADILMO JOSE CORDEIRO CAVALCANTE', '', '', '212.325.714-15', '', 'CRAS - ANTONIO MATIAS', 5, 5, 0, '', 'não', 3, '2024-04-09', 'USUARIO TESTE ADM', '10/01/2024'),
(33, '16450295784', '36/2024', 'MARIA MADALENA SALVADOR DOS SANTOS', '', '', '119.300.434-90', '', 'SUPORTE', 6, 6, 0, '', 'não', 1, '2024-01-11', 'AGENTE TECNICO', '10/01/2024');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
