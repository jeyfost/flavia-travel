<?php
    include("../scripts/connect.php");

    $url = explode("/", substr($_SERVER['REQUEST_URI'], 1));
    $address = $url[1];

    if(!empty($address)) {
        $linkCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_news WHERE url = '".$address."'");
        $linkCheck = $linkCheckResult->fetch_array(MYSQLI_NUM);

        $type = "news";

        if($linkCheck[0] == 0) {
            $linkCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_offers WHERE url = '".$address."'");
            $linkCheck = $linkCheckResult->fetch_array(MYSQLI_NUM);

            $type = "offer";

            if($linkCheck[0] == 0) {
                $type = "list"; //список всех новостей

                /* Далее следует непереводимая игра слов для преобразования и приведения типов первой ячейки url */
                $addressNew = (int)$address;
                $address = (string)$address;
                $addressNew = (string)$addressNew;
                /* И благополучно завершается */

                if($addressNew == $address) {
                    /* Это значит в первой ячейке url находится номер страницы */
                    $quantityResult = $mysqli->query("SELECT COUNT(id) FROM ft_news");
                    $quantity = $quantityResult->fetch_array(MYSQLI_NUM);

                    if ($quantity[0] > 10) {
                        if ($quantity[0] % 10 != 0) {
                            $numbers = intval(($quantity[0] / 10) + 1);
                        } else {
                            $numbers = intval($quantity[0] / 10);
                        }
                    } else {
                        $numbers = 1;
                    }

                    $page = (int)$addressNew;

                    if($page < 1 or $page > $numbers) {
                        header("Location: /news");
                    }

                    $start = $page * 10 - 10;
                } else {
                    /* Это значит в первой ячейке url находится что-то неизвестное */
                    header("Location: /news");
                }
            } else {
                if($url[0] == "news") {
                    header("Location: /offers/".$url[1]);
                }
            }
        }
    } else {
        $type = "list";

        $quantityResult = $mysqli->query("SELECT COUNT(id) FROM ft_news");
        $quantity = $quantityResult->fetch_array(MYSQLI_NUM);

        if ($quantity[0] > 10) {
            if ($quantity[0] % 10 != 0) {
                $numbers = intval(($quantity[0] / 10) + 1);
            } else {
                $numbers = intval($quantity[0] / 10);
            }
        } else {
            $numbers = 1;
        }

        $page = 1;
        $start = $page * 10 - 10;
    }

    $pageResult = $mysqli->query("SELECT * FROM ft_news WHERE url = 'news'");
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

    <title>
        <?php
            if($type == "list") {
                echo $page['title'];
            } else {
                switch ($type) {
                    case "news":
                        $newsResult = $mysqli->query("SELECT * FROM ft_news WHERE url = '".$address."'");
                        $news = $newsResult->fetch_assoc();

                        echo $news['header'];
                        break;
                    case "offer":
                        $offerResult = $mysqli->query("SELECT * FROM ft_offers WHERE url = '".$address."'");
                        $offer = $offerResult->fetch_assoc();

                        echo $offer['header'];
                        break;
                    default:
                        echo $page['title'];
                        break;
                }
            }
        ?>
    </title>

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
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
    <script type="text/javascript" src="/js/news.js"></script>
    <script type="text/javascript" src="/js/notify.js"></script>

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

