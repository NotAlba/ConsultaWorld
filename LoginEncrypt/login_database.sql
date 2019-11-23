create database login;

CREATE TABLE user_login(  
   id INT NOT NULL AUTO_INCREMENT,  
   username VARCHAR(00) NOT NULL,  
   cus_surname VARCHAR(100) NOT NULL,  
   PRIMARY KEY ( id )  
);  

INSERT INTO user_login(username,password) VALUES('alba',sha2('Unicornio22',256));
INSERT INTO user_login(username,password) VALUES('rocket',sha2('Groot2',256));
INSERT INTO user_login(username,password) VALUES('Pantoja',sha2('BelenEsteban',256));
INSERT INTO user_login(username,password) VALUES('Didac',sha2('DadoConUnZero',256));
