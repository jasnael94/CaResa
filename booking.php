<?php
    $css = "stylebooking.css";
    require_once('connect.php');
    require_once('header-cart-booking.php');

    $query = "SELECT id FROM clients WHERE firstname = '{$_SESSION['login']}'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $id = $stmt->fetch()['id'];
    $query = "SELECT * FROM bookings WHERE idClient = $id AND statut = 'en cours'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $bookingActiveInfo = $stmt->fetchAll();
    $query = "SELECT * FROM bookings WHERE idClient = $id AND statut = 'terminer'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $bookingCloseInfo = $stmt->fetchAll();
    ?>
    <div class="bookings-container">
        <div class="booking-container booking-active">
            <h2>Mes réservations en cours :</h2>
            <?php 
                if(empty($bookingActiveInfo)) { 
                    echo "Vous n'avez aucune réservation en cours..";
                } else {
                    $idResa = 1;
                    foreach($bookingActiveInfo as $bookingActiveInfos) {
                        $query = "SELECT * FROM cars WHERE id = {$bookingActiveInfos['idCar']}";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $carInfo = $stmt->fetch();
                        ?>
                            <div class="booking-infos">
                                <h3>Réservation n°<?php echo$idResa;?></h3>
                                <h4>Informations de la réservation :</h4><br>
                                    <ul>
                                        <li>Nom : <?php echo $_SESSION['login'];?></li>
                                        <li>Date de réservation : <?php echo $bookingActiveInfos['bookingDate'] ?></li>
                                        <li>Date de début : <?php echo $bookingActiveInfos['startDate'] ?></li>
                                        <li>Date de fin : <?php echo $bookingActiveInfos['endDate'] ?></li>
                                        <li>Prix total : <?php echo $bookingActiveInfos['total'] ?>€</li>                                       
                                        <li class="status-open">Statut : <?php echo $bookingActiveInfos['statut'] ?></li>
                                    </ul><br>
                                <h4>Informations sur le véhicule réservé :</h4><br>
                                    <ul>
                                        <li>Marque : <?php echo $carInfo['brand'];?></li>
                                        <li>Modèle : <?php echo $carInfo['model'];?></li>
                                        <li>Année : <?php echo $carInfo['yearProd'];?></li>
                                        <li>Prix/Jour : <?php echo $carInfo['pricePerDay'];?>€</li>
                                    </ul>
                            </div>
                        <?php
                        $idResa += 1 ;
                    }
                }
            ?>
        </div>
        <div class="separator"></div>
        <div class="booking-container booking-close">
            <h2>Mes précédentes réservations :</h2>
            <?php 
                if(empty($bookingCloseInfo)) { 
                    echo "Vous n'avez aucune réservation clôturée..";
                } else {
                    $idResa = 1 ;
                    foreach($bookingCloseInfo as $bookingCloseInfos) {
                        $query = "SELECT * FROM cars WHERE id = {$bookingCloseInfos['idCar']}";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $carInfo = $stmt->fetch();
                        ?>
                            <div class="booking-infos">
                                <h3>Réservation n°<?php echo$idResa;?></h3>
                                <h4>Informations de la réservation :</h4><br>
                                    <ul>
                                        <li>Nom : <?php echo $_SESSION['login'];?></li>
                                        <li>Date de réservation : <?php echo $bookingCloseInfos['bookingDate'] ?></li>
                                        <li>Date de début : <?php echo $bookingCloseInfos['startDate'] ?></li>
                                        <li>Date de fin : <?php echo $bookingCloseInfos['endDate'] ?></li>
                                        <li>Prix total : <?php echo $bookingCloseInfos['total'] ?>€</li>                                       
                                        <li class="status-closed">Statut : <?php echo $bookingCloseInfos['statut'] ?></li>
                                    </ul><br>
                                <h4>Informations sur le véhicule réservé :</h4><br>
                                    <ul>
                                        <li>Marque : <?php echo $carInfo['brand'];?></li>
                                        <li>Modèle : <?php echo $carInfo['model'];?></li>
                                        <li>Année : <?php echo $carInfo['yearProd'];?></li>
                                        <li>Prix/Jour : <?php echo $carInfo['pricePerDay'];?>€</li>
                                    </ul>
                            </div>
                        <?php
                        $idResa += 1 ;
                    }
                }
            ?>
        </div>
    </div>

<?php
    require_once('footer.php');
?>