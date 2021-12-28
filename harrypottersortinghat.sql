CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthdate` DATE NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `houses` (
  `id_house` int(11) NOT NULL auto_increment,
  `id_user` int(11) NOT NULL,
  `votes_gryffindor` int(11) NOT NULL,
  `votes_slytherin` int(11) NOT NULL,
  `votes_ravenclaw` int(11) NOT NULL,
  `votes_hufflepuff` int(11) NOT NULL,
  PRIMARY KEY (`id_house`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `houses` ADD CONSTRAINT `houses_fk0` FOREIGN KEY (`id_user`) REFERENCES `users`(`id`);

