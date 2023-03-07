<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>WoodenHouse</title>
    <link rel="icon" type="image/x-icon" href="Ressource/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"/>
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="index.js"></script>
    <script src="../../Includes/navbar.js"></script>
</head>
<header class="header-area overlay">

    <nav class=" navbar navbar-expand-md navbar-dark">
        <a class="panier" href="../index.php"><img src= "../Ressource/logo1.png" width="75px"/></a>

        <div class="container">
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    <li><a href="../index.php" class="nav-item nav-link ">Accueil</a></li>
                    <li class="dropdown">
                        <a class="nav-item nav-link" data-toggle="dropdown">Objets</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../pages/jouets/index.php">Jouets</a>
                            <a class="dropdown-item" href="../pages/status/index.php">Status</a>
                            <a class="dropdown-item" href="../pages/deco/index.php">Déco</a>
                            <a class="dropdown-item" href="../pages/outils/index.php">Outils</a>
                            <a class="dropdown-item" href="../pages/divers/index.php">Divers</a>
                        </div>
                    </li>
                    <li><a href="../pages/Connection/connection.php" class="nav-item nav-link ">Connexion</a></li>
                </ul>
            </div>
        </div>
        <a href="../pages/panier/panier.php" "><img src= "../Ressource/panier.png" width="75px" style="margin-right: 50px "/></a>
    </nav>

</header>
<body>

<section class="page-section clearfix">
    <div class="container">
        <div class="intro">
            <div class="intro-text left-0 text-center bg-faded p-5 rounded " style="display: block;">
                <h2  class="section-heading mb-4">
                    <span class="section-heading-upper">WoodenHouse</span>
                </h2>
                <p class="mb-3">Bienvenue sur Wooden House. Le site marketplace qui propose une variété de produits en bois de toutes sortes.</p>
            </div>
            <div><img class="center " src="Ressource/intro2.jpg" alt="..." /></div>
        </div>
    </div>
</section>



<footer>
    ©WoodenHouse 2022 – Tous droits réservés
</footer>
</body>
</html>
