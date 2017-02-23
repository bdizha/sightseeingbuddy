-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: pubshot
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `countries`
--


--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Afghanistan','AF'),(2,'Albania','AL'),(3,'Algeria','DZ'),(4,'American Samoa','AS'),(5,'Andorra','AD'),(6,'Angola','AO'),(7,'Anguilla','AI'),(8,'Antarctica','AQ'),(9,'Antigua and Barbuda','AG'),(10,'Argentina','AR'),(11,'Armenia','AM'),(12,'Aruba','AW'),(13,'Australia','AU'),(14,'Austria','AT'),(15,'Azerbaijan','AZ'),(16,'Bahamas','BS'),(17,'Bahrain','BH'),(18,'Bangladesh','BD'),(19,'Barbados','BB'),(20,'Belarus','BY'),(21,'Belgium','BE'),(22,'Belize','BZ'),(23,'Benin','BJ'),(24,'Bermuda','BM'),(25,'Bhutan','BT'),(26,'Bolivia','BO'),(27,'Bosnia and Herzegovina','BA'),(28,'Botswana','BW'),(29,'Bouvet Island','BV'),(30,'Brazil','BR'),(31,'British Indian Ocean Territory','IO'),(32,'British Virgin Islands','VG'),(33,'Brunei','BN'),(34,'Bulgaria','BG'),(35,'Burkina Faso','BF'),(36,'Burundi','BI'),(37,'Cambodia','KH'),(38,'Cameroon','CM'),(39,'Canada','CA'),(40,'Cape Verde','CV'),(41,'Cayman Islands','KY'),(42,'Central African Republic','CF'),(43,'Chad','TD'),(44,'Chile','CL'),(45,'China','CN'),(46,'Christmas Island','CX'),(47,'Cocos [Keeling] Islands','CC'),(48,'Colombia','CO'),(49,'Comoros','KM'),(50,'Congo - Brazzaville','CG'),(51,'Congo - Kinshasa','CD'),(52,'Cook Islands','CK'),(53,'Costa Rica','CR'),(54,'Croatia','HR'),(55,'Cuba','CU'),(56,'Cyprus','CY'),(57,'Czech Republic','CZ'),(58,'Côte d’Ivoire','CI'),(59,'Denmark','DK'),(60,'Djibouti','DJ'),(61,'Dominica','DM'),(62,'Dominican Republic','DO'),(63,'Ecuador','EC'),(64,'Egypt','EG'),(65,'El Salvador','SV'),(66,'Equatorial Guinea','GQ'),(67,'Eritrea','ER'),(68,'Estonia','EE'),(69,'Ethiopia','ET'),(70,'European Union','QU'),(71,'Falkland Islands','FK'),(72,'Faroe Islands','FO'),(73,'Fiji','FJ'),(74,'Finland','FI'),(75,'France','FR'),(76,'French Guiana','GF'),(77,'French Polynesia','PF'),(78,'French Southern Territories','TF'),(79,'Gabon','GA'),(80,'Gambia','GM'),(81,'Georgia','GE'),(82,'Germany','DE'),(83,'Ghana','GH'),(84,'Gibraltar','GI'),(85,'Greece','GR'),(86,'Greenland','GL'),(87,'Grenada','GD'),(88,'Guadeloupe','GP'),(89,'Guam','GU'),(90,'Guatemala','GT'),(91,'Guernsey','GG'),(92,'Guinea','GN'),(93,'Guinea-Bissau','GW'),(94,'Guyana','GY'),(95,'Haiti','HT'),(96,'Heard Island and McDonald Islands','HM'),(97,'Honduras','HN'),(98,'Hong Kong SAR China','HK'),(99,'Hungary','HU'),(100,'Iceland','IS'),(101,'India','IN'),(102,'Indonesia','ID'),(103,'Iran','IR'),(104,'Iraq','IQ'),(105,'Ireland','IE'),(106,'Isle of Man','IM'),(107,'Israel','IL'),(108,'Italy','IT'),(109,'Jamaica','JM'),(110,'Japan','JP'),(111,'Jersey','JE'),(112,'Jordan','JO'),(113,'Kazakhstan','KZ'),(114,'Kenya','KE'),(115,'Kiribati','KI'),(116,'Kuwait','KW'),(117,'Kyrgyzstan','KG'),(118,'Laos','LA'),(119,'Latvia','LV'),(120,'Lebanon','LB'),(121,'Lesotho','LS'),(122,'Liberia','LR'),(123,'Libya','LY'),(124,'Liechtenstein','LI'),(125,'Lithuania','LT'),(126,'Luxembourg','LU'),(127,'Macau SAR China','MO'),(128,'Macedonia','MK'),(129,'Madagascar','MG'),(130,'Malawi','MW'),(131,'Malaysia','MY'),(132,'Maldives','MV'),(133,'Mali','ML'),(134,'Malta','MT'),(135,'Marshall Islands','MH'),(136,'Martinique','MQ'),(137,'Mauritania','MR'),(138,'Mauritius','MU'),(139,'Mayotte','YT'),(140,'Mexico','MX'),(141,'Micronesia','FM'),(142,'Moldova','MD'),(143,'Monaco','MC'),(144,'Mongolia','MN'),(145,'Montenegro','ME'),(146,'Montserrat','MS'),(147,'Morocco','MA'),(148,'Mozambique','MZ'),(149,'Myanmar [Burma]','MM'),(150,'Namibia','NA'),(151,'Nauru','NR'),(152,'Nepal','NP'),(153,'Netherlands','NL'),(154,'Netherlands Antilles','AN'),(155,'New Caledonia','NC'),(156,'New Zealand','NZ'),(157,'Nicaragua','NI'),(158,'Niger','NE'),(159,'Nigeria','NG'),(160,'Niue','NU'),(161,'Norfolk Island','NF'),(162,'North Korea','KP'),(163,'Northern Mariana Islands','MP'),(164,'Norway','NO'),(165,'Oman','OM'),(166,'Outlying Oceania','QO'),(167,'Pakistan','PK'),(168,'Palau','PW'),(169,'Palestinian Territories','PS'),(170,'Panama','PA'),(171,'Papua New Guinea','PG'),(172,'Paraguay','PY'),(173,'Peru','PE'),(174,'Philippines','PH'),(175,'Pitcairn Islands','PN'),(176,'Poland','PL'),(177,'Portugal','PT'),(178,'Puerto Rico','PR'),(179,'Qatar','QA'),(180,'Romania','RO'),(181,'Russia','RU'),(182,'Rwanda','RW'),(183,'Réunion','RE'),(184,'Saint Barthélemy','BL'),(185,'Saint Helena','SH'),(186,'Saint Kitts and Nevis','KN'),(187,'Saint Lucia','LC'),(188,'Saint Martin','MF'),(189,'Saint Pierre and Miquelon','PM'),(190,'Saint Vincent and the Grenadines','VC'),(191,'Samoa','WS'),(192,'San Marino','SM'),(193,'Saudi Arabia','SA'),(194,'Senegal','SN'),(195,'Serbia','RS'),(196,'Serbia and Montenegro','CS'),(197,'Seychelles','SC'),(198,'Sierra Leone','SL'),(199,'Singapore','SG'),(200,'Slovakia','SK'),(201,'Slovenia','SI'),(202,'Solomon Islands','SB'),(203,'Somalia','SO'),(204,'South Africa','ZA'),(205,'South Georgia and the South Sandwich Islands','GS'),(206,'South Korea','KR'),(207,'Spain','ES'),(208,'Sri Lanka','LK'),(209,'Sudan','SD'),(210,'Suriname','SR'),(211,'Svalbard and Jan Mayen','SJ'),(212,'Swaziland','SZ'),(213,'Sweden','SE'),(214,'Switzerland','CH'),(215,'Syria','SY'),(216,'São Tomé and Príncipe','ST'),(217,'Taiwan','TW'),(218,'Tajikistan','TJ'),(219,'Tanzania','TZ'),(220,'Thailand','TH'),(221,'Timor-Leste','TL'),(222,'Togo','TG'),(223,'Tokelau','TK'),(224,'Tonga','TO'),(225,'Trinidad and Tobago','TT'),(226,'Tunisia','TN'),(227,'Turkey','TR'),(228,'Turkmenistan','TM'),(229,'Turks and Caicos Islands','TC'),(230,'Tuvalu','TV'),(231,'U.S. Minor Outlying Islands','UM'),(232,'U.S. Virgin Islands','VI'),(233,'Uganda','UG'),(234,'Ukraine','UA'),(235,'United Arab Emirates','AE'),(236,'United Kingdom','GB'),(237,'United States','US'),(238,'Unknown or Invalid Region','ZZ'),(239,'Uruguay','UY'),(240,'Uzbekistan','UZ'),(241,'Vanuatu','VU'),(242,'Vatican City','VA'),(243,'Venezuela','VE'),(244,'Vietnam','VN'),(245,'Wallis and Futuna','WF'),(246,'Western Sahara','EH'),(247,'Yemen','YE'),(248,'Zambia','ZM'),(249,'Zimbabwe','ZW'),(250,'Åland Islands','AX');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-22 19:59:27
