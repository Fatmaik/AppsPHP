###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/user_guide/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.



********************
sckema banco 
********************

-- MySQL Workbench Synchronization
-- Generated: 2017-10-31 16:03
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: NoteRodrigo

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `CFcamboriu` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`veiculos` (
  `id_veiculo` INT(11) NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(25) NOT NULL,
  `modelo` VARCHAR(25) NOT NULL,
  `ano` VARCHAR(45) NOT NULL,
  `chassi` VARCHAR(55) NOT NULL,
  `placa` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_veiculo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`condutores` (
  `id_condutor` INT(11) NOT NULL AUTO_INCREMENT,
  `habilitacao` VARCHAR(100) NULL DEFAULT NULL,
  `categoria` VARCHAR(10) NULL DEFAULT NULL,
  `data_vencimento` DATETIME NULL DEFAULT NULL,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_condutor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`licenciamentos` (
  `id_doc` INT(11) NOT NULL AUTO_INCREMENT,
  `valor_total` DECIMAL(10,2) NOT NULL,
  `vencimento` DATE NOT NULL,
  `status_pagamento` VARCHAR(45) NOT NULL,
  `id_veiculo` INT(11) NOT NULL,
  `RENAVAN` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_doc`),
  INDEX `fk_tb_documentacoes_tb_veiculos1_idx` (`id_veiculo` ASC),
  CONSTRAINT `fk_tb_documentacoes_tb_veiculos1`
    FOREIGN KEY (`id_veiculo`)
    REFERENCES `CFcamboriu`.`veiculos` (`id_veiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`multas` (
  `id_multa` INT(11) NOT NULL AUTO_INCREMENT,
  `pdf_multa` VARCHAR(255) NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  `infracao` VARCHAR(255) NOT NULL,
  `data` DATETIME NOT NULL,
  `local` VARCHAR(255) NOT NULL,
  `nivel` CHAR(15) NOT NULL,
  `responsavel_infracao` VARCHAR(100) NULL DEFAULT NULL,
  `id_veiculo` INT(11) NOT NULL,
  PRIMARY KEY (`id_multa`),
  INDEX `fk_multas_veiculos1_idx` (`id_veiculo` ASC),
  CONSTRAINT `fk_multas_veiculos1`
    FOREIGN KEY (`id_veiculo`)
    REFERENCES `CFcamboriu`.`veiculos` (`id_veiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`manutencoes` (
  `id_manutencoes` INT(11) NOT NULL AUTO_INCREMENT,
  `data_entrada` DATETIME NOT NULL,
  `data_saida` DATETIME NOT NULL,
  `valor_gasto` DECIMAL(10,2) NOT NULL,
  `descricao_servico` TEXT NOT NULL,
  `observacoes` TEXT NULL DEFAULT NULL,
  `id_veiculo` INT(11) NOT NULL,
  `id_fornecedor` INT(11) NOT NULL,
  `odometro_manutencao` FLOAT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_manutencoes`),
  INDEX `fk_tb_manutencoes_tb_veiculos1_idx` (`id_veiculo` ASC),
  INDEX `fk_manutencoes_fornecedores1_idx` (`id_fornecedor` ASC),
  CONSTRAINT `fk_tb_manutencoes_tb_veiculos1`
    FOREIGN KEY (`id_veiculo`)
    REFERENCES `CFcamboriu`.`veiculos` (`id_veiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_manutencoes_fornecedores1`
    FOREIGN KEY (`id_fornecedor`)
    REFERENCES `CFcamboriu`.`fornecedores` (`id_fornecedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`fornecedores` (
  `id_fornecedor` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `endereco` VARCHAR(255) NOT NULL,
  `codigo_fornecedor` VARCHAR(50) NOT NULL,
  `cnpj` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `banco` VARCHAR(45) NOT NULL,
  `agencia` VARCHAR(45) NOT NULL,
  `conta` VARCHAR(45) NOT NULL,
  `ramo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_fornecedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`abastecimentos` (
  `id_abastecimento` INT(11) NOT NULL AUTO_INCREMENT,
  `data_abastecimento` DATETIME NOT NULL,
  `tipo_combustivel` VARCHAR(45) NOT NULL,
  `valor_total` DECIMAL(10,2) NOT NULL,
  `litros_abastecidos` FLOAT(11) NOT NULL,
  `valor_litro` DECIMAL(10,2) NOT NULL,
  `odometro` FLOAT(11) NOT NULL,
  `tanque_cheio` CHAR(10) NOT NULL,
  `id_fornecedor` INT(11) NOT NULL,
  `id_veiculo` INT(11) NOT NULL,
  PRIMARY KEY (`id_abastecimento`),
  INDEX `fk_abastecimentos_fornecedores1_idx` (`id_fornecedor` ASC),
  INDEX `fk_abastecimentos_veiculos1_idx` (`id_veiculo` ASC),
  CONSTRAINT `fk_abastecimentos_fornecedores1`
    FOREIGN KEY (`id_fornecedor`)
    REFERENCES `CFcamboriu`.`fornecedores` (`id_fornecedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_abastecimentos_veiculos1`
    FOREIGN KEY (`id_veiculo`)
    REFERENCES `CFcamboriu`.`veiculos` (`id_veiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`despesas` (
  `id_despesa` INT(11) NOT NULL AUTO_INCREMENT,
  `abastecimentos_id_abastecimento` INT(11) NOT NULL,
  `manutencoes_id_manutencoes` INT(11) NOT NULL,
  `multas_id_multa` INT(11) NOT NULL,
  `veiculos_id_veiculo` INT(11) NOT NULL,
  `licenciamentos_id_doc` INT(11) NOT NULL,
  PRIMARY KEY (`id_despesa`),
  INDEX `fk_despesas_abastecimentos1_idx` (`abastecimentos_id_abastecimento` ASC),
  INDEX `fk_despesas_manutencoes1_idx` (`manutencoes_id_manutencoes` ASC),
  INDEX `fk_despesas_multas1_idx` (`multas_id_multa` ASC),
  INDEX `fk_despesas_veiculos1_idx` (`veiculos_id_veiculo` ASC),
  INDEX `fk_despesas_licenciamentos1_idx` (`licenciamentos_id_doc` ASC),
  CONSTRAINT `fk_despesas_abastecimentos1`
    FOREIGN KEY (`abastecimentos_id_abastecimento`)
    REFERENCES `CFcamboriu`.`abastecimentos` (`id_abastecimento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesas_manutencoes1`
    FOREIGN KEY (`manutencoes_id_manutencoes`)
    REFERENCES `CFcamboriu`.`manutencoes` (`id_manutencoes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesas_multas1`
    FOREIGN KEY (`multas_id_multa`)
    REFERENCES `CFcamboriu`.`multas` (`id_multa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesas_veiculos1`
    FOREIGN KEY (`veiculos_id_veiculo`)
    REFERENCES `CFcamboriu`.`veiculos` (`id_veiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesas_licenciamentos1`
    FOREIGN KEY (`licenciamentos_id_doc`)
    REFERENCES `CFcamboriu`.`licenciamentos` (`id_doc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`usuarios` (
  `id_usuario` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `data_cadastro` VARCHAR(45) NOT NULL,
  `nivel` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `CFcamboriu`.`reservas` (
  `id_reserva` INT(11) NOT NULL AUTO_INCREMENT,
  `id_veiculo` INT(11) NOT NULL,
  `km_inicial` FLOAT(11) NOT NULL,
  `km_final` FLOAT(11) NULL DEFAULT NULL,
  `secretaria` VARCHAR(45) NOT NULL,
  `data_saida` DATETIME NOT NULL,
  `data_retorno` DATETIME NULL DEFAULT NULL,
  `funcionario` VARCHAR(45) NOT NULL,
  `tipo_reserva` VARCHAR(45) NOT NULL,
  `destino` VARCHAR(45) NULL DEFAULT NULL,
  `periodo_reservado` VARCHAR(45) NOT NULL,
  `id_condutor` INT(11) NULL DEFAULT NULL,
  `condicao` VARCHAR(45) NULL DEFAULT NULL,
  `id_user` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  INDEX `fk_tb_reserva_tb_veiculos1_idx` (`id_veiculo` ASC),
  INDEX `fk_reservas_condutores1_idx` (`id_condutor` ASC),
  CONSTRAINT `fk_tb_reserva_tb_veiculos1`
    FOREIGN KEY (`id_veiculo`)
    REFERENCES `CFcamboriu`.`veiculos` (`id_veiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservas_condutores1`
    FOREIGN KEY (`id_condutor`)
    REFERENCES `CFcamboriu`.`condutores` (`id_condutor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
