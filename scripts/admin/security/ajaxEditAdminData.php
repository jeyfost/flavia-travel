<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 05.01.2018
 * Time: 8:43
 */

session_start();
include('../../connect.php');

$oldLogin = $mysqli->real_escape_string($_POST['oldLogin']);
$oldPassword = $mysqli->real_escape_string($_POST['oldPassword']);
$newLogin = $mysqli->real_escape_string($_POST['newLogin']);
$newPassword = $mysqli->real_escape_string($_POST['newPassword']);

if($newLogin != $oldLogin) {
	if($newPassword != $oldPassword) {
		$dataCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_users WHERE login = '".$oldLogin."' AND password = '".md5($oldPassword)."'");
		$dataCheck = $dataCheckResult->fetch_array(MYSQLI_NUM);

		if($dataCheck[0] > 0) {
			if($newLogin == "") {
				$newLogin = $oldLogin;
			}

			if($newPassword == "") {
				$newPassword = $oldPassword;
			}

			if($mysqli->query("UPDATE ft_users SET login = '".$newLogin."', password = '".md5($newPassword)."' WHERE id = '".$_SESSION['userID']."'")) {
				echo "ok";
			} else {
				echo "failed";
			}
		} else {
			echo "old";
		}
	} else {
		echo "same password";
	}
} else {
	echo "same login";
}