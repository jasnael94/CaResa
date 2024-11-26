<?php
echo '
<div class="confirmation-container">
    <div class="confirmation-card">
        <h1>Réservation Confirmée</h1>
        <div class="card-content">
            <p class="success-message">Félicitations ! Votre réservation a été effectuée avec succès.</p>
            <br>
            <p><strong>Nom :</strong> ' . $prenom . ' ' . $nom . '</p>
            <p><strong>Email :</strong> ' . $email . '</p>
            <p><strong>Téléphone :</strong> ' . $phone . '</p>
            <p><strong>Voiture réservée :</strong> ' . $brand . ' ' . $model . ' (' . $year . ')</p>
            <p><strong>Date de début :</strong> ' . $startDate . '</p>
            <p><strong>Date de fin :</strong> ' . $endDate . '</p>
            <p><strong>Montant total :</strong> ' . $total . '€</p>
            <br>
            <p class="note">Merci pour votre réservation, nous reviendrons vers vous par mail pour plus de détails.</p>
        </div>
        <a href="home" class="back-button">Retour à l\'accueil</a>
    </div>
</div> '
?>