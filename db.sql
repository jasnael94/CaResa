CREATE DATABASE royalride;

USE royalride;

CREATE TABLE clients(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  lastname VARCHAR(100) NOT NULL,
  firstname VARCHAR(100) NOT NULL,
  email VARCHAR(255) NOT NULL,
  adress varchar(255) NOT NULL,
  driver_licence BOOL,
  birthday DATE NOT NULL, 
  phone VARCHAR(100) NOT NULL
);

CREATE TABLE cars(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  brand varchar(255) NOT NULL,
   model varchar(255) NOT NULL, 
   `year` year NOT NULL, 
   pricePerDay float NOT NULL, 
   available BOOL, 
   pictures VARCHAR(255)
);

CREATE TABLE bookings(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  idClient int NOT NULL, 
  idCar int NOT NULL,
  startDate date NOT NULL,
  endDate date NOT NULL, 
  total float NOT NULL, 
  statut ENUM('en cours', 'confirmée', 'annulée'),
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
  FOREIGN KEY (idClient) REFERENCES clients(id),
  FOREIGN KEY (idCar) REFERENCES cars(id)  
);

CREATE TABLE options(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  idBooking INT NOT NULL,
  `type` VARCHAR(255) NOT NULL 
);


