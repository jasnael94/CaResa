<?php

class CartRepository
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function getCartList(): array
    {
        $query = 'SELECT * FROM cars WHERE available = "disponible"';
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}