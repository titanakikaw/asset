-- Adminer 4.8.1 MySQL 10.4.24-MariaDB dump

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
  `qty` varchar(50) NOT NULL,
  `usefullife` varchar(50) NOT NULL,
  `salvalue` varchar(50) NOT NULL,
  `salpercent` varchar(50) NOT NULL,
  `annualdep` varchar(50) NOT NULL,
  `cat_code` varchar(50) NOT NULL,
  `dept_code` varchar(50) NOT NULL,
  `loc_code` varchar(50) NOT NULL,
  `status_code` bigint(20) NOT NULL,
  PRIMARY KEY (`master_id`),
  KEY `status_code` (`status_code`),
  CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`status_code`) REFERENCES `status` (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `asset_files`;
CREATE TABLE `asset_files` (
  `master_id` int(11) NOT NULL,
  `file_id` bigint(20) NOT NULL,
  `assetno` bigint(20) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `file` varchar(200) NOT NULL,
  KEY `file_id` (`file_id`),
  KEY `assetno` (`assetno`),
  CONSTRAINT `asset_files_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `assets` (`master_id`),
  CONSTRAINT `asset_files_ibfk_2` FOREIGN KEY (`assetno`) REFERENCES `assets` (`master_id`)
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
  `assignid` varchar(50) NOT NULL,
  `empno` bigint(20) NOT NULL,
  `assetno` bigint(20) NOT NULL,
  PRIMARY KEY (`master_id`),
  KEY `empno` (`empno`),
  KEY `assetno` (`assetno`),
  CONSTRAINT `emp_asset_assigned_ibfk_1` FOREIGN KEY (`empno`) REFERENCES `employee` (`master_id`),
  CONSTRAINT `emp_asset_assigned_ibfk_2` FOREIGN KEY (`assetno`) REFERENCES `assets` (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loc_code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `location` (`master_id`, `loc_code`, `description`) VALUES
(3,	'HO - manila',	'Head Office Manila');

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status_code` varchar(50) NOT NULL,
  `description` int(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2022-06-30 23:09:23
