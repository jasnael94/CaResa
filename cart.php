<?php
    require_once('connect.php');
    require_once('header-cart-booking.php');

    // Récupérer les voitures disponibles
    $sql = "SELECT id, brand, model, yearProd FROM cars WHERE available = 1";
    $stmt = $pdo->query($sql);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="cart-container">
    <h1>Réserver votre Voiture de Luxe</h1>

    <form action="process_cart_form.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Téléphone:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="car">Choisir une Voiture:</label>
        <select id="car" name="car" required>
            <?php foreach ($cars as $car): ?>
                <option value="<?php echo $car['id']; ?>">
                    <?php echo htmlspecialchars($car['brand']) . " " . htmlspecialchars($car['model']) . " (" . htmlspecialchars($car['yearProd']) . ")"; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="startDate">Date de Début de Location:</label>
        <input type="date" id="startDate" name="startDate" required>

        <label for="endDate">Date de Fin de Location:</label>
        <input type="date" id="endDate" name="endDate" required>

        <button class="btn-submit" type="submit">Réserver</button>
    </form>
</div>
<div>
    <h2>Réservez Votre Voiture de Luxe en Quelques Clics</h2> 
    <h3>Bienvenue sur Royal Ride notre plateforme de réservation de voitures de luxe !</h3>
    <p>Nous vous offrons la possibilité de conduire les plus belles voitures du monde, qu'il s'agisse d'un modèle prestigieux ou d'un véhicule de performance exceptionnel.
    </p>
    <br>
    <h3>Comment réserver ?</h3>
    <p>Remplissez simplement le formulaire ci-dessous pour réserver la voiture de vos rêves. Indiquez vos informations personnelles, sélectionnez la voiture que vous souhaitez louer, et choisissez vos dates de début et de fin de location.</p>
    <p>Nos voitures sont soigneusement entretenues et disponibles pour des périodes de location flexibles. Vous pouvez être sûr de profiter d'une expérience de conduite exceptionnelle et d'un service haut de gamme à chaque instant.
    </p>
    <br>
    <h3>Pourquoi réserver chez nous ?</h3>
    <ul>
        <li><strong>Sélection exclusive :</strong>Choisissez parmi un large éventail de voitures de luxe, allant des sportives aux berlines élégantes.</li>
        <li><strong>Service premium :</strong>Nous vous garantissons un service client irréprochable pour une expérience de réservation sans tracas.</li>
        <li><strong>Prix transparents :</strong>Nos tarifs sont clairs et sans surprises. Vous ne payez que ce que vous voyez.</li>
        <li><strong>Disponibilité :</strong>Toutes nos voitures sont régulièrement mises à jour et entretenues pour offrir une qualité de conduite optimale.</li>
    </ul>
    <br>
    <h3>Conditions de Réservation :</h3>
    <ul>
        <li><strong>Âge minimum :</strong>25 ans (selon la voiture choisie).
        <li><strong>Permis de conduire :</strong>Un permis de conduire valide est requis. Vous devrez également fournir une copie de votre permis lors de la prise en charge de la voiture.
        <li><strong>Paiement :</strong>Des options de paiement sécurisées sont disponibles.
    </ul>
    <br>
    <p>Une fois votre formulaire soumis, notre équipe prendra contact avec vous pour finaliser les détails de la réservation et vous fournir toutes les informations nécessaires.
        <br>Nous vous remercions de votre confiance et sommes impatients de vous accueillir pour une expérience de conduite inoubliable !
        <br>Bonne route et à bientôt sur la route des légendes !
    </p>

</div>

<?php
    require_once('footer.php');
?>
 