/*
* Fichier permettant de valider la connexion
* Gestion des erreurs de login ou de champs incomplets
*/

$(document).ready(function() {
    $("#formconnec").submit(function (data){
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
        }).done(function(result) {
            if(result === 2){
                $("#myModal").empty();
                location.reload();
            }
            else if(result === 1){
                $("#erreur").html("<p style='color: red'><strong>Votre login ou votre mot de passe est invalide !</strong></p>");
            }
            else if(result === 0){
                $("#erreur").html("<p style='color: red'><strong>Champs incomplets !</strong></p>");
            }
        });
        return false;
    });
});

