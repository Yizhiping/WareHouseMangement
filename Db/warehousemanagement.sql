/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : warehousemanagement

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-19 08:11:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `customermapping`
-- ----------------------------
DROP TABLE IF EXISTS `customermapping`;
CREATE TABLE `customermapping` (
  `Customer` char(255) NOT NULL,
  `Item` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customermapping
-- ----------------------------
INSERT INTO `customermapping` VALUES ('ARRIS', '');
INSERT INTO `customermapping` VALUES ('ARRIS', '');

-- ----------------------------
-- Table structure for `events`
-- ----------------------------
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

-- ----------------------------
-- Records of events
-- ----------------------------

-- ----------------------------
-- Table structure for `fun`
-- ----------------------------
DROP TABLE IF EXISTS `fun`;
CREATE TABLE `fun` (
  `Code` char(255) DEFAULT NULL,
  `Name` char(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  UNIQUE KEY `FunID` (`Code`),
  UNIQUE KEY `NameId` (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fun
-- ----------------------------
INSERT INTO `fun` VALUES ('FID_5cff83f8a8e50', '用戶查詢', null);
INSERT INTO `fun` VALUES ('FID_5cff83f3cc78b', '用戶創建', '');
INSERT INTO `fun` VALUES ('FID_5cff84009828e', '用戶修改', null);
INSERT INTO `fun` VALUES ('FID_5cff834f54be2', '儲位刪除', 'shelfDel');
INSERT INTO `fun` VALUES ('FID_5cff8348c6aa5', '儲位修改', null);
INSERT INTO `fun` VALUES ('FID_5cff8342a909e', '儲位創建', 'shelfAdd');
INSERT INTO `fun` VALUES ('FID_5cff832418531', '儲位查詢', null);
INSERT INTO `fun` VALUES ('FID_5cff8405c3b06', '用戶刪除', null);
INSERT INTO `fun` VALUES ('FID_5d034aaca2804', '貨物入庫', null);
INSERT INTO `fun` VALUES ('FID_5d034ab318e54', '貨物出庫', null);
INSERT INTO `fun` VALUES ('FID_5d034abc98b6d', '貨物轉移', null);
INSERT INTO `fun` VALUES ('FID_5d034ac30a39c', '貨物查詢', null);

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for `goods_shipped`
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_shipped
-- ----------------------------
INSERT INTO `goods_shipped` VALUES ('23', 'Z21924404', 'IPC4100', '90B3-9A10010', 'W000802765', '360', '', 'admin', 'admin', '2019-06-18 17:07:10', '2019-06-18 18:09:29', '2019-06-18 18:09:29');
INSERT INTO `goods_shipped` VALUES ('24', 'Z11924402', 'DCX4400', '90B3-A710010', 'W000804169', '400', '', 'admin', 'admin', '2019-06-18 17:07:26', '2019-06-18 18:09:29', '2019-06-18 18:09:29');
INSERT INTO `goods_shipped` VALUES ('25', 'W000800084-025', 'TG2482A', '90B2AA100010', 'W000800084', '120', '', 'admin', 'admin', '2019-06-18 17:07:40', '2019-06-18 18:09:29', '2019-06-18 18:09:29');
INSERT INTO `goods_shipped` VALUES ('28', 'W000804970-012', 'CM8200B', '90B2-9410020', 'W000804970', '270', '', 'admin', 'admin', '2019-06-18 17:05:05', '2019-06-18 18:09:11', '2019-06-18 18:09:11');

-- ----------------------------
-- Table structure for `rfid`
-- ----------------------------
DROP TABLE IF EXISTS `rfid`;
CREATE TABLE `rfid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` char(255) NOT NULL,
  `fid` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rfid
-- ----------------------------
INSERT INTO `rfid` VALUES ('74', 'RID_5cff6e263d96a', 'FID_5cff83f8a8e50');
INSERT INTO `rfid` VALUES ('75', 'RID_5cff6e263d96a', 'FID_5d034aaca2804');
INSERT INTO `rfid` VALUES ('76', 'RID_5cff6e263d96a', 'FID_5d034ac30a39c');
INSERT INTO `rfid` VALUES ('77', 'RID_5cff6e263d96a', 'FID_5d034abc98b6d');
INSERT INTO `rfid` VALUES ('78', 'RID_5cff6e2bc2b8f', 'FID_5cff83f8a8e50');
INSERT INTO `rfid` VALUES ('79', 'RID_5cff6e2bc2b8f', 'FID_5d034aaca2804');
INSERT INTO `rfid` VALUES ('80', 'RID_5cff6e2bc2b8f', 'FID_5d034ac30a39c');
INSERT INTO `rfid` VALUES ('81', 'RID_5cff6e2bc2b8f', 'FID_5d034abc98b6d');
INSERT INTO `rfid` VALUES ('82', 'RID_5cff6e1e88eba', 'FID_5cff8348c6aa5');
INSERT INTO `rfid` VALUES ('83', 'RID_5cff6e1e88eba', 'FID_5cff834f54be2');
INSERT INTO `rfid` VALUES ('84', 'RID_5cff6e1e88eba', 'FID_5cff8342a909e');
INSERT INTO `rfid` VALUES ('85', 'RID_5cff6e1e88eba', 'FID_5cff832418531');
INSERT INTO `rfid` VALUES ('86', 'RID_5cff6e1e88eba', 'FID_5cff84009828e');
INSERT INTO `rfid` VALUES ('87', 'RID_5cff6e1e88eba', 'FID_5cff8405c3b06');
INSERT INTO `rfid` VALUES ('88', 'RID_5cff6e1e88eba', 'FID_5cff83f3cc78b');
INSERT INTO `rfid` VALUES ('89', 'RID_5cff6e1e88eba', 'FID_5cff83f8a8e50');
INSERT INTO `rfid` VALUES ('90', 'RID_5cff6e1e88eba', 'FID_5d034aaca2804');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `Code` char(255) NOT NULL,
  `Name` char(255) NOT NULL,
  UNIQUE KEY `RoleID` (`Code`),
  UNIQUE KEY `NameId` (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('RID_5cff6e2bc2b8f', '出庫員');
INSERT INTO `role` VALUES ('RID_5cff6e263d96a', '入庫員');
INSERT INTO `role` VALUES ('RID_5cff6e1e88eba', '管理員');
INSERT INTO `role` VALUES ('RID_5cff6de180417', '入賬員');
INSERT INTO `role` VALUES ('RID_5d03e3287e235', '測試角色');

-- ----------------------------
-- Table structure for `shelfs`
-- ----------------------------
DROP TABLE IF EXISTS `shelfs`;
CREATE TABLE `shelfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ShelfID` char(255) DEFAULT NULL,
  `Description` char(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `shelfID` (`ShelfID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shelfs
-- ----------------------------
INSERT INTO `shelfs` VALUES ('21', '5A0101G', '');
INSERT INTO `shelfs` VALUES ('20', '5A0101F', '');
INSERT INTO `shelfs` VALUES ('19', '5A0101E', '');
INSERT INTO `shelfs` VALUES ('30', '5A0101A', '');
INSERT INTO `shelfs` VALUES ('26', '5A0101C', '');
INSERT INTO `shelfs` VALUES ('23', '5A0101H', '');
INSERT INTO `shelfs` VALUES ('27', '5A0101D', '');
INSERT INTO `shelfs` VALUES ('32', '5A0101I', '');
INSERT INTO `shelfs` VALUES ('31', '5A0101B', '');

-- ----------------------------
-- Table structure for `urid`
-- ----------------------------
DROP TABLE IF EXISTS `urid`;
CREATE TABLE `urid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(255) NOT NULL,
  `rid` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of urid
-- ----------------------------
INSERT INTO `urid` VALUES ('63', 'admin', 'RID_5cff6e2bc2b8f');
INSERT INTO `urid` VALUES ('64', 'admin', 'RID_5cff6e263d96a');
INSERT INTO `urid` VALUES ('65', 'admin', 'RID_5cff6e1e88eba');
INSERT INTO `urid` VALUES ('66', 'admin', 'RID_5cff6de180417');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'admin', 'admin', '$2y$10$X29HAmu7Dpps7/jiJHfBTeOVdymfHBJRvJ3K7DlqIwJg98AE.aGhO', 'admin', 'admin', '2019-06-18 18:08:11', null, '192.168.43.1');
INSERT INTO `users` VALUES ('9', 'S09264888', '易志平', '$2y$10$FoEwJGsfZmAUUJTTz4Jl2OatagI8F6M90KLDGumrNTv6VW3s1vQAm', '', '', '2019-06-18 15:30:19', null, '127.0.0.1');
