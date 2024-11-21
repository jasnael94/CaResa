<?php

class Car 
{
        private int $id;
        private string $brand;
        private string $model;
        private int $yearProd;
        private float $pricePerDay;
        private bool $available = true;
        private string $pictures;
  
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function setBrand($newBrand): self
    {
        return $this->brand = $newBrand;    
    }

    public function getModel(): string
    {
        return $this->model;
    }
    public function setModel($newModel): self
    {
        return $this->brand = $newModel;    
    }

    public function getYearProd(): int
    {
        return $this->yearProd;
    }
    public function setYearProd($newYearProd): self
    {
        return $this->yearProd = $newYearProd;    
    }

    public function getPricePerDay(): float
    {
        return $this->pricePerDay;
    }
    public function setPricePerDay($newPricePerDay): self
    {
        return $this->pricePerDay = $newPricePerDay;    
    }

    public function getAvailable(): bool
    {
        return $this->available;
    }
    public function setAvailable($newAvailable): self
    {
        return $this->available = $newAvailable;    
    }

    public function getPictures(): string
    {
        return $this->pictures;
    }
    public function setPictures($newPictures): self
    {
        return $this->pictures = $newPictures;    
    }


}

?>