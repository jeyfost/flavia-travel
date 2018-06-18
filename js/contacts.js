/**
 * Created by jeyfost on 27.12.2017.
 */

$(window).on("scroll", function () {
   if($(window).scrollTop() > 10) {
       $('#menuInner').css("background-color", "#fff");
       $('#menuInner').height(60);
       $('#logoIMG').width(50);
       $('#logoIMG').height(50);
       document.getElementById("logoIMG").src = "/img/system/logoPurple.png";

       $('#mpNews').css("color", "#282828");
       $('#mpReviews').css("color", "#282828");
       $('#mpPhone').css("color", "#282828");
       $('#mpEmail').css("color", "#282828");

       $('#mpNews').css("border-right", "1px solid #282828");
       $('#mpReviews').css("border-right", "1px solid #282828");
       $('#mpContacts').css("border-right", "1px solid #282828");
       $('#mpPhone').css("border-right", "1px solid #282828");

       $('#mpNews').css("margin-top", "20px");
       $('#mpReviews').css("margin-top", "20px");
       $('#mpContacts').css("margin-top", "20px");
       $('#mpPhone').css("margin-top", "20px");
       $('#mpEmail').css("margin-top", "20px");
   } else {
       $('#menuInner').css("background-color", "#191919");
       $('#menuInner').height(70);
       $('#logoIMG').width(60);
       $('#logoIMG').height(60);
       document.getElementById("logoIMG").src = "/img/system/logoWhite.png";

       $('#mpNews').css("color", "#fff");
       $('#mpReviews').css("color", "#fff");
       $('#mpPhone').css("color", "#fff");
       $('#mpEmail').css("color", "#fff");

       $('#mpNews').css("border-right", "1px solid #fff");
       $('#mpReviews').css("border-right", "1px solid #fff");
       $('#mpContacts').css("border-right", "1px solid #fff");
       $('#mpPhone').css("border-right", "1px solid #fff");

       $('#mpNews').css("margin-top", "25px");
       $('#mpReviews').css("margin-top", "25px");
       $('#mpContacts').css("margin-top", "25px");
       $('#mpPhone').css("margin-top", "25px");
       $('#mpEmail').css("margin-top", "25px");
   }
});

$(window).on("load", function () {
   $('input[id!="messageButton"]').width(parseInt($('#contactForm').width() - 15));
   $('textarea').width(parseInt($('#contactForm').width() - 15));

    $('form').submit(function () {
        return false;
    });
});

$(window).on("resize", function () {
   $('input[id!="messageButton"]').width(parseInt($('#contactForm').width() - 15));
   $('textarea').width(parseInt($('#contactForm').width() - 15));
});

$(document).on("ready", function () {
    $(window).on("keydown", function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

function sendEmail() {
    var name = $('#nameInput').val();
    var phone = $('#phoneInput').val();
    var email = $('#emailInput').val();
    var text = $('#messageInput').val();
    var formData = new FormData($('#contactForm').get(0));

    if(name !== '') {
        if(email !== '') {
            $.ajax({
               type: "POST",
               data: {"email": email},
               url: "/scripts/ajaxEmailValidation.php",
               success: function (response) {
                   if(response === "ok") {
                       if(phone !== '') {
                           if(text !== '') {
                               $.ajax({
                                   type: "POST",
                                   data: formData,
                                   dataType: "json",
                                   processData: false,
                                   contentType: false,
                                   url: "/scripts/ajaxSendMessage.php",
                                   success: function (result) {
                                       switch (result) {
                                           case "ok":
                                               $.notify("Ваше сообщение отправлено. Мы скоро вам ответим.", "success");

                                               $('#nameInput').val("");
                                               $('#emailInput').val("");
                                               $('#phoneInput').val("");
                                               $('#messageInput').val("");

                                               textAreaHeight(document.getElementById("messageInput"));
                                               break;
                                           case "captcha":
                                               $.notify("Вы не прошли тест на робота. Попробуйте снова.", "error");
                                               break;
                                           case "failed":
                                               $.notify("При отправке сообщения произошла ошибка. Попробуйте снова.", "error");
                                               break;
                                           default:
                                               $.notify(result, "warn");
                                               break;
                                       }
                                   }
                               });
                           } else {
                               $.notify("Вы не ввели текст сообщения.", "error");
                           }
                       } else {
                           $.notify("Вы ввели свой номер телефона.", "error");
                       }
                   } else {
                       $.notify("Вы ввели email недопустимого формата.", "error");
                   }
               }
            });
        } else {
            $.notify("Вы не ввели свой email.", "error");
        }
    } else {
        $.notify("Вы не ввели своё имя.", "error");
    }
}

function textAreaHeight(textarea) {
    if (!textarea._tester) {
        var ta = textarea.cloneNode();
        ta.style.position = 'absolute';
        ta.style.zIndex = 2000000;
        ta.style.visibility = 'hidden';
        ta.style.height = '1px';
        ta.id = '';
        ta.name = '';
        textarea.parentNode.appendChild(ta);
        textarea._tester = ta;
        textarea._offset = ta.clientHeight - 1;
    }
    if (textarea._timer) clearTimeout(textarea._timer);
    textarea._timer = setTimeout(function () {
        textarea._tester.style.width = textarea.clientWidth + 'px';
        textarea._tester.value = textarea.value;
        textarea.style.height = (textarea._tester.scrollHeight - textarea._offset) + 'px';
        textarea._timer = false;
    }, 1);
}