-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15/12/2023 às 12:06
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cras`
--

DROP TABLE IF EXISTS `cras`;
CREATE TABLE IF NOT EXISTS `cras` (
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `referencia` text,
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cras`
--

INSERT INTO `cras` (`nome`, `cpf`, `bairro`, `logradouro`, `numero`, `referencia`) VALUES
('LUIZ MIGUEL AMORIM LEITE', '15789532438', 'CENTRO', '2A TRAVESSA JOAQUIM NABUCO', '125', 'PROXIMO A PADARIA'),
('CUZIN', '12345678900', 'CENTRO', 'CASA DE CARAI', '666', 'PERTO DO INFERNO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
