<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/stylelogin.css">
    <link rel="stylesheet" href="/css/style.css">

    <title>RoyalRide-Connexion</title>
</head>
<body>
    <div class="login-bg">
        <div class="login-content">
            <h1>Royal Ride</h1>
            <h2>Login</h2>
            <form action="#" method="post" class="login-form">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <button type="submit">Connect</button>
            </form>
            <p><?php echo $connection ?></p>
        </div>
    </div>
</body>
</html>