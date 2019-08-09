-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 10.12.23.70    Database: projetoquiz
-- ------------------------------------------------------
-- Server version	5.6.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `alun_id` int(11) NOT NULL AUTO_INCREMENT,
  `alun_nome` tinytext,
  `alun_cod` tinytext,
  `alun_descricao` tinytext,
  `alun_senha` tinytext,
  `alun_foto` varchar(45) DEFAULT NULL,
  `alun_email` varchar(50) DEFAULT NULL,
  `alun_nomecompleto` varchar(50) DEFAULT NULL,
  `alun_ativo` int(11) DEFAULT NULL,
  `alun_point` int(200) NOT NULL,
  PRIMARY KEY (`alun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (1,'Darius Out scape','#235468','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'dariu@gmail.com','darius de oliveira mello',NULL,0),(2,'Graves de Tulip','#184841','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'gravejenovaldo.com','graves machado da silva',NULL,0),(3,'Gustavo','#626262','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'gustsan@gmail.com','Gustavo de mello silva',NULL,0),(4,'Jackson Op.','#123155','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'JacksonOp@gmail.com','Jackson Op Turiano',NULL,0),(5,'Ana j.','#531511','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'AnaBatista@gmail.com','Ana Batista do Nascimento',NULL,0),(6,'Jessica Tui','#313511','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'JessicaTui@gmail.com','Jessica Tui Mendes da Costa',NULL,0),(7,'Everton Perreira','#153135','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'EvertonPerreira@gmail.com','Everton Faker',NULL,0),(8,'Larissa Giovana','#435121','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Lala@gmail.com','Larissa Giovana Fagundes',NULL,0),(9,'Bruna Otaviana','#354345','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Bruna.O.t.a@hotmail.com','Bruna Otaviana Barbosa',NULL,0),(10,'Bruno B.','#464644','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Bruno.mars@hotmail.com','Bruno Benedito de Melo',NULL,0),(11,'Bruno M.','#464564','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Bruno.Boid@hotmail.com','Bruno Moreira',NULL,0),(12,'Gabriel','#221412','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Gabriel.bel.bel@hotmail.com','Gabriel Barbosa',NULL,0),(13,'João Paulo','#351353','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Jp.JPPP@hotmail.com','João Paulo Felipe Silva',NULL,0),(14,'Lucas Perreira','#244213','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Lucasss@yahoo.com.br','Lucas Perreira jula',NULL,0),(15,'Rickson','#456454','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Ric.chich@yahoo.com','Rickson Mariano correa',NULL,0),(16,'Mateus H.','#592929','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Mateus@gmail.com','Mateus Henrique',NULL,0),(17,'Mateus Gabriel','#848485','asdkljasdklajsdkl','202cb962ac59075b964b07152d234b70',NULL,'Gabimarotosan@gmail.com','Mateus Gabriel ',NULL,0),(18,'Samuel Lucas','#492222','<p>asdasaddasd</p>\r\n','618aad2bca06e95d077b9d4ee9bcffc8',NULL,'samuellucas0603@gmail.com','Samuel Lucas Santos Gomes',1,0);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dicas`
--

DROP TABLE IF EXISTS `dicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dicas` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dicas`
--

LOCK TABLES `dicas` WRITE;
/*!40000 ALTER TABLE `dicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `dicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveldaquestao`
--

DROP TABLE IF EXISTS `niveldaquestao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveldaquestao` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveldaquestao`
--

LOCK TABLES `niveldaquestao` WRITE;
/*!40000 ALTER TABLE `niveldaquestao` DISABLE KEYS */;
/*!40000 ALTER TABLE `niveldaquestao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perguntas` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas`
--

LOCK TABLES `perguntas` WRITE;
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
INSERT INTO `perguntas` VALUES (14,'<p>Em uma loja de roupas s&atilde;o vendidas por dia 1500 roupas em 7 dias. Em quantos dias ser&atilde;o vendidas 200 roupas?</p>\r\n','<p>1</p>\r\n','<p>2</p>\r\n','<p>3</p>\r\n','<p>4</p>\r\n','Primeira opção','<p>Em uma loja de roupas s&atilde;o vendidas por dia 1500 roupas em 7 dias. Em quantos dias ser&atilde;o vendidas 200 roupas?</p>\r\n',6,3),(15,'<p>Numa churrascaria s&atilde;o assados 5 porcos, mas ao todo todos s&atilde;o 10. Assando-se 3 porcos para 50 pessoas, quanto porcos precisar&atilde;o para 250 pessoas?</p>\r\n','<p>5</p>\r\n','<p>25</p>\r\n','<p>15</p>\r\n','<p>10</p>\r\n','Segunda opção','',1,3),(16,'<p>Numa gr&aacute;fica existem 3 impressoras off set que funcionam ininterruptamente, 10 horas por dia, durante 4 dias, imprimindo 240.000 folhas. Tendo-se quebrado umas das impressoras e necessitando-se imprimir, em 6 dias, 480.000 folhas, quantas horas ','<p>2</p>\r\n','<p>10</p>\r\n','<p>5</p>\r\n','<p>20</p>\r\n','Quarda opção','<p>Pois 5.040 divididos por 240 o resultado &eacute;: 20</p>\r\n',6,3),(17,'<p>Aplicando R$ 500,00 na poupan&ccedil;a o valor dos juros em um m&ecirc;s seria de R$ 2,50. Caso seja aplicado R$ 2 100,00 no mesmo m&ecirc;s, qual seria o valor dos juros?</p>\r\n','<p>2,5</p>\r\n','<p>10,5</p>\r\n','<p>7,5</p>\r\n','<p>15,2</p>\r\n','Segunda opção','<p>asdasd</p>\r\n',4,3),(18,'<p>Uma usina produz 500 litros de &aacute;lcool com 6 000 kg de cana-de-a&ccedil;&uacute;car. Determine quantos litros de &aacute;lcool s&atilde;o produzidos com 15 000 kg de cana.</p>\r\n','<p>1250</p>\r\n','<p>250</p>\r\n','<p>1000</p>\r\n','<p>500</p>\r\n','Quarda opção','<p>asdasdasd</p>\r\n',2,3),(19,'<p>Uma equipe de 5 professores gastou 12 dias para corrigir as provas de um vestibular. Considerando a mesma propor&ccedil;&atilde;o, quantos dias levar&atilde;o 30 professores para corrigir as provas?</p>\r\n','<p>10</p>\r\n','<p>2</p>\r\n','<p>5</p>\r\n','<p>3</p>\r\n','Segunda opção','<p>asdsadad</p>\r\n',7,3),(20,'<p>Em uma panificadora s&atilde;o produzidos 90 p&atilde;es de 15 gramas cada um. Caso queira produzir p&atilde;es de 10 gramas, quantos iremos obter?</p>\r\n','<p>125</p>\r\n','<p>5</p>\r\n','<p>135</p>\r\n','<p>10</p>\r\n','Terceira opção','<p>asdas asd aw awdwadr&nbsp;</p>\r\n',7,3),(21,'<p>Um muro de 12 metros foi constru&iacute;do utilizando 2 160 tijolos. Caso queira construir um muro de 30 metros nas mesmas condi&ccedil;&otilde;es do anterior, quantos tijolos ser&atilde;o necess&aacute;rios?</p>\r\n','<p>2160</p>\r\n','<p>1600</p>\r\n','<p>1350</p>\r\n','<p>5400</p>\r\n','Segunda opção','<p>asdasd as as das asd</p>\r\n',8,3),(22,'<p>Usando um ferro el&eacute;trico 40 minutos por dia, durante 15 dias, o consumo de energia ser&aacute; de 8 kWh. Qual ser&aacute; o consumo do mesmo ferro el&eacute;trico se ele for usado 50 minutos por dia, durante 20 dias?</p>\r\n','<p>12,3</p>\r\n','<p>13,3</p>\r\n','<p>10,3</p>\r\n','<p>5,3</p>\r\n','Terceira opção','<p>sad asd asda s sdasd</p>\r\n',4,3),(23,'<p>Em 3 horas, no per&iacute;odo da manh&atilde;, 10 pessoas confeccionaram bandeirinhas para a festa junina da escola. &Agrave; tarde, 15 pessoas ir&atilde;o confeccionar o dobro de bandeirinhas. Quanto tempo levar&atilde;o para isso?</p>\r\n','<p>4</p>\r\n','<p>3</p>\r\n','<p>1</p>\r\n','<p>10</p>\r\n','Quarda opção','<p>asdasd as a sdas d</p>\r\n',4,3),(24,'<p>Observe a express&atilde;o num&eacute;rica: 15+34-93:3.(4+7) O que deve ser feito primeiro?</p>\r\n','<p>Adi&ccedil;&atilde;o (+)</p>\r\n','<p>Subtra&ccedil;&atilde;o (-)</p>\r\n','<p>Divis&atilde;o (:)</p>\r\n','<p>Parenteses</p>\r\n','Terceira opção','<p>asdasd asd as as asd</p>\r\n',2,3),(25,'<p>Qual dos n&uacute;meros a seguir N&Atilde;O &eacute; um n&uacute;mero primo?</p>\r\n','<p>2</p>\r\n','<p>5</p>\r\n','<p>9</p>\r\n','<p>14</p>\r\n','Primeira opção','<p>asdasdasdad</p>\r\n',4,3);
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perguntas_has_quiz`
--

DROP TABLE IF EXISTS `perguntas_has_quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perguntas_has_quiz` (
  `Perguntas_perg_id` int(11) NOT NULL,
  `Quiz_quiz_id` int(11) NOT NULL,
  `Quiz_Professor_prof_id` int(11) NOT NULL,
  PRIMARY KEY (`Perguntas_perg_id`,`Quiz_quiz_id`,`Quiz_Professor_prof_id`),
  KEY `fk_Perguntas_has_Quiz_Quiz1_idx` (`Quiz_quiz_id`,`Quiz_Professor_prof_id`),
  KEY `fk_Perguntas_has_Quiz_Perguntas1_idx` (`Perguntas_perg_id`),
  CONSTRAINT `fk_Perguntas_has_Quiz_Perguntas1` FOREIGN KEY (`Perguntas_perg_id`) REFERENCES `perguntas` (`perg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Perguntas_has_Quiz_Quiz1` FOREIGN KEY (`Quiz_quiz_id`, `Quiz_Professor_prof_id`) REFERENCES `quiz` (`quiz_id`, `Professor_prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas_has_quiz`
--

LOCK TABLES `perguntas_has_quiz` WRITE;
/*!40000 ALTER TABLE `perguntas_has_quiz` DISABLE KEYS */;
/*!40000 ALTER TABLE `perguntas_has_quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (3,'Samuel Lucas','618aad2bca06e95d077b9d4ee9bcffc8','samuellucas0603@gmail.com','<p>asdsasd</p>\r\n',NULL,'Samuel Lucas Santos Gomes',1);
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_nome` tinytext,
  `quiz_descricao` varchar(45) DEFAULT NULL,
  `Professor_prof_id` int(11) NOT NULL,
  PRIMARY KEY (`quiz_id`,`Professor_prof_id`),
  KEY `fk_Quiz_Professor1_idx` (`Professor_prof_id`),
  CONSTRAINT `fk_Quiz_Professor1` FOREIGN KEY (`Professor_prof_id`) REFERENCES `professor` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (8,'Teste do Teste 1','<p>asdasdasd</p>\r\n',3),(9,'asdasdasdasdasdasdasd','<p>This is my textarea to be replaced with CK',3),(10,'l.as p asdçlçlç sadsd','<p>asd&ccedil;a~sld&ccedil;as~dl This is my t',3),(11,'sadasd','<p>This is my textarea to be replaced with CK',3),(12,'Matemática Computacional','<p>A&nbsp;<strong>matem&aacute;tica computaci',3);
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_has_sala`
--

DROP TABLE IF EXISTS `quiz_has_sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_has_sala` (
  `quiz_quiz_id` int(11) NOT NULL,
  `sala_sala_id` int(11) NOT NULL,
  `quiz_sala_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`quiz_sala_id`),
  KEY `fk_quiz_has_sala_sala1_idx` (`sala_sala_id`),
  KEY `fk_quiz_has_sala_quiz1_idx` (`quiz_quiz_id`),
  CONSTRAINT `fk_quiz_has_sala_quiz1` FOREIGN KEY (`quiz_quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_quiz_has_sala_sala1` FOREIGN KEY (`sala_sala_id`) REFERENCES `sala` (`sala_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_has_sala`
--

LOCK TABLES `quiz_has_sala` WRITE;
/*!40000 ALTER TABLE `quiz_has_sala` DISABLE KEYS */;
INSERT INTO `quiz_has_sala` VALUES (12,6,1),(8,6,2);
/*!40000 ALTER TABLE `quiz_has_sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostas`
--

DROP TABLE IF EXISTS `respostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respostas` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostas`
--

LOCK TABLES `respostas` WRITE;
/*!40000 ALTER TABLE `respostas` DISABLE KEYS */;
/*!40000 ALTER TABLE `respostas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sala` (
  `sala_id` int(11) NOT NULL AUTO_INCREMENT,
  `sala_nome` tinytext,
  `sala_descricao` tinytext,
  `professor_prof_id` int(11) NOT NULL,
  PRIMARY KEY (`sala_id`,`professor_prof_id`),
  KEY `fk_sala_professor1_idx` (`professor_prof_id`),
  CONSTRAINT `fk_sala_professor1` FOREIGN KEY (`professor_prof_id`) REFERENCES `professor` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (1,'Comp5','<p>Teste</p>\r\n',3);
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala_has_aluno`
--

DROP TABLE IF EXISTS `sala_has_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sala_has_aluno` (
  `sala_sala_id` int(11) NOT NULL,
  `aluno_alun_id` int(11) NOT NULL,
  PRIMARY KEY (`sala_sala_id`,`aluno_alun_id`),
  KEY `fk_sala_has_aluno_aluno1_idx` (`aluno_alun_id`),
  KEY `fk_sala_has_aluno_sala1_idx` (`sala_sala_id`),
  CONSTRAINT `fk_sala_has_aluno_aluno1` FOREIGN KEY (`aluno_alun_id`) REFERENCES `aluno` (`alun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sala_has_aluno_sala1` FOREIGN KEY (`sala_sala_id`) REFERENCES `sala` (`sala_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala_has_aluno`
--

LOCK TABLES `sala_has_aluno` WRITE;
/*!40000 ALTER TABLE `sala_has_aluno` DISABLE KEYS */;
INSERT INTO `sala_has_aluno` VALUES (4,3),(4,18),(6,18);
/*!40000 ALTER TABLE `sala_has_aluno` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-09 12:34:59
