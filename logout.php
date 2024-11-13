<?php

echo "Vous allez être déconnecter, retour à la page de connection..";
session_destroy();
header('refresh: 2 url="login.php"');

?>