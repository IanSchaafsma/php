<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `honey`');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honey</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="card">

    <?php foreach($result as $row):?>
        <article class="card-list__honey">
            <figure class="card-list__img">
                <img src="img/<?php echo $row['image']; ?>" alt="A small jar of honey">
            </figure>
            <header>
                <h3> <?php echo $row['title']; ?> </h3>
                <p>$ <?php echo $row['price']; ?> </p>
                <p> <?php echo $row['description']; ?> </p>
            </header>
        </article>
    <?php endforeach; ?>

    </section>
</body>
</html>