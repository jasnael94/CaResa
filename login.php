<?php
    session_start();
    $connection = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)) {
            if(($username === "Cali" || $username === "Denis" || $username === "Jason") && $password === "Royalride2024") {
                $connection = "Connection réussi, redirection vers la page d'accueil.." ;
                $_SESSION['login'] = $username ;
                header('refresh: 2 url="home.php"');
            }
        } else {
            echo "Erreur veuillez remplir les champs..";
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>RoyalRide-Connexion</title>
</head>
<body>
    <div class="login-bg">
        <div class="login-content">
            <h1>Royal Ride</h1>
            <h2>Login</h2>
            <form action="login.php" method="post" class="login-form">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <label for="passord">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <button type="submit">Connect</button>
            </form>
            <p><?php echo $connection ?></p>
        </div>
    </div>
</body>
</html>