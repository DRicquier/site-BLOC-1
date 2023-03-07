<?php
session_start();
require '../../../class/class.database.php';

$userid = $_SESSION['id'];
$ancienMdp = $_POST["ancienMdp"];
$nvMdp = $_POST["nvMdp"];

$ancienMdp = hash('sha256', $ancienMdp);
$nvMdp = hash('sha256', $nvMdp);
//Verification de l'ancien mdp
$db = Database::getInstance();
$sql = <<<EOD
    Select 1
    From membre
    where id = :id and motDePasse= :mdp;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('mdp', $ancienMdp);
$curseur->bindParam('id', $userid);
$curseur->execute();
$ligne = $curseur->fetch(PDO::FETCH_ASSOC);

// S'il est bon cela modifie le mot de passe sinon cela lui affiche un message d'erreur
if ($ligne) {
    $sql = <<<EOD
    update membre
        set motDePasse = :nvMdp
    where id = :id;
EOD;
    $curseur = $db->prepare($sql);
    $curseur->bindParam('nvMdp', $nvMdp);
    $curseur->bindParam('id', $userid);
    try {
        $curseur->execute();
        echo 1;
    } catch (Exception $e) {
        echo substr($e->getMessage(), strrpos($e->getMessage(), '#') + 1);
    }
}else {
    echo 'Ancien mot de passe incorrect';
}



