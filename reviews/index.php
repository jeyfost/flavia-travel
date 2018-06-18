<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 18.06.2018
 * Time: 12:01
 */

include("../scripts/connect.php");

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
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <title>Туристическое агенство Флавиа-Трэвел | Отзывы</title>

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
    <script type="text/javascript" src="/js/reviews.js"></script>

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
<body>

<div id="page-preloader"><span class="spinner"></span></div>

<div id="menuInner">
    <div id="logo"><a href="/"><img src="/img/system/logoWhite.png" id="logoIMG" /></a></div>
    <div id="menuContent">
        <a href="mailto: flavia-travel@mail.ru"><div class="menuPoint noBorder" id="mpEmail" onmouseover="fontColor(1, 'mpEmail')" onmouseout="fontColor(2, 'mpEmail')"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;flavia-travel@mail.ru</div></a>
        <a href="tel: +375222745444"><div class="menuPoint" id="mpPhone" onmouseover="fontColor(1, 'mpPhone')" onmouseout="fontColor(2, 'mpPhone')"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;+375 222 74-54-44</div></a>
        <a href="/contacts"><div class="menuPoint" id="mpContacts" onmouseover="fontColor(1, 'mpContacts')" onmouseout="fontColor(2, 'mpContacts')">Контакты</div></a>
        <a href="/reviews"><div class="menuPoint activePoint" id="mpReviews">Отзывы</div></a>
        <a href="/news"><div class="menuPoint" id="mpNews" onmouseover="fontColor(1, 'mpNews')" onmouseout="fontColor(2, 'mpNews')">Новости</div></a>
    </div>
    <div class="clear"></div>
</div>

<div class="ndra-container">
    <div class="section grey" id="contacts" style="padding-top: 70px;">
        <div class="header">
            <br /><br />
            <span class="headerFont">Отзывы</span>
            <br /><br />
            <a data-remodal-target="modal"><button class="reviewButton"><i class="fa fa-pencil" aria-hidden="true"></i> оставьте свой отзыв</button></a>
            <br /><br /><br /><br />
        </div>
    </div>

    <?php
        $i = 0;

        $reviewResult = $mysqli->query("SELECT * FROM ft_reviews WHERE showing = '1' ORDER BY date DESC");

        if($reviewResult->num_rows > 0) {
            while($review = $reviewResult->fetch_assoc()) {
                $i++;

                echo "
                    <div class='section reviewContainer"; if($i % 2 == 0) {echo " grey";} echo "'>
                        <div class='container thin'>
                            <br /><br /><br />
                            <b>".$review['name']."</b> ".dateForReview($review['date'])."
                            <br /><br />
                            ".$review['text']."
                        </div>
                    </div>
                ";
            }
        } else {
            echo "<div class='section reviewContainer'><br /><br /><center>На данный момент на сайте нет ни одного отзыва.</center></div>";
        }
    ?>

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

<div onclick="scrollToTop()" id="scroll"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>

</body>

</html>
