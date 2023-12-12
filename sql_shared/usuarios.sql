-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Dez-2023 às 15:37
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
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apelido` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `setor` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `funcao` int NOT NULL,
  `dt_nasc` date NOT NULL,
  `telefone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cargo` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_cargo` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guinche` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_registro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `apelido`, `usuario`, `senha`, `nivel`, `cpf`, `setor`, `funcao`, `dt_nasc`, `telefone`, `email`, `cargo`, `id_cargo`, `guinche`, `data_registro`) VALUES
(1, 'AGENTE.TEC 12', 'SUPORTE', 'adm.suporte', '$2y$10$sMB2LGrmnoGCns8zURF2IO6TFk72iEw3a6pxolF9fArPffKLiqzl.', 'suport', '092.349.874-54', 'SUPORTE', 1, '1990-07-02', '(81)9 9414-5401', 'engmecanicocadete@gmail.com', 'TECNICO DO SISTEMA', '092.349.874-54', '', '2023-12-10 16:24:02'),
(2, 'USUARIO TESTE ADM', 'ADMINISTRADOR', 'usuario.adm', '$2y$10$JlCvlnag6de7NzZzvYXJlOuJ9zpD9g25Bz2wW/8hcKf0QlyBHUn3K', 'admin', '134.087.114-96', 'CRAS - ANTONIO MATIAS', 2, '2000-01-26', '(81) 9 9909-0040', 'diegomoreira.pab@gmail.com', 'TECNICO DO SISTEMA', '134.087.114-96', '', '2023-12-10 23:49:00'),
(3, 'USUARIO TESTE COMUM', 'USER COMUM', 'usuario.comum', '$2y$10$6bbttlhPT9r.WE72.F852.MSnkC0tuBMsDT0Zn7mOWT837bVSf0Q.', 'usuario', '078.158.234-24', 'CADASTRO ÚNICO - SECRETARIS DE ASSISTÊNCIA SOCIAL', 3, '2000-12-21', '(81) 9 9999-9999', 'cadunico.usercomum@gmail.com', 'COMUM', '1234', '', '2023-12-11 11:10:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
