-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `action`;
CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `byUser` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `organizersId` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `byUser` (`byUser`),
  CONSTRAINT `action_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `byUser` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `keyWords` varchar(200) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `serialId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `lastChange` datetime NOT NULL,
  `commentsAllow` tinyint(1) NOT NULL,
  `voteAllow` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `voteCount` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `byUser` (`byUser`),
  KEY `sectionId` (`sectionId`),
  KEY `serialId` (`serialId`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`sectionId`) REFERENCES `section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `article_ibfk_3` FOREIGN KEY (`serialId`) REFERENCES `serial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `artTeam`;
CREATE TABLE `artTeam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  CONSTRAINT `artTeam_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `byUser` int(11) NOT NULL,
  `forId` int(11) NOT NULL,
  `forWhat` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `vote` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `byUser` (`byUser`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `commentUnder`;
CREATE TABLE `commentUnder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `byUser` int(11) NOT NULL,
  `forComment` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `vote` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `byUser` (`byUser`),
  KEY `forComment` (`forComment`),
  CONSTRAINT `commentUnder_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `commentUnder_ibfk_2` FOREIGN KEY (`forComment`) REFERENCES `comment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `byUser` int(11) NOT NULL,
  `forUser` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `readed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `byUser` (`byUser`),
  KEY `forUser` (`forUser`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`forUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `multimedia`;
CREATE TABLE `multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `byUser` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `url` varchar(200) NOT NULL,
  `used` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `byUser` (`byUser`),
  KEY `used` (`used`),
  CONSTRAINT `multimedia_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `multimedia_ibfk_3` FOREIGN KEY (`used`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `byUser` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `keyWords` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `byUser` (`byUser`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `newWriter`;
CREATE TABLE `newWriter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` varchar(500) NOT NULL,
  `aboutUser` text NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `serial`;
CREATE TABLE `serial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `name` int(11) NOT NULL,
  `description` text NOT NULL,
  `articleOrder` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(130) NOT NULL,
  `nickName` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `born` date NOT NULL,
  `registerTime` datetime NOT NULL,
  `checkCode` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blockedUsersId` varchar(300) NOT NULL,
  `wall` tinyint(1) NOT NULL,
  `permissions` varchar(30) NOT NULL,
  `mailList` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickName` (`nickName`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2015-08-19 11:07:32
