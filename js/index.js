/**
 * Created by jeyfost on 19.12.2017.
 */

var SLIDER_TIME = 8000;
var timer;

$(window).on("load", function () {
    clearTimeout(timer);
    autoslide(SLIDER_TIME);

    $('.promoButton').on("click", function (e) {
        scrollToToursSearch(e);
    });

    $('.sliderButton').on("mouseover", function () {
        $(this).css("opacity", ".5");
    });

    $('.sliderButton').on("mouseout", function () {
        $(this).css("opacity", "1");
    });

    $('#bottomPromo').height(parseInt($('#footer').offset().top - $('#bottomPromo').offset().top));

    if($(window).width() < 320) {
        $('#screenSpace').height(parseInt($('#screenSpace').height() + 150));
        $('.overlay').height(parseInt($('.overlay').height() + 150));
    }
});

$(window).on("scroll", function () {
   if($(window).scrollTop() > 10) {
       $('#menu').css("background-color", "#fff");
       $('#menu').height(60);
       $('#menu').css("box-shadow", "0 5px 6px -4px rgba(0, 0, 0, 0.17)");
       $('#logoIMG').width(50);
       $('#logoIMG').height(50);
       document.getElementById("logoIMG").src = "/img/system/logoPurple.png";

       $('#mpNews').css("color", "#282828");
       $('#mpContacts').css("color", "#282828");
       $('#mpPhone').css("color", "#282828");
       $('#mpEmail').css("color", "#282828");

       $('#mpNews').css("border-right", "1px solid #282828");
       $('#mpContacts').css("border-right", "1px solid #282828");
       $('#mpPhone').css("border-right", "1px solid #282828");

       $('#mpNews').css("margin-top", "20px");
       $('#mpContacts').css("margin-top", "20px");
       $('#mpPhone').css("margin-top", "20px");
       $('#mpEmail').css("margin-top", "20px");
   } else {
       $('#menu').css("background-color", "transparent");
       $('#menu').height(70);
       $('#menu').css("box-shadow", "none");
       $('#logoIMG').width(60);
       $('#logoIMG').height(60);
       document.getElementById("logoIMG").src = "/img/system/logoWhite.png";

       $('#mpNews').css("color", "#fff");
       $('#mpContacts').css("color", "#fff");
       $('#mpPhone').css("color", "#fff");
       $('#mpEmail').css("color", "#fff");

       $('#mpNews').css("border-right", "1px solid #fff");
       $('#mpContacts').css("border-right", "1px solid #fff");
       $('#mpPhone').css("border-right", "1px solid #fff");

       $('#mpNews').css("margin-top", "25px");
       $('#mpContacts').css("margin-top", "25px");
       $('#mpPhone').css("margin-top", "25px");
       $('#mpEmail').css("margin-top", "25px");
   }
});

function autoslide(time) {
    timer = setInterval(function () {
        var slide = parseInt($('#index').attr("class"));

        slide++;

        if(slide > 3) {
            slide = 1;
        }

        selectSlide(slide);
    }, time);
}

function selectSlide(slide) {
    var text = "";
    var prevSlide = parseInt($('#index').attr("class"));

    clearTimeout(timer);
    autoslide(SLIDER_TIME);

    switch (slide) {
         case 1:
            text = '<span class="sloganBigFont">Отправляйтесь в лучшее<br />путешествие в вашей жизни</span><br /><br /><span class="sloganSmallFont">Мы предлагаем туристические услуги самого высокого качества, сочетая нашу энергию и энтузиазм с многолетним опытом.</span><br /><br /><button class="promoButton" onclick="scrollToToursSearch()"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>';

            $('#button1').attr("onclick", "");
            $('#button2').attr("onclick", "selectSlide(2)");
            $('#button3').attr("onclick", "selectSlide(3)");
            break;
        case 2:
            text = '<span class="sloganBigFont">Сотни удивительных<br />направлений</span><br /><br /><span class="sloganSmallFont">Мы отобрали сотни самых впечатляющих мест по всему миру. Подарите себе и своим близким отдых в самых разных уголках мира.</span><br /><br /><button class="promoButton" onclick="scrollToToursSearch()"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>';

            $('#button2').attr("onclick", "");
            $('#button1').attr("onclick", "selectSlide(1)");
            $('#button3').attr("onclick", "selectSlide(3)");
            break;
        case 3:
            text = '<span class="sloganBigFont">Открывайте мир<br />вместе с нами</span><br /><br /><span class="sloganSmallFont">Наши туристические агенты — идеальные компаньоны, когда речь идет о выборе будущего места для отдыха. Вы можете полностью им доверять!</span><br /><br /><button class="promoButton" onclick="scrollToToursSearch()"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>';

            $('#button3').attr("onclick", "");
            $('#button1').attr("onclick", "selectSlide(1)");
            $('#button2').attr("onclick", "selectSlide(2)");
            break;
        default:
            text = '<span class="sloganBigFont">Отправляйтесь в лучшее<br />путешествие в вашей жизни</span><br /><br /><span class="sloganSmallFont">Мы предлагаем туристические услуги самого высокого качества, сочетая нашу энергию и энтузиазм с многолетним опытом.</span><br /><br /><button class="promoButton" onclick="scrollToToursSearch()"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>';

            $('#button1').attr("onclick", "");
            $('#button2').attr("onclick", "selectSlide(2)");
            $('#button3').attr("onclick", "selectSlide(3)");
            break;
    }

    $('.slogan').css("opacity", "0");
    $('#button' + prevSlide).attr("class", "sliderButton");
    $('#button' + slide).attr("class", "sliderButton selected");
    $('#index').attr("class", slide);
    $('#index').css("background-image", "url(/img/slides/slide-0" + slide + ".jpg)");

    setTimeout(function () {
        $('.slogan').html(text);
        $('.slogan').css("opacity", "1");
    }, 300);
}

function scrollToToursSearch(e) {
    $('html, body').animate({
        scrollTop: parseInt($('.tours').offset().top - 10)
    }, 300);

    e.preventDefault();
    return false;
}

function changeLogo(id, action) {
    if(action === 1) {
        document.getElementById(id).src = "/img/logo/" + id + "-logo-original.png";
    } else {
        document.getElementById(id).src = "/img/logo/" + id + "-logo-grey.png";
    }
}

function newsButtonColor(id, color, action) {
    if(action === 1) {
        $('#' + id).css("background-color", "#" + color);
        $('#' + id).css("color", "#fff");
    } else {
        $('#' + id).css("background-color", "transparent");
        $('#' + id).css("color", "#191919");
    }
}