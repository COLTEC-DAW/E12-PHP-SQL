
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `tenis`.`categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tenis`.`categorias` ;

CREATE TABLE IF NOT EXISTS `tenis`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`tenistas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tenis`.`tenistas` ;

CREATE TABLE IF NOT EXISTS `tenis`.`tenistas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(150) NOT NULL ,
  `data_nascimento` DATETIME NOT NULL ,
  `sexo` BIT NOT NULL ,
  `categorias_id` INT NOT NULL ,
  PRIMARY KEY (`id`)  ,
  INDEX `fk_tenistas_categorias1_idx` (`categorias_id` ASC)  ,
  CONSTRAINT `fk_tenistas_categorias1`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `tenis`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`campeonatos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tenis`.`campeonatos` ;

CREATE TABLE IF NOT EXISTS `tenis`.`campeonatos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(150) NOT NULL ,
  `edicao` VARCHAR(45) NULL ,
  `data_realizacao` DATETIME NOT NULL ,
  `premiacao` DECIMAL(10,2) NOT NULL ,
  PRIMARY KEY (`id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`jogos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tenis`.`jogos` ;

CREATE TABLE IF NOT EXISTS `tenis`.`jogos` (
  `tenista_01_id` INT NOT NULL ,
  `tenista_02_id` INT NOT NULL ,
  `campeonatos_id` INT NOT NULL ,
  `publico` INT NOT NULL ,
  `pontuacao_tenista_01` INT NOT NULL ,
  `pontuacao_tenista_02` INT NOT NULL ,
  `quadras_id` INT NOT NULL ,
  PRIMARY KEY (`tenista_01_id`, `tenista_02_id`, `campeonatos_id`)  ,
  INDEX `fk_sets_tenistas1_idx` (`tenista_01_id` ASC)  ,
  INDEX `fk_sets_tenistas2_idx` (`tenista_02_id` ASC)  ,
  INDEX `fk_jogos_campeonatos1_idx` (`campeonatos_id` ASC)  ,
  INDEX `fk_jogos_quadras1_idx` (`quadras_id` ASC)  ,
  CONSTRAINT `fk_sets_tenistas1`
    FOREIGN KEY (`tenista_01_id`)
    REFERENCES `tenis`.`tenistas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sets_tenistas2`
    FOREIGN KEY (`tenista_02_id`)
    REFERENCES `tenis`.`tenistas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_campeonatos1`
    FOREIGN KEY (`campeonatos_id`)
    REFERENCES `tenis`.`campeonatos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_quadras1`
    FOREIGN KEY (`quadras_id`)
    REFERENCES `tenis`.`quadras` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`quadras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tenis`.`quadras` ;

CREATE TABLE IF NOT EXISTS `tenis`.`quadras` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NOT NULL ,
  `endereco` VARCHAR(45) NOT NULL DEFAULT 'Brasil' ,
  PRIMARY KEY (`id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`jogos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tenis`.`jogos` ;

CREATE TABLE IF NOT EXISTS `tenis`.`jogos` (
  `tenista_01_id` INT NOT NULL ,
  `tenista_02_id` INT NOT NULL ,
  `campeonatos_id` INT NOT NULL ,
  `publico` INT NOT NULL ,
  `pontuacao_tenista_01` INT NOT NULL ,
  `pontuacao_tenista_02` INT NOT NULL ,
  `quadras_id` INT NOT NULL ,
  PRIMARY KEY (`tenista_01_id`, `tenista_02_id`, `campeonatos_id`)  ,
  INDEX `fk_sets_tenistas1_idx` (`tenista_01_id` ASC)  ,
  INDEX `fk_sets_tenistas2_idx` (`tenista_02_id` ASC)  ,
  INDEX `fk_jogos_campeonatos1_idx` (`campeonatos_id` ASC)  ,
  INDEX `fk_jogos_quadras1_idx` (`quadras_id` ASC)  ,
  CONSTRAINT `fk_sets_tenistas1`
    FOREIGN KEY (`tenista_01_id`)
    REFERENCES `tenis`.`tenistas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sets_tenistas2`
    FOREIGN KEY (`tenista_02_id`)
    REFERENCES `tenis`.`tenistas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_campeonatos1`
    FOREIGN KEY (`campeonatos_id`)
    REFERENCES `tenis`.`campeonatos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_quadras1`
    FOREIGN KEY (`quadras_id`)
    REFERENCES `tenis`.`quadras` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;