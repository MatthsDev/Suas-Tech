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
-- Table structure for table `tabela_itens`
--

DROP TABLE IF EXISTS `tabela_itens`;
CREATE TABLE IF NOT EXISTS `tabela_itens` (
  `id_item` int NOT NULL AUTO_INCREMENT,
  `id_contrato` int DEFAULT NULL,
  `num_item` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nome_produto` varchar(100) DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_contrato` (`id_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabela_itens`
--

INSERT INTO `tabela_itens` (`id_item`, `id_contrato`, `num_item`, `nome_produto`, `quantidade`, `valor_unitario`, `valor_total`) VALUES
(1, 1, '67', 'farinha', 23, '35.00', '805.00'),
(2, 2, '3', 'far', 13, '58.00', '754.00'),
(3, 2, '21', 'der', 34, '5.88', '199.92'),
(4, 2, '99', 'tyu', 50, '2.99', '149.50'),
(5, 3, '300', 'guy', 5, '289.00', '1445.00'),
(6, 3, '1', 'yte', 8, '388.00', '3104.00'),
(7, 3, '89', 'uio', 322, '0.99', '318.78'),
(8, 3, '28', 'ilo', 233, '1.89', '440.37'),
(9, 4, '21', 'destra', 2, '528.00', '1056.00'),
(10, 3, '5', 'briga', 7, '88.89', '622.23'),
(11, 5, '15', '0', 8, '5467.00', '43736.00'),
(12, 6, '21', '0', 100, '0.23', '23.00'),
(13, 6, '34', '0', 120, '32.77', '3932.40'),
(14, 6, '66', '0', 120, '2.20', '264.00'),
(15, 6, '53', '0', 78, '7.49', '584.22'),
(16, 2, '66', 'MANGA', 120, '3.00', '360.00'),
(17, 2, '63', 'UVA', 78, '7.49', '584.22'),
(18, 2, '74', 'PETRA', 36, '5.00', '180.00'),
(19, 3, '98', 'DRINN', 2, '100.00', '200.00'),
(20, 3, '36', 'DRTS', 23, '45.00', '1035.00'),
(21, 4, '15', 'DFA', 22, '8.90', '195.80'),
(22, 4, '16', 'GTA', 5, '233.00', '1165.00'),
(23, 4, '18', 'DFAK', 2, '8.90', '17.80');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabela_itens`
--
ALTER TABLE `tabela_itens`
  ADD CONSTRAINT `tabela_itens_ibfk_1` FOREIGN KEY (`id_contrato`) REFERENCES `tabela_contrato` (`id_contrato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
