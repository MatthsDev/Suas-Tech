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
-- Table structure for table `fila_cozinha`
--

DROP TABLE IF EXISTS `fila_cozinha`;
CREATE TABLE IF NOT EXISTS `fila_cozinha` (
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fila_cozinha`
--

INSERT INTO `fila_cozinha` (`id`, `nis_benef`, `num_doc`, `nome`, `dt_nasc`, `nome_mae`, `cpf_benef`, `data_de_entrega`, `encaminhado_cras`, `qtd_pessoa`, `qtd_marmita`, `marm_entregue`, `limiter`, `entregue`, `prioridade`) VALUES
(1, '12302081171', '9/2023', 'JOSE LUIZ LOPES DA SILVA', '', '', '333.722.094-00', '', 'CREAS - GILDO SOARES', 1, 1, 0, '', 'não', 1),
(2, '16479724551', '10/2023', 'LUCILENE SANTOS DA SILVA', '', '', '073.274.224-20', '', 'CREAS - GILDO SOARES', 6, 6, 0, '', 'não', 3),
(3, '21230330900', '11/2023', 'EDILEUZA PETRONILA DA CONCEICAO', '', '', '963.116.574-49', '', 'CREAS - GILDO SOARES', 3, 3, 0, '', 'não', 3),
(4, '16361690246', '12/2023', 'MARIA JOSE EZEQUIEL', '', '', '716.546.664-91', '', 'CREAS - GILDO SOARES', 2, 2, 0, '', 'não', 3),
(5, '16186693415', '13/2023', 'IVONETE BERNARDO DA SILVA', '', '', '011.051.064-03', '', 'CREAS - GILDO SOARES', 1, 1, 0, '', 'não', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
