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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
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
                        <img src="../compte/image/personne.jpg"
                             alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 id="monNom" class="my-3"></h5>
                        <p class="text-muted mb-1">Mon compte</p>
                        <div>
                            <p id="nomPrenom">Nom et prénom</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nom de l'objet</p>
                            </div>
                            <div class="col-sm-9">
                                <input id="nomObjet" class="text-muted" style="width:300px">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Type de bois</p>
                            </div>
                            <div class="col-sm-9">
                                <input id="typeBois" class="text-muted" style="width:300px">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Categorie</p>
                            </div>
                            <div id="laCategorie"class="col-sm-9">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Prix</p>
                            </div>
                            <div class="col-sm-9">
                                <input id="prix" class="text-muted" style="width:300px">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Image</label>
                                <input type="file" id="fichier" accept=".jpg, .png" style='display:none'>
                                <div class="text-center">
                                    <div id="cible" class="upload"
                                         data-bs-trigger="hover"
                                         data-bs-placement="bottom"
                                         data-bs-html="true"
                                         data-bs-title="<b>Règles à respecter<b>"
                                         data-bs-content="Extensions acceptées : jpg et png<br>Taille limitée à 30 Ko<br>Dimension maximale : 150 * 150">
                                        <i class="bi bi-cloud-upload" style="font-size: 4rem; color: #8b8a8a;"></i>
                                        <div>Cliquez ou déposer la photo ici</div>
                                    </div>
                                    <div id="messageCible" class="messageErreur"></div>
                                    <button id="btnAjouter" class="btn btn-danger">Ajouter</button>
                                </div>
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
