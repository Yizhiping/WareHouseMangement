/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : warehousemanagement

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-06 17:01:30
*/

SET FOREIGN_KEY_CHECKS=0;

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
