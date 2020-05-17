-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: projeto_pa
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `classificacao_projeto`
--

DROP TABLE IF EXISTS `classificacao_projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classificacao_projeto` (
  `classificacao` varchar(45) NOT NULL,
  `fk_cp_projeto` int(11) NOT NULL,
  KEY `id_projeto_idx` (`fk_cp_projeto`),
  CONSTRAINT `fk_cp_projeto` FOREIGN KEY (`fk_cp_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `curso_instituicao`
--

DROP TABLE IF EXISTS `curso_instituicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curso_instituicao` (
  `fk_ci_curso` int(11) NOT NULL,
  `fk_ci_instituicao` int(11) NOT NULL,
  KEY `fk_ci_curso_idx` (`fk_ci_curso`),
  KEY `fk_ci_instituicao_idx` (`fk_ci_instituicao`),
  CONSTRAINT `fk_ci_curso` FOREIGN KEY (`fk_ci_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ci_instituicao` FOREIGN KEY (`fk_ci_instituicao`) REFERENCES `instituicao` (`id_instituicao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `escolaridade`
--

DROP TABLE IF EXISTS `escolaridade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `escolaridade` (
  `id_escolaridade` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_escolaridade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `instituicao`
--

DROP TABLE IF EXISTS `instituicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instituicao` (
  `id_instituicao` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_instituicao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `projeto`
--

DROP TABLE IF EXISTS `projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `descricao` text,
  `num_pessoas` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `fk_p_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `fk_p_usuario_idx` (`fk_p_usuario`),
  CONSTRAINT `fk_p_usuario` FOREIGN KEY (`fk_p_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recuperacao`
--

DROP TABLE IF EXISTS `recuperacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recuperacao` (
  `usuario` int(11) NOT NULL,
  `validador` varchar(60) NOT NULL,
  `expiracao` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_projeto`
--

DROP TABLE IF EXISTS `tipo_projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_projeto` (
  `tipo` varchar(45) NOT NULL,
  `fk_tp_projeto` int(11) NOT NULL,
  KEY `fk_tp_projeto_idx` (`fk_tp_projeto`),
  CONSTRAINT `fk_tp_projeto` FOREIGN KEY (`fk_tp_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `nascimento` date NOT NULL,
  `fk_u_escolaridade` int(11) DEFAULT NULL,
  `descricao` text,
  `habilidade` varchar(200) DEFAULT NULL,
  `curso_extra` varchar(200) DEFAULT NULL,
  `pontuacao` int(11) NOT NULL,
  `num_rank` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `capa` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `instagram` varchar(20) DEFAULT NULL,
  `twitter` varchar(20) DEFAULT NULL,
  `linkedin` varchar(20) DEFAULT NULL,
  `facebook` varchar(20) DEFAULT NULL,
  `github` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_escolaridade_idx` (`fk_u_escolaridade`),
  CONSTRAINT `fk_u_escolaridade` FOREIGN KEY (`fk_u_escolaridade`) REFERENCES `escolaridade` (`id_escolaridade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario_curso_instituicao`
--

DROP TABLE IF EXISTS `usuario_curso_instituicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_curso_instituicao` (
  `fk_uci_usuario` int(11) NOT NULL,
  `fk_uci_curso` int(11) NOT NULL,
  `fk_uci_instituicao` int(11) NOT NULL,
  KEY `fk_uci_usuario_idx` (`fk_uci_usuario`),
  KEY `fk_uci_curso_idx` (`fk_uci_curso`),
  KEY `fk_uci_instituicao_idx` (`fk_uci_instituicao`),
  CONSTRAINT `fk_uci_curso` FOREIGN KEY (`fk_uci_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_uci_instituicao` FOREIGN KEY (`fk_uci_instituicao`) REFERENCES `instituicao` (`id_instituicao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_uci_usuario` FOREIGN KEY (`fk_uci_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario_projeto`
--

DROP TABLE IF EXISTS `usuario_projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_projeto` (
  `fk_up_projeto` int(11) NOT NULL,
  `fk_up_usuario` int(11) NOT NULL,
  `contribuicao` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL,
  KEY `id_projeto_idx` (`fk_up_projeto`),
  KEY `fk_up_usuario_idx` (`fk_up_usuario`),
  CONSTRAINT `fk_up_projeto` FOREIGN KEY (`fk_up_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_up_usuario` FOREIGN KEY (`fk_up_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-16 22:20:02
