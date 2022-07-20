CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isAdmin` boolean,
  `username` text,
  `password` text,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `character` (
	`id` int NOT NULL AUTO_INCREMENT,
  `user_id` int,
	`character_name` varchar(16),
  `class` varchar(16),
  `combat` int,
  `charisma` int,
  `celerity` int,
  `position` int,
	PRIMARY KEY (`id`)
);
