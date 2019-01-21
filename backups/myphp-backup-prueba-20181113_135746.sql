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
