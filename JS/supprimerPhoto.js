/*
* Fichier permettant de supprimer une image
*/

$(document).ready(function() {
    $(".form-rm-pic").on('submit', function (e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
        }).done(function(result) {
            if(result === true){
                location.reload();
            }
            else{
                alert("Un problème est survenu.")
            }
        });
    });
});
