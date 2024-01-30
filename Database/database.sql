-- Create the noodlebeat database
CREATE DATABASE IF NOT EXISTS noodlebeat;

-- Switch to the noodlebeat database
USE noodlebeat;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    likes INT DEFAULT 0
);

-- Create the tracks table
CREATE TABLE IF NOT EXISTS tracks (
    track_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    artist VARCHAR(100) NOT NULL,
    genre VARCHAR(50),
    date_uploaded DATE,
    file_type VARCHAR(10),
    file BLOB, -- Assuming the file will be stored as binary data
    likes INT DEFAULT 0
);
