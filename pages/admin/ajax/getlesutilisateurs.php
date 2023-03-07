<?php
session_start();
require '../../../class/class.database.php';

$userid = $_SESSION['id'];
$db = Database::getInstance();

// définir ma requête
$sql = <<<EOD
            Select id,username, nom, prenom, mail, typeMembre, administrateur
            from membre;
EOD;
$curseur = $db->prepare($sql);
$curseur->execute();
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();

// envoyer le résultat au format JSON
echo json_encode($lesLignes);
