CREATE DATABASE lesson4;
USE lesson4;
CREATE TABLE books(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    author VARCHAR(100),
    year INT
);
 
INSERT INTO books (title, author, year)
VALUES ("Noughts and Crosses", "Malorie Blackman", 2001);
 
INSERT INTO books (title, author, year)
VALUES ("The Hobbit", "J.R.R Tolkien", 1937);

-- example prompt
-- select * FROM books;
-- SELET title, autor
-- FROM books;
-- SELECT * 
-- FROM books
-- WHERE year >1950;