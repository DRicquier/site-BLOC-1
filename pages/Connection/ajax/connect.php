<?php
session_start();
require '../../../class/class.database.php';


$username = $_POST["name"];
$password = $_POST["password"];

// contrôle des données attendues
if (!isset($username) || !isset($password)) {
    echo "Paramètres manquants";
    exit;
}


// Vérifier si le membre existe avec son login
$db = Database::getInstance();

$sql = <<<EOD
        select username,motDePasse, id, typeMembre, administrateur  from membre
        where username = :username;
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('username', $username);
$curseur->execute();
$ligne = $curseur->fetch(PDO::FETCH_ASSOC);
$curseur->closeCursor();



// Vérifier si le mot de passe et le login sont correctes
if(!preg_match("/^[a-zA-Z0-9]{4,}$/", $password)) {
    echo "Le mot de passe n'est pas conforme.";
    exit;
} else {
    if ($ligne['motDePasse'] != hash('sha256', $password)) {
        echo "Le mot de passe est incorrect";
        exit;
    };
}
if (!$ligne) {
    echo "Membre inexistant";
    exit;
}
else {
    $password = hash('sha256', $password);
    $sql = <<<EOD
            Select administrateur
            from membre
            where username = :username and motDePasse = :password;
EOD;
    $curseur = $db->prepare($sql);
    $curseur->bindParam('username', $username);
    $curseur->bindParam('password', $password);
    $curseur->execute();
    $ligne2 = $curseur->fetch(PDO::FETCH_ASSOC);
    $curseur->closeCursor();



    // création de la connexion
    $_SESSION['user'] = $ligne['username'];
    $_SESSION['id'] = $ligne['id'];
    $_SESSION['typeMembre'] = $ligne['typeMembre'];
    echo json_encode($ligne2);

}



