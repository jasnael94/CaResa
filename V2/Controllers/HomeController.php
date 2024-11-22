<?php

class HomeController
{
    public function list(): void
    {
        session_start();

        $css = 'stylehome.css';

        include PATH.'\Views\header.php';
        include PATH.'\Views\home\home.html.php';
        include PATH.'\Views\footer.php';
    }
}