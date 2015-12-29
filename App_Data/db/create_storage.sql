CREATE TABLE `storage` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `produced_date` date NOT NULL,
  `preservation` int(11) NOT NULL DEFAULT '36',
  `buying_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '1',
  `campaign_id` int(11) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL COMMENT 'where item is placed at storage',
  PRIMARY KEY (`item_id`),
  KEY `product_id_fk_idx` (`product_id`),
  KEY `campaign_id_fk_idx` (`campaign_id`),
  CONSTRAINT `campaign_id_fk` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`campaign_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;