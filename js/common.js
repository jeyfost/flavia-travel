$(window).on("load", function () {
  if($('*').is('#screenSpace')) {
      $('#screenSpace').height($(window).height());
  }
});

function fontColor(action, id) {
    if($('*').is('#menu')) {
        if(action === 1) {
            $('#' + id).css("color", "#ff6030");
        } else {
            if($('#menu').css("background-color") === "rgb(255, 255, 255)" || $('#menu').css("background-color") === "#fff") {
                $('#' + id).css("color", "#000");
            } else {
                $('#' + id).css("color", "#fff");
            }
        }
    }

    if($('*').is('#menuInner')) {
        if(action === 1) {
            $('#' + id).css("color", "#ff6030");
        } else {
            if($('#menuInner').css("background-color") === "rgb(255, 255, 255)" || $('#menuInner').css("background-color") === "#fff") {
                $('#' + id).css("color", "#000");
            } else {
                $('#' + id).css("color", "#fff");
            }
        }
    }
}

function scrollToTop() {
    $('html, body').animate({scrollTop: 0}, 500);
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("scroll").style.display = "block";
    } else {
        document.getElementById("scroll").style.display = "none";
    }
}

function changeIcon(id, action) {
    if(action === 1) {
        document.getElementById(id).src = "/img/system/" + id + "-color.png";
    } else {
        document.getElementById(id).src = "/img/system/" + id + ".png";
    }
}

function sendReview() {
    var inst = $('[data-remodal-id=modal]').remodal();

    var name = $('#nameInput').val();
    var email = $('#emailInput').val();
    var text = $('#textInput').val();

    var formData = new FormData($('#modalForm').get(0));

    if(name !== '') {
        if(email !== '') {
            $.ajax({
                type: "POST",
                data: {"email": email},
                url: "/scripts/ajaxEmailValidation.php",
                success: function (validity) {
                    if(validity === "ok") {
                        if(text !== '') {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                data: formData,
                                url: "/scripts/ajaxAddReview.php",
                                beforeSend: function () {
                                    $.notify("Ваш отзыв отправляется...", "info");
                                },
                                success: function (response) {
                                    switch(response) {
                                        case "ok":
                                            $.notify("Спасибо! Отзыв был успешно отправлен.", "success");
                                            inst.close();
                                            break;
                                        case "failed":
                                            $.notify("Во время отправления отзыва произошла ошибка. Попробуйте снова.", "error");
                                            break;
                                        default:
                                            $.notify(response, "warn");
                                            break;
                                    }
                                }
                            });
                        } else {
                            $.notify("Вы не ввели текст отзыва", "error");
                        }
                    } else {
                        $.notify("Вы ввели email неверного формата", "error");
                    }
                }
            });
        } else {
            $.notify("Вы не ввели email", "error");
        }
    } else {
        $.notify("Вы не ввели имя", "error");
    }
}

$(function() {
    $("body").css({padding:0,margin:0});

    var f = function() {
        $(".ndra-container").css({position:"relative"});

        var h1 = $("body").height();
        var h2 = $(window).height();
        var d = h2 - h1;
        var ruler = $("<div>").appendTo(".ndra-container");

        var h = $(".ndra-container").height() + d;

        h = Math.max(ruler.position().top, h);

        ruler.remove();

        $(".ndra-container").height(h);
    };

    setInterval(f, 1000);

    $(window).resize(f);

    f();
});