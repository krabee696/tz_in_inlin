
DROP SCHEMA IF EXISTS `testdb`;
CREATE SCHEMA `testdb`;
USE `testdb`;


DROP TABLE IF EXISTS Posts;
CREATE TABLE IF NOT EXISTS Posts (
    userId INTEGER,
    id INTEGER PRIMARY KEY,
    title TEXT,
    body TEXT);

DROP TABLE IF EXISTS Comments;
CREATE TABLE IF NOT EXISTS Comments (
   postId INT NOT NULL,
   id INT NOT NULL PRIMARY KEY,
   name TEXT NOT NULL,
   email TEXT NOT NULL,
   body TEXT NOT NULL,
   FOREIGN KEY (postId) REFERENCES Posts(id))
