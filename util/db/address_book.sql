CREATE TABLE IF NOT EXISTS `users` (
`userID` int(11) NOT NULL AUTO_INCREMENT,
`userName` varchar(100) NOT NULL UNIQUE,
`userEmail` varchar(100) NOT NULL UNIQUE,
`userPass` varchar(100) NOT NULL,
`userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
`tokenCode` varchar(100) NOT NULL,
`ts_create` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`userID`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,  
  `last_name` varchar(255) NOT NULL,  
  `phone_nr` varchar(255) NOT NULL,  
  `email` varchar(255) NOT NULL, 
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`owner`) REFERENCES `users`(`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `phone_nr`,  `email`, `owner`) VALUES
(1, 'Florian', 'Buicu', '0123456789', 'florian@contactsbook.com', '1'),
(2, 'Andrei', 'Diaconu','0112233445','andrei@contactsbook.com', '2');


