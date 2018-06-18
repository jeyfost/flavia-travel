<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 18.06.2018
 * Time: 15:26
 */

include("../../connect.php");

$id = $mysqli->real_escape_string($_POST['id']);

$reviewCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_reviews WHERE  id = '".$id."'");
$reviewCheck = $reviewCheckResult->fetch_array(MYSQLI_NUM);

if($reviewCheck[0] == 1) {
    if($mysqli->query("DELETE FROM ft_reviews WHERE id = '".$id."'")) {
        echo "ok";
    } else {
        echo "failed";
    }
} else {
    echo "review";
}