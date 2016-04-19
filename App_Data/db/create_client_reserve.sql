CREATE TABLE `avon`.`client_reserve` (
  `client_reserve_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `amount` int(2) DEFAULT 1,
  `buying_price` decimal(10,2),
  `selling_price` decimal(10,2) DEFAULT 0,
  `is_archived` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`client_reserve_id`),
  KEY `product_id_fk_idx` (`product_id`),
  KEY `client_id_fk_idx` (`client_id`),
  KEY `campaign_id_fk_idx` (`campaign_id`),
  CONSTRAINT `client_id_cr_fk` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `product_id_cr_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pcampaign_id_cr_fk` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`campaign_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) 