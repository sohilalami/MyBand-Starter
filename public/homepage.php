<?php
try {
	$pdo = new PDO( 'mysql:host=localhost;dbname=bap-plantjes', 'root', '' );
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
} catch ( PDOException $e ) {
	echo $e->getFile() . ' on line ' . $e->getLine() . ': ' . $e->getMessage();
	exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zeldzame plantjes</title>
    <link type="text/css" href="style.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="alle_plantjes.php">Alle plantjes</a></li>
        </ul>
    </nav>
    <section class="content">
        <h1>Zeldzame planten</h1>
        <p>Hieronder de 10 laatste door mij gevonden zeldzame plantjes.</p>

		<?php
		$query     = 'SELECT * FROM `plants` ORDER BY `discovery_date` DESC LIMIT 10';
		$statement = $pdo->query( $query );

		foreach ( $statement as $plantje ):?>
            <div class="plantje">
                <h2><?php echo $plantje['plant_name'] ?> <em><?php echo $plantje['plant_scientific_name'] ?></em></h2>
                <img src="https://images-na.ssl-images-amazon.com/images/I/51TxgNsEnaL.jpg" width="90" height="90"/>
                <p>
                    Gevonden op <?php echo $plantje['discovery_date'] ?> er zijn er nu
                    nog <?php echo $plantje['total_on_earth'] ?> Prijs: € <?php echo $plantje['price']; ?><br/>
                    <a href="http://maps.google.com/maps?z=12&t=m&q=<?php echo $plantje['latitude'] ?>,<?php echo $plantje['longitude'] ?>" target="_blank">Bekijk
                        de vindplaats op Google Maps</a>
                </p>
            </div>
		<?php endforeach; ?>

    </section>
    <footer>
        &copy; 2019 - Programmers Plant Society
    </footer>
</div>
</body>
</html>
