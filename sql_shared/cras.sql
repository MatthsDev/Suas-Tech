-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Dez-2023 às 12:49
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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_german2_ci;

--
-- Extraindo dados da tabela `cras`
--

INSERT INTO `cras` (`id`, `cpf`, `nome`, `data_nasc`, `nome_social`, `sexo`, `outro_sex`, `cod_familia_indigena_fam`, `nom_povo_indigena_fam`, `cod_indigena_reside_fam`, `nom_reserva_indigena_fam`, `ind_familia_quilombola_fam`, `nom_comunidade_quilombola_fam`, `nome_mae`, `nome_pai`, `nac_pessoa`, `uf_pessoa`, `nat_pessoa`, `tel_pessoa`, `email_pessoa`, `rg`, `complemento_rg`, `data_exp_rg`, `sigla_rg`, `estado_rg`, `nis`, `num_titulo`, `zone_titulo`, `area_titulo`, `profissao`, `renda_per`, `bairro`, `logradouro`, `numero`, `referencia`, `qtd_pessoa`, `cras`, `dtcadastro`, `quil_nome`, `ind_nome`, `out_gpt`, `morador_de_rua`, `temp_rua`, `familia_rua`, `acesso_aliment`, `rua_apoio`, `acompanhamento`) VALUES
(44, '078.158.234-24', 'VALTER MATHEUS DE LIMA ARAUJO', '2001-01-03', '', 'MASCULINO', NULL, '2', NULL, '2', NULL, '2', NULL, 'PALOMA DE LIMA ARAUJO', 'VALDIR DO NASCIMENTO ARAUJO', 'BRASIL', 'PE', 'VITORIA DE SANTO ANTAO', '0993084976', '', '00000000000009315783', '', '2011-09-05', 'SDS', 'PE', '16598717184', '', '', '', 'EMPREGADO COM CARTEIRA ASSINADA', '1256.00', 'CENTRO', 'RUA  18 DE COPACABANA', '00000', 'PROXIMO A NELSON SAPATEIRO', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
