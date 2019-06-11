/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : warehousemanagement

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-11 20:00:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `fun`
-- ----------------------------
DROP TABLE IF EXISTS `fun`;
CREATE TABLE `fun` (
  `Code` char(255) DEFAULT NULL,
  `Name` char(255) DEFAULT NULL,
  UNIQUE KEY `FunID` (`Code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fun
-- ----------------------------
INSERT INTO `fun` VALUES ('FID_5cff83f8a8e50', '用戶查詢');
INSERT INTO `fun` VALUES ('FID_5cff83f3cc78b', '用戶創建');
INSERT INTO `fun` VALUES ('FID_5cff84009828e', '用戶修改');
INSERT INTO `fun` VALUES ('FID_5cff834f54be2', '儲位刪除');
INSERT INTO `fun` VALUES ('FID_5cff8348c6aa5', '儲位修改');
INSERT INTO `fun` VALUES ('FID_5cff8342a909e', '儲位創建');
INSERT INTO `fun` VALUES ('FID_5cff832418531', '儲位查詢');
INSERT INTO `fun` VALUES ('FID_5cff8405c3b06', '用戶刪除');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `GroupId` char(255) DEFAULT NULL,
  `GroupName` char(255) DEFAULT NULL,
  UNIQUE KEY `GroupIds` (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------

-- ----------------------------
-- Table structure for `rfid`
-- ----------------------------
DROP TABLE IF EXISTS `rfid`;
CREATE TABLE `rfid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` char(255) NOT NULL,
  `fid` char(255) NOT NULL,
  UNIQUE KEY `RFID` (`id`),
  KEY `RFID-R` (`rid`),
  KEY `RFID-F` (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rfid
-- ----------------------------
INSERT INTO `rfid` VALUES ('61', 'RID_5cff6e1e88eba', 'FID_5cff83f8a8e50');
INSERT INTO `rfid` VALUES ('60', 'RID_5cff6e1e88eba', 'FID_5cff83f3cc78b');
INSERT INTO `rfid` VALUES ('59', 'RID_5cff6e1e88eba', 'FID_5cff8405c3b06');
INSERT INTO `rfid` VALUES ('58', 'RID_5cff6e1e88eba', 'FID_5cff84009828e');
INSERT INTO `rfid` VALUES ('57', 'RID_5cff6e1e88eba', 'FID_5cff832418531');
INSERT INTO `rfid` VALUES ('56', 'RID_5cff6e1e88eba', 'FID_5cff8342a909e');
INSERT INTO `rfid` VALUES ('55', 'RID_5cff6e1e88eba', 'FID_5cff834f54be2');
INSERT INTO `rfid` VALUES ('54', 'RID_5cff6e1e88eba', 'FID_5cff8348c6aa5');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `Code` char(255) NOT NULL,
  `Name` char(255) NOT NULL,
  UNIQUE KEY `RoleID` (`Code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('RID_5cff6e2bc2b8f', '出庫員');
INSERT INTO `role` VALUES ('RID_5cff6e263d96a', '入庫員');
INSERT INTO `role` VALUES ('RID_5cff6e1e88eba', '管理員');
INSERT INTO `role` VALUES ('RID_5cff6de180417', '入賬員');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shelfs
-- ----------------------------
INSERT INTO `shelfs` VALUES ('1', '5B0101A', null);
INSERT INTO `shelfs` VALUES ('2', '5B0101B', null);
INSERT INTO `shelfs` VALUES ('3', '5B0101C', null);
INSERT INTO `shelfs` VALUES ('4', '5B0102A', null);
INSERT INTO `shelfs` VALUES ('5', '5B0102B', null);
INSERT INTO `shelfs` VALUES ('6', '5B0102C', null);
INSERT INTO `shelfs` VALUES ('7', '1112223', '');
INSERT INTO `shelfs` VALUES ('8', '9632581', '123');
INSERT INTO `shelfs` VALUES ('9', '9632587', '测试');
INSERT INTO `shelfs` VALUES ('10', '5A0101A', '');

-- ----------------------------
-- Table structure for `urid`
-- ----------------------------
DROP TABLE IF EXISTS `urid`;
CREATE TABLE `urid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(255) NOT NULL,
  `rid` char(255) NOT NULL,
  UNIQUE KEY `URID` (`id`),
  KEY `URID-U` (`uid`),
  KEY `URID-R` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of urid
-- ----------------------------
INSERT INTO `urid` VALUES ('63', 'admin', 'RID_5cff6e2bc2b8f');
INSERT INTO `urid` VALUES ('64', 'admin', 'RID_5cff6e263d96a');
INSERT INTO `urid` VALUES ('65', 'admin', 'RID_5cff6e1e88eba');
INSERT INTO `urid` VALUES ('66', 'admin', 'RID_5cff6de180417');
INSERT INTO `urid` VALUES ('73', 'S09264888', 'RID_5cff6de180417');
INSERT INTO `urid` VALUES ('72', 'S09264888', 'RID_5cff6e263d96a');
INSERT INTO `urid` VALUES ('71', 'S09264888', 'RID_5cff6e2bc2b8f');

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
  `GroupName` char(255) DEFAULT NULL,
  `LastLoginTime` datetime DEFAULT NULL,
  `LoginTimes` int(11) DEFAULT NULL,
  `LastLoginIP` char(255) DEFAULT NULL,
  UNIQUE KEY `RowId` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('4', 'S09264888', '易志平', '$2y$10$KoGu4kim118zjGN.VzceYu.3zpyKNPh/MjaGZsJV2IMxcXF9Fl83a', 'Ping_yi@outlook.com', '測試', null, '2019-06-11 18:43:51', null, '127.0.0.1');
INSERT INTO `users` VALUES ('3', 'admin', 'admin', '$2y$10$X29HAmu7Dpps7/jiJHfBTeOVdymfHBJRvJ3K7DlqIwJg98AE.aGhO', 'admin', 'admin', null, '2019-06-11 18:44:00', null, '127.0.0.1');
