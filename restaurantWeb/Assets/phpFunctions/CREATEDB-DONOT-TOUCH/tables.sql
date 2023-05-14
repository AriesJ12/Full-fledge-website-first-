-- run this on my localhost/phpmyadmin
-- make sure you are connected to an sql server that DOESNT CONTAIN IMPORTANT SCHEMAS - AS WE WILL BE PERFORMING DROPPING OF SCHEMAS AND TABLES

-- drop the schema if it exist
drop database if exists hope2eat; 

-- create the schema
create database hope2eat;

-- use the schema, so u can execute the queries below
use hope2eat;


-- create accounts table
CREATE TABLE accounts (
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
    country VARCHAR(255) NOT NULL,
    region_or_state VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL
);

CREATE UNIQUE INDEX unique_location ON location (country, region_or_state, city);


-- create restaurants table
CREATE TABLE restaurants
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
CREATE TABLE cuisines
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL
);

-- create a junction table for restaurant and cuisine
-- purpose is to not add a butt ton of columns in the restaurant table
CREATE TABLE restaurant_cuisine
(
    restaurantId INT NOT NULL,
    cuisineId INT NOT NULL,
    PRIMARY KEY(restaurantId, cuisineId),
    FOREIGN KEY (restaurantId) REFERENCES restaurants(id),
    FOREIGN KEY (cuisineId) REFERENCES cuisines(id)
);


-- for rating
CREATE TABLE rating (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    restaurant_id INT NOT NULL,
    accountsId INT,
    rating_value DECIMAL(3,2) NOT NULL,
    rating_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comment TEXT,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id),
    FOREIGN KEY (accountsId) REFERENCES accounts(id)
);

-- trigger event -- manually input it in the trigger event of php my admin
-- sql tab shows that there is a syntax error (probably around at the begin and end)
CREATE TRIGGER update_restaurant_rating
AFTER INSERT ON rating
FOR EACH ROW
BEGIN
    UPDATE restaurants
    SET rating = (
        SELECT AVG(rating_value)
        FROM rating
        WHERE restaurant_Id = NEW.restaurant_Id
    )
    WHERE id = NEW.restaurant_id;
END;


-- location insert
INSERT INTO location
(country, region_or_state, city)
VALUES
('PHILIPPINES', 'REGION 3', 'SAN FERNANDO'),
('PHILIPPINES', 'REGION 3', 'BACOLOR'),
('PHILIPPINES', 'REGION 3', 'SAN SIMON'), 
('PHILIPPINES', 'NCR', 'MANILA'); 

-- cuisine insert
INSERT INTO cuisines
(name)
VALUES
('JAPANESE'),
('BURGER'),
('PASTA'),
('PIZZA');

