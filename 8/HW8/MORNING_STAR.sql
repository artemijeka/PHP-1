-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `dogs`;
CREATE TABLE `dogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(64) NOT NULL,
  `path_mini` varchar(80) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(512) NOT NULL,
  `dog_page_dir` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `dogs` (`id`, `path`, `path_mini`, `title`, `description`, `dog_page_dir`) VALUES
(238,	'../data/uploads/images/stella.jpg',	'../data/uploads/images/mini/stella.jpg',	'Стелла',	'Чемпион России.',	'./stella.php'),
(239,	'../data/uploads/images/ledi.jpg',	'../data/uploads/images/mini/ledi.jpg',	'Леди',	'Гранд чемпион России.',	'./ledi.php'),
(240,	'../data/uploads/images/trimming,_gruming..jpg',	'../data/uploads/images/mini/trimming,_gruming..jpg',	'Триминг',	'Груминг. Профессиональная подготовка к выставке.',	'./triming.php');

DROP TABLE IF EXISTS `reserve_puppy`;
CREATE TABLE `reserve_puppy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `date` varchar(24) NOT NULL,
  `dog_mother_id` varchar(8) NOT NULL,
  `male_or_female` varchar(11) NOT NULL,
  `user_message` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица резервирования щенков.';


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(48) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `admin` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `login`, `password`, `date`, `name`, `email`, `phone`, `admin`) VALUES
(1,	'Artem',	'eb8932758ff316816ba9dc66ba8384e7',	'24.11.2017 17:08:53',	'Артем Кузнецов',	'',	'',	'true'),
(30,	'Olesya',	'07ed579cf502efc0d7a0ea86c6c7162a',	'5.12.2017 6:34:20',	'Олеся',	'olesya.kuznecova.samara@gmail.com',	'89608175048',	''),
(31,	'Petr',	'e30fab43de43ad315a1c03801b488aef',	'6.12.2017 6:15:57',	'Петр Иванович',	'',	'',	''),
(32,	'Oleg',	'f269cd411a81c5f8dba78fa7f6bf90ab',	'6.12.2017 20:04:28',	'Олег',	'oleg@sdsds.sds',	'',	'');

-- 2017-12-22 03:16:46
