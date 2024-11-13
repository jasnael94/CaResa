<?php
session_start();
echo "Vous allez être déconnecter, retour à la page de connection..";
unset($_SESSION);
session_destroy();
header('refresh: 2 url="login.php"');

?>