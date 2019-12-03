/*
* Fichier permettant de valider la connexion
* Gestion des erreurs de login ou de champs incomplets
*/

$(document).ready(function() {
    $("#validate-connec").click(function () {
        $("#validate-connec").hide();
        $("#inscription").hide();
    });
    $("#form-connec").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
        }).done(function(result) {
            if(result === 2){
                $("#retour-connec").html("<p style='color: cornflowerblue'><strong>Connexion validée !</strong></p>");
                location.reload();
            }
            else if(result === 1){
                $("#retour-connec").html("<p style='color: red'><strong>Votre login ou votre mot de passe est invalide...</strong></p>");
                $("#validate-connec").show();
                $("#inscription").show();
            }
            else if(result === 0){
                $("#retour-connec").html("<p style='color: red'><strong>Champs incomplets...</strong></p>");
                $("#validate-connec").show();
                $("#inscription").show();
            }
            else if(result === -1){
                $("#retour-connec").html("<p style='color: red'><strong>Oups, ça c'est mal passé quelque part... Réessayer.</strong></p>");
                $("#validate-connec").show();
                $("#inscription").show();
            }
        });
    });
});

