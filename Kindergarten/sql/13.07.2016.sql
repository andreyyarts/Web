ALTER TABLE `kindergarten`.`children` 
ADD PRIMARY KEY (`Id_ch`),
CHANGE COLUMN `Id_ch` `Id_ch` INT(11) NOT NULL AUTO_INCREMENT 
CHANGE COLUMN `fio_ch` `fio_ch` VARCHAR(255) NOT NULL ,
CHANGE COLUMN `sex_ch` `sex_ch` VARCHAR(1) NOT NULL ,
CHANGE COLUMN `address_ch` `address_ch` TEXT NOT NULL ;

ALTER TABLE `kindergarten`.`tarifs` 
CHANGE COLUMN `descr_t` `descr_t` TEXT NOT NULL ;