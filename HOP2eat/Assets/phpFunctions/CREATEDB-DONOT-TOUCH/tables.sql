-- run this on my localhost/phpmyadmin
-- make sure you are connected to an sql server that DOESNT CONTAIN IMPORTANT SCHEMAS - AS WE WILL BE PERFORMING DROPPING OF SCHEMAS AND TABLES

-- drop the schema if it exist
drop database if exists hop2eat; 

-- create the schema
create database hop2eat;

-- use the schema, so u can execute the queries below
use hop2eat;


-- create account table
CREATE TABLE account (
    id INT PRIMARY KEY not null AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    profileImage VARCHAR(255),
    -- accountype (0 for user, 1 for admin)
    account_type TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- create restaurant table
CREATE TABLE restaurant
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description TEXT,
    phone VARCHAR(20),
    website VARCHAR(255),
    email VARCHAR(255),
    -- cuisineID INT, MIGHT USE JUNCTION TABLE INSTEAD
    city_and_barangay VARCHAR(255),
    province_id INT,
    rating DECIMAL(3,2) DEFAULT 0,
    -- I WANT TO CREATE A FUNCTIONALITY FOR OPEN -- MIGHT NEED TRIGGER EVENT ONCE THE CLOCK HITS A CERTAIN ERROR
    -- Open boolean,
    ImageURL VARCHAR(255),
    -- might add price range, delivery option and menu url
    FOREIGN KEY (province_id) REFERENCES table_province(province_id)
);

-- create cuisine table(purpose is to have consistency in the whole database -- naming can be wrong)
CREATE TABLE cuisine_classification
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL,
    headerImage VARCHAR(255)
);

-- create a junction table for restaurant and cuisine
-- purpose is to not add a butt ton of columns in the restaurant table
CREATE TABLE restaurant_cuisine
(
    id INT NOT NULL AUTO_INCREMENT,
    restaurantId INT NOT NULL,
    classificationID INT NOT NULL,
    name VARCHAR(255),
    ImageURL VARCHAR(255),
    PRIMARY KEY(id),
    FOREIGN KEY (restaurantId) REFERENCES restaurant(id),
    FOREIGN KEY (classificationID) REFERENCES cuisine_classification(id)
);


-- for rating
CREATE TABLE rating (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    restaurant_id INT NOT NULL,
    accountId INT,
    rating_value DECIMAL(3,2) NOT NULL,
    rating_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comment TEXT,
    FOREIGN KEY (restaurant_id) REFERENCES restaurant(id),
    FOREIGN KEY (accountId) REFERENCES account(id)
);

-- trigger event -- manually input it in the trigger event of php my admin
-- sql tab shows that there is a syntax error (probably around at the begin and end)
CREATE TRIGGER update_restaurant_rating
AFTER INSERT ON rating
FOR EACH ROW
UPDATE restaurant
SET rating = (
    SELECT AVG(rating_value)
    FROM rating
    WHERE restaurant_Id = NEW.restaurant_Id
)
WHERE id = NEW.restaurant_id;


-- insert all here
-- cuisine insert


-- restaurant


-- restaurant cuisine


-- reviews




-- procedures all here

Delimiter //
create procedure get_restaurant()
BEGIN
    SELECT res.id AS id, res.name AS name, res.description as description, res.phone as phone, 
    res.website as website, res.email as email, res.rating as rating, res.ImageURL as image, 
    CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) AS address
    FROM restaurant as res
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    ORDER BY rating DESC;
END //
Delimiter ;

DELIMITER //

CREATE PROCEDURE get_restaurant_filter(IN search_name VARCHAR(50), IN search_location VARCHAR(50))
BEGIN
    SELECT res.id AS id, res.name AS name, res.description AS description, res.phone AS phone, 
        res.website AS website, res.email AS email, res.rating AS rating, res.ImageURL AS image, 
        CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) AS address
    FROM restaurant AS res
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    WHERE (search_name = '' OR res.name LIKE CONCAT('%', search_name, '%'))
        AND (search_location = '' OR CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) LIKE CONCAT('%', search_location, '%'))
    ORDER BY rating DESC;
END //

DELIMITER ;

DELIMITER //
CREATE PROCEDURE get_cuisine()
BEGIN
    SELECT cuis.classificationID AS classification_id, cuis.restaurantID AS restaurant_id,
    cuis.imageURL AS image, cuis.name AS cuisine_name, class.name AS classification, 
    res.name AS restaurant_name, res.website AS website,
    CONCAT(COALESCE(reg.region_name, ''), ", ", COALESCE(prov.province_name, ''), ", ", COALESCE(res.city_and_barangay, '')) AS address
    FROM restaurant_cuisine AS cuis
    INNER JOIN cuisine_classification AS class ON cuis.classificationID = class.id 
    INNER JOIN restaurant AS res ON cuis.restaurantID = res.id
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    ORDER BY res.rating DESC;
END //

DELIMITER ;




