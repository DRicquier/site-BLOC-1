<?php
session_start();
// connexion à la base de données
require '../../../class/class.database.php';


// récupération des données transmises
$idObjet = $_POST['idObjet'];
$idMembre = $_SESSION['id'];

//contrôle afin de savoir si le fichier n'existe pas déjà
$db = Database::getInstance();


// Savoir si l'objet existe
$db = Database::getInstance();

$sql = <<<EOD
        select 1 from produit where id = :id;
EOD;

$curseur = $db->prepare($sql);
$curseur->bindParam(':id', $element);
$curseur->execute();
$ligne = $curseur->fetch(PDO::FETCH_ASSOC);

if(!isset($ligne)) {
    echo "Produit inexistant";
}

//savoir si l'objet fait partie déjà partie du panier du membre si c'est le cas, ajouter une quantité +1

$sql = <<<EOD
        Select 1 from panier where idProduit = :idProduit and idMembre = :idMembre
EOD;

$curseur = $db->prepare($sql);
$curseur->bindParam('idProduit', $idObjet);
$curseur->bindParam('idMembre', $idMembre);
$curseur->execute();
$ligne2 = $curseur->fetch(PDO::FETCH_ASSOC);


if($ligne2){
    $sql = <<<EOD
        update panier set quantite = quantite + 1 where idProduit = :idProduit and idMembre = :idMembre
EOD;

    $curseur = $db->prepare($sql);
    $curseur->bindParam('idProduit', $idObjet);
    $curseur->bindParam('idMembre', $idMembre);
    $curseur->execute();
    echo 1;
}
else {
    $sql = <<<EOD
        insert into panier(idMembre, idProduit, quantite) values (:idMembre, :idProduit, 1);
EOD;

    $curseur = $db->prepare($sql);
    $curseur->bindParam('idMembre', $idMembre);
    $curseur->bindParam('idProduit', $idObjet);
    $curseur->execute();
    echo 1;
}








