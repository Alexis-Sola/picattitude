/*
* Fichier permettant l'inscription d'un utilisateur
* Gestion des erreurs lors de l'inscription
*/

$(document).ready(function() {
    $("#forminsc").submit(function (data){
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
        }).done(function(result) {
            $("#erreur").remove();
            switch (result) {
                case 0:
                    $("#erreurinsc").html("<p style='color: red'><strong>Le formulaire n'est pas complet !</strong></p>");
                    break;
                case 1:
                    $("#removeinsc").remove();
                    $("#formconnec").append(modal);
                    $("#bodymodal").append($("<div />", {
                            id: "erreur"
                        }), $("<div />", {
                            id: "success"
                        }),
                        connexion);
                    $("#success").html("<p style='color: dodgerblue'><strong>Votre compte a été créé avec succés ! Vous pouvez vous connecter.</strong></p>");
                    break;
                case 2:
                    $("#erreurinsc").html("<p style='color: red'><strong>Votre login existe déjà...</strong></p>");
                    break;
                //case 3:
                    //$("#erreurinsc").html("<p style='color: red'><strong>Mot de passe trop court...</strong></p>");
                    //break;
                case 4:
                    $("#erreurinsc").html("<p style='color: red'><strong>Les mots de passes ne correspondent pas !</strong></p>");
                    break;

                default:
                    $("#erreurinsc").html("<p style='color: red'><strong>Oups</strong></p>");
            }

        });
        return false;
    });
});