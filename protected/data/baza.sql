/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.34-0ubuntu0.12.04.1 : Database - slavica
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`slavica` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `slavica`;

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `year` date NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_book` (`user_id`),
  CONSTRAINT `FK_book` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `book` */

insert  into `book`(`id`,`user_id`,`title`,`year`,`image_url`,`rating`) values (1,4,'Moja kniga','2013-10-09','images/upload/book_footer.png',NULL),(3,3,'Knigaaa','0000-00-00','images/upload/knigi.jpg',NULL),(4,1,'Vtora kniga','2013-10-31','images/upload/1381845264facebook.png',NULL),(5,1,'Treta kniga','0000-00-00','images/upload/logo_book.png',NULL),(6,4,'Kniga tret user','0000-00-00',NULL,NULL),(7,1,'Cetvrta kniga','0000-00-00',NULL,NULL),(8,1,'Nova kniga 2','0000-00-00','images/upload/twiter.png',NULL),(9,1,'rrrr','0000-00-00',NULL,NULL),(10,2,'refe','0000-00-00',NULL,NULL),(11,1,'dfs','0000-00-00','images/upload/googleplus.png',NULL),(12,5,'posledna','0000-00-00',NULL,NULL),(13,3,'reef','0000-00-00','images/upload/pinterest.png',NULL),(14,2,'aa','0000-00-00',NULL,NULL),(15,1,'qqq','0000-00-00',NULL,NULL),(16,2,'dsd','0000-00-00',NULL,NULL),(17,4,'wewe','0000-00-00',NULL,NULL),(18,4,'wewe','0000-00-00','images/upload/book_footer1.jpg',NULL),(19,2,'Book New','0000-00-00','images/upload/index.jpeg',NULL),(20,2,'Moja kniga','0000-00-00','images/upload/twiter.png',NULL),(21,1,'defdw','0000-00-00','images/upload/index.jpeg',NULL),(22,1,'aaaa','0000-00-00','images/upload/index.jpeg',NULL),(23,1,'eeee','0000-00-00','images/upload/book_footer.png',NULL),(24,1,'233','0000-00-00','images/upload/facebook.png',NULL),(25,5,'fgdfg','0000-00-00','images/upload/twiter.png',NULL),(26,5,'aaaa hhbh','0000-00-00','images/upload/index.jpeg',NULL),(27,1,'defdw bujbubv','0000-00-00','images/upload/index.jpeg',NULL),(28,5,'aaaa hhbh','0000-00-00','images/upload/1381313160index.jpeg',NULL),(29,5,'aaaa hhbh','0000-00-00','images/upload/1381313190index.jpeg',NULL),(30,1,'dfsdsf','0000-00-00','images/upload/1381753699index.jpeg',NULL),(32,16,'dddd','0000-00-00','images/upload/1381753913index.jpeg',NULL),(33,1,'qqq','0000-00-00','images/upload/1381762135index.jpeg',NULL),(34,3,'1111','0000-00-00','images/upload/1381837745index.jpeg',NULL),(35,1,'naslov','0000-00-00','images/upload/1381839874no-photo.jpg',NULL),(36,5,'fghgfh','0000-00-00','images/upload/1381839970pinterest.png',NULL),(37,1,'yyyuy','0000-00-00','images/upload/1381839996knigi.jpg',NULL),(38,1,'tyyht','0000-00-00','images/upload/1381840163logo_book.png',NULL),(39,3,'reret','0000-00-00','images/upload/1381840209facebook.png',NULL),(40,12,'test','0000-00-00','images/upload/1381840469twiter.png',NULL),(41,1,'aaaaaaaaaaaaaa','0000-00-00','images/upload/1381840973knigi.jpg',NULL),(42,1,'efw','2013-10-17','images/upload/1381843941twiter.png',NULL),(43,8,'aaaa','2013-10-24','images/upload/1382001288index.jpeg',NULL),(44,3,'qqq','2013-10-16','images/upload/1382001356index.jpeg',NULL),(45,1,'posledna kniga','2013-10-01','images/upload/1382001438no-photo.jpg',NULL),(46,4,'ooooo','2013-10-17','images/upload/1382001682book_footer.png',NULL),(47,1,'kniga','2013-10-01','images/upload/1382001969',NULL),(48,1,'kniga','2013-10-01','images/upload/1382001973',NULL),(49,4,'qqqqqqqqq','2013-10-02','images/upload/1382001998pinterest.png',NULL),(50,4,'aaaaaaaaaaa','2013-10-01','images/upload/1382002204pinterest.png','10');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`category_name`,`description`) values (1,'Prikazni','Prikazni za deca'),(2,'Avanturi','asdasfdsf sdvsf'),(3,'Horor','horor kategorija'),(4,'aas','fdsgfds'),(5,'saddsa','fsafs'),(6,'fsafsa','dsgffdhg'),(7,'jgghj','jhgjhg'),(8,'jhgjhg','jhgjhgjhg'),(9,'jhgjhjh','jhgjhjhg'),(10,'wewer','retrt');

/*Table structure for table `category_book` */

DROP TABLE IF EXISTS `category_book`;

CREATE TABLE `category_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `book_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_category_book` (`category_id`),
  KEY `FK_book_category` (`book_id`),
  CONSTRAINT `FK_book_category` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  CONSTRAINT `FK_category_book` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

