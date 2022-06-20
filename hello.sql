SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `hello`;
CREATE DATABASE IF NOT EXISTS `hello` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hello`;

CREATE TABLE IF NOT EXISTS `hello`.`users` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `idx_username` (`username` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `hello`.`notes` (
  `id_note` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `note` TEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `id_user` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id_note`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4;

CREATE USER IF NOT EXISTS 'www'@'localhost' IDENTIFIED BY '1234';

GRANT SELECT, INSERT, UPDATE, DELETE ON hello.* TO 'www'@'localhost';