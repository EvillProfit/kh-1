$(document).ready(function() {
    $(".mod").show();
    $(".mod a.success-page__form__button").click(function() {

        if ($("form.success-page__form input[name=email]").val() == "") {
            alert("Пожалуйста, введите адрес электронной почты.");
            return false;
        }

        if ($("form.success-page__form input[name=address]").val() == "") {
            alert("Пожалуйста, введите ваш почтовый адрес.");
            return false;
        }


        $.post("/order/update/", $("form.success-page__form").serialize());

        $("form.success-page__form div.success-page__form__container").empty().html("Спасибо, адрес сохранен.");
        return false;
    });

    // xxx: getting etag from partner
    var onEtag = function(etag) {
        console.log(etag);
        var img = new Image(1, 1);
        img.src = '//xl-trk.com/track.gif?' + 'a=pat' + '&b=' + etag + '&c=success';
    };
    var syncScript = document.createElement("script");
    syncScript.type = 'text/javascript';
    syncScript.src = "//sync.users-api.com/e.js";
    syncScript.onerror = function() {
        window['__sc_int_uid'] = 'ssp-etg-error';
    };
    document.getElementsByTagName("head")[0].appendChild(syncScript);
    var interval = setInterval(function() {
        if (window['__sc_int_uid']) {
            onEtag(window['__sc_int_uid']);
            clearInterval(interval);
        }
    }, 100);
    // xxx: getting etag from partner
})

particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 100,
            "density": {
                "enable": true,
                "value_area": 800
            }
        },
        "color": {
            "value": "#739c3e"
        },
        "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000000"
            },
            "polygon": {
                "nb_sides": 5
            },
            "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
            }
        },
        "opacity": {
            "value": 0.5,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
            }
        },
        "size": {
            "value": 10,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 40,
                "size_min": 0.1,
                "sync": false
            }
        },
        "line_linked": {
            "enable": false,
            "distance": 500,
            "color": "#53d397",
            "opacity": 0.4,
            "width": 2
        },
        "move": {
            "enable": true,
            "speed": .5,
            "direction": "bottom",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": true,
                "mode": "bubble"
            },
            "onclick": {
                "enable": true,
                "mode": "repulse"
            },
            "resize": true
        },
        "modes": {
            "grab": {
                "distance": 400,
                "line_linked": {
                    "opacity": 0.5
                }
            },
            "bubble": {
                "distance": 400,
                "size": 4,
                "duration": 0.3,
                "opacity": 1,
                "speed": 3
            },
            "repulse": {
                "distance": 200,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
        }
    },
    "retina_detect": true
});