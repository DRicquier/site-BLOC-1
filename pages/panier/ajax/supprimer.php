<?php
session_start();

// connexion à la base de données
require '../../../class/class.database.php';


// récupération de la valeur
$idObjet = $_POST['idObjet'];
$userid = $_SESSION['id'];

$db = Database::getInstance();

    $sql = <<<EOD
        Delete from panier where idMembre = :idMembre and idProduit = :idProduit;
EOD;

    $curseur = $db->prepare($sql);
    $curseur->bindParam('idMembre', $userid);
    $curseur->bindParam('idProduit', $idObjet);
    if($curseur->execute()){
        echo 1;
    }
    else {
        echo "Problème lors de la suppression";
    }








