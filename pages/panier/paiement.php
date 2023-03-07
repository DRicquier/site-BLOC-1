<?php
session_start();
require '../../Includes/header.php'; ?>
<!doctype html>
<html lang="fr">
<head>
    <title>Paiement</title>
    <link rel="icon" type="image/x-icon" href="../../Ressource/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../Includes/std.js"></script>
    <script src="../../Includes/navbar.js"></script>
    <script src="paiement.js"></script>
    <link href="style.css" rel="stylesheet"/>
</head>
<?php
if (!isset($_SESSION['user'])) {
    header("location:../Connection/connection.php");
} else {

    echo '
<body>

<div class="col-lg-8">
                <div class="card mb-4" style="margin-left: 100px">
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
                                <p class="mb-0">Adresse de livraison</p>
                            </div>
                            <div class="col-sm-9">
                                <input id="adresse" class="text-muted" style="width:300px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<div class="panier1" id="recapPaiement">
</div>

<!--Paiement paypal ou carte bancaire -->
<!-- Le conteneur des boutons PayPal -->
<script src="https://www.paypal.com/sdk/js?client-id=AR4GR0Lizfowy9Wg8UvZ8IYBFdlS_bLRiBTETmy5MPJR_SJgwq0bJxwUC7PPXzc12wV6V9sGCej5-jPe&currency=EUR"></script>
<div style="margin-top: 50px; margin-left: 100px;"id="paypal-button-container"></div>



</body>

</html>';
} ?>

