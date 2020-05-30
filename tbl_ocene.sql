SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `tbl_ocene` (
`razred` int(10) unsigned NOT NULL,
  `odlican` int(11) NOT NULL,
  `prosocena` decimal(3,2) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_ocene` (`razred`, `odlican`, `prosocena`) VALUES
(42, 12, 4.50),
(41, 16, 4.46),
(43, 10, 3.96),
(45, 4, 3.20);