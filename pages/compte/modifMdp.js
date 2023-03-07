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

    let ancienMdp = document.getElementById('ancienMdp');
    let nvMdp1 = document.getElementById('nvMdp1');
    let nvMdp2 = document.getElementById('nvMdp2');

    btnEnregistrer.onclick = () => {

        if(nvMdp1.value == nvMdp2.value){
            $.ajax({
                url: 'ajax/modifMdp.php',
                type: 'POST',
                data: {ancienMdp: ancienMdp.value, nvMdp: nvMdp1.value},
                dataType: "json",
                success: function () {
                    Std.afficherSucces("Modification enregistrée");
                    //attendre 3sec et renvoit sur la page précédente
                    setTimeout('window.history.back();', 3000);


                },
                error: function (request) {
                    Std.afficherErreur(request.responseText);
                }
            })
        }else{
            Std.afficherErreur("Vous avez mal recopié le nouveau mot de passe, veuillez recommencer ! ");
            ancienMdp.innerText = "";
            nvMdp1.innerText = "";
            nvMdp2.innerText = "";
        }

    }





}
