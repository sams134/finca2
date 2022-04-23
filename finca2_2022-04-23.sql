# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.21-MariaDB)
# Database: finca2
# Generation Time: 2022-04-23 23:32:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table animals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `animals`;

CREATE TABLE `animals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `value` double(8,2) DEFAULT NULL,
  `is_criollo` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `bought_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `bought_date` date DEFAULT NULL,
  `sold_date` date DEFAULT NULL,
  `bought_weight` int(11) DEFAULT NULL,
  `color_id` bigint(20) unsigned DEFAULT NULL,
  `type_id` bigint(20) unsigned DEFAULT NULL,
  `owner_id` bigint(20) unsigned DEFAULT NULL,
  `status_id` bigint(20) unsigned DEFAULT NULL,
  `animal_id` bigint(20) unsigned DEFAULT NULL,
  `earing_color_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `animals_color_id_foreign` (`color_id`),
  KEY `animals_type_id_foreign` (`type_id`),
  KEY `animals_owner_id_foreign` (`owner_id`),
  KEY `animals_status_id_foreign` (`status_id`),
  KEY `animals_animal_id_foreign` (`animal_id`),
  KEY `animals_earing_color_id_foreign` (`earing_color_id`),
  CONSTRAINT `animals_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE SET NULL,
  CONSTRAINT `animals_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  CONSTRAINT `animals_earing_color_id_foreign` FOREIGN KEY (`earing_color_id`) REFERENCES `earing_colors` (`id`) ON DELETE SET NULL,
  CONSTRAINT `animals_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE SET NULL,
  CONSTRAINT `animals_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE SET NULL,
  CONSTRAINT `animals_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;

INSERT INTO `animals` (`id`, `number`, `gender`, `description`, `cost`, `value`, `is_criollo`, `bought_from`, `sold_to`, `born_date`, `bought_date`, `sold_date`, `bought_weight`, `color_id`, `type_id`, `owner_id`, `status_id`, `animal_id`, `earing_color_id`, `created_at`, `updated_at`)
VALUES
	(1,'0001','1','Samuel',4010.00,NULL,'2','Manuel Tut',NULL,NULL,'2022-02-03',NULL,460,1,1,3,3,NULL,9,'2022-04-08 02:49:25','2022-04-14 21:40:35'),
	(2,'0001','2','Mi papa me la dio en reposicion de la vaca blanca tambien comprada a chango que salio mala.\r\n\r\nAntes vaca 53',NULL,NULL,'2','Chango',NULL,NULL,NULL,NULL,NULL,4,7,3,10,NULL,9,'2022-04-08 02:51:33','2022-04-14 21:49:39'),
	(3,'0025','2','Editar Info',NULL,NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL,1,7,1,9,NULL,3,'2022-04-08 02:53:16','2022-04-08 02:53:16'),
	(4,'0003','1','Hijo de vaca 25, de Amjor',NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,1,2,3,5,3,9,'2022-04-08 02:55:41','2022-04-14 21:45:25'),
	(5,'0002','1','Desmadrado 11/8/2021',NULL,NULL,'1',NULL,NULL,'2021-02-20',NULL,NULL,NULL,4,1,3,3,2,3,'2022-04-14 21:53:20','2022-04-14 21:53:20'),
	(6,'0001','2','Se vendio, y me dieron en remplazo la #1 bermeja',NULL,NULL,'2','Chango',NULL,NULL,NULL,NULL,NULL,1,7,3,1,NULL,9,'2022-04-14 21:56:35','2022-04-14 21:56:35'),
	(7,'0002','2','Hija de vaca blanca que se cambio por vaca #1 bermeja.',NULL,NULL,'1',NULL,NULL,'2019-10-04',NULL,NULL,NULL,1,5,3,7,6,9,'2022-04-14 21:58:26','2022-04-14 21:58:26'),
	(8,'0004','1','Hijo de vaca 1, pario cuando mis papas estaban aca. La vaca dejo adentro la placenta',NULL,NULL,'1',NULL,NULL,'2022-03-04',NULL,NULL,NULL,6,1,3,7,2,9,'2022-04-14 22:02:20','2022-04-14 22:02:20'),
	(9,'0088','2','Es criolla pero no se tienen datos',NULL,NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL,5,7,1,8,NULL,4,'2022-04-14 22:08:02','2022-04-14 22:08:02'),
	(10,'0003','2','No ha desmadrado',NULL,NULL,'1',NULL,NULL,'2021-08-14',NULL,NULL,NULL,5,4,5,10,9,9,'2022-04-14 22:09:21','2022-04-14 22:09:21'),
	(11,'0004','2','Regalo de amjor a juandi',0.00,NULL,'2','Amjor',NULL,NULL,'2019-08-24',NULL,NULL,3,7,4,8,NULL,9,'2022-04-14 22:11:39','2022-04-14 22:11:39'),
	(12,'0005','2','Antes era la 136. Ya anda con toro. Blanca cara hosca',NULL,NULL,'1',NULL,NULL,'2018-07-21',NULL,NULL,NULL,1,5,4,7,11,9,'2022-04-14 22:22:08','2022-04-17 13:11:23'),
	(13,'0006','2','Esta en crecimiento, era la numero 50',NULL,NULL,'1',NULL,NULL,'2021-03-16',NULL,NULL,NULL,4,4,4,7,11,9,'2022-04-14 22:25:23','2022-04-14 22:26:16'),
	(14,'0005','1','Antes era numero 21.',NULL,NULL,'1',NULL,NULL,'2020-03-09',NULL,NULL,NULL,3,1,4,3,11,9,'2022-04-14 22:33:01','2022-04-14 22:33:01'),
	(15,'0008','2','Vaca herencia de Abuelo Miguel, vino novilla pero ya esta vieja',NULL,NULL,'2','Herencia Irma',NULL,NULL,'2010-04-02',NULL,NULL,1,7,2,10,NULL,3,'2022-04-18 15:11:49','2022-04-18 15:11:49'),
	(16,'0069','2',NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL,1,7,1,7,NULL,4,'2022-04-21 19:46:27','2022-04-21 19:46:27'),
	(18,'0088','1',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,4,1,1,10,16,4,'2022-04-23 22:42:51','2022-04-23 23:08:07');

