<?php

class ConditionsController
{
    public function list(): void
    {
        $css = 'styleCG.css';

        include PATH.'/Views/header.php';
        include PATH.'/Views/conditions/conditions.html.php';
        include PATH.'/Views/footer.php';
    }
}