<?php

class Cars 
{
        private int $brand;
        private int $model;
        private int $yearProd;
        private float $pricePerDay;
        private string $available = 'disponible';
        private string $pictures;
  
    public function getBrand(): int
    {
        return $this->brand;
    }
    public function setBrand($newBrand): self
    {
        return $this->brand = $newBrand;    
    }

    public function getModel(): int
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

    public function getAvailable(): string
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