/*
* Fichier permettant la déconnexion de l'utilisateur
*/

$(document).ready(function() {
    $("#formDeco").submit(function (data){
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
        }).done(function(result) {
            if(result === true){
                location.reload();
            }
        });
        return false;
    });
});

