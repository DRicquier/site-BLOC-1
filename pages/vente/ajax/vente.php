<?php
session_start();
require '../../../class/class.database.php';

$userid = $_SESSION['id'];
$nomObjet = $_POST["nomObjet"];
$typeBois = $_POST["typeBois"];
$prix = $_POST["prix"];
$nomCat = $_POST["laCat"];



$REP_PHOTO = "../../" . $nomCat . "/image/";

if($nomCat == "jouets"){
    $nomCat = "jouet";
}
elseif ($nomCat == "status"){
    $nomCat = "Status";
}
elseif ($nomCat == "deco"){
    $nomCat = "Deco";
}
elseif ($nomCat =="divers"){
    $nomCat = "Divers";
}
elseif ($nomCat =="outils"){
    $nomCat = "Outils";
}
elseif ($nomCat =="divers"){
    $nomCat = "Divers";
}

$tmp = $_FILES['fichier']['tmp_name'];
$nomFichier = $_FILES['fichier']['name'];

// Définition des contraintes à respecter
$lesExtensions = ["jpg", "png"];

// vérification de l'extension
$extension = pathinfo($nomFichier, PATHINFO_EXTENSION);
if (!in_array($extension, $lesExtensions)) {
    echo "Extension de l'image non acceptée";
    exit;
}

// contrôle de l'existence des paramètres attendus
if (!isset($_FILES['fichier'])) {
    echo "Il faut transmettre une image de l'objet";
    exit;
}

if (!isset($_POST['nomObjet']) ) {
    echo "\nIl faut transmettre le nom d'objet";
    exit;
}
if (!isset($_POST['typeBois']) ) {
    echo "\nIl faut transmettre le type de bois";
    exit;
}
if (!isset($_POST['prix']) ) {
    echo "\nIl faut transmettre un prix";
    exit;
}
if (!isset($_POST['laCat']) ) {
    echo "\nIl faut transmettre une categorie";
    exit;
}

$db = Database::getInstance();
$sql = <<<EOD
        insert into produit(nom, typeDeBois,idMembre,idCategorie,image,prix, actif)
        values (:nom, :typeBois, :idMembre, (Select id from categorie where nom = :categorie),:image, :prix, 0);
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('nom', $nomObjet);
$curseur->bindParam('typeBois', $typeBois);
$curseur->bindParam('idMembre', $userid);
$curseur->bindParam('prix', $prix);
$curseur->bindParam('categorie', $nomCat);
$curseur->bindParam('image', $nomFichier);
if($curseur->execute()){

    // Ajout éventuel d'un suffixe sur le nom de la nouvelle photo en cas de doublon
    $nomImage = pathinfo($nomFichier, PATHINFO_FILENAME);
    $i = 1;
    while (file_exists($REP_PHOTO . $nomFichier)) $nomFichier = "$nomImage(" . $i++ . ").$extension";

    // copie sur le serveur
    copy($tmp, $REP_PHOTO . $nomFichier);
    echo 1;
}






