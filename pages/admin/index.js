"use strict";

window.onload = init;

function init() {
    $.ajax({
        url: "ajax/getlesutilisateurs.php",
        type: 'POST',
        dataType: "json",
        success: afficherUser,
        error: reponse => console.error(reponse.responseText)
    });

    $.ajax({
        url: "ajax/getlesProduits.php",
        type: 'POST',
        dataType: "json",
        success: afficherProduits,
        error: reponse => console.error(reponse.responseText)
    });
}

function afficherProduits(data) {
    let lesProduits = document.getElementById('lesProduits');

    let tr0 = document.createElement('tr');
    lesProduits.appendChild(tr0);
    let th1 = document.createElement('th');
    let th1Contenue = document.createTextNode('Image');
    th1.appendChild(th1Contenue);
    tr0.appendChild(th1);

    let th2 = document.createElement('th');
    let th2Contenue = document.createTextNode('Nom');
    th2.appendChild(th2Contenue);
    tr0.appendChild(th2);

    let th3 = document.createElement('th');
    let th3Contenue = document.createTextNode('Type de bois');
    th3.appendChild(th3Contenue);
    tr0.appendChild(th3);

    let th4 = document.createElement('th');
    let th4Contenue = document.createTextNode('Username vendeur');
    th4.appendChild(th4Contenue);
    tr0.appendChild(th4);

    let th5 = document.createElement('th');
    let th5Contenue = document.createTextNode('Categorie');
    th5.appendChild(th5Contenue);
    tr0.appendChild(th5);

    let th6 = document.createElement('th');
    let th6Contenue = document.createTextNode('Prix');
    th6.appendChild(th6Contenue);
    tr0.appendChild(th6);

    let th7 = document.createElement('th');
    let th7Contenue = document.createTextNode('Action');
    th7.appendChild(th7Contenue);
    tr0.appendChild(th7);


    for (let unProduit of data) {

        let tr = document.createElement('tr');
        tr.style.marginRight = "50px";

        let td1 = document.createElement('td');
        let td1Contenue = document.createElement('img');

        if(unProduit.categorie === 'Status'){
            td1Contenue.src = "../status/image/" + unProduit.image;
        }
        else if(unProduit.categorie === 'Outils'){
            td1Contenue.src = "../outils/image/" + unProduit.image;
        }
        else if(unProduit.categorie === 'Jouet'){
            td1Contenue.src = "../jouets/image/" + unProduit.image;
        }
        else if(unProduit.categorie === 'Divers'){
            td1Contenue.src = "../divers/image/" + unProduit.image;
        }
        else{
            td1Contenue.src = "../deco/image/" + unProduit.image;
        }
        td1Contenue.style.width = '50px';
        td1Contenue.style.height = '50px';
        td1.appendChild(td1Contenue);
        tr.appendChild(td1);

        let td2 = document.createElement('td');
        let td2Contenue = document.createTextNode(unProduit.nom);
        td2.appendChild(td2Contenue);
        tr.appendChild(td2);

        let td3 = document.createElement('td');
        let td3Contenue = document.createTextNode(unProduit.typedebois);
        td3.appendChild(td3Contenue);
        tr.appendChild(td3);

        let td4 = document.createElement('td');
        let td4Contenue = document.createTextNode(unProduit.leVendeur);
        td4.appendChild(td4Contenue);
        tr.appendChild(td4);


        let td5 = document.createElement('td');
        let listeCategorie = document.createElement('select');
        listeCategorie.style.width = "150px";
        listeCategorie.id = "categorie=" + unProduit.categorie;
        listeCategorie.classList.add('form-select');
        let lesCategories = ['Jouet','Status','Deco','Outils','Divers'];

        for (const laCategorie of lesCategories) {
            let option;
            if (laCategorie === unProduit.categorie) {
                option = new Option(laCategorie, false, true, true);
            } else {
                option = new Option(laCategorie);
            }
            listeCategorie.appendChild(option);
        }
        td5.appendChild(listeCategorie);

        listeCategorie.onchange = () => {
            $.ajax({
                url: 'ajax/modifCategorie.php',
                type: 'POST',
                data: {categorie: listeCategorie.value, idProduit: unProduit.id},
                dataType: "json",
                success: function () {
                    Std.afficherSucces("Modification enregistrée");
                    $.ajax({
                        url: 'ajax/getlesProduits.php',
                        type: 'GET',
                        dataType: 'json',
                        error: reponse => console.error(reponse.responseText),
                        success: afficher
                    });

                },
                error: function (request) {
                    Std.afficherErreur(request.responseText)
                }
            })
        };
        tr.appendChild(td5);

        let td6 = document.createElement('td');
        let td6Contenue = document.createTextNode(unProduit.prix);
        td6.appendChild(td6Contenue);
        tr.appendChild(td6);

        let td7 = document.createElement('td');
        let buttonSupprimer = document.createElement('button');
        buttonSupprimer.classList.add('btn','btn-danger');
        buttonSupprimer.textContent= "Supprimer";
        buttonSupprimer.type = "button";
        td7.appendChild(buttonSupprimer);
        tr.appendChild(td7);

        lesProduits.appendChild(tr);

        buttonSupprimer.onclick = () => {
            $.ajax({
                url: "ajax/supprimerUnProduit.php",
                type: 'post',
                dataType: "json",
                data: { id: unProduit.id},
                success: function () {
                    Std.afficherSucces("Produit supprimé");
                    lesUtilisateurs.removeChild();
                    $.ajax({
                        url: 'ajax/getlesutilisateurs.php',
                        type: 'GET',
                        dataType: 'json',
                        error: reponse => console.error(reponse.responseText),
                        success: afficher
                    });
                },
                error: reponse => console.error(reponse.responseText)
            });
        }
    }


}
function afficherUser(data) {
    let lesUtilisateurs = document.getElementById('lesUtilisateurs');

    let trUser = document.createElement('tr');
    lesUtilisateurs.appendChild(trUser);
    let th1User = document.createElement('th');
    let th1ContenueUser = document.createTextNode('Nom');
    th1User.appendChild(th1ContenueUser);
    trUser.appendChild(th1User);

    let th2User = document.createElement('th');
    let th2ContenueUser = document.createTextNode('Prenom');
    th2User.appendChild(th2ContenueUser);
    trUser.appendChild(th2User);

    let th3User = document.createElement('th');
    let th3ContenueUser = document.createTextNode('Email');
    th3User.appendChild(th3ContenueUser);
    trUser.appendChild(th3User);

    let th4User = document.createElement('th');
    let th4ContenueUser = document.createTextNode('Username');
    th4User.appendChild(th4ContenueUser);
    trUser.appendChild(th4User);

    let th5User = document.createElement('th');
    let th5ContenueUser = document.createTextNode('Type');
    th5User.appendChild(th5ContenueUser);
    trUser.appendChild(th5User);

    let th6User = document.createElement('th');
    let th6Contenue = document.createTextNode('Administrateur');
    th6User.appendChild(th6Contenue);
    trUser.appendChild(th6User);

    let th7User = document.createElement('th');
    let th7ContenueUser = document.createTextNode('Action');
    th7User.appendChild(th7ContenueUser);
    trUser.appendChild(th7User);

    for (let unUtilisateur of data) {

        let trUser2 = document.createElement('tr');
        trUser2.style.marginRight = "50px";

        let td1User = document.createElement('td');
        let td1ContenueUser = document.createTextNode(unUtilisateur.nom);
        td1User.appendChild(td1ContenueUser);
        trUser2.appendChild(td1User);

        let td2User = document.createElement('td');
        let td2ContenueUser = document.createTextNode(unUtilisateur.prenom);
        td2User.appendChild(td2ContenueUser);
        trUser2.appendChild(td2User);

        let td3User = document.createElement('td');
        let td3ContenueUser = document.createTextNode(unUtilisateur.mail);
        td3User.appendChild(td3ContenueUser);
        trUser2.appendChild(td3User);

        let td4User = document.createElement('td');
        let td4ContenueUser = document.createTextNode(unUtilisateur.username);
        td4User.appendChild(td4ContenueUser);
        trUser2.appendChild(td4User);

        let td5User = document.createElement('td');
        let td5ContenueUser = document.createTextNode(unUtilisateur.typeMembre);
        td5User.appendChild(td5ContenueUser);
        trUser2.appendChild(td5User);

        let td6User = document.createElement('td');
        let estAdmin = document.createElement('select');
        estAdmin.style.width = "80px";
        estAdmin.id = "admin=" + unUtilisateur.administrateur;
        estAdmin.classList.add('form-select');
        let adminOuPas = ['0','1'];

        for (const Ladmin of adminOuPas) {
            let option;
            if (Ladmin === unUtilisateur.administrateur) {
                option = new Option(Ladmin, false, true, true);
            } else {
                option = new Option(Ladmin);
            }
            estAdmin.appendChild(option);
        }
        td6User.appendChild(estAdmin);

        estAdmin.onchange = () => {
            $.ajax({
                url: 'ajax/modifAdmin.php',
                type: 'POST',
                data: {admin: estAdmin.value, idMembre: unUtilisateur.id},
                dataType: "json",
                success: function () {
                    Std.afficherSucces("Modification enregistrée");
                    $.ajax({
                        url: 'ajax/getlesutilisateurs.php',
                        type: 'GET',
                        dataType: 'json',
                        error: reponse => console.error(reponse.responseText),
                        success: afficher
                    });

                },
                error: function (request) {
                    Std.afficherErreur(request.responseText)
                }
            })
        };
        trUser2.appendChild(td6User);

        let td7User = document.createElement('td');
        let buttonSupprimer = document.createElement('button');
        buttonSupprimer.classList.add('btn','btn-danger');
        buttonSupprimer.textContent= "Supprimer";
        buttonSupprimer.type = "button";
        td7User.appendChild(buttonSupprimer);
        trUser2.appendChild(td7User);

        lesUtilisateurs.appendChild(trUser2);

        buttonSupprimer.onclick = () => {
            $.ajax({
                url: "ajax/supprimerUser.php",
                type: 'post',
                dataType: "json",
                data: { id: un.id},
                success: function () {
                    Std.afficherSucces("Membre supprimé");
                    lesUtilisateurs.removeChild();
                    $.ajax({
                        url: 'ajax/getlesutilisateurs.php',
                        type: 'GET',
                        dataType: 'json',
                        error: reponse => console.error(reponse.responseText),
                        success: afficher
                    });
                },
                error: reponse => console.error(reponse.responseText)
            });
        }
    }


}


