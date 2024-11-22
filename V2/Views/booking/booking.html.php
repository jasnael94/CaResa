<div class="bookings-container">
        <div class="booking-container booking-active">
            <h2>Mes réservations en cours :</h2>
            <?php 
                if(empty($bookingAvailable)) { 
                    echo "Vous n'avez aucune réservation en cours..";
                } else {
                    $idResa = 1;
                    foreach($bookingAvailable as $bookingAvailables) {
                        ?>
                            <div class="booking-infos">
                                <h3>Réservation n°<?php echo$idResa;?></h3>
                                <h4>Informations de la réservation :</h4><br>
                                    <ul>
                                        <li><strong>Nom : </strong><?php echo $_SESSION['login'];?></li>
                                        <li><strong>Date de réservation : </strong><?php echo $bookingAvailables['createdAt'] ?></li>
                                        <li><strong>Date de début : </strong><?php echo $bookingAvailables['startDate'] ?></li>
                                        <li><strong>Date de fin : </strong><?php echo $bookingAvailables['endDate'] ?></li>
                                        <li><strong>Prix total : </strong><?php echo $bookingAvailables['total'] ?>€</li>                                       
                                        <li class="status-open"><strong>Statut : </strong><?php echo $bookingAvailables['statut'] ?></li>
                                    </ul><br>
                                    <h4>Informations sur le véhicule réservé :</h4><br>
                                    <ul>
                                        <li><strong>Marque : </strong><?php echo $bookingAvailables['brand'];?></li>
                                        <li><strong>Modèle : </strong><?php echo $bookingAvailables['model'];?></li>
                                        <li><strong>Année : </strong><?php echo $bookingAvailables['yearProd'];?></li>
                                        <li><strong>Prix/Jour : </strong><?php echo $bookingAvailables['pricePerDay'];?>€</li>
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
                if(empty($bookingNotAvailable)) { 
                    echo "Vous n'avez aucune réservation clôturée..";
                } else {
                    $idResa = 1 ;
                    foreach($bookingNotAvailable as $bookingNotAvailables) {
                        ?>
                            <div class="booking-infos">
                                <h3>Réservation n°<?php echo$idResa;?></h3>
                                <h4>Informations de la réservation :</h4><br>
                                    <ul>
                                        <li>Nom : <?php echo $_SESSION['login'];?></li>
                                        <li>Date de réservation : <?php echo $bookingNotAvailables['createAt'] ?></li>
                                        <li>Date de début : <?php echo $bookingNotAvailables['startDate'] ?></li>
                                        <li>Date de fin : <?php echo $bookingNotAvailables['endDate'] ?></li>
                                        <li>Prix total : <?php echo $bookingNotAvailables['total'] ?>€</li>                                       
                                        <li class="status-closed">Statut : <?php echo $bookingNotAvailables['statut'] ?></li>
                                    </ul><br>
                                <h4>Informations sur le véhicule réservé :</h4><br>
                                    <ul>
                                        <li>Marque : <?php echo $bookingNotAvailables['brand'];?></li>
                                        <li>Modèle : <?php echo $bookingNotAvailables['model'];?></li>
                                        <li>Année : <?php echo $bookingNotAvailables['yearProd'];?></li>
                                        <li>Prix/Jour : <?php echo $bookingNotAvailables['pricePerDay'];?>€</li>
                                    </ul>
                            </div>
                        <?php
                        $idResa += 1 ;
                    }
                }
            ?>
        </div>
    </div>

