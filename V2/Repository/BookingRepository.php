<?php

class BookingRepository 
{
    public $dbh ;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function GetId(): int
    {   
        if(!empty($_SESSION['login'])) {        
            $query = "SELECT id FROM clients WHERE firstname = '{$_SESSION['login']}'";
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetch()['id'];
        } else {
            return 0 ;
        }

        
    }

    public function GetBookingListAvailable($id): array
    {
        $query = "SELECT bookings.*, cars.* FROM bookings INNER JOIN cars ON bookings.idCar = cars.id WHERE idClient = $id AND statut = 'en cours'";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function GetBookingListNotAvailable($id): array
    {
        $query = "SELECT bookings.*, cars.* FROM bookings INNER JOIN cars ON bookings.idCar = cars.id WHERE idClient = $id AND statut = 'terminer'";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}