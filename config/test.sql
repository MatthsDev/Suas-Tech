-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10-Nov-2023 às 17:04
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `senhas`
--

INSERT INTO `senhas` (`id`, `nome_senha`, `sits_senha_id`, `tipos_senha_id`) VALUES
(1, 'PBF-1', 2, 1),
(2, 'PBF-2', 2, 1),
(3, 'PBF-3', 2, 1),
(4, 'PBF-4', 2, 1),
(5, 'PBF-5', 2, 1),
(6, 'PBF-6', 2, 1),
(7, 'PBF-7', 2, 1),
(8, 'PBF-8', 2, 1),
(9, 'PBF-9', 2, 1),
(10, 'PBF-10', 2, 1),
(11, 'PBF-11', 2, 1),
(12, 'PBF-12', 2, 1),
(13, 'PBF-13', 2, 1),
(14, 'PBF-14', 2, 1),
(15, 'PBF-15', 2, 1),
(16, 'PBF-16', 2, 1),
(17, 'PBF-17', 2, 1),
(18, 'PBF-18', 2, 1),
(19, 'PBF-19', 2, 1),
(20, 'PBF-20', 2, 1),
(21, 'M1', 2, 2),
(22, 'M2', 2, 2),
(23, 'M3', 2, 2),
(24, 'M4', 2, 2),
(25, 'M5', 2, 2),
(26, 'M6', 2, 2),
(27, 'M7', 2, 2),
(28, 'M8', 2, 2),
(29, 'M9', 2, 2),
(30, 'M10', 2, 2),
(31, 'M11', 2, 2),
(32, 'M12', 2, 2),
(33, 'M13', 2, 2),
(34, 'M14', 2, 2),
(35, 'M15', 2, 2),
(36, 'M16', 2, 2),
(37, 'M17', 2, 2),
(38, 'M18', 2, 2),
(39, 'M19', 2, 2),
(40, 'M20', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `senhas_geradas`
--

DROP TABLE IF EXISTS `senhas_geradas`;
CREATE TABLE IF NOT EXISTS `senhas_geradas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `senha_id` int NOT NULL,
  `sits_senha_id` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `senhas_geradas`
--

INSERT INTO `senhas_geradas` (`id`, `senha_id`, `sits_senha_id`, `created`, `modified`) VALUES
(1, 1, 2, '2023-11-10 13:41:12', NULL),
(2, 2, 2, '2023-11-10 13:41:40', NULL),
(3, 1, 2, '2023-11-10 13:42:17', NULL),
(4, 2, 2, '2023-11-10 13:42:28', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sits_senhas`
--

DROP TABLE IF EXISTS `sits_senhas`;
CREATE TABLE IF NOT EXISTS `sits_senhas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sits_senhas`
--

INSERT INTO `sits_senhas` (`id`, `nome`) VALUES
(1, 'Livre'),
(2, 'Emitida'),
(3, 'Chamada'),
(4, 'Atendida'),
(5, 'Cancelada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_senhas`
--

DROP TABLE IF EXISTS `tipos_senhas`;
CREATE TABLE IF NOT EXISTS `tipos_senhas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipos_senhas`
--

INSERT INTO `tipos_senhas` (`id`, `nome`) VALUES
(1, 'Senha Convencional'),
(2, 'Senha Preferencial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `nivel`) VALUES
(1, 'Valter Matheus', 'cad.matheus', '@senha123', 'admin'),
(2, 'Diego Moreira', 'cad.diego', '@senha123', 'admin'),
(3, 'Diego Cadete', 'cad.cadete', '@senha123', 'admin'),
(4, 'Rafaella Melo', 'cad.rafaella', 'rafaella1001', 'usuario'),
(5, 'Williane Monteiro', 'cad.williane', '91279100', 'usuario'),
(6, 'maria eduarda', 'cad.eduarda', '06072021', 'usuario'),
(7, 'mirely moraes', 'cad.mirely', '@senha123', 'usuario'),
(8, 'Luiz Miguel', 'cad.miguel', 'f5b4a5.1', 'usuario');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
