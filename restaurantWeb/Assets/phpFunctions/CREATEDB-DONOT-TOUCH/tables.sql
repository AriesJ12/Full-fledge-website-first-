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
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- create table for admins - to avoid clutter in the accounts table; and probably to add additional levels of admin
-- in the future
CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

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
    ImageURL VARCHAR(255)
    -- might add price range, delivery option and menu url
);

-- create cuisine table(purpose is to have consistency in the whole database -- naming can be wrong)
CREATE TABLE cuisine
(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL
):

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

-- location table
CREATE TABLE location
(
    id INT NOT NULL AUTO_INCREMENT,
    country VARCHAR(255) NOT NULL,
    region_or_state VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL
);
