<?php
session_start();
require '../../../class/class.database.php';

// récupération des données
$categorie = $_POST["categorie"];
$idProduit = $_POST["idProduit"];

// lancement de la mise à jour
$db = Database::getInstance();
$sql = <<<EOD
    update produit
        set idCategorie = (select id from categorie where nom = :categorie)
    where id = :idProduit;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('categorie', $categorie);
$curseur->bindParam('idProduit', $idProduit);
try {
    $curseur->execute();
    echo 1;
} catch (Exception $e) {
    echo substr($e->getMessage(), strrpos($e->getMessage(), '#') + 1);
}
