-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Dez-2023 às 03:55
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
-- Estrutura da tabela `creas`
--

DROP TABLE IF EXISTS `creas`;
CREATE TABLE IF NOT EXISTS `creas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `cod_familiar_fam` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `nome_social` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `outro_sex` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cod_familia_indigena_fam` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_povo_indigena_fam` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cod_indigena_reside_fam` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_reserva_indigena_fam` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_familia_quilombola_fam` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_comunidade_quilombola_fam` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nome_mae` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nome_pai` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nac_pessoa` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `uf_pessoa` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nat_pessoa` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel_pessoa` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_pessoa` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pcd` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `rg` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `complemento_rg` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_exp_rg` date DEFAULT NULL,
  `sigla_rg` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado_rg` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nis` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_titulo` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zone_titulo` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `area_titulo` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profissao` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `renda_per` decimal(10,2) DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logradouro` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referencia` text COLLATE utf8mb4_general_ci,
  `qtd_pessoa` int DEFAULT NULL,
  `parentesco` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `cor_raca` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `sit_rua` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `cras` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dtcadastro` date DEFAULT NULL,
  `acesso_aliment` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `acompanhamento` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
