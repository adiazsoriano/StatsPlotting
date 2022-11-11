CREATE TABLE Users
(Username VARCHAR(30),
Name VARCHAR(30),
Password VARCHAR(30),
CONSTRAINT pk_Username PRIMARY KEY (Username)
);

CREATE TABLE Uploads
(fID INT,
Username VARCHAR(30),
File LONGBLOB,
CONSTRAINT PK_fID PRIMARY KEY (fID)
CONSTRAINT FK_Username FOREIGN KEY (Username)
REFERENCES Users(Username)
);