<body style="background-color: #f5f5f5;" <?php if($url[0] == "offers") {echo "onload=\"isOffer(1)\"";} ?>>

    <div id="page-preloader"><span class="spinner"></span></div>

    <div id="menuInner">
        <div id="logo"><a href="/"><img src="/img/system/logoWhite.png" id="logoIMG" /></a></div>
        <div id="menuContent">
            <a href="mailto: flavia-travel@mail.ru"><div class="menuPoint noBorder" id="mpEmail" onmouseover="fontColor(1, 'mpEmail')" onmouseout="fontColor(2, 'mpEmail')"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;flavia-travel@mail.ru</div></a>
            <a href="tel: +375222745444"><div class="menuPoint" id="mpPhone" onmouseover="fontColor(1, 'mpPhone')" onmouseout="fontColor(2, 'mpPhone')"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;+375 222 74-54-44</div></a>
            <a href="/contacts"><div class="menuPoint" id="mpContacts" onmouseover="fontColor(1, 'mpContacts')" onmouseout="fontColor(2, 'mpContacts')">Контакты</div></a>
            <a href="/reviews"><div class="menuPoint" id="mpReviews" onmouseover="fontColor(1, 'mpReviews')" onmouseout="fontColor(2, 'mpReviews')">Отзывы</div></a>
            <a href="/news"><div class="menuPoint <?php if($url[0] == "news") {echo "activePoint";} ?>" id="mpNews" <?php if($url[0] != "news") {echo "onmouseover='fontColor(1, \"mpNews\")' onmouseout='fontColor(2, \"mpNews\")'";} ?>>Новости</div></a>
        </div>
        <div class="clear"></div>
    </div>

    <div class="section grey" id="news" style="padding-top: 70px;">
        <div class="header">
            <br /><br />

            <?php
                /* Список всех новостей */
                if($type == "list") {
                    if(empty($address)) {
                        $address = 1;
                    }

                    echo "
                        <span class='headerFont'>Новости</span>
                        <br /><br /><br /><br />
                    ";

                    $newsCountResult = $mysqli->query("SELECT COUNT(id) FROM ft_news");
                    $newsCount = $newsCountResult->fetch_array(MYSQLI_NUM);

                    if($newsCount[0] == 0) {
                        echo "<span style='font-family: \"Istok Web\", sans-serif;'>На данный момент мы ещё не добавили ни одной новости, но скоро мы обязательно что-нибудь напишем &#128522;</span><br /><br /><br /><br />";
                    } else {
                        echo "<div class='container text-center'>";

                        $i = 0;

                        if(empty($start)) {
                            $start = 0;
                        }
                        $newsResult = $mysqli->query("SELECT * FROM ft_news ORDER BY id DESC LIMIT ".$start.", 10");
                        while($news = $newsResult->fetch_assoc()) {
                            echo "
                                <a href='/news/".$news['url']."' class='newsLink'>
                                    <div class='newsContainer'>
                                        <div class='newsPreview'>
                                            <img src='/img/news/preview/".$news['preview']."' />
                                            <div class='newsDate' style='background-color: #".labelColor($i)."'>".dateToString($news['date'])."</div>
                                        </div>
                                        <div class='newsDescription'>
                                            <span class='newsHeader'><br />".$news['header']."</span>
                                            <p>".$news['description']."</p>
                                        </div>
                                        <div class='newsButton' id='newsButton".$news['id']."' onmouseover='newsButtonColor(\"newsButton".$news['id']."\", \"".labelColor($i)."\", 1)' onmouseout='newsButtonColor(\"newsButton".$news['id']."\", \"".labelColor($i)."\", 0)'>
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

                        echo "</div>";

                        /* Блок с постраничной навигацией */
                        echo "<div id='pageNumbers'>";

                        if($numbers > 1) {
                            $uri = $address;
                            $link = "/news/";
                            if($numbers <= 7) {
                                echo "<br /><br />";

                                if($uri == 1) {
                                    echo "<div class='pageNumberBlockSide' id='pbPrev' style='cursor: url(\"/img/cursor/no.cur\"), auto;'><span class='paginationInactive'>Предыдущая</span></div>";
                                } else {
                                    echo "<a href='".$link.($uri - 1)."' class='noBorder'><div class='pageNumberBlockSide' id='pbPrev' onmouseover='pageBlock(1, \"pbPrev\", \"pbtPrev\")' onmouseout='pageBlock(0, \"pbPrev\", \"pbtPrev\")'><span class='paginationLink' id='pbtPrev'>Предыдущая</span></div></a>";
                                }

                                for($i = 1; $i <= $numbers; $i++) {
                                    if($uri != $i) {
                                        echo "<a href='".$link.$i."' class='noBorder'>";
                                    }

                                    echo "<div id='pb".$i."' "; if($i == $uri) {echo "class='pageNumberBlockActive'";} else {echo "class='pageNumberBlock' onmouseover='pageBlock(1, \"pb".$i."\", \"pbt".$i."\")' onmouseout='pageBlock(0, \"pb".$i."\", \"pbt".$i."\")'";} echo "><span "; if($i == $uri) {echo "class='paginationActive'";} else {echo "class='paginationLink' id='pbt".$i."'";} echo ">".$i."</span></div>";

                                    if($uri != $i) {
                                        echo "</a>";
                                    }
                                }

                                if($uri == $numbers) {
                                    echo "<div class='pageNumberBlockSide' id='pbNext' style='cursor: url(\"/img/cursor/no.cur\"), auto;'><span class='paginationInactive'>Следующая</span></div>";
                                } else {
                                    echo "<a href='".$link.($uri + 1)."' class='noBorder'><div class='pageNumberBlockSide' id='pbNext' onmouseover='pageBlock(1, \"pbNext\", \"pbtNext\")' onmouseout='pageBlock(0, \"pbNext\", \"pbtNext\")'><span class='paginationLink' id='pbtNext'>Следующая</span></div></a>";
                                }

                                echo "</div>";

                            } else {
                                if($uri < 5) {
                                    if($uri == 1) {
                                        echo "<div class='pageNumberBlockSide' id='pbPrev' style='cursor: url(\"/img/cursor/no.cur\"), auto;'><span class='paginationInactive'>Предыдущая</span></div>";
                                    } else {
                                        echo "<a href='".$link.($uri - 1)."' class='noBorder'><div class='pageNumberBlockSide' id='pbPrev' onmouseover='pageBlock(1, \"pbPrev\", \"pbtPrev\")' onmouseout='pageBlock(0, \"pbPrev\", \"pbtPrev\")'><span class='paginationLink' id='pbtPrev'>Предыдущая</span></div></a>";
                                    }

                                    for($i = 1; $i <= 5; $i++) {
                                        if($uri != $i) {
                                            echo "<a href='".$link.$i."' class='noBorder'>";
                                        }

                                        echo "<div id='pb".$i."' "; if($i == $uri) {echo "class='pageNumberBlockActive'";} else {echo "class='pageNumberBlock' onmouseover='pageBlock(1, \"pb".$i."\", \"pbt".$i."\")' onmouseout='pageBlock(0, \"pb".$i."\", \"pbt".$i."\")'";} echo "><span "; if($i == $uri) {echo "class='paginationActive'";} else {echo "class='paginationLink' id='pbt".$i."'";} echo ">".$i."</span></div>";

                                        if($uri != $i) {
                                            echo "</a>";
                                        }
                                    }

                                    echo "<div class='pageNumberBlock' style='cursor: url(\"/img/cursor/no.cur\"), auto;'><span class='paginationInactive'>...</span></div>";
                                    echo "<a href='".$link.$numbers."' class='noBorder'><div id='pb".$numbers."' class='pageNumberBlock' onmouseover='pageBlock(1, \"pb".$numbers."\", \"pbt".$numbers."\")' onmouseout='pageBlock(0, \"pb".$numbers."\", \"pbt".$numbers."\")'><span class='paginationLink' id='pbt".$numbers."'>".$numbers."</span></div></a>";

                                    if($uri == $numbers) {
                                        echo "<div class='pageNumberBlockSide' id='pbNext' style='cursor: url(\"/img/cursor/no.cur\"), auto;'><span class='paginationInactive'>Следующая</span></div>";
                                    } else {
                                        echo "<a href='".$link.($uri + 1)."' class='noBorder'><div class='pageNumberBlockSide' id='pbNext' onmouseover='pageBlock(1, \"pbNext\", \"pbtNext\")' onmouseout='pageBlock(0, \"pbNext\", \"pbtNext\")'><span class='paginationLink' id='pbtNext'>Следующая</span></div></a>";
                                    }

                                    echo "</div>";
                                } else {
                                    $check = $numbers - 3;

                                    if($uri >= 5 and $uri < $check) {
                                        echo "
                                            <br /><br />
                                                <a href='".$link.($uri - 1)."' class='noBorder'><div class='pageNumberBlockSide' id='pbPrev' onmouseover='pageBlock(1, \"pbPrev\", \"pbtPrev\")' onmouseout='pageBlock(0, \"pbPrev\", \"pbtPrev\")'><span class='paginationLink' id='pbtPrev'>Предыдущая</span></div></a>
                                                <a href='".$link."1' class='noBorder'><div id='pb1' class='pageNumberBlock' onmouseover='pageBlock(1, \"pb1\", \"pbt1\")' onmouseout='pageBlock(0, \"pb1\", \"pbt1\")'><span class='paginationLink' id='pbt1'>1</span></div></a>
                                                <div class='pageNumberBlock' style='cursor: url(\"/img/cursor/no.cur\"), auto;'><span class='paginationInactive'>...</span></div>
                                                <a href='".$link.($uri - 1)."' class='noBorder'><div id='pb".($uri - 1)."' class='pageNumberBlock' onmouseover='pageBlock(1, \"pb".($uri - 1)."\", \"pbt".($uri - 1)."\")' onmouseout='pageBlock(0, \"pb".($uri - 1)."\", \"pbt".($uri - 1)."\")'><span class='paginationLink' id='pbt".($uri - 1)."'>".($uri - 1)."</span></div></a>
                                                <div class='pageNumberBlockActive'><span class='paginationActive'>".$uri."</span></div>
                                                <a href='".$link.($uri + 1)."' class='noBorder'><div id='pb".($uri + 1)."' class='pageNumberBlock' onmouseover='pageBlock(1, \"pb".($uri + 1)."\", \"pbt".($uri + 1)."\")' onmouseout='pageBlock(0, \"pb".($uri + 1)."\", \"pbt".($uri + 1)."\")'><span class='paginationLink' id='pbt".($uri + 1)."'>".($uri + 1)."</span></div></a>
                                                <div class='pageNumberBlock' style='cursor: url(\"/img/cursor/no.cur\"), auto;'><span class='paginationInactive'>...</span></div>
                                                <a href='".$link.$numbers."' class='noBorder'><div id='pb".$numbers."' class='pageNumberBlock' onmouseover='pageBlock(1, \"pb".$numbers."\", \"pbt".$numbers."\")' onmouseout='pageBlock(0, \"pb".$numbers."\", \"pbt".$numbers."\")'><span class='paginationLink' id='pbt".$numbers."'>".$numbers."</span></div></a>
                                                <a href='".$link.($uri + 1)."' class='noBorder'><div class='pageNumberBlockSide' id='pbNext' onmouseover='pageBlock(1, \"pbNext\", \"pbtNext\")' onmouseout='pageBlock(0, \"pbNext\", \"pbtNext\")'><span class='paginationLink' id='pbtNext'>Следующая</span></div></a>
                                            </div>
                                        ";
                                    } else {
                                        echo "
                                            <br /><br />
                                                <a href='".$link.($uri - 1)."' class='noBorder'><div class='pageNumberBlockSide' id='pbPrev' onmouseover='pageBlock(1, \"pbPrev\", \"pbtPrev\")' onmouseout='pageBlock(0, \"pbPrev\", \"pbtPrev\")'><span class='paginationLink' id='pbtPrev'>Предыдущая</span></div></a>
                                                <a href='".$link."1' class='noBorder'><div id='pb1' class='pageNumberBlock' onmouseover='pageBlock(1, \"pb1\", \"pbt1\")' onmouseout='pageBlock(0, \"pb1\", \"pbt1\")'><span class='paginationLink' id='pbt1'>1</span></div></a>
                                                <div class='pageNumberBlock' style='cursor: url(\"/img/cursor/no.cur\"), auto;'><span class='paginationInactive'>...</span></div>
                                        ";

                                        for($i = ($numbers - 4); $i <= $numbers; $i++) {
                                            if($uri != $i) {
                                                echo "<a href='".$link.$i."' class='noBorder'>";
                                            }

                                            echo "<div id='pb".$i."' "; if($i == $uri) {echo "class='pageNumberBlockActive'";} else {echo "class='pageNumberBlock' onmouseover='pageBlock(1, \"pb".$i."\", \"pbt".$i."\")' onmouseout='pageBlock(0, \"pb".$i."\", \"pbt".$i."\")'";} echo "><span "; if($i == $uri) {echo "class='paginationActive'";} else {echo "class='paginationLink' id='pbt".$i."'";} echo ">".$i."</span></div>";

                                            if($uri != $i) {
                                                echo "</a>";
                                            }
                                        }

                                        if($uri == $numbers) {
                                            echo "<div class='pageNumberBlockSide' id='pbNext' style='cursor: url(\"/img/cursor/no.cur\"), auto;'><span class='paginationInactive'>Следующая</span></div>";
                                        } else {
                                            echo "<a href='".$link.($uri + 1)."' class='noBorder'><div class='pageNumberBlockSide' id='pbNext' onmouseover='pageBlock(1, \"pbNext\", \"pbtNext\")' onmouseout='pageBlock(0, \"pbNext\", \"pbtNext\")'><span class='paginationLink' id='pbtNext'>Следующая</span></div></a>";
                                        }
                                    }
                                }
                            }
                        }

                        echo "</div><div class='clear'></div><br /><br />";
                        /* Конец блока постраничной навигации */
                    }
                }

                if($type == "news") {
                    /* Одна новость */
                    $newsResult = $mysqli->query("SELECT * FROM ft_news WHERE url = '".$address."'");
                    $news = $newsResult->fetch_assoc();

                    echo "
                        <span class='headerFont'>".$news['header']."</span>
                        <br /><br /><br /><br />
                        <div class='breadcrumbsContainer' id='newsBreadcrumbs'>
                            <a href='/news/' class='breadcrumbsLink'>Новости</a><span class='breadcrumbs'> > </span><a href='/news/".$news['url']."' class='breadcrumbsLink'>".$news['header']."</a>
                        </div>
                        <br />
                        <div class='section' id='fullNewsDescription'>
                            <div class='fullNewsPreview'>
                                <img src='/img/news/preview/".$news['preview']."' />
                                <br /><br />
                                <a href='/news/'><button class='promoButton'><i class='fa fa-arrow-left' aria-hidden='true'></i>вернуться к списку новостей</button></a>
                            </div>
                            <div class='fullNewsDescription'>
                                <span class='breadcrumbs'>".dateToString($news['date'])." г.</span>
                                <br /><br />
                                <span class='newsDescriptionFont'>".$news['description']."</span>
                                <br /><br />
                                <span class='newsFont'>".$news['text']."</span>
                                <br />
                                <div class='section' style='text-align: right; margin-top: 40px;' id='newsButtonSection'>
                                    <a href='/news/'><button class='promoButton'><i class='fa fa-arrow-left' aria-hidden='true'></i>вернуться к списку новостей</button></a>
                                </div>
                            </div>
                            <div class='clear'></div>
                        </div>
                    ";
                }

                if($type == "offer") {
                    $offerResult = $mysqli->query("SELECT * FROM ft_offers WHERE url = '".$address."'");
                    $offer = $offerResult->fetch_assoc();

                    echo "
                        <span class='headerFont'>".$offer['header']."</span>
                        <br /><br /><br /><br />
                        <div class='section' id='fullNewsDescription'>
                            <div class='fullNewsPreview'>
                                <img src='/img/offers/preview/".$offer['preview']."' />
                                <br /><br />
                                <a href='/#offers'><button class='promoButton'><i class='fa fa-arrow-left' aria-hidden='true'></i>вернуться к предложениям</button></a>
                            </div>
                            <div class='fullNewsDescription'>
                                <span class='breadcrumbs'>".dateToString($offer['date'])." г.</span>
                                <br /><br />
                                <span class='newsDescriptionFont'>".$offer['description']."</span>
                                <br /><br />
                                <span class='newsFont'>".$offer['text']."</span>
                                <br />
                                <div class='section' style='text-align: right; margin-top: 40px;' id='offerButtonSection'>
                                    <a href='/#offers'><button class='promoButton'><i class='fa fa-arrow-left' aria-hidden='true'></i>вернуться к предложениям</button></a>
                                </div>
                            </div>
                            <div class='clear'></div>
                        </div>
                    ";
                }
            ?>
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
                        <a href="https://instagram.com/flavia_travel/" target="_blank"><img src="/img/system/instagram.png" id="instagram" onmouseover="changeIcon('instagram', 1)" onmouseout="changeIcon('instagram', 0)" /></a>
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

    <div onclick="scrollToTop()" id="scroll"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>

</body>

</html>