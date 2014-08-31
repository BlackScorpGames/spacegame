SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema spacegame
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users` ;

CREATE TABLE IF NOT EXISTS `users` (
  `userId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`userId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ships`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ships` ;

CREATE TABLE IF NOT EXISTS `ships` (
  `shipId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` INT UNSIGNED NOT NULL,
  `shipname` VARCHAR(45) NOT NULL,
  `posY` INT(10) UNSIGNED NOT NULL,
  `posX` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`shipId`, `userId`),
  CONSTRAINT `fk_ships_users`
    FOREIGN KEY (`userId`)
    REFERENCES `users` (`userId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_ships_users_idx` ON `ships` (`userId` ASC);


-- -----------------------------------------------------
-- Table `engines`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `engines` ;

CREATE TABLE IF NOT EXISTS `engines` (
  `engineId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `enginename` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`engineId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weapons`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `weapons` ;

CREATE TABLE IF NOT EXISTS `weapons` (
  `weaponId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `damage` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`weaponId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ship_has_weapons`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ship_has_weapons` ;

CREATE TABLE IF NOT EXISTS `ship_has_weapons` (
  `shipId` INT UNSIGNED NOT NULL,
  `weaponId` INT UNSIGNED NOT NULL,
  `slot` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`shipId`, `weaponId`),
  CONSTRAINT `fk_ships_has_weapons_ships1`
    FOREIGN KEY (`shipId`)
    REFERENCES `ships` (`shipId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ships_has_weapons_weapons1`
    FOREIGN KEY (`weaponId`)
    REFERENCES `weapons` (`weaponId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_ships_has_weapons_weapons1_idx` ON `ship_has_weapons` (`weaponId` ASC);

CREATE INDEX `fk_ships_has_weapons_ships1_idx` ON `ship_has_weapons` (`shipId` ASC);


-- -----------------------------------------------------
-- Table `ship_has_engines`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ship_has_engines` ;

CREATE TABLE IF NOT EXISTS `ship_has_engines` (
  `shipId` INT UNSIGNED NOT NULL,
  `engineId` INT UNSIGNED NOT NULL,
  `slot` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`shipId`, `engineId`),
  CONSTRAINT `fk_ships_has_engines_ships1`
    FOREIGN KEY (`shipId`)
    REFERENCES `ships` (`shipId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ships_has_engines_engines1`
    FOREIGN KEY (`engineId`)
    REFERENCES `engines` (`engineId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_ships_has_engines_engines1_idx` ON `ship_has_engines` (`engineId` ASC);

CREATE INDEX `fk_ships_has_engines_ships1_idx` ON `ship_has_engines` (`shipId` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
