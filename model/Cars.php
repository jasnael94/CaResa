<?php

class Cars 
{
    public function __construct(
        private int $brand,
        private int $model,
        private int $yearProd,
        private float $pricePerDay,
        private string $available = 'disponible',
        private string $pictures
    ) {}
  
    public function getBrand(): int
    {
        return $this->brand;
    }
    public function setBrand($newBrand): int
    {
        return $this->brand = $newBrand;    
    }

    public function getModel(): int
    {
        return $this->model;
    }
    public function setModel($newModel): int
    {
        return $this->brand = $newModel;    
    }
    public function getYearProd(): int
    {
        return $this->yearProd;
    }
    public function setYearProd($newYearProd): int
    {
        return $this->yearProd = $newYearProd;    
    }

    public function getPricePerDay(): float
    {
        return $this->pricePerDay;
    }
    public function setPricePerDay($newPricePerDay): float
    {
        return $this->pricePerDay = $newPricePerDay;    
    }

    public function getAvailable(): string
    {
        return $this->available;
    }
    public function setAvailable($newAvailable): string
    {
        return $this->available = $newAvailable;    
    }

    public function getPictures(): string
    {
        return $this->pictures;
    }
    public function setPictures($newPictures): string
    {
        return $this->pictures = $newPictures;    
    }


}

?>