Create database yospare

CREATE TABLE product (
    pro_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pro_brand varchar(255) NOT NULL,
    pro_name varchar(255),
    pro_price int,
    pro_desc varchar(255),
    pro_img varchar(255)
    
);

CREATE TABLE users (
    user_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

