-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2023 at 05:40 PM
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
-- Table structure for table `cras_historico`
--

DROP TABLE IF EXISTS `cras_historico`;
CREATE TABLE IF NOT EXISTS `cras_historico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_parecer_hist` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `quant_pessoa` int NOT NULL,
  `text_parecer` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `remetent` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `destino` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cod_familia` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `itens_concedido` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `data_registro` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cras_historico`
--

INSERT INTO `cras_historico` (`id`, `num_parecer_hist`, `nis`, `nome`, `cpf`, `quant_pessoa`, `text_parecer`, `remetent`, `destino`, `cod_familia`, `itens_concedido`, `data_registro`) VALUES
(1, '1/2023', '22821769554', 'QUITERIA MARIA DE LIMA', '112.612.224-66', 6, 'teste1', 'SUPORTE', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '21 de dezembro de 2023'),
(2, '2/2023', '23753939826', 'MARIA KAROLINA DE LIMA MARTINS', '107.467.854-02', 3, 'test2', 'SUPORTE', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '21 de dezembro de 2023'),
(3, '3/2023', '20911237172', 'CLEONICE JUSTINO DA SILVA', '067.026.184-09', 2, 'teste1', 'SUPORTE', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(4, '4/2023', '23635903155', 'MARCIA CORREIA SOUZA', '705.559.694-79', 3, 'teste2', 'SUPORTE', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(5, '5/2023', '16249289543', 'JULIANA MARIA DA SILVA', '117.138.034-88', 7, 'TESTE3', 'SUPORTE', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(6, '6/2023', '23864006763', 'JANAINA HERMES DE MELO', '895.068.714-34', 4, 'teste6', 'SUPORTE', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(7, '7/2023', '16644914919', 'NADJA DA SILVA', '720.293.184-26', 3, 'teste7', 'SUPORTE', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(8, '8/2023', '16249241419', 'JOSELI VIEIRA DE AZEVEDO', '039.738.884-50', 7, 'teste9', 'SUPORTE', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(9, '9/2023', '12302081171', 'JOSE LUIZ LOPES DA SILVA', '333.722.094-00', 1, 'teste10', 'CREAS - GILDO SOARES', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(10, '10/2023', '16479724551', 'LUCILENE SANTOS DA SILVA', '073.274.224-20', 6, 'teste11', 'CREAS - GILDO SOARES', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(11, '11/2023', '21230330900', 'EDILEUZA PETRONILA DA CONCEICAO', '963.116.574-49', 3, 'teste12', 'CREAS - GILDO SOARES', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(12, '12/2023', '16361690246', 'MARIA JOSE EZEQUIEL', '716.546.664-91', 2, 'teste13', 'CREAS - GILDO SOARES', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023'),
(13, '13/2023', '16186693415', 'IVONETE BERNARDO DA SILVA', '011.051.064-03', 1, 'teste1', 'CREAS - GILDO SOARES', 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA', '', '', '22 de dezembro de 2023');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
