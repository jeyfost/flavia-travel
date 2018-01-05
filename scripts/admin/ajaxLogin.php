<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 05.01.2018
 * Time: 8:06
 */

session_start();
include("../connect.php");

$login = $mysqli->real_escape_string($_POST['login']);
$password = $mysqli->real_escape_string($_POST['password']);

$userCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_users WHERE login = '".$login."' AND password = '".md5($password)."'");
$userCheck = $userCheckResult->fetch_array(MYSQLI_NUM);

if($userCheck[0] == 1) {
	$userIDResult = $mysqli->query("SELECT id FROM ft_users WHERE login = '".$login."' AND password = '".md5($password)."'");
	$userID = $userIDResult->fetch_array(MYSQLI_NUM);

	$_SESSION['userID'] = $userID[0];

	echo "ok";
} else {
	echo "failed";
}