# Host: 127.0.0.1  (Version 8.0.30)
# Date: 2023-10-06 09:26:48
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "kategori"
#

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(50) NOT NULL,
  `kategori_seo` text NOT NULL,
  `kategori_icon` varchar(50) NOT NULL,
  `kategori_update` datetime DEFAULT NULL,
  `kategori_create` datetime DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

#
# Data for table "kategori"
#

INSERT INTO `kategori` VALUES (5,'Snacks','snacks','',NULL,'2023-05-19 09:38:22'),(6,'Drink','drink','','2023-05-19 09:43:36','2023-05-19 09:38:25'),(7,'Main Course','main-course','',NULL,'2023-05-19 09:38:30'),(9,'Dessert','dessert','',NULL,'2023-05-19 09:38:40');

#
# Structure for table "menu"
#

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `kategori_id` int NOT NULL,
  `menu_kode` int(5) unsigned zerofill NOT NULL DEFAULT '00000',
  `menu_nama` varchar(50) NOT NULL,
  `menu_seo` text NOT NULL,
  `menu_deskripsi` text NOT NULL,
  `menu_harga` int NOT NULL DEFAULT '0' COMMENT 'Harga',
  `menu_waktu` int NOT NULL DEFAULT '0' COMMENT 'Waktu Masak',
  `menu_foto` varchar(100) DEFAULT NULL COMMENT 'Foto Masakan',
  `menu_jual` int NOT NULL DEFAULT '0',
  `menu_status` enum('0','1') DEFAULT '1',
  `menu_create` datetime DEFAULT NULL,
  `menu_update` datetime DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3;

#
# Data for table "menu"
#

INSERT INTO `menu` VALUES (5,6,00003,'CAPPUCINO DINGIN','cappucino-dingin','',28000,0,'kopi_cup.jpg',1,'1','2023-05-19 09:58:29',NULL),(6,6,00004,'CAPPUCINO PANAS','cappucino-panas','',25000,0,'kopi_cup.jpg',0,'1','2023-05-19 10:20:24',NULL),(20,6,00018,'KOPI MLEJIT DINGIN','kopi-mlejit-dingin','Espresso Cube dengan susu kental manis plus Fresh Milk',30000,0,'kopi_cup.jpg',0,'1','2023-05-19 17:16:38',NULL),(26,6,00024,'Teh Longan Dingin','teh-longan-dingin','Teh dengan buah leci di dalamnya',30000,0,'kopi_cup.jpg',0,'1','2023-05-24 16:54:41',NULL),(27,6,00025,'Teh Longan Panas','teh-longan-panas','Teh dengan buah leci di dalamnya',25000,0,'kopi_cup.jpg',0,'1','2023-05-24 16:54:59',NULL),(29,5,00027,'ROTI ALL VARIANT','roti-all-variant','',10000,0,'PNG_image_9.PNG',0,'1','2023-06-15 13:59:55',NULL),(30,6,00028,'TEH TARIK (ICE)','teh-tarik-ice','',27000,0,'tehtarik.jpeg',0,'1','2023-06-15 14:03:45',NULL),(31,6,00029,'TEH TARIK (HOT)','teh-tarik-hot','',25000,0,'americano.jpeg',0,'1','2023-06-15 14:04:17',NULL),(32,7,00030,'SIOMAY','siomay','',30000,0,'siomay.jpeg',0,'1','2023-06-15 14:05:08',NULL),(33,5,00031,'CROISSANT CHOCO','croissant-choco','',15000,0,'choco.jpeg',0,'1','2023-06-15 14:05:46',NULL),(34,5,00032,'CROISSANT CHEESE','croissant-cheese','',15000,0,'PNG_image_3.PNG',0,'1','2023-06-15 14:07:22',NULL),(35,5,00033,'CHICKEN CURRY PUFF','chicken-curry-puff','',15000,0,'PNG_image_5.PNG',0,'1','2023-06-15 14:08:01',NULL),(36,5,00034,'SPINACH PUFF','spinach-puff','',15000,0,'PNG_image_5.PNG',0,'1','2023-06-15 14:08:40',NULL),(37,6,00035,'BUTTERFLY PUNCH','butterfly-punch','',30000,0,'butterfly.jpeg',0,'1','2023-06-15 14:09:07','2023-06-26 13:54:03'),(38,6,00036,'KOPI SUSU GULA AREN','kopi-susu-gula-aren','',30000,0,'kopi.jpeg',0,'1','2023-06-15 14:09:56',NULL),(39,6,00037,'CAFE LATTE (ICE)','cafe-latte-ice','',33000,0,'kopsus.jpeg',0,'1','2023-06-15 14:36:42','2023-06-26 14:40:27'),(40,6,00038,'CAFE LATTE (HOT)','cafe-latte-hot','',30000,0,'americano.jpeg',0,'1','2023-06-15 14:37:25','2023-06-26 14:40:01'),(41,6,00039,'ICED WATER','iced-water','Iced water',5000,0,'iced_water.jpg',0,'1','2023-06-26 13:52:23','2023-06-26 13:52:46'),(42,6,00040,'Le Minerale (Cool)','le-minerale-cool','Le minerale dingin',5000,0,'le-minerale.jpg',0,'1','2023-06-26 14:25:10','2023-06-26 14:26:17');

