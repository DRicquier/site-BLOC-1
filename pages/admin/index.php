<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>WoodenHouse</title>
    <link rel="icon" type="image/x-icon" href="../../Ressource/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <link href="style.css" rel="stylesheet"/>
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../Includes/std.js"></script>
    <script src="index.js"></script>

</head>
<?php require '../../Includes/header.php'; ?>
<body>
<div>
    <div><h1 class="titre display-3">Administration</h1></div>
    <div class="pannel">
        <div class="gestionUser">
            <h1 class="display-7">Utilisateurs</h1>
            <div class=" utilisateur overflow-scroll">
                <table class="table" style="width: 150%">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Type</th>
                        <th scope="col">Administrateur</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody id="lesUtilisateurs"></tbody>
                </table>
            </div>
        </div>

        <div class="gestionProduitsActifs">
            <h1 class="display-7">Les produits actifs</h1>
            <div class=" produit overflow-scroll">
                <table class="table" style="width: 150%">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Type de bois</th>
                        <th scope="col">Username du vendeur</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody id="lesProduitsActifs"></tbody>
                </table>
            </div>

        </div>
        <div class="gestionProduitsInactifs">
            <h1 class="display-7">Les produits inactifs</h1>
            <div class=" produit overflow-scroll">
                <table style="width: 150%">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Type de bois</th>
                        <th scope="col">Username du vendeur</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody id="lesProduitsInactifs"></tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<button type="button" class="btn btn-danger boutonDeco" onclick="location.href='../deconnexion/deconnexion.php';">
    Deconnexion
</button>
</body>
</html>






