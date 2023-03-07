<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="UTF-8" name="Pilotes">

    <title>Decoration</title>
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
    <script src="../../Includes/std.js"></script>
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="index.js"></script>
    <script src="../../Includes/navbar.js"></script>
</head>

<?php require '../../Includes/header.php'; ?>


<body>

<section>
    <div class="container py-5">

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="image/personne.jpg"
                             alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 id="monNom" class="my-3"></h5>
                        <p class="text-muted mb-1">Mon compte</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nom et prénom</p>
                            </div>
                            <div class="col-sm-9">
                                <p id="nomPrenom" class="text-muted mb-0"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <input id="email" class="text-muted mb-0">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mot de passe</p>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-danger">
                                    <a id="modifMdp"  href="modifMdp.php">Modifier le mot de passe
                                    </a>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Adresse de livraison</p>
                            </div>
                            <div class="col-sm-9">
                                <input id="adresse" class="text-muted" style="width:300px">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Bio</label>
                                <textarea class="form-control" id="bio" rows="4"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    ©WoodenHouse 2022 – Tous droits réservés
</footer>
</body>
</html>
