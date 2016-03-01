CREATE TABLE `avon`.`client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NULL,
  `last_name` varchar(100) NULL,
  `birthday` varchar(15) NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `is_archived` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;