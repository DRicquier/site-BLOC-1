<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>WoodenHouse Connection</title>
    <link rel="icon" type="image/x-icon" href="../../Ressource/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <link href="style.css" rel="stylesheet"/>
    <script src="../../Includes/std.js"></script>
    <script src="../../Includes/navbar.js"></script>
    <script src="connection.js"></script>

</head>

<?php require '../../Includes/header.php';
?>
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
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" style="height: 38px"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="" id="username" class="form-control input_user" value=""  placeholder="username">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text" style="height: 38px"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="" id="password" class="form-control input_pass" value=""  placeholder="password">
                    </div>
                    <!--
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Se souvenir de moi</label>
                        </div>
                    </div>
                    -->
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="button" id="btnConnect" name="button" class="btn login_btn">Se connecter</button>
                    </div>
                </form>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Vous n'avez pas de compte ?
                </div>
                <div class="d-flex justify-content-center links">
                    <a href="inscription.php" class="ml-2">S'inscrire !</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
