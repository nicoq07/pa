ALTER TABLE seguimientos_clases_alumnos ADD COLUMN
`fue_transferida` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'debe ponerse en true cuando un alumno es tranferido de clase';