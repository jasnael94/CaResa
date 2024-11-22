<?php

class ProcessCartRepository
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function getClientId(): int
    {
        $query = "SELECT id FROM clients WHERE firstname = '{$_SESSION['login']}'";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();

        return $stmt->fetch()['id'];
    }

    public function getCarInfos(): array
    {
        $query = "SELECT pricePerDay, brand, model, yearProd FROM cars WHERE id = {$_POST['car']}";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function setBooking($idClient, $idCar, $createdDate, $startDate, $endDate, $total): void
    {
        $query = "INSERT INTO bookings (idClient, idCar, createdAt, startDate, endDate, total, statut) 
        VALUES (:idClient, :idCar, :createdDate, :startDate, :endDate, :total, 'en cours')";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindValue(':idClient', $idClient, PDO::PARAM_INT);
        $stmt->bindValue(':idCar', $idCar, PDO::PARAM_INT);
        $stmt->bindValue(':createdDate', $createdDate, PDO::PARAM_STR);
        $stmt->bindValue(':startDate', $startDate, PDO::PARAM_STR);
        $stmt->bindValue(':endDate', $endDate, PDO::PARAM_STR);
        $stmt->bindValue(':total', $total, PDO::PARAM_INT);
        $stmt->execute();
    }
}