$(document).ready(function (e) {
    $("#form-pic").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false

        }).done(function (data) {
            if(data === "Photo ajouté avec succés"){
                $("#retour-add-pic").html("<div class=\"alert alert-dark\" role=\"alert\">" + data + "</div>")
                location.reload();
            }
            else{
                $("#retour-add-pic").html("<div class=\"alert alert-danger\" role=\"alert\">" + data + "</div>")
            }
        });
    }));
});

let showname = function () {
    let name = document.getElementById('file-upload');
    $("#change-img-name").text(name.files.item(0).name);
};

