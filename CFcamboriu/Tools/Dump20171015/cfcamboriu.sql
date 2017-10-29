-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Out-2017 às 19:26
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cfcamboriu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `abastecimentos`
--

DROP TABLE IF EXISTS `abastecimentos`;
CREATE TABLE IF NOT EXISTS `abastecimentos` (
  `id_abastecimento` int(11) NOT NULL AUTO_INCREMENT,
  `data_abastecimento` datetime NOT NULL,
  `tipo_combustivel` varchar(45) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `litros_abastecidos` float NOT NULL,
  `valor_litro` decimal(10,2) NOT NULL,
  `odometro` float NOT NULL,
  `tanque_cheio` char(10) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  PRIMARY KEY (`id_abastecimento`),
  KEY `fk_abastecimentos_fornecedores1_idx` (`id_fornecedor`),
  KEY `fk_abastecimentos_veiculos1_idx` (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `abastecimentos`
--

INSERT INTO `abastecimentos` (`id_abastecimento`, `data_abastecimento`, `tipo_combustivel`, `valor_total`, `litros_abastecidos`, `valor_litro`, `odometro`, `tanque_cheio`, `id_fornecedor`, `id_veiculo`) VALUES
(1, '2017-01-01 08:30:00', 'Gasolina Comum', '103.20', 30, '3.44', 22.455, 'Nao', 0, 0),
(2, '2017-10-12 08:08:00', '', '200.00', 40, '5.00', 20, 'Sim', 1, 3),
(3, '2017-10-18 10:00:00', 'Gás', '1600.00', 40, '40.00', 30, 'Sim', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `condutores`
--

DROP TABLE IF EXISTS `condutores`;
CREATE TABLE IF NOT EXISTS `condutores` (
  `id_condutor` int(11) NOT NULL AUTO_INCREMENT,
  `habilitacao` varchar(100) DEFAULT NULL,
  `categoria` varchar(10) DEFAULT NULL,
  `data_vencimento` datetime DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_condutor`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `condutores`
--

INSERT INTO `condutores` (`id_condutor`, `habilitacao`, `categoria`, `data_vencimento`, `nome`) VALUES
(1, '91928312398', 'AB', '2018-02-02 00:00:00', 'Condutor 1'),
(2, '98293409123', 'AD', '2019-12-09 00:00:00', 'Condutor 2'),
(3, '0827182373', 'A', '2020-02-08 00:00:00', 'Condutor 3'),
(100, NULL, NULL, NULL, 'ECRETARIA RESPONSÁE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

DROP TABLE IF EXISTS `despesas`;
CREATE TABLE IF NOT EXISTS `despesas` (
  `id_despesa` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_despesa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `codigo_fornecedor` varchar(50) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `banco` varchar(45) NOT NULL,
  `agencia` varchar(45) NOT NULL,
  `conta` varchar(45) NOT NULL,
  `ramo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_fornecedor`, `nome`, `endereco`, `codigo_fornecedor`, `cnpj`, `telefone`, `banco`, `agencia`, `conta`, `ramo`) VALUES
(1, 'Posto IPIRANGA', 'Av. BRASIL BALNEÁRIO CAMBORIÚ', 'Ipiranga 01', '819283198274', '332222222', 'Itau', '0222', '02022291', 'POSTO'),
(2, 'Mecânica do Zé', 'Rua do Zé numero 20', ' MEC 01', '99128312039123', '3232-3333', 'Nulo', 'Nulo', 'Nulo', 'MECÂNICA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `licenciamentos`
--

DROP TABLE IF EXISTS `licenciamentos`;
CREATE TABLE IF NOT EXISTS `licenciamentos` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `status_pagamento` varchar(45) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `RENAVAN` varchar(45) NOT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `fk_tb_documentacoes_tb_veiculos1_idx` (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `licenciamentos`
--

INSERT INTO `licenciamentos` (`id_doc`, `valor_total`, `vencimento`, `status_pagamento`, `id_veiculo`, `RENAVAN`) VALUES
(1, '500.00', '2019-01-01', 'Pendente', 1, ''),
(2, '500.00', '2019-01-01', 'Pendente', 1, ''),
(3, '500.00', '2019-01-01', 'Pendente', 1, ''),
(4, '555.00', '2019-01-01', 'Pendente', 2, '4823842349823');

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencoes`
--

DROP TABLE IF EXISTS `manutencoes`;
CREATE TABLE IF NOT EXISTS `manutencoes` (
  `id_manutencoes` int(11) NOT NULL AUTO_INCREMENT,
  `data_entrada` datetime NOT NULL,
  `data_saida` datetime NOT NULL,
  `valor_gasto` decimal(10,2) NOT NULL,
  `descricao_servico` text NOT NULL,
  `observacoes` text,
  `id_veiculo` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `odometro_manutencao` float DEFAULT NULL,
  PRIMARY KEY (`id_manutencoes`),
  KEY `fk_tb_manutencoes_tb_veiculos1_idx` (`id_veiculo`),
  KEY `fk_manutencoes_fornecedores1_idx` (`id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `manutencoes`
--

INSERT INTO `manutencoes` (`id_manutencoes`, `data_entrada`, `data_saida`, `valor_gasto`, `descricao_servico`, `observacoes`, `id_veiculo`, `id_fornecedor`, `odometro_manutencao`) VALUES
(5, '2010-01-01 09:00:00', '2010-01-10 10:00:00', '100.01', 'Troca de Óleo', 'Freios estão ruins', 1, 2, 50.344);

-- --------------------------------------------------------

--
-- Estrutura da tabela `multas`
--

DROP TABLE IF EXISTS `multas`;
CREATE TABLE IF NOT EXISTS `multas` (
  `id_multa` int(11) NOT NULL AUTO_INCREMENT,
  `pdf_multa` varchar(255) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `infracao` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `local` varchar(255) NOT NULL,
  `nivel` char(15) NOT NULL,
  `responsavel_infracao` varchar(100) DEFAULT NULL,
  `id_veiculo` int(11) NOT NULL,
  PRIMARY KEY (`id_multa`),
  KEY `fk_multas_veiculos1_idx` (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `multas`
--

INSERT INTO `multas` (`id_multa`, `pdf_multa`, `valor`, `infracao`, `data`, `local`, `nivel`, `responsavel_infracao`, `id_veiculo`) VALUES
(38, NULL, '434.44', 'Empinar moto em via unica contra-mão', '2019-01-01 09:02:00', 'Camboriu', 'Gravissima', 'FULANO', 1),
(39, NULL, '540.40', 'Trafegar em via contramão', '2019-01-01 09:12:00', 'Camboriu', 'Gravissima', 'CICLANO', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `id_veiculo` int(11) NOT NULL,
  `km_inicial` float NOT NULL,
  `km_final` float DEFAULT NULL,
  `secretaria` varchar(45) NOT NULL,
  `data_saida` datetime NOT NULL,
  `data_retorno` datetime DEFAULT NULL,
  `funcionario` varchar(45) NOT NULL,
  `tipo_reserva` varchar(45) NOT NULL,
  `destino` varchar(45) DEFAULT NULL,
  `periodo_reservado` varchar(45) NOT NULL,
  `id_condutor` int(11) DEFAULT NULL,
  `condicao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `fk_tb_reserva_tb_veiculos1_idx` (`id_veiculo`),
  KEY `fk_reservas_condutores1_idx` (`id_condutor`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_veiculo`, `km_inicial`, `km_final`, `secretaria`, `data_saida`, `data_retorno`, `funcionario`, `tipo_reserva`, `destino`, `periodo_reservado`, `id_condutor`, `condicao`) VALUES
(9, 1, 20, NULL, 'SECRETARIA EDUCAÇÃO', '2019-01-01 09:00:00', '2019-01-01 09:10:00', 'FULANO', 'Comum', NULL, '2 dias', 1, 'Livre'),
(11, 3, 30, NULL, 'DESENVOLVIMENTO', '2019-01-01 09:00:00', NULL, 'JOAO', 'VIAGEM', NULL, '3 dias', 3, 'reservado'),
(13, 2, 20, NULL, 'DESENVOLVIMENTO', '2019-01-01 09:00:00', NULL, 'JOAO', 'Comum', NULL, '2 horas', 2, 'reservado'),
(16, 1, 20, NULL, 'SECRETARIA EDUCAÇÃO', '2019-01-01 09:11:00', NULL, 'CICLANO', 'Comum', 'Curitiba - PR', '2 horas', 1, 'reservado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `data_cadastro` varchar(45) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user`, `password`, `data_cadastro`, `nivel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-10-17 10:10:21', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `id_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(25) NOT NULL,
  `modelo` varchar(25) NOT NULL,
  `ano` varchar(45) NOT NULL,
  `chassi` varchar(55) NOT NULL,
  `placa` varchar(45) NOT NULL,
  PRIMARY KEY (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id_veiculo`, `marca`, `modelo`, `ano`, `chassi`, `placa`) VALUES
(1, 'FIAT', 'Palio', '2016', '9292fasf9313f', 'PLI 2230'),
(2, 'WOLKSVAGEM', 'Gol', '2017', '8912841us2218', 'GOL 4455'),
(3, 'HYUNDAI', 'HB20', '2017', 'hdh281829128d', 'HBV 9988');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `abastecimentos`
--
ALTER TABLE `abastecimentos`
  ADD CONSTRAINT `fk_abastecimentos_fornecedores1` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedores` (`id_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_abastecimentos_veiculos1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `licenciamentos`
--
ALTER TABLE `licenciamentos`
  ADD CONSTRAINT `fk_tb_documentacoes_tb_veiculos1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `manutencoes`
--
ALTER TABLE `manutencoes`
  ADD CONSTRAINT `fk_manutencoes_fornecedores1` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedores` (`id_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_manutencoes_tb_veiculos1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `multas`
--
ALTER TABLE `multas`
  ADD CONSTRAINT `fk_multas_veiculos1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_reservas_condutores1` FOREIGN KEY (`id_condutor`) REFERENCES `condutores` (`id_condutor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_reserva_tb_veiculos1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
cfcamboriu