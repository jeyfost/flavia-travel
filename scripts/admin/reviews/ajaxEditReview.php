<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 18.06.2018
 * Time: 15:25
 */

include("../../connect.php");

$id = $mysqli->real_escape_string($_POST['id']);
$name = $mysqli->real_escape_string($_POST['name']);
$text = $mysqli->real_escape_string(nl2br($_POST['text']));

if($mysqli->query("UPDATE ft_reviews SET name = '".$name."', text = '".$text."' WHERE id = '".$id."'")) {
    echo "ok";
} else {
    echo "failed";
}