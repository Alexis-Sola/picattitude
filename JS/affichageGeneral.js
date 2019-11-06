/*
Fichier qui créer toutes les fonctions
et variables qui servent à l'affichage dans le site
 */

//création des images dans l'accueil
let images = function (){
    $.ajax({
        url: '../JS/utils/affichageCardAccueil.php',
        type: 'get',
    }).done(function (data) {
        for(let i = 0; i < data.length; i++){
            if(i%2 === 0){
                $("#images").append(
                    $("#card").append($("<div />", {
                        id: "card" + i,
                        class: "card-deck mx-auto"
                    }))
                );
                for(let j = 0; j < 2; j++){
                    $("#card" + i).css({
                        "max-width": "90%",
                        "margin-top": "2em",
                        "background-color": "black",
                        "border-radius": "5%",
                    })
                        .append(
                            $("<div />", {
                                class: "card"
                            }).css({
                                "min-width": "20%",
                                "max-width": "50%",
                                "text-align": "center",
                                "margin": "1rem"
                            })
                                .append(
                                    $("<img />", {
                                        class:"card-img-top",
                                        src: "image/" + data[i + j]['name'],
                                        alt: "Card image"
                                    }),
                                    $("<div />", {
                                        class:"card-body"
                                    }).css({"color": "black"}),
                                    $("<h1 />",{
                                        class:"card-title cardAccueil"
                                    }).text(data[i + j]["titre"]),
                                    $("<p />", {
                                        class: "card-text"
                                    }).css({"font-size": "1.3rem"}).text(data[i + j]["desc"]),
                                    $("<p />",{
                                        class: "card-text"
                                    }).text("Posté le " + data[i + j]["date"] + " par ")
                                        .append(
                                            $("<strong />").text(data[i + j]["users"])
                                        ),
                                    $("<a />", {
                                        class: "badge badge-warning",
                                        href: "image/" + data[i + j]["name"]
                                    }).text("Voir l'image"),
                                    $("<form />", {
                                        method: "post"
                                    })
                                        .append(
                                            $("<input />", {
                                                type: "hidden",
                                                name: "idCard",
                                                value: data[i + j]["ID"]
                                            })
                                        )
                                )
                        )
                }
            }
        }
    });
};

//création ds images pour mon compte
let imagesuppr = function() {
    $.ajax({
        url: '../JS/utils/affichageCardMonCompte.php',
        type: 'get',
    }).done(function (data) {
        for(let i = 0; i < data.length; i++){
            if(i%2 === 0){
                $("#imagessuppr").append(
                    $("#cardsuppr").append($("<div />", {
                        id: "card" + i,
                        class: "card-deck mx-auto"
                    })).hide().slideDown(1000)
                );
                for(let j = 0; j < 2; j++){
                    $("#card" + i).css({
                        "max-width": "90%",
                        "margin-top": "2em",
                        "background-color": "black",
                        "border-radius": "5%",
                    })
                        .append(
                            $("<div />", {
                                class: "card"
                            }).css({
                                "min-width": "20%",
                                "max-width": "50%",
                                "text-align": "center",
                                "margin": "1rem"
                            })
                                .append(
                                    $("<img />", {
                                        class:"card-img-top",
                                        src: "image/" + data[i + j]['name'],
                                        alt: "Card image"
                                    }),
                                    $("<div />", {
                                        class:"card-body"
                                    }).css({"color": "black"}),
                                    $("<h1 />",{
                                        class:"card-title carddAccueil"
                                    }).text(data[i + j]["titre"]),
                                    $("<p />", {
                                        class: "card-text"
                                    }).css({"font-size": "1.3rem"}).text(data[i + j]["desc"]),
                                    $("<p />",{
                                        class: "card-text"
                                    }).text("Posté le " + data[i + j]["date"] + " par ")
                                        .append(
                                            $("<strong />").text(data[i + j]["users"])
                                        ),
                                    $("<a />", {
                                        class: "badge badge-warning",
                                        href: "image/" + data[i + j]["name"]
                                    }).text("Voir l'image"),
                                    $("<form />",{
                                        method: "post",
                                        action: "../JS/utils/supprimerPhoto.php",
                                        id: "formDelPics"
                                    }).append(
                                        $("<input />", {
                                            type: "hidden",
                                            name: "idCard",
                                            value: data[i + j]["ID"]
                                        }),
                                        $("<button />", {
                                            class: "btn btn-outline-danger btn-block",
                                            type: "submit"
                                        }).text("Supprimer")
                                    )
                                )
                        )
                }
            }
        }

    });
};

