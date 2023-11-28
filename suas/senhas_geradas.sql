-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Nov-2023 às 17:53
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
-- Estrutura da tabela `senhas_geradas`
--

DROP TABLE IF EXISTS `senhas_geradas`;
CREATE TABLE IF NOT EXISTS `senhas_geradas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `senha_id` int NOT NULL,
  `sits_senha_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `senhas_geradas`
--

INSERT INTO `senhas_geradas` (`id`, `senha_id`, `sits_senha_id`, `user_id`, `created`, `modified`) VALUES
(1, 1, 4, 7, '2023-11-23 00:59:01', '2023-11-23 00:59:16'),
(2, 2, 4, 8, '2023-11-23 00:59:01', '2023-11-23 00:59:34'),
(3, 3, 4, 8, '2023-11-23 00:59:01', '2023-11-23 01:05:45'),
(4, 4, 4, 7, '2023-11-23 00:59:01', '2023-11-23 01:05:51'),
(5, 5, 4, 8, '2023-11-23 00:59:01', '2023-11-23 01:10:46'),
(6, 6, 4, 8, '2023-11-23 00:59:02', '2023-11-23 01:12:25'),
(7, 7, 4, 7, '2023-11-23 00:59:02', '2023-11-23 01:12:29'),
(8, 8, 4, 8, '2023-11-23 00:59:02', '2023-11-23 01:13:26'),
(9, 9, 4, 7, '2023-11-23 00:59:02', '2023-11-23 01:13:31'),
(10, 10, 4, 8, '2023-11-23 00:59:02', '2023-11-23 01:16:53'),
(11, 11, 4, 8, '2023-11-23 00:59:02', '2023-11-23 01:17:06'),
(12, 12, 4, 7, '2023-11-23 00:59:03', '2023-11-23 01:17:15'),
(13, 13, 4, 8, '2023-11-23 00:59:03', '2023-11-23 01:17:46'),
(14, 14, 4, 7, '2023-11-23 00:59:03', '2023-11-23 01:17:52'),
(15, 15, 4, 8, '2023-11-23 00:59:03', '2023-11-23 01:18:56'),
(16, 16, 4, 7, '2023-11-23 00:59:03', '2023-11-23 01:20:36'),
(17, 17, 4, 8, '2023-11-23 00:59:03', '2023-11-23 01:20:40'),
(18, 18, 4, 7, '2023-11-23 00:59:04', '2023-11-23 01:21:27'),
(19, 19, 4, 8, '2023-11-23 00:59:04', '2023-11-23 01:21:31'),
(20, 20, 4, 8, '2023-11-23 00:59:04', '2023-11-23 01:39:26'),
(21, 21, 4, 7, '2023-11-23 01:26:24', '2023-11-23 01:35:58'),
(22, 22, 4, 8, '2023-11-23 01:27:35', '2023-11-23 01:36:22'),
(23, 23, 4, 8, '2023-11-23 01:35:25', '2023-11-23 01:36:25'),
(24, 24, 4, 8, '2023-11-23 01:35:25', '2023-11-23 01:36:27'),
(25, 25, 4, 8, '2023-11-23 01:35:25', '2023-11-23 01:41:31'),
(26, 26, 4, 8, '2023-11-23 01:35:25', '2023-11-23 01:41:33'),
(27, 27, 4, 8, '2023-11-23 01:35:26', '2023-11-23 01:41:36'),
(28, 28, 4, 8, '2023-11-23 01:35:26', '2023-11-23 01:41:39'),
(29, 29, 4, 7, '2023-11-23 01:35:26', '2023-11-23 01:41:55'),
(30, 30, 4, 7, '2023-11-23 01:35:26', '2023-11-23 01:41:57'),
(31, 31, 4, 7, '2023-11-23 01:35:26', '2023-11-23 01:42:09'),
(32, 32, 4, 7, '2023-11-23 01:35:26', '2023-11-23 01:42:12'),
(33, 33, 4, 8, '2023-11-23 01:35:26', '2023-11-23 01:42:28'),
(34, 34, 4, 7, '2023-11-23 01:35:27', '2023-11-24 04:08:35'),
(35, 35, 4, 7, '2023-11-23 01:35:27', '2023-11-24 05:29:58'),
(36, 36, 4, 7, '2023-11-23 01:35:27', '2023-11-24 05:30:35'),
(37, 37, 4, 7, '2023-11-23 01:35:27', '2023-11-24 05:30:36'),
(38, 38, 4, 7, '2023-11-23 01:35:27', '2023-11-24 05:30:37'),
(39, 39, 4, 7, '2023-11-23 01:35:27', '2023-11-24 05:30:38'),
(40, 40, 4, 7, '2023-11-23 01:35:28', '2023-11-24 05:30:39'),
(41, 1, 4, 7, '2023-11-23 02:01:29', '2023-11-23 02:03:01'),
(42, 2, 4, 7, '2023-11-23 02:01:30', '2023-11-24 04:08:32'),
(43, 3, 4, 7, '2023-11-23 02:01:32', '2023-11-24 05:29:29'),
(44, 21, 2, NULL, '2023-11-23 02:01:34', NULL),
(45, 22, 2, NULL, '2023-11-23 02:01:36', NULL),
(46, 23, 2, NULL, '2023-11-23 02:01:38', NULL),
(47, 4, 4, 7, '2023-11-23 02:03:59', '2023-11-24 05:29:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
