<?php
session_start();
require '../../../class/class.database.php';

$userid = $_SESSION['id'];
$nomObjet = $_POST["nomObjet"];
$typeBois = $_POST["typeBois"];
$prix = $_POST["prix"];
$nomCat = $_POST["laCat"];


// contrôle de l'existence des paramètres attendus
if (!isset($_POST['nomObjet']) ) {
    echo "\nIl faut transmettre le nom d'objet";
    exit;
}
if (!isset($_POST['typeBois']) ) {
    echo "\nIl faut transmettre le type de bois";
    exit;
}
if (!isset($_POST['prix']) ) {
    echo "\nIl faut transmettre un prix";
    exit;
}
if (!isset($_POST['laCat']) ) {
    echo "\nIl faut transmettre une categorie";
    exit;
}

$db = Database::getInstance();
$sql = <<<EOD
        insert into produit(nom, typeDeBois,idMembre,idCategorie,prix)
        values (:nom, :typeBois, :idMembre, (Select id from categorie where nom = :categorie), :prix);
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('nom', $nomObjet);
$curseur->bindParam('typeBois', $typeBois);
$curseur->bindParam('idMembre', $userid);
$curseur->bindParam('prix', $prix);
$curseur->bindParam('categorie', $nomCat);
if($curseur->execute()){
    echo 1;
}






