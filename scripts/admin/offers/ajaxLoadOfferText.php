<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 10.01.2018
 * Time: 14:55
 */

include("../../connect.php");

$id = $mysqli->real_escape_string($_POST['id']);

$textResult = $mysqli->query("SELECT text FROM ft_offers WHERE id = '".$id."'");
$text = $textResult->fetch_array(MYSQLI_NUM);

echo $text[0];