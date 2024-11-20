<?php
    $css ='';
    require_once('connect.php');
    require_once('header.php');
?>

  <main>
    <div class="contact-section">
      <h1>Contactez-nous</h1>
      <p>Vous avez une question ? Besoin d'aide pour réserver votre voiture de luxe ? Contactez-nous en remplissant le formulaire ci-dessous.</p>

      <!-- Formulaire de contact -->
      <form action="submit_contact.php" method="POST" class="contact-form">
        <div class="form-group">
          <label for="lastname">Nom</label>
          <input type="text" id="lastname" name="lastname" required placeholder="Entrez votre nom">
        </div>
        <br>

        <div class="form-group">
          <label for="firstname">Nom</label>
          <input type="text" id="firstname" name="firstname" required placeholder="Entrez votre prénom">
        </div>
        <br>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required placeholder="Entrez votre adresse email">
        </div>
        <br>

        <div class="form-group">
          <label for="phone">Téléphone</label>
          <input type="tel" id="phone" name="phone" required placeholder="Entrez votre numéro de téléphone">
        </div>
        <br>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required placeholder="Votre message..."></textarea>
        </div>
        <br>

        <button type="submit" class="btn-submit">Envoyer</button>
      </form>
    </div>

    <div class="contact-info">
      <h2>Nos coordonnées</h2>
      <p>Vous pouvez aussi nous contacter directement via les informations ci-dessous.</p>
      <ul>
        <li><strong>Email :</strong> <a href="mailto:contact@royalride.com">contact@royalride.com</a></li>
        <li><strong>Téléphone :</strong> +33 1 23 45 67 89</li>
        <li><strong>Adresse :</strong> 9 Place Vendôme, 75001 Paris, France</li>
      </ul>
    </div>
  </main>

  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    // Envoyer l'email (exemple basique)
    $to = 'contact@royalride.com';
    $subject = 'Nouveau message de contact';
    $body = "Nom: $name\nEmail: $email\nTéléphone: $phone\n\nMessage:\n$message";
    $headers = 'From: ' . $email;

    if (mail($to, $subject, $body, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur est survenue. Veuillez réessayer.";
    }
}
?>


<?php
    require_once('footer.php');
?>