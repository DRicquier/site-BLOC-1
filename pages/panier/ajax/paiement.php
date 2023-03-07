<?php
session_start();
require '../../../class/class.database.php';

$userid = $_SESSION['id'];
$db = Database::getInstance();

// définir ma requête
$sql = <<<EOD
            Select membre.nom as nomClient, prenom as prenomClient, mail, adresseLivraison, image, produit.nom, prix , quantite, idCategorie, idProduit
            from membre,panier, produit
            where membre.id = :idUser and panier.idProduit = produit.id and panier.idMembre = :idUser;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('idUser', $userid);
$curseur->execute();
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();


// envoyer le résultat au format JSON

echo json_encode($lesLignes);
