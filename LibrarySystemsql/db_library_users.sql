-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_library
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_registered` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'Gene','123','2025-01-02 20:43:04'),(8,'Hiroi','$2y$10$Ppq7R0ZtUg3xFvaaNqPOmeRVB3afIauL.kjR9t6iNp6','2025-01-02 20:44:39'),(10,'','$2y$10$0aqtkIgGoNfkl7rldQiK3.FR3mnmHDnW64Olo22YFED','2025-01-02 20:47:46'),(11,'dsdsd','$2y$10$wBqTVrDtmI1Pmf9EuApv3Ouo7Idr5.ykbDtHyjH32Ve','2025-01-02 20:49:25'),(12,'Dang','$2y$10$QJw/dF7iUbxlchgOfZVmperUoN4B4pQVldF06GZ4HjG','2025-01-02 20:52:09'),(14,'tom','$2y$10$UD2r/GhNXQINOc0Mn.NUyeqss/n5QjV1tjv83WUT1Ui','2025-01-03 20:03:28'),(15,'gago','$2y$10$gtNCFTGahsVtf8ZIVWrdxOhntsWGwajlXLJBAlGe0NyH.CTCqZn5G','2025-01-03 20:11:53'),(16,'yolo','$2y$10$IC.NaAuSDmvT//447ixhjOGqsqx4GkHZdUxwODZpgflItdhN79fRS','2025-01-03 20:12:25'),(17,'adios','$2y$10$nt2mOpSkfjbm3LlPs4z8eeJfThSmi00Qgsv0QsQRgY6duZo06liku','2025-01-08 20:44:43'),(18,'gang','$2y$10$MTQ40vlkIY2JMAobvkGwu.lmWOAuQskKt3bHjuCl/RAskOTF2VbAu','2025-01-14 10:16:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-14 11:05:57
