<?php
// connexion à la base de données
require '../../../class/class.database.php';
$db = Database::getInstance();

// définir ma requête
$sql = <<<EOD
            Select produit.id as pId, produit.nom as nomObjet, typeDeBois, image, CONCAT(membre.nom, ' ', membre.prenom) AS nomPrenom, idMembre, produit.prix
            From produit, membre
            WHERE produit.idMembre = membre.id
            and idCategorie = 3
            Order By produit.id;
EOD;
$curseur = $db->prepare($sql);
$curseur->execute();
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();

// envoyer le résultat au format JSON
echo json_encode($lesLignes);
