-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Dez-2023 às 02:04
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
-- Estrutura da tabela `cras`
--

DROP TABLE IF EXISTS `cras`;
CREATE TABLE IF NOT EXISTS `cras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) COLLATE utf8mb3_german2_ci NOT NULL,
  `cod_familiar_fam` varchar(30) COLLATE utf8mb3_german2_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8mb3_german2_ci NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `nome_social` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `outro_sex` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `cod_familia_indigena_fam` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `nom_povo_indigena_fam` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `cod_indigena_reside_fam` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `nom_reserva_indigena_fam` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `ind_familia_quilombola_fam` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `nom_comunidade_quilombola_fam` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `nome_mae` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `nome_pai` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `nac_pessoa` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `uf_pessoa` varchar(2) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `nat_pessoa` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `tel_pessoa` varchar(20) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `email_pessoa` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `rg` varchar(20) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `complemento_rg` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `data_exp_rg` date DEFAULT NULL,
  `sigla_rg` varchar(20) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `estado_rg` varchar(2) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `nis` varchar(20) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `num_titulo` varchar(20) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `zone_titulo` varchar(10) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `area_titulo` varchar(10) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `profissao` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `renda_per` decimal(10,2) DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `logradouro` varchar(255) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `numero` varchar(20) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `referencia` text COLLATE utf8mb3_german2_ci,
  `qtd_pessoa` int DEFAULT NULL,
  `parentesco` varchar(30) COLLATE utf8mb3_german2_ci NOT NULL,
  `cor_raca` varchar(10) COLLATE utf8mb3_german2_ci NOT NULL,
  `cras` varchar(50) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `dtcadastro` date DEFAULT NULL,
  `quil_nome` varchar(50) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `ind_nome` varchar(50) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `out_gpt` varchar(50) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `morador_de_rua` varchar(50) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `temp_rua` varchar(3) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `familia_rua` varchar(3) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `acesso_aliment` varchar(3) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `rua_apoio` varchar(50) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  `acompanhamento` varchar(50) COLLATE utf8mb3_german2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_german2_ci;

--
-- Extraindo dados da tabela `cras`
--

INSERT INTO `cras` (`id`, `cpf`, `cod_familiar_fam`, `nome`, `data_nasc`, `nome_social`, `sexo`, `outro_sex`, `cod_familia_indigena_fam`, `nom_povo_indigena_fam`, `cod_indigena_reside_fam`, `nom_reserva_indigena_fam`, `ind_familia_quilombola_fam`, `nom_comunidade_quilombola_fam`, `nome_mae`, `nome_pai`, `nac_pessoa`, `uf_pessoa`, `nat_pessoa`, `tel_pessoa`, `email_pessoa`, `rg`, `complemento_rg`, `data_exp_rg`, `sigla_rg`, `estado_rg`, `nis`, `num_titulo`, `zone_titulo`, `area_titulo`, `profissao`, `renda_per`, `bairro`, `logradouro`, `numero`, `referencia`, `qtd_pessoa`, `parentesco`, `cor_raca`, `cras`, `dtcadastro`, `quil_nome`, `ind_nome`, `out_gpt`, `morador_de_rua`, `temp_rua`, `familia_rua`, `acesso_aliment`, `rua_apoio`, `acompanhamento`) VALUES
(52, '711.229.354-55', '07272459379', 'MARIA FERNANDA SILVA SANTOS', '1999-09-09', 'NANDA', 'FEMININO', NULL, '2', NULL, '2', NULL, '2', NULL, 'JURACI RODRIGUES SILVA SANTOS', '', 'BRASIL', 'PE', 'BELO JARDIM', '0000000000', '', '00000000000010157656', '', '2015-05-06', 'OE', '', '13229121510', '', '', '', 'OUTRO', '25.00', 'POCO DOCE', 'ESTRADA  SEM DENOMINACAO', 'S/N', 'PRXIMO A Z QUEIJEIRO', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '107.685.554-77', '07272459379', 'JOSEFA ALINE CARVALHO ALEXANDRE', '1992-07-12', '', 'FEMININO', NULL, '2', NULL, '2', NULL, '2', NULL, 'ADELIA ALEXANDRE CORDEIRO', '', 'BRASIL', 'PE', 'BELO JARDIM', '0000000000', '', '00000000000008652561', '', '2008-09-22', 'SSP', 'PE', '16187099274', '0081955440884', '0052', '', 'OUTRO', '0.00', 'CENTRO', 'RUA  DAS TULIPAS', '00000', '', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '162.094.684-03', '07272459379', 'MIRIAN DE LIMA ARAUJO', '2006-01-11', '', 'FEMININO', NULL, '2', NULL, '2', NULL, '2', NULL, 'PALOMA DE LIMA ARAUJO', 'VALDIR DO NASCIMENTO ARAUJO', 'BRASIL', 'PE', 'CARUARU', '0000000000', '', '00000000000009315785', '', '2011-09-05', 'SDS', 'PE', '16479797559', '', '', '', 'OUTRO', '25.00', 'POCO DOCE', 'ESTRADA  SEM DENOMINACAO', 'S/N', 'PRXIMO A Z QUEIJEIRO', 1, 'OUTRO PARENTE', 'BRANCO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
