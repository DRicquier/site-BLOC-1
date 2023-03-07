<?php

// connexion à la base de données
require '../../../class/class.database.php';


// récupération de la valeur
$id = $_POST['id'];

$db = Database::getInstance();

$sql = <<<EOD
        delete from membre where id = :id;
EOD;

$curseur = $db->prepare($sql);
$curseur->bindParam('id', $id);
if($curseur->execute()){
    echo 1;
}
else {
    echo "Problème lors de la suppression";
}








