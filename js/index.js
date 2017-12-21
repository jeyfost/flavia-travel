/**
 * Created by jeyfost on 19.12.2017.
 */

var SLIDER_TIME = 8000;
var timer;

$(window).on("load", function () {
    autoslide(SLIDER_TIME);

    $('.promoButton').on("click", function (e) {
        $('html, body').animate({
            scrollTop: $('.tours').offset().top
        }, 300);

        e.preventDefault();
        return false;
    });

    $('.sliderButton').on("mouseover", function () {
        $(this).css("opacity", ".5");
    });

    $('.sliderButton').on("mouseout", function () {
        $(this).css("opacity", "1");
    });
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
            text = '<span class="sloganBigFont">Отправляйтесь в лучшее<br />путешествие в вашей жизни</span><br /><br /><span class="sloganSmallFont">Мы предлагаем туристические услуги самого высокого качества, сочетая нашу энергию и энтузиазм с многолетним опытом.</span><br /><br /><button class="promoButton"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>';

            $('#button1').attr("onclick", "");
            $('#button2').attr("onclick", "selectSlide(2)");
            $('#button3').attr("onclick", "selectSlide(3)");
            break;
        case 2:
            text = '<span class="sloganBigFont">Сотни удивительных<br />направлений</span><br /><br /><span class="sloganSmallFont">Мы отобрали сотни самых впечатляющих мест по всему миру. Подарите себе и своим близким отдых в самых разных уголках мира.</span><br /><br /><button class="promoButton"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>';

            $('#button2').attr("onclick", "");
            $('#button1').attr("onclick", "selectSlide(1)");
            $('#button3').attr("onclick", "selectSlide(3)");
            break;
        case 3:
            text = '<span class="sloganBigFont">Открывайте мир<br />вместе с нами</span><br /><br /><span class="sloganSmallFont">Наши туристические агенты — идеальные компаньоны, когда речь идет о выборе будущего места для отдыха. Вы можете полностью им доверять!</span><br /><br /><button class="promoButton"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>';

            $('#button3').attr("onclick", "");
            $('#button1').attr("onclick", "selectSlide(1)");
            $('#button2').attr("onclick", "selectSlide(2)");
            break;
        default:
            text = '<span class="sloganBigFont">Отправляйтесь в лучшее<br />путешествие в вашей жизни</span><br /><br /><span class="sloganSmallFont">Мы предлагаем туристические услуги самого высокого качества, сочетая нашу энергию и энтузиазм с многолетним опытом.</span><br /><br /><button class="promoButton"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>';

            $('#button1').attr("onclick", "");
            $('#button2').attr("onclick", "selectSlide(2)");
            $('#button3').attr("onclick", "selectSlide(3)");
            break;
    }

    $('.slogan').css("opacity", "0");
    $('#button' + prevSlide).attr("class", "sliderButton");
    $('#button' + slide).attr("class", "sliderButton selected");
    $('#index').attr("class", slide);
    $('#index').css("background-image", "url(/img/system/slide-0" + slide + ".jpg)");

    setTimeout(function () {
        $('.slogan').html(text);
        $('.slogan').css("opacity", "1");
    }, 300);
}