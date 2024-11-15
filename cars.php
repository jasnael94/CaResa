<?php
    require_once('connect.php');
    require_once('header.php');

    if(empty($_GET['filter'])) {
        $_GET['filter'] = "";
    }
    if(empty($_GET['search'])) {
        $_GET['search'] = "";
    }

    $queryCarousel = "SELECT * FROM cars WHERE id <= 5";
    $queryCars = "SELECT * FROM cars";

    if($_GET['filter'] === "Prix") {
        $queryCars = "SELECT * FROM cars ORDER BY pricePerDay ASC";
    } elseif ($_GET['filter'] === "Année") {
        $queryCars = "SELECT * FROM cars ORDER BY yearProd ASC";
    } elseif ($_GET['filter'] === "Disponible") {
        $queryCars = "SELECT * FROM cars ORDER BY available ASC";
    }
    if(!empty($_GET['search'])) {
        $queryCars = "SELECT * FROM cars WHERE brand LIKE '%{$_GET['search']}%'";
    }

    $stmt = $pdo->prepare($queryCarousel);
    $stmt->execute();
    $carouselInfos = $stmt->fetchAll();
    $stmt = $pdo->prepare($queryCars);
    $stmt->execute();
    $carsInfos = $stmt->fetchAll();

?>
        <h2 class="cars-title">Nos modèles les plus demandés :</h2>
        <div class="carousels-container">
        <?php
        foreach($carouselInfos as $carouselInfo) { ?>
            <div class="carousel-container">
                <img src="<?php echo $carouselInfo['pictures'];?>">
                <div class="cars-infos">
                    <ul>
                        <li>Marque : <?php echo $carouselInfo['brand'] ?></li>
                        <li>Modéle : <?php echo $carouselInfo['model'] ?></li>
                        <li>Année : <?php echo $carouselInfo['yearProd'] ?></li>
                        <li>Prix / Jour : <?php echo $carouselInfo['pricePerDay'] ?>€</li>
                        <li>Disponibilité : <?php echo $carouselInfo['available'] ?></li>
                    </ul>
                <?php
                    if($carouselInfo['available'] === 'disponible') { ?>
                        <a class="reserve-button" href="cart.php?id=<?php echo $carouselInfo['id'];?>" target="blank">Réserver</a>
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
            <form action="#search-container" method="get">
                <input type="text" id="search" name="search" placeholder="<?php echo $_GET['search']; ?>">
                <button type="submit">Rechercher</button>
            </form>
            <form action="#search-container" method="get">
                <select id="filter" name="filter">
                    <option selected disabled hidden><?php echo $_GET['filter'];?></option>
                    <option>Prix</option>
                    <option>Année</option>
                    <option>Disponible</option>
                </select>
                <button type="submit">Trier</button>
            </form>
        </div>
        <div class="cars-container">
        <?php
        foreach($carsInfos as $carInfo) { ?>
            <div class="car-container">
                <img src="<?php echo $carInfo['pictures'];?>">
                <div class="cars-infos">
                    <ul>
                        <li>Marque : <?php echo $carInfo['brand'] ?></li>
                        <li>Modéle : <?php echo $carInfo['model'] ?></li>
                        <li>Année : <?php echo $carInfo['yearProd'] ?></li>
                        <li>Prix / Jour : <?php echo $carInfo['pricePerDay'] ?>€</li>
                        <li>Disponibilité : <?php echo $carInfo['available'] ?></li>
                    </ul>
                <?php
                    if($carInfo['available'] === 'disponible') { ?>
                        <a class="reserve-button" href="cart.php?id=<?php echo $carInfo['id'];?>" target="blank">Réserver</a>
                <?php } else {
                    ?> <br><p style="color: red; font-size: 20px;">Non disponible à la réservation</p>
                <?php }
                ?>
                </div>
            </div>
        <?php } ?>
    

<?php
    require_once('footer.php');
?>