-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2024 at 02:42 PM
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
-- Table structure for table `tabela_contrato`
--

DROP TABLE IF EXISTS `tabela_contrato`;
CREATE TABLE IF NOT EXISTS `tabela_contrato` (
  `id_contrato` int NOT NULL AUTO_INCREMENT,
  `data_assinatura` date DEFAULT NULL,
  `vigencia` date DEFAULT NULL,
  `num_contrato` varchar(50) DEFAULT NULL,
  `nome_empresa` varchar(100) DEFAULT NULL,
  `razao_social` varchar(100) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `num_contato` varchar(16) DEFAULT NULL,
  `data_registro` date NOT NULL,
  PRIMARY KEY (`id_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabela_contrato`
--

INSERT INTO `tabela_contrato` (`id_contrato`, `data_assinatura`, `vigencia`, `num_contrato`, `nome_empresa`, `razao_social`, `cnpj`, `num_contato`, `data_registro`) VALUES
(1, '2024-01-28', '2024-02-15', '12002', 'MARCASSA', 'marda', '01.001.001/0001-10', '(11) 9 2323-2424', '0000-00-00'),
(2, '2024-02-04', '2024-02-14', '205', 'MERGULHO', 'MERGULHOS S.A', '01.221.332/0001-35', '(11) 9 4004-5599', '0000-00-00'),
(3, '2024-01-30', '2024-02-23', '333', 'RESTA UM', 'RESTA MAIS NÃO', '23.444.555/1111-22', '(11) 9 8776-6554', '0000-00-00'),
(4, '2024-01-31', '2024-02-15', '4322', 'TREZE', 'TREZE DE MAIO LTD', '22.222.232/0002-12', '(81) 9 8988-9845', '0000-00-00'),
(5, '2024-01-29', '2024-02-17', '3234', 'FABRICA', 'FABRICO DACOTA S.A', '10.110.110/0011-33', '(11) 9 1221-0110', '0000-00-00'),
(6, '2024-02-02', '2024-02-29', '12003', 'CADASHI', 'CADASHIBA', '22.133.233/9991-00', '(21) 9 8888-7777', '0000-00-00'),
(7, '2024-01-28', '2024-02-19', '6744', 'GASTRO', 'REST GSTRO', '09.008.007/0002-33', '(11) 9 2345-9876', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
