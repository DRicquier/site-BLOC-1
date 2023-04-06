"use strict";

window.onload = init;

function init() {

    // chargement des informations
    $.ajax({
        url: "ajax/getlePanier.php",
        type: 'post',
        dataType: "json",
        success: afficher,
        error: reponse => console.error(reponse.responseText)
    });

}
function afficher(data) {
    document.getElementById("contenuPanier").innerHTML = '';


    let prixTotal = 0;

    let contenue = document.getElementById('contenuPanier');
    let section = document.createElement('section');
    contenue.appendChild(section);
    let table = document.createElement('table');
    section.appendChild(table);
    let tr0 = document.createElement('tr');
    table.appendChild(tr0);
    let th0 = document.createElement('th');
    tr0.appendChild(th0);
    let th1 = document.createElement('th');
    let th1Contenue = document.createTextNode('Nom');
    th1.appendChild(th1Contenue);
    tr0.appendChild(th1);

    let th2 = document.createElement('th');
    let th2Contenue = document.createTextNode('Prix');
    th2.appendChild(th2Contenue);
    tr0.appendChild(th2);

    let th3 = document.createElement('th');
    let th3Contenue = document.createTextNode('Quantité');
    th3.appendChild(th3Contenue);
    tr0.appendChild(th3);

    let th4 = document.createElement('th');
    let th4Contenue = document.createTextNode('Action');
    th4.appendChild(th4Contenue);
    tr0.appendChild(th4);

    for (let o of data) {

        let categorie;

        if( o.idCategorie == '2'){
            categorie = "status"
        }
        else if( o.idCategorie == '1') {
            categorie = "jouets"
        }
        else if( o.idCategorie == '3') {
            categorie = "deco";
        }
        else if ( o.idCategorie == '4'){
            categorie = "outils";
        }
        else if (o.idCategorie == '5'){
            categorie = "divers";
        }
        else {
            categorie = "";
        }
        prixTotal += parseInt(o.prix) * parseInt(o.quantite);
        let tr = document.createElement('tr');

        let td1 = document.createElement('td');
        td1.className = "tdImg";
        let img = document.createElement('img');
        img.src = "../" + categorie + "/image/" + o.image;
        td1.appendChild(img);
        tr.appendChild(td1);

        let td2 = document.createElement('td');
        let td2Contenue = document.createTextNode(o.nom);
        td2.appendChild(td2Contenue);
        tr.appendChild(td2);

        let td3 = document.createElement('td');
        let td3Contenue = document.createTextNode(o.prix);
        td3.appendChild(td3Contenue);
        tr.appendChild(td3);

        let td4 = document.createElement('td');
        let qteListe = document.createElement('select');
        qteListe.style.width = "100px";
        qteListe.id = "qteSelectionne=" + o.quantite;
        qteListe.classList.add('form-select');
        let quantitePossible = ['1','2','3','4','5','6','7','8','9','10'];

        for (const uneQte of quantitePossible) {
            let option;
            if (uneQte == o.quantite) {
                option = new Option(uneQte, false, true, true);
            } else {
                option = new Option(uneQte);
            }
            qteListe.appendChild(option);
        }
        td4.appendChild(qteListe);

        qteListe.onchange = () => {
            $.ajax({

                url: 'ajax/modifQuantite.php',
                type: 'POST',
                data: {qte: qteListe.value, idProduit: o.idProduit},
                dataType: "json",
                success: function () {
                    Std.afficherSucces("Modification enregistrée");
                    $.ajax({
                        url: 'ajax/getlePanier.php',
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
        tr.appendChild(td4);

        let td5 = document.createElement('td');
        let buttonSupprimer = document.createElement('button');
        buttonSupprimer.classList.add('btn','btn-danger','bi', 'bi-trash');
        buttonSupprimer.type = "button";
        td5.appendChild(buttonSupprimer);
        tr.appendChild(td5);

        table.appendChild(tr);

        buttonSupprimer.onclick = () => {
            $.ajax({
                url: "ajax/supprimer.php",
                type: 'post',
                dataType: "json",
                data: { idObjet : o.idProduit},
                success: function () {
                    Std.afficherSucces("Produit supprimer de votre panier");
                    $.ajax({
                        url: 'ajax/getlePanier.php',
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
    let tr2 = document.createElement('tr');
    tr2.className = "total"
    let th = document.createElement('th');
    let thContenue = document.createTextNode("Total : " + prixTotal + "€");
    th.appendChild(thContenue);
    tr2.appendChild(th);

    table.appendChild(tr2);

}