/*Data for the table `category_book` */

insert  into `category_book`(`id`,`category_id`,`book_id`) values (1,1,5),(2,1,3),(3,1,6),(4,2,5),(5,2,3),(6,2,6),(7,3,3),(8,3,9),(9,1,21),(10,2,21),(11,3,21),(12,4,21),(13,1,22),(14,2,22),(15,3,22),(21,1,23),(22,2,23),(23,3,23),(24,4,23),(25,5,23),(26,6,23),(27,1,24),(28,2,24),(29,3,24),(30,4,24),(31,5,24),(32,7,24),(33,8,24),(34,9,24),(35,10,24),(86,1,25),(87,3,26),(88,9,26),(89,2,27),(90,5,27),(91,8,27),(92,1,28),(93,5,28),(94,8,28),(95,4,29),(96,9,29),(97,5,11),(98,8,11),(99,3,30),(100,6,30),(101,1,32),(102,4,32),(106,4,33),(107,5,33),(108,1,34),(109,2,34),(110,1,35),(111,2,35),(112,3,35),(113,1,36),(114,2,36),(115,3,36),(116,9,37),(117,10,37),(118,1,38),(119,2,38),(120,3,38),(121,1,39),(122,2,39),(123,3,39),(124,4,39),(125,1,40),(126,2,40),(127,3,40),(128,4,40),(129,5,40),(130,1,41),(131,2,41),(132,3,41),(133,1,42),(134,2,42),(135,1,1),(136,2,1),(137,3,1),(138,5,4),(139,7,4),(140,9,4),(141,1,43),(142,2,43),(143,3,43),(144,1,44),(145,2,44),(146,3,44),(147,1,45),(148,2,45),(149,3,45),(150,1,46),(151,2,46),(152,4,46),(153,8,46),(154,9,46),(155,10,46),(156,1,49),(157,2,49),(158,3,49),(159,1,50),(160,2,50),(161,3,50),(162,4,50);

/*Table structure for table `ratings` */

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `star_number` int(11) NOT NULL,
  `book_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

/*Data for the table `ratings` */

insert  into `ratings`(`id`,`star_number`,`book_id`) values (1,2,1),(2,5,1),(3,5,1),(4,3,1),(5,5,1),(6,5,1),(7,5,1),(8,5,1),(9,3,1),(10,5,1),(11,2,1),(12,5,1),(13,3,1),(14,4,1),(15,5,1),(16,5,1),(17,4,1),(18,3,1),(19,5,1),(20,5,1),(21,5,1),(22,5,1),(23,5,1),(24,5,1),(25,4,1),(26,5,1),(27,5,1),(28,5,1),(29,5,1),(30,5,1),(31,2,1),(32,3,1),(33,4,1),(34,4,1),(35,5,1),(36,4,1),(37,5,1),(38,5,1),(39,5,1),(40,5,1),(41,4,1),(42,3,1),(43,5,4),(44,5,4),(45,3,4),(46,5,4),(47,5,4),(48,5,5),(49,5,1),(50,1,1),(51,4,1),(52,1,1),(53,4,1),(54,3,1),(55,1,7),(56,3,7),(57,4,7),(58,5,7),(59,1,1),(60,1,1),(61,5,1),(62,2,1),(63,1,7),(64,5,7),(65,5,7),(66,5,1),(67,1,1),(68,5,1),(69,1,1),(70,1,1),(71,5,1),(72,5,1),(73,5,1),(74,5,1),(75,5,1),(76,5,1),(77,5,1),(78,1,1),(79,5,1),(80,5,1),(81,1,1),(82,5,1),(83,5,1),(84,5,1),(85,5,1),(86,5,1),(87,2,1),(88,5,1),(89,2,1),(90,2,1),(91,5,1),(92,5,1),(93,5,1),(94,5,1),(95,5,1),(96,5,1),(97,5,1),(98,2,1),(99,3,1),(100,2,1),(101,5,1),(102,1,1),(103,5,1),(104,5,3),(105,3,3),(106,5,4),(107,5,1),(108,5,11),(109,3,6),(110,3,11),(111,1,11),(112,5,1),(113,5,1),(114,5,3),(115,5,7);

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `book_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `review` */

