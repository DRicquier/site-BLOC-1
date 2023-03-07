<?php
session_start();
require '../../../class/class.database.php';




// récupération des données
$qte = $_POST["qte"];
$idProduit = $_POST["idProduit"];
$userid = $_SESSION['id'];

// lancement de la mise à jour
$db = Database::getInstance();
$sql = <<<EOD
    update panier
        set quantite = :qte
    where idProduit = :idProduit and idMembre = :idMembre;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('qte', $qte);
$curseur->bindParam('idProduit', $idProduit);
$curseur->bindParam('idMembre', $userid);
try {
    $curseur->execute();
    echo 1;
} catch (Exception $e) {
    echo substr($e->getMessage(), strrpos($e->getMessage(), '#') + 1);
}
