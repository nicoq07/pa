/* Encender el programador de eventos */
SET GLOBAL event_scheduler="ON" ;

/* Creo el procedimiento almacenado */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_alumnos_por_clase`()
BEGIN
 update clases ,(SELECT c.id as id_clase , COUNT(ca.alumno_id) as cantidad_alumnos FROM clases_alumnos as ca RIGHT JOIN clases as c ON c.id = ca.clase_id GROUP BY c.id) as res set clases.alumno_count = res.cantidad_alumnos where clases.id = res.id_clase ;
 END$$
DELIMITER ;

/* Creo el evento */
CREATE DEFINER=`root`@`localhost` EVENT `evento_llamar_actualizar_alumnos_por_clase` ON SCHEDULE EVERY 6 HOUR STARTS '2018-04-04 00:00:00' ON COMPLETION PRESERVE ENABLE DO CALL actualizar_alumnos_por_clase()