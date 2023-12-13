-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2023 at 06:04 PM
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
-- Table structure for table `cras`
--

DROP TABLE IF EXISTS `cras`;
CREATE TABLE IF NOT EXISTS `cras` (
  `cpf` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `nome_social` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome_mae` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome_pai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nac_pessoa` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uf_pessoa` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nat_pessoa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tel_pessoa` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_pessoa` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rg` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `complemento_rg` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_exp_rg` date NOT NULL,
  `sigla_rg` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estado_rg` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nis` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `num_titulo` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `zone_titulo` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `area_titulo` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `profissao` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `renda_per` int NOT NULL,
  `bairro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `logradouro` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `numero` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `referencia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `qtd_pessoa` int NOT NULL,
  `cras` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dtcadastro` date NOT NULL,
  `quil_nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ind_nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `out_gpte` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `morador_de_rua` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `temp_rua` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `familia_rua` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `acess_aliment` varchar(3) NOT NULL,
  `rua_apoio` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cras`
--

INSERT INTO `cras` (`cpf`, `nome`, `data_nasc`, `nome_social`, `sexo`, `nome_mae`, `nome_pai`, `nac_pessoa`, `uf_pessoa`, `nat_pessoa`, `tel_pessoa`, `email_pessoa`, `rg`, `complemento_rg`, `data_exp_rg`, `sigla_rg`, `estado_rg`, `nis`, `num_titulo`, `zone_titulo`, `area_titulo`, `profissao`, `renda_per`, `bairro`, `logradouro`, `numero`, `referencia`, `qtd_pessoa`, `cras`, `dtcadastro`, `quil_nome`, `ind_nome`, `out_gpte`, `morador_de_rua`, `temp_rua`, `familia_rua`, `acess_aliment`, `rua_apoio`) VALUES
('134.087.114-96', 'DIEGO MOREIRA DE ANDRADE', '2000-01-23', '', 'MASCULINO', 'MARIA DO SOCORRO MOREIRA DE ANDRADE', 'ERALDO BEZERRA DE ANDRADE', 'BRASIL', 'PE', 'SAO BENTO DO UNA', '0991718722', '', '10440447', '', '2016-08-17', 'SDS', 'PE', '21230775449', '0095492530841', '0052', '', 'EMPREGADO COM CARTEIRA ASSINAD', 220, 'CENTRO', 'LOTEAMENTO  SETE IRMAOS', '00000', 'AO LADO DA CASA DE PAULO DA QUITANDA', 1, '', '0000-00-00', '', '', '', '', '', '', '', ''),
('078.158.234-24', 'VALTER MATHEUS DE LIMA ARAUJO', '2001-01-03', '', 'MASCULINO', 'PALOMA DE LIMA ARAUJO', 'VALDIR DO NASCIMENTO ARAUJO', 'BRASIL', 'PE', 'VITORIA DE SANTO ANTAO', '0993084976', '', '00000000000009315783', '', '2011-09-05', 'SDS', 'PE', '16598717184', '', '', '', 'EMPREGADO COM CARTEIRA ASSINAD', 1256, 'CENTRO', 'RUA  18 DE COPACABANA', '00000', 'PROXIMO A NELSON SAPATEIRO', 1, '', '0000-00-00', '', '', '', '', '', '', '', ''),
('012.050.914-83', 'ELIZANIA SILVA DOS SANTOS', '1981-12-14', '', 'FEMININO', 'AUGUSTA SECUNDINA SILVA DOS SANTOS', 'JOSE BATISTA DOS SANTOS', 'BRASIL', 'PE', 'SAO BENTO DO UNA', '0994580426', '', '00000000000006632141', '', '2000-03-01', 'OE', 'PE', '16096504974', '0054371680868', '0052', '', 'OUTRO', 0, 'BOA ESPERANCA', 'RUA  QUATRO', '00000', 'PROXIMO AO MERCADINHO DE ADEMAR E A IGREJA EVANGELICA SEMEANDO O MUNDO RF CONHECIDA POR ZANIA', 3, '', '0000-00-00', '', '', '', '', '', '', '', ''),
('052.555.864-04', 'DENIS OLIVEIRA CARVALHO DA SILVA', '1984-06-09', '', 'MASCULINO', 'MARIA DO SOCORRO OLIVEIRA SILVA', 'FABRICIANO CARVALHO DA SILVA', 'BRASIL', 'SP', 'SAO PAULO', '0992592450', '', '00000000000007009362', '', '2013-02-21', 'SDS', 'PE', '16120674374', '0065492170809', '0052', '', 'EMPREGADO COM CARTEIRA ASSINAD', 220, 'FEIJAO', 'SITIO  FEIJAO', '00000', 'PROXIMO AO DEL CLUB', 6, '', '0000-00-00', '', '', '', '', '', '', '', ''),
('064.161.824-75', 'PATRICIA CORDEIRO DE MACEDO', '1985-04-03', '', 'FEMININO', 'LENILDA CORDEIRO DE MACEDO', 'ANTONIO FRANCISCO DE MACEDO', 'BRASIL', 'PE', 'CACHOEIRINHA', '0981997702', '', '00000000000007419193', '', '2003-10-13', 'SSP', 'PE', '16634905232', '0071330060825', '0052', '', 'TRABALHADOR NÃO REMUNERADO', 0, 'ESPIRITO SANTO', 'RUA SANTA QUITERIA', '00000', 'PROXIMO A CASA DE FARINHA DE VALADARIOS', 5, '', '0000-00-00', '', '', '', '', '', '', '', ''),
('102.653.444-50', 'RUDSSANNY PEREIRA DA SILVA', '1992-11-27', 'RUTI', 'FEMININO', 'MARIA DE LOURDES PEREIRA DA SILVA', 'ROBERTO ANTONIO DA SILVA', 'BRASIL', 'PE', 'SAO BENTO DO UNA', '0989813184', '', '00000000000008857177', '', '2009-09-29', 'SSP', 'PE', '16536917643', '0083254370841', '0052', '', 'OUTRO', 0, 'JOAQUIM DA SILVA COSTA', 'RUA  JOAQUIM DA SILVA COSTA', '00000', 'PROXIMO AO POSTINHO DA RUA DOS TERREIROS', 5, '', '0000-00-00', '', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
