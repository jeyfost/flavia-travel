<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 08.01.2018
 * Time: 12:36
 */

include("../../connect.php");
include("../image.php");

$req = false;
ob_start();

$id = $mysqli->real_escape_string($_POST['news']);
$header = $mysqli->real_escape_string($_POST['header']);
$url = $mysqli->real_escape_string($_POST['url']);
$description = $mysqli->real_escape_string(nl2br($_POST['description']));
$text = $mysqli->real_escape_string(nl2br($_POST['text']));

$urlCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_news WHERE url = '".$url."'");
$urlCheck = $urlCheckResult->fetch_array(MYSQLI_NUM);

if($urlCheck[0] == 0) {
    if($_FILES['preview']['error'] == 0 and substr($_FILES['preview']['type'], 0, 5) == "image") {
        $previewTmpName = $_FILES['preview']['tmp_name'];
        $previewName = randomName($previewTmpName);
        $previewDBName = $previewName.".".substr($_FILES['preview']['name'], count($_FILES['preview']['name']) - 4, 4);
        $previewUploadDir = "../../../img/news/preview/";
        $previewUpload = $previewUploadDir.$previewDBName;

        $description = str_replace("<br>", " ", $description);
        $description = str_replace("<br/>", " ", $description);
        $description = str_replace("<br />", " ", $description);

        if($mysqli->query("INSERT INTO ft_news (header, description, date, text, preview, url) VALUES ('".$header."', '".$description."', '".date('Y-m-d')."', '".$text."', '".$previewDBName."', '".$url."')")) {
            resize($previewTmpName, 270);
            move_uploaded_file($previewTmpName, $previewUpload);

            echo "ok";
        } else {
            echo "failed";
        }
    } else {
        echo "preview";
    }
} else {
    echo "url";
}

$req = ob_get_contents();
ob_end_clean();
echo json_encode($req);

exit;