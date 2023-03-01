CREATE DATABASE Media_Library;

USE Media_Library;

CREATE TABLE Members (
   `Nickname` VARCHAR(150),
   `Name` VARCHAR(100),
   `Password` VARCHAR(150),
   `Address` VARCHAR(100),
   `Email` VARCHAR(100),
   `Phone` VARCHAR(100),
   `CIN` VARCHAR(50),
   `Admin` BOOLEAN,
   `Occupation` VARCHAR(50),
   `Birth_Date` DATE,
   `Creation_Date` DATE,
   `Penalty_Count` INT,
   PRIMARY KEY(`Nickname`)
);

CREATE TABLE Category (
   `Category_Code` INT,
   `Category_Name` VARCHAR(50),
   `Category_Type` VARCHAR(50),
   PRIMARY KEY(`Category_Code`)
);

CREATE TABLE Item (
   `Item_Code` INT,
   `Title` VARCHAR(50),
   `Author_Name` VARCHAR(100),
   `Cover_Image` VARCHAR(100),
   `State` VARCHAR(100),
   `Edition_Date` DATE,
   `Buy_Date` DATE,
   `Status` VARCHAR(150),
   `Category_Code` INT NOT NULL,
   PRIMARY KEY(`Item_Code`),
   FOREIGN KEY(`Category_Code`) REFERENCES Category(`Category_Code`)
);

CREATE TABLE Reservation (
   `Reservation_Code` INT,
   `Reservation_Date` DATE,
   `Reservation_Expiration_Date` DATE,
   `Item_Code` INT NOT NULL,
   `Nickname` VARCHAR(150) NOT NULL,
   PRIMARY KEY(`Reservation_Code`),
   FOREIGN KEY(`Item_Code`) REFERENCES Item(`Item_Code`),
   FOREIGN KEY(`Nickname`) REFERENCES Members(`Nickname`),
   CONSTRAINT `reservation_expiration_check` CHECK (`Reservation_Expiration_Date` >= `Reservation_Date` + INTERVAL 24 HOUR)
);

CREATE TABLE Borrowings (
   `Borrowing_Code` INT,
   `Borrowing_Date` DATE,
   `Borrowing_Return_Date` DATE,
   `Item_Code` INT NOT NULL,
   `Nickname` VARCHAR(150) NOT NULL,
   `Reservation_Code` INT NOT NULL,
   PRIMARY KEY(`Borrowing_Code`),
   UNIQUE(`Reservation_Code`),
   FOREIGN KEY(`Item_Code`) REFERENCES Item(`Item_Code`),
   FOREIGN KEY(`Nickname`) REFERENCES Members(`Nickname`),
   FOREIGN KEY(`Reservation_Code`) REFERENCES Reservation(`Reservation_Code`)
);
