document.addEventListener("DOMContentLoaded", function () {
    var formulaire = document.getElementById("ConnexionForm");
    var messageErreur = document.getElementById("messageErreur");

    formulaire.addEventListener("submit", function (event) {
        // Annule la soumission du formulaire par défaut
        event.preventDefault();

        // Récupère tous les champs du formulaire
        var champs = formulaire.elements;
        var formulaireValide = true;
        var champVide = null;
        var email = document.getElementById("email");
        var pass1 = document.getElementById("password");
        for (var i = 0; i < champs.length; i++) {
            if (champs[i].value === "") {
                champVide = champs[i].getAttribute("data-champ");
                formulaireValide = false;
                break;
            }
        }

        if (!formulaireValide) {
            messageErreur.textContent = "Veuillez remplir le champ : " + champVide;
        }
        // else if (!isValidEmail(email)) {
        //     messageErreur.textContent = "Veuillez saisir un email valide!";
        // }
        else if (pass1.value.length < 6) {
            messageErreur.textContent = "le mot de passe doit contenir au minimum 6 caractères!";

        } else {
            messageErreur.textContent = ""; // Efface les messages d'erreur précédents
            formulaire.submit();
        }
    });
});
