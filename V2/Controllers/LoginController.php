<?php

class LoginController 
{
    public function list(): void
    {
        $css = 'stylelogin.css';
    
        session_start();
        $connection = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)) {
            if(($username === "Calista" || $username === "Denis" || $username === "Jason") && $password === "Royalride2024") {
                $connection = "Connection réussi, redirection vers la page d'accueil.." ;
                $_SESSION['login'] = $username ;
                header('refresh: 2 url="home"');
            }
        } else {
            echo "Erreur veuillez remplir les champs..";
        }
    }
        include PATH.'/Views/login/login.html.php';
    }
}