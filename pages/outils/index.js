"use strict";

window.onload = init;


function init() {
   // chargement des clubs
    $.ajax({
        url: "ajax/getlesoutils.php",
        type: 'post',
        dataType: "json",
        success: afficher,
        error: reponse => console.error(reponse.responseText)
    });

}
function afficher(data) {

    console.log(data)
    let row = document.createElement('div');
    row.classList.add("row");

    for (let outil of data) {
        let col = document.createElement('div');
        col.classList.add("col-xl-3", "col-lg-4", "col-md-6", "col-12");
        col.style.padding = "10px";
        let carte = document.createElement('div');
        carte.classList.add('card');

        let entete = document.createElement('div');
        entete.classList.add('card-header', 'bg-dark', 'text-white', 'text-center');
        entete.style.minHeight = '75px';
        entete.innerText = outil.nomObjet;
        carte.appendChild(entete);

        let vendeur = document.createElement('div');
        vendeur.innerText = 'Vendu par ' + outil.nomPrenom;
        entete.appendChild(vendeur);

        let prix = document.createElement('div');
        prix.innerText = 'Prix : ' + outil.prix + '€';
        entete.appendChild(prix);

        let corps = document.createElement('div');
        corps.classList.add("text-center");
        let img = document.createElement('img');
        img.src = 'image/' + outil.image;
        img.style.width = "200px";
        img.style.height = "200px";
        img.alt = "";
        corps.appendChild(img);
        carte.appendChild(corps);

        let pied = document.createElement('div');
        pied.classList.add("card-body", 'bg-dark', 'text-white', 'text-center');
        pied.style.backgroundColor = "grey";
        pied.innerText = outil.typeDeBois;
        carte.appendChild(pied);

        let ajoutPanier = document.createElement('div');
        ajoutPanier.classList.add("card-body", 'bg-dark', 'text-white', 'text-center');
        let button = document.createElement('button');
        button.setAttribute("id", "ajouterAuPanier");
        button.classList.add('btn', 'btn-primary');
        button.innerText = 'Ajouter au panier';
        ajoutPanier.appendChild(button);
        carte.appendChild(ajoutPanier);

        col.appendChild(carte);
        row.appendChild(col);

        lesOutils.appendChild(row);

        let objet = outil.pId;
        button.onclick = () => {
            $.ajax({
                url: "../panier/ajax/ajoutPanier.php",
                type: 'post',
                dataType: "json",
                data: {idObjet: objet},
                success: function () {
                    Std.afficherSucces("Produit ajouté dans votre panier");
                },
                error: reponse => {
                    Std.afficherErreur('Il faut être connecté pour ajouter un élément au panier');
                    console.error(reponse.responseText);
                }
            });
        }
    }
}



