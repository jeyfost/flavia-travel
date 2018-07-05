<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 05.01.2018
 * Time: 9:12
 */

session_start();
include("../../scripts/connect.php");

if($_SESSION['userID'] != 1) {
	header("Location: ../../");
}

if(!empty($_REQUEST['id'])) {
    $newsCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_news WHERE id = '".$mysqli->real_escape_string($_REQUEST['id'])."'");
    $newsCheck = $newsCheckResult->fetch_array(MYSQLI_NUM);

    if($newsCheck[0] == 0) {
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
    <script type="text/javascript" src="/libs/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/js/admin/common.js"></script>
	<script type="text/javascript" src="/js/notify.js"></script>
	<script type="text/javascript" src="/js/admin/news/index.js"></script>

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

<body <?php if(!empty($_REQUEST['id'])) {echo "onload='loadGalleryText(\"".$mysqli->real_escape_string($_REQUEST['id'])."\")'";} ?>>
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
			<div class="menuPointActive">
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
		<span class="headerFont">Управление новостями</span>
		<br /><br />
		<form method="post" id="newsForm">
			<label for="newsSelect">Новость:</label>
			<br />
			<select id="newsSelect" name="news" onchange="window.location = '?id=' + this.options[this.selectedIndex].value">
                <option value="">- Выберите новость -</option>
                <?php
                    $newsResult = $mysqli->query("SELECT * FROM ft_news ORDER BY date DESC");
                    while($news = $newsResult->fetch_assoc()) {
                        echo "<option value='".$news['id']."'"; if($_REQUEST['id'] == $news['id']) {echo " selected";} echo ">".dateToString($news['date'])." — ".$news['header']."</option>";
                    }
                ?>
            </select>
            <br /><br />
            <input type='button' id='addNewsSubmit' value='Написать новость' onmouseover='buttonHover("addNewsSubmit", 1)' onmouseout='buttonHover("addNewsSubmit", 0)' onclick='window.location.href = "/admin/news/add.php"' class='button' />
            <?php
                if(!empty($_REQUEST['id'])) {
                    $newsContentResult = $mysqli->query("SELECT * FROM ft_news WHERE id = '".$mysqli->real_escape_string($_REQUEST['id'])."'");
                    $newsContent = $newsContentResult->fetch_assoc();

                    echo "
                        <br /><br /><br /><br />
                        <hr />
                        <br /><br />
                        <span class='headerFont'>Редактирование новости <span style='color: #939393;'>&laquo;".$newsContent['header']."&raquo;</span></span>
                        <br /><br />
                        <label for='headerInput'>Заголовок новости:</label>
                        <br />
                        <input id='headerInput' name='header' value='".$newsContent['header']."' />
                        <br /><br />
                        <label for='previewInput'>Превью:</label>
                        <br />
                        <input type='file' class='file' id='previewInput' name='preview' />
                        <br /><br />
						<a href='/img/news/preview/".$newsContent['preview']."' class='lightview' data-lightview-options='skin: \"light\"'>
                            <div class='photoPreview'>
                                <img src='/img/news/preview/".$newsContent['preview']."' />
                                <br />
                                <span>Увеличить</span>
                            </div>
						</a>
						<br />
						<label for='descriptionInput'>Краткое описание:</label>
						<br />
						<textarea id='descriptionInput' name='description' onkeyup='textAreaHeight(this)'>".$newsContent['description']."</textarea>
						<br /><br />
						<label for='urlInput'>Ссылка на новость (латинские буквы, цифры):</label>
						<br />
						<input id='urlInput' name='url' value='".$newsContent['url']."' />
						<br /><br />
						<label for='textInput'>Текст новости:</label>
						<br />
						<textarea id='textInput' name='text'></textarea>
						<br /><br />
						<div style='width: 100%;'>
							<input type='button' id='editNewsSubmit' value='Редактировать' onmouseover='buttonHover(\"editNewsSubmit\", 1)' onmouseout='buttonHover(\"editNewsSubmit\", 0)' onclick='editNews()' class='button relative' />
							<input type='button' id='deleteNewsSubmit' value='Удалить' onmouseover='buttonHoverRed(\"deleteNewsSubmit\", 1)' onmouseout='buttonHoverRed(\"deleteNewsSubmit\", 0)' onclick='deleteNews()' class='button relative' style='margin-left: 10px;' />
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