-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2023 at 06:01 PM
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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  `apelido` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `setor` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `funcao` int NOT NULL,
  `dt_nasc` date NOT NULL,
  `telefone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `cargo` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_cargo` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `guinche` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_registro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `apelido`, `usuario`, `senha`, `nivel`, `cpf`, `setor`, `funcao`, `dt_nasc`, `telefone`, `email`, `cargo`, `id_cargo`, `guinche`, `data_registro`) VALUES
(7, 'DIEGO EMMANUEL CADETE', 'DIUH', 'cad.cadete', '$2y$10$sMB2LGrmnoGCns8zURF2IO6TFk72iEw3a6pxolF9fArPffKLiqzl.', 'admin', '092.349.874-54', 'CADUNICO', 1, '1990-07-02', '(81) 9 9414-5401', 'emmanuelcadete@outlook.com', 'COORDENAÇÃO DO CADASTRO ÚNICO / BOLSA FAMÍLIA', 'Mat.: 108026', '', '2023-11-17 12:46:41'),
(8, 'MARIA RAFAELLA COSTA', 'RAFINHA', 'cad.rafaella', '$2y$10$LoTPE65tkuXIKE51RfCKgu/ALbYAT.u9GGO5fgVr6XfQ1Ht7WafkS', 'usuario', '078.158.234-24', 'CADUNICO', 3, '2000-01-11', '(81) 9 9999-9999', 'rafa@free.br', 'ENTREVISTADOR', '108090', '', '2023-11-19 00:22:33'),
(15, '', '', 'asdgsafd', '$2y$10$kGa7L9sAqsFA2jEezUwGhe7eynX1hRSm6G7LW12oYOXPfsOP2qgnG', 'admin', '', 'sda', 2, '0000-00-00', '', 'asdf@sdfg', '', '', '', '2023-11-29 16:34:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