#
# Structure for table "testimonial"
#

DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE `testimonial` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `known_as` varchar(255) DEFAULT NULL,
  `text` text,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "testimonial"
#


#
# Structure for table "transaction"
#

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `no_invoice` int(6) unsigned zerofill DEFAULT '000000',
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `telepon_pemesan` varchar(255) DEFAULT NULL,
  `alamat_pemesan` text,
  `notes` text,
  `total_item` int unsigned DEFAULT NULL,
  `subtotal` int DEFAULT NULL,
  `ppn` int DEFAULT NULL,
  `grand_total` bigint DEFAULT NULL,
  `order_time` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

#
# Data for table "transaction"
#

INSERT INTO `transaction` VALUES (1,000001,'Agus`','agus@gmail.com','085890630188','Jakarta Barat','-',1,30000,3000,33000,'2023-05-25 09:19:38'),(2,000002,'Arfan Bayu Hariadhi','','082122749774','Komplek Parkir Angkasa, Depan SMA 9 Halim','',1,28000,2800,30800,'2023-06-12 11:28:47');

#
# Structure for table "transaction_detail"
#

DROP TABLE IF EXISTS `transaction_detail`;
CREATE TABLE `transaction_detail` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `id_transaction` int(6) unsigned zerofill DEFAULT '000000',
  `id_product` int NOT NULL,
  `jumlah` int DEFAULT NULL,
  `harga_satuan` int DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

#
# Data for table "transaction_detail"
#

INSERT INTO `transaction_detail` VALUES (1,000001,25,1,30000,30000.00,'2023-05-25 09:19:38'),(2,000002,5,1,28000,28000.00,'2023-06-12 11:28:47');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `image` text,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  `date_created` int DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Adrian Pratama','adpratama.adp@gmail.com','elazhariian','default.jpg','$2y$10$jma2..c5wm.qw2MV5ImX.ugIn3ncOMp6sNaBalgTA4ST8DjmqTw2W',2,1,1687761297),(2,'Admin','admin@gmail.com','admin','default.jpg','$2y$10$z3z/2tlfMiliGKxlVNgjS.9eE6SQx9.I4uyJT.ayhTKKcFTduD7k6',1,1,1687770224);

#
# Structure for table "user_menu"
#

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

#
# Data for table "user_menu"
#

INSERT INTO `user_menu` VALUES (1,'Admin'),(2,'User');

#
# Structure for table "user_role"
#

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

#
# Data for table "user_role"
#

INSERT INTO `user_role` VALUES (1,'Administrator'),(2,'Member');

#
# Structure for table "villa_facility_detail"
#

