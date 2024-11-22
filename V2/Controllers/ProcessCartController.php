<?php

class ProcessCartController
{
    public $processCartRepository;

    public function __construct($dbh)
    {
        $this->processCartRepository = new ProcessCartRepository($dbh);
    }

    public function list(): void
    {
        session_start();

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $carId = (int)$_POST['car']; // L'ID de la voiture choisie
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $createDate = date("Y-m-d");
        echo $createDate ;

         // Calculer le montant total de la réservation
        $carInfos = $this->processCartRepository->getCarInfos();
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        $interval = $start->diff($end);
        $days = $interval->days; // Nombre de jours de la location
        $total = $carInfos['pricePerDay'] * $days;
        $brand =  $carInfos['brand'];
        $model =  $carInfos['model'];
        $year =  $carInfos['yearProd'];

        $clientId = $this->processCartRepository->getClientId();

        $sendBooking = $this->processCartRepository->setBooking($clientId, $carId, $createDate, $startDate, $endDate, $total);

        $css = 'stylecart.css';
       
        include PATH.'/Views/header-cart-booking.php';
        include PATH.'/Views/process_cart/process_cart.html.php';
        include PATH.'/Views/footer.php';
    }
}