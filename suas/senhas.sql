-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Dez-2023 às 14:35
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

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
-- Estrutura da tabela `senhas`
--

DROP TABLE IF EXISTS `senhas`;
CREATE TABLE IF NOT EXISTS `senhas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_senha` varchar(44) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sits_senha_id` int NOT NULL,
  `tipos_senha_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `senhas`
--

INSERT INTO `senhas` (`id`, `nome_senha`, `sits_senha_id`, `tipos_senha_id`) VALUES
(1, 'PBF-1', 1, 1),
(2, 'PBF-2', 1, 1),
(3, 'PBF-3', 1, 1),
(4, 'PBF-4', 1, 1),
(5, 'PBF-5', 1, 1),
(6, 'PBF-6', 1, 1),
(7, 'PBF-7', 1, 1),
(8, 'PBF-8', 1, 1),
(9, 'PBF-9', 1, 1),
(10, 'PBF-10', 1, 1),
(11, 'PBF-11', 1, 1),
(12, 'PBF-12', 1, 1),
(13, 'PBF-13', 1, 1),
(14, 'PBF-14', 1, 1),
(15, 'PBF-15', 1, 1),
(16, 'PBF-16', 1, 1),
(17, 'PBF-17', 1, 1),
(18, 'PBF-18', 1, 1),
(19, 'PBF-19', 1, 1),
(20, 'PBF-20', 1, 1),
(21, 'PPR-1', 1, 2),
(22, 'PPR-2', 1, 2),
(23, 'PPR-3', 1, 2),
(24, 'PPR-4', 1, 2),
(25, 'PPR-5', 1, 2),
(26, 'PPR-6', 1, 2),
(27, 'PPR-7', 1, 2),
(28, 'PPR-8', 1, 2),
(29, 'PPR-9', 1, 2),
(30, 'PPR-10', 1, 2),
(31, 'PPR-11', 1, 2),
(32, 'PPR-12', 1, 2),
(33, 'PPR-13', 1, 2),
(34, 'PPR-14', 1, 2),
(35, 'PPR-15', 1, 2),
(36, 'PPR-16', 1, 2),
(37, 'PPR-17', 1, 2),
(38, 'PPR-18', 1, 2),
(39, 'PPR-19', 1, 2),
(40, 'PPR-20', 1, 2),
(42, 'SITF-1', 1, 3),
(43, 'SITF-2', 1, 3),
(44, 'SITF-3', 1, 3),
(45, 'SITF-4', 1, 3),
(46, 'SITF-5', 1, 3),
(47, 'SITF-6', 1, 3),
(48, 'SITF-7', 1, 3),
(49, 'SITF-8', 1, 3),
(50, 'SITF-9', 1, 3),
(51, 'SITF-10', 1, 3),
(52, 'SITF-11', 1, 3),
(53, 'SITF-12', 1, 3),
(54, 'SITF-13', 1, 3),
(55, 'SITF-14', 1, 3),
(56, 'SITF-15', 1, 3),
(57, 'SITF-16', 1, 3),
(58, 'SITF-17', 1, 3),
(59, 'SITF-18', 1, 3),
(60, 'SITF-19', 1, 3),
(61, 'SITF-20', 1, 3),
(62, 'SITF-21', 1, 3),
(63, 'SITF-22', 1, 3),
(64, 'SITF-23', 1, 3),
(65, 'SITF-24', 1, 3),
(66, 'SITF-25', 1, 3),
(67, 'SITF-26', 1, 3),
(68, 'SITF-27', 1, 3),
(69, 'SITF-28', 1, 3),
(70, 'SITF-29', 1, 3),
(71, 'SITF-30', 1, 3),
(72, 'SITF-31', 1, 3),
(73, 'SITF-32', 1, 3),
(74, 'SITF-33', 1, 3),
(75, 'SITF-34', 1, 3),
(76, 'SITF-35', 1, 3),
(77, 'SITF-36', 1, 3),
(78, 'SITF-37', 1, 3),
(79, 'SITF-38', 1, 3),
(80, 'SITF-39', 1, 3),
(81, 'SITF-40', 1, 3),
(82, 'SITF-41', 1, 3),
(83, 'SITF-42', 1, 3),
(84, 'SITF-43', 1, 3),
(85, 'SITF-44', 1, 3),
(86, 'SITF-45', 1, 3),
(87, 'SITF-46', 1, 3),
(88, 'SITF-47', 1, 3),
(89, 'SITF-48', 1, 3),
(90, 'SITF-49', 1, 3),
(91, 'SITF-50', 1, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
