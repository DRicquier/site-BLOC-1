<?php
session_start();
require '../../../class/class.database.php';

$userid = $_SESSION['id'];
$bio = $_POST["bio"];

$db = Database::getInstance();
$sql = <<<EOD
    update membre
        set bio = :bio
    where id = :id;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('bio', $bio);
$curseur->bindParam('id', $userid);
try {
    $curseur->execute();
    echo 1;
} catch (Exception $e) {
    echo substr($e->getMessage(), strrpos($e->getMessage(), '#') + 1);
}
