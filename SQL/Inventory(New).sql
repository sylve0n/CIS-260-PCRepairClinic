-- MySQL Script generated by MySQL Workbench
-- Thu Mar 22 15:22:21 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema inventory
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `inventory` ;

-- -----------------------------------------------------
-- Schema inventory
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inventory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;
USE `inventory` ;

-- -----------------------------------------------------
-- Table `inventory`.`bar_code`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inventory`.`bar_code` ;

CREATE TABLE IF NOT EXISTS `inventory`.`bar_code` (
  `BarCodeID` INT(16) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID for each bar code.',
  `BarCode` CHAR(16) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Bar Code.',
  `Timestamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp.',
  PRIMARY KEY (`BarCodeID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE UNIQUE INDEX `BarCodeID_UNIQUE` ON `inventory`.`bar_code` (`BarCodeID` ASC);

CREATE UNIQUE INDEX `BarCode_UNIQUE` ON `inventory`.`bar_code` (`BarCode` ASC);


-- -----------------------------------------------------
-- Table `inventory`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inventory`.`category` ;

CREATE TABLE IF NOT EXISTS `inventory`.`category` (
  `CategoryID` INT(16) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID for each category.',
  `CategoryName` CHAR(50) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Category name.',
  `Timestamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp.',
  `IsActive` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`CategoryID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE UNIQUE INDEX `CategoryID_UNIQUE` ON `inventory`.`category` (`CategoryID` ASC);

CREATE UNIQUE INDEX `CategoryName_UNIQUE` ON `inventory`.`category` (`CategoryName` ASC);


-- -----------------------------------------------------
-- Table `inventory`.`memory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inventory`.`memory` ;

CREATE TABLE IF NOT EXISTS `inventory`.`memory` (
  `PartID` INT(16) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID for each part.',
  `BarCodeID` INT(16) NOT NULL,
  `CategoryID` INT(16) NOT NULL,
  `TimeStamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp.',
  `Quanity` INT(16) NOT NULL,
  `IsNew` TINYINT NOT NULL DEFAULT 0,
  `IsTested` TINYINT NOT NULL DEFAULT 0,
  `Brand` CHAR(50) NOT NULL,
  `Size` CHAR(25) NOT NULL,
  `Type` CHAR(25) NOT NULL,
  `Rate` CHAR(25) NOT NULL,
  `StandardName` CHAR(50) NOT NULL,
  `ModuleName` CHAR(50) NOT NULL,
  `IsLaptop` TINYINT NOT NULL DEFAULT 0,
  `IsLowVoltage` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`PartID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE UNIQUE INDEX `PartID_UNIQUE` ON `inventory`.`memory` (`PartID` ASC);

CREATE UNIQUE INDEX `BarCodeID_UNIQUE` ON `inventory`.`memory` (`BarCodeID` ASC);


-- -----------------------------------------------------
-- Table `inventory`.`motherboard`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inventory`.`motherboard` ;

CREATE TABLE IF NOT EXISTS `inventory`.`motherboard` (
  `PartID` INT(16) NOT NULL AUTO_INCREMENT COMMENT 'Unique number assigned to each record.',
  `BarCodeID` INT(16) NOT NULL,
  `CategoryID` INT(16) NOT NULL,
  `TimeStamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp.',
  `Quanity` INT(16) NOT NULL COMMENT 'Quanity on hand.',
  `IsNew` TINYINT NOT NULL DEFAULT 0 COMMENT 'Motherboard is / is not new.',
  `IsTested` TINYINT NOT NULL DEFAULT 0 COMMENT 'Motherboard has / has not tested good.',
  `Brand` CHAR(50) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Motherboard brand.',
  `Model` CHAR(50) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Motherboard model',
  `Revision` CHAR(25) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Motherboard revision.',
  `FormFactor` CHAR(25) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Motherboard form factor.',
  `CpuBrand` CHAR(25) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Motherboard CPU brand.',
  `Socket` CHAR(25) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Motherboard socket.',
  `Chipset` CHAR(25) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Motherboard chipset.',
  PRIMARY KEY (`PartID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
COMMENT = 'This table is designed to keep track of motherboard details.';

CREATE UNIQUE INDEX `PartID_UNIQUE` ON `inventory`.`motherboard` (`PartID` ASC);

CREATE UNIQUE INDEX `BarCodeID_UNIQUE` ON `inventory`.`motherboard` (`BarCodeID` ASC);


-- -----------------------------------------------------
-- Table `inventory`.`part_number`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inventory`.`part_number` ;

CREATE TABLE IF NOT EXISTS `inventory`.`part_number` (
  `PartNumberID` INT(16) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID for each part number.',
  `BarCodeID` INT(16) NOT NULL,
  `PartNumber` CHAR(50) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Part Number.',
  `Timestamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp.',
  PRIMARY KEY (`PartNumberID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE UNIQUE INDEX `PartNumberID_UNIQUE` ON `inventory`.`part_number` (`PartNumberID` ASC);

CREATE UNIQUE INDEX `PartNumber_UNIQUE` ON `inventory`.`part_number` (`PartNumber` ASC);

CREATE UNIQUE INDEX `BarCodeID_UNIQUE` ON `inventory`.`part_number` (`BarCodeID` ASC);


-- -----------------------------------------------------
-- Table `inventory`.`processor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inventory`.`processor` ;

CREATE TABLE IF NOT EXISTS `inventory`.`processor` (
  `PartID` INT(16) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID for each part.',
  `BarCodeID` INT(16) NOT NULL,
  `CategoryID` INT(16) NOT NULL,
  `TimeStamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp.',
  `Quanity` INT(16) NOT NULL,
  `IsNew` TINYINT NOT NULL DEFAULT 0,
  `IsTested` TINYINT NOT NULL DEFAULT 0,
  `Brand` CHAR(50) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT 'Part Details.',
  `Model` CHAR(50) NOT NULL,
  `Cores` CHAR(25) NOT NULL,
  `ClockRate` CHAR(25) NOT NULL,
  `Socket` CHAR(25) NOT NULL,
  `CodeName` CHAR(50) NOT NULL,
  PRIMARY KEY (`PartID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE UNIQUE INDEX `PartID_UNIQUE` ON `inventory`.`processor` (`PartID` ASC);

CREATE UNIQUE INDEX `BarCodeID_UNIQUE` ON `inventory`.`processor` (`BarCodeID` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;