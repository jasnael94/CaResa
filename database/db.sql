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
  available ENUM('disponible', 'indisponible') NOT NULL,  
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
  statut ENUM('en cours', 'terminer') NOT NULL,  
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


INSERT INTO cars(brand, model, yearProd, pricePerDay, pictures)
  VALUES ('Bugatti', 'Veyron', 2020, 2000, '/pictures/bugatti/bugatti-main.jpg'), 
  ('Audi', 'RSQ8', 2024, 1500, '/pictures/audi/audi-main.jpg'),
  ('Dodge', 'Challenger Hellcat', 2018, 2500, '/pictures/dodge/dodge-main.jpg'),
  ('Cadillac', 'Deville Convertible Serie 62', 1960, 3500, '/pictures/cadillac/cadillac-main.jpg'),
  ('Rolls Royce', 'Phantom', 2022, 2000, '/pictures/rolls/rr-main.jpg'),
  ('Aston Martin', 'Vantage', 2013, 1500, '/pictures/am/aston-main.webp'),
  ('BMW', 'M3 Touring', 2021, 1500, '/pictures/bmw/m3-main.jpg'),
  ('BMW', 'M5 Competition', 2020, 2000, '/pictures/bmw/m5-main.jpg'),
  ('Maserati', 'MC20', 2020, 2500, '/pictures/maserati/maserati-main.jpg'),
  ('Porsche', '911 Turbo S', 2014, 2000, '/pictures/porsche/911-main.jpg'),
  ('Mercedes-Benz', 'G63', 2023, 1250, '/pictures/mercedes/g63-main.jpg'),
  ('Chevrolet', 'Corvette C8', 2022, 1350, '/pictures/chevrolet/corvette-main.jpg');