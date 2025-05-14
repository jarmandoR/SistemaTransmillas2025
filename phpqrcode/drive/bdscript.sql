/**
 * Author:  alejandro
 * Created: 28/12/2021
 */

CREATE TABLE `drive_archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento_id` int(11) NOT NULL,
  `tabla` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_migracion` datetime NOT NULL,
  `procesado` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_tabla_documento_id` (`documento_id`,`tabla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
