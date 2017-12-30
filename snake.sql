-- Snake Game v2
-- snake.sql

CREATE DATABASE IF NOT EXISTS `snake`;

CREATE TABLE IF NOT EXISTS `snake` (
	`player` varchar(255),
  `score` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- END
