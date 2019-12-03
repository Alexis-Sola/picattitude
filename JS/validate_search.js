let card_image = function (title, desc, login, date, name) {

    $("#cardshow").append($("<div />", {
            class: "card card-size"
        })
            .append($("<div />", {
                    class: "view"
                })
                    .append($("<img />", {
                            class: "card-img-bottom",
                            src: "/image/" + name
                        }),
                        $("<a />", {
                            href: "/image/" + name
                        })
                            .append($("<div />", {
                                class: "mask rgba-white-slight"
                            }))
                    ), $("<div />", {
                    class: "card-body card-body-cascade"
                }).append($("<h4 />", {
                    class: "card-title",
                    text: title
                }), $("<p />", {
                    class: "card-text",
                    text: desc
                }), $("<p />", {
                    class: "card-text"
                }).text("Posté par " +  login + " le " + date)
                , $("<a />", {
                    class: "btn btn-dark btn-lg btn-block",
                    href: "/image/" + name,
                    text: "Voir l\'image"
                })
                )
            )
    )

};

$(document).ready(function () {
    $("#form-search").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
        }).done(function (data) {
            $("#cardshow").empty();
            $("table").empty();
            for (let i = 0; i < data.length; i++) {
                card_image(data[i]['title'], data[i]['description'], data[i]['pseudo'], data[i]['upload_date'], data[i]['pic_name'])
            }
        });
    });
});