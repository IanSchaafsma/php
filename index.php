<?php
    require 'functions.php';
    $connection = dbConnect();

    $resultP = $connection->query('SELECT * FROM `projects`');
    $resultL = $connection->query('SELECT * FROM `leaderbord`');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="js/061ded24e3.js"></script>
    <script src="js/main.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
    <title>TEAMBEES</title>
</head>

<body>


    <header class="header" id="TOP">
        <figure class="header__logo">
            <img class="logo__img" src="img/webp/TeamBeesLogo.webp" alt="The team bees logo, With 2 bees on the side.">
        </figure>
        <heading class="header__heading">
            <h1 class="heading__title">Join the movement!</h1>
            <p class="heading__intro">The team is growing every day and scoring wins for the planet. Plant with us and
                track our progress!</p>
        </heading>
        <h3 class="header__counter">23,851,302</h3>
    </header>

    <main>


        <form class="donateForm" action="" id="FORM">
            <header class="donateForm__heading">
                <h3>Join #TeamBees!</h3>
                <p>$1 plants a bee</p>
            </header>
            <ul class="donateForm__premade">
                <li class="premade__option">
                    <input id="js--trees-5" name="donateButtons" type="radio">
                    <label for="js--trees-5">5 bees</label>
                </li>
                <li class="premade__option">
                    <input id="js--trees-20" name="donateButtons" type="radio">
                    <label for="js--trees-20">20 bees</label>
                </li>
                <li class="premade__option">
                    <input id="js--trees-50" name="donateButtons" type="radio">
                    <label for="js--trees-50">50 bees</label>
                </li>
                <li class="premade__option">
                    <input id="js--trees-100" name="donateButtons" type="radio">
                    <label for="js--trees-100">100 bees</label>
                </li>
                <section class="donateForm__other">
                    <textarea id="otherAmount" class="other__input" placeholder="Other amount"></textarea>
                </section>
            </ul>

            <section class="donateForm__payment">
                <a class="payment__next" type="submit" href="contact.php/">Next</a>
                <a class="payment__crypto" type="submit" href="contact.php/">Donate with crypto</a>
            </section>
        </form>


        <article class="toProjects">
            <a href="#PP" class="toProjects__button"><i class="fa-solid fa-circle-check toProjects__checkmark"></i> 17 MILLION+ BEES ARE IN THE WILD <i class="fa-solid fa-right-long toProjects__arrow"></i></a>
        </article>


        <section class="leaderbord">
            <h2 class="leaderbord__heading">Leaderboard</h2>
            <article class="leaderbord__buttons">
                <button class="leaderbord__search">Search <img src="img/svg/magnifyingGlass.svg"
                        alt="a image of a magnifying glass"></button>
                <article class="leaderbord__filters">
                    <section class="leaderbord__filter">
                        <input class="filter__sort" type="radio" name="Most recent" id="js--recent">
                        <label class="filter__sortRecent" for="js--recent">Most Recent</label>
                    </section>
                    <section class="leaderbord__filter">
                        <input class="filter__sort" type="radio" name="Most trees" id="js--most">
                        <label class="filter__sortMost" for="js--most">Most Bees</label>
                    </section>

                </article>
            </article>
            <ul class="leaderbord__list">
                <?php foreach($resultL as $row):?>
                <li class="leaderbord__card">
                    <img class="leaderbord__img" src="img/svg/<?php echo $row['img']; ?>" alt="a picture of an acorn.">
                    <section class="leaderbord__wrapper-left">
                        <h3 class="leaderbord__name"> <?php echo $row['name']; ?> </h3>
                    </section>
                    <section class="leaderbord__wrapper-right">
                        <p class="leaderbord__trees"> <?php echo $row['donated']; ?> </p>
                        <p class="leaderbord__date"> <?php echo $row['date']; ?> </p>
                    </section>
                </li>
                <?php endforeach; ?>    

            </ul>
            <a href="#FORM" class="leaderbord__toForm">Add Your Bee</a>
        </section>


        <section class="plantingProjects" id="PP">
            <header class="plantingProjects__heading">
                <h2>Planting Projects</h2>
                <p>Where are these millions of Bees being planted? All over the world! Get the latest info on our
                    current projects.</p>
            </header>
            <article class="plantingProjects__progress">
                <header class="progress__header">
                    <h3 class="progress__heading">Bees in the Wild</h3>
                    <p class="progress__goal">17 million+ / 23 million</p>
                </header>
                <ul class="progress__list">
                    <li class="progress__listCard">

                    </li>
                </ul>
                <a href="#PL" class="progress__link">Check out our updated planting locations <img src="img/webp/arrow-right-light.webp" alt="Arrow right"></a>
            </article>
            <ul class="plantingProjects__list" id="PL">
                <?php foreach($resultP as $row):?>
                <li class="plantingProjects__card">
                    <h4 class="plantingProjects__place"> <?php echo $row['title']; ?></h4>
                    <p class="plantingProjects__amountTrees"> <?php echo $row['bees']; ?> </p>
                    <p class="plantingProjects__description">
                        <?php echo $row['description']; ?>
                    </p>
                    <figure class="plantingProjects__badge">
                        <img class="plantingProjects__sticker" src="img/webp/badge-chartreuse.webp" alt="A badge">
                        <p class="plantingProjects__status">Complete</p>
                    </figure>
                </li>
                <?php endforeach; ?>    
            </ul>
        </section>



        <section class="socials">
            <h2 class="socials__heading">#TeamBees Social</h2>
            <ul class="socials__buttons">
                <li class="buttonMedia">
                    <a href="https://reddit.com/r/teamtrees" target="_blank"> <i class="fa-brands fa-reddit-alien"></i> </a>
                </li>
                <li class="buttonMedia">
                    <a href="https://www.instagram.com/teamtrees/" target="_blank"> <i class="fa-brands fa-instagram"></i> </a>
                </li>
                <li class="buttonMedia">
                    <a href="https://twitter.com/teamtreesofficl" target="_blank"> <i class="fa-brands fa-twitter"></i> </a>
                </li>
                <li class="buttonMedia">
                    <a href="https://www.facebook.com/teamtreesofficial/" target="_blank"> <i class="fa-brands fa-facebook-f"></i> </a>
                </li>
            </ul>
            <article class="socials__slider">
                <div class="sliderButton">
                    <button class=""> <i class="fa-solid fa-chevron-left"></i> </button>

                </div>
                <ul class="social__images">
                    <li class="social__image">
                        <img src="img/webp/278904945_1157037181750122_6769074396171601581_n.webp" alt="">
                    </li>
                    <li class="social__image">
                        <img src="img/webp/EIYX9AdXsAEfsjv.jpg-large.webp" alt="">
                    </li>
                    <li class="social__image">
                        <img src="img/webp/MrBeast_Elon-Musk_tweet_191028_v2.webp" alt="">
                    </li>
                </ul>
                <div class="sliderButton">
                    <button class=""> <i class="fa-solid fa-chevron-right"></i> </button>

                </div>
            </article>
        </section>


    </main>

    <footer>
        <button class="footer__button">FAQ</button>
        <button class="footer__button">Contact Us</button>
        <button class="footer__button">Press Inquiries</button>
        <a href="https://teamseas.org/" target="_blank" class="footer__button">#TeamSeas</a>
    </footer>


</body>

</html>