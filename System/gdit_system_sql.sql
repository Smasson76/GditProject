/*****************************************
* Create the Gdit System database
*****************************************/
DROP DATABASE IF EXISTS gdit_system_sql;
CREATE DATABASE gdit_system_sql;
USE gdit_system_sql;

CREATE TABLE users (
    userID int NOT NULL AUTO_INCREMENT,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    username varchar(50) NOT NULL,
    password varchar(20) NOT NULL,
    PRIMARY KEY (userID)
);

INSERT INTO users VALUES 
(1, 'Skylar', 'Masson', 'awill1', 'password1'), 
(2, 'Aaron', 'Williams', 'smass1', 'password1');

-- Create a user named ts_user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO ts_user@localhost
IDENTIFIED BY 'pa55word';