CREATE DATABASE  IF NOT EXISTS `smartbiz` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `smartbiz`;
-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: smartbiz
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `account_gl`
--

DROP TABLE IF EXISTS `account_gl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_gl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naration` tinytext NOT NULL,
  `trans_id` varchar(25) DEFAULT NULL,
  `trans_ref` varchar(25) DEFAULT NULL,
  `debit` float(12,4) NOT NULL,
  `credit` float(12,4) NOT NULL,
  `trans_date` datetime NOT NULL,
  `value_date` datetime NOT NULL,
  `savedby` varchar(25) NOT NULL,
  `postby` varchar(25) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_account_gl_1_idx` (`postby`),
  CONSTRAINT `fk_account_gl_1` FOREIGN KEY (`postby`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_gl`
--

LOCK TABLES `account_gl` WRITE;
/*!40000 ALTER TABLE `account_gl` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_gl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` text NOT NULL,
  `log_date` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_logs`
--

LOCK TABLES `audit_logs` WRITE;
/*!40000 ALTER TABLE `audit_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_logs`
--

DROP TABLE IF EXISTS `ip_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `system_id` varchar(254) DEFAULT NULL,
  `browser_type` varchar(254) DEFAULT NULL,
  `os_type` varchar(254) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_logs`
--

LOCK TABLES `ip_logs` WRITE;
/*!40000 ALTER TABLE `ip_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_accounts`
--

DROP TABLE IF EXISTS `master_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_accounts` (
  `id` int(11) NOT NULL,
  `account_id` varchar(8) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`account_id`),
  KEY `fk_master_accounts_1_idx` (`created_by`),
  CONSTRAINT `fk_master_accounts_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_accounts`
--

LOCK TABLES `master_accounts` WRITE;
/*!40000 ALTER TABLE `master_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_assets`
--

DROP TABLE IF EXISTS `master_assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` varchar(8) NOT NULL,
  `asset_class` varchar(50) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_master_assets_1_idx` (`created_by`),
  CONSTRAINT `fk_master_assets_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_assets`
--

LOCK TABLES `master_assets` WRITE;
/*!40000 ALTER TABLE `master_assets` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_table`
--

DROP TABLE IF EXISTS `orders_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` varchar(25) NOT NULL,
  `order_item` tinytext NOT NULL,
  `order_date` datetime NOT NULL,
  `fulfilby` varchar(25) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount` float(12,4) NOT NULL,
  `total` float(12,4) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_orders_table_1_idx` (`customers_id`),
  CONSTRAINT `fk_orders_table_1` FOREIGN KEY (`customers_id`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_table`
--

LOCK TABLES `orders_table` WRITE;
/*!40000 ALTER TABLE `orders_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases_ledger`
--

DROP TABLE IF EXISTS `purchases_ledger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_id` varchar(25) NOT NULL,
  `trans_ref` varchar(25) NOT NULL,
  `description` tinytext NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` float(12,4) NOT NULL,
  `total` float(12,4) NOT NULL,
  `trans_date` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_purchases_ledger_1_idx` (`created_by`),
  CONSTRAINT `fk_purchases_ledger_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases_ledger`
--

LOCK TABLES `purchases_ledger` WRITE;
/*!40000 ALTER TABLE `purchases_ledger` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchases_ledger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `returns`
--

DROP TABLE IF EXISTS `returns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `returns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `return_type` varchar(3) NOT NULL,
  `return_date` datetime NOT NULL,
  `reason` text NOT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_returns_1_idx` (`created_by`),
  CONSTRAINT `fk_returns_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returns`
--

LOCK TABLES `returns` WRITE;
/*!40000 ALTER TABLE `returns` DISABLE KEYS */;
/*!40000 ALTER TABLE `returns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `description` tinytext NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_roles_1_idx` (`created_by`),
  CONSTRAINT `fk_roles_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_ledger`
--

DROP TABLE IF EXISTS `sales_ledger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_id` varchar(25) NOT NULL,
  `trans_ref` varchar(25) NOT NULL,
  `description` tinytext NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` float(12,4) NOT NULL,
  `total` float(12,4) NOT NULL,
  `trans_date` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_sales_ledger_1_idx` (`created_by`),
  CONSTRAINT `fk_sales_ledger_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_ledger`
--

LOCK TABLES `sales_ledger` WRITE;
/*!40000 ALTER TABLE `sales_ledger` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_ledger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipments_tracker`
--

DROP TABLE IF EXISTS `shipments_tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipments_tracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(25) NOT NULL,
  `current_location` varchar(50) NOT NULL,
  `date_arrived` datetime DEFAULT NULL,
  `to_location` varchar(50) NOT NULL,
  `dispatch_date` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_shipments_tracker_1_idx` (`order_id`),
  CONSTRAINT `fk_shipments_tracker_1` FOREIGN KEY (`order_id`) REFERENCES `orders_table` (`customers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipments_tracker`
--

LOCK TABLES `shipments_tracker` WRITE;
/*!40000 ALTER TABLE `shipments_tracker` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipments_tracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_rates`
--

DROP TABLE IF EXISTS `shipping_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` float(12,4) NOT NULL,
  `city` varchar(50) NOT NULL,
  `weight` float(5,2) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_shipping_rates_1_idx` (`created_by`),
  CONSTRAINT `fk_shipping_rates_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_rates`
--

LOCK TABLES `shipping_rates` WRITE;
/*!40000 ALTER TABLE `shipping_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(254) NOT NULL,
  `store_addr` varchar(254) NOT NULL,
  `store_onwer` varchar(25) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_stores_1_idx` (`store_onwer`),
  KEY `fk_stores_2_idx` (`created_by`),
  CONSTRAINT `fk_stores_1` FOREIGN KEY (`store_onwer`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  CONSTRAINT `fk_stores_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_accounts`
--

DROP TABLE IF EXISTS `sub_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_id` varchar(8) NOT NULL,
  `account_id` varchar(8) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `showTB` char(1) NOT NULL,
  `showPNL` char(1) NOT NULL,
  `showCF` char(1) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_sub_accounts_1_idx` (`created_by`),
  KEY `fk_sub_accounts_2_idx` (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_accounts`
--

LOCK TABLES `sub_accounts` WRITE;
/*!40000 ALTER TABLE `sub_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_assets`
--

DROP TABLE IF EXISTS `sub_assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_asset_id` varchar(8) NOT NULL,
  `asset_id` varchar(8) NOT NULL,
  `asset_name` varchar(50) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_assets`
--

LOCK TABLES `sub_assets` WRITE;
/*!40000 ALTER TABLE `sub_assets` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `middle_name` varchar(15) DEFAULT NULL,
  `e_mail` varchar(100) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `address` varchar(254) NOT NULL,
  `date_registered` datetime DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `first_login_ip` varchar(15) NOT NULL,
  `last_login_ip` varchar(15) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'smartbiz'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-07 18:40:05
