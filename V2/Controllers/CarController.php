<?php

class CarController {

    public $carRepository;
    
    public function __construct($dbh)
    {
        $this->carRepository = new CarRepository($dbh);
    }

    public function list():void
    {
        session_start();

        $css = 'stylecars.css';
        $carListCaroussel = $this->carRepository->getCarListCaroussel();
        $carList = $this->carRepository->getCarList();
        
        if($_POST['filter'] === "Prix") {
            $carList = $this->carRepository->getCarFilterPrice();
        } elseif ($_POST['filter'] === "Année") {
            $carList = $this->carRepository->getCarFilterYear();
        } elseif ($_POST['filter'] === "Disponible") {
            $carList = $this->carRepository->getCarFilterAvailable();
        }
        if(!empty($_POST['search'])) {
            $carList = $this->carRepository->getCarFilterSearch();
        }
        
        include PATH.'/Views/header.php';
        include PATH.'/Views/cars/cars.html.php';
        include PATH.'/Views/footer.php';
    }
}  
