<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>WoodenHouse Connection</title>
    <link rel="icon" type="image/x-icon" href="../../Ressource/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <link href="style.css" rel="stylesheet"/>
    <script src="../../Includes/std.js"></script>
    <script src="../../Includes/navbar.js"></script>
    <script src="inscription.js"></script>
</head>

<?php require '../../Includes/header.php'; ?>
<body>
<div class="container h-100 connect">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="logoConnect_container">
                    <img src="../../Ressource/logo1.png" class="logoConnect" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form>
                    <div class="input-group mb-2">
                        <input type="nom" id="nom" name="" class="form-control input_pass" value="" placeholder="Nom">
                    </div>
                    <div class="input-group mb-2">
                        <input type="prenom" id="prenom" name="" class="form-control input_pass" value="" placeholder="Prenom">
                    </div>
                    <div class="input-group mb-2">
                        <input type="email" id="email" name="" class="form-control input_pass" value="" placeholder="Email">
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" id="username" name="" class="form-control input_user" value="" placeholder="username">
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" id="password" name="" class="form-control input_pass" value="" placeholder="Mot de passe">
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" id="repeatPassword" name="" class="form-control input_pass" value="" placeholder="Répéter votre mot de passe">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="check" value="vendeur" id="check1">
                        <label  class="form-check-label" for="flexRadioDefault1">
                            Vendeur
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="check" value="client" id="check2" checked>
                        <label class="form-check-label" for="client">
                            Client
                        </label>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="button" id="btnIncription" name="button" class="btn login_btn">S'inscrire</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
