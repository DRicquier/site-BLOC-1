"use strict";

window.onload = init;


function init() {

    let btnConnecter = document.getElementById('btnConnect');

    btnConnecter.onclick = () => connecter();

    password.onkeypress = (e) => { if (e.key === 'Enter') connecter(); }



}

function connecter() {

        let username = document.getElementById('username');

        let mdp = document.getElementById('password');


        if(username.value == ""){
            Std.afficherErreur('Le username n est pas renseigné');

        }
        else if(mdp.value == ""){

            Std.afficherErreur('Le mot de passe n est pas renseigné');
        }

        else {
            $.ajax({
                url: "ajax/connect.php",
                type: 'post',
                dataType: "json",
                data: {name : username.value, password : mdp.value},
                error: reponse => {
                    Std.afficherErreur(reponse.responseText);
                },
                success: (data) => {

                    if(data.administrateur == 1){
                        location.href="../admin/index.php";
                    }else{
                        location.href="../accueil/indexConnect.php"
                    }

                }
            });
        }


}


