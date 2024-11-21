<h2 class="cars-title">Nos modèles les plus demandés :</h2>
        <div class="carousels-container">
        <?php
        foreach($carListCaroussel as $carListCaroussels) { ?>
            <div class="carousel-container">
                <img src="<?php echo $carListCaroussels['pictures'];?>">
                <div class="cars-infos">
                    <ul>
                        <li>Marque : <?php echo $carListCaroussels['brand'] ?></li>
                        <li>Modéle : <?php echo $carListCaroussels['model'] ?></li>
                        <li>Année : <?php echo $carListCaroussels['yearProd'] ?></li>
                        <li>Prix / Jour : <?php echo $carListCaroussels['pricePerDay'] ?>€</li>
                        <li>Disponibilité : <?php echo $carListCaroussels['available'] ?></li>
                    </ul>
                <?php
                    if($carListCaroussels['available'] === 'disponible') { ?>
                        <a class="reserve-button" href="cart?id=<?php echo $carListCaroussels['id'];?>" target="blank">Réserver</a>
                <?php } else {
                    ?> <br><p style="color: red; font-size: 20px;">Non disponible à la réservation</p>
                <?php }
                ?>
                </div>
            </div>
        <?php } ?>
        </div>
        <h2 class="cars-title">Tout nos modèles :</h2>
        <div class="search-container" id="search-container">
            <form action="car" method="post">
                <input type="text" id="search" name="search" placeholder="<?php echo $_POST['search']; ?>">
                <button type="submit">Rechercher</button>
            </form>
            <form action="car" method="post">
                <select id="filter" name="filter">
                    <option selected disabled hidden><?php echo $_POST['filter'];?></option>
                    <option>Prix</option>
                    <option>Année</option>
                    <option>Disponible</option>
                </select>
                <button type="submit">Trier</button>
            </form>
        </div>
        <div class="cars-container">
        <?php
        foreach($carList as $carLists) { ?>
            <div class="car-container">
                <img src="<?php echo $carLists['pictures'];?>">
                <div class="cars-infos">
                    <ul>
                        <li>Marque : <?php echo $carLists['brand'] ?></li>
                        <li>Modéle : <?php echo $carLists['model'] ?></li>
                        <li>Année : <?php echo $carLists['yearProd'] ?></li>
                        <li>Prix / Jour : <?php echo $carLists['pricePerDay'] ?>€</li>
                        <li>Disponibilité : <?php echo $carLists['available'] ?></li>
                    </ul>
                <?php
                    if($carLists['available'] === 'disponible') { ?>
                        <a class="reserve-button" href="cart?id=<?php echo $carLists['id'];?>" target="blank">Réserver</a>
                <?php } else {
                    ?> <br><p style="color: red; font-size: 20px;">Non disponible à la réservation</p>
                <?php }
                ?>
                </div>
            </div>
        <?php } ?>