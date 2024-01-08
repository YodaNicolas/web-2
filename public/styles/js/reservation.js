document.addEventListener("DOMContentLoaded", function () {
    var formulaire = document.getElementById("ReservationtionForm");
    var messageErreur = document.getElementById("messageErreur");

    formulaire.addEventListener("submit", function (event) {
        // Annule la soumission du formulaire par défaut
        event.preventDefault();

        // Récupère tous les champs du formulaire
        var champs = formulaire.elements;
        var formulaireValide = true;
        var champVide = null;
        var typeTicket = document.getElementById("typeTicket");
        var nombreTickets = document.getElementById("nombreTickets");


        for (var i = 0; i < champs.length; i++) {
            if (champs[i].value === "") {
                champVide = champs[i].getAttribute("data-champ");
                formulaireValide = false;
                break;
            }
        }

        if (!formulaireValide) {
            messageErreur.textContent = "Veuillez remplir le champ : " + champVide;
        } else if (typeTicket.value == 0) {
            messageErreur.textContent = "Veuillez choisir un type de ticket!";
        } else if (nombreTickets.value < 1) {
            messageErreur.textContent = "Le nombre de tickes doit être supérieur à 0 !";
        }
        else {
            messageErreur.textContent = ""; // Plus de messages d'erreur 
            formulaire.submit();
        }

    });
});
