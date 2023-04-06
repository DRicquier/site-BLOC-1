<?php
session_start();
require '../../../class/class.database.php';

// récupération des données
$actif = $_POST["actif"];
$idProduit = $_POST["idProduit"];

// lancement de la mise à jour
$db = Database::getInstance();
$sql = <<<EOD
    update produit
        set actif = :actif
    where id = :idProduit;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('actif', $actif);
$curseur->bindParam('idProduit', $idProduit);
try {
    $curseur->execute();
    echo 1;
} catch (Exception $e) {
    echo substr($e->getMessage(), strrpos($e->getMessage(), '#') + 1);
}
