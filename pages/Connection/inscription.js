"use strict";

window.onload = init;


function init() {


    btnIncription.onclick = () => inscription();

    password.onkeypress = (e) => {
        if (e.key === 'Enter') inscription();
    }


}

function inscription() {
    let letypeMembre;
    let radios = document.getElementsByName('check');
    for (let radio of radios) {
        if (radio.checked && radio.value === 'client') {
            letypeMembre = radio.value;
        }
        else if (radio.checked && radio.value ==='vendeur'){
            letypeMembre = radio.value;
        }
    }


    let nom = document.getElementById('nom');
    let prenom = document.getElementById('prenom');
    let email = document.getElementById('email');
    let username = document.getElementById('username');
    let mdp = document.getElementById('password');
    let rpMdp = document.getElementById('repeatPassword');



    if (nom.value == "") {
        Std.afficherErreur("Le nom n'est pas renseigné");

    } else if (prenom.value == "") {
        Std.afficherErreur("Le prénom n'est pas renseigné");

    } else if (email.value == "") {
        Std.afficherErreur("L'email n'est pas renseigné");

    } else if (username.value == "") {
        Std.afficherErreur("Le nom d'utilisateur n'est pas renseigné");

    } else if (mdp.value == "") {

        Std.afficherErreur("Le mot de passe n'est pas renseigné");
    } else if (mdp.value != rpMdp.value) {
        Std.afficherErreur("La seconde saisie de votre mot passe est incorrecte");
    } else {
        $.ajax({
            url: "ajax/ajouterMembre.php",
            type: 'post',
            dataType: "json",
            data: {
                nom: nom.value,
                prenom: prenom.value,
                email: email.value,
                username: username.value,
                password: mdp.value,
                typeMembre : letypeMembre
            },
            error: reponse => {
                Std.afficherErreur(reponse.responseText);
            },
            success: () => {
                location.href = "../accueil/indexConnect.php";
            }
        });
    }


}


