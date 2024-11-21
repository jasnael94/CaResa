<?php

class LogoutController
{
    public function list(): void
    {
        session_start();
        if(empty($_SESSION['login'])) {
            header('location: home');
        } else {
            echo "Vous aller être déconnecter, retour à la page d'acceuil";
            unset($_SESSION);
            session_destroy();
            header('refresh: 2 url="home"');
        }
    }
}