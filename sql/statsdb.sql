DROP DATABASE IF EXISTS statsdb;
CREATE DATABASE IF NOT EXISTS statsdb;
USE statsdb;

CREATE TABLE Users
(Username VARCHAR(30),
Name VARCHAR(30),
Password VARCHAR(30),
CONSTRAINT pk_Username PRIMARY KEY (Username)
);

CREATE TABLE Uploads
(fID INT(10) AUTO_INCREMENT,
Username VARCHAR(30),
Filename VARCHAR(30),
File LONGBLOB,
CONSTRAINT PK_fID PRIMARY KEY (fID),
CONSTRAINT FK_Username FOREIGN KEY (Username)
REFERENCES Users(Username)
);