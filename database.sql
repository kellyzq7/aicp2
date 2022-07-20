CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isAdmin` boolean,
  `username` text,
  `password` text,
  `character_name` varchar(16),
  `class` varchar(16),
  `combat` int,
  `charisma` int,
  `celerity` int,
  `position` int,
  PRIMARY KEY (`id`)
);
