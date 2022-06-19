<?php
require 'functions.php';
$connection = dbConnect();


// Checken of id wel is meegestuurd in de url
if( !isset($_GET['id']) ){
    echo "De id is niet gezet";
    exit;
}

// Checken of het wel een getal (int) is
$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "dit is geen geldig getal";
    exit;
}

$statement = $connection->prepare('SELECT * FROM `honey` WHERE id=?');
$params = [$id];
$statement->execute($params);
$honeys = $statement->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honey</title>
    <link rel="stylesheet" href="css/description.css?v=<?php echo time(); ?>">
</head>
<body>
    <h1>Honey Info</h1>
    
    <section>
            <article class="honey-info">
                <header>
                    <h2> <?php echo $honeys['title']?> </h2>
                    <h3>TEAMBEES</h3>
                </header>
                <figure style="background-image: url(img/<?php echo $honeys['image'] ?>)">
                    <em> $ <?php echo $honeys['price'] ?> </em>
                </figure>
                <p>
                    <?php echo $honeys['description'] ?> 
                </p>
                <hr>
                <a href="index.php">Terug naar het overzicht</a>
            </article>
            <aside class="honey-sidebar">
                <h3>Meer honing</h3>
                <ul>
                    <li>Honey</li>
                    <li>Honey</li>
                    <li>Honey</li>
                    <li>Honey</li>
                    <li><a class="contact-link" href="contact.php">Contact us</a></li>
                </ul>
            </aside>
        </section>

</body>
</html>