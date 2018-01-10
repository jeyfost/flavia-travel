<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 10.01.2018
 * Time: 14:49
 */

include("../../connect.php");
include("../image.php");

$req = false;
ob_start();

$header = $mysqli->real_escape_string($_POST['header']);
$url = $mysqli->real_escape_string($_POST['url']);
$description = $mysqli->real_escape_string(nl2br($_POST['description']));
$text = $mysqli->real_escape_string(nl2br($_POST['text']));

if(!is_numeric($url)) {
    $urlCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_offers WHERE url = '".$url."'");
    $urlCheck = $urlCheckResult->fetch_array(MYSQLI_NUM);

    if($urlCheck[0] == 0) {
        if($_FILES['preview']['error'] == 0 and substr($_FILES['preview']['type'], 0, 5) == "image") {
            $previewTmpName = $_FILES['preview']['tmp_name'];
            $previewName = randomName($previewTmpName);
            $previewDBName = $previewName.".".substr($_FILES['preview']['name'], count($_FILES['preview']['name']) - 4, 4);
            $previewUploadDir = "../../../img/offers/preview/";
            $previewUpload = $previewUploadDir.$previewDBName;

            $description = str_replace("<br>", " ", $description);
            $description = str_replace("<br/>", " ", $description);
            $description = str_replace("<br />", " ", $description);

            if($mysqli->query("INSERT INTO ft_offers (header, description, date, text, preview, url) VALUES ('".$header."', '".$description."', '".date('Y-m-d')."', '".$text."', '".$previewDBName."', '".$url."')")) {
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
} else {
    echo "number";
}

$req = ob_get_contents();
ob_end_clean();
echo json_encode($req);

exit;