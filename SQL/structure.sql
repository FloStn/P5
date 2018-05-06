/*
Navicat MySQL Data Transfer

Source Server         : Millenium
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : projet_5

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2018-05-05 19:22:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
CREATE TABLE `comments` (
  `idCmt` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `author` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `addDateTime` datetime NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`idCmt`),
  KEY `fk_comments_posts1_idx` (`post`),
  KEY `fk_comments_users1_idx` (`author`),
  CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`post`) REFERENCES `posts` (`idPost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`author`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
CREATE TABLE `posts` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `chapo` longtext NOT NULL,
  `content` longtext NOT NULL,
  `author` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `addDateTime` datetime NOT NULL,
  `lastModifDateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`idPost`),
  KEY `fk_posts_users_idx` (`author`),
  CONSTRAINT `fk_posts_users` FOREIGN KEY (`author`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(10) NOT NULL DEFAULT '0',
  `avatar` varchar(100) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
