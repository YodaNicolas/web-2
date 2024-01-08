document.addEventListener("DOMContentLoaded", function () {
    var formulaire = document.getElementById("IscriptionForm");
    var messageErreur = document.getElementById("messageErreur");

    formulaire.addEventListener("submit", function (event) {
        // Annule la soumission du formulaire par défaut
        event.preventDefault();

        // Récupère tous les champs du formulaire
        var champs = formulaire.elements;
        var formulaireValide = true;
        var champVide = null;
        var champTel = document.getElementById("telephone");
        var pass1 = document.getElementById("password");
        var pass2 = document.getElementById("confpassword");
        for (var i = 0; i < champs.length; i++) {
            if (champs[i].value === "") {
                champVide = champs[i].getAttribute("data-champ");
                formulaireValide = false;
                break;
            }
        }

        if (!formulaireValide) {
            messageErreur.textContent = "Veuillez remplir le champ : " + champVide;
        } else if (pass1.value.length < 6) {
            messageErreur.textContent = "le mot de passe doit contenir au minimum 6 caractères!";
        } else if (pass1.value !== pass2.value) {
            messageErreur.textContent = "les mots de passe ne correspondent pas!";
        } else
            if (champTel.value.length != 8) {
                messageErreur.textContent = "Veuillez remplir correctement le champ telephone(8 chiffres)";

            } else {
                messageErreur.textContent = ""; // Efface les messages d'erreur précédents
                formulaire.submit();
            }
    });
});