/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table badge_colors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `badge_colors`;

CREATE TABLE `badge_colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `badge_colors` WRITE;
/*!40000 ALTER TABLE `badge_colors` DISABLE KEYS */;

INSERT INTO `badge_colors` (`id`, `color`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'badge-soft-primary','Celeste','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(2,'badge-soft-secondary','Gris','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(3,'badge-soft-success','Verde','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(4,'badge-soft-info','Aqua','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(5,'badge-soft-warning','Naranja','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(6,'badge-soft-danger','Rojo','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(7,'badge-soft-dark','Negro','2022-04-08 02:47:59','2022-04-08 02:47:59');

/*!40000 ALTER TABLE `badge_colors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table colors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `colors`;

CREATE TABLE `colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Blanco','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(2,'Prieto','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(3,'Hosco','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(4,'Bermejo','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(5,'Rojo','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(6,'Bermeja Cara Overa','2022-04-08 02:56:22','2022-04-08 02:56:22'),
	(7,'Blanco cara hosca','2022-04-14 22:26:54','2022-04-14 22:26:54');

/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comment_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comment_types`;

CREATE TABLE `comment_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'far fa-comment-dots',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `comment_types` WRITE;
/*!40000 ALTER TABLE `comment_types` DISABLE KEYS */;

INSERT INTO `comment_types` (`id`, `name`, `icon`, `created_at`, `updated_at`)
VALUES
	(1,'Comentarios','far fa-comment-dots','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(2,'Pesa','fas fa-weight','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(3,'Edicion','far fa-edit','2022-04-08 02:48:00','2022-04-08 02:48:00');

/*!40000 ALTER TABLE `comment_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_id` bigint(20) unsigned DEFAULT NULL,
  `comment_type_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_animal_id_foreign` (`animal_id`),
  KEY `comments_comment_type_id_foreign` (`comment_type_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE SET NULL,
  CONSTRAINT `comments_comment_type_id_foreign` FOREIGN KEY (`comment_type_id`) REFERENCES `comment_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `comment`, `animal_id`, `comment_type_id`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,'Animal #1 ingresado el dia 08/04/2022',1,1,1,'2022-04-08 02:49:25','2022-04-08 02:49:25'),
	(2,'Peso de compra Chivo# 1: 460lbs',1,2,1,'2022-04-08 02:49:25','2022-04-08 02:49:25'),
	(3,'Animal #53 ingresado el dia 08/04/2022',2,1,1,'2022-04-08 02:51:33','2022-04-08 02:51:33'),
	(4,'Animal #25 ingresado el dia 08/04/2022',3,1,1,'2022-04-08 02:53:16','2022-04-08 02:53:16'),
	(5,'Animal #3 ingresado el dia 08/04/2022',4,1,1,'2022-04-08 02:55:41','2022-04-08 02:55:41'),
	(6,'Datos reales',1,3,1,'2022-04-14 21:42:02','2022-04-14 21:42:02'),
	(7,'Datos Reales',4,3,1,'2022-04-14 21:45:25','2022-04-14 21:45:25'),
	(8,'Pesa al dia 03/02/2022: 775',4,2,1,'2022-04-14 21:45:59','2022-04-14 21:45:59'),
	(9,'Vendido a Samuel el 30 dic 2020',4,1,1,'2022-04-14 21:46:32','2022-04-14 21:46:32'),
	(10,'Cambio de numeracion a correlativos sam',2,3,1,'2022-04-14 21:49:39','2022-04-14 21:49:39'),
	(11,'Animal #2 ingresado el dia 14/04/2022',5,1,1,'2022-04-14 21:53:20','2022-04-14 21:53:20'),
	(12,'Animal #1 ingresado el dia 14/04/2022',6,1,1,'2022-04-14 21:56:35','2022-04-14 21:56:35'),
	(13,'Animal #2 ingresado el dia 14/04/2022',7,1,1,'2022-04-14 21:58:26','2022-04-14 21:58:26'),
	(14,'Anda con toro, ',7,1,1,'2022-04-14 21:58:51','2022-04-14 21:58:51'),
	(15,'Animal #4 ingresado el dia 14/04/2022',8,1,1,'2022-04-14 22:02:20','2022-04-14 22:02:20'),
	(16,'Animal #88 ingresado el dia 14/04/2022',9,1,1,'2022-04-14 22:08:02','2022-04-14 22:08:02'),
	(17,'Animal #3 ingresado el dia 14/04/2022',10,1,1,'2022-04-14 22:09:21','2022-04-14 22:09:21'),
	(18,'Animal #4 ingresado el dia 14/04/2022',11,1,1,'2022-04-14 22:11:39','2022-04-14 22:11:39'),
	(19,'Palpada por marvin, Cargada',11,1,1,'2022-04-14 22:12:41','2022-04-14 22:12:41'),
	(20,'Antes era numero 33, arete rojo',11,1,1,'2022-04-14 22:15:48','2022-04-14 22:15:48'),
	(21,'Animal #5 ingresado el dia 14/04/2022',12,1,1,'2022-04-14 22:22:08','2022-04-14 22:22:08'),
	(22,'Animal #6 ingresado el dia 14/04/2022',13,1,1,'2022-04-14 22:25:23','2022-04-14 22:25:23'),
	(23,'se agrega numero',13,3,1,'2022-04-14 22:26:16','2022-04-14 22:26:16'),
	(24,'Animal #5 ingresado el dia 14/04/2022',14,1,1,'2022-04-14 22:33:01','2022-04-14 22:33:01'),
	(25,'puesto a nombre de juandi, me equivoque en ingreso',12,3,1,'2022-04-17 13:11:23','2022-04-17 13:11:23'),
	(26,'Pesa al dia 17/04/2022: 430',1,2,1,'2022-04-17 14:30:38','2022-04-17 14:30:38'),
	(27,'Pesa al dia 17/04/2022: 775',4,2,1,'2022-04-17 14:31:17','2022-04-17 14:31:17'),
	(28,'Pesa al dia 03/02/2022: 390',5,2,1,'2022-04-17 14:32:40','2022-04-17 14:32:40'),
	(29,'Pesa al dia 17/04/2022: 430',5,2,1,'2022-04-17 14:33:15','2022-04-17 14:33:15'),
	(30,'Pesa al dia 03/02/2022: 630',14,2,1,'2022-04-17 14:34:11','2022-04-17 14:34:11'),
	(31,'Pesa al dia 17/04/2022: 655',14,2,1,'2022-04-17 14:34:53','2022-04-17 14:34:53'),
	(32,'Pesa al dia 17/04/2022: 760',2,2,1,'2022-04-17 14:35:49','2022-04-17 14:35:49'),
	(33,'Pesa al dia 17/04/2022: 665',7,2,1,'2022-04-17 14:36:53','2022-04-17 14:36:53'),
	(34,'Pesa al dia 17/04/2022: 1085',11,2,1,'2022-04-17 14:37:41','2022-04-17 14:37:41'),
	(35,'ya anda con toro',12,1,1,'2022-04-17 14:38:42','2022-04-17 14:38:42'),
	(36,'Pesa al dia 17/04/2022: 790',12,2,1,'2022-04-17 14:38:52','2022-04-17 14:38:52'),
	(37,'Pesa al dia 17/04/2022: 300',13,2,1,'2022-04-17 14:39:46','2022-04-17 14:39:46'),
	(38,'Pesa al dia 17/04/2022: 370',10,2,1,'2022-04-17 14:40:43','2022-04-17 14:40:43'),
	(39,'Animal #8 ingresado el dia 18/04/2022',15,1,1,'2022-04-18 15:11:49','2022-04-18 15:11:49'),
	(40,'Pesa al dia 18/04/2022: 100',8,2,1,'2022-04-18 15:31:45','2022-04-18 15:31:45'),
	(41,'Animal #69 ingresado el dia 21/04/2022',16,1,1,'2022-04-21 19:46:27','2022-04-21 19:46:27'),
	(42,'Se le aplico apetovit, 10ml el dia 16/4/22',16,1,1,'2022-04-21 19:51:42','2022-04-21 19:51:42'),
	(43,'Pesa al dia 16/04/2022: 730',16,2,1,'2022-04-21 19:58:47','2022-04-21 19:58:47'),
	(44,'Animal #88 ingresado el dia 21/04/2022',NULL,1,1,'2022-04-21 20:02:32','2022-04-21 20:02:32'),
	(45,'Pesa al dia 16/04/2022: 890',9,2,1,'2022-04-23 22:38:05','2022-04-23 22:38:05'),
	(46,'Animal #88 ingresado el dia 23/04/2022',18,1,1,'2022-04-23 22:42:51','2022-04-23 22:42:51'),
	(47,'se cambia la mama por la 69, habia error',18,3,1,'2022-04-23 23:02:02','2022-04-23 23:02:02'),
	(48,'Pesa al dia 16/04/2022: 195',18,2,1,'2022-04-23 23:09:29','2022-04-23 23:09:29');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table earing_colors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `earing_colors`;

CREATE TABLE `earing_colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `earing_colors` WRITE;
/*!40000 ALTER TABLE `earing_colors` DISABLE KEYS */;

