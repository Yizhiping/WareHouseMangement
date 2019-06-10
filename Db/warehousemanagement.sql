/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : warehousemanagement

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-10 18:04:54
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
INSERT INTO `fun` VALUES ('F001', '儲位查詢');
INSERT INTO `fun` VALUES ('F002', '儲位增加');
INSERT INTO `fun` VALUES ('F003', '儲位修改');
INSERT INTO `fun` VALUES ('F004', '儲位刪除');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rfid
-- ----------------------------

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
INSERT INTO `role` VALUES ('R001', '管理員');
INSERT INTO `role` VALUES ('R002', '入庫員');
INSERT INTO `role` VALUES ('R003', '出庫員');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of urid
-- ----------------------------
INSERT INTO `urid` VALUES ('1', 'S09264888', 'R001');

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
  `UDescirption` char(255) DEFAULT NULL,
  `GroupName` char(255) DEFAULT NULL,
  `LastLoginTime` datetime DEFAULT NULL,
  `LoginTimes` int(11) DEFAULT NULL,
  `LastLoginIP` char(255) DEFAULT NULL,
  UNIQUE KEY `RowId` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'S09264888', 'S09264888', '$2y$10$Sq.Q7rqMwrdkJ38Bz8jltODzyXe5FVSelFM0P09li7hhuncxldzZy', 'Ping_yi@intra.pegatroncorp.com', 'Ping_yi', 'Admin', null, null, null);
INSERT INTO `users` VALUES ('2', '987654321', 'S09264777', '13456', null, 'Ping_er', 'User', null, null, null);
