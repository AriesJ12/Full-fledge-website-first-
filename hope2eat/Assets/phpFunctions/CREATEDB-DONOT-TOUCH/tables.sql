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
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    address VARCHAR(255),
    birthdate DATE,
    phone_number VARCHAR(20),
    profileImage VARCHAR(255),
    -- accountype (0 for user, 1 for admin)
    account_type TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- location table
CREATE TABLE location
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    region VARCHAR(255) NOT NULL,
    province VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    headerImage VARCHAR(255)
);

CREATE UNIQUE INDEX unique_location ON location (region, province, city);


-- create restaurant table
CREATE TABLE restaurant
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description TEXT,
    address VARCHAR(255),
    phone VARCHAR(20),
    website VARCHAR(255),
    email VARCHAR(255),
    -- cuisineID INT, MIGHT USE JUNCTION TABLE INSTEAD
    locationID INT,
    rating DECIMAL(3,2),
    -- I WANT TO CREATE A FUNCTIONALITY FOR OPEN -- MIGHT NEED TRIGGER EVENT ONCE THE CLOCK HITS A CERTAIN ERROR
    -- Open boolean,
    ImageURL VARCHAR(255),
    -- might add price range, delivery option and menu url
    FOREIGN KEY (locationID) REFERENCES location(id)
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



-- location insert
INSERT INTO location
(region, province, city)
VALUES
('CENTRAL LUZON', 'PAMPANGA', 'GUAGUA'),
('CENTRAL LUZON', 'PAMPANGA', 'ANGELES'),
('NCR', 'EASTERN MANILA DISTRICT', 'QUEZON CITY'), 
('NCR', 'SOUTHERN MANILA DISTRICT', 'TAGUIG'), 
('NCR', 'SOUTHERN MANILA DISTRICT', 'PARANAQUE'), 
('NCR', 'SOUTHERN MANILA DISTRICT', 'PASAY'), 
('NCR', 'CAPITAL DISTRICT', 'MANILA'),
('NCR', 'SOUTHERN MANILA DISTRICT', 'MAKATI'),
-- ('CENTRAL LUZON', 'PAMPANGA', 'CLARK'), clark is the same as angeles 
('NCR', 'EASTERN MANILA DISTRICT', 'MARIKINA'),
('NCR', 'SOUTHERN MANILA DISTRICT', 'LAS PINAS');

-- cuisine insert
INSERT INTO cuisine_classification
(name)
VALUES
('BREAKFAST'),
('LUNCH'),
('DINNER');

-- restaurant
INSERT INTO restaurant
(name, ImageURL, website, locationID)
VALUES
("Grumpy Joe", "grumpyjoe.png", "https://www.facebook.com/people/Grumpy-Joe-Pampanga/100083036991702/", 2),
("Ilustrados Restauran", "ilustrado.jpg", "https://www.facebook.com/ilustradorestaurant/", 8),
("Harbor View Restaurant", "harbor.jpg", "https://www.facebook.com/HARBORVIEWCAPEMAY/", 3),
("Spiral Restaurant", "harbor.jpg", "https://www.facebook.com/HARBORVIEWCAPEMAY/", 8),


-- restaurant cuisine


-- reviews

