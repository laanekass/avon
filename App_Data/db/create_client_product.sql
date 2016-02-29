CREATE TABLE `avon`.`client_product` (
  `client_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_date` date NULL,
  `amount` int(2) DEFAULT 1,
  `selling_price` decimal(10,2) DEFAULT 0,
  `profit` decimal(10,2) DEFAULT 0,
  `is_archived` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`client_product_id`),
  KEY `product_id_fk_idx` (`product_id`),
  KEY `client_id_fk_idx` (`client_id`),
  CONSTRAINT `client_id_cp_fk` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `product_id_cp_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;