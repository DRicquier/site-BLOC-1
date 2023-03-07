<?php

session_start();
require '../../../class/class.database.php';

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$typeMembre = $_POST["typeMembre"];

$password = hash('sha256', $password);


// Vérifier si le membre existe avec son login
$db = Database::getInstance();

$sql = <<<EOD
        select 1 from membre
        where username = :username;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('username', $username);
$curseur->execute();
$ligne = $curseur->fetch(PDO::FETCH_ASSOC);


if ($ligne) {
    echo "Ce membre existe déjà";
    exit;
}

//Vérifier la validité de l'adresse mail et si un compte ni est pas déjà lié
if(filter_var($email, FILTER_VALIDATE_EMAIL)){

    $sql = <<<EOD
        select 1 from membre where mail = :mail;
EOD;
    $curseur = $db->prepare($sql);
    $curseur->bindParam('mail', $email);
    $curseur->execute();
    $unEmail = $curseur->fetch(PDO::FETCH_ASSOC);

    if(!$unEmail){
        // ajouter dans la base de donnée
        $sql = <<<EOD
        insert into membre(nom, prenom, mail, username, motDePasse, typeMembre)
        values (:nom, :prenom, :email, :username, :mdp, :typeMembre);
EOD;
        $curseur = $db->prepare($sql);
        $curseur->bindParam('nom', $nom);
        $curseur->bindParam('prenom', $prenom);
        $curseur->bindParam('email', $email);
        $curseur->bindParam('username', $username);
        $curseur->bindParam('mdp', $password);
        $curseur->bindParam('typeMembre', $typeMembre);

        if ($curseur->execute()) {

            $sql = <<<EOD
                select id from membre
                where username = :username and motDePasse = :password;
            EOD;
            $curseur = $db->prepare($sql);
            $curseur->bindParam('username', $username);
            $curseur->bindParam('password', $password);
            $curseur->execute();
            $ligne2 = $curseur->fetch(PDO::FETCH_ASSOC);

            $_SESSION['user'] = $username;
            $_SESSION['id'] = $ligne2['id'];
            $_SESSION['typeMembre'] = $typeMembre;

            echo 1;
        }
        else {
            echo "Inscription impossible";
            exit;
        }

    }else{

        echo "L'adresse e-mail est déjà lié à un compte";
        exit;
    }
    }else {
    echo "L'adresse e-mail n'est pas valide";
    exit;
}








