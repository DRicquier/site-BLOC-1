"use strict";

window.onload = init;

function init() {

    // chargement du panier
    $.ajax({
        url: "ajax/paiement.php",
        type: 'post',
        dataType: "json",
        success: afficher,
        error: reponse => console.error(reponse.responseText)
    });




}
function afficher(data) {
    document.getElementById("recapPaiement").innerHTML = '';

    console.log(data);

    let prixTotal = 0;

    let contenue = document.getElementById('recapPaiement');

    //Information Client
    let nomPrenom = document.getElementById('nomPrenom');
    let nomPrenomContenue = document.createTextNode(data[0].nomClient + ' ' + data[0].prenomClient);
    nomPrenom.appendChild(nomPrenomContenue);

    let email = document.getElementById('email');
    email.value = data[0].mail;
    email.onchange = () => {
        $.ajax({
            url: '../compte/ajax/modifMail.php',
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
            url: '../compte/ajax/modifAdresse.php',
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




    //recapPanier
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



    for (let o of data) {

        let categorie;
        if( o.idCategorie === '2'){
            categorie = "status"
        }
        else if( o.idCategorie === '1') {
            categorie = "jouets"
        }
        else if( o.idCategorie === '3') {
            categorie = "deco";
        }
        else if ( o.idCategorie === '4'){
            categorie = "outils";
        }
        else if (o.idCategorie === '5'){
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
        let td4Contenue = document.createTextNode(o.quantite);
        td4.appendChild(td4Contenue);
        tr.appendChild(td4);

        table.appendChild(tr);

    }
    let tr2 = document.createElement('tr');
    tr2.className = "total"
    let th = document.createElement('th');
    let thContenue = document.createTextNode("Total HT : " + prixTotal + "€");
    th.appendChild(thContenue);
    tr2.appendChild(th);

    let th_ = document.createElement('th');
    let thContenue_ = document.createTextNode("TVA : 5,5%");
    th_.appendChild(thContenue_);
    tr2.appendChild(th_);

    let totalTTC = prixTotal + (prixTotal * 0.055);
    let th__ = document.createElement('th');
    let thContenue__ = document.createTextNode("Total TTC : " + totalTTC + "€");
    th__.appendChild(thContenue__);
    tr2.appendChild(th__);

    table.appendChild(tr2);

    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalTTC.toFixed(2).toString()
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction réalisé par ' + data[0].nomClient + ' ' + data[0].prenomClient);
            });
        }
    }).render('#paypal-button-container');
}



