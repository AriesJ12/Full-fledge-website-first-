-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2023 at 11:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hop2eat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `active_account` (IN `accountId` INT, IN `newActiveStatus` TINYINT(1))   BEGIN
    UPDATE account
    SET active = newActiveStatus
    WHERE id = accountId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `active_cuisine` (IN `cuisineId` INT, IN `newActiveStatus` TINYINT(1))   BEGIN
    UPDATE restaurant_cuisine
    SET active = newActiveStatus
    WHERE id = cuisineId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `active_rating` (IN `ratingId` INT, IN `newActiveStatus` TINYINT(1))   BEGIN
    UPDATE rating
    SET active = newActiveStatus
    WHERE id = ratingId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `active_restaurant` (IN `restaurant_id` INT)   BEGIN
    UPDATE restaurant
    SET active = 0
    WHERE id = restaurant_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_cuisine` (IN `restaurantId` INT, IN `classificationId` INT, IN `newName` VARCHAR(255), IN `newImageUrl` VARCHAR(255))   BEGIN
    INSERT INTO restaurant_cuisine (restaurantId, classificationID, name, ImageURL)
    VALUES (restaurantId, classificationId, newName, newImageUrl);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_rating` (IN `restaurantId` INT, IN `accountId` INT, IN `ratingValue` DECIMAL(3,2), IN `comment` TEXT)   BEGIN
    INSERT INTO rating (restaurant_id, accountId, rating_value, comment)
    VALUES (restaurantId, accountId, ratingValue, comment);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_restaurant` (IN `newName` VARCHAR(255), IN `newDescription` TEXT, IN `newPhone` VARCHAR(20), IN `newWebsite` VARCHAR(255), IN `newEmail` VARCHAR(255), IN `newCityAndBarangay` VARCHAR(255), IN `newProvinceId` INT, IN `newImageUrl` VARCHAR(255))   BEGIN
    INSERT INTO restaurant (name, description, phone, website, email, city_and_barangay, province_id, ImageURL)
    VALUES (newName, newDescription, newPhone, newWebsite, newEmail, newCityAndBarangay, newProvinceId, newImageUrl);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `display_rating_ranked_by_date` (IN `accountId` INT, IN `restaurantId` INT)   BEGIN
    IF accountId IS NOT NULL AND restaurantId IS NOT NULL THEN
        -- Filter by both account ID and restaurant ID
        SELECT r.*, a.username, a.email, a.first_name, a.last_name, a.profileImage, res.name AS restaurant_name
        FROM rating r
        JOIN account a ON r.accountId = a.id
        JOIN restaurant res ON r.restaurant_id = res.id
        WHERE r.active = 1 AND r.accountId = accountId AND r.restaurant_id = restaurantId
        ORDER BY r.rating_date DESC;
    ELSEIF accountId IS NOT NULL THEN
        -- Filter by account ID only
        SELECT r.*, a.username, a.email, a.first_name, a.last_name, a.profileImage, res.name AS restaurant_name
        FROM rating r
        JOIN account a ON r.accountId = a.id
        JOIN restaurant res ON r.restaurant_id = res.id
        WHERE r.active = 1 AND r.accountId = accountId
        ORDER BY r.rating_date DESC;
    ELSEIF restaurantId IS NOT NULL THEN
        -- Filter by restaurant ID only
        SELECT r.*, a.username, a.email, a.first_name, a.last_name, a.profileImage, res.name AS restaurant_name
        FROM rating r
        JOIN account a ON r.accountId = a.id
        JOIN restaurant res ON r.restaurant_id = res.id
        WHERE r.active = 1 AND r.restaurant_id = restaurantId
        ORDER BY r.rating_date DESC;
    ELSE
        -- No filters applied
        SELECT r.*, a.username, a.email, a.first_name, a.last_name, a.profileImage, res.name AS restaurant_name
        FROM rating r
        JOIN account a ON r.accountId = a.id
        JOIN restaurant res ON r.restaurant_id = res.id
        WHERE r.active = 1
        ORDER BY r.rating_date DESC;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_cuisine` ()   BEGIN
    SELECT cuis.classificationID AS classification_id, cuis.restaurantID AS restaurant_id,
    cuis.ImageURL AS image, cuis.name AS cuisine_name, class.name AS classification, 
    res.name AS restaurant_name, res.website AS website, res.active AS active,
    CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) AS address
    FROM restaurant_cuisine AS cuis
    INNER JOIN cuisine_classification AS class ON cuis.classificationID = class.id 
    INNER JOIN restaurant AS res ON cuis.restaurantID = res.id
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    WHERE res.active = 1 AND cuis.active = 1
    ORDER BY res.rating DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_cuisine_filter` (IN `search_name` VARCHAR(50), IN `search_class` INT, IN `search_location` VARCHAR(50))   BEGIN
    SELECT cuis.classificationID AS classification_id, cuis.restaurantID AS restaurant_id,
    cuis.ImageURL AS image, cuis.name AS cuisine_name, class.name AS classification, 
    res.name AS restaurant_name, res.website AS website, res.active AS active,
    CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) AS address
    FROM restaurant_cuisine AS cuis
    INNER JOIN cuisine_classification AS class ON cuis.classificationID = class.id 
    INNER JOIN restaurant AS res ON cuis.restaurantID = res.id
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    WHERE res.active = 1 AND cuis.active = 1
        AND (search_class IS NULL OR cuis.classificationID = search_class)
        AND (search_name = '' OR cuis.name LIKE CONCAT('%', search_name, '%'))
        AND (search_location = '' OR CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) LIKE CONCAT('%', search_location, '%'))
    ORDER BY res.rating DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_restaurant` ()   BEGIN
    SELECT res.id AS id, res.name AS name, res.description AS description, res.phone AS phone, 
    res.website AS website, res.email AS email, res.rating AS rating, res.ImageURL AS image, res.active AS active,
    CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) AS address
    FROM restaurant AS res
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    WHERE res.active = 1
    ORDER BY rating DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_restaurant_by_id` (IN `restaurant_id` INT)   BEGIN
    SELECT res.id AS id, res.name AS name, res.description AS description, res.phone AS phone, 
    res.website AS website, res.email AS email, res.rating AS rating, res.ImageURL AS image, res.active AS active,
    CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) AS address
    FROM restaurant AS res
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    WHERE res.active = 1 AND res.id = restaurant_id
    ORDER BY rating DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_restaurant_cuisine` (IN `search_class` INT)   BEGIN
    SELECT cuis.classificationID AS classification_id, cuis.restaurantID AS restaurant_id,
    res.ImageURL AS image, class.name AS classification, res.description AS description,
    res.rating AS rating,
    res.name AS restaurant_name, res.website AS website, res.active AS active,
    CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) AS address
    FROM restaurant_cuisine AS cuis
    INNER JOIN cuisine_classification AS class ON cuis.classificationID = class.id 
    INNER JOIN restaurant AS res ON cuis.restaurantID = res.id
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    WHERE res.active = 1 AND cuis.classificationID = search_class
    GROUP BY cuis.restaurantID
    ORDER BY res.rating DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_restaurant_filter` (IN `search_name` VARCHAR(50), IN `search_location` VARCHAR(50))   BEGIN
    SELECT res.id AS id, res.name AS name, res.description AS description, res.phone AS phone, 
        res.website AS website, res.email AS email, res.rating AS rating, res.ImageURL AS image, res.active AS active,
        CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) AS address
    FROM restaurant AS res
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    WHERE res.active = 1
        AND (search_name = '' OR res.name LIKE CONCAT('%', search_name, '%'))
        AND (search_location = '' OR CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) LIKE CONCAT('%', search_location, '%'))
    ORDER BY rating DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateRestaurant` (IN `restaurantId` INT, IN `newName` VARCHAR(255), IN `newDescription` TEXT, IN `newPhone` VARCHAR(20), IN `newWebsite` VARCHAR(255), IN `newEmail` VARCHAR(255), IN `newCityAndBarangay` VARCHAR(255), IN `newProvinceId` INT, IN `newRating` DECIMAL(3,2), IN `newImageUrl` VARCHAR(255), IN `newActive` TINYINT(1))   BEGIN
    UPDATE restaurant
    SET name = newName,
        description = newDescription,
        phone = newPhone,
        website = newWebsite,
        email = newEmail,
        city_and_barangay = newCityAndBarangay,
        province_id = newProvinceId,
        rating = newRating,
        ImageURL = newImageUrl,
        active = newActive
    WHERE id = restaurantId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_cuisine` (IN `cuisineId` INT, IN `newName` VARCHAR(255), IN `newImageUrl` VARCHAR(255))   BEGIN
    UPDATE restaurant_cuisine
    SET name = newName, ImageURL = newImageUrl
    WHERE id = cuisineId;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `profileImage` varchar(255) DEFAULT NULL,
  `account_type` tinyint(1) DEFAULT 0,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `profileImage`, `account_type`, `active`, `created_at`, `updated_at`) VALUES
(1, 'aries', 'aries@email.com\r\n', 'ariestagle', NULL, NULL, NULL, 1, 1, '2023-05-25 06:45:09', '2023-05-25 07:41:47'),
(2, 'mark', NULL, 'markbeltran', NULL, NULL, NULL, 0, 1, '2023-05-25 06:45:09', '2023-05-25 06:45:09'),
(3, 'kian', NULL, 'kiandavid', NULL, NULL, NULL, 0, 1, '2023-05-25 06:45:09', '2023-05-25 06:45:09'),
(4, 'kriesha', NULL, 'krieshabuglosa', NULL, NULL, NULL, 0, 1, '2023-05-25 06:45:09', '2023-05-25 06:45:09'),
(5, 'willie', NULL, 'willieroldan', NULL, NULL, NULL, 0, 1, '2023-05-25 06:45:09', '2023-05-25 06:45:09'),
(6, 'joseph_a', 'JosephAgoncillo@gmail.com', '111111111', 'Joseph', 'Agoncillo', 'pic1.jpg', 1, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(7, 'kervinss', 'Harold02@gmail.com', '22222222', 'Harold Kervin', 'De Mesa', 'pic2.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(8, 'Kylie.mavs', 'Kyliemavs@gmail.com', '33333333', 'Kylie', 'Francisco', 'pic3.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(9, 'avey_avey', 'AverySanchez@gmail.com', '44444444', 'Avery', 'Sanchez', 'pic4.jpg', 1, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(10, 'Timothee12', 'TimothyFlores@gmail.com', '55555555', 'Timothy', 'Flores', 'pic5.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(11, 'Clarence14', 'Clarence14@gmail.com', '66666666', 'John Clarence', 'Perez', 'pic6.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(12, 'Im_Ritchie', 'RitchieGatus@gmail.com', '77777777', 'Ritchie', 'Gatus', 'pic7.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(13, 'Maria_sleepyhead', 'MariaBautista@gmail.com', '88888888', 'Maria Lena', 'Bautista', 'pic8.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(14, 'Art_gab01', 'ArtGrabriel01@gmail.com', '99999999', 'Art Gabriel', 'Rivera', 'pic9.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(15, 'helenn_23', 'Helen23@gmail.com', '10101010', 'Helen', 'Garcia', 'pic10.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(16, 'Rowinwin', 'RowinCastro@gmail.com', '11111110', 'Rowin', 'Castro', 'pic11.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(17, 'Lucygurl10', 'LucyAguilar10@gmail.com', '12121212', 'Lucy', 'Aguila', 'pic12.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(18, 'shineCrystal', 'CrystalAndrade@gmail.com', '13131313', 'CrystaL Mae', 'Andrade', 'pic13.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(19, 'Mary123', 'MaryLopez@gmail.com', '14141414', 'Mary', 'Lopez', 'pic14.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(20, 'Carlshibe', 'CarlGonzales15@gmail.com', '15151515', 'Carl Justin', 'Gonzales', 'pic15.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(21, 'Error_Earl', 'EarlClinton00@gmail.com', '16161616', 'Earl Clinton', 'Garcia', 'pic16.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(22, 'Hannsz143', 'HannsAndrei34@gmail.com', '17171717', 'Hanns Andrei', 'Hernaez', 'pic17.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(23, 'Trish-aaa28', 'Trisha.Ferrer@gmail.com', '18181818', 'Trisha', 'Ferre', 'pic18.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(24, 'Vinceonle', 'VinceMercado@gmail.com', '19191919', 'Vince Aaron', 'Mercado', 'pic19.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31'),
(25, 'Benben2', 'BenPascual@gmail.com', '20202020', 'Benedict', 'Pascual', 'pic20.jpg', 0, 1, '2023-05-25 08:24:31', '2023-05-25 08:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine_classification`
--

