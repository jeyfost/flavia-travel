<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 05.01.2018
 * Time: 16:16
 */

include("../../connect.php");

$id = $mysqli->real_escape_string($_POST['id']);

$newsCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_news WHERE id = '".$id."'");
$newsCheck = $newsCheckResult->fetch_array(MYSQLI_NUM);

if($newsCheck[0] > 0) {
    $newsResult = $mysqli->query("SELECT * FROM ft_news WHERE id = '".$id."'");
    $news = $newsResult->fetch_assoc();

    if($mysqli->query("DELETE FROM ft_news WHERE id = '".$id."'")) {
        unlink("../../../img/news/preview/".$news['preview']);

        echo "ok";
    } else {
        echo "failed";
    }
} else {
    echo "id";
}