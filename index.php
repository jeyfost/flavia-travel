<?php
    include('scripts/connect.php');

    $pageResult = $mysqli->query("SELECT * FROM ft_pages WHERE url = ''");
    $page = $pageResult->fetch_assoc();
?>

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
    <meta name="description" content="<?= $page['description'] ?>" />
	<meta name="keywords" content="<?= $page['keywords'] ?>" />

    <title><?= $page['title'] ?></title>

    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/manifest.json">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="/libs/revealator-master/fm.revealator.jquery.css" />
    <link rel="stylesheet" href="/libs/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/libs/remodal/dist/remodal.css" />
    <link rel="stylesheet" href="/libs/remodal/dist/remodal-default-theme.css" />
	<link rel="stylesheet" href="/css/fonts.css" />
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/media.css" />

    <link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat|Istok+Web" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/libs/revealator-master/fm.revealator.jquery.js"></script>
    <script type="text/javascript" src="/libs/remodal/dist/remodal.min.js"></script>
    <script type="text/javascript" src="/libs/notify/notify.js"></script>
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

    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript'>
        (function () {
            var widget_id = 'H5t2LAVbMI';
            var d = document;
            var w = window;

            function l() {
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = '//code.jivosite.com/script/widget/' + widget_id;
                var ss = document.getElementsByTagName('script')[0];
                ss.parentNode.insertBefore(s, ss);
            }

            if (d.readyState == 'complete') {
                l();
            } else {
                if (w.attachEvent) {
                    w.attachEvent('onload', l);
                } else {
                    w.addEventListener('load', l, false);
                }
            }
        })();</script>
    <!-- {/literal} END JIVOSITE CODE -->

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
            <a href="/reviews"><div class="menuPoint" id="mpReviews" onmouseover="fontColor(1, 'mpReviews')" onmouseout="fontColor(2, 'mpReviews')">Отзывы</div></a>
            <a href="/news"><div class="menuPoint" id="mpNews" onmouseover="fontColor(1, 'mpNews')" onmouseout="fontColor(2, 'mpNews')">Новости</div></a>
        </div>
        <div class="clear"></div>
    </div>

    <div id="screenSpace">
        <!--<div class="clouds"></div>-->
        <div class="clear"></div>
        <div class="overlay"></div>
        <div class="slogan revealator-slideup revealator-load revealator-delay12">
            <span class="sloganBigFont">Отправляйтесь в лучшее<br />путешествие в вашей жизни</span>
            <br /><br />
            <span class="sloganSmallFont">Мы предлагаем туристические услуги самого высокого качества, сочетая нашу энергию и энтузиазм с многолетним опытом.</span>
            <br /><br />
            <button class="promoButton" id="topButton"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>
        </div>
        <div class="sliderButtons">
            <div class="sliderButton selected" id="button1"></div>
            <div class="sliderButton" id="button2" onclick="selectSlide(2)" style="margin-left: 10px;"></div>
            <div class="sliderButton" id="button3" onclick="selectSlide(3)" style="margin-left: 10px;"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="tours">
        <div class="header grey">
            <br /><br />
            <span class="headerFont">Поиск тура</span>
            <br /><br /><br />

            <iframe scrolling="no" width="100%" frameborder="0" id="www.2345.by"
                    src="http://5.45.70.112/?Module=true&Module_City=%D0%9C%D0%B8%D0%BD%D1%81%D0%BA&Module_Country=%D0%95%D0%B3%D0%B8%D0%BF%D0%B5%D1%82&Module_DatesRange=auto1&Module_NightsFrom=7&Module_NightsTo=14&Module_Adults=2&Module_Childs=0&Module_AgeChd1=4&Module_AgeChd2=7&Module_StarsFrom=2*&Module_PansionFrom=RO&Module_AviaWarranty=true&Module_HotelWarranty=false&Module_HideOperators=true&Module_AutoStart=false&Module_NationalCurrency=BYN&Module_CurrencyMode=real_currency&Module_PriceCorrection=0&Module_ImageIsLogo=true&Module_AviaDetails=true&Module_HotelDonor=Booking&Module_Phone=%2B375%20%28222%29%2074-54-44&Module_Font=Tahoma&Module_BgColor=%23f3f4f7&Module_HrefColor=%23ff6030&Module_Color1=%234d009a&Module_Color2=%23ff6030&Module_NameForTab1=%D0%A2%D1%83%D1%80%D1%8B%20%D0%BE%D1%82%20%D0%A4%D0%BB%D0%B0%D0%B2%D0%B8%D0%B0-%D0%A2%D1%80%D1%8D%D0%B2%D0%B5%D0%BB&Module_NameForTab2=%D0%91%D0%B8%D0%BB%D0%B5%D1%82%D1%8B%2C%20%D0%BC%D0%B5%D1%81%D1%82%D0%B0%2C%20%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%D0%B0&Module_NameForTab3=%D0%94%D0%BB%D1%8F%20%D0%BA%D0%BB%D0%B8%D0%B5%D0%BD%D1%82%D0%BE%D0%B2&Module_IconForTab1=fa-plane&Module_IconForTab2=fa-gear&Module_IconForTab3=fa-bullhorn&Module_TxtUrl1=http%3A%2F%2Fflavia-travel.by%2Ffiles%2Finfo.txt&Module_TxtUrl2=http%3A%2F%2F5.45.70.112%2Fup%2Fcall.txt&Module_BgUrl=http%3A%2F%2Fflavia-travel.by%2Fimg%2Fsystem%2Ftours-search-bg.jpg&Module_ImageUrl=&Module_Cities=%D0%91%D1%80%D0%B5%D1%81%D1%82%2C%D0%92%D0%B0%D1%80%D1%88%D0%B0%D0%B2%D0%B0%2C%D0%92%D0%B8%D0%BB%D1%8C%D0%BD%D1%8E%D1%81%2C%D0%92%D0%B8%D1%82%D0%B5%D0%B1%D1%81%D0%BA%2C%D0%93%D0%BE%D0%BC%D0%B5%D0%BB%D1%8C%2C%D0%9A%D0%B8%D0%B5%D0%B2%2C%D0%9C%D0%B8%D0%BD%D1%81%D0%BA%2C%D0%9C%D0%BE%D0%B3%D0%B8%D0%BB%D0%B5%D0%B2%2C%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0&Module_Countries=%D0%90%D0%B1%D1%85%D0%B0%D0%B7%D0%B8%D1%8F%2C%D0%90%D0%B2%D1%81%D1%82%D1%80%D0%B8%D1%8F%2C%D0%90%D0%BB%D0%B1%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%90%D0%BD%D0%B3%D0%BB%D0%B8%D1%8F%2C%D0%91%D0%BE%D0%BB%D0%B3%D0%B0%D1%80%D0%B8%D1%8F%2C%D0%91%D1%80%D0%B0%D0%B7%D0%B8%D0%BB%D0%B8%D1%8F%2C%D0%92%D0%B5%D0%BD%D0%B3%D1%80%D0%B8%D1%8F%2C%D0%92%D1%8C%D0%B5%D1%82%D0%BD%D0%B0%D0%BC%2C%D0%93%D0%B5%D1%80%D0%BC%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%93%D1%80%D0%B5%D1%86%D0%B8%D1%8F%2C%D0%93%D1%80%D1%83%D0%B7%D0%B8%D1%8F%2C%D0%94%D0%BE%D0%BC%D0%B8%D0%BD%D0%B8%D0%BA%D0%B0%D0%BD%D0%B0%2C%D0%95%D0%B3%D0%B8%D0%BF%D0%B5%D1%82%2C%D0%98%D0%B7%D1%80%D0%B0%D0%B8%D0%BB%D1%8C%2C%D0%98%D0%BD%D0%B4%D0%B8%D1%8F%2C%D0%98%D0%BD%D0%B4%D0%BE%D0%BD%D0%B5%D0%B7%D0%B8%D1%8F%2C%D0%98%D0%BE%D1%80%D0%B4%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%98%D1%81%D0%BF%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%98%D1%82%D0%B0%D0%BB%D0%B8%D1%8F%2C%D0%9A%D0%B5%D0%BD%D0%B8%D1%8F%2C%D0%9A%D0%B8%D0%BF%D1%80%2C%D0%9A%D0%B8%D1%82%D0%B0%D0%B9%2C%D0%9A%D1%83%D0%B1%D0%B0%2C%D0%9B%D0%B0%D1%82%D0%B2%D0%B8%D1%8F%2C%D0%9B%D0%B8%D1%82%D0%B2%D0%B0%2C%D0%9C%D0%B0%D0%B2%D1%80%D0%B8%D0%BA%D0%B8%D0%B9%2C%D0%9C%D0%B0%D0%BB%D1%8C%D0%B4%D0%B8%D0%B2%D1%8B%2C%D0%9C%D0%B0%D0%BB%D1%8C%D1%82%D0%B0%2C%D0%9C%D0%B0%D1%80%D0%BE%D0%BA%D0%BA%D0%BE%2C%D0%9C%D0%B5%D0%BA%D1%81%D0%B8%D0%BA%D0%B0%2C%D0%9E%D0%90%D0%AD%2C%D0%9F%D0%BE%D0%BB%D1%8C%D1%88%D0%B0%2C%D0%9F%D0%BE%D1%80%D1%82%D1%83%D0%B3%D0%B0%D0%BB%D0%B8%D1%8F%2C%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F%2C%D0%A1%D0%B5%D0%B9%D1%88%D0%B5%D0%BB%D1%8B%2C%D0%A1%D0%BB%D0%BE%D0%B2%D0%B0%D0%BA%D0%B8%D1%8F%2C%D0%A2%D0%B0%D0%B8%D0%BB%D0%B0%D0%BD%D0%B4%2C%D0%A2%D0%B0%D0%BD%D0%B7%D0%B0%D0%BD%D0%B8%D1%8F%2C%D0%A2%D1%83%D0%BD%D0%B8%D1%81%2C%D0%A2%D1%83%D1%80%D1%86%D0%B8%D1%8F%2C%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0%2C%D0%A4%D0%B8%D0%BB%D0%B8%D0%BF%D0%BF%D0%B8%D0%BD%D1%8B%2C%D0%A4%D0%B8%D0%BD%D0%BB%D1%8F%D0%BD%D0%B4%D0%B8%D1%8F%2C%D0%A4%D1%80%D0%B0%D0%BD%D1%86%D0%B8%D1%8F%2C%D0%A5%D0%BE%D1%80%D0%B2%D0%B0%D1%82%D0%B8%D1%8F%2C%D0%A7%D0%B5%D1%80%D0%BD%D0%BE%D0%B3%D0%BE%D1%80%D0%B8%D1%8F%2C%D0%A7%D0%B5%D1%85%D0%B8%D1%8F%2C%D0%A8%D0%B2%D0%B5%D0%B9%D1%86%D0%B0%D1%80%D0%B8%D1%8F%2C%D0%A8%D0%B2%D0%B5%D1%86%D0%B8%D1%8F%2C%D0%A8%D1%80%D0%B8%D0%9B%D0%B0%D0%BD%D0%BA%D0%B0&Module_Operators=alatan%2Cabstour%2Cairtravel%2Cbalkan%2Cbelorientir%2Cbitour%2Cbg%2Cvilar%2Cvtour%2Cdanko%2Cjoinup%2Ckipr%2Cltours%2Cmouzenidis%2Cnatalie%2Cpac%2Cpegas%2Cpodevus%2Crosting%2Csunny%2Csft%2Csmok%2Csolvex%2Csolemare%2Ctusson%2Ctez%2Ctoptour%2Ctrade">
                <div class="DoNotRemoveOrEditThisCopyrightBlock">© Программное обеспечение <a
                            href="http://5.45.70.112/">2345.BY</a>" - все права защищены. Программное обеспечение 2345.BY распространяется по лицензии FREEWARE (за пользование программным обеспечением 2345.BY не нужно платить деньги). Программное обеспечение 2345.BY может быть использовано для извлечения прибыли туристическими компаниями. Запрещено коммерческое распространение программного обеспечения 2345.BY, распространение без ссылки на лицензионное соглашение. Полный текст лицензионного соглашения доступен по адресу: <a href="http://5.45.70.112/up/licence.txt">2345.by/up/licence.txt</a> ©
                </div>
            </iframe>
            <script type="text/javascript" src="http://5.45.70.112/js/frame_resizer_js/iframeResizer.min.js"></script>
            <script type="text/javascript">iFrameResize({widthCalculationMethod: "scroll"});</script>

        </div>
        <div class="clear"></div>

        <div class="section grey">
            <div class="header">
                <br /><br /><br />
                <span class="headerFont">Горящие предложения</span>
                <br /><br /><br /><br />
            </div>
            <div class="container text-center">
                <?php
                    $offerResult = $mysqli->query("SELECT * FROM ft_offers ORDER BY date DESC");

                    if($offerResult->num_rows == 0) {
                        echo "<span style='font-family: \"Istok Web\", sans-serif;'>На данный момент нет ни одного предложения, но скоро мы обязательно что-нибудь добавим &#128522;</span><br /><br /><br /><br />";
                    } else {
                        $i = 0;

                        while($offer = $offerResult->fetch_assoc()) {
                            echo "
                                <a href='/offers/".$offer['url']."' class='newsLink'>
                                    <div class='newsContainer'>
                                        <div class='newsPreview'>
                                            <img src='/img/offers/preview/".$offer['preview']."' />
                                            <div class='newsDate' style='background-color: #".labelColor($i)."'>".dateToString($offer['date'])."</div>
                                        </div>
                                        <div class='newsDescription'>
                                            <span class='newsHeader'><br />".$offer['header']."</span>
                                            <p>".$offer['description']."</p>
                                        </div>
                                        <div class='newsButton' id='newsButton".$offer['id']."' onmouseover='newsButtonColor(\"newsButton".$offer['id']."\", \"".labelColor($i)."\", 1)' onmouseout='newsButtonColor(\"newsButton".$offer['id']."\", \"".labelColor($i)."\", 0)'>
                                            <i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;&nbsp;<span>подробнее</span>
                                        </div>
                                        <div class='clear'></div>
                                    </div>
                                </a>
                            ";

                            $i++;

                            if($i > 4) {
                                $i = $i - 5;
                            }
                        }
                    }
                ?>
            </div>
        </div>

        <div class="section white text-center">
            <div class="header">
                <br /><br /><br />
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

        <div class="section grey">
            <div class="header">
                <br /><br /><br />
                <span class="headerFont">Отзывы клиентов</span>
                <br /><br /><br /><br />
                <div class="container thin" id="clients">
                    <?php
                        $i = 1;

                        $reviewResult = $mysqli->query("SELECT * FROM ft_reviews WHERE showing = '1' ORDER BY date DESC LIMIT 3");
                        while ($review = $reviewResult->fetch_assoc()) {
                            echo "
                                <div class='column first'>
                                    <div class='clientPhoto'>
                                        <img src='img/system/review-".$i.".png' />
                                    </div>
                                    <div class='review'>
                                        <p>".$review['text']."</p>
                                        <span class='nameFont'>— ".$review['name']."</span>
                                    </div>
                                    <div class='clear'></div>
                                </div>
                            ";

                            $i++;
                        }
                    ?>
                    <div class="clear"></div>
                    <br /><br />
                    <a data-remodal-target="modal"><button class="reviewButton"><i class="fa fa-pencil" aria-hidden="true"></i> оставьте свой отзыв</button></a>
                    <br /><br />
                    <a href="/reviews" class="reviewsLink">Прочитать все отзывы <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <div class="section white">
            <div class="header">
                <br /><br /><br />
                <span class="headerFont">Наши партнёры</span>
                <br /><br /><br /><br />
                <div class="container text-center">
                    <div class="logoContainer first" style="margin: 0;">
                        <img src="/img/logo/anex-tour-logo-grey.png" id="anex-tour" onmouseover="changeLogo('anex-tour', 1)" onmouseout="changeLogo('anex-tour', 0)" />
                    </div>
                    <div class="logoContainer">
                        <img src="/img/logo/tui-logo-grey.png" id="tui" onmouseover="changeLogo('tui', 1)" onmouseout="changeLogo('tui', 0)" />
                    </div>
                    <div class="logoContainer">
                        <img src="/img/logo/tez-tour-logo-grey.png" id="tez-tour" onmouseover="changeLogo('tez-tour', 1)" onmouseout="changeLogo('tez-tour', 0)" />
                    </div>
                    <div class="logoContainer">
                        <img src="/img/logo/time-voyage-logo-grey.png" id="time-voyage" onmouseover="changeLogo('time-voyage', 1)" onmouseout="changeLogo('time-voyage', 0)" />
                    </div>
                    <div class="logoContainer">
                        <img src="/img/logo/coral-travel-logo-grey.png" id="coral-travel" onmouseover="changeLogo('coral-travel', 1)" onmouseout="changeLogo('coral-travel', 0)" />
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="section grey" id="bottomPromo" style="background: url(/img/system/bg-02.jpg) no-repeat top left;">
             <div class="header">
                <br /><br /><br />
                <span class="sloganBigFont" style="color: #fff;">Исследуйте самые дальние уголки мира</span>
                <br /><br /><br /><br />
                <div class="container thin" style="padding: 0;">
                    <span class="sloganSmallFont" style="color: #fff;">Более 10 лет Флавиа-Трэвел организовывает вдохновляющие путешествия и гордится своей репутацией, как надёжного партнёра. С нами вы можете смело отправляться в самые удалённые уголки мира!</span>
                    <br /><br /><br /><br />
                    <button class="promoButton" id="bottom"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди своё идеальное путешествие</button>
                    <button class="promoButton" id="bottomMobile"><i class="fa fa-paper-plane" aria-hidden="true"></i>найди свой тур</button>
                </div>
                <br /><br />
             </div>
        </div>

        <div class="remodal" data-remodal-id="modal" data-remodal-options="closeOnConfirm: false">
            <button data-remodal-action="close" class="remodal-close"></button>
            <div style='width: 80%; margin: 0 auto;'><h1>Пожалуйста, оставьте свой отзыв.<br />Для нас это очень важно!</h1></div>
            <br />
            <form method="post" id="modalForm">
                <input id="nameInput" name="name" placeholder="Имя" />
                <br /><br />
                <input id="emailInput" name="email" placeholder="E-mail" />
                <br /><br />
                <textarea id="textInput" name="text" placeholder="Отзыв"></textarea>
            </form>
            <br />
            <button data-remodal-action="confirm" class="remodal-confirm" style="width: 150px;" onclick="sendReview()">Оставить отзыв</button>
        </div>

        <div class="section dark" id="footer">
            <div class="header">
                <br /><br /><br />
                <div class="container thin" style="padding-bottom: 20px;">
                    <div class="logo">
                        <a href="/"><img src="/img/system/logoWhite.png" /></a>
                        <div class="creator text-center">
                            <span class="copyFont">Флавиа Трэвел &copy; <?= date('Y') ?></span>
                            <br />
                            <span class="greyFont">Создание сайта: <a href="https://airlab.by/" target="_blank">airlab</a></span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="social">
                        <div class="socialButton">
                            <a href="" target="_blank"><img src="/img/system/twitter.png" id="twitter" onmouseover="changeIcon('twitter', 1)" onmouseout="changeIcon('twitter', 0)" /></a>
                        </div>
                        <div class="socialButton">
                            <a href="" target="_blank"><img src="/img/system/facebook.png" id="facebook" onmouseover="changeIcon('facebook', 1)" onmouseout="changeIcon('facebook', 0)" /></a>
                        </div>
                        <div class="socialButton">
                            <a href="https://www.instagram.com/flavia_travel/" target="_blank"><img src="/img/system/instagram.png" id="instagram" onmouseover="changeIcon('instagram', 1)" onmouseout="changeIcon('instagram', 0)" /></a>
                        </div>
                        <div class="socialButton">
                            <a href="https://vk.com/flaviatravel" target="_blank"><img src="/img/system/vk.png" id="vk" onmouseover="changeIcon('vk', 1)" onmouseout="changeIcon('vk', 0)" /></a>
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