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
  `monthlydep` varchar(50) NOT NULL,
  `annualdep` varchar(50) NOT NULL,
  `cat_code` varchar(50) NOT NULL,
  `dept_code` varchar(50) NOT NULL,
  `loc_code` varchar(50) NOT NULL,
  `status_code` varchar(50) NOT NULL,
  PRIMARY KEY (`master_id`),
  KEY `status_code` (`status_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `assets` (`master_id`, `assetno`, `description`, `modelno`, `serialno`, `dtefrom`, `dteto`, `cost`, `qty`, `usefullife`, `salvalue`, `salpercent`, `monthlydep`, `annualdep`, `cat_code`, `dept_code`, `loc_code`, `status_code`) VALUES
(12,	'test',	'1adasd',	'123',	'321',	'07-01-2022',	'07-31-2022',	'22222',	'1',	'2',	'2',	'',	'11110',	'0',	'CAT01',	'IT01',	'HO',	'STAT01');

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

INSERT INTO `category` (`master_id`, `cat_code`, `description`) VALUES
(1,	'CAT01',	'Laptops');

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `master_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `department` (`master_id`, `dept_code`, `description`) VALUES
(1,	'IT01',	'Software Devs');

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

INSERT INTO `employee` (`master_id`, `empno`, `position`, `fname`, `lname`, `mi`, `dept_code`, `loc_code`) VALUES
(1,	'Emp01',	'dev1',	'Christian Marvin ',	'Orsua',	'T.',	'IT01',	'HO');

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

INSERT INTO `emp_asset_assigned` (`master_id`, `empno`, `assetno`, `date`, `status`) VALUES
(2,	'Emp01',	'12',	'07-03-2022 11:55:12',	'Assigned'),
(3,	'Emp01',	'test',	'07-05-2022 04:51:09',	'Assigned');

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loc_code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `location` (`master_id`, `loc_code`, `description`) VALUES
(1,	'HO',	'Head Office');

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status_code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `status` (`master_id`, `status_code`, `description`) VALUES
(1,	'STAT01',	'In Use');

-- 2022-07-05 16:39:26
