# This file contains our lost and found limvo database with two tables stuff and location
# Autors Paul Ippolito, Jonathan Smith, David Cyganowski
# Version 0.1

# creates the limbo database if it does not already exist
DROP DATABASE IF EXISTS limbo_db;
CREATE DATABASE IF NOT EXISTS limbo_db;
USE limbo_db;

# creates table users, which contains the users and admins of limbo
DROP TABLE users;
CREATE TABLE IF NOT EXISTS users (
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    email VARCHAR(20) NOT NULL,
    pass CHAR(40) NOT NULL,
    reg_date DATETIME NOT NULL,
    PRIMARY KEY (user_id),
    UNIQUE (email)
);

# populates users table with one user, admin, with password gaze11e
INSERT INTO users (username, email, pass, reg_date)
VALUES ("adminboy42", "admin@iownthis.org", "gaze11e", NOW());

# creates stuff table. contains stuff that is lost
DROP TABLE stuff;

# creates locations table. contains all possible locations of lost items
DROP TABLE locations;
CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    create_date DATETIME NOT NULL,
    update_date DATETIME NOT NULL,
    name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS stuff
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_id INT NOT NULL,
    descript TEXT NOT NULL,
    create_date DATETIME NOT NULL,
    update_date DATETIME NOT NULL,
    room TEXT,
    owner TEXT,
    finder TEXT,
    status SET ("found", "lost", "claimed") NOT NULL
);

# Populates locations table with all the locations around the Marist campus
INSERT INTO locations (name, create_date, update_date)
VALUES ("Student Center", NOW(), NOW()),
       ("Champagnat Hall", NOW(), NOW()),
       ("Leo Hall", NOW(), NOW()),
       ("Midrise", NOW(), NOW()),
       ("Shehan", NOW(), NOW()),
       ("Marian", NOW(), NOW()),
       ("Foy Townhouses", NOW(), NOW()),
       ("Upper New Townhouses", NOW(), NOW()),
       ("Lower New Townhouses", NOW(), NOW()),
       ("Upper West", NOW(), NOW()),
       ("Lower West", NOW(), NOW()),
       ("Upper Fulton", NOW(), NOW()),
       ("Lower Fulton", NOW(), NOW()),
       ("North Campus Housing", NOW(), NOW()),
       ("Byrne House", NOW(), NOW()),
       ("Cannavino Library", NOW(), NOW()),
       ("Chapel", NOW(), NOW()),
       ("Cornell Boathouse", NOW(), NOW()),
       ("Donnely Hall", NOW(), NOW()),
       ("Dyson Center", NOW(), NOW()),
       ("Fern Tor", NOW(), NOW()),
       ("Fontaine Hall", NOW(), NOW()),
       ("Greystone Hall", NOW(), NOW()),
       ("Hancock Center", NOW(), NOW()),
       ("Kieran Gatehouse", NOW(), NOW()),
       ("Kirk House", NOW(), NOW()),
       ("Longview Park", NOW(), NOW()),
       ("Lowell Thomas Center", NOW(), NOW()),
       ("Marist Boathouse", NOW(), NOW()),
       ("McCann Center", NOW(), NOW()),
       ("St. Ann's Hermitage", NOW(), NOW()),
       ("St. Peter's", NOW(), NOW()),
       ("Science/Allied Health", NOW(), NOW()),
       ("Steel Plant Studios/Gallery", NOW(), NOW());
       




