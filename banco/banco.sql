CREATE DATABASE sad_ifpe;

USE sad_ifpe;


CREATE TABLE desktops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    CPU VARCHAR(45) NOT NULL,
    GPU VARCHAR(45) NOT NULL,
    MOBO VARCHAR(45) NOT NULL,
    DDRAM VARCHAR(45) NOT NULL
);
