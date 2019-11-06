/*
* Fichier permettant de rediriger l'utilisateur vers le modal
* de connexion quand il n'est pas connecter
*/

$.ajax({
    url: '../JS/utils/is_connected.php',
    type: 'get',
}).done(function (data) {
    //si c'est vrai on construit le site en fonction de l'url où il se trouve
    if(data === true){
        let url = window.location.href;
        let pathurl = "http://alexissola.xyz/";
        //navbar();
        $("#navbar").hide().toggle("slide");
        if(url === pathurl + "Accueil" || pathurl){
            emptyuseless();
            images();
            $("#images").hide().fadeIn(2000);
        }
        if(url ===  pathurl + "PartagePhoto"){
            emptyuseless();
            partagePhoto();
            $("#ajoutPhoto").hide().fadeIn(2000);
        }
        if(url ===  pathurl + "MonCompte"){
            emptyuseless();
            imagesuppr();
        }

    }
    //s'il n'est pas connecté on créer le modal de connexion
    else if(data === false) {
        emptyBeforeConnection();
        modalConnec();
        $("#myModal").modal().on('hide.bs.modal', function () {
            return false
        });
        $("#inscription").click(function () {
            retour();
        });
        $("#connection").fadeOut(1000, fadeConnection);
    }
});

//fonction qui permet de supprimer les formulaires inutiles
let emptyuseless = function () {
    $("#formconnec").remove();
    $("#forminsc").remove();
};

//fonction qui permet de supprimer les éléments en arrière plan lors de la connexion
let emptyBeforeConnection = function () {
    $("#formDeco").remove();
    $("footer").remove();
    $("#images").remove();
};
