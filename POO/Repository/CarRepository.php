<?php

class CarRepository 
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function getCarListCaroussel(): array
    {
        $query = 'SELECT * FROM cars WHERE id <= 5';
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getCarList(): array
    {
        $query = 'SELECT * FROM cars';
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getCarFilterPrice(): array 
    {
        $query = 'SELECT * FROM cars ORDER BY pricePerDay ASC';
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchALl();
    }
    public function getCarFilterYear(): array 
    {
        $query = 'SELECT * FROM cars ORDER BY yearProd ASC';
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchALl();
    }
    public function getCarFilterAvailable(): array 
    {
        $query = 'SELECT * FROM cars ORDER BY available ASC';
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchALl();
    }
    public function getCarFilterSearch(): array 
    {
        $query = "SELECT * FROM cars WHERE brand LIKE '%{$_POST['search']}%'";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchALl();
    }
}