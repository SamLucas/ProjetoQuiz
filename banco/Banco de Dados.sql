-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.30-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projetoquiz
CREATE DATABASE IF NOT EXISTS `projetoquiz` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `projetoquiz`;

-- Copiando estrutura para tabela projetoquiz.aluno
CREATE TABLE IF NOT EXISTS `aluno` (
  `alun_id` int(11) NOT NULL AUTO_INCREMENT,
  `alun_nome` tinytext,
  `alun_cod` tinytext,
  `alun_descricao` tinytext,
  `alun_senha` tinytext,
  `alun_foto` varchar(45) DEFAULT NULL,
  `alun_email` varchar(50) DEFAULT NULL,
  `alun_nomecompleto` varchar(50) DEFAULT NULL,
  `alun_ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`alun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela projetoquiz.dicas
CREATE TABLE IF NOT EXISTS `dicas` (
  `dicas_id` int(11) NOT NULL AUTO_INCREMENT,
  `dicas_quantidade` varchar(45) DEFAULT NULL,
  `alun_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  PRIMARY KEY (`dicas_id`,`alun_id`,`quiz_id`),
  KEY `fk_Dicas_Aluno1_idx` (`alun_id`),
  KEY `fk_Dicas_Quiz1_idx` (`quiz_id`),
  CONSTRAINT `fk_Dicas_Aluno1` FOREIGN KEY (`alun_id`) REFERENCES `aluno` (`alun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dicas_Quiz1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela projetoquiz.niveldaquestao
CREATE TABLE IF NOT EXISTS `niveldaquestao` (
  `nvl_id` int(11) NOT NULL AUTO_INCREMENT,
  `nvl_nivel` int(11) DEFAULT NULL,
  `perg_id` int(11) NOT NULL,
  `alun_id` int(11) NOT NULL,
  PRIMARY KEY (`nvl_id`,`perg_id`,`alun_id`),
  KEY `fk_NivelDaQuestao_Perguntas1_idx` (`perg_id`),
  KEY `fk_NivelDaQuestao_Aluno1_idx` (`alun_id`),
  CONSTRAINT `fk_NivelDaQuestao_Aluno1` FOREIGN KEY (`alun_id`) REFERENCES `aluno` (`alun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_NivelDaQuestao_Perguntas1` FOREIGN KEY (`perg_id`) REFERENCES `perguntas` (`perg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela projetoquiz.perguntas
CREATE TABLE IF NOT EXISTS `perguntas` (
  `perg_id` int(11) NOT NULL AUTO_INCREMENT,
  `perg_descricao` tinytext,
  `perg_op1` tinytext,
  `perg_op2` tinytext,
  `perg_op3` tinytext,
  `perg_op4` tinytext,
  `perg_accepted` tinytext,
  `perg_dica` tinytext,
  `perg_nvl` int(11) DEFAULT NULL,
  `prof_id` int(11) NOT NULL,
  PRIMARY KEY (`perg_id`,`prof_id`),
  KEY `fk_perguntas_professor1_idx` (`prof_id`),
  CONSTRAINT `fk_perguntas_professor1` FOREIGN KEY (`prof_id`) REFERENCES `professor` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela projetoquiz.perguntas_has_quiz
CREATE TABLE IF NOT EXISTS `perguntas_has_quiz` (
  `Perguntas_perg_id` int(11) NOT NULL,
  `Quiz_quiz_id` int(11) NOT NULL,
  `Quiz_Professor_prof_id` int(11) NOT NULL,
  PRIMARY KEY (`Perguntas_perg_id`,`Quiz_quiz_id`,`Quiz_Professor_prof_id`),
  KEY `fk_Perguntas_has_Quiz_Quiz1_idx` (`Quiz_quiz_id`,`Quiz_Professor_prof_id`),
  KEY `fk_Perguntas_has_Quiz_Perguntas1_idx` (`Perguntas_perg_id`),
  CONSTRAINT `fk_Perguntas_has_Quiz_Perguntas1` FOREIGN KEY (`Perguntas_perg_id`) REFERENCES `perguntas` (`perg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Perguntas_has_Quiz_Quiz1` FOREIGN KEY (`Quiz_quiz_id`, `Quiz_Professor_prof_id`) REFERENCES `quiz` (`quiz_id`, `Professor_prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela projetoquiz.professor
CREATE TABLE IF NOT EXISTS `professor` (
  `prof_id` int(11) NOT NULL AUTO_INCREMENT,
  `prof_nome` tinytext,
  `prof_senha` tinytext,
  `prof_email` tinytext,
  `prof_descricao` tinytext,
  `prof_foto` tinytext,
  `prof_nomecompleto` tinytext,
  `prof_ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`prof_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela projetoquiz.quiz
CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_nome` tinytext,
  `quiz_descricao` varchar(45) DEFAULT NULL,
  `Professor_prof_id` int(11) NOT NULL,
  PRIMARY KEY (`quiz_id`,`Professor_prof_id`),
  KEY `fk_Quiz_Professor1_idx` (`Professor_prof_id`),
  CONSTRAINT `fk_Quiz_Professor1` FOREIGN KEY (`Professor_prof_id`) REFERENCES `professor` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela projetoquiz.respostas
CREATE TABLE IF NOT EXISTS `respostas` (
  `resp_id` int(11) NOT NULL AUTO_INCREMENT,
  `resp_accepted` int(11) DEFAULT NULL,
  `alun_id` int(11) NOT NULL,
  `perg_id` int(11) NOT NULL,
  `perg_feedback` tinytext,
  PRIMARY KEY (`resp_id`,`alun_id`,`perg_id`),
  KEY `fk_Respostas_Aluno1_idx` (`alun_id`),
  KEY `fk_Respostas_Perguntas1_idx` (`perg_id`),
  CONSTRAINT `fk_Respostas_Aluno1` FOREIGN KEY (`alun_id`) REFERENCES `aluno` (`alun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Respostas_Perguntas1` FOREIGN KEY (`perg_id`) REFERENCES `perguntas` (`perg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela projetoquiz.sala
CREATE TABLE IF NOT EXISTS `sala` (
  `sala_id` int(11) NOT NULL AUTO_INCREMENT,
  `sala_nome` tinytext,
  `sala_descricao` tinytext,
  `professor_prof_id` int(11) NOT NULL,
  PRIMARY KEY (`sala_id`,`professor_prof_id`),
  KEY `fk_sala_professor1_idx` (`professor_prof_id`),
  CONSTRAINT `fk_sala_professor1` FOREIGN KEY (`professor_prof_id`) REFERENCES `professor` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela projetoquiz.sala_has_aluno
CREATE TABLE IF NOT EXISTS `sala_has_aluno` (
  `sala_sala_id` int(11) NOT NULL,
  `aluno_alun_id` int(11) NOT NULL,
  PRIMARY KEY (`sala_sala_id`,`aluno_alun_id`),
  KEY `fk_sala_has_aluno_aluno1_idx` (`aluno_alun_id`),
  KEY `fk_sala_has_aluno_sala1_idx` (`sala_sala_id`),
  CONSTRAINT `fk_sala_has_aluno_aluno1` FOREIGN KEY (`aluno_alun_id`) REFERENCES `aluno` (`alun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sala_has_aluno_sala1` FOREIGN KEY (`sala_sala_id`) REFERENCES `sala` (`sala_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
