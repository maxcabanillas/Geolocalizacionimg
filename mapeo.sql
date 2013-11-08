CREATE DATABASE  IF NOT EXISTS `mapeo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mapeo`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: mapeo
-- ------------------------------------------------------
-- Server version	5.5.8-log

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
-- Table structure for table `bardas`
--

DROP TABLE IF EXISTS `bardas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bardas` (
  `idBarda` int(11) NOT NULL AUTO_INCREMENT,
  `idCiudades` int(11) DEFAULT NULL,
  `Clave` varchar(45) DEFAULT NULL,
  `Lado` varchar(45) DEFAULT NULL,
  `Latitud` varchar(45) DEFAULT NULL,
  `Longitud` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Vsibilidad` varchar(45) DEFAULT NULL,
  `Pasovehicular` varchar(45) DEFAULT NULL,
  `Observaciones` varchar(45) DEFAULT NULL,
  `Icono` varchar(45) DEFAULT 'img/pines/barda.png',
  `Medidas` varchar(45) DEFAULT NULL,
  `Foto` longtext,
  `Activo` int(11) DEFAULT '1',
  `idcampanas` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBarda`),
  KEY `idciudad_idx` (`idCiudades`),
  KEY `idcampana` (`idcampanas`),
  CONSTRAINT `idcampana` FOREIGN KEY (`idcampanas`) REFERENCES `campanas` (`idcampanas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idCiudades` FOREIGN KEY (`idCiudades`) REFERENCES `ciudades` (`idciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bardas`
--

LOCK TABLES `bardas` WRITE;
/*!40000 ALTER TABLE `bardas` DISABLE KEYS */;
INSERT INTO `bardas` VALUES (1,42,'MURO 1','LADO A','21.140833333333','-101.68333333333','CARR. GUANAJUATO SALIDA A DOLORES HIDALGO KM ','BUENA','BUENA','LE TAPA LA VISIBILIDAD UNOS HUIZACHES.','img/pines/barda.png','6.50 X 2.80 ','img/uploads/reales/espectaculares/16.jpg',1,1),(2,42,'MURO 1','LADO B',NULL,NULL,'CARR. GUANAJUATO SALIDA A DOLORES HIDALGO KM ','REGULAR','REGULAR',NULL,'img/pines/barda.png','6.50 X 2.80 ',NULL,1,2),(3,42,'MURO 2','UNA VISTA',NULL,NULL,'CARR. GUANAJUATO DOLORES HIDALGO KM 7','REGULAR','REGULAR','LE TAPA LA VISTA UN HUIZACHE.','img/pines/barda.png','3.53 X 2.30',NULL,1,3),(4,42,'MURO 3','LADO A',NULL,NULL,'CARR. GUANAJUATO SALIDA A SAN MIGUEL DE ALLEN','REGULAR','REGULAR','LE FALTA LAMINA CON CLAVE DE PROP DE GOB Y PU','img/pines/barda.png','4.00 X 2.16',NULL,1,4),(5,42,'MURO 3','LADO B',NULL,NULL,'CARR. GUANAJUATO SALIDA A SAN MIGUEL DE ALLEN','MALA','MALA','LE FALTA LAMINA CON CLAVE DE PROP DE GOB Y PU','img/pines/barda.png','4.00 X 2.16',NULL,1,5),(6,42,'MURO 4','LADO A',NULL,NULL,'CARR. GTO. SALIDA A SAN MIGUEL DE ALLENDE KM.','BUENA','BUENA','FALTA PINTURA ','img/pines/barda.png','4.04 X 2.36',NULL,1,6),(7,42,'MURO 4','LADO B',NULL,NULL,'CARR. GTO. SALIDA A SAN MIGUEL DE ALLENDE KM.','BUENA','BUENA','FALTA PINTURA ','img/pines/barda.png','4.04 X 2.36',NULL,1,7),(8,42,'MURO 5','LADO A',NULL,NULL,'CARR. LIBRE GTO SILAO KM .7 ANTES DE LA DESVI','BUENA','BUENA','','img/pines/barda.png','3.92 X 2.40',NULL,1,8),(9,42,'MURO 5','LADO B',NULL,NULL,'CARR. LIBRE GTO SILAO KM .7 ANTES DE LA DESVI','BUENA','BUENA',NULL,'img/pines/barda.png','3.92 X 2.40',NULL,1,9),(10,42,'MURO 6','LADO A',NULL,NULL,'CARR. GTO SILAO KM 9 JUNTO A MATERIALES SAN A','REGULAR','REGULAR','TAPAN UNOS PINOS, PONERLE LAMINA DE PROPIEDAD','img/pines/barda.png','4.12 X 2.27',NULL,1,10),(11,42,'MURO 6','LADO B',NULL,NULL,'CARR. GTO SILAO KM 9 JUNTO A MATERIALES SAN A','REGULAR','REGULAR','TAPAN UNOS PINOS','img/pines/barda.png','4.12 X 2.27',NULL,1,11),(12,42,'MURO 7','LADO A',NULL,NULL,'CARR. LIBRE GTO SILAO FRENTE AL RESTAURANT CA','REGULAR','REGULAR','CORTAR PASTO','img/pines/barda.png','6.50 X 2.30',NULL,1,12),(13,42,'MURO 7','LADO B',NULL,NULL,'CARR. LIBRE GTO SILAO FRENTE AL RESTAURANT CA','REGULAR','REGULAR','CORTAR PASTO','img/pines/barda.png','6.50 X 2.30',NULL,1,13),(14,42,'MURO 8','LADO A',NULL,NULL,'CARR. LIBRE GTO SILAO A 100 MTS DESPUES DEL R','BUENA','REGULAR','CORTAR PASTO','img/pines/barda.png','4.12 X 2.38',NULL,1,14),(15,42,'MURO 8','LADO B',NULL,NULL,'CARR. LIBRE GTO SILAO A 100 MTS DESPUES DEL R','REGULAR',NULL,'PONERLE LETRERO DE PROPIEDAD DEL GOB. DEL EDO','img/pines/barda.png','4.12 X 2.38',NULL,1,15),(16,42,'MURO 9','LADO A',NULL,NULL,'CARR. LIBRE GTO SILAO KM .5 ANTES DE LA EXPO ','REGULAR','REGULAR','CORTAR PASTO','img/pines/barda.png','4.05 X 2.44',NULL,1,16),(17,42,'MURO 9','LADO B',NULL,NULL,'CARR. LIBRE GTO SILAO KM .5 ANTES DE LA EXPO ','REGULAR',NULL,'CORTAR PASTO','img/pines/barda.png','4.05 X 2.44',NULL,1,17),(18,42,'MURO 10','LADO A',NULL,NULL,'CARR. LIBRE GTO SILAO DESPUES DE LA DESVIACIO','BUENA','REGULAR','CORTAR HIERBAS','img/pines/barda.png','4.06 X 2.40',NULL,1,18),(19,42,'MURO 10','LADO B',NULL,NULL,'CARR. LIBRE GTO SILAO DESPUES DE LA DESVIACIO','BUENA','REGULAR','CORTAR HIERBAS ','img/pines/barda.png','4.06 X 2.40',NULL,1,19),(20,42,'MURO 11','LADO A',NULL,NULL,'CARR. SANTA TERESA IRAPUATO KM. 2 A 500 MTS D','REGULAR','REGULAR','CORTAR PASTO','img/pines/barda.png','2.30 X 4.07',NULL,1,20),(21,42,'MURO 11','LADO B',NULL,NULL,'CARR. SANTA TERESA IRAPUATO KM. 2 A 500 MTS D','REGULAR','REGULAR','CORTAR PASTO','img/pines/barda.png','2.30 X 4.07',NULL,1,21),(22,42,'MURO 12','LADO A',NULL,NULL,'CARR.SANTA TERESA - IRAPUATO DESVIACION A LA ','BUENA',NULL,'','img/pines/barda.png','2.30 X 4.07',NULL,1,22),(23,42,'MURO 12','LADO B',NULL,NULL,'CARR.SANTA TERESA - IRAPUATO DESVIACION A LA ','BUENA',NULL,NULL,'img/pines/barda.png','2.30 X 4.07',NULL,1,23),(24,47,'DH-01',NULL,NULL,NULL,'DOLORES HIDALGO DESVIACION PARA LA CENTRAL CA','BUENA',NULL,'CONDICIONES MALAS FALTA PINTURA','img/pines/barda.png',NULL,NULL,1,24),(25,78,'MURO 3','LADO A ',NULL,NULL,'CARR. VALLE DE SANTIAGO SALAMANCA, DESVIACION','BUENA','BUENA',NULL,'img/pines/barda.png','10.40 X 2.80',NULL,1,25),(26,78,'MURO 3','LADO B',NULL,NULL,'CARR. VALLE DE SANTIAGO SALAMANCA, DESVIACION','MALA','',NULL,'img/pines/barda.png','10.40 X 2.80',NULL,1,26),(27,78,'MURO 2','LADO A',NULL,NULL,'CARR. SALAMANCA VALLE DESPUES DE LA DESVIACIO',NULL,NULL,'CORTAR HIERBA','img/pines/barda.png','10.12 X 4.90',NULL,1,27),(28,78,'MURO 2','LADO B',NULL,NULL,'CARR. SALAMANCA VALLE DESPUES DE LA DESVIACIO',NULL,NULL,'CORTAR HIERBA','img/pines/barda.png','10.12 X 4.90',NULL,1,28);
/*!40000 ALTER TABLE `bardas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vigencia`
--

DROP TABLE IF EXISTS `vigencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vigencia` (
  `idvigencia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `idcampana` int(11) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idvigencia`),
  KEY `idcampanas` (`idcampana`),
  CONSTRAINT `idcampanas` FOREIGN KEY (`idcampana`) REFERENCES `campanas` (`idcampanas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vigencia`
--

LOCK TABLES `vigencia` WRITE;
/*!40000 ALTER TABLE `vigencia` DISABLE KEYS */;
INSERT INTO `vigencia` VALUES (1,'0000-00-00','0000-00-00',1,1),(2,'0000-00-00','0000-00-00',1,1),(3,'0000-00-00','0000-00-00',1,1),(4,'0000-00-00','0000-00-00',1,1),(5,'0000-00-00','0000-00-00',1,1),(6,'0000-00-00','0000-00-00',1,1),(7,'0000-00-00','0000-00-00',1,1),(8,'0000-00-00','0000-00-00',1,1),(9,'0000-00-00','0000-00-00',1,1),(10,'0000-00-00','0000-00-00',1,1),(11,'0000-00-00','0000-00-00',1,1),(12,'0000-00-00','0000-00-00',1,1),(13,'0000-00-00','0000-00-00',1,1),(14,'0000-00-00','0000-00-00',1,1),(15,'0000-00-00','0000-00-00',1,1),(16,'0000-00-00','0000-00-00',2,1),(17,'0000-00-00','0000-00-00',2,1),(18,'2013-08-01','2013-08-31',2,1),(19,'2013-08-01','2013-08-31',2,1),(20,'0000-00-00','0000-00-00',2,1),(21,'0000-00-00','0000-00-00',2,1),(22,'0000-00-00','0000-00-00',2,1),(23,'2013-10-01','2013-11-30',3,1),(24,'2013-10-01','2013-11-30',3,1),(25,'2013-10-01','2013-11-30',3,1),(26,'2013-10-01','2013-10-15',3,1),(27,'2013-10-01','2013-11-30',3,1),(28,'2013-10-01','2013-11-30',3,1),(29,'2013-10-01','2013-11-30',3,1),(30,'2013-08-01','2013-09-15',4,1),(31,'2013-09-01','2013-09-15',4,1),(32,'2013-09-15','2013-11-15',5,1),(33,'2013-09-15','2013-11-15',5,1),(34,'2013-09-15','2013-11-15',5,1),(35,'2013-08-01','2013-10-17',5,1),(36,'2013-09-15','2013-11-15',5,1),(37,'2013-09-15','2013-11-15',5,1),(38,'2013-09-15','2013-11-15',5,1),(39,'2013-10-07','2013-10-27',6,1),(40,'0000-00-00','0000-00-00',7,1),(41,'2013-08-01','2013-08-30',8,1),(42,'2013-08-01','2013-08-30',8,1),(43,'2013-08-01','2013-08-30',8,1),(44,'2013-08-01','2013-08-30',8,1),(45,'2013-08-01','2013-08-30',8,1),(46,'2013-08-01','2013-08-30',8,1),(47,'2013-08-01','2013-08-30',8,1),(48,'2013-08-01','2013-08-30',8,1),(49,'2013-09-01','2013-12-31',9,1),(50,'2013-10-13','2013-11-04',9,1),(51,'2013-10-11','2013-11-12',9,1),(52,'2013-10-11','2013-11-12',9,1),(53,'2013-10-11','2013-11-12',9,1),(54,'2013-10-01','2013-11-02',9,1),(55,'2013-10-01','2013-11-02',9,1),(56,'2013-10-01','2013-11-02',9,1),(57,'2013-09-01','2013-12-31',10,1),(58,'2013-09-01','2013-12-31',10,1),(59,'2013-08-01','2013-10-09',10,1),(60,'2013-08-31','0000-00-00',10,1),(61,'0000-00-00','0000-00-00',10,1),(62,'2013-09-01','2013-12-31',10,1),(63,'0000-00-00','0000-00-00',10,1),(64,'0000-00-00','0000-00-00',10,1),(65,'0000-00-00','0000-00-00',10,1),(66,'0000-00-00','0000-00-00',10,1),(67,'0000-00-00','0000-00-00',10,1),(68,'0000-00-00','0000-00-00',10,1),(69,'0000-00-00','0000-00-00',10,1),(70,'0000-00-00','0000-00-00',10,1),(71,'0000-00-00','0000-00-00',10,1),(72,'0000-00-00','0000-00-00',10,1),(73,'0000-00-00','0000-00-00',10,1),(74,'0000-00-00','0000-00-00',10,1),(75,'0000-00-00','0000-00-00',10,1),(76,'0000-00-00','0000-00-00',10,1),(77,'0000-00-00','0000-00-00',10,1),(78,'0000-00-00','0000-00-00',10,1),(79,'0000-00-00','0000-00-00',10,1),(80,'0000-00-00','0000-00-00',11,1),(81,'2013-08-01','2013-08-31',11,1),(82,'0000-00-00','0000-00-00',11,1),(83,'0000-00-00','0000-00-00',11,1),(84,'0000-00-00','0000-00-00',11,1),(85,'2013-09-01','2013-09-30',11,1),(86,'0000-00-00','0000-00-00',11,1),(87,'0000-00-00','0000-00-00',11,1),(88,'0000-00-00','0000-00-00',11,1),(89,'0000-00-00','0000-00-00',11,1),(90,'0000-00-00','0000-00-00',11,1),(91,'0000-00-00','0000-00-00',11,1),(92,'0000-00-00','0000-00-00',11,1),(93,'0000-00-00','0000-00-00',11,1),(94,'0000-00-00','0000-00-00',11,1),(95,'0000-00-00','0000-00-00',11,1),(96,'0000-00-00','0000-00-00',11,1),(97,'2013-09-15','2013-11-15',12,1),(98,'2013-09-15','2013-11-15',12,1),(99,'2013-09-15','2013-11-15',12,1),(100,'2013-10-10','2013-10-21',12,1),(101,'2013-09-15','2013-12-31',12,1),(102,'0000-00-00','0000-00-00',13,1),(103,'0000-00-00','0000-00-00',15,1),(112,'2013-11-04','2013-11-16',15,1),(116,'2013-09-06','2013-11-01',16,1),(117,'0000-00-00','0000-00-00',17,1),(118,'2013-10-01','2013-10-05',18,1),(119,'2013-10-01','2013-10-05',18,1),(120,'2013-10-01','2013-10-05',18,1),(121,'2013-08-17','2013-08-31',19,1),(122,'0000-00-00','0000-00-00',20,1),(123,'0000-00-00','0000-00-00',21,1),(124,'0000-00-00','0000-00-00',22,1),(125,'0000-00-00','0000-00-00',22,1),(126,'0000-00-00','0000-00-00',24,1),(127,'0000-00-00','0000-00-00',24,1),(128,'0000-00-00','0000-00-00',24,1),(129,'0000-00-00','0000-00-00',24,1),(130,'0000-00-00','0000-00-00',24,1),(131,'2013-10-01','2013-11-02',24,1),(132,'2013-08-01','2013-08-30',27,1),(133,'2013-08-01','2013-08-30',27,1),(135,'0000-00-00','0000-00-00',28,1),(136,'0000-00-00','0000-00-00',28,1),(137,'0000-00-00','0000-00-00',32,1),(138,'0000-00-00','0000-00-00',32,1),(139,'0000-00-00','0000-00-00',29,1),(140,'0000-00-00','0000-00-00',30,1);
/*!40000 ALTER TABLE `vigencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campanas`
--

DROP TABLE IF EXISTS `campanas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campanas` (
  `idcampanas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext,
  `observaciones` longtext,
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcampanas`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campanas`
--

LOCK TABLES `campanas` WRITE;
/*!40000 ALTER TABLE `campanas` DISABLE KEYS */;
INSERT INTO `campanas` VALUES (1,'Generica',NULL,1),(2,'10 Acciones ',NULL,1),(3,'Guanajuato Gana Empleos',NULL,1),(4,'Campana Mujer',NULL,1),(5,'Programa de Arranque de Escuela de Formacion Deportiva',NULL,1),(6,'Universidad de Guanajuato Festival Cervantino ',NULL,1),(7,'Vinil Logotipo',NULL,1),(8,'Comision Estatal del Agual XIX Expo Agua 2013',NULL,1),(9,'Festival Cervantino',NULL,1),(10,'Las Mejores Obras Donde Se Necesitan',NULL,1),(11,'Mas Obras en Educacion',NULL,1),(12,'Prestamo Ecologia',NULL,1),(13,'Generica Vinil',NULL,1),(14,'Vinil Mas Obras en Educacion',NULL,1),(15,'CECYTEG Silao',NULL,1),(16,'Las Hilamas Prestamo a CODE',NULL,1),(17,'Macro Centro Leon',NULL,1),(18,'Prestamo a Municipio de Leon',NULL,1),(19,'GIFF',NULL,1),(20,'Guanajuato Va Por Los Valores',NULL,1),(21,'Rodolfo DIF',NULL,1),(22,'No Extorcion',NULL,1),(23,'Centro Zumar Celaya',NULL,1),(24,'Mejoramiento de Vivienda',NULL,1),(25,'Ocupado por Instrucciones del Alcalde de San Diego de la Union',NULL,1),(26,'Prestamo Presidente Consejo Coordinador Empresarial, San Miguel de Allende Oficio S/N, DA-249/2013',NULL,1),(27,'Turismo Expo Agua 2013',NULL,1),(28,'Turismo/Destino Cultural de Mexico',NULL,1),(29,'Orgullo y Compromiso',NULL,1),(30,'Finanzas Pago con Tarjeta de Credito',NULL,1),(31,'Campana Olin Guanajuato Destino Cultural de Mexico (FIC)',NULL,1),(32,'Valores DIF',NULL,1);
/*!40000 ALTER TABLE `campanas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espectaculares`
--

DROP TABLE IF EXISTS `espectaculares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espectaculares` (
  `idEspectacular` int(11) NOT NULL AUTO_INCREMENT,
  `idciudad` int(11) DEFAULT NULL,
  `idtipo` int(11) DEFAULT NULL,
  `Clave` varchar(45) DEFAULT NULL,
  `Latitud` varchar(45) DEFAULT NULL,
  `Longitud` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Icono` varchar(45) DEFAULT 'img/pines/espectacular.png',
  `w` varchar(45) DEFAULT NULL,
  `h` varchar(45) DEFAULT NULL,
  `Foto` longtext,
  `Activo` int(11) DEFAULT '1',
  PRIMARY KEY (`idEspectacular`),
  KEY `IdTipo_idx` (`idtipo`),
  KEY `IdCiudad_idx` (`idciudad`),
  KEY `Idciudad` (`idciudad`),
  KEY `idtipo` (`idtipo`),
  CONSTRAINT `Idciudad` FOREIGN KEY (`idciudad`) REFERENCES `ciudades` (`idciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idtipo` FOREIGN KEY (`idtipo`) REFERENCES `tipoespectacular` (`idTipoEspectacular`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=557 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espectaculares`
--

LOCK TABLES `espectaculares` WRITE;
/*!40000 ALTER TABLE `espectaculares` DISABLE KEYS */;
INSERT INTO `espectaculares` VALUES (427,42,NULL,'GTO 01-A','20.998','-101.28533333333','GLORIETA GUANAJUATO - LEON - SILAO POR LA LIB','img/pines/espectacular.png','3.6','12.75','img/uploads/reales/espectaculares/1.jpg',1),(428,42,NULL,'GTO 08-A','21.014833333333','-101.2755','ENTRADA AL  AUDITORIO DEL ESTADO VISTA A MARF','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/2.jpg',1),(429,42,NULL,'GTO 08-B','21.014166666667','-101.276','ENTRADA AL  AUDITORIO DEL ESTADO VISTA A PLAZ','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/3.jpg',1),(430,42,NULL,'GTO 03-A','21.010666666667','-101.26666666667','ENTRADA A GUANAJUATO FRENTE A CASA MATA. (Blv','img/pines/espectacular.png','3.6','12.94','img/uploads/reales/espectaculares/4.jpg',1),(431,42,NULL,'GTO 02-A','21.010666666667','-101.26666666667','ENTRADA A GUANAJUATO SUBIDA A LOS BOMBEROS (C','img/pines/espectacular.png','3.6','12.94','img/uploads/reales/espectaculares/5.jpg',1),(432,42,NULL,'GTO 09-A','20.9845','-101.2885','ENTRADA A GUANAJUATO A 100 MTS. DE LA CASETA ','img/pines/espectacular.png','7.2','12.75','img/uploads/reales/espectaculares/6.jpg',1),(433,42,NULL,'GTO 09-B','20.982833333333','-101.2895','ENTRADA A GUANAJUATO A 100 MTS. DE LA CASETA ','img/pines/espectacular.png','7.2','12.75','img/uploads/reales/espectaculares/7.jpg',1),(434,41,NULL,'SIL 06-A','20.954333333333','-101.4395','SILAO DENTRO DE LAS INSTALACIONES DE LA FERIA','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/8.jpg',1),(435,41,NULL,'SIL 01-A','20.946666666667','-101.414','SILAO FRENTE A NISSAN PASO A DESNIVEL ','img/pines/espectacular.png','3.6','12.75','img/uploads/reales/espectaculares/9.jpg',1),(436,41,NULL,'SIL 02-A','20.946166666667','-101.41416666667','SILAO FRENTE A NISSAN PASO A DESNIVEL ','img/pines/espectacular.png','3.6','12.2','img/uploads/reales/espectaculares/10.jpg',1),(437,41,NULL,'SIL 04-A','20.945166666667','-101.414','PUENTE SILAO PRIMERA SALIDA DESVIACION A GUAN','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/11.jpg',1),(438,41,NULL,'SIL 03-A','20.944833333333','-101.41416666667','PUENTE SILAO PRIMERA SALIDA DESVIACION A GUAN','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/12.jpg',1),(439,41,NULL,'SIL 07-A','20.924333333333','-101.45166666667','CARRETERA SILAO - ALDEA KM. 5 GTO.-SILAO (IZQ','img/pines/espectacular.png','3.6','12.8','img/uploads/reales/espectaculares/13.jpg',1),(440,41,NULL,'SIL 08-A','20.9455','-101.4345','ANTES DEL DISTRIBUIDOR VIAL SILAO - ROMITA VI','img/pines/espectacular.png','3.1','8.4','img/uploads/reales/espectaculares/14.jpg',1),(441,41,NULL,'SIL 08-B','20.944666666667','-101.43416666667','ANTES DEL DISTRIBUIDOR VIAL SILAO - ROMITA VI','img/pines/espectacular.png','3.1','8.4','img/uploads/reales/espectaculares/15.jpg',1),(442,40,NULL,'LEO 05-A','21.140833333333','-101.68333333333','MALECON DEL RIO BAJANDO DE PUENTE INSURGENTES','img/pines/espectacular.png','3.4','10','img/uploads/reales/espectaculares/16.jpg',1),(443,40,NULL,'LEO 07-A','21.149833333333','-101.664','BLVD. LAS TORRES No. 217 OTE. ANTES DEL BLVD.','img/pines/espectacular.png','7.2','12.75','img/uploads/reales/espectaculares/17.jpg',1),(444,40,NULL,'LEO 08-B','21.150333333333','-101.66583333333','BLVD. LAS TORRES No. 217 OTE. ANTES DEL BLVD.','img/pines/espectacular.png','7.2','12.75','img/uploads/reales/espectaculares/18.jpg',1),(445,40,NULL,'LEO 06-A\nCORTADO','21.146666666667','-101.63433333333','LIBRAMIENTO NORTE ENTRE  HILARIO MEDINA Y FRA','img/pines/espectacular.png','3.6','12.75','img/uploads/reales/espectaculares/19.jpg',1),(446,40,NULL,'LEO 01-A','21.014833333333','-101.2755','BLVD. AEROPUERTO ENTRADA A LEON EN EL CAMELLO','img/pines/espectacular.png','3.6','12.94','img/uploads/reales/espectaculares/20.jpg',1),(447,40,NULL,'LEO 13-A','21.080666666667','-101.6085','DENTRO DEL DIST. VIAL JUAN PABLO II VISTA BLV','img/pines/espectacular.png','7','12.5','img/uploads/reales/espectaculares/21.jpg',1),(448,40,NULL,'LEO 13-B','21.095','-101.62683333333','DENTRO DEL DIST. VIAL JUAN PABLO II VISTA BLV','img/pines/espectacular.png','7.2','12.75','img/uploads/reales/espectaculares/22.jpg',1),(449,40,NULL,'LEO 13-C','21.096','-101.62816666667','DENTRO DEL DIST. VIAL JUAN PABLO II VISTA BLV','img/pines/espectacular.png','7.2','12.75','img/uploads/reales/espectaculares/23.jpg',1),(455,44,NULL,'IRA 04-A','20.806','-101.32333333333','CARRETERA LEON - IRAPUATO A LA ALTURA DE ALDA','img/pines/espectacular.png','7.2','12.6','img/uploads/reales/espectaculares/29.jpg',1),(456,44,NULL,'IRA 03-A','20.809333333333','-101.3225','CARRETERA LEON - IRAPUATO A LA ALTURA DE ALDA','img/pines/espectacular.png','7.2','12.6','img/uploads/reales/espectaculares/30.jpg',1),(457,44,NULL,'IRA 06-B','20.6635','-101.3405','BLVD. SAN ROQUE EN LA GLORIETA.','img/pines/espectacular.png','3.05','9.7','img/uploads/reales/espectaculares/31.jpg',1),(458,44,NULL,'IRA 05-B','20.664166666667','-101.3405','BLVD. SAN ROQUE EN LA GLORIETA.','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/32.jpg',1),(459,45,NULL,'SAL O5-A','20.5905','-101.23066666667','DENTRO DEL DISTRIBUIDOR VIAL DE SALAMANCA VIS','img/pines/espectacular.png','7.2','12.75','img/uploads/reales/espectaculares/33.jpg',1),(460,45,NULL,'SAL 05-B','20.5905','-101.23066666667','DENTRO DEL DISTRIBUIDOR VIAL DE SALAMANCA VIS','img/pines/espectacular.png','7.2','12.75','img/uploads/reales/espectaculares/34.jpg',1),(461,45,NULL,'SAL 05-C','20.5905','-101.23066666667','DENTRO DEL DISTRIBUIDOR VIAL DE SALAMANCA VIS','img/pines/espectacular.png','7.2','12.75','img/uploads/reales/espectaculares/35.jpg',1),(468,47,NULL,'DH 03-A','21.153833333333','-100.94383333333','ENTRADA A DOLORES GLORIETA A MONUMENTO JOSE A','img/pines/espectacular.png','3.65','12.7','img/uploads/reales/espectaculares/42.jpg',1),(471,48,NULL,'SDU 01-C','21.453666666667','-100.8685','CARRETERA DOLORES - SAN DIEGO ENTRONQUE CARRE','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/45.jpg',1),(472,48,NULL,'SDU 02-C','21.454333333333','-100.8685','CARRETERA DOLORES - SAN DIEGO ENTRONQUE CARRE','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/46.jpg',1),(473,49,NULL,'XI 01-A','21.296166666667','-100.06183333333','CARRETERA A LA ENTRADA DE XICHU','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/47.jpg',1),(474,49,NULL,'XI 02-B','21.275333333333','-100.55783333333','CARRETERA VICTORIA - XICHU EN EL ENTRONQUE','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/48.jpg',1),(475,50,NULL,'VIC 01-B','21.23','-100.25316666667','ENTRADA A MISION DE ARMEDO EN EL KM.15','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/49.jpg',1),(476,50,NULL,'VIC 02-B','21.229','-100.25266666667','ENTRADA A MISION DE ARMEDO EN EL KM.15','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/50.jpg',1),(477,51,NULL,'SCA 01-B','21.140166666667','-100.0735','ENTRADA A SANTA CATARINA DESVIACION A PALMAS.','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/51.jpg',1),(478,51,NULL,'SCA 02-B','21.139833333333','-100.073','ENTRADA A SANTA CATARINA DESVIACION A PALMAS.','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/52.jpg',1),(479,52,NULL,'TB 02-B','21.11','-100.15766666667','CARRETERA SAN JOSE ITURBIDE SANTA CATARINA EN','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/53.jpg',1),(480,52,NULL,'TB 01-B','21.121','-100.154','CARRETERA SAN JOSE ITURBIDE SANTA CATARINA EN','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/54.jpg',1),(481,53,NULL,'DRM 01-B','21.141','-100.326','ENTRADA A DOCTOR MORA AFUERA DE LA ESCUELA PR','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/55.jpg',1),(482,53,NULL,'DRM 02-B','21.141333333333','-100.32533333333','ENTRADA A DOCTOR MORA AFUERA DE LA ESCUELA PR','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/56.jpg',1),(486,55,NULL,'ATAR 02-B','21.1695','-100.02283333333','EN LA COMUNIDAD CHILARITO DESVIACION A LA JOY','img/pines/espectacular.png','3.65','12.43','img/uploads/reales/espectaculares/60.jpg',1),(487,56,NULL,'SMA 02-B','21.256833333333','-99.779','DENTRO DEL COMPLEJO ADMINISTRATIVO CAMINO A Q','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/61.jpg',1),(494,59,NULL,'CORO 01-B','20.194833333333','-100.37416666667','ENTRADA A CORONEO LADO DERECHO A 100 MTS DEL ','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/68.jpg',1),(495,59,NULL,'CORO 02-B','20.195','-100.37366666667','ENTRADA A CORONEO LADO DERECHO A 100 MTS DEL ','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/69.jpg',1),(498,61,NULL,'ACA-01','20.046166666667','-100.75083333333','DENTRO DE LAS INSTALACIONES DEL HOSPITAL DE A','img/pines/espectacular.png','3.6','12.75','img/uploads/reales/espectaculares/72.jpg',1),(499,61,NULL,'ACA 05-B','20.032333333333','-100.69116666667','CARRETERA ACAMBARO- TARANDACUAO FRENTE A LA E','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/73.jpg',1),(500,61,NULL,'ACA 04-C','20.05','-100.70133333333','SALIDA DE ACAMBARO JUNTO AL CERESO.','img/pines/espectacular.png','3.6','12.6','img/uploads/reales/espectaculares/74.jpg',1),(501,61,NULL,'ACA 03-B','20.043','-100.7135','CARRETERA ACAMBARO- TARANDACUAO ENTRONQUE ACA','img/pines/espectacular.png','3.6','9.95','img/uploads/reales/espectaculares/75.jpg',1),(502,62,NULL,'TAR 01-C','20.287666666667','-100.76416666667','ENTRADA A TARIMORO FRENTE A GOSOLINERA.','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/76.jpg',1),(503,62,NULL,'TAR 02-C','20.287666666667','-100.76383333333','ENTRADA A TARIMORO FRENTE A GOSOLINERA.','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/77.jpg',1),(506,64,NULL,'SLV 01-A','20.180833333333','-100.89','CARRETERA SALVATIERRA - ACAMBARO  A LA ALTURA','img/pines/espectacular.png','3.7','12.6','img/uploads/reales/espectaculares/80.jpg',1),(508,65,NULL,'SM 01-C','20.179333333333','-100.99966666667','ENTRADA A SANTIAGO MARAVATIO FRENTE A  GASOLI','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/82.jpg',1),(509,65,NULL,'SM 02-C','20.179666666667','-100.99966666667','ENTRADA A SANTIAGO MARAVATIO FRENTE A  GASOLI','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/83.jpg',1),(510,66,NULL,'URI 01-A','20.1015','-101.162','BLVD. URIANGATO ENTRONQUE LIBRAMIENTO SALAMAN','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/84.jpg',1),(511,66,NULL,'URI 02-A','20.101666666667','-101.16216666667','BLVD. URIANGATO ENTRONQUE LIBRAMIENTO SALAMAN','img/pines/espectacular.png','3.05','10','img/uploads/reales/espectaculares/85.jpg',1),(513,67,NULL,'MOR 01-B','20.130666666667','-101.20516666667','AFUERA DE LA NUEVA DEPORTIVA DEL ESTADO EN MO','img/pines/espectacular.png','10.05','10','img/uploads/reales/espectaculares/87.jpg',1),(537,42,NULL,'1ER P SILGTO\n01-A','20.952','-101.38533333333','Primer puente silao - guanajuato, vista silao','img/pines/espectacular.png','3','18','img/uploads/reales/espectaculares/111.jpg',1),(538,42,NULL,'1ER P SILGTO\n02-B','20.952','-101.38533333333','Primer puente silao - guanajuato, vista silao','img/pines/espectacular.png','3','18','img/uploads/reales/espectaculares/112.jpg',1),(539,42,NULL,'1ER P SILGTO\n03-C','20.951833333333','-101.38666666667','Primer puente silao - guanajuato, vista guana','img/pines/espectacular.png','3','18','img/uploads/reales/espectaculares/113.jpg',1),(540,42,NULL,'1ER P SILGTO\n04-D','20.951833333333','-101.38666666667','Primer puente silao - guanajuato, vista guana','img/pines/espectacular.png','3','18','img/uploads/reales/espectaculares/114.jpg',1),(541,42,NULL,'2o P SILAO\nGTO.01-A','20.950333333333','-101.39266666667','Segundo puente silao - guanajuato, vista sila','img/pines/espectacular.png','3','18','img/uploads/reales/espectaculares/115.jpg',1),(542,42,NULL,'2o P SILAO\nGTO.03-C','20.950333333333','-101.39266666667','Segundo puente silao - guanajuato, vista sila','img/pines/espectacular.png','3','18','img/uploads/reales/espectaculares/116.jpg',1),(543,42,NULL,'2o P SILAO\nGTO.02-B','20.950166666667','-101.39333333333','Segundo puente silao - guanajuato, vista guan','img/pines/espectacular.png','3','18','img/uploads/reales/espectaculares/117.jpg',1),(544,42,NULL,'2o P SILAO\nGTO.04-D','20.950166666667','-101.39333333333','Segundo puente silao - guanajuato, vista guan','img/pines/espectacular.png','3','18','img/uploads/reales/espectaculares/118.jpg',1),(545,42,NULL,'3ER PUENTE\nSIL.GTO 02-B','20.9475','-101.4055','Tercer puente silao - guanajuato, vista silao','img/pines/espectacular.png','3','26','img/uploads/reales/espectaculares/119.jpg',1),(546,42,NULL,'3ER PUENTE\nSIL.GTO 01-A','20.947666666667','-101.40466666667','Tercer puente silao - guanajuato, vista guana','img/pines/espectacular.png','3','26','img/uploads/reales/espectaculares/120.jpg',1),(547,41,NULL,'S/CLAVE','21.006833333333','-101.51683333333','CARRETERA LEON SILAO FRENTE AL PUERTO INTERIO','img/pines/espectacular.png','12','8','img/uploads/reales/espectaculares/121.jpg',1),(548,41,NULL,'S/CLAVE','21.008166666667','-101.5185','CARRETERA LEON SILAO FRENTE AL PUERTO INTERIO','img/pines/espectacular.png','12','8','img/uploads/reales/espectaculares/122.jpg',1),(555,63,NULL,'JAR 01-A','20.37472222','-101.0813889','CARRETERA VALLE DE SANTIAGO, ENTRADA A JARAL','img/pines/espectacular.png','10','3.05','img/uploads/reales/espectaculares/124.jpg',1),(556,63,NULL,'JAR 02-A','20.37444444','-101.0811111','CARRETERA SALIDA DE JARAL A VALLE DE SANTIAGO','img/pines/espectacular.png','10','3.05','img/uploads/reales/espectaculares/125.jpg',1);
/*!40000 ALTER TABLE `espectaculares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Proveedor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espectaculares_vigencia`
--

DROP TABLE IF EXISTS `espectaculares_vigencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espectaculares_vigencia` (
  `idespectaculares_vigencia` int(11) NOT NULL AUTO_INCREMENT,
  `idespectaculares` int(11) DEFAULT NULL,
  `idvigencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`idespectaculares_vigencia`),
  KEY `idvigencia` (`idvigencia`),
  KEY `idespectaculares` (`idespectaculares`),
  CONSTRAINT `idespectaculares` FOREIGN KEY (`idespectaculares`) REFERENCES `espectaculares` (`idEspectacular`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idvigencia` FOREIGN KEY (`idvigencia`) REFERENCES `vigencia` (`idvigencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espectaculares_vigencia`
--

LOCK TABLES `espectaculares_vigencia` WRITE;
/*!40000 ALTER TABLE `espectaculares_vigencia` DISABLE KEYS */;
INSERT INTO `espectaculares_vigencia` VALUES (1,427,1),(2,430,2),(3,436,3),(4,441,4),(5,457,5),(6,473,6),(7,475,7),(8,477,8),(9,479,9),(10,481,10),(11,486,11),(12,498,12),(13,500,13),(14,556,14),(15,428,16),(16,433,17),(17,434,18),(18,458,19),(19,428,23),(20,433,24),(21,434,25),(22,447,26),(23,458,27),(24,461,28),(25,500,29),(26,429,30),(27,429,32),(28,439,33),(29,443,34),(30,459,35),(31,430,39),(32,431,40),(33,432,41),(34,461,44),(35,471,47),(36,432,49),(37,433,50),(38,443,51),(39,448,53),(40,449,54),(41,455,55),(42,456,56),(43,444,52),(44,434,57),(45,460,59),(46,468,61),(47,471,62),(48,494,66),(49,503,68),(50,508,69),(51,511,70),(52,435,80),(53,439,81),(54,444,83),(55,447,84),(56,448,85),(57,456,86),(58,474,87),(59,476,88),(60,478,89),(61,480,90),(62,482,91),(63,499,93),(64,501,94),(65,555,95),(66,436,97),(67,455,99),(68,460,100),(69,437,102),(70,440,103),(85,442,116),(86,443,117),(87,443,118),(88,444,119),(89,448,120),(90,444,121),(91,446,122),(92,449,123),(93,458,124),(94,487,125),(95,513,126),(96,547,127),(97,548,128),(98,472,129),(99,471,130),(100,487,131),(101,541,132),(102,543,133),(104,543,135),(105,541,136),(106,542,137),(107,544,138),(108,546,139),(109,545,140);
/*!40000 ALTER TABLE `espectaculares_vigencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudades` (
  `idciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ciudad` varchar(45) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  `Latitud` varchar(45) DEFAULT NULL,
  `Longitud` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idciudad`),
  KEY `idestado_idx` (`idestado`),
  CONSTRAINT `idestado` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (40,'LEON',1,'21.132863','-101.678467'),(41,'SILAO',1,'20.952262','-101.426382'),(42,'GUANAJUATO',1,'21.019457','-101.258326'),(43,'SAN FCO. DEL RINCON',1,'21.020299','-101.857638'),(44,'IRAPUATO',1,'20.6786652',' -101.3544964'),(45,'SALAMANCA',1,'20.5708742','-101.1963224'),(46,'CELAYA',1,'20.5222222','-100.8122222'),(47,'DOLORES HIDALGO',1,'21.157049','-100.9347'),(48,'SAN DIEGO DE LA UNION',1,'21.4655556','-100.8736111'),(49,'XICHU',1,'21.2956159','-100.0573657'),(50,'VICTORIA',1,'21.2114596','-100.2160835'),(51,'SANTA CATARINA',1,'21.1392442','-100.0682897'),(52,'TIERRA BLANCA',1,'21.0996872','-100.1584904'),(53,'DOCTOR MORA',1,'21.1430821','-100.3185428'),(54,'SAN JOSÉ ITURBIDE',1,'20.998967','-100.385334'),(55,'ATARJEA',1,'21.2715288','-99.7205847'),(56,'SAN MIGUEL DE ALLENDE',1,'20.9141667','-100.7436111'),(57,'COMONFORT',1,'20.716609','-100.7577044'),(58,'JUVENTINO ROSAS',1,'20.6436199','-100.9934011'),(59,'CORONEO',1,'20.1990484','-100.3669879'),(60,'TARANDACUAO',1,'20','-100.5333333'),(61,'ACAMBARO',1,'20.035778','-100.72411'),(62,'TARIMORO',1,'20.2838509','-100.7566279'),(63,'JARAL DEL PROGRESO',1,'20.3717439','-101.0622926'),(64,'SALVATIERRA',1,'20.2081483','-100.8719598'),(65,'SANTIAGO MARAVATIO',1,'20.1735132','-100.9919246'),(66,'URIANGATO',1,'20.141043','-101.181179'),(67,'MOROLEON',1,'20.1264558','-101.1933423'),(68,'HUANIMARO',1,'20.3678927','-101.4978086'),(69,'ABASOLO',1,'20.4533454','-101.5312631'),(70,'PUEBLO NUEVO',1,'20.5244759','-101.3720989'),(71,'CUERAMARO',1,'20.6212444','-101.6755212'),(72,'MANUEL DOBLADO',1,'20.7282851','-101.951925'),(73,'PURISIMA DEL RINCON',1,'21.299896','-100.526096'),(74,'OCAMPO',1,'21.650021','-101.478092'),(75,'SAN FELIPE',1,'21.4829842','-101.2168554'),(76,'JERECUARO',1,'20.1505556','-100.5102778'),(77,'APASEO\r EL GRANDE',1,'20.5449159','-100.6872739'),(78,'VALLE DE SANTIAGO',1,'20.39411','-101.192902'),(79,'APASEO EL ALTO',1,'20.46264','-100.54586'),(80,'CORTAZAR',1,'20.482778',' -100.961111'),(81,'ROMITA',1,'20.87510','-101.51807'),(82,'SAN LUIS DE LA PAZ',1,'21.298611','-100.516389'),(83,'VILLAGRAN',1,'20.55423','-101.03719'),(84,'YURIRIA',1,'20.15787','-101.06788');
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espectacularproveedor`
--

DROP TABLE IF EXISTS `espectacularproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espectacularproveedor` (
  `idEspectacularProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `idEspectacular` int(11) DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEspectacularProveedor`),
  KEY `idProveedor_idx` (`idProveedor`),
  KEY `idEspectacular_idx` (`idEspectacular`),
  CONSTRAINT `idEspectacular` FOREIGN KEY (`idEspectacular`) REFERENCES `espectaculares` (`idEspectacular`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idProveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espectacularproveedor`
--

LOCK TABLES `espectacularproveedor` WRITE;
/*!40000 ALTER TABLE `espectacularproveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `espectacularproveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoespectacular`
--

DROP TABLE IF EXISTS `tipoespectacular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoespectacular` (
  `idTipoEspectacular` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoEspectacular`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoespectacular`
--

LOCK TABLES `tipoespectacular` WRITE;
/*!40000 ALTER TABLE `tipoespectacular` DISABLE KEYS */;
INSERT INTO `tipoespectacular` VALUES (1,'Cartelera'),(2,'Unipolar'),(3,'Puente Sil');
/*!40000 ALTER TABLE `tipoespectacular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Guanajuato');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-07 17:52:44
