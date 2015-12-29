CREATE TABLE `campaign` (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL COMMENT 'year of the campaign',
  `campaign_number` int(11) NOT NULL COMMENT 'number of campaign on defined year',
  PRIMARY KEY (`campaign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='period, when product is bought from avon';