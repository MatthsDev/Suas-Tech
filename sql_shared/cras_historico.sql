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
-- Table structure for table `cras_historico`
--

DROP TABLE IF EXISTS `cras_historico`;
CREATE TABLE IF NOT EXISTS `cras_historico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_parecer_hist` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `quant_pessoa` int NOT NULL,
  `text_parecer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `remetent` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `destino` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cod_familia` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `itens_concedido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_registro` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cras_historico`
--

INSERT INTO `cras_historico` (`id`, `num_parecer_hist`, `nis`, `nome`, `cpf`, `quant_pessoa`, `text_parecer`, `remetent`, `destino`, `cod_familia`, `itens_concedido`, `data_registro`) VALUES
(1, '1/2023', '21230775449', 'DIEGO MOREIRA DE ANDRADE', '134.087.114-96', 1, 'tem muito pra acontecer', 'SUPORTE', 'COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA', '', 'alimento', '17 de dezembro de 20'),
(2, '2/2023', '21208025777', 'AMANDA DA SILVA OLIVEIRA', '070.843.344-83', 1, 'tem muito o que aprender', 'SUPORTE', 'COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA', '', 'teste', '17 de dezembro de 20'),
(3, '3/2023', '16249192329', 'JANIELSON FERREIRA GUIMARAES', '107.082.144-60', 1, 'uma duzia de inhame', 'SUPORTE', 'COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA', '', 'qwertyuiopp', '17 de dezembro de 20'),
(4, '4/2023', '16598616760', 'RENATTA BRITTO DE ALMEIDA', '111.487.914-26', 2, 'tres daqueles la fora', 'SUPORTE', 'COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA', '', 'ougvvbjngf', '17 de dezembro de 20'),
(5, '5/2023', '13401269452', 'EDJA RIBEIRO DA SILVA', '024.135.924-40', 5, 'quem tem medo trem', 'SUPORTE', 'COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA', '', 'fresd', '17 de dezembro de 20'),
(6, '6/2023', '12017667171', 'FRANCISCO DE ASSIS SILVA', '060.482.038-02', 2, 'ta dando certo confesso estar feliz com o resultado', 'SUPORTE', 'COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA', '', 'teste', '17 de dezembro de 20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
