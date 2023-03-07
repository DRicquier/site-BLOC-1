<?php
if (!isset($_SESSION['user'])) {
    echo '<header class="header-area overlay">
        <nav class="pc navbar navbar-expand-md navbar-dark">
            <a class="panier" href="../../index.php"><img src= "../../Ressource/logo1.png" width="75px"/></a>

            <div class="container">
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">

                        <li><a href="../../index.php" class="nav-item nav-link ">Accueil</a></li>
                        <li class="dropdown">
                            <a class="nav-item nav-link" data-toggle="dropdown">Objets</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../../pages/jouets/index.php">Jouets</a>
                                <a class="dropdown-item" href="../../pages/status/index.php">Status</a>
                                <a class="dropdown-item" href="../../pages/deco/index.php">Déco</a>
                                <a class="dropdown-item" href="../../pages/outils/index.php">Outils</a>
                                <a class="dropdown-item" href="../../pages/divers/index.php">Divers</a>
                            </div>
                        </li>
                        <li><a href="../../pages/Connection/connection.php" class="nav-item nav-link ">Connexion</a></li>
                    </ul>
                </div>
            </div>
            <a href="../../pages/panier/panier.php"><img src= "../../Ressource/panier.png" width="75px" style="margin-right: 50px "/></a>
        </nav>

    </header>';
} else{
    if ($_SESSION['typeMembre'] == 'client') {
        echo '<header class="header-area overlay">
    <nav class="pc navbar navbar-expand-md navbar-dark">
        <a class="panier" href="../../pages/accueil/indexConnect.php"><img src= "../../Ressource/logo1.png" width="75px"/></a>

        <div class="container">
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    <li><a href="../../pages/accueil/indexConnect.php" class="nav-item nav-link ">Accueil</a></li>
                    <li class="dropdown">
                        <a class="nav-item nav-link" data-toggle="dropdown">Objets</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../../pages/jouets/index.php">Jouets</a>
                            <a class="dropdown-item" href="../../pages/status/index.php">Status</a>
                            <a class="dropdown-item" href="../../pages/deco/index.php">Déco</a>
                            <a class="dropdown-item" href="../../pages/outils/index.php">Outils</a>
                            <a class="dropdown-item" href="../../pages/divers/index.php">Divers</a>
                        </div>
                    </li>
                    <li><a href="../../pages/compte/compte.php" class="nav-item nav-link ">Mon compte</a></li>
                    <li><a href="../../pages/deconnexion/deconnexion.php" class="nav-item nav-link ">Deconnexion</a></li>
                </ul>
            </div>
        </div>
        <a href="../../pages/panier/panier.php"><img src= "../../Ressource/panier.png" width="75px" style="margin-right: 50px "/></a>
    </nav>

</header>';
    } else{
        echo '<header class="header-area overlay">
    <nav class="pc navbar navbar-expand-md navbar-dark">
        <a class="panier" href="../../pages/accueil/indexConnect.php"><img src= "../../Ressource/logo1.png" width="75px"/></a>

        <div class="container">
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    <li><a href="../../pages/accueil/indexConnect.php" class="nav-item nav-link ">Accueil</a></li>
                    <li><a href="../../pages/compte/compte.php" class="nav-item nav-link ">Mon compte</a></li>
                    <li><a href="../../pages/vente/index.php" class="nav-item nav-link ">Vendre</a></li>
                    <li><a href="../../pages/deconnexion/deconnexion.php" class="nav-item nav-link ">Deconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>

</header>';
    }
}
?>



