"use strict";

window.onload = init;

let leFichier = null;

function init() {

    let select = document.getElementById('laCategorie');
    let typeListe = document.createElement('select');
    typeListe.style.width = "150px";
    typeListe.classList.add('form-select');
    let touslesTypes = ['jouets', 'status', 'deco', 'outils', 'divers'];
    for (const type of touslesTypes) {
        let option;
        option = new Option(type);

        typeListe.appendChild(option);
    }

    select.appendChild(typeListe);
    typeListe.value

    new bootstrap.Popover(cible);
    cible.onclick = () => photo.click();
    cible.ondragover = (e) => e.preventDefault();
    cible.ondrop = function (e) {
        e.preventDefault();
        controlerPhoto(e.dataTransfer.files[0]);
    }
    photo.onchange = () => {
        if (photo.files.length > 0) controlerPhoto(photo.files[0]);
    };

    let btnAjt = document.getElementById('btnAjouter');

    btnAjt.onclick = () => {
        let nomObjet = document.getElementById('nomObjet');
        let typeDeBois = document.getElementById('typeBois');
        let lePrix = document.getElementById('prix');
        messageCible.innerHTML = "";
        let monFormulaire = new FormData();
        monFormulaire.append('fichier', leFichier);
        monFormulaire.append('nomObjet', nomObjet.value);
        monFormulaire.append('typeBois', typeDeBois.value);
        monFormulaire.append('prix', lePrix.value);
        monFormulaire.append('laCat', typeListe.value);

        $.ajax({
            url: "ajax/vente.php",
            type: 'post',
            dataType: "json",
            data: monFormulaire,
            processData: false,
            contentType: false,
            error: reponse => {
                Std.afficherErreur(reponse.responseText);
            },
            success: () => {
                Std.afficherSucces('Votre objet va être vérifier et mis en vente si il est conforme');
                nomObjet.value = "";
                typeDeBois.value= "";
                lePrix.value= "";
                leFichier = null;
            }
        });
    }

}

function controlerPhoto(file) {
    cible.innerHTML = "";
    messageCible.innerHTML = "";
    let controle = {taille: 30 * 1024, lesExtensions: ["jpg", "png"]};
    if (Std.fichierValide(file, controle)) {
        messageCible.innerText = file.name;
        leFichier = file;
        let image = document.createElement('img');
        image.src = URL.createObjectURL(file)
        image.style.height = "100px";
        cible.appendChild(image);
    } else
        cible.innerHTML = controle.reponse;
}


