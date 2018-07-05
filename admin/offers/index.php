<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 10.01.2018
 * Time: 13:37
 */

session_start();
include("../../scripts/connect.php");

if($_SESSION['userID'] != 1) {
	header("Location: ../../");
}

if(!empty($_REQUEST['id'])) {
    $offerCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_offers WHERE id = '".$mysqli->real_escape_string($_REQUEST['id'])."'");
    $offerCheck = $offerCheckResult->fetch_array(MYSQLI_NUM);

    if($offerCheck[0] == 0) {
        header("Location: index.php");
    }
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
    <link rel="stylesheet" type="text/css" href="/libs/lightview/css/lightview/lightview.css" />

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/libs/lightview/js/lightview/lightview.js"></script>
    <script type="text/javascript" src="/libs/ckeditor-2/ckeditor.js"></script>
	<script type="text/javascript" src="/js/admin/common.js"></script>
	<script type="text/javascript" src="/js/notify.js"></script>
	<script type="text/javascript" src="/js/admin/offers/index.js"></script>

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

<body <?php if(!empty($_REQUEST['id'])) {echo "onload='loadOfferText(\"".$mysqli->real_escape_string($_REQUEST['id'])."\")'";} ?>>
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
            <div class="menuPoint">
                <i class="fa fa-picture-o" aria-hidden="true"></i><span> Фотографии</span>
            </div>
        </a>
		<a href="/admin/news/">
			<div class="menuPoint">
				<i class="fa fa-newspaper-o" aria-hidden="true"></i><span> Новости</span>
			</div>
		</a>
        <a href="/admin/offers/">
			<div class="menuPointActive">
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
		<span class="headerFont">Управление горящими предложениями</span>
		<br /><br />
		<form method="post" id="offerForm">
			<label for="offerSelect">Горящее предложение:</label>
			<br />
			<select id="offerSelect" name="offer" onchange="window.location = '?id=' + this.options[this.selectedIndex].value">
                <option value="">- Выберите горящее предложение -</option>
                <?php
                    $offerResult = $mysqli->query("SELECT * FROM ft_offers ORDER BY date DESC");
                    while($offer = $offerResult->fetch_assoc()) {
                        echo "<option value='".$offer['id']."'"; if($_REQUEST['id'] == $offer['id']) {echo " selected";} echo ">".dateToString($offer['date'])." — ".$offer['header']."</option>";
                    }
                ?>
            </select>
            <br /><br />
            <input type='button' id='addOfferSubmit' value='Добавить горящее предложение' onmouseover='buttonHover("addOfferSubmit", 1)' onmouseout='buttonHover("addOfferSubmit", 0)' onclick='window.location.href = "/admin/offers/add.php"' class='button' />
            <?php
                if(!empty($_REQUEST['id'])) {
                    $offerContentResult = $mysqli->query("SELECT * FROM ft_offers WHERE id = '".$mysqli->real_escape_string($_REQUEST['id'])."'");
                    $offerContent = $offerContentResult->fetch_assoc();

                    echo "
                        <br /><br /><br /><br />
                        <hr />
                        <br /><br />
                        <span class='headerFont'>Редактирование горящего предложения <span style='color: #939393;'>&laquo;".$offerContent['header']."&raquo;</span></span>
                        <br /><br />
                        <label for='headerInput'>Заголовок горящего предложения:</label>
                        <br />
                        <input id='headerInput' name='header' value='".$offerContent['header']."' />
                        <br /><br />
                        <label for='previewInput'>Превью:</label>
                        <br />
                        <input type='file' class='file' id='previewInput' name='preview' />
                        <br /><br />
						<a href='/img/offers/preview/".$offerContent['preview']."' class='lightview' data-lightview-options='skin: \"light\"'>
						    <div class='photoPreview'>
                                <img src='/img/offers/preview/".$offerContent['preview']."' />
                                <br />
                                <span>Увеличить</span>
						    </div>
						</a>
						<br />
						<label for='descriptionInput'>Краткое описание:</label>
						<br />
						<textarea id='descriptionInput' name='description' onkeyup='textAreaHeight(this)'>".$offerContent['description']."</textarea>
						<br /><br />
						<label for='urlInput'>Ссылка на горящее предложение (латинские буквы, цифры):</label>
						<br />
						<input id='urlInput' name='url' value='".$offerContent['url']."' />
						<br /><br />
						<label for='textInput'>Основной текст:</label>
						<br />
						<textarea id='textInput' name='text'></textarea>
						<br /><br />
						<div style='width: 100%;'>
							<input type='button' id='editOfferSubmit' value='Редактировать' onmouseover='buttonHover(\"editOfferSubmit\", 1)' onmouseout='buttonHover(\"editOfferSubmit\", 0)' onclick='editOffer()' class='button relative' />
							<input type='button' id='deleteOfferSubmit' value='Удалить' onmouseover='buttonHoverRed(\"deleteOfferSubmit\", 1)' onmouseout='buttonHoverRed(\"deleteOfferSubmit\", 0)' onclick='deleteOffer()' class='button relative' style='margin-left: 10px;' />
							<div class='clear'></div>
						</div>
                    ";
                }
            ?>
		</form>
	</div>
    <br /><br />

    <script type="text/javascript">
		CKEDITOR.replace("text");
	</script>

</body>

</html>