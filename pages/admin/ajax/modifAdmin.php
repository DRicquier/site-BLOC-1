<?php
session_start();
require '../../../class/class.database.php';

// récupération des données
$admin = $_POST["admin"];
$idMembre = $_POST["idMembre"];

// lancement de la mise à jour
$db = Database::getInstance();
$sql = <<<EOD
    update membre
        set administrateur = :admin
    where id = :idMembre;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('admin', $admin);
$curseur->bindParam('idMembre', $idMembre);
try {
    $curseur->execute();
    echo 1;
} catch (Exception $e) {
    echo substr($e->getMessage(), strrpos($e->getMessage(), '#') + 1);
}
