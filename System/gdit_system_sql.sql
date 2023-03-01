/*****************************************
* Create the Gdit System database
*****************************************/
DROP DATABASE IF EXISTS gdit_system_sql;
CREATE DATABASE gdit_system_sql;
USE gdit_system_sql;

-- GDIT Uusers
CREATE TABLE users (
    userID int NOT NULL AUTO_INCREMENT,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    username varchar(50) NOT NULL,
    password varchar(20) NOT NULL,
    PRIMARY KEY (userID)
);

-- GDIT Clients
CREATE TABLE clients (
  clientID        INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(60)    NOT NULL,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,
  shipAddressID     INT                       DEFAULT NULL,
  billingAddressID  INT                       DEFAULT NULL,  
  PRIMARY KEY (clientID),
  UNIQUE INDEX emailAddress (emailAddress)
);

-- Populate tables
INSERT INTO users VALUES 
(1, 'Skylar', 'Masson', 'smasson324986', 'password1'), 
(2, 'Aaron', 'Williams', 'awilliams299103', 'password1'),
(3, 'Brandon', 'Heptinstall', 'bheptinstall123289','password1'),
(4, 'Parker', 'Blanchard', 'pblanchard215922','password1'),
(5, 'Raine', 'Wyandon', 'jwyandon247846','password1'),
(6, 'Michael', 'Shamblin', 'mshamblin254657','password1'),
(7, 'Begona', 'Perez', 'perezmirab','password1');

-- Create admin
CREATE USER IF NOT EXISTS ts_user@localhost
IDENTIFIED BY 'pa55word';

GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO ts_user@localhost;
