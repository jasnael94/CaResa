-- Création de la base de données
CREATE DATABASE royalride;

USE royalride;

-- Clients
CREATE TABLE clients (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  lastname VARCHAR(100) NOT NULL,
  firstname VARCHAR(100) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  address VARCHAR(255) NOT NULL, 
  driver_licence TINYINT(1),  
  birthday DATE NOT NULL, 
  phone VARCHAR(100) NOT NULL
);

-- Voitures
CREATE TABLE cars (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  brand VARCHAR(255) NOT NULL,
  model VARCHAR(255) NOT NULL, 
  yearProd YEAR NOT NULL,  
  pricePerDay FLOAT NOT NULL, 
  available ENUM('disponible', 'réservée', 'indisponible') NOT NULL,  
  pictures VARCHAR(255)
);

-- Réservations
CREATE TABLE bookings (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  idClient INT NOT NULL, 
  idCar INT NOT NULL,
  startDate DATE NOT NULL,
  endDate DATE NOT NULL, 
  total FLOAT NOT NULL, 
  statut ENUM('en cours', 'confirmée', 'annulée') NOT NULL,  
  bookingDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
  FOREIGN KEY (idClient) REFERENCES clients(id),
  FOREIGN KEY (idCar) REFERENCES cars(id)
);

-- Options supplémentaires pour les réservations
CREATE TABLE options (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  idBooking INT NOT NULL,
  `type` VARCHAR(255) NOT NULL, 
  FOREIGN KEY (idBooking) REFERENCES bookings(id)
);

-- Ajout de quelques données (clients et voitures)

INSERT INTO clients (lastname, firstname, email, `address`, driver_licence, birthday, phone)
  VALUES ('Volget', 'Calista', 'calista@gmail.com', '9 place Vendôme, 75001 Paris', 1, 20010524, '07 02 01 03 04'),
  ('Dechambre', 'Denis', 'denis@gmail.com', '9 place Vendôme, 75001 Paris', 1, 19940328 ,'06 01 02 03 04'), 
  ('Rajaonarimanana', 'Jason', 'jason@gmail.com', '9 place Vendôme, 75001 Paris', 1, 19940814, '06 05 06 07 08');
