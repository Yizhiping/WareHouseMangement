# Host: localhost  (Version: 5.5.53)
# Date: 2019-06-18 02:14:10
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "customermapping"
#

DROP TABLE IF EXISTS `customermapping`;
CREATE TABLE `customermapping` (
  `Customer` char(255) NOT NULL,
  `Item` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "customermapping"
#

/*!40000 ALTER TABLE `customermapping` DISABLE KEYS */;
INSERT INTO `customermapping` VALUES ('ARRIS','');
/*!40000 ALTER TABLE `customermapping` ENABLE KEYS */;

#
# Structure for table "events"
#

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventType` char(255) NOT NULL,
  `FunId` char(255) NOT NULL,
  `Description` char(255) NOT NULL,
  `eTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `uid` char(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "events"
#

/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

#
# Structure for table "fun"
#

DROP TABLE IF EXISTS `fun`;
CREATE TABLE `fun` (
  `Code` char(255) DEFAULT NULL,
  `Name` char(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  UNIQUE KEY `FunID` (`Code`),
  UNIQUE KEY `NameId` (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "fun"
#

/*!40000 ALTER TABLE `fun` DISABLE KEYS */;
INSERT INTO `fun` VALUES ('FID_5cff83f8a8e50','用戶查詢',NULL),('FID_5cff83f3cc78b','用戶創建',''),('FID_5cff84009828e','用戶修改',NULL),('FID_5cff834f54be2','儲位刪除','shelfDel'),('FID_5cff8348c6aa5','儲位修改',NULL),('FID_5cff8342a909e','儲位創建','shelfAdd'),('FID_5cff832418531','儲位查詢',NULL),('FID_5cff8405c3b06','用戶刪除',NULL),('FID_5d034aaca2804','貨物入庫',NULL),('FID_5d034ab318e54','貨物出庫',NULL),('FID_5d034abc98b6d','貨物轉移',NULL),('FID_5d034ac30a39c','貨物查詢',NULL);
/*!40000 ALTER TABLE `fun` ENABLE KEYS */;

#
# Structure for table "goods"
#

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PalletId` char(255) NOT NULL,
  `Model` char(255) NOT NULL,
  `Item` char(255) NOT NULL,
  `SO` char(255) NOT NULL,
  `Qty` char(255) NOT NULL,
  `Customer` char(255) DEFAULT NULL,
  `ShelfId` char(255) NOT NULL,
  `Uid` char(255) DEFAULT NULL,
  `Datein` datetime NOT NULL,
  `ModifyTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `palletId` (`PalletId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

#
# Data for table "goods"
#

INSERT INTO `goods` VALUES (1,'W000805714-005','11111','90B2AA100040','W000805714','120',NULL,'5A0101A','admin','2019-06-14 10:20:01','2019-06-14 22:44:52'),(2,'Z21924407','IPC4100','90B3-9A10010','W000802766','360',NULL,'5A0101A','admin','0000-00-00 00:00:00','2019-06-14 22:44:52'),(3,'W000795898-033','TG2482A','90B2-AA10040','W000795898','120',NULL,'5A0101A','admin','0000-00-00 00:00:00',NULL),(4,'W000805714-042','TG2482A','90B2AA100040','W000805714','120',NULL,'5A0101A','admin','0000-00-00 00:00:00','2019-06-14 22:44:52'),(5,'W000805714-006','TG2482A','90B2AA100040','W000805714','120',NULL,'5A0101G','admin','0000-00-00 00:00:00',NULL),(6,'Z41924307','PS5200IMC','90B399100010','W000802769','320',NULL,'5A0101A','admin','0000-00-00 00:00:00','2019-06-14 22:44:52'),(7,'W000800084-009','TG2482A','90B2AA100010','W000800084','120',NULL,'5A0101A','admin','0000-00-00 00:00:00','2019-06-14 22:44:52'),(8,'W000800084-010','TG2482A','90B2AA100010','W000800084','120',NULL,'5A0101A','admin','0000-00-00 00:00:00','2019-06-14 22:44:52'),(9,'W000804970-004','CM8200B','90B2-9410020','W000804970','270',NULL,'5A0101E','admin','0000-00-00 00:00:00',NULL),(10,'W000805007-047','TG2492LG','90B2-8F10600','W000805007','126',NULL,'5A0101F','admin','2019-06-14 10:24:59',NULL),(11,'Z01924402','E934','90B2-9L10020','W000792545','90','','5A0101D','admin','2019-06-14 13:10:33',NULL),(12,'W000805010-007','TG2492LG','90B2-8F10600','W000805010','126','','5A0101D','admin','2019-06-14 14:53:36',NULL),(18,'W000800084-015','TG2482A','90B2AA100010','W000800084','120','','5A0101G','admin','2019-06-14 15:41:13','2019-06-14 15:54:56'),(19,'W000805010-006','TG2492LG','90B2-8F10600','W000805010','126','','5A0101D','admin','2019-06-14 15:43:35','2019-06-14 15:43:35');

#
# Structure for table "goods_shipped"
#

DROP TABLE IF EXISTS `goods_shipped`;
CREATE TABLE `goods_shipped` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PalletId` char(255) NOT NULL,
  `Model` char(255) NOT NULL,
  `Item` char(255) NOT NULL,
  `SO` char(255) NOT NULL,
  `Qty` char(255) NOT NULL,
  `Customer` char(255) DEFAULT NULL,
  `UidIn` char(255) NOT NULL,
  `UidOut` char(255) NOT NULL,
  `Datein` datetime NOT NULL,
  `DateOut` datetime NOT NULL,
  `ModifyTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `palletId` (`PalletId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "goods_shipped"
#

INSERT INTO `goods_shipped` VALUES (1,'W000805714-005','11111','90B2AA100040','W000805714','120',NULL,'admin','','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Z21924407','IPC4100','90B3-9A10010','W000802766','360',NULL,'admin','','0000-00-00 00:00:00','2019-06-14 12:07:39','0000-00-00 00:00:00'),(4,'W000795898-033','TG2482A','90B2-AA10040','W000795898','120',NULL,'admin','','0000-00-00 00:00:00','2019-06-14 12:10:13','0000-00-00 00:00:00'),(7,'Z31924310','F096','90B392100020','W000804122','216','','admin','admin','0000-00-00 00:00:00','2019-06-14 15:24:20','0000-00-00 00:00:00'),(8,'Z01924317','E934','90B2-9L10020','W000792545','90','','admin','admin','0000-00-00 00:00:00','2019-06-14 15:25:05','0000-00-00 00:00:00'),(9,'Z01924320','E990','90B395100010','W000805802','216','','admin','admin','0000-00-00 00:00:00','2019-06-14 15:31:58','0000-00-00 00:00:00'),(10,'Z21924310','IPC4100','90B3-9A10010','W000802764','360','','admin','admin','2019-06-14 15:33:50','2019-06-14 15:34:20','0000-00-00 00:00:00'),(11,'W000804970-008','CM8200B','90B2-9410020','W000804970','270','','admin','admin','2019-06-14 15:39:59','2019-06-14 15:40:08','0000-00-00 00:00:00');

#
# Structure for table "rfid"
#

DROP TABLE IF EXISTS `rfid`;
CREATE TABLE `rfid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` char(255) NOT NULL,
  `fid` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

#
# Data for table "rfid"
#

/*!40000 ALTER TABLE `rfid` DISABLE KEYS */;
INSERT INTO `rfid` VALUES (74,'RID_5cff6e263d96a','FID_5cff83f8a8e50'),(75,'RID_5cff6e263d96a','FID_5d034aaca2804'),(76,'RID_5cff6e263d96a','FID_5d034ac30a39c'),(77,'RID_5cff6e263d96a','FID_5d034abc98b6d'),(78,'RID_5cff6e2bc2b8f','FID_5cff83f8a8e50'),(79,'RID_5cff6e2bc2b8f','FID_5d034aaca2804'),(80,'RID_5cff6e2bc2b8f','FID_5d034ac30a39c'),(81,'RID_5cff6e2bc2b8f','FID_5d034abc98b6d'),(82,'RID_5cff6e1e88eba','FID_5cff8348c6aa5'),(83,'RID_5cff6e1e88eba','FID_5cff834f54be2'),(84,'RID_5cff6e1e88eba','FID_5cff8342a909e'),(85,'RID_5cff6e1e88eba','FID_5cff832418531'),(86,'RID_5cff6e1e88eba','FID_5cff84009828e'),(87,'RID_5cff6e1e88eba','FID_5cff8405c3b06'),(88,'RID_5cff6e1e88eba','FID_5cff83f3cc78b'),(89,'RID_5cff6e1e88eba','FID_5cff83f8a8e50'),(90,'RID_5cff6e1e88eba','FID_5d034aaca2804'),(112,'RID_5d03e3287e235','FID_5cff834f54be2');
/*!40000 ALTER TABLE `rfid` ENABLE KEYS */;

#
# Structure for table "role"
#

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `Code` char(255) NOT NULL,
  `Name` char(255) NOT NULL,
  UNIQUE KEY `RoleID` (`Code`),
  UNIQUE KEY `NameId` (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "role"
#

/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES ('RID_5cff6e2bc2b8f','出庫員'),('RID_5cff6e263d96a','入庫員'),('RID_5cff6e1e88eba','管理員'),('RID_5cff6de180417','入賬員'),('RID_5d03e3287e235','測試角色');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

#
# Structure for table "shelfs"
#

DROP TABLE IF EXISTS `shelfs`;
CREATE TABLE `shelfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ShelfID` char(255) DEFAULT NULL,
  `Description` char(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `shelfID` (`ShelfID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

#
# Data for table "shelfs"
#

/*!40000 ALTER TABLE `shelfs` DISABLE KEYS */;
INSERT INTO `shelfs` VALUES (21,'5A0101G',''),(20,'5A0101F',''),(19,'5A0101E',''),(25,'5A0101B',''),(26,'5A0101C',''),(23,'5A0101H',''),(27,'5A0101D',''),(29,'5A0101Y','');
/*!40000 ALTER TABLE `shelfs` ENABLE KEYS */;

#
# Structure for table "urid"
#

DROP TABLE IF EXISTS `urid`;
CREATE TABLE `urid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(255) NOT NULL,
  `rid` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

#
# Data for table "urid"
#

/*!40000 ALTER TABLE `urid` DISABLE KEYS */;
INSERT INTO `urid` VALUES (63,'admin','RID_5cff6e2bc2b8f'),(64,'admin','RID_5cff6e263d96a'),(65,'admin','RID_5cff6e1e88eba'),(66,'admin','RID_5cff6de180417'),(82,'test','RID_5d03e3287e235');
/*!40000 ALTER TABLE `urid` ENABLE KEYS */;

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Uid` char(11) NOT NULL,
  `UName` char(255) NOT NULL,
  `PassWord` char(255) NOT NULL,
  `Mail` char(255) DEFAULT NULL,
  `Descirption` char(255) DEFAULT NULL,
  `LastLoginTime` datetime DEFAULT NULL,
  `LoginTimes` int(11) DEFAULT NULL,
  `LastLoginIP` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `RowId` (`id`),
  UNIQUE KEY `Uid` (`Uid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'admin','admin','$2y$10$X29HAmu7Dpps7/jiJHfBTeOVdymfHBJRvJ3K7DlqIwJg98AE.aGhO','admin','admin','2019-06-18 01:35:02',NULL,'127.0.0.1'),(8,'test','test','$2y$10$LKGLLS4yRNg9O.T2PYQNO.XuoOaSBIplZ4AXt0gTUcGGriglJp7ly','test','test','2019-06-18 01:36:00',NULL,'127.0.0.1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
