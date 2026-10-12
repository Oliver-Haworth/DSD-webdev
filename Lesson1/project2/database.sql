CREATE DATABASE login;
USE login;

CREATE TABLE logintable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    hashedPassword TEXT NOT NULL
);