CREATE TABLE `cuisine_classification` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuisine_classification`
--

INSERT INTO `cuisine_classification` (`id`, `name`) VALUES
(1, 'breakfast'),
(3, 'dinner'),
(2, 'lunch');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `accountId` int(11) DEFAULT NULL,
  `rating_value` decimal(3,2) NOT NULL,
  `rating_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` text DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `rating`
--
DELIMITER $$
CREATE TRIGGER `update_restaurant_rating` AFTER INSERT ON `rating` FOR EACH ROW UPDATE restaurant
SET rating = (
    SELECT AVG(rating_value)
    FROM rating
    WHERE restaurant_Id = NEW.restaurant_Id
)
WHERE id = NEW.restaurant_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city_and_barangay` varchar(255) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT 0.00,
  `ImageURL` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `description`, `phone`, `website`, `email`, `city_and_barangay`, `province_id`, `rating`, `ImageURL`, `active`) VALUES
(1, 'La Trattoria', 'Authentic Italian cuisine with a cozy ambiance.', '+1-123-456-7890', 'www.latrattoria.com', 'info@latrattoria.com', ' Tagbilaran City, Dao', 40, 0.00, 'resto1.jpg', 1),
(2, 'The Spice House', 'A vibrant Indian restaurant serving flavorful curries and tandoori dishes.', '+1-234-567-8901', 'www.spicehouse.com', 'info@spicehouse.com', 'Conner, Conner Poblacion', 72, 0.00, 'resto2.jpg', 1),
(3, 'Le Bistro Français', 'Experience the taste of France with exquisite French cuisine.', '+1-345-678-9012', 'www.lebistro.com', 'info@lebistro.com', 'Bayombong, Don Mariano Marcos', 9, 0.00, 'resto3.jpg', 1),
(4, 'Sushi Zen', 'Enjoy fresh and authentic Japanese sushi rolls and sashimi.', '+1-456-789-0123', 'www.sushizen.com', 'info@sushizen.com', ' Cagayan de Oro City, Carmen', 57, 0.00, 'resto4.jpg', 1),
(5, 'El Rancho Steakhouse', 'A classic steakhouse offering mouthwatering steaks and grilled specialties.', '+1-567-890-1234', 'www.elrancho.com', 'info@elrancho.com', 'Masbate City, Bapor', 32, 0.00, 'resto5.jpg', 1),
(6, 'Thai Orchid', 'Delight in the flavors of Thailand through authentic Thai cuisine.', '+1-678-901-2345', 'www.thaiorchid.com', 'info@thaiorchid.com', 'Jolo, Asturias', 76, 0.00, 'resto6.jpg', 1),
(7, 'The Greek Taverna', 'Experience the taste of Greece with traditional Greek dishes and mezes.', '+1-789-012-3456', 'www.greektaverna.com', 'info@greektaverna.com', 'Baguio City, Camp 7', 68, 0.00, 'resto7.jpg', 1),
(8, 'Tex-Mex Fiesta', 'Savor the flavors of Tex-Mex cuisine with hearty burritos, fajitas, and nachos.', '+1-890-123-4567', 'www.texmexfiesta.com', 'info@texmexfiesta.com', 'Calapan City, Brgy. IV', 25, 0.00, 'resto8.jpg', 1),
(9, 'Bistro de Paris', 'French-inspired bistro serving delectable pastries and gourmet dishes.', '+1-901-234-5678', 'www.bistrodeparis.com', 'info@bistrodeparis.com', ' Dipolog City, Minaog', 50, 0.00, 'resto9.jpg', 1),
(10, 'Tokyo Ramen House', 'Indulge in authentic Japanese ramen bowls with rich and flavorful broths.', '+1-012-345-6789', 'www.tokyoramen.com', 'info@tokyoramen.com', ' Batangas City, Balagtas', 18, 0.00, 'resto10.jpg', 1),
(11, 'Casa de Tapas', 'Enjoy the lively atmosphere and Spanish tapas at this vibrant restaurant.', '+1-123-456-7890', 'www.casadetapas.com', 'info@casadetapas.com', 'Isulan, Kalawag', 65, 0.00, 'resto11.jpg', 1),
(12, 'Himalayan Curry House', 'Dive into the flavors of Nepal and India with aromatic curries and naan bread.', '+1-234-567-8901', 'www.himalayancurry.com', 'info@himalayancurry.com', 'Balanga City, Tenejero', 11, 0.00, 'resto12.jpg', 1),
(13, 'Seafood Sensations', 'A seafood lovers paradise with a wide selection of fresh seafood dishes.', '+1-345-678-9012', 'www.seafoodsensations.com', 'info@seafoodsensations.com', 'Surigao City, Taft', 80, 0.00, 'resto13.jpg', 1),
(14, 'The Vegan Garden', 'Plant-based eatery offering a variety of delicious vegan and vegetarian dishes.', '+1-456-789-0123', 'www.vegangarden.com', 'info@vegangarden.com', 'Lucena City, Gulang-Gulang', 21, 0.00, 'resto14.jpg', 1),
(15, 'Bao Buns & Dumplings', 'A modern Asian eatery specializing in fluffy bao buns and flavorful dumplings.', '+1-567-890-1234', 'www.baobuns.com', 'info@baobuns.com', 'Tuguegarao City, Pengue-Ruyu', 7, 0.00, 'resto15.jpg', 1),
(16, 'Tacos & Tequila', 'Enjoy a fiesta of Mexican flavors with tacos, margaritas, and tequila.', '+1-678-901-2345', 'www.tacosandtequila.com', 'info@tacosandtequila.com', 'Catarman, Mabolo', 46, 0.00, 'resto16.jpg', 1),
(17, 'Hanami Sushi Bar', 'Experience the art of sushi-making at this stylish Japanese sushi bar.', '+1-789-012-3456', 'www.hanamisushi.com', 'info@hanamisushi.com', 'Buluan, Poblacion', 75, 0.00, 'resto17.jpg', 1),
(18, 'Mamma Mia Pizzeria', 'Authentic Italian pizzeria serving wood-fired pizzas with fresh toppings.', '+1-890-123-4567', 'www.mammamia.com', 'info@mammamia.com', 'Naga City, Bagumbayan Norte', 30, 0.00, 'resto18.jpg', 1),
(19, 'Seoul Garden BBQ', 'Cook your own Korean barbecue and enjoy a variety of Korean dishes.', '+1-901-234-5678', 'www.seoulgardenbbq.com', 'info@seoulgardenbbq.com', 'Kidapawan City, Lanao', 63, 0.00, 'resto19.jpg', 1),
(20, 'Brasserie Les Halles', 'A French brasserie offering a mix of traditional and modern French cuisine.', '+1-012-345-6789', 'www.leshallesbrasserie.com', 'info@leshallesbrasserie.com', 'Tarlac City, San Roque', 15, 0.00, 'resto20.jpg', 1),
(21, 'The Steakhouse', 'Indulge in prime cuts of steak and a fine selection of wines.', '+1-123-456-7890', 'www.thesteakhouse.com', 'info@thesteakhouse.com', 'Roxas City, Dayao', 36, 0.00, 'resto21.jpg', 1),
(22, 'The Curry House', 'A paradise for curry lovers, serving aromatic and flavorful curry dishes.', '+1-234-567-8901', 'www.curryhouse.com', 'info@curryhouse.com', 'Prosperidad, Poblacion', 79, 0.00, 'resto22.jpg', 1),
(23, 'Mamma Mia Gelateria', 'Cool down with authentic Italian gelato in a variety of delightful flavors.', '+1-345-678-9012', 'www.mammamiagelato.com', 'info@mammamiagelato.com', 'Mambajao, Poblacion', 54, 0.00, 'resto23.jpg', 1),
(24, 'The Oriental Garden', 'Experience the rich flavors of Asian cuisine in an elegant setting.', '+1-456-789-0123', 'www.orientalgarden.com', 'info@orientalgarden.com', 'Laoag City, Barit', 2, 0.00, 'resto24.jpg', 1),
(25, 'Le Petit Café', 'A charming French café serving pastries, sandwiches, and gourmet coffee.', '+1-567-890-1234', 'www.lepetitcafe.com', 'info@lepetitcafe.com', 'Alabel, Bagacay', 66, 0.00, 'resto25.jpg', 1),
(26, 'Peking Duck House', 'Delight in authentic Peking duck and other Chinese specialties.', '+1-678-901-2345', 'www.pekingduckhouse.com', 'info@pekingduckhouse.com', 'Palayan City, Singalat', 13, 0.00, 'resto26.jpg', 1),
(27, 'The Pasta Factory', 'Handcrafted pasta dishes made with fresh ingredients and homemade sauces.', '+1-789-012-3456', 'www.pastafactory.com', 'info@pastafactory.com', 'Bongao, Maraning', 77, 0.00, 'resto27.jpg', 1),
(28, 'Bahn Mi Express', 'A taste of Vietnam with flavorful banh mi sandwiches and Vietnamese street food.', '+1-890-123-4567', 'www.banhmiexpress.com', 'info@banhmiexpress.com', 'Borongan City, Maypangdan', 44, 0.00, 'resto28.jpg', 1),
(29, 'The Grill House', 'A casual grill house specializing in grilled meats and hearty comfort food.', '+1-901-234-5678', 'www.thegrillhouse.com', 'info@thegrillhouse.com', 'Boac, Murallon', 23, 0.00, 'resto29.jpg', 1),
(30, 'Vegetarian Paradise', 'A haven for vegetarians, offering a wide range of delicious plant-based dishes.', '+1-012-345-6789', 'www.vegetarianparadise.com', 'info@vegetarianparadise.com', 'Ipil, Don Andres', 52, 0.00, 'resto30.jpg', 1),
(31, 'The Dim Sum House', 'Indulge in a variety of delectable dim sum and Cantonese specialties.', '+1-123-456-7890', 'www.dimsumhouse.com', 'info@dimsumhouse.com', 'Daet, Bagasbas', 29, 0.00, 'resto31.jpg', 1),
(32, 'The Coastal Grill', 'Enjoy a seafood feast with a stunning view of the ocean at this coastal grill.', '+1-234-567-8901', 'www.coastalgrill.com', 'info@coastalgrill.com', 'Mati City, Dahican', 60, 0.00, 'resto32.jpg', 1),
(33, 'Little Tokyo Ramen', 'A cozy ramen joint serving authentic Japanese ramen in a casual setting.', '+1-345-678-9012', 'www.littletokyoramen.com', 'info@littletokyoramen.com', 'Iloilo City, Jalandoni-Wilson', 37, 0.00, 'resto33.jpg', 1),
(34, 'The Mediterranean Kitchen', 'Explore the flavors of the Mediterranean with a diverse selection of dishes.', '+1-456-789-0123', 'www.medkitchen.com', 'info@medkitchen.com', 'Manila, Ermita', 1, 0.00, 'resto34.jpg', 1),
(35, 'Tokyo Grill House', 'Savor the taste of Japanese grilled dishes and teppanyaki-style cooking.', '+1-567-890-1234', 'www.tokyogrillhouse.com', 'info@tokyogrillhouse.com', 'Isabela City, Sumagdang', 73, 0.00, 'resto35.jpg', 1),
(36, 'The Baking Lab', 'A bakery and café offering a wide range of freshly baked goods and pastries.', '+1-678-901-2345', 'www.bakinglab.com', 'info@bakinglab.com', 'Naval, Brgy. No. 1', 49, 0.00, 'resto36.jpg', 1),
(37, 'Gourmet Burger Co.', 'Indulge in gourmet burgers made with high-quality ingredients and creative toppings.', '+1-789-012-3456', 'www.gourmetburgerco.com', 'info@gourmetburgerco.com', 'Cavite City, San Roque', 19, 0.00, 'resto37.jpg', 1),
(38, 'Churrasco House', 'Experience a Brazilian barbecue feast with a variety of grilled meats and sides.', '+1-890-123-4567', 'www.churrascohouse.com', 'info@churrascohouse.com', 'Tabuk City, Bulanao', 70, 0.00, 'resto38.jpg', 1),
(39, 'Urban Asian Street Food', 'A fusion of Asian flavors with a modern twist, inspired by street food stalls.', '+1-901-234-5678', 'www.urbanasian.com', 'info@urbanasian.com', 'Dumaguete City, Bajumpandan', 42, 0.00, 'resto39.jpg', 1),
(40, 'The Artisanal Bakery', 'A quaint bakery known for its artisanal breads, pastries, and specialty cakes.', '+1-012-345-6789', 'www.artisanalbakery.com', 'info@artisanalbakery.com', 'Puerto Princesa City, San Pedro', 26, 0.00, 'resto40.jpg', 1),
(41, 'Indulgence Steakhouse', 'A premium steakhouse offering prime cuts of steak and elegant dining ambiance.', '+1-123-456-7890', 'www.indulgencesteakhouse.com', 'info@indulgencesteakhouse.com', 'Monkayo, New Albay', 61, 0.00, 'resto41.jpg', 1),
(42, 'Yum Yum Thai Kitchen', 'Dive into the flavors of Thailand with authentic Thai dishes bursting with taste.', '+1-234-567-8901', 'www.yumyumthai.com', 'info@yumyumthai.com', 'Santiago City, Dubinan East', 8, 0.00, 'resto42.jpg', 1),
(43, 'La Patisserie Française', 'A French patisserie offering a delightful array of pastries and desserts.', '+1-345-678-9012', 'www.lapatisserie.com', 'info@lapatisserie.com', 'Koronadal City, General Paulino Santos', 64, 0.00, 'resto43.jpg', 1),
(44, 'The Noodle House', 'Enjoy an array of Asian noodle dishes inspired by different regional cuisines.', '+1-456-789-0123', 'www.thenoodlehouse.com', 'info@thenoodlehouse.com', 'Virac, Sto. Domingo', 31, 0.00, 'resto44.jpg', 1),
(45, 'The Healthy Plate', 'A health-conscious restaurant offering nutritious and delicious meal options.', '+1-567-890-1234', 'www.healthyplate.com', 'info@healthyplate.com', 'Oroquieta City, Poblacion', 56, 0.00, 'resto45.jpg', 1),
(46, 'Sushi Sensation', 'Delight in a wide selection of fresh sushi and sashimi, expertly crafted.', '+1-678-901-2345', 'www.sushisensation.com', 'info@sushisensation.com', 'Cabarroguis, District I', 10, 0.00, 'resto46.jpg', 1),
(47, 'Italian Trattoria', 'Experience the warmth of Italian cuisine with traditional dishes and wines.', '+1-789-012-3456', 'www.italiantrattoria.com', 'info@italiantrattoria.com', 'Bangued, Calaba', 67, 0.00, 'resto47.jpg', 1),
(48, 'The Oriental Tea House', 'Immerse yourself in the world of tea with a wide selection of Asian tea varieties.', '+1-890-123-4567', 'www.orientalteahouse.com', 'info@orientalteahouse.com', 'Romblon, San Agustin', 27, 0.00, 'resto48.jpg', 1),
(49, 'Steak & Seafood Grill', 'A steak and seafood grill offering the best of land and sea on a single menu.', '+1-901-234-5678', 'www.steakseafoodgrill.com', 'info@steakseafoodgrill.com', 'Bontoc, Poblacion', 71, 0.00, 'resto49.jpg', 1),
(50, 'Spice Junction', 'Embark on a culinary journey through the flavors of India at this Indian restaurant.', '+1-012-345-6789', 'www.spicejunction.com', 'info@spicejunction.com', 'Jordan, Rizal', 39, 0.00, 'resto50.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_cuisine`
--

CREATE TABLE `restaurant_cuisine` (
  `id` int(11) NOT NULL,
  `restaurantId` int(11) NOT NULL,
  `classificationID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant_cuisine`
--

INSERT INTO `restaurant_cuisine` (`id`, `restaurantId`, `classificationID`, `name`, `ImageURL`, `active`) VALUES
(1, 1, 1, 'Egg Benedicts', 'Benedicts.png', 1),
(2, 1, 1, 'The Breakfast Wrap', 'b- wrap.png', 1),
(3, 1, 1, 'Avocado Toast', 'avocado.png', 1),
(4, 1, 1, 'Spicy Honey Fried Chicken Sandwich', 'Chicken-Sandwich.jpg', 1),
(5, 2, 1, 'Fresh Strawberry Nutella Tostada', 'strawberry.png', 1),
(6, 2, 1, 'Grilled Three Cheese And Ham', 'ham&cheese.png', 1),
(7, 2, 1, 'Herb Roasted Chicken', 'herb.png', 1),
(8, 3, 1, 'Carrot-Pumpkin Soup', 'Carrot-Soup.jpg', 1),
(9, 3, 1, 'Strawberry Waffle & Bacon', 'bacon-waffle.jpg', 1),
(10, 3, 1, 'Power Salad', 'Power Salad.jpg', 1),
(11, 4, 1, 'Skillet Omelet', 'Skillet Omelet.jpg', 1),
(12, 4, 1, 'Tex Mex', 'Tex Mex.jpg', 1),
(13, 4, 1, 'Spinach Mushroom ', 'Spinach Mushroom.jpg', 1),
(14, 5, 1, 'Avocado, Bacon, Pepper Jack', ' Pepper Jack.jpg', 1),
(15, 5, 1, 'Fried Mozzarella', 'Fried Mozzarella.jpg', 1),
(16, 6, 1, 'Santa Fe Chicken Salad', 'santafechickensalad.jpg', 1),
(17, 7, 1, 'Meatball Parm Sandwich', 'Meatball Parm Sandwich.jpg', 1),
(18, 8, 2, 'Creamy Beef Salpicado', 'beef.jpg', 1),
(19, 9, 2, 'Honey Garlic B.F. Chicken', 'honey.jpg', 1),
(20, 9, 2, 'Spicy Chicken Salpicao', 'spicy.jpg', 1),
(21, 10, 2, 'Beef Pot Roast Ranchero', 'pot.jpg', 1),
(22, 11, 2, 'Cajun Rib-eye Steak', 'steak.jpg', 1),
(23, 11, 2, 'Shrimp Scampi', 'shrimp.png', 1),
(24, 12, 2, 'Chicken Fettuccine Alfredo', 'pasta.png', 1),
(25, 13, 2, 'Grilled-Octopus', 'Grilled-Octopus.jpg', 1),
(26, 14, 2, 'Chicken Giovanni', 'Chicken Giovanni.jpg', 1),
(27, 15, 2, 'Crab Cakes Fried', 'Crab Cakes Fried.jpg', 1),
(28, 16, 2, 'Fried Jumbo Shrimp', 'Fried Jumbo Shrimp.jpg', 1),
(29, 17, 2, 'Linguine Al Cartoccio', 'Linguine Al Cartoccio.jpg', 1),
(30, 18, 2, 'Ln Chicken Parma', 'Ln Chicken Parma.jpg', 1),
(31, 18, 2, 'Ln Crabcake', 'Ln Crabcake.jpg', 1),
(32, 33, 2, 'Buffalo Chicken Wrap', 'Buffalo Chicken Wrap.jpg', 1),
(33, 34, 2, 'Thai Shrimp Wrap', 'Thai Shrimp Wrap.jpg', 1),
(34, 35, 3, 'Rib Eye Steak', 'Rib-Eye-Steak.jpg', 1),
(35, 36, 3, 'Crock Pot Beef and Noodles', 'noodles.jpg', 1),
(36, 37, 3, 'Buffalo Cream Cheese Wings', 'wings.jpg', 1),
(37, 38, 3, 'Crock Pot Beef and Noodles', 'noodles.jpg', 1),
(38, 39, 3, 'Skill Thighset Teriyaki Chicken', 'teriyaki.jpg', 1),
(39, 40, 3, 'Beef Pot Roast Ranchero', 'salmon.jpg', 1),
(40, 41, 3, 'Unstuffed Cabbage Roll Soup', 'soup.jpg', 1),
(41, 42, 3, 'Mandarin Chicken', 'mandarin.jpeg', 1),
(42, 43, 3, 'Chicken Bruschetta', 'Chicken Bruschetta.jpg', 1),
(43, 44, 3, 'Linguini and Meatballs', 'Linguini and Meatballs.png', 1),
(44, 45, 3, 'Stuffed Shells', ' Stuffed Shells.jpg', 1),
(45, 46, 3, 'Penne Alla Vodka', 'Penne Alla Vodka.jpg', 1),
(46, 47, 3, 'Filet Mignon', 'Filet Mignon.jpg', 1),
(47, 48, 3, 'Filet& Crab Cake Duet', 'Filet& Crab Cake Duet.jpg', 1),
(48, 49, 3, 'Broiled Scallops', 'Broiled Scallops.jpg', 1),
(49, 50, 3, 'Br Seafood Combo', 'Br Seafood Combo.jpg', 1),
(50, 18, 3, 'Scallop Delight', 'Scallop Delight.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_province`
--

CREATE TABLE `table_province` (
  `province_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `province_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_province`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `table_region`
--

CREATE TABLE `table_region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(50) NOT NULL,
  `region_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_region`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cuisine_classification`
--
ALTER TABLE `cuisine_classification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `accountId` (`accountId`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `restaurant_cuisine`
--
ALTER TABLE `restaurant_cuisine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantId` (`restaurantId`),
  ADD KEY `classificationID` (`classificationID`);

--
-- Indexes for table `table_province`
--
ALTER TABLE `table_province`
  ADD PRIMARY KEY (`province_id`),
  ADD UNIQUE KEY `UQT_provincename` (`region_id`,`province_name`);

--
-- Indexes for table `table_region`
--
ALTER TABLE `table_region`
  ADD PRIMARY KEY (`region_id`),
  ADD UNIQUE KEY `region_name` (`region_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cuisine_classification`
--
ALTER TABLE `cuisine_classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `restaurant_cuisine`
--
ALTER TABLE `restaurant_cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `table_province`
--
ALTER TABLE `table_province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `table_region`
--
ALTER TABLE `table_region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`accountId`) REFERENCES `account` (`id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `table_province` (`province_id`);

--
-- Constraints for table `restaurant_cuisine`
--
ALTER TABLE `restaurant_cuisine`
  ADD CONSTRAINT `restaurant_cuisine_ibfk_1` FOREIGN KEY (`restaurantId`) REFERENCES `restaurant` (`id`),
  ADD CONSTRAINT `restaurant_cuisine_ibfk_2` FOREIGN KEY (`classificationID`) REFERENCES `cuisine_classification` (`id`);

--
-- Constraints for table `table_province`
--
ALTER TABLE `table_province`
  ADD CONSTRAINT `FK_table_province_table_region` FOREIGN KEY (`region_id`) REFERENCES `table_region` (`region_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
