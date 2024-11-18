<?php
class Booking
{
    public int $id;
    public int $idClient;
    public int $idCar;
    public \DateTime $startDate ;
    public \DateTime $endDate ;
    public float $total;
    public string $statut;
    public \DateTime $bookingDate;
    public function getId():int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id=$id ;
        return $this;
    }
    public function getIdClient():int
    {
        return $this->idClient;
    }
    public function setIdClient(int $idClient): self
    {
        $this->idClient=$idClient ;
        return $this;
    }
    public function getIdCar():int
    {
        return $this->idCar;
    }
    public function stIdCar(int $idCar): self
    {
        $this->idCar=$idCar ;
        return $this;
    }
    public function getStartDate():DateTime
    {
        return $this->startDate;
    }
    public function setStartDate(DateTime $startDate): self
    {
        $this->startDate=$startDate ;
        return $this;
    }
    public function getEndDate():DateTime
    {
        return $this->endDate;
    }
    public function setEndDate(DateTime $endDate): self
    {
        $this->endDate=$endDate ;
        return $this;
    }
    public function getTotal():float
    {
        return $this->total;
    }
    public function setTotal(float $total): self
    {
        $this->total=$total ;
        return $this;
    }
    public function getStatut():string
    {
        return $this->statut;
    }
    public function setStatus(string $status): self
    {
        $this->statut=$status ;
        return $this; 
    }
    public function getBookingDate():DateTime
    {
        return $this->bookingDate;
    }
    public function setBookingDate(DateTime $bookingDate): self
    {
        $this->bookingDate=$$bookingDate ;
        return $this;
    }
} 




?>