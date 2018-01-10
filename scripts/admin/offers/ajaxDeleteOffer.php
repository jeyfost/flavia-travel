<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 10.01.2018
 * Time: 15:11
 */

include("../../connect.php");

$id = $mysqli->real_escape_string($_POST['id']);

$offerCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_offers WHERE id = '".$id."'");
$offerCheck = $offerCheckResult->fetch_array(MYSQLI_NUM);

if($offerCheck[0] > 0) {
    $offerResult = $mysqli->query("SELECT * FROM ft_offers WHERE id = '".$id."'");
    $offer = $offerResult->fetch_assoc();

    if($mysqli->query("DELETE FROM ft_offers WHERE id = '".$id."'")) {
        unlink("../../../img/offers/preview/".$offer['preview']);

        echo "ok";
    } else {
        echo "failed";
    }
} else {
    echo "id";
}