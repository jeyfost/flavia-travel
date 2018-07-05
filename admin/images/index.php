<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 31.01.2018
 * Time: 18:49
 */

session_start();
include("../../scripts/connect.php");

if($_SESSION['userID'] != 1) {
    header("Location: ../../");
}

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

    <title>Панель администрирования</title>

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="/img/favicon/favicon.ico" />

    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="/css/admin.css" />
    <link rel="stylesheet" href="/libs/font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="/libs/lightview/css/lightview/lightview.css" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/libs/lightview/js/lightview/lightview.js"></script>
    <script type="text/javascript" src="/js/admin/common.js"></script>
    <script type="text/javascript" src="/js/notify.js"></script>
    <script type="text/javascript" src="/js/admin/images/index.js"></script>

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

<body>
<div id="page-preloader"><span class="spinner"></span></div>

<div id="topLine">
    <div id="logo">
        <a href="/"><span><i class="fa fa-home" aria-hidden="true"></i> flavia-travel.by</span></a>
    </div>
    <a href="admin.php"><span class="headerText">Панель администрирвания</span></a>
    <div id="exit" onclick="exit()">
        <span>Выйти <i class="fa fa-sign-out" aria-hidden="true"></i></span>
    </div>
</div>
<div id="leftMenu">
    <a href="/admin/pages/">
        <div class="menuPoint">
            <i class="fa fa-file-text-o" aria-hidden="true"></i><span> Страницы</span>
        </div>
    </a>
    <a href="/admin/images/">
        <div class="menuPointActive">
            <i class="fa fa-picture-o" aria-hidden="true"></i><span> Фотографии</span>
        </div>
    </a>
    <a href="/admin/news/">
        <div class="menuPoint">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i><span> Новости</span>
        </div>
    </a>
    <a href="/admin/offers/">
        <div class="menuPoint">
            <i class="fa fa-fire" aria-hidden="true"></i><span> Горящие предложения</span>
        </div>
    </a>
    <a href="/admin/reviews/">
        <div class="menuPoint">
            <i class="fa fa-comment" aria-hidden="true"></i><span> Отзывы</span>
        </div>
    </a>
    <a href="/admin/security/">
        <div class="menuPoint">
            <i class="fa fa-shield" aria-hidden="true"></i><span> Безопасность</span>
        </div>
    </a>
</div>

<div id="content">
    <span class="headerFont">Редактирование фотографий с главной страницы</span>
    <br />
    <span class="headerFont" style="font-size: 18px;">Рекомендованный размер фотографий: примерно 1920х1280</span>
    <br /><br /><br /><br />
    <form method="post" id="imagesForm">
        <label for="firstSlide">Первое фото:</label>
        <br /><br />
        <div class="sliderPhotoPreview">
            <a href="/img/slides/slide-01.jpg" class="lightview" data-lightview-options="skin: 'light'"><img src="/img/slides/slide-01.jpg" /></a>
        </div>
        <br />
        <input type="file" class="file" id="firstSlide" name="firstSlide" />
        <br /><br />
        <hr /><br />
        <label for="secondSlide">Второе фото:</label>
        <br /><br />
        <div class="sliderPhotoPreview">
            <a href="/img/slides/slide-02.jpg" class="lightview" data-lightview-options="skin: 'light'"><img src="/img/slides/slide-02.jpg" /></a>
        </div>
        <br />
        <input type="file" class="file" id="secondSlide" name="secondSlide" />
        <br /><br />
        <hr /><br />
        <label for="thirdSlide">Третье фото:</label>
        <br /><br />
        <div class="sliderPhotoPreview">
            <a href="/img/slides/slide-03.jpg" class="lightview" data-lightview-options="skin: 'light'"><img src="/img/slides/slide-03.jpg" /></a>
        </div>
        <br />
        <input type="file" class="file" id="thirdSlide" name="thirdSlide" />
        <br /><br />
        <input type='button' class='button' id='imagesSubmit' value='Изменить' onmouseover='buttonHover("imagesSubmit", 1)' onmouseout='buttonHover("imagesSubmit", 0)' onclick='edit()' />
    </form>
</div>

</body>

</html>