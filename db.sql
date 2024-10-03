CREATE TABLE users (
     id INT(11) NOT NULL AUTO_INCREMENT,
     fullname TEXT(50) NOT NULL,
     email VARCHAR(100) NOT NULL,
     phonenumber VARCHAR(100) NOT NULL,
     username VARCHAR(100) NOT NULL,    
     pwd VARCHAR(255) NOT NULL, 
     confirmedpwd VARCHAR(255) NOT NULL,
     created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
     PRIMARY KEY (id)
); 