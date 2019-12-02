/*
* Fichier permettant la déconnexion de l'utilisateur
*/

$(document).ready(function() {
    $("#deco").on('click', function (data){
        $.ajax({
            url: '/JS/utils/deconnexion.php',
            type: 'post',
            data: $(this).serialize(),
        }).done(function(result) {
            if(result === true){
                location.reload();
            }
        });
        return false;
    });
});

