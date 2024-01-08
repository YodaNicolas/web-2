document.addEventListener("DOMContentLoaded", function () {
    var formulaire = document.getElementById("PublicationForm");
    var messageErreur = document.getElementById("messageErreur");


    formulaire.addEventListener("submit", function (event) {
        // Annule la soumission du formulaire par défaut
        event.preventDefault();

        // Récupère tous les champs du formulaire
        var champs = formulaire.elements;
        var formulaireValide = true;
        var champVide = null;
        var debut = document.getElementById("dateDebut");
        var fin = document.getElementById("dateFin");
        var passe = document.getElementById("passe1");
        var Vip = document.getElementById("Vip");
        var affiche = document.getElementById("affiche");
        var role = document.getElementById("role");
        var fichier = affiche.files[0];

        for (var i = 0; i < champs.length; i++) {
            if (champs[i].value === "") {
                champVide = champs[i].getAttribute("data-champ");
                formulaireValide = false;
                break;
            }
        }

        if (!formulaireValide) {
            messageErreur.textContent = "Veuillez remplir le champ : " + champVide;
        } else if (debut.value > fin.value) {
            messageErreur.textContent = "Le début ne doit pas être après la fin, corrigez les dates svp!";
        } else if (passe.value < 0 || Vip.value < 0) {
            messageErreur.textContent = "Le passe ne doit pas être negatif corrigez svp!";
        } else if (role.value == 1) {
            messageErreur.textContent = "Désolé vous ne pouvez pas publier un évenement car vous êtes un super administrateur. Créez un compte admin simple pour le faire!";
        }
        else {
            messageErreur.textContent = ""; // Plus de messages d'erreur 
            formulaire.submit();
        }

    });
});
