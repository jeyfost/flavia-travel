<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
	<meta name="keywords" content="" />

    <title>Туристическое агенство Flavia-travel</title>

    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/manifest.json">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="/libs/revealator-master/fm.revealator.jquery.css" />
    <link rel="stylesheet" href="/libs/font-awesome-4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/css/fonts.css" />
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/media.css" />

    <link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat|Istok+Web" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/libs/revealator-master/fm.revealator.jquery.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
    <script type="text/javascript" src="/js/index.js"></script>

    <style>
		#page-preloader {position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: #fff; z-index: 100500;}
		#page-preloader .spinner {width: 32px; height: 32px; position: absolute; left: 50%; top: 50%; background: url('/img/system/spinner.gif') no-repeat 50% 50%; margin: -16px 0 0 -16px;}
	</style>

    <script type="text/javascript">
        $(window).on('load', function () {
            var $preloader = $('#page-preloader'), $spinner = $preloader.find('.spinner');
            $spinner.delay(500).fadeOut();
            $preloader.delay(850).fadeOut();
        });
    </script>

    <!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</head>
<body id="index" class="1">

    <div id="page-preloader"><span class="spinner"></span></div>

    <div id="menu">
        <div id="logo"><a href="/"><img src="/img/system/logoWhite.png" id="logoIMG" /></a></div>
        <div id="menuContent">
            <a href="mailto: flavia-travel@mail.ru"><div class="menuPoint noBorder" id="mpEmail" onmouseover="fontColor(1, 'mpEmail')" onmouseout="fontColor(2, 'mpEmail')"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;flavia-travel@mail.ru</div></a>
            <a href="tel: +375222745444"><div class="menuPoint" id="mpPhone" onmouseover="fontColor(1, 'mpPhone')" onmouseout="fontColor(2, 'mpPhone')"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;+375 222 74-54-44</div></a>
            <a href="/contacts"><div class="menuPoint" id="mpContacts" onmouseover="fontColor(1, 'mpContacts')" onmouseout="fontColor(2, 'mpContacts')">Контакты</div></a>
            <a href="/news"><div class="menuPoint" id="mpNews" onmouseover="fontColor(1, 'mpNews')" onmouseout="fontColor(2, 'mpNews')">Новости</div></a>
        </div>
        <div class="clear"></div>
    </div>

    <div id="screenSpace">
        <div class="clouds"></div>
        <div class="clear"></div>
        <div class="overlay"></div>
        <div class="slogan revealator-slideup revealator-load revealator-delay12">
            <span class="sloganBigFont">Отправляйтесь в лучшее<br />путешествие в вашей жизни</span>
            <br /><br />
            <span class="sloganSmallFont">Мы предлагаем туристические услуги самого высокого качества, сочетая нашу энергию и энтузиазм с многолетним опытом.</span>
            <br /><br />
            <button class="promoButton"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>
        </div>
        <div class="sliderButtons">
            <div class="sliderButton selected" id="button1"></div>
            <div class="sliderButton" id="button2" onclick="selectSlide(2)" style="margin-left: 10px;"></div>
            <div class="sliderButton" id="button3" onclick="selectSlide(3)" style="margin-left: 10px;"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="tours">
        <div class="header">
            <br /><br />
            <span class="headerFont">Поиск тура</span>
            <br /><br /><br />
            <iframe scrolling="no" width="100%" frameborder="0" id="www.2345.by"
                    src="http://2345.by/?Module=true&Module_City=%D0%9C%D0%B8%D0%BD%D1%81%D0%BA&Module_Country=%D0%95%D0%B3%D0%B8%D0%BF%D0%B5%D1%82&Module_DatesRange=auto1&Module_NightsFrom=7&Module_NightsTo=11&Module_Adults=2&Module_Childs=0&Module_AgeChd1=4&Module_AgeChd2=7&Module_StarsFrom=2*&Module_PansionFrom=RO&Module_AviaWarranty=true&Module_HotelWarranty=false&Module_HideOperators=true&Module_AutoStart=false&Module_NationalCurrency=BYN&Module_CurrencyMode=real_currency&Module_PriceCorrection=0&Module_ImageIsLogo=true&Module_AviaDetails=true&Module_HotelDonor=Booking&Module_Phone=%2B375%20222%2074-54-44&Module_Font=Tahoma&Module_BgColor=%23f3f4f7&Module_HrefColor=%23ff6030&Module_Color1=%234d009a&Module_Color2=%23ff6030&Module_NameForTab1=%D0%A2%D1%83%D1%80%D1%8B%20%D0%BE%D1%82%20Flavia-travel&Module_NameForTab2=%D0%91%D0%B8%D0%BB%D0%B5%D1%82%D1%8B%2C%20%D0%BC%D0%B5%D1%81%D1%82%D0%B0%2C%20%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%D0%B0&Module_NameForTab3=%D0%94%D0%BB%D1%8F%20%D0%BA%D0%BB%D0%B8%D0%B5%D0%BD%D1%82%D0%BE%D0%B2&Module_IconForTab1=fa-plane&Module_IconForTab2=fa-gear&Module_IconForTab3=fa-bullhorn&Module_TxtUrl1=https%3A%2F%2Fairlab.by%2Fdemo%2Fflavia-travel%2Ffiles%2Finfo.txt&Module_TxtUrl2=http%3A%2F%2F2345.by%2Fup%2Fcall.txt&Module_BgUrl=https%3A%2F%2Fairlab.by%2Fdemo%2Fflavia-travel%2Fimg%2Fsystem%2Ftours-search-bg.jpg&Module_ImageUrl=&Module_Cities=%D0%91%D1%80%D0%B5%D1%81%D1%82%2C%D0%92%D0%B0%D1%80%D1%88%D0%B0%D0%B2%D0%B0%2C%D0%92%D0%B8%D0%BB%D1%8C%D0%BD%D1%8E%D1%81%2C%D0%92%D0%B8%D1%82%D0%B5%D0%B1%D1%81%D0%BA%2C%D0%93%D0%BE%D0%BC%D0%B5%D0%BB%D1%8C%2C%D0%9A%D0%B8%D0%B5%D0%B2%2C%D0%9C%D0%B8%D0%BD%D1%81%D0%BA%2C%D0%9C%D0%BE%D0%B3%D0%B8%D0%BB%D0%B5%D0%B2%2C%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0&Module_Countries=%D0%90%D0%B1%D1%85%D0%B0%D0%B7%D0%B8%D1%8F%2C%D0%90%D0%B2%D1%81%D1%82%D1%80%D0%B8%D1%8F%2C%D0%90%D0%BB%D0%B1%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%90%D0%BD%D0%B3%D0%BB%D0%B8%D1%8F%2C%D0%91%D0%BE%D0%BB%D0%B3%D0%B0%D1%80%D0%B8%D1%8F%2C%D0%91%D1%80%D0%B0%D0%B7%D0%B8%D0%BB%D0%B8%D1%8F%2C%D0%92%D0%B5%D0%BD%D0%B3%D1%80%D0%B8%D1%8F%2C%D0%92%D1%8C%D0%B5%D1%82%D0%BD%D0%B0%D0%BC%2C%D0%93%D0%B5%D1%80%D0%BC%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%93%D1%80%D0%B5%D1%86%D0%B8%D1%8F%2C%D0%93%D1%80%D1%83%D0%B7%D0%B8%D1%8F%2C%D0%94%D0%BE%D0%BC%D0%B8%D0%BD%D0%B8%D0%BA%D0%B0%D0%BD%D0%B0%2C%D0%95%D0%B3%D0%B8%D0%BF%D0%B5%D1%82%2C%D0%98%D0%B7%D1%80%D0%B0%D0%B8%D0%BB%D1%8C%2C%D0%98%D0%BD%D0%B4%D0%B8%D1%8F%2C%D0%98%D0%BD%D0%B4%D0%BE%D0%BD%D0%B5%D0%B7%D0%B8%D1%8F%2C%D0%98%D0%BE%D1%80%D0%B4%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%98%D1%81%D0%BF%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%98%D1%82%D0%B0%D0%BB%D0%B8%D1%8F%2C%D0%9A%D0%B5%D0%BD%D0%B8%D1%8F%2C%D0%9A%D0%B8%D0%BF%D1%80%2C%D0%9A%D0%B8%D1%82%D0%B0%D0%B9%2C%D0%9A%D1%83%D0%B1%D0%B0%2C%D0%9B%D0%B0%D1%82%D0%B2%D0%B8%D1%8F%2C%D0%9B%D0%B8%D1%82%D0%B2%D0%B0%2C%D0%9C%D0%B0%D0%B2%D1%80%D0%B8%D0%BA%D0%B8%D0%B9%2C%D0%9C%D0%B0%D0%BB%D1%8C%D0%B4%D0%B8%D0%B2%D1%8B%2C%D0%9C%D0%B0%D0%BB%D1%8C%D1%82%D0%B0%2C%D0%9C%D0%B0%D1%80%D0%BE%D0%BA%D0%BA%D0%BE%2C%D0%9C%D0%B5%D0%BA%D1%81%D0%B8%D0%BA%D0%B0%2C%D0%9E%D0%90%D0%AD%2C%D0%9F%D0%BE%D0%BB%D1%8C%D1%88%D0%B0%2C%D0%9F%D0%BE%D1%80%D1%82%D1%83%D0%B3%D0%B0%D0%BB%D0%B8%D1%8F%2C%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F%2C%D0%A1%D0%B5%D0%B9%D1%88%D0%B5%D0%BB%D1%8B%2C%D0%A1%D0%BB%D0%BE%D0%B2%D0%B0%D0%BA%D0%B8%D1%8F%2C%D0%A2%D0%B0%D0%B8%D0%BB%D0%B0%D0%BD%D0%B4%2C%D0%A2%D0%B0%D0%BD%D0%B7%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%A2%D1%83%D0%BD%D0%B8%D1%81%2C%D0%A2%D1%83%D1%80%D1%86%D0%B8%D1%8F%2C%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0%2C%D0%A4%D0%B8%D0%BB%D0%B8%D0%BF%D0%BF%D0%B8%D0%BD%D1%8B%2C%D0%A4%D0%B8%D0%BD%D0%BB%D1%8F%D0%BD%D0%B4%D0%B8%D1%8F%2C%D0%A4%D1%80%D0%B0%D0%BD%D1%86%D0%B8%D1%8F%2C%D0%A5%D0%BE%D1%80%D0%B2%D0%B0%D1%82%D0%B8%D1%8F%2C%D0%A7%D0%B5%D1%80%D0%BD%D0%BE%D0%B3%D0%BE%D1%80%D0%B8%D1%8F%2C%D0%A7%D0%B5%D1%85%D0%B8%D1%8F%2C%D0%A8%D0%B2%D0%B5%D0%B9%D1%86%D0%B0%D1%80%D0%B8%D1%8F%2C%D0%A8%D0%B2%D0%B5%D1%86%D0%B8%D1%8F%2C%D0%A8%D1%80%D0%B8%D0%9B%D0%B0%D0%BD%D0%BA%D0%B0&Module_Operators=alatan%2Cabstour%2Cairtravel%2Cbalkan%2Cbelorientir%2Cbitour%2Cbg%2Cvilar%2Cvtour%2Cdanko%2Cjoinup%2Ckipr%2Cltours%2Cmouzenidis%2Cnatalie%2Cpac%2Cpegas%2Cpodevus%2Crosting%2Csunny%2Csft%2Csmok%2Csolvex%2Csolemare%2Ctusson%2Ctez%2Ctoptour%2Ctrade">
                <div class="DoNotRemoveOrEditThisCopyrightBlock">© Программное обеспечение <a href="http://2345.by/">2345.BY</a>"
                    - все права защищены. Программное обеспечение 2345.BY распространяется по лицензии FREEWARE (за
                    пользование программным обеспечением 2345.BY не нужно платить деньги). Программное обеспечение
                    2345.BY может быть использовано для извлечения прибыли туристическими компаниями. Запрещено
                    коммерческое распространение программного обеспечения 2345.BY, распространение без ссылки на
                    лицензионное соглашение. Полный текст лицензионного соглашения доступен по адресу: <a
                            href="http://2345.by/up/licence.txt">2345.by/up/licence.txt</a> ©
                </div>
            </iframe>
            <script type="text/javascript" src="http://2345.by/js/frame_resizer_js/iframeResizer.min.js"></script>
            <script type="text/javascript">iFrameResize({widthCalculationMethod: "scroll"});</script>
        </div>
        <div class="clear"></div>

        <div class="section grey" style="text-align: center;">
            <div class="header">
                <br /><br />
                <span class="headerFont">Почему мы?</span>
                <br /><br /><br /><br />
                <div class="container">
                    <div class="column first">
                        <img src="/img/system/service-icon.png" />
                        <br />
                        <span class="headerFont small">Лучший сервис</span>
                        <p>Наша цель - предоставить вам туристическое обслуживание высшего качества, и мы сделаем все возможное, чтобы найти подходящий тур для вас.</p>
                    </div>
                    <div class="column">
                        <img src="/img/system/all-included-icon.png" />
                        <br />
                        <span class="headerFont small">Всё включено</span>
                        <p>Есть десятки аспектов, на которые нужно обратить внимание, организуя поездку, и мы будем следить за тем, чтобы ваш тур включал все, что вам нужно.</p>
                    </div>
                    <div class="column">
                        <img src="/img/system/price-icon.png" />
                        <br />
                        <span class="headerFont small">Приятные цены</span>
                        <p>Мы предлагаем все туры и экскурсии по действительно доступным ценам, поэтому вы всегда можете выбрать отличное место для отдыха.</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="section white">
            <div class="header">
                <br /><br />
                <span class="headerFont">Отзывы клиентов</span>
                <br /><br /><br /><br />
                <div class="container thin" id="clients">
                    <div class="column first">
                        <div class="clientPhoto">
                            <img src="/img/system/client-lisa.jpg" />
                        </div>
                        <div class="review">
                            <p>Словакия в декабре невероятно прекрасна! С самого первого дня мы оказались в снежной сказке. Наша семья переполнена впечатлениями и волнующими воспоминианиями. Спасибо!</p>
                            <span class="nameFont">— Елизавета</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="column">
                        <div class="clientPhoto">
                            <img src="/img/system/client-alex.jpg" />
                        </div>
                        <div class="review">
                            <p>Флавиа-трэвел стало лучшим агенством для нас! Вы рассмотрели все наши пожелания при планировании нашей поездки. Каждое сделанное вами предложение было превосходным!</p>
                            <span class="nameFont">— Алексей</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="column">
                        <div class="clientPhoto">
                            <img src="/img/system/client-evgeni.jpg" />
                        </div>
                        <div class="review">
                            <p>Хочу сказать Вам огромное спасибо за помощь во время моей недавней поездки в Испанию. Это для меня бесценно.</p>
                            <span class="nameFont">— Евгений</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="section grey">
            <div class="header">
                <br /><br />
                <span class="headerFont">Наши партнёры</span>
                <br /><br /><br /><br />
                <div class="container text-center">
                    <div class="logoContainer first" style="margin: 0;">
                        <img src="/img/logo/smok-travel-logo-grey.png" id="smok-travel" onmouseover="changeLogo('smok-travel', 1)" onmouseout="changeLogo('smok-travel', 0)" />
                    </div>
                    <div class="logoContainer">
                        <img src="/img/logo/solvex-logo-grey.png" id="solvex" onmouseover="changeLogo('solvex', 1)" onmouseout="changeLogo('solvex', 0)" />
                    </div>
                    <div class="logoContainer">
                        <img src="/img/logo/tez-tour-logo-grey.png" id="tez-tour" onmouseover="changeLogo('tez-tour', 1)" onmouseout="changeLogo('tez-tour', 0)" />
                    </div>
                    <div class="logoContainer">
                        <img src="/img/logo/time-voyage-logo-grey.png" id="time-voyage" onmouseover="changeLogo('time-voyage', 1)" onmouseout="changeLogo('time-voyage', 0)" />
                    </div>
                    <div class="logoContainer">
                        <img src="/img/logo/top-tour-logo-grey.png" id="top-tour" onmouseover="changeLogo('top-tour', 1)" onmouseout="changeLogo('top-tour', 0)" />
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="section white" id="bottomPromo" style="background: url(/img/system/bg-02.jpg) no-repeat top left;">
             <div class="header">
                <br /><br /><br />
                <span class="sloganBigFont" style="color: #fff;">Исследуйте самые дальние уголки мира</span>
                <br /><br /><br /><br />
                <div class="container thin" style="padding: 0;">
                    <span class="sloganSmallFont" style="color: #fff;">Более 10 лет Флавиа-трэвел организовывает вдохновляющие путешествия и гордится своей репутацией, как надёжного партнёра. С нами вы можете смело отправляться в самые удалённые уголки мира!</span>
                    <br /><br /><br /><br />
                    <button class="promoButton" id="bottom"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>
                    <button class="promoButton" id="bottomMobile"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди свой тур</button>
                </div>
                <br /><br />
             </div>
        </div>

        <div class="section dark" id="footer">
            <div class="header">
                <br /><br /><br />
                <div class="container thin" style="padding-bottom: 20px;">
                    <div class="logo">
                        <a href="/"><img src="/img/system/logoWhite.png" /></a>
                    </div>
                    <div class="social">
                        <div class="socialButton">
                            <a href="" target="_blank"><img src="/img/system/twitter.png" id="twitter" onmouseover="changeIcon('twitter', 1)" onmouseout="changeIcon('twitter', 0)" /></a>
                        </div>
                        <div class="socialButton">
                            <a href="" target="_blank"><img src="/img/system/facebook.png" id="facebook" onmouseover="changeIcon('facebook', 1)" onmouseout="changeIcon('facebook', 0)" /></a>
                        </div>
                        <div class="socialButton">
                            <a href="" target="_blank"><img src="/img/system/instagram.png" id="instagram" onmouseover="changeIcon('instagram', 1)" onmouseout="changeIcon('instagram', 0)" /></a>
                        </div>
                        <div class="socialButton">
                            <a href="" target="_blank"><img src="/img/system/vk.png" id="vk" onmouseover="changeIcon('vk', 1)" onmouseout="changeIcon('vk', 0)" /></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
             </div>
        </div>

    </div>

    <div onclick="scrollToTop()" id="scroll"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>

</body>
</html>