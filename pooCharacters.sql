-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Characters`;
CREATE TABLE `Characters` (
  `idChara` int(11) NOT NULL AUTO_INCREMENT,
  `nameChara` varchar(255) NOT NULL,
  `health` int(10) NOT NULL,
  `mana` int(10) NOT NULL,
  `lvl` int(10) NOT NULL,
  `damage` int(11) NOT NULL,
  `weapon_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  PRIMARY KEY (`idChara`),
  KEY `weapon_id` (`weapon_id`),
  KEY `job_id` (`job_id`),
  CONSTRAINT `Characters_ibfk_2` FOREIGN KEY (`weapon_id`) REFERENCES `Weapon` (`idWeapon`),
  CONSTRAINT `Characters_ibfk_3` FOREIGN KEY (`job_id`) REFERENCES `Job` (`idJob`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `Characters` (`idChara`, `nameChara`, `health`, `mana`, `lvl`, `damage`, `weapon_id`, `job_id`) VALUES
(1,	'Olivier',	100,	50,	1,	20,	2,	2),
(2,	'Reivilo',	100,	70,	2,	25,	3,	3),
(3,	'Wissem',	70,	100,	6,	40,	1,	1),
(10,	'Clement le Simple',	20,	20,	1,	10,	3,	3);

DROP TABLE IF EXISTS `Job`;
CREATE TABLE `Job` (
  `idJob` int(11) NOT NULL AUTO_INCREMENT,
  `nameJob` varchar(255) NOT NULL,
  PRIMARY KEY (`idJob`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `Job` (`idJob`, `nameJob`) VALUES
(1,	'Mage'),
(2,	'Hero'),
(3,	'Ecuyer');

DROP TABLE IF EXISTS `Monster`;
CREATE TABLE `Monster` (
  `idMonster` int(11) NOT NULL AUTO_INCREMENT,
  `nameMonster` varchar(255) NOT NULL,
  `health` int(11) NOT NULL,
  `damage` int(11) NOT NULL,
  PRIMARY KEY (`idMonster`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `Monster` (`idMonster`, `nameMonster`, `health`, `damage`) VALUES
(1,	'Smile',	50,	5),
(2,	'Corbak',	100,	25),
(5,	'a',	1111,	11111);

DROP TABLE IF EXISTS `Weapon`;
CREATE TABLE `Weapon` (
  `idWeapon` int(11) NOT NULL AUTO_INCREMENT,
  `nameWeapon` varchar(255) NOT NULL,
  `damageWeapon` int(4) NOT NULL,
  PRIMARY KEY (`idWeapon`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `Weapon` (`idWeapon`, `nameWeapon`, `damageWeapon`) VALUES
(1,	'un baton magique',	12),
(2,	'une lame courte',	25),
(3,	'une grosse lame',	27);

-- 2019-09-26 09:45:03
