/*
* Fichier permettant l'inscription d'un utilisateur
* Gestion des erreurs lors de l'inscription
*/

$(document).ready(function() {
    $("#form-insc").on('submit', function (data){
        $("#validate-insc").click(function () {
            $("#validate-insc").hide();
        });
        $.ajax({
            url: '/JS/utils/inscription.php',
            type: 'post',
            data: $(this).serialize(),
        }).done(function(result) {
            switch (result) {
                case 0:
                    $("#retour-insc").html("<p style='color: red'><strong>Le formulaire n'est pas complet...</strong></p>");
                    $("#validate-insc").show();
                    break;
                case 1:
                    $("#retour-insc").html("<p style='color: cornflowerblue'><strong>Inscription validée, vous pouvez vous connecter !</strong></p>");
                    break;
                case 2:
                    $("#retour-insc").html("<p style='color: red'><strong>Pseudo déjà utilisé...</strong></p>");
                    $("#validate-insc").show();
                    break;
                case 3:
                    $("#retour-insc").html("<p style='color: red'><strong>Mot de passe trop court...</strong></p>");
                    $("#validate-insc").show();
                    break;
                case 4:
                    $("#retour-insc").html("<p style='color: red'><strong>Les mots de passes ne correspondent pas...</strong></p>");
                    $("#validate-insc").show();
                    break;

                default:
                    $("#retour-insc").html("<p style='color: red'><strong>Une erreur est survenue. Recommencez.</strong></p>");
                    $("#validate-insc").show();
            }

        });
        return false;
    });
});