/**
 * 'geo_districts' Table
 * @author Sagun Khosla <sagunxp@gmail.com>
 */

DROP TABLE IF EXISTS `geo_districts`;
CREATE TABLE `geo_districts` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`name_ar` varchar(255) NOT NULL,
	`name_en` varchar(255) NOT NULL,
	`casa_id` integer(11) UNSIGNED NOT NULL DEFAULT 0,
	`created_at` datetime DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `geo_districts` (`id`, `name_ar`,  `name_en`, `casa_id`) VALUES 
(1, "الشرحبيل", "Sharhabil", 2947),
(2, "حي البراد", "Hay Al-Barad", 2947),
(3, "عبرا", "Abra", 2947),
(4, "عين الدلب", "Aein El-Delib", 2947);