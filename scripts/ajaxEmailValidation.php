<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 27.12.2017
 * Time: 15:19
 */

include("connect.php");

$email = $mysqli->real_escape_string($_POST['email']);

if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "ok";
} else {
    echo "failed";
}