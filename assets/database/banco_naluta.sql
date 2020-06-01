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
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` text NOT NULL,
  `fk_c_usuario` int(11) NOT NULL,
  `fk_c_projeto` int(11) NOT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `escolaridade`
--

DROP TABLE IF EXISTS `escolaridade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `escolaridade` (
  `id_escolaridade` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `instituicao` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `ano_inicio` varchar(4) NOT NULL,
  `ano_fim` varchar(4) NOT NULL,
  `fk_e_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_escolaridade`),
  KEY `fk_e_usuario_idx` (`fk_e_usuario`),
  CONSTRAINT `fk_e_usuario` FOREIGN KEY (`fk_e_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `imagem` varchar(45) DEFAULT NULL,
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
  `id_usuario` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `valido` varchar(45) NOT NULL DEFAULT 'S',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
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
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `descricao` text,
  `pontuacao` int(11) NOT NULL,
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
  `imagem` varchar(45) DEFAULT NULL,
  `biografia` text,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario_projeto`
--

DROP TABLE IF EXISTS `usuario_projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_projeto` (
  `id_usuario_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `fk_up_projeto` int(11) NOT NULL,
  `fk_up_usuario` int(11) NOT NULL,
  `contribuicao` varchar(100) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario_projeto`),
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

-- Dump completed on 2020-06-01 18:06:06
