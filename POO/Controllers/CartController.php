<?php

class CartController
{
    public $cartRepository;

    public function __construct($dbh)
    {
        $this->cartRepository = new CartRepository($dbh);
    }

    public function list(): void
    {
        session_start();

        $css = 'stylecart.css';
        $carList = $this->cartRepository->getCartList();
        include PATH.'\Views\header-cart-booking.php';
        include PATH.'\Views\cart\cart.html.php';
        include PATH.'\Views\footer.php';
    }
}