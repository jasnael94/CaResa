<?php

class BookingController
{
    public $bookingRepository;

    public function __construct($dbh)
    {
        $this->bookingRepository = new BookingRepository($dbh);
    }

    public function list(): void 
    {
        session_start();
        
        $css = 'stylebooking.css';
        $id = $this->bookingRepository->GetId();
        $bookingAvailable = $this->bookingRepository->GetBookingListAvailable($id);
        $bookingNotAvailable = $this->bookingRepository->GetBookingListNotAvailable($id);
        
        include PATH.'/Views/header-cart-booking.php';
        include PATH.'/Views/booking/booking.html.php';
        include PATH.'/Views/footer.php';
    }
}