ALTER TABLE `kindergarten`.`children` 
ADD COLUMN `birthday_ch` DATE NOT NULL AFTER `health_ch`,
ADD COLUMN `enrollment_date_ch` DATE NULL AFTER `birthday_ch`,
ADD COLUMN `outlet_date_ch` DATE NULL AFTER `enrollment_date_ch`;
