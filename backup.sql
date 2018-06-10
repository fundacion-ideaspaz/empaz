-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: empazinstance.cxrb2g5bwzb0.us-east-2.rds.amazonaws.com    Database: empaz
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `cuestionarios`
--

DROP TABLE IF EXISTS `cuestionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuestionarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionarios`
--

LOCK TABLES `cuestionarios` WRITE;
/*!40000 ALTER TABLE `cuestionarios` DISABLE KEYS */;
INSERT INTO `cuestionarios` VALUES (1,'Cuestionario 1','Descripcion de prueba.','1','activo',NULL,NULL),(3,'Cuestionario Prueba 2','Preguntas enviadas a CCB','1','activo','2017-11-15 15:07:27','2017-11-15 15:07:27'),(4,'Cuestionario Prueba 3','bnm,','1','activo','2017-11-22 20:01:38','2017-11-22 20:01:38');
/*!40000 ALTER TABLE `cuestionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuestionarios_dimensiones`
--

DROP TABLE IF EXISTS `cuestionarios_dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuestionarios_dimensiones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dimension_id` int(10) unsigned NOT NULL,
  `cuestionario_id` int(10) unsigned NOT NULL,
  `importancia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuestionarios_dimensiones_dimension_id_foreign` (`dimension_id`),
  KEY `cuestionarios_dimensiones_cuestionario_id_foreign` (`cuestionario_id`),
  CONSTRAINT `cuestionarios_dimensiones_cuestionario_id_foreign` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cuestionarios_dimensiones_dimension_id_foreign` FOREIGN KEY (`dimension_id`) REFERENCES `dimensiones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionarios_dimensiones`
--

LOCK TABLES `cuestionarios_dimensiones` WRITE;
/*!40000 ALTER TABLE `cuestionarios_dimensiones` DISABLE KEYS */;
INSERT INTO `cuestionarios_dimensiones` VALUES (4,1,4,'30','2017-11-22 21:09:32','2017-11-22 21:09:32'),(5,2,4,'20','2017-11-22 21:09:39','2017-11-22 21:09:39'),(6,3,4,'50','2017-11-22 21:09:57','2017-11-22 21:09:57');
/*!40000 ALTER TABLE `cuestionarios_dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuestionarios_result`
--

DROP TABLE IF EXISTS `cuestionarios_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuestionarios_result` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `cuestionario_id` int(10) unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuestionarios_result_user_id_foreign` (`user_id`),
  KEY `cuestionarios_result_cuestionario_id_foreign` (`cuestionario_id`),
  CONSTRAINT `cuestionarios_result_cuestionario_id_foreign` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cuestionarios_result_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionarios_result`
--

LOCK TABLES `cuestionarios_result` WRITE;
/*!40000 ALTER TABLE `cuestionarios_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuestionarios_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dimension_indicador`
--

DROP TABLE IF EXISTS `dimension_indicador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dimension_indicador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dimension_id` int(10) unsigned NOT NULL,
  `indicador_id` int(10) unsigned NOT NULL,
  `cuestionario_id` int(10) unsigned NOT NULL,
  `nivel_importancia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dimension_indicador_dimension_id_foreign` (`dimension_id`),
  KEY `dimension_indicador_indicador_id_foreign` (`indicador_id`),
  KEY `dimension_indicador_cuestionario_id_foreign` (`cuestionario_id`),
  CONSTRAINT `dimension_indicador_cuestionario_id_foreign` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dimension_indicador_dimension_id_foreign` FOREIGN KEY (`dimension_id`) REFERENCES `dimensiones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dimension_indicador_indicador_id_foreign` FOREIGN KEY (`indicador_id`) REFERENCES `indicadores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dimension_indicador`
--

LOCK TABLES `dimension_indicador` WRITE;
/*!40000 ALTER TABLE `dimension_indicador` DISABLE KEYS */;
INSERT INTO `dimension_indicador` VALUES (1,1,1,4,'3','2017-11-22 21:10:18','2017-11-22 21:10:18'),(2,2,2,4,'3','2017-11-22 21:10:25','2017-11-22 21:10:25'),(3,3,3,4,'4','2017-11-22 21:10:48','2017-11-22 21:10:48');
/*!40000 ALTER TABLE `dimension_indicador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dimensiones`
--

DROP TABLE IF EXISTS `dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dimensiones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dimensiones`
--

LOCK TABLES `dimensiones` WRITE;
/*!40000 ALTER TABLE `dimensiones` DISABLE KEYS */;
INSERT INTO `dimensiones` VALUES (1,'Gestión Estratégica para la Paz','Descripción correspondiente','','activo',NULL,'2017-11-14 20:02:09'),(2,'Reconciliación y Convivencia','Descripcion correspondiente.','','activo',NULL,'2017-11-14 20:04:39'),(3,'Desarrollo Económico Inclusivo','Descripción correspondiente','','activo','2017-11-14 20:05:15','2017-11-14 20:05:15'),(4,'Prueba dimensión','Dimensión','','inactivo','2017-11-22 21:04:08','2017-11-22 21:07:39');
/*!40000 ALTER TABLE `dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa_profile`
--

DROP TABLE IF EXISTS `empresa_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamano` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_trabajadores` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_economico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_ciiu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresa_profile_user_id_foreign` (`user_id`),
  CONSTRAINT `empresa_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_profile`
--

LOCK TABLES `empresa_profile` WRITE;
/*!40000 ALTER TABLE `empresa_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enunciados`
--

DROP TABLE IF EXISTS `enunciados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enunciados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dimension_id` int(10) unsigned NOT NULL,
  `nivel_importancia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enunciados_dimension_id_foreign` (`dimension_id`),
  CONSTRAINT `enunciados_dimension_id_foreign` FOREIGN KEY (`dimension_id`) REFERENCES `dimensiones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enunciados`
--

LOCK TABLES `enunciados` WRITE;
/*!40000 ALTER TABLE `enunciados` DISABLE KEYS */;
INSERT INTO `enunciados` VALUES (1,1,'bajo','Calificación baja',NULL,'2017-11-14 20:02:09'),(2,1,'medio','Calificación media',NULL,'2017-11-14 20:02:09'),(3,1,'alto','Calificación alta',NULL,'2017-11-14 20:02:09'),(4,1,'muy alto','Calificación muy alta',NULL,'2017-11-14 20:02:09'),(5,2,'bajo','Calificación baja',NULL,'2017-11-14 20:04:39'),(6,2,'medio','Calificación media',NULL,'2017-11-14 20:04:39'),(7,2,'alto','Calificación alta',NULL,'2017-11-14 20:04:39'),(8,2,'muy alto','Calificación muy alta',NULL,'2017-11-14 20:04:39'),(9,3,'bajo','Calificación baja','2017-11-14 20:05:15','2017-11-14 20:05:15'),(10,3,'medio','Calificación media','2017-11-14 20:05:15','2017-11-14 20:05:15'),(11,3,'alto','Calificación alta','2017-11-14 20:05:15','2017-11-14 20:05:15'),(12,3,'muy alto','Calificación muy alta','2017-11-14 20:05:15','2017-11-14 20:05:15'),(13,4,'bajo','Bajo','2017-11-22 21:04:08','2017-11-22 21:04:08'),(14,4,'medio','Medio','2017-11-22 21:04:08','2017-11-22 21:04:08'),(15,4,'alto','Alto','2017-11-22 21:04:08','2017-11-22 21:04:08'),(16,4,'muy alto','Muy Alto','2017-11-22 21:04:08','2017-11-22 21:04:08');
/*!40000 ALTER TABLE `enunciados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_pregunta`
--

DROP TABLE IF EXISTS `indicador_pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_pregunta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `required` tinyint(1) NOT NULL,
  `pregunta_id` int(10) unsigned NOT NULL,
  `indicador_id` int(10) unsigned NOT NULL,
  `cuestionario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `indicador_pregunta_pregunta_id_foreign` (`pregunta_id`),
  KEY `indicador_pregunta_indicador_id_foreign` (`indicador_id`),
  KEY `indicador_pregunta_cuestionario_id_foreign` (`cuestionario_id`),
  CONSTRAINT `indicador_pregunta_cuestionario_id_foreign` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `indicador_pregunta_indicador_id_foreign` FOREIGN KEY (`indicador_id`) REFERENCES `indicadores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `indicador_pregunta_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_pregunta`
--

LOCK TABLES `indicador_pregunta` WRITE;
/*!40000 ALTER TABLE `indicador_pregunta` DISABLE KEYS */;
INSERT INTO `indicador_pregunta` VALUES (1,1,3,1,4,'2017-11-22 21:11:55','2017-11-22 21:11:55'),(2,1,4,2,4,'2017-11-22 21:11:59','2017-11-22 21:11:59');
/*!40000 ALTER TABLE `indicador_pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicadores`
--

DROP TABLE IF EXISTS `indicadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicadores`
--

LOCK TABLES `indicadores` WRITE;
/*!40000 ALTER TABLE `indicadores` DISABLE KEYS */;
INSERT INTO `indicadores` VALUES (1,'Compromiso organizacional con la construcción de paz','Descripcion correspondiente.','activo',NULL,'2017-11-14 20:06:03'),(2,'Gestión responsable en derechos humanos','Descripción correspondiente','activo',NULL,'2017-11-14 20:06:28'),(3,'Acción sin daño','Descripción correspondiente','activo','2017-11-14 20:06:51','2017-11-15 15:19:26'),(4,'Prueba Indicador','Descripción','inactivo','2017-11-22 21:06:03','2017-11-22 21:07:15');
/*!40000 ALTER TABLE `indicadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017_10_05_000100_create_users_table',1),(2,'2017_10_05_000110_create_password_resets_table',1),(3,'2017_10_05_000200_create_dimensiones_table',1),(4,'2017_10_05_000300_create_indicadores_table',1),(5,'2017_10_05_000310_create_enunciados_table',1),(6,'2017_10_05_000400_create_preguntas_table',1),(7,'2017_10_05_000411_create_opciones_respuestas_table',1),(8,'2017_10_05_000500_create_cuestionarios_table',1),(9,'2017_10_05_000510_create_table_cuestionarios_dimensiones',2),(10,'2017_10_05_000511_create_table_dimensiones_indicadores',2),(11,'2017_10_05_000512_create_table_preguntas_indicadores',2),(12,'2017_10_05_000600_cuestionarios_result',2),(13,'2017_10_05_000610_respuestas_cuestionarios',2),(14,'2017_11_14_232729_add_columns_to_users_table',3),(15,'2017_11_15_184039_create_empresa_profile_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opciones_respuestas`
--

DROP TABLE IF EXISTS `opciones_respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opciones_respuestas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pregunta_id` int(10) unsigned NOT NULL,
  `number` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opciones_respuestas_pregunta_id_foreign` (`pregunta_id`),
  CONSTRAINT `opciones_respuestas_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opciones_respuestas`
--

LOCK TABLES `opciones_respuestas` WRITE;
/*!40000 ALTER TABLE `opciones_respuestas` DISABLE KEYS */;
INSERT INTO `opciones_respuestas` VALUES (5,3,1,'1','2017-11-10 20:33:05','2017-11-10 20:33:05'),(6,3,2,'2','2017-11-10 20:33:05','2017-11-10 20:33:05'),(7,3,3,'3','2017-11-10 20:33:05','2017-11-10 20:33:05'),(8,3,4,'4','2017-11-10 20:33:05','2017-11-10 20:33:05'),(9,4,1,'Si, de manera sistematica, desarrollamos acciones que fomentan la sana convivencia y solución pacífica de conflictos entre los trabajadores','2017-11-14 20:10:32','2017-11-14 20:10:32'),(10,4,2,'Alguna vez o de manera puntual, desarrollamos acciones que fomentan la sana convivencia y solución pacífica de conflictos entre los trabajadores','2017-11-14 20:10:32','2017-11-14 20:10:32'),(11,4,3,'No contamos con acciones que fomentan la sana convivencia y solución pacífica de conflictos entre los trabajadores','2017-11-14 20:10:32','2017-11-14 20:10:32'),(12,5,1,'1','2017-11-22 20:59:21','2017-11-22 20:59:21'),(13,5,2,'2','2017-11-22 20:59:21','2017-11-22 20:59:21');
/*!40000 ALTER TABLE `opciones_respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_respuesta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
INSERT INTO `preguntas` VALUES (3,'¿La empresa cuenta con un compromiso explícito con la construcción de paz, que es incorporado en estrategias, políticas y procesos?','Descripción correspondiente','activo','tipo_1','2017-11-10 20:33:05','2017-11-14 20:08:17'),(4,'¿La empresa promueve conductas de sana convivencia y solución pacífica de conflictos entre sus trabajadores?','Descripción correspondiente','activo','tipo_2','2017-11-14 20:10:32','2017-11-14 20:10:32'),(5,'Pregunta prueba','Descripción prueba','inactivo','tipo_3','2017-11-22 20:59:21','2017-11-22 21:06:53');
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas_cuestionarios`
--

DROP TABLE IF EXISTS `respuestas_cuestionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas_cuestionarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opcion_respuesta_id` int(10) unsigned NOT NULL,
  `pregunta_id` int(10) unsigned NOT NULL,
  `cuestionario_result_id` int(10) unsigned NOT NULL,
  `cuestionario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `respuestas_cuestionarios_opcion_respuesta_id_foreign` (`opcion_respuesta_id`),
  KEY `respuestas_cuestionarios_pregunta_id_foreign` (`pregunta_id`),
  KEY `respuestas_cuestionarios_cuestionario_result_id_foreign` (`cuestionario_result_id`),
  KEY `respuestas_cuestionarios_cuestionario_id_foreign` (`cuestionario_id`),
  CONSTRAINT `respuestas_cuestionarios_cuestionario_id_foreign` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `respuestas_cuestionarios_cuestionario_result_id_foreign` FOREIGN KEY (`cuestionario_result_id`) REFERENCES `cuestionarios_result` (`id`) ON DELETE CASCADE,
  CONSTRAINT `respuestas_cuestionarios_opcion_respuesta_id_foreign` FOREIGN KEY (`opcion_respuesta_id`) REFERENCES `opciones_respuestas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `respuestas_cuestionarios_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas_cuestionarios`
--

LOCK TABLES `respuestas_cuestionarios` WRITE;
/*!40000 ALTER TABLE `respuestas_cuestionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuestas_cuestionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'superadmin','admin1@empaz.com','Super Admin',NULL,NULL,'$2y$10$uufuSZdCK5QTYsWOQRaC8eAclTxOeV9WF/WpXTQVVpaBohSSXIrKK','GDnIVSsyG2ImzdWhaLkqqnQCsfYroJ8tFCHGyv1RR6XH7mj5HaHlRuT8bdzk',NULL,NULL,'','activo'),(5,'superadmin','jescudero@ideaspaz.org','Jose Escudero',NULL,NULL,'$2y$10$Ulz4/dAtiEH8q5JAlpquTupiw9jLYXQRWybaBRoyVqrT1/Bd2ctBq','3qPUhUz2uQrVYFqd6NSY1YT694B8fm1pndByn0ZxkdjPnfExnuVxkzwAqqkT','2017-11-23 17:11:28','2017-11-23 17:11:28','7ncYCDESbCna','inactivo'),(6,'superadmin','juan.mora@ccb.org.co','Juan Carlos Mora',NULL,NULL,'$2y$10$rr1KWOKT8CobIDSPhTtRa.AGXZApuuGdvRRM.DKb4NgyS1DywpiyK','7JMKrQUECOoiZ7qL7OoXfremfbQD1tUwJnkRF7Wx0uzL5AgkofH7x1zNXKxr','2017-11-24 14:39:20','2017-11-24 14:39:20','846I74uEWzrB','inactivo'),(7,'empresa','bbull.inc@gmail.com','Prueba','Prueba','45465765','$2y$10$kUo8eyd4Yve2oR0PhmaRMecDAv8dcFJTq2TrCIaU/Vw5SC.uunwyW',NULL,'2017-11-24 16:11:46','2017-11-24 16:12:02','','activo');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-24 18:47:08
