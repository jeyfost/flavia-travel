<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 05.01.2018
 * Time: 10:28
 */

include("../../connect.php");

$id = $mysqli->real_escape_string($_POST['id']);

$textResult = $mysqli->query("SELECT text FROM ft_news WHERE id = '".$id."'");
$text = $textResult->fetch_array(MYSQLI_NUM);

echo $text[0];