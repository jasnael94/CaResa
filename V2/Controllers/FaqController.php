<?php

class FaqController
{
    public function list(): void
    {
        $css = 'stylefaq.css';

        include PATH.'/Views/header.php';
        include PATH.'/Views/faq/faq.html.php';
        include PATH.'/Views/footer.php';
    }
}