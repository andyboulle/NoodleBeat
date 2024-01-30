-- Create the noodlebeat database
CREATE DATABASE IF NOT EXISTS noodlebeat;

-- Switch to the noodlebeat database
USE noodlebeat;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    likes INT DEFAULT 0
);

-- Create the tracks table
CREATE TABLE IF NOT EXISTS tracks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    artist VARCHAR(100) NOT NULL,
    genre VARCHAR(50),
    date_uploaded VARCHAR(10),
    file_type VARCHAR(10),
    file VARCHAR(255),
    likes INT DEFAULT 0
);