//formulaire pour afficher le formulaire d'ajout de photo
let partagePhoto = function () {
    $(document).ready(function () {
        $("#ajoutPhoto").append(
            $("<form />", {
                class: "md-form",
                action: "",
                method: "post",
                enctype: "multipart/form-data"
            })
                .append(
                    $("<h1 />").css({"color": "white", "margin-bottom": "1em"}).text("Partagez votre photo !"),
                    $("<h4 />").text("Choississez votre image"),
                    $("<div />", {
                        class: "input-group"
                    }).append(
                        $("<div />", {
                            class: "custom-file",
                            id: "chosefile"
                        })
                            .append(
                                $("<label />", {
                                    class: "custom-file-label",
                                }).text("Choose file"),
                                $("<input />", {
                                    type: "file",
                                    class: "custom-file-input",
                                    name: "image",
                                })
                            )
                    ),
                    $("<div />", {
                        class: "form-group"
                    })
                        .append(
                            $("<h4 />").text("Titre de votre image"),
                            $("<input />", {
                                name: "titre",
                                type: "text",
                                class: "form-control",
                                placeholder: "Entrez un titre pour votre image"
                            })
                        ),
                    $("<div />", {
                        class: "form-group"
                    })
                        .append(
                            $("<h4 />").text("Entrez une decription"),
                            $("<textarea />", {
                                class: "form-control",
                                name: "image_text",
                                rows: "4",
                                placeholder: "Entrez une description (100 caractères max)"
                            })
                        ),
                    $("<button />", {
                        class: "btn btn-outline-primary",
                        type: "submit",
                        name: "actionn"
                    }).text("Ajouter")
                )
        )
    });
};

//formulaire de connexion pour le modal
let connexion =
    $("<div />", {class: "mx-auto", id: "formulaire"}).append(
        $("<div />", {
            class: 'form-group'
        })
            .append(
                $("<label/>").text("Pseudo"),
                $("<input />", {
                    type: 'text',
                    id: 'name',
                    name: 'username',
                    placeholder: 'Entrez votre pseudo',
                    class: 'form-control'
                })
            )
    ).append(
        $("<div />", {
            class: 'form-group'
        })
            .append(
                $("<label/>").text("Mot de passe"),
                $("<input />", {
                    type: 'password',
                    id: 'password',
                    name: 'password',
                    placeholder: 'Entrez votre mot de passe',
                    class: 'form-control'
                })
            )
    ).append(
        $("<div />", {
            text: 'Cliquez ici pour vous inscrire ! ',
            class: 'badge badge-dark',
            id: "inscription"
        }).css({"margin-bottom": "1em"}),
        $("<br />"),
        $("<button />", {
            text: 'Connexion',
            class: 'btn btn-primary',
            type: "submit",
        }).css({"margin-bottom": "2em"})
    );

