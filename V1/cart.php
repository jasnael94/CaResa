<?php
    $css = "stylecart.css";
    require_once('connect.php');
    require_once('header-cart-booking.php');

    // Récupérer les voitures disponibles
    $sql = "SELECT id, brand, model, yearProd FROM cars WHERE available = 1";
    $stmt = $pdo->query($sql);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="cart-container">
    <div class="formulaire">
        <h1>Réserver votre Voiture de Luxe</h1>

        <form id="myForm" action="process_cart_form.php" method="post">
            <label for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom" required>
            <br>

            <label for="prenom">Prénom:</label><br>
            <input type="text" id="prenom" name="prenom" required>
            <br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
            <br>

            <label for="phone">Téléphone:</label><br>
            <input type="text" id="phone" name="phone" required>
            <br>

            <label for="car">Choisir une Voiture:</label><br>
            <select id="car" name="car" required>
                <option class="ph" value="">Veuillez sélectionner votre voiture</option>
                <?php foreach ($cars as $car): ?>
                    <option value="<?php echo $car['id']; ?>">
                        <?php echo htmlspecialchars($car['brand']) . " " . htmlspecialchars($car['model']) . " (" . htmlspecialchars($car['yearProd']) . ")"; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <label for="startDate">Date de Début de Location:</label><br>
            <input type="date" id="startDate" name="startDate" min="" onchange="setEndDateMin()" required>
            <br>

            <label for="endDate">Date de Fin de Location:</label><br>
            <input type="date" id="endDate" name="endDate" required>
            <br>
            <div class="butt">
                <button class="btn-submit" type="submit">Réserver</button>
            </div>
            
        </form>

        <script>
            // Définit la date du jour pour la startDate
            document.getElementById('startDate').setAttribute('min', new Date().toISOString().split('T')[0]);

            // Met à jour le minimum de la endDate en fonction de la startDate
            function setEndDateMin() {
                var startDate = document.getElementById('startDate').value;
                if (startDate) {
                    document.getElementById('endDate').setAttribute('min', startDate);
                }
            }

            // Validation supplémentaire en JavaScript avant soumission du formulaire
            document.getElementById('myForm').addEventListener('submit', function (e) {
                var startDate = document.getElementById('startDate').value;
                var endDate = document.getElementById('endDate').value;

                // Vérification si la endDate est avant la startDate
                if (endDate < startDate) {
                    e.preventDefault();  // Empêche l'envoi du formulaire
                    alert('La date de fin ne peut pas être antérieure à la date de début.');
                }
            });
        </script>
    </div>

    <div class="condition">
        <h2>Bienvenue sur Royal Ride !</h2><br>
        <p>Nous vous offrons la possibilité de conduire les plus belles voitures du monde, qu'il s'agisse d'un modèle prestigieux ou d'un véhicule de performance exceptionnel.</p>
        <br><br>
        <h3>Comment réserver ?</h3><br>
        <p>Remplissez simplement le formulaire ci-dessous pour réserver la voiture de vos rêves. Indiquez vos informations personnelles, sélectionnez la voiture que vous souhaitez louer, et choisissez vos dates de début et de fin de location.</p>
        <p>Nos voitures sont soigneusement entretenues et disponibles pour des périodes de location flexibles. Vous pouvez être sûr de profiter d'une expérience de conduite exceptionnelle et d'un service haut de gamme à chaque instant.</p>
        <br><br>
        <h3>Pourquoi réserver chez nous ?</h3><br>
        <ul>
            <li><strong>Sélection exclusive :</strong> Choisissez parmi un large éventail de voitures de luxe, allant des sportives aux berlines élégantes.</li>
            <li><strong>Service premium :</strong> Nous vous garantissons un service client irréprochable pour une expérience de réservation sans tracas.</li>
            <li><strong>Prix transparents :</strong> Nos tarifs sont clairs et sans surprises. Vous ne payez que ce que vous voyez.</li>
            <li><strong>Disponibilité :</strong> Toutes nos voitures sont régulièrement mises à jour et entretenues pour offrir une qualité de conduite optimale.</li>
        </ul>
        <br><br>
        <h3>Conditions de Réservation :</h3><br>
        <ul>
            <li><strong>Âge minimum :</strong> 25 ans (selon la voiture choisie).</li>
            <li><strong>Permis de conduire :</strong> Un permis de conduire valide est requis. Vous devrez également fournir une copie de votre permis lors de la prise en charge de la voiture.</li>
            <li><strong>Paiement :</strong> Des options de paiement sécurisées sont disponibles.</li>
        </ul>
        <br>
        <p>Une fois votre formulaire soumis, notre équipe prendra contact avec vous pour finaliser les détails de la réservation et vous fournir toutes les informations nécessaires.</p>
        <p>Nous vous remercions de votre confiance et sommes impatients de vous accueillir pour une expérience de conduite inoubliable !</p>
        <br><br>
        <p class="finalsentence">À bientôt sur la route des Légendes !</p>
    </div>
</div>

<?php
    require_once('footer.php');
?>