INSERT INTO `earing_colors` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Azul','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(2,'Verde','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(3,'Amarillo','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(4,'Rojo','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(5,'Negro','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(6,'Blanco','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(7,'Naranja','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(8,'Cafe','2022-04-08 02:48:00','2022-04-08 02:48:00'),
	(9,'Celeste','2022-04-08 02:48:00','2022-04-08 02:48:00');

/*!40000 ALTER TABLE `earing_colors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) unsigned NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `url`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`)
VALUES
	(1,'2/WhatsApp Image 2022-03-12 at 12.26.43 PM_1649386293.jpeg',2,'App\\Models\\Animal','2022-04-08 02:51:33','2022-04-08 02:51:33'),
	(2,'1/m0qSDfpB8MC84W4C4QcIM6TgkUxJlfpXBliB1aZO.jpg',1,'App\\Models\\Animal','2022-04-15 03:30:01','2022-04-15 03:30:01'),
	(3,'1/MggoTtE00nqoQiYGtU98lhIoiqPlBiZahyhpp8gu.jpg',1,'App\\Models\\Animal','2022-04-15 03:30:18','2022-04-15 03:30:18'),
	(4,'1/ASTNG66EOnGMnhb2luZcN8w7CDsFNFjxgGPvExjb.jpg',1,'App\\Models\\Animal','2022-04-15 03:30:30','2022-04-15 03:30:30'),
	(5,'1/sFACFmDcPJEgCnN14hpnWFJ0xUxeggp9WHQTdTGK.jpg',1,'App\\Models\\Animal','2022-04-15 03:30:41','2022-04-15 03:30:41'),
	(6,'1/6HUSEQ6La8BmGEWZjAHnx1evFqTYYZMMfucyShxj.jpg',1,'App\\Models\\Animal','2022-04-15 03:30:55','2022-04-15 03:30:55'),
	(7,'1/UWyA6SIwRt2KOy4TrBvC3jZP3qUCnE9GMCr5wVEI.jpg',1,'App\\Models\\Animal','2022-04-15 03:33:36','2022-04-15 03:33:36'),
	(8,'5/LBVPWXFiSVM0zQkBGtq2hVqicXkhNEluDV3l19tG.jpg',5,'App\\Models\\Animal','2022-04-15 03:41:46','2022-04-15 03:41:46'),
	(9,'5/bdY3NtU28J1eorxuixv4TKQXbmRRdLvkfaWemqBj.jpg',5,'App\\Models\\Animal','2022-04-15 03:41:55','2022-04-15 03:41:55'),
	(10,'5/F35p9eDVdkRzcWbMQFR4HgPrpWIwbGtviTv2TZAV.jpg',5,'App\\Models\\Animal','2022-04-15 03:42:04','2022-04-15 03:42:04'),
	(11,'5/x1nszaXt07H91053ibd4PUcthuVCL9UuoLjAGUNc.jpg',5,'App\\Models\\Animal','2022-04-15 03:42:19','2022-04-15 03:42:19'),
	(12,'5/rTN5YRur5f8YJmoz2ACgzkFkaXm8Rhvscw1OzO0S.jpg',5,'App\\Models\\Animal','2022-04-15 03:42:27','2022-04-15 03:42:27'),
	(13,'5/JM6T5Bd04BacGXp92kFawFiyFgQMjQaV4Q2reooG.jpg',5,'App\\Models\\Animal','2022-04-15 03:42:38','2022-04-15 03:42:38'),
	(14,'4/1s2YUZngD0AQQUUQkj2QFa9AlILht6LhiiKFFaUM.jpg',4,'App\\Models\\Animal','2022-04-15 03:46:36','2022-04-15 03:46:36'),
	(15,'4/wWKf18SZqSJcjAwJQdkO2mzDEgi3lR0d3hdrcqsk.jpg',4,'App\\Models\\Animal','2022-04-15 03:46:49','2022-04-15 03:46:49'),
	(16,'4/1mBQYM33wCNS6XLDQzOyhFuS5qKwRN7eqyAYz7C9.jpg',4,'App\\Models\\Animal','2022-04-15 03:47:02','2022-04-15 03:47:02'),
	(17,'4/N1IeOqwqE5mhDrLEnSk6sGVkFMRq7eWZ9iiCCRBM.jpg',4,'App\\Models\\Animal','2022-04-15 03:47:21','2022-04-15 03:47:21'),
	(18,'4/hM5RIE5su6z1tVDvifCsYYKfcfIQIxZtsLKhtfLU.jpg',4,'App\\Models\\Animal','2022-04-15 03:47:35','2022-04-15 03:47:35'),
	(19,'4/yMajKWDCGvNraqzhWXH1ZquWodlw45vmArWIQmNR.jpg',4,'App\\Models\\Animal','2022-04-15 03:47:48','2022-04-15 03:47:48'),
	(20,'4/iwzFCHspiCibdCy0F39w05bSLwswRKl5bja5EAXD.jpg',4,'App\\Models\\Animal','2022-04-15 03:48:01','2022-04-15 03:48:01'),
	(21,'8/uwBaLGlPpc4TgmZ92EnsWVO82sqzeZQUSt77K9ml.jpg',8,'App\\Models\\Animal','2022-04-15 03:51:51','2022-04-15 03:51:51'),
	(22,'8/cXF4paToMRwPD4f4tfeMDwf9cgUwayJhe2DYI52V.jpg',8,'App\\Models\\Animal','2022-04-15 03:52:11','2022-04-15 03:52:11'),
	(23,'8/JN18jWjDyYiKO0jWgU1SFLwRqc4QCSpNK3EoBg0V.jpg',8,'App\\Models\\Animal','2022-04-15 03:52:23','2022-04-15 03:52:23'),
	(24,'8/sHlA9XybDxc0Zg9McaLwVUdljgobEp9N2fSTXaVx.jpg',8,'App\\Models\\Animal','2022-04-15 03:52:33','2022-04-15 03:52:33'),
	(25,'8/TnyPJxTIJ8694nuXLb9nPxvUBXW4hZMv3IYZASnw.jpg',8,'App\\Models\\Animal','2022-04-15 03:52:47','2022-04-15 03:52:47'),
	(26,'8/HtHVe4PWpjgSyaDAhRYYVSE6uEmjybAyy1rjrcAy.jpg',8,'App\\Models\\Animal','2022-04-15 03:53:53','2022-04-15 03:53:53'),
	(27,'8/rd5hWKfqbgafjuWgkwRxspJWZpIo4HEWviJMwIKn.jpg',8,'App\\Models\\Animal','2022-04-15 03:55:03','2022-04-15 03:55:03'),
	(28,'2/SndI0mQ5RGMxJCxvEVGGZNUjDcxMSOaj7XL0rZNq.jpg',2,'App\\Models\\Animal','2022-04-15 03:59:47','2022-04-15 03:59:47'),
	(29,'2/Q7LE7LDz6rEve8I793Cn7iui3HxCDoua4ttd1Xlk.jpg',2,'App\\Models\\Animal','2022-04-15 03:59:59','2022-04-15 03:59:59'),
	(30,'2/Rr19SZmSQA3ZZAxpkzjg6tmc4TttZBiijdeJMxMt.jpg',2,'App\\Models\\Animal','2022-04-15 04:00:13','2022-04-15 04:00:13'),
	(31,'2/uAJG2AW1FtAubyRrnu5R1UtRTy9hUDycBpW2X6fF.jpg',2,'App\\Models\\Animal','2022-04-15 04:00:23','2022-04-15 04:00:23'),
	(32,'2/5K8P3ipccJDhDtgl6cAgcL54K87EhWg40LsVGUdv.jpg',2,'App\\Models\\Animal','2022-04-15 04:00:35','2022-04-15 04:00:35'),
	(33,'2/6y12APXTdJdYV4tMkFh2JYeH14Zmx3fTWy451zZh.jpg',2,'App\\Models\\Animal','2022-04-15 04:00:46','2022-04-15 04:00:46'),
	(34,'2/kA9yBBO1oNmdxd8h6S6tZXB1mE5ituBcWpWOtOan.jpg',2,'App\\Models\\Animal','2022-04-15 04:00:59','2022-04-15 04:00:59'),
	(35,'7/FtLVZvZYrDxyRhw1n3UNFp120mWKHZ6DVg7pqkZb.jpg',7,'App\\Models\\Animal','2022-04-15 04:04:53','2022-04-15 04:04:53'),
	(36,'7/AlhySSzGTqv4YI8CUtJUJUdUBS7jgxWNYn8wj0rh.jpg',7,'App\\Models\\Animal','2022-04-15 04:05:01','2022-04-15 04:05:01'),
	(37,'7/FWrAguK805Jq6yACqkFTNTsWpVDg039trz7ZKVtg.jpg',7,'App\\Models\\Animal','2022-04-15 04:05:10','2022-04-15 04:05:10'),
	(38,'7/F0uxddlFuMafKdfcxK6WRI4XZ0l2hWCQ5OPuVcqH.jpg',7,'App\\Models\\Animal','2022-04-15 04:05:19','2022-04-15 04:05:19'),
	(39,'7/cfPAna9uhUiAhsE3BCse42RsXDYzwpJyDape6ZfX.jpg',7,'App\\Models\\Animal','2022-04-15 04:05:28','2022-04-15 04:05:28'),
	(40,'7/yGBVkAhvOV35ZkBK7fdQIb2cJ4XaGuC0cAlt91A9.jpg',7,'App\\Models\\Animal','2022-04-15 04:05:47','2022-04-15 04:05:47'),
	(41,'14/Su1yZQpk2aB65Qa68k6E4DPrckuLGgYTmR9wLYHj.jpg',14,'App\\Models\\Animal','2022-04-15 04:24:49','2022-04-15 04:24:49'),
	(42,'14/kEKSKITJs5ZkcQiZ2lIBRXCExNRRGYsbC9eC2lu8.jpg',14,'App\\Models\\Animal','2022-04-15 04:25:07','2022-04-15 04:25:07'),
	(43,'14/lqQEPmJYSLv9YxpscvQPXCCl4vREsr2pVn0Nm8qX.jpg',14,'App\\Models\\Animal','2022-04-15 04:25:23','2022-04-15 04:25:23'),
	(44,'14/A5wnpVdhLRTb0E7wqJtJmzOcB5Og8EqbqIvMesNo.jpg',14,'App\\Models\\Animal','2022-04-15 04:25:32','2022-04-15 04:25:32'),
	(45,'14/74640UMpHDew656CY5NNKpoFiK0A6WHaXKrDK3Gz.jpg',14,'App\\Models\\Animal','2022-04-15 04:25:47','2022-04-15 04:25:47'),
	(46,'14/aBZZ2KSmatQFXzs6SXF6vElVeCLM6ZMW5GsHXHL2.jpg',14,'App\\Models\\Animal','2022-04-15 04:26:00','2022-04-15 04:26:00'),
	(47,'14/W5K8kp7PHyvmbEYdXVm9QvWbl8z9FEbfBxDulTKG.jpg',14,'App\\Models\\Animal','2022-04-15 04:26:10','2022-04-15 04:26:10'),
	(48,'14/vPnSTFVS8sOl6ReaHdMuLrvpBdt2mDp4gWzR7mge.jpg',14,'App\\Models\\Animal','2022-04-15 04:26:20','2022-04-15 04:26:20'),
	(49,'11/MYQVdvr1N0N1XjnH19vvm1ANtwfYaZc3MRf3waFL.jpg',11,'App\\Models\\Animal','2022-04-15 15:49:26','2022-04-15 15:49:26'),
	(50,'11/d4dwcpFEjFGYlKsRydQuNnz3cPFNWFZfsuOcHznt.jpg',11,'App\\Models\\Animal','2022-04-15 15:51:47','2022-04-15 15:51:47'),
	(51,'11/HOawfkzcS4IZoT0sjdRYsBOqyETBBepP8j6q1ri9.jpg',11,'App\\Models\\Animal','2022-04-15 15:51:57','2022-04-15 15:51:57'),
	(52,'11/x5mxfV0GCWexqjkOiv0aJXPlkxwXws761g2wqPXG.jpg',11,'App\\Models\\Animal','2022-04-15 15:52:07','2022-04-15 15:52:07'),
	(53,'11/gfIsaO0l9Z0YVspOd8wBY68xWdLeCqEP1yzQdGXE.jpg',11,'App\\Models\\Animal','2022-04-15 15:52:23','2022-04-15 15:52:23'),
	(54,'11/Nkoud7tq2xpDMkovEq0Y0RqiaGJxACo4EkwjJlMJ.jpg',11,'App\\Models\\Animal','2022-04-15 15:52:46','2022-04-15 15:52:46'),
	(55,'11/7Dzv7wCZ8qbHLP7QooxZrV0jpqRgMuwOVtGKcx9f.jpg',11,'App\\Models\\Animal','2022-04-15 15:52:58','2022-04-15 15:52:58'),
	(56,'11/IkdK7OY04w3ISWfRqqvceBZHzdqoXllo6YrmSu6l.jpg',11,'App\\Models\\Animal','2022-04-15 15:53:11','2022-04-15 15:53:11'),
	(57,'11/GCQPCNNaHF5SFPYBClMwD9BvFnR6jVvSIpDW1VVa.jpg',11,'App\\Models\\Animal','2022-04-15 15:54:16','2022-04-15 15:54:16'),
	(58,'10/OCdkg5syLF7PThGaD0WuI9HkQsMdKOfZhZAbRXRL.jpg',10,'App\\Models\\Animal','2022-04-17 13:01:43','2022-04-17 13:01:43'),
	(59,'10/TmjH8ovXF45bRhVxrYePg3eEKaiYpFHNQUC8g7Nl.jpg',10,'App\\Models\\Animal','2022-04-17 13:02:12','2022-04-17 13:02:12'),
	(60,'10/SPGkwSBh3EPvwaGWCGdeQbmhS4rCdu7eAmHnMG0N.jpg',10,'App\\Models\\Animal','2022-04-17 13:02:22','2022-04-17 13:02:22'),
	(61,'10/xb9G9BAKUtQkuEOLaoBZOQTViwlyUi4imONfH9Jf.jpg',10,'App\\Models\\Animal','2022-04-17 13:02:32','2022-04-17 13:02:32'),
	(62,'10/oXm8mzQWAoIrXb6z7NrCyouK2oyY4hTEYlOeHZYK.jpg',10,'App\\Models\\Animal','2022-04-17 13:02:51','2022-04-17 13:02:51'),
	(63,'10/7MDlYxtWvsETN5JzQepQJWWe94qO0f4qU0EwhAS7.jpg',10,'App\\Models\\Animal','2022-04-17 13:03:03','2022-04-17 13:03:03'),
	(64,'10/cmMhelV2lJNIMmzk7IqKs6gybxi8EYQuwELueyTU.jpg',10,'App\\Models\\Animal','2022-04-17 13:03:19','2022-04-17 13:03:19'),
	(65,'10/45NIr0POXvTKCRbUppKeLKL4kpbpicSH86Sir6oh.jpg',10,'App\\Models\\Animal','2022-04-17 13:03:28','2022-04-17 13:03:28'),
	(66,'13/tDn4NCGte0lcEZcbSxzCx7NbUBuALMynPHnoY4PY.jpg',13,'App\\Models\\Animal','2022-04-17 13:07:30','2022-04-17 13:07:30'),
	(67,'13/emABq9Sip1lXyVevrosj3Fj8NMH1A1DYZTy70rqH.jpg',13,'App\\Models\\Animal','2022-04-17 13:07:36','2022-04-17 13:07:36'),
	(68,'13/jSQFCFHElIdYiHWCHCb2Iki6Vr0sMisEpzK0VEbJ.jpg',13,'App\\Models\\Animal','2022-04-17 13:07:43','2022-04-17 13:07:43'),
	(69,'13/LYVo2zL8SomrxAWpyouaWFxOpwHAMHSI2brEfCpN.jpg',13,'App\\Models\\Animal','2022-04-17 13:07:52','2022-04-17 13:07:52'),
	(70,'13/8LfNyoW3qTNAT7Xxxue3Em3mzwzBMOooUtPnkcAK.jpg',13,'App\\Models\\Animal','2022-04-17 13:08:04','2022-04-17 13:08:04'),
	(71,'13/z0VpbDI5TcGIoDy2b9a6hSi5YypPjYiQixzvNQ2z.jpg',13,'App\\Models\\Animal','2022-04-17 13:08:15','2022-04-17 13:08:15'),
	(72,'13/89TG0F3mW3T5jxB4qcvEcdXZT1nyJZQ5HpAacqH7.jpg',13,'App\\Models\\Animal','2022-04-17 13:08:32','2022-04-17 13:08:32'),
	(73,'13/ln0KEvJMQwuR5SBtDQkVQyvetty4Br8qTwCH9u3R.jpg',13,'App\\Models\\Animal','2022-04-17 13:08:50','2022-04-17 13:08:50'),
	(74,'13/3S2SPyQDjr1atLgiI00TaAiLOObP1lKLx6L04jsd.jpg',13,'App\\Models\\Animal','2022-04-17 13:08:57','2022-04-17 13:08:57'),
	(75,'12/pWyUFZg9edosoNgkKNnIlxUXO7Gjm3MNIPutAkd8.jpg',12,'App\\Models\\Animal','2022-04-17 13:15:27','2022-04-17 13:15:27'),
	(76,'12/k84hEgWuCCk7biGJGbzkJWRAgcVuJ4Za0dGeZjMT.jpg',12,'App\\Models\\Animal','2022-04-17 13:15:42','2022-04-17 13:15:42'),
	(77,'12/OrfqS34aVW7z4QYNRAIUS479LHay86aJzFUhgnkj.jpg',12,'App\\Models\\Animal','2022-04-17 13:15:51','2022-04-17 13:15:51'),
	(78,'12/MnBVitvdZQwgxZTMDfxGz2C1oaTg7nscQClbQXas.jpg',12,'App\\Models\\Animal','2022-04-17 13:16:02','2022-04-17 13:16:02'),
	(79,'12/PYwDv1ixWQhenOD0NyfEUgzEnTDi3dGWdkPh3Jjf.jpg',12,'App\\Models\\Animal','2022-04-17 13:16:14','2022-04-17 13:16:14'),
	(80,'12/ftPYa7fFNDklcaamAsT5mewS9NsEDPlpqU5mDvXn.jpg',12,'App\\Models\\Animal','2022-04-17 13:17:03','2022-04-17 13:17:03'),
	(81,'12/G9A9eKUPpg3UHjdsh0dqLhNfueTluSL9ayVf7LQf.jpg',12,'App\\Models\\Animal','2022-04-17 13:17:17','2022-04-17 13:17:17'),
	(82,'12/5rXxGpX9a9PRexiHRVNqWylbjVigY4WvWGh1mBF2.jpg',12,'App\\Models\\Animal','2022-04-17 13:17:24','2022-04-17 13:17:24'),
	(83,'12/dFSEMbt8vueAAsY0YmDBVUTsW60dEER0F1TNGZRX.jpg',12,'App\\Models\\Animal','2022-04-17 13:17:31','2022-04-17 13:17:31'),
	(84,'12/1mcYo6R5ETx3fE5LV9SYWQgKGjRAj2jRw3kzf4yf.jpg',12,'App\\Models\\Animal','2022-04-17 13:17:37','2022-04-17 13:17:37'),
	(85,'15/XvyohZZvrBI8oYBIJmVWCFTu0GOUbzH9i1aPVUAM.jpg',15,'App\\Models\\Animal','2022-04-18 15:12:27','2022-04-18 15:12:27'),
	(86,'15/nOZyNd8Wh94iQv6xv9Uk7ldiPE9kmCEmwVLwJMtJ.jpg',15,'App\\Models\\Animal','2022-04-18 15:12:34','2022-04-18 15:12:34'),
	(87,'15/zPTfDyTOWcNjWzfDd7BBVFWHLYtWCXtFDTEqYwhU.jpg',15,'App\\Models\\Animal','2022-04-18 15:12:42','2022-04-18 15:12:42'),
	(88,'15/Ctq9cVKqSr1zBkC1klclrTjcdS6yn2HKmAFna3Z8.jpg',15,'App\\Models\\Animal','2022-04-18 15:12:51','2022-04-18 15:12:51'),
	(89,'16/fURtSRWjzCRJXbyzNw4KMYYpZXNq9ltZJeKYCL2g.jpg',16,'App\\Models\\Animal','2022-04-21 19:49:34','2022-04-21 19:49:34'),
	(90,'16/d3oxKJWzycVCpAdtBxnXuGFZvuuNxoJ4kkmt9l53.jpg',16,'App\\Models\\Animal','2022-04-21 19:49:47','2022-04-21 19:49:47'),
	(91,'16/4OFVSbFbWbLyJ51OH1osZ7v4ucaIHNaaYJJL8VJO.jpg',16,'App\\Models\\Animal','2022-04-21 19:49:59','2022-04-21 19:49:59'),
	(92,'16/AMS0oGpd03sIzbD1rVQyXvmTQ5DGjc264kThyF6A.jpg',16,'App\\Models\\Animal','2022-04-21 19:50:10','2022-04-21 19:50:10'),
	(93,'9/YRtKQQSOtuHQ3BMA0FDW4XRxbh7Eri3LuDts61Xn.jpg',9,'App\\Models\\Animal','2022-04-21 20:03:29','2022-04-21 20:03:29'),
	(94,'9/NB4Ahq28sVpLXr0Xg4cdH2142Md4BKXYBigdK4wO.jpg',9,'App\\Models\\Animal','2022-04-21 20:03:40','2022-04-21 20:03:40'),
	(95,'9/B68L9B1lkjLqjsJqcXjTxgrJQlJG3wGZsJbMcMGa.jpg',9,'App\\Models\\Animal','2022-04-21 20:03:47','2022-04-21 20:03:47'),
	(96,'9/JSJGURRagt2ckPGtrmW4VwFuqONsmI6eBvN0VdQp.jpg',9,'App\\Models\\Animal','2022-04-21 20:03:53','2022-04-21 20:03:53'),
	(97,'18/MRQf2ugi30XKSFwPXavHyplBY0GaC6NUvfthRsmm.jpg',18,'App\\Models\\Animal','2022-04-23 22:43:16','2022-04-23 22:43:16'),
	(98,'18/lbl7tjLeCegUxMs9xJ6eEh5CopqaAEDMBAGy2qyc.jpg',18,'App\\Models\\Animal','2022-04-23 22:43:23','2022-04-23 22:43:23'),
	(99,'18/oBloDO1mdLLYTObbmnx9OMYfxRZmi427oPK8kyvS.jpg',18,'App\\Models\\Animal','2022-04-23 22:43:29','2022-04-23 22:43:29'),
	(100,'18/1By7Zoj5Xpl7MMPT7KFQJP7iTY97tMbLnK7JMbNV.jpg',18,'App\\Models\\Animal','2022-04-23 22:43:35','2022-04-23 22:43:35'),
	(101,'18/YisdHtDZdt7yIihE82Ye9tqFytST5S6ZMiM9uOx2.jpg',18,'App\\Models\\Animal','2022-04-23 22:43:44','2022-04-23 22:43:44'),
	(102,'18/NV0goHzP4bb7yLlwcF9qxAYrDihBMYAQeJCnN16i.jpg',18,'App\\Models\\Animal','2022-04-23 22:43:53','2022-04-23 22:43:53'),
	(103,'18/uUJBfjHTH7LmbJPsOnlI8w8appZkozMULOcApb8s.jpg',18,'App\\Models\\Animal','2022-04-23 22:44:01','2022-04-23 22:44:01');

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logable_id` bigint(20) unsigned NOT NULL,
  `logable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_user_id_foreign` (`user_id`),
  CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
	(4,'2019_08_19_000000_create_failed_jobs_table',1),
	(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(6,'2022_03_07_221446_create_badge_colors_table',1),
	(7,'2022_03_08_111629_create_earing_colors_table',1),
	(8,'2022_03_08_125302_create_comment_types_table',1),
	(9,'2022_03_08_132714_create_sessions_table',1),
	(10,'2022_03_08_135953_create_owners_table',1),
	(11,'2022_03_08_140017_create_types_table',1),
	(12,'2022_03_08_140026_create_colors_table',1),
	(13,'2022_03_08_140041_create_statuses_table',1),
	(14,'2022_03_08_140444_create_animals_table',1),
	(15,'2022_03_08_141415_create_weights_table',1),
	(16,'2022_03_08_141426_create_comments_table',1),
	(17,'2022_03_08_141458_create_images_table',1),
	(18,'2022_04_07_204714_create_logs_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table owners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `owners`;

CREATE TABLE `owners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;

INSERT INTO `owners` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Armando','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(2,'Irma','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(3,'Samuel','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(4,'Juan Diego','2022-04-14 21:26:40','2022-04-14 21:26:40'),
	(5,'Isa','2022-04-14 22:05:52','2022-04-14 22:05:52');

/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`)
VALUES
	('w9rmLITNHFZ2ySCI8WamM4U1fZyPdYZwyGnylEmt',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiOUZnaFlKZEU5dzB0QU9OR2lGSXFQUmd5TEM0TVRLbExPVW5sVnByWSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJG9hNkwwa2UuRzdwclAuSWo4S28zMC5xSnJCbGMyOXRUc09uSlNxcExJMmFwU0kycXZ5NUxXIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRvYTZMMGtlLkc3cHJQLklqOEtvMzAucUpyQmxjMjl0VHNPbkpTcXBMSTJhcFNJMnF2eTVMVyI7fQ==',1650756471);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `badge_color_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statuses_badge_color_id_foreign` (`badge_color_id`),
  CONSTRAINT `statuses_badge_color_id_foreign` FOREIGN KEY (`badge_color_id`) REFERENCES `badge_colors` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;

INSERT INTO `statuses` (`id`, `name`, `is_active`, `badge_color_id`, `created_at`, `updated_at`)
VALUES
	(1,'Vendido',0,6,'2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(2,'Muerto',0,7,'2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(3,'Tronconero',1,3,'2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(4,'Medianero',1,3,'2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(5,'Puntero',1,3,'2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(6,'Estabulado',1,1,'2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(7,'Crianza',1,2,'2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(8,'Cargadas',1,4,'2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(9,'General',1,5,'2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(10,'Paridas',1,4,'2022-04-08 02:47:59','2022-04-08 02:47:59');

/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;

INSERT INTO `types` (`id`, `name`, `gender`, `created_at`, `updated_at`)
VALUES
	(1,'Chivo','1','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(2,'Novillo','1','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(3,'Toro','1','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(4,'Chiva','2','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(5,'Novilla','2','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(6,'Cargada','2','2022-04-08 02:47:59','2022-04-08 02:47:59'),
	(7,'Vaca','2','2022-04-08 02:47:59','2022-04-08 02:47:59');

/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`)
VALUES
	(1,'Samuel Mayorga','sams134@gmail.com','2022-04-08 02:47:59','$2y$10$oa6L0ke.G7prP.Ij8Ko30.qJrBlc29tTsOnJSqpLI2apSI2qvy5LW',NULL,NULL,NULL,NULL,NULL,'2022-04-08 02:48:00','2022-04-08 02:48:00');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table weights
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weights`;

CREATE TABLE `weights` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `weight` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `animal_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `weights_animal_id_foreign` (`animal_id`),
  CONSTRAINT `weights_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `weights` WRITE;
/*!40000 ALTER TABLE `weights` DISABLE KEYS */;

INSERT INTO `weights` (`id`, `weight`, `date`, `comment`, `animal_id`, `created_at`, `updated_at`)
VALUES
	(1,460,'2022-02-03',NULL,1,'2022-04-08 02:49:25','2022-04-08 02:49:25'),
	(2,775,'2022-02-03',NULL,4,'2022-04-14 21:45:59','2022-04-14 21:45:59'),
	(3,430,'2022-04-17',NULL,1,'2022-04-17 14:30:38','2022-04-17 14:30:38'),
	(4,775,'2022-04-17',NULL,4,'2022-04-17 14:31:17','2022-04-17 14:31:17'),
	(5,390,'2022-02-03',NULL,5,'2022-04-17 14:32:40','2022-04-17 14:32:40'),
	(6,430,'2022-04-17',NULL,5,'2022-04-17 14:33:15','2022-04-17 14:33:15'),
	(7,630,'2022-02-03',NULL,14,'2022-04-17 14:34:11','2022-04-17 14:34:11'),
	(8,655,'2022-04-17',NULL,14,'2022-04-17 14:34:53','2022-04-17 14:34:53'),
	(9,760,'2022-04-17',NULL,2,'2022-04-17 14:35:49','2022-04-17 14:35:49'),
	(10,665,'2022-04-17',NULL,7,'2022-04-17 14:36:53','2022-04-17 14:36:53'),
	(11,1085,'2022-04-17',NULL,11,'2022-04-17 14:37:41','2022-04-17 14:37:41'),
	(12,790,'2022-04-17',NULL,12,'2022-04-17 14:38:52','2022-04-17 14:38:52'),
	(13,300,'2022-04-17',NULL,13,'2022-04-17 14:39:46','2022-04-17 14:39:46'),
	(14,370,'2022-04-17',NULL,10,'2022-04-17 14:40:43','2022-04-17 14:40:43'),
	(15,100,'2022-04-18',NULL,8,'2022-04-18 15:31:45','2022-04-18 15:31:45'),
	(16,730,'2022-04-16',NULL,16,'2022-04-21 19:58:47','2022-04-21 19:58:47'),
	(17,890,'2022-04-16',NULL,9,'2022-04-23 22:38:05','2022-04-23 22:38:05'),
	(18,195,'2022-04-16',NULL,18,'2022-04-23 23:09:29','2022-04-23 23:09:29');

/*!40000 ALTER TABLE `weights` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
