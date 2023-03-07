"use strict";

window.onload = init;


function init() {

    let select = document.getElementById('laCategorie');
    let typeListe = document.createElement('select');
    typeListe.style.width = "150px";
    typeListe.classList.add('form-select');
    let touslesTypes = ['Jouet', 'Status', 'Deco','Outils','Divers'];
    for (const type of touslesTypes) {
        let option;
        option = new Option(type);

        typeListe.appendChild(option);
    }

    select.appendChild(typeListe);
    typeListe.value

    let btnAjt = document.getElementById('btnAjouter');

    btnAjt.onclick = () => {
        let nomObjet = document.getElementById('nomObjet');
        let typeDeBois = document.getElementById('typeBois');
        let lePrix = document.getElementById('prix');
        console.log(typeListe.value);
        $.ajax({
            url: "ajax/vente.php",
            type: 'post',
            dataType: "json",
            data: {nomObjet : nomObjet.value,typeBois : typeDeBois.value,prix : lePrix.value,laCat : typeListe.value},
            error: reponse => {
                Std.afficherErreur(reponse.responseText);
            },
            success: () => {
                Std.afficherSucces('Votre objet va être vérifier et mis en vente si il est conforme');
            }
        });
    }
}

function ajouter() {
    console.log('test');


}


