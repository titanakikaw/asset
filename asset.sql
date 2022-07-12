-- Adminer 4.8.1 MySQL 5.5.5-10.4.22-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `assets`;
CREATE TABLE `assets` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assetno` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `modelno` varchar(50) NOT NULL,
  `serialno` varchar(50) NOT NULL,
  `dtefrom` varchar(50) NOT NULL,
  `dteto` varchar(50) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `totalcost` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `usefullife` varchar(50) NOT NULL,
  `salvalue` varchar(50) NOT NULL,
  `salpercent` varchar(50) NOT NULL,
  `monthlydep` varchar(50) NOT NULL,
  `annualdep` varchar(50) NOT NULL,
  `cat_code` varchar(50) NOT NULL,
  `dept_code` varchar(50) NOT NULL,
  `loc_code` varchar(50) NOT NULL,
  `status_code` varchar(50) NOT NULL,
  PRIMARY KEY (`master_id`),
  KEY `status_code` (`status_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `asset_additional_cost`;
CREATE TABLE `asset_additional_cost` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assetno` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `usefullife` varchar(50) NOT NULL,
  `add_cost` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `asset_files`;
CREATE TABLE `asset_files` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assetno` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `directory` varchar(200) NOT NULL,
  PRIMARY KEY (`master_id`),
  KEY `assetno` (`assetno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `asset_physical_count`;
CREATE TABLE `asset_physical_count` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `phc_code` varchar(50) NOT NULL,
  `loc_code` varchar(50) NOT NULL,
  `dept_code` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `countedBy` varchar(50) NOT NULL,
  `reviewedBy` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cat_code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `master_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `empno` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mi` varchar(25) NOT NULL,
  `dept_code` varchar(50) NOT NULL,
  `loc_code` varchar(50) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `emp_asset_assigned`;
CREATE TABLE `emp_asset_assigned` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `empno` varchar(50) NOT NULL,
  `assetno` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`master_id`),
  KEY `empno` (`empno`),
  KEY `assetno` (`assetno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loc_code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `phc_assets`;
CREATE TABLE `phc_assets` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `phc_code` varchar(50) NOT NULL,
  `assetno` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status_code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2022-07-12 09:49:54
