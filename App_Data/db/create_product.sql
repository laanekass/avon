CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '1',
  `unit_amount` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `is_archived` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`),
  KEY `product_category_fk_idx` (`category`),
  KEY `unit_id_fk_idx` (`unit_id`),
  CONSTRAINT `product_category_fk` FOREIGN KEY (`category`) REFERENCES `product_category` (`product_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `unit_id_fk` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;