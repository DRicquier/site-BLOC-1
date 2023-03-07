<?php
session_start();
require '../../../class/class.database.php';

$userid = $_SESSION['id'];
$adresse = $_POST["adresse"];

$db = Database::getInstance();
$sql = <<<EOD
    update membre
        set adresseLivraison = :adresse
    where id = :id;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('adresse', $adresse);
$curseur->bindParam('id', $userid);
try {
    $curseur->execute();
    echo 1;
} catch (Exception $e) {
    echo substr($e->getMessage(), strrpos($e->getMessage(), '#') + 1);
}
