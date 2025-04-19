# Host: localhost  (Version 5.5.5-10.4.32-MariaDB)
# Date: 2025-04-19 10:06:45
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "books"
#

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `tahun_terbit` double DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

#
# Data for table "books"
#

INSERT INTO `books` VALUES (1,'Harry Potter','J.K Rowling',1997,'Fantasy'),(2,'The Hobbit','J.R.R. Tolkien',1937,'Fantasy'),(3,'To Kill a Mockingbird','Harper Lee',1960,'Fiction'),(4,'Kamis Yang Manis','John Steinbeck',2022,'Romance'),(5,'Dongeng Sang Kancil','Tika Iknegara',2017,'Fiksi'),(10,'Contoh','Contoh',0,'Contoh');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'admin',123),(2,'user1',123),(3,'user2',123);