insert  into `review`(`id`,`title`,`description`,`book_id`,`user_id`,`date_create`) values (1,'Review1','Ova e moeto prvo review',1,5,'0000-00-00 00:00:00'),(2,'Review2','Vtoro review',1,4,'0000-00-00 00:00:00'),(3,'Review3','Treto review',2,3,'0000-00-00 00:00:00'),(4,'review4','opis na 4',1,2,'0000-00-00 00:00:00'),(5,'title','ova e petto review',4,1,'0000-00-00 00:00:00'),(6,'review6','ova e sesto review',1,1,'2013-10-30 13:16:35'),(7,'Review7','ova e sedmo review',3,1,'2013-10-30 13:17:01'),(8,'novo review','ova e opis na desetto review',2,0,'2013-10-30 13:26:56'),(9,'review11','ova e 11 review',4,1,'2013-10-30 13:29:30'),(10,'wqeqed','asdfdsaf',5,5,'2013-10-30 13:31:38'),(11,'asdad','test',1,4,'2013-10-30 15:00:17'),(12,'novo review11','sdfdsgd',3,10,'2013-10-30 15:18:18'),(13,'Novo','ova e najnovo review za knigata so id 1',1,10,'2013-10-30 16:05:50'),(14,'aaaa','sdasdas',12,10,'2013-10-30 16:21:41'),(15,'sadsda','dsadas',12,10,'2013-10-30 16:21:48'),(16,'dddd','fffff',12,10,'2013-10-30 16:21:55'),(17,'999999999999999999','888888888888888888888888888',1,10,'2013-10-31 10:42:34'),(18,'Novo Review','novo review bla bla',8,28,'2013-10-31 10:51:27');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`password`,`date_update`,`username`) values (1,'slavica','aaa@aaa.com','7c4a8d09ca3762af61e59520943dc26494f8941b',NULL,'aaaa1'),(2,'aaa','saeda@ggg.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2003-03-20 12:00:00','username'),(3,'sad','dsfdf','7c4a8d09ca3762af61e59520943dc26494f8941b','0000-00-00 00:00:00','aaaa7'),(4,'rrrr','tttt','7c4a8d09ca3762af61e59520943dc26494f8941b','0000-00-00 00:00:00','aaaa6'),(5,'gggg','tttt','7c4a8d09ca3762af61e59520943dc26494f8941b','0000-00-00 00:00:00','aaaa5'),(6,'wwewe','rrtrt','7c4a8d09ca3762af61e59520943dc26494f8941b','2009-09-20 12:00:00','aaaa3'),(7,'Aaaaa','adasd@dsfsd.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2014-09-09 00:00:00','aaaa4'),(8,'qwq','erw','7c4a8d09ca3762af61e59520943dc26494f8941b','0000-00-00 00:00:00',''),(9,'slavica','slavica90@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2012-09-09 00:00:00','aaaa2'),(10,'slavica','slavica','7c4a8d09ca3762af61e59520943dc26494f8941b','0000-00-00 00:00:00','slavica'),(11,'www','fdfg','7c4a8d09ca3762af61e59520943dc26494f8941b','0000-00-00 00:00:00','gggg'),(12,'aaaa','wedew','7c4a8d09ca3762af61e59520943dc26494f8941b','2010-08-08 00:00:00','popopo'),(13,'slavicak','saaaaa','7c4a8d09ca3762af61e59520943dc26494f8941b','2010-08-08 00:00:00','llllll'),(14,'wdas','dew','7c4a8d09ca3762af61e59520943dc26494f8941b','0000-00-00 00:00:00','few'),(15,'sa','dsf','7c4a8d09ca3762af61e59520943dc26494f8941b','0000-00-00 00:00:00','fsd'),(16,'aa','sda','7c4a8d09ca3762af61e59520943dc26494f8941b',NULL,'rrrr'),(17,'qqqq','wwww','7c4a8d09ca3762af61e59520943dc26494f8941b',NULL,'qwe'),(18,'aaa','dfsfds','7c4a8d09ca3762af61e59520943dc26494f8941b',NULL,'aaaaaaaaaa'),(19,'pppp','pppp','7c4a8d09ca3762af61e59520943dc26494f8941b',NULL,'ppppp'),(20,'weqe','efff','7c4a8d09ca3762af61e59520943dc26494f8941b','0000-00-00 00:00:00','gfdgfd'),(21,'eee','rrr','99ebdbd711b0e1854a6c2e93f759efc2af291fd0','0000-00-00 00:00:00','ttt'),(22,'yyy','yyy','750b53094be562c9d38f2fba3f635fc754d32c7c','0000-00-00 00:00:00','yyy'),(23,'eee','rrr','99ebdbd711b0e1854a6c2e93f759efc2af291fd0','2013-10-14 17:18:09','123456'),(24,'rrr','ttt','5840ed6819205e7375472bc6eaa4b9b5626f42ff','2013-10-14 17:19:11','hgjhgf'),(25,'esd','gfdgd','e94cbb8acde9468fe2dadde2ba45a3be668a1722','2013-10-15 13:57:09','12344353'),(26,'slavicakostadinova','asaas@ssss.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2013-10-15 15:55:11','firstusername'),(27,'nov korisnik','nov@yahoo.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2013-10-30 13:28:49','12345678'),(28,'Bojan','bojanst@mignix.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2013-10-31 10:50:39','bojan');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