DROP TABLE IF EXISTS `villa_facility_detail`;
CREATE TABLE `villa_facility_detail` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

#
# Data for table "villa_facility_detail"
#

INSERT INTO `villa_facility_detail` VALUES (1,'Ruang Tamu',1),(2,'2 Kamar VVIP Dengan Kamar Mandi',1),(3,'2 Kamar VIP',1),(4,'2 Kamar Mandi di Luar Kamar',1),(5,'9 Kasur Barak',2),(6,'Selimut',2),(7,'4 Kamar Mandi',2),(8,'9 Kasur Barak (Kapasitas 18 Orang)',3),(9,'Selimut',3),(10,'4 Kamar Mandi',3),(11,'1 Kamar VVIP (Dengan Kamar Mandi di Dalam)',4),(12,'2 Kamar VIP',4),(13,'2 Kamar Mandi di Luar Ruangan',4),(14,'Ruang Serbaguna (Dapat Menjadi Ruang Meeting & Barak Kapasistas 18 Orang)',5),(15,'Dapat Diubah Sebagai Barak',5),(16,'9 Kasur Barak',6),(17,'Selimut',6),(18,'Handuk',1),(19,'Perlengkapan Mandi',1),(20,'Water Heater',1),(21,'Dispenser',1),(22,'Wifi',1),(23,'Smart TV',1),(24,'Kulkas',1);

#
# Structure for table "villa_floor"
#

DROP TABLE IF EXISTS `villa_floor`;
CREATE TABLE `villa_floor` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `menu_id` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

#
# Data for table "villa_floor"
#

INSERT INTO `villa_floor` VALUES (1,'Lantai Bawah',1,NULL),(2,'Lantai Atas',1,NULL),(3,'Lantai Bawah',2,NULL),(4,'Lantai Atas',2,NULL),(5,'Lantai Bawah',3,NULL),(6,'Lantai Atas',3,NULL);

#
# Structure for table "villa_menu"
#

DROP TABLE IF EXISTS `villa_menu`;
CREATE TABLE `villa_menu` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `photo` text,
  `slug` varchar(255) DEFAULT NULL,
  `add_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `latest_update_by` varchar(255) DEFAULT NULL,
  `latest_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

#
# Data for table "villa_menu"
#

INSERT INTO `villa_menu` VALUES (1,'Asoy','Ini villa jenis asoy','villa-asoy.jpg','asoy',NULL,NULL,NULL,NULL),(2,'Geboy','Ini Villa Jenis Geboy','villa-geboy.jpg','geboy',NULL,NULL,NULL,NULL),(3,'Geol','Ini Villa Jenis Geol','villa-geol.jpg','geol',NULL,NULL,NULL,NULL);

#
# Structure for table "villa_photo"
#

DROP TABLE IF EXISTS `villa_photo`;
CREATE TABLE `villa_photo` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `villa_id` int DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

#
# Data for table "villa_photo"
#

INSERT INTO `villa_photo` VALUES (1,'asoy-1.png',1,'Villa Asoy'),(2,'asoy-2.png',1,'Halaman Depan'),(3,'asoy-3.png',1,'Area Ruang Utama - Dapur'),(4,'asoy-4.png',1,'VVIP 1');

#
# View "v_menu"
#

DROP VIEW IF EXISTS `v_menu`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_menu`
  AS
SELECT
  `m`.`menu_id`,
  `m`.`kategori_id`,
  `m`.`menu_kode`,
  `m`.`menu_nama`,
  `m`.`menu_seo`,
  `m`.`menu_deskripsi`,
  `m`.`menu_harga`,
  `m`.`menu_waktu`,
  `m`.`menu_foto`,
  `m`.`menu_jual`,
  `m`.`menu_update`,
  `k`.`kategori_nama`,
  `k`.`kategori_seo`
FROM
  (`menu` m
    JOIN `kategori` k ON ((`m`.`kategori_id` = `k`.`kategori_id`)));
