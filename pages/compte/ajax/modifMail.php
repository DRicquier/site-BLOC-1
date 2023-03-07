<?php
session_start();
require '../../../class/class.database.php';

$userid = $_SESSION['id'];
$email = $_POST["mail"];

//Vérifier la validité de l'adresse mail et si un compte ni est pas déjà lié
if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $db = Database::getInstance();
    $sql = <<<EOD
        select 1 from membre where mail = :mail;
EOD;
    $curseur = $db->prepare($sql);
    $curseur->bindParam('mail', $email);
    $curseur->execute();
    $unEmail = $curseur->fetch(PDO::FETCH_ASSOC);

    if (!$unEmail) {
        // ajout dans la base de donnée
        $sql = <<<EOD
    update membre
        set mail = :email
    where id = :id;
EOD;
        $curseur = $db->prepare($sql);
        $curseur->bindParam('email', $email);
        $curseur->bindParam('id', $userid);
        try {
            $curseur->execute();
            echo 1;
        } catch (Exception $e) {
            echo substr($e->getMessage(), strrpos($e->getMessage(), '#') + 1);
        }
    }
    else {
        echo "L'adresse e-mail est déjà lié à un compte";
        exit;
    }
}
else {
    echo "L'adresse e-mail n'est pas valide";
    exit;
}


