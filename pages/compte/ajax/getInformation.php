<?php
session_start();
require '../../../class/class.database.php';

$userid = $_SESSION['id'];
$db = Database::getInstance();

// définir ma requête
$sql = <<<EOD
            Select username, nom, prenom, mail, photo, bio, adresseLivraison
            from membre
            where id = :idUser;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('idUser', $userid);
$curseur->execute();
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();

// envoyer le résultat au format JSON
echo json_encode($lesLignes);
