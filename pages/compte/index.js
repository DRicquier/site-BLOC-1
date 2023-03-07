"use strict";

// fichier téléversé
let leFichier = null;

window.onload = init;

function init() {

    // chargement des informations du client
    $.ajax({
        url: "ajax/getInformation.php",
        type: 'post',
        dataType: "json",
        success: afficher,
        error: reponse => console.error(reponse.responseText)
    });

}
function afficher(data) {

    let username = document.getElementById('monNom');
    let usernameContenue = document.createTextNode(data[0].username);
    username.appendChild(usernameContenue);

    let nomPrenom = document.getElementById('nomPrenom');
    let nomPrenomContenue = document.createTextNode(data[0].nom + ' ' + data[0].prenom);
    nomPrenom.appendChild(nomPrenomContenue);

    let email = document.getElementById('email');
    email.value = data[0].mail;
    email.onchange = () => {
            $.ajax({
                url: 'ajax/modifMail.php',
                type: 'POST',
                data: {mail: email.value},
                dataType: "json",
                success: function () {
                    Std.afficherSucces("Modification enregistrée");
                },
                error: function (request) {
                    Std.afficherErreur(request.responseText);
                }
            })
        };



    let adresse = document.getElementById('adresse');
    if(data[0].adresseLivraison == null){
        adresse.value = 'Adresse de livraison non renseignée';
    }
    else {
        adresse.value = data[0].adresseLivraison;
    }
    adresse.onchange = () => {
        $.ajax({
            url: 'ajax/modifAdresse.php',
            type: 'POST',
            data: {adresse: adresse.value},
            dataType: "json",
            success: function () {
                Std.afficherSucces("Modification enregistrée");
            },
            error: function (request) {
                Std.afficherErreur(request.responseText);
            }
        })
    };

    let bio = document.getElementById('bio');
    bio.value = data[0].bio;

    bio.onchange = () => {
        $.ajax({
            url: 'ajax/modifBio.php',
            type: 'POST',
            data: {bio: bio.value},
            dataType: "json",
            success: function () {
                Std.afficherSucces("Modification enregistrée");
            },
            error: function (request) {
                Std.afficherErreur(request.responseText);
            }
        })
    };




}
