SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `zendproject` ;
CREATE SCHEMA IF NOT EXISTS `zendproject` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `zendproject` ;

-- -----------------------------------------------------
-- Table `zendproject`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zendproject`.`user` ;

CREATE TABLE IF NOT EXISTS `zendproject`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` CHAR(32) NOT NULL,
  `gender` ENUM('male','female') NULL,
  `signature` TEXT NULL,
  `country` VARCHAR(45) NULL,
  `pic` TEXT NULL,
  `is_active` BIT NULL DEFAULT 1,
  `role` VARCHAR(45) NOT NULL DEFAULT 'student',
  `dob` DATE NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zendproject`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zendproject`.`category` ;

CREATE TABLE IF NOT EXISTS `zendproject`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zendproject`.`course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zendproject`.`course` ;

CREATE TABLE IF NOT EXISTS `zendproject`.`course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  `duration` VARCHAR(45) NULL,
  `category_id` INT NULL,
  `instructor_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_course_1_idx` (`category_id` ASC),
  INDEX `fk_course_2_idx` (`instructor_id` ASC),
  CONSTRAINT `fk_course_1`
    FOREIGN KEY (`category_id`)
    REFERENCES `zendproject`.`category` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_course_2`
    FOREIGN KEY (`instructor_id`)
    REFERENCES `zendproject`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zendproject`.`material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zendproject`.`material` ;

CREATE TABLE IF NOT EXISTS `zendproject`.`material` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  `course_id` INT NULL,
  `no_downloads` INT NOT NULL DEFAULT 0,
  `is_locked` BIT NOT NULL DEFAULT 0,
  `is_shown` BIT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_material_1_idx` (`course_id` ASC),
  CONSTRAINT `fk_material_1`
    FOREIGN KEY (`course_id`)
    REFERENCES `zendproject`.`course` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zendproject`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zendproject`.`comment` ;

CREATE TABLE IF NOT EXISTS `zendproject`.`comment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `body` TEXT NOT NULL,
  `user_id` INT NOT NULL,
  `course_id` INT NOT NULL,
  `material_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comment_1_idx` (`user_id` ASC),
  INDEX `fk_comment_2_idx` (`course_id` ASC),
  INDEX `fk_comment_3_idx` (`material_id` ASC),
  CONSTRAINT `fk_comment_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zendproject`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comment_2`
    FOREIGN KEY (`course_id`)
    REFERENCES `zendproject`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_3`
    FOREIGN KEY (`material_id`)
    REFERENCES `zendproject`.`material` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zendproject`.`request`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zendproject`.`request` ;

CREATE TABLE IF NOT EXISTS `zendproject`.`request` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `body` TEXT NOT NULL,
  `user_id` INT NOT NULL,
  `course_id` INT NULL,
  `response` TEXT NOT NULL,
  `responser_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_request_1_idx` (`user_id` ASC),
  INDEX `fk_request_2_idx` (`responser_id` ASC),
  INDEX `fk_request_3_idx` (`course_id` ASC),
  CONSTRAINT `fk_request_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zendproject`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_request_2`
    FOREIGN KEY (`responser_id`)
    REFERENCES `zendproject`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_request_3`
    FOREIGN KEY (`course_id`)
    REFERENCES `zendproject`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zendproject`.`student_courses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zendproject`.`student_courses` ;

CREATE TABLE IF NOT EXISTS `zendproject`.`student_courses` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `student_id` INT NOT NULL,
  `course_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_student_courses_1_idx` (`student_id` ASC),
  INDEX `fk_student_courses_2_idx` (`course_id` ASC),
  CONSTRAINT `fk_student_courses_1`
    FOREIGN KEY (`student_id`)
    REFERENCES `zendproject`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_student_courses_2`
    FOREIGN KEY (`course_id`)
    REFERENCES `zendproject`.`course` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
