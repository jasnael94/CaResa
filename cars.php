<?php
    require_once('connect.php');
    require_once('header.php');

    $query = "SELECT * FROM cars";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $carsInfos = $stmt->fetchAll();
?>
    <div class="search-container">
        <form action="" method="get">
            <input type="text" id="search" name="search" placeholder="Entrez la marque que vous souhaitez">
            <button type="submit">Rechercher</button>
        </form>
        <form action="" method="get">
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
                </div>
                <a class="reserve-button" href="cart.php?id=<?php echo $carInfo['id'];?>" target="blank">Réserver</a>
            </div>
        <?php } ?>
        </div>
    

<?php
    require_once('footer.php');
?>