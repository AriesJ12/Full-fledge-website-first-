CREATE TABLE `table_region` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(50) NOT NULL UNIQUE,
  `region_description` varchar(100) NOT NULL,
  PRIMARY KEY (`region_id`)
);

-- Dumping data for table philippines_database.table_region: ~17 rows (approximately)
INSERT INTO `table_region` (`region_id`, `region_name`, `region_description`) VALUES
	(1, 'NCR', 'National Capital Region'),
	(2, 'CAR', 'Cordillera Administrative Region'),
	(3, 'Region I', 'Ilocos Region'),
	(4, 'Region II', 'Cagayan Valley'),
	(5, 'Region III', 'Central Luzon'),
	(6, 'Region IV-A', 'CALABARZON'),
	(7, 'Region IV-B', 'MIMAROPA'),
	(8, 'Region V', 'Bicol Region'),
	(9, 'Region VI', 'Western Visayas'),
	(10, 'Region VII', 'Central Visayas'),
	(11, 'Region VIII', 'Eastern Visayas'),
	(12, 'Region IX', 'Zamboanga Peninsula'),
	(13, 'Region X', 'Northern Mindanao'),
	(14, 'Region XI', 'Davao Region'),
	(15, 'Region XII', 'SOCCSKSARGEN'),
	(16, 'Region XIII', 'CARAGA'),
	(17, 'ARMM', 'Autonomous Region in Muslim Mindanao');

CREATE TABLE `table_province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `province_name` varchar(100) NOT NULL,
  PRIMARY KEY (`province_id`),
  UNIQUE KEY `UQT_provincename` (`region_id`,`province_name`),
  CONSTRAINT `FK_table_province_table_region` FOREIGN KEY (`region_id`) REFERENCES `table_region` (`region_id`)
);

-- Dumping data for table philippines_database.table_province: ~82 rows (approximately)
INSERT INTO `table_province` (`province_id`, `region_id`, `province_name`) VALUES
	(1, 1, 'Metro Manila'),
	(67, 2, 'Abra'),
	(72, 2, 'Apayao'),
	(68, 2, 'Benguet'),
	(69, 2, 'Ifugao'),
	(70, 2, 'Kalinga'),
	(71, 2, 'Mountain Province'),
	(2, 3, 'Ilocos Norte'),
	(3, 3, 'Ilocos Sur'),
	(4, 3, 'La Union'),
	(5, 3, 'Pangasinan'),
	(6, 4, 'Batanes'),
	(7, 4, 'Cagayan'),
	(8, 4, 'Isabela'),
	(9, 4, 'Nueva Vizcaya'),
	(10, 4, 'Quirino'),
	(17, 5, 'Aurora'),
	(11, 5, 'Bataan'),
	(12, 5, 'Bulacan'),
	(13, 5, 'Nueva Ecija'),
	(14, 5, 'Pampanga'),
	(15, 5, 'Tarlac'),
	(16, 5, 'Zambales'),
	(18, 6, 'Batangas'),
	(19, 6, 'Cavite'),
	(20, 6, 'Laguna'),
	(21, 6, 'Quezon'),
	(22, 6, 'Rizal'),
	(23, 7, 'Marinduque'),
	(24, 7, 'Occidental Mindoro'),
	(25, 7, 'Oriental Mindoro'),
	(26, 7, 'Palawan'),
	(27, 7, 'Romblon'),
	(28, 8, 'Albay'),
	(29, 8, 'Camarines Norte'),
	(30, 8, 'Camarines Sur'),
	(31, 8, 'Catanduanes'),
	(32, 8, 'Masbate'),
	(33, 8, 'Sorsogon'),
	(34, 9, 'Aklan'),
	(35, 9, 'Antique'),
	(36, 9, 'Capiz'),
	(39, 9, 'Guimaras'),
	(37, 9, 'Iloilo'),
	(38, 9, 'Negros Occidental'),
	(40, 10, 'Bohol'),
	(41, 10, 'Cebu'),
	(42, 10, 'Negros Oriental'),
	(43, 10, 'Siquijor'),
	(49, 11, 'Biliran'),
	(44, 11, 'Eastern Samar'),
	(45, 11, 'Leyte'),
	(46, 11, 'Northern Samar'),
	(47, 11, 'Samar'),
	(48, 11, 'Southern Leyte'),
	(50, 12, 'Zamboanga del Norte'),
	(51, 12, 'Zamboanga del Sur'),
	(52, 12, 'Zamboanga Sibugay'),
	(53, 13, 'Bukidnon'),
	(54, 13, 'Camiguin'),
	(55, 13, 'Lanao del Norte'),
	(56, 13, 'Misamis Occidental'),
	(57, 13, 'Misamis Oriental'),
	(61, 14, 'Davao de Oro'),
	(58, 14, 'Davao del Norte'),
	(59, 14, 'Davao del Sur'),
	(62, 14, 'Davao Occidental'),
	(60, 14, 'Davao Oriental'),
	(63, 15, 'Cotabato'),
	(66, 15, 'Sarangani'),
	(64, 15, 'South Cotabato'),
	(65, 15, 'Sultan Kudarat'),
	(78, 16, 'Agusan del Norte'),
	(79, 16, 'Agusan del Sur'),
	(82, 16, 'Dinagat Islands'),
	(80, 16, 'Surigao del Norte'),
	(81, 16, 'Surigao del Sur'),
	(73, 17, 'Basilan'),
	(74, 17, 'Lanao del Sur'),
	(75, 17, 'Maguindanao'),
	(76, 17, 'Sulu'),
	(77, 17, 'Tawi-Tawi');