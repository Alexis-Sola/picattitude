
$(document).ready(function() {
    $(".form-rm-account").on('submit', function (e){
        e.preventDefault();
        $.ajax({
            url:  $(this).attr("action"),
            type:  $(this).attr("method"),
            data: $(this).serialize(),
        }).done(function(result) {
            if(result === true){
                location.reload();
            }
            else{
                alert("Impossible de supprimer ce compte")
            }
        });
    });
});