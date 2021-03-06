<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 18.06.2018
 * Time: 11:30
 */

include("connect.php");

$req = false;
ob_start();

$name = $mysqli->real_escape_string($_POST['name']);
$email = $mysqli->real_escape_string($_POST['email']);
$good = $mysqli->real_escape_string($_POST['good']);
$text = $mysqli->real_escape_string(nl2br($_POST['text']));

if ($mysqli->query("INSERT INTO ft_reviews (date, name, email, text, showing) VALUES ('" . date("Y-m-d H:i:s") . "', '" . $name . "', '" . $email . "', '" . $text . "', '0')")) {
    $from = "flavia-travel.by <no-reply@flavia-travel.by>";
    $to = ADMIN_EMAIL;
    $subject = "На сайте flavia-travel.by был добавлен отзыв";

    $headers = "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: " . $from;

    $text = "
	    <div style='width: 100%; height: 100%; background-color: #fafafa; padding-top: 5px; padding-bottom: 20px;'>
		    <center>
		    <div style='padding: 20px; box-shadow: 0 5px 15px -4px rgba(0, 0, 0, 0.4); background-color: #fff; width: 600px; text-align: left;'>
			    <p>На сайте flavia-travel.by был добавлен новый отзыв. Он будет отображён только после валидации в разделе 'Отзывы' панели адмнистрирования.</p>
		    </div>
		    <br /><br />
		    </center>
	    </div>
    ";

    $message = $text;

    mail($to, $subject, $message, $headers);

    echo "ok";
} else {
    echo "failed";
}

$req = ob_get_contents();
ob_end_clean();
echo json_encode($req);

exit;