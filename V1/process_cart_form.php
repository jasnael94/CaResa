<?php
    require_once('connect.php');
    require_once('header.php');
    $css='';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Récupérer les données du formulaire
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $carId = (int)$_POST['car']; // L'ID de la voiture choisie
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];

            // Validation des dates
            if (strtotime($startDate) >= strtotime($endDate)) {
                throw new Exception("La date de fin doit être supérieure à la date de début.");
            }

            // Vérifier si l'email existe déjà dans la table clients
            $stmt = $pdo->prepare("SELECT id FROM clients WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $client = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$client) {
                // Si le client n'existe pas, on l'ajoute dans la table clients
                $stmt = $pdo->prepare("INSERT INTO clients (lastname, firstname, email, phone) 
                                       VALUES (:lastname, :firstname, :email, :phone)");
                $stmt->execute([
                    'lastname' => $nom,
                    'firstname' => $prenom,
                    'email' => $email,
                    'phone' => $phone
                ]);

                // Récupérer l'ID du client qui vient d'être ajouté
                $clientId = $pdo->lastInsertId();
            } else {
                // Si le client existe déjà, on utilise son ID
                $clientId = $client['id'];
            }

            // Vérifier la disponibilité de la voiture
            $stmt = $pdo->prepare("SELECT available, pricePerDay, brand, model, yearProd FROM cars WHERE id = :id");
            $stmt->execute(['id' => $carId]);
            $car = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$car || $car['available'] !== 'disponible') {
                throw new Exception("La voiture choisie n'est pas disponible.");
            }

            // Calculer le montant total de la réservation
            $start = new DateTime($startDate);
            $end = new DateTime($endDate);
            $interval = $start->diff($end);
            $days = $interval->days; // Nombre de jours de la location
            $total = $car['pricePerDay'] * $days;

            // Insérer la réservation dans la table bookings
            $stmt = $pdo->prepare("INSERT INTO bookings (idClient, idCar, startDate, endDate, total, statut) 
                                   VALUES (:idClient, :idCar, :startDate, :endDate, :total, 'en cours')");
            $stmt->execute([
                'idClient' => $clientId,
                'idCar' => $carId,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'total' => $total
            ]);

            // Mise à jour de la disponibilité de la voiture
            $stmt = $pdo->prepare("UPDATE cars SET available = 'indisponible' WHERE id = :id");
            $stmt->execute(['id' => $carId]);

            // Afficher la page de confirmation
            echo '
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Confirmation de Réservation</title>
                <link rel="stylesheet" href="styles.css">
            </head>
            <body>
                <div class="confirmation-container">
                    <div class="confirmation-card">
                        <h1>Réservation Confirmée</h1>
                        <p class="success-message">Félicitations ! Votre réservation a été effectuée avec succès.</p>
                        <p><strong>Nom :</strong> ' . $prenom . ' ' . $nom . '</p>
                        <p><strong>Email :</strong> ' . $email . '</p>
                        <p><strong>Téléphone :</strong> ' . $phone . '</p>
                        <p><strong>Voiture réservée :</strong> ' . htmlspecialchars($car['brand']) . ' ' . htmlspecialchars($car['model']) . ' (' . htmlspecialchars($car['yearProd']) . ')</p>
                        <p><strong>Date de début :</strong> ' . $startDate . '</p>
                        <p><strong>Date de fin :</strong> ' . $endDate . '</p>
                        <p><strong>Montant total :</strong> ' . $total . '€</p>
                        <p class="note">Merci pour votre réservation, nous reviendrons vers vous par mail pour plus de détails.</p>
                        <a href="index.php" class="back-button">Retour à l\'accueil</a>
                    </div>
                </div>
            </body>
            </html>
            ';
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    require_once('footer.php');

?>

