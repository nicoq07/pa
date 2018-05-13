ALTER TABLE `alumnos` ADD `nacionalidad` VARCHAR(255) NULL DEFAULT NULL AFTER `edad`,
 ADD `cobertura_medica` VARCHAR(255) NULL DEFAULT NULL AFTER `nacionalidad`, 
 ADD `trabaja` BOOLEAN NOT NULL DEFAULT FALSE AFTER `cobertura_medica`;