//formulaire d'inscription pour le modal
let inscription =
    $("<div />", {id: "removeinsc"})
        .append(
            $("<div />", {
                id: "erreur"
            }),
            $("<div />", {
                class: "form-group"
            })
                .append(
                    $("<label />").text("Pseudo"),
                    $("<input />", {
                        name: "login",
                        type: "text",
                        class: "form-control",
                        placeholder: "Entrez votre pseudo"
                    })
                ),
            $("<div />", {
                class: "form-group"
            })
                .append(
                    $("<label />").text("Mot de passe"),
                    $("<input />", {
                        name: "pass1",
                        type: "password",
                        class: "form-control",
                        placeholder: "Entrez votre mot de passe"
                    })
                ),
            $("<div />", {
                class: "form-group"
            })
                .append(
                    $("<label />").text("Entrez votre mot de passe à nouveau"),
                    $("<input />", {
                        name: "pass2",
                        type: "password",
                        class: "form-control",
                        placeholder: "Entrez le même mot de passe"
                    })
                ),
            $("<div />", {
                class: "form-group"
            })
                .append(
                    $("<label />").text("Entrez votre mail"),
                    $("<input />", {
                        name: "mail",
                        type: "email",
                        class: "form-control",
                        placeholder: "Entrez votre email"
                    })
                ),
            $("<div />", {
                class: "form-group"
            })
                .append(
                    $("<label />").text("Entrer votre nom"),
                    $("<input />", {
                        name: "name",
                        type: "text",
                        class: "form-control",
                        placeholder: "Entrez votre nom"
                    })
                ),
            $("<button />", {
                name: "action",
                type: "submit",
                class: "btn btn-primary",
                text: "Inscription"
            }).css({"margin-bottom": "2em"}),

            $("<div />", {
                text: 'Retour',
                class: 'btn btn-dark',
                id: "retour"
            }).css({"margin-left": "1em", "margin-bottom": "2em"}),
        );

//clignotement du texte dans connexion
let fadeConnection = function () {
    let vrai = true;
    if (vrai) {
        $("#connection").fadeIn(1000, function () {
            $("#connection").fadeOut(1000, function () {
                if (vrai) {
                    fadeConnection();
                }
            });

        });
    }
};

//action du bouton retour dans le modal
let retour = function () {
    modalInsc();
    $("#retour").click(function () {
        $("#erreurinsc").remove();
        $("#removeinsc").remove();
        modalConnec();
        $("#inscription").click(function () {
            retour();
        })
    });
};

//modal contenant le formulaire de connexion
let modalConnec = function () {
    $("#formconnec").append(modal);
    $("#bodymodal").append($("<div />", {
        id: "erreur"
    }), connexion);
};

//modal contenant le formulaire d'inscription
let modalInsc = function () {
    $("#erreur").remove();
    $("#formulaire").remove();
    $("#forminsc").append(modal);
    $("#bodymodal").append($("<div />", {
        id: "erreurinsc"
    }), inscription);

};

//modal de base
let modal = $("<div />", {
    class: "modal fade",
    id: "myModal",
    role: "dialog"
})
    .append(
        $("<div />", {
            class: "modal-dialog"
        })
            .append(
                $("<div />", {
                    class: "modal-content"
                })
                    .append(
                        $("<div />", {
                            class: "modal-header",
                            id: "connection"
                        }).text("Connectez-vous pour naviguez sur le site").css({"font-size": "1.5em"}),
                        $("<div />", {
                                class: "modal-body",
                                id: "bodymodal"
                            }
                        )
                    )
            )
    );

//bar de navigation
let navbar = function() {
    $("#navbar").append(
        $("<nav />", {
            class: "navbar navbar-expand-lg navbar-dark",
            id: "test"
        }).append(
            $("<a />", {
                class: "navbar-brand",
                href: "Accueil"
            }).text("SharePics").css({
                "font-size": "3em",
                "color": "white",
                "font-family": "Droid Sans"
            }),
            $("<div />", {
                class: "collapse navbar-collapse"
            })
                .append(
                    $("<ul />", {
                        class: "navbar-nav mr-auto"
                    }).css({
                        "font-size": "1.3em",
                        "font-family": "Droid Sans"
                    })
                        .append(
                            $("<li />", {
                                class: "nav-item"
                            }),
                            $("<li />", {
                                class: "nav-item"
                            })
                                .append(
                                    $("<button />", {
                                        class: "btn btn-dark",
                                        "data-toggle": "modal",
                                        "data-target":"#modal-add-pic"
                                    }).text("Upload une image").css("cursor", "crosshair")
                                )
                        ),
                    $("<a />", {
                        class: "btn btn-outline-light",
                        role: "button",
                        href: "MonCompte"
                    }).text("Mon compte").css({"margin-right": "2%"}),
                    $("<button />", {
                        name: "destroy",
                        type: "submit",
                        class: "btn btn-outline-light",
                        id: 'destroy'
                    }).text("Déconnexion")
                )
        )
    )
};