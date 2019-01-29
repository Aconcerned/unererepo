CREATE DATABASE IF NOT EXISTS `prueba`;

USE `prueba`;

DROP TABLE IF EXISTS `reservaaula`;

CREATE TABLE `reservaaula` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `fechaemp` time NOT NULL,
  `fechater` time NOT NULL,
  `numero` int(11) NOT NULL,
  `fechainscripcion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `reservaaula` VALUES ("2","boi","bertu","2018-11-30","09:00:00","10:00:00","2","2018-10-31"),
("3","bebe","ru","2018-12-01","16:00:00","17:00:00","3","2018-10-31");



DROP TABLE IF EXISTS `reservacdt`;

CREATE TABLE `reservacdt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `fechaemp` time NOT NULL,
  `fechater` time NOT NULL,
  `numero` int(11) NOT NULL,
  `fechainscripcion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `reservacdt` VALUES ("1","mario","nut","2018-12-12","09:00:00","12:00:00","3","2018-09-23"),
("5","boi","art","2018-11-12","11:11:00","12:12:00","2","2018-10-31");



DROP TABLE IF EXISTS `reservadiseno`;

CREATE TABLE `reservadiseno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `fechaemp` time NOT NULL,
  `fechater` time NOT NULL,
  `numero` int(10) NOT NULL,
  `fechainscripcion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `reservadiseno` VALUES ("3","yui","asi","2018-10-31","12:00:00","13:00:00","2","2018-10-31"),
("4","sss","ytr","2018-11-01","15:00:00","16:00:00","2","2018-10-31");



DROP TABLE IF EXISTS `reservalib`;

CREATE TABLE `reservalib` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `materia` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `fechaemp` time NOT NULL,
  `fechater` time NOT NULL,
  `numero` int(11) NOT NULL,
  `fechainscripcion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `reservalib` VALUES ("2","ova","oba","2018-11-22","12:00:00","13:00:00","2","2018-10-31"),
("3","gem","geme","2018-11-01","16:00:00","17:00:00","3","2018-10-31");



DROP TABLE IF EXISTS `reservatodo`;

CREATE TABLE `reservatodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `salon` varchar(100) NOT NULL,
  `fecha` time NOT NULL,
  `fechaemp` time NOT NULL,
  `fechater` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `fechainscripcion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cedula` int(11) NOT NULL,
  `Cargo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` VALUES ("1","gokdari","ae4173ada576e1a595e1ef731aae977f","soisoisoi@gmail.com","760","1"),
("2","aaa","47bce5c74f589f4867dbd57e9ca9f808","iamgod@gmail.com","1789","2"),
("3","lol","9cdfb439c7876e703e307864c9167a15","dogdie3001@gmail.com","24567811","2"),
("4","nin","2a16a013045dae9a66401eb607faf1c6","dogdie3001@gmail.com","12345121","1"),
("5","bbb","08f8e0260c64418510cefb2b06eee5cd","dogdie3001@gmail.com","23412","1"),
("6","eee","d2f2297d6e829cd3493aa7de4416a18f","dogdie3001@gmail.com","567890","1"),
("7","ffff","ece926d8c0356205276a45266d361161","dogdie3001@gmail.com","25612","1"),
("8","erer","cc0bd5832b4e1465a6987d953bb767af","dogdie3001@gmail.com","231","2"),
("9","no","7fa3b767c460b54a2be4d49030b349c7","jesusenrique1996@gmail.com","232","2"),
("10","re","12eccbdd9b32918131341f38907cbbb5","jesusenrique1996@gmail.com","3412","1"),
("11","gamzee","5b4464cffe8f5607811c5ac5ec35df7c","dogdie3001@gmail.com","66666","1"),
("12","ereoi","8721331b3aaa9770e320c00cddf22119","dogdie3001@gmail.com","45123","2"),
("13","oro","a13314e5b7614acf77e65427af6d3791","dogdie3001@gmail.com","11123341","2");
