/*
* Fichier permettant de supprimer une image
*/

$(document).ready(function() {
    $("#form-rm-pic").submit(function (data){
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
