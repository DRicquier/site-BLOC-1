<?php
require '../../../class/class.database.php';

$db = Database::getInstance();

// définir ma requête
$sql = <<<EOD
            Select id, nom, typedebois, (select username from membre where produit.idMembre = membre.id) as leVendeur, (select nom from categorie where produit.idCategorie = categorie.id) as categorie, image, prix
            from produit
            where actif = 1
            ORDER BY idMembre, id desc;
EOD;
$curseur = $db->prepare($sql);
$curseur->execute();
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();

// envoyer le résultat au format JSON
echo json_encode($lesLignes);
