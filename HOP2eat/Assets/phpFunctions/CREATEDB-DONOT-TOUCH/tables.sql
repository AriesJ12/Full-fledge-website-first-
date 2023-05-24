-- run this on my localhost/phpmyadmin
-- make sure you are connected to an sql server that DOESNT CONTAIN IMPORTANT SCHEMAS - AS WE WILL BE PERFORMING DROPPING OF SCHEMAS AND TABLES

-- drop the schema if it exist
drop database if exists hope2eat; 

-- create the schema
create database hope2eat;

-- use the schema, so u can execute the queries below
use hope2eat;


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
    rating DECIMAL(3,2),
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
    description TEXT,
    image VARCHAR(255),
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

-- account defaults
INSERT INTO account
(username, password, account_type)
VALUES
("aries", "ariestagle", 1),
("mark", "markbeltran", 0),
("kian", "kiandavid", 0),
("kriesha", "krieshabuglosa", 0),
("willie", "willieroldan", 0);


-- cuisine insert
INSERT INTO cuisine_classification
(name)
VALUES
('BREAKFAST'),
('LUNCH'),
('DINNER');

-- restaurant
INSERT INTO restaurant
(name,description, ImageURL, website, province_id)
VALUES
("Grumpy Joe",
"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit dolor inventore fugit quam accusantium magni dolore iste corporis ipsam omnis a aspernatur, cum illum odit fugiat ex, libero iusto exercitationem dolores architecto cumque! Nemo, accusamus possimus. Dolorum iste esse autem, reprehenderit aliquam omnis sapiente adipisci quis impedit recusandae? Magni, consequuntur.",
 "grumpyjoe.png", "https://www.facebook.com/people/Grumpy-Joe-Pampanga/100083036991702/", 2),
("Ilustrados Restauran",
"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit dolor inventore fugit quam accusantium magni dolore iste corporis ipsam omnis a aspernatur, cum illum odit fugiat ex, libero iusto exercitationem dolores architecto cumque! Nemo, accusamus possimus. Dolorum iste esse autem, reprehenderit aliquam omnis sapiente adipisci quis impedit recusandae? Magni, consequuntur.",
"ilustrado.jpg", "https://www.facebook.com/ilustradorestaurant/", 8),
("Harbor View Restaurant",
 "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit dolor inventore fugit quam accusantium magni dolore iste corporis ipsam omnis a aspernatur, cum illum odit fugiat ex, libero iusto exercitationem dolores architecto cumque! Nemo, accusamus possimus. Dolorum iste esse autem, reprehenderit aliquam omnis sapiente adipisci quis impedit recusandae? Magni, consequuntur.",
"harbor.jpg", "https://www.facebook.com/HARBORVIEWCAPEMAY/", 3),
("Spiral Restaurant", 
"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit dolor inventore fugit quam accusantium magni dolore iste corporis ipsam omnis a aspernatur, cum illum odit fugiat ex, libero iusto exercitationem dolores architecto cumque! Nemo, accusamus possimus. Dolorum iste esse autem, reprehenderit aliquam omnis sapiente adipisci quis impedit recusandae? Magni, consequuntur.",
"harbor.jpg", "https://www.facebook.com/HARBORVIEWCAPEMAY/", 8),
("Ilustrados Restauran",
"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit dolor inventore fugit quam accusantium magni dolore iste corporis ipsam omnis a aspernatur, cum illum odit fugiat ex, libero iusto exercitationem dolores architecto cumque! Nemo, accusamus possimus. Dolorum iste esse autem, reprehenderit aliquam omnis sapiente adipisci quis impedit recusandae? Magni, consequuntur.",
"ilustrado.jpg", "https://www.facebook.com/ilustradorestaurant/", 8),
("Harbor View Restaurant",
 "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit dolor inventore fugit quam accusantium magni dolore iste corporis ipsam omnis a aspernatur, cum illum odit fugiat ex, libero iusto exercitationem dolores architecto cumque! Nemo, accusamus possimus. Dolorum iste esse autem, reprehenderit aliquam omnis sapiente adipisci quis impedit recusandae? Magni, consequuntur.",
"harbor.jpg", "https://www.facebook.com/HARBORVIEWCAPEMAY/", 3);


-- restaurant cuisine


-- reviews

-- procedures

Delimiter //
create procedure get_restaurant()
BEGIN
    SELECT res.name AS name, res.description as description, res.phone as phone, 
    res.website as website, res.email as email, res.rating as rating, res.ImageURL as image, 
    CONCAT(reg.region_name,", ", prov.province_name,", ", res.city_and_barangay) AS address
    FROM restaurant as res
    INNER JOIN table_province AS prov ON res.province_id = prov.province_id
    INNER JOIN table_region AS reg ON prov.region_id = reg.region_id
    ORDER BY rating DESC;
END //
Delimiter ;