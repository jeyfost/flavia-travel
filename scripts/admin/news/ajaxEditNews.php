<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 05.01.2018
 * Time: 12:09
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

if(!is_numeric($url)) {
    $urlCheckResult = $mysqli->query("SELECT COUNT(id) FROM ft_news WHERE url = '".$url."' AND id <> '".$id."'");
    $urlCheck = $urlCheckResult->fetch_array(MYSQLI_NUM);

    if($urlCheck[0] == 0) {
        $newsResult = $mysqli->query("SELECT * FROM ft_news WHERE id = '".$id."'");
        $news = $newsResult->fetch_assoc();

        if(!empty($_FILES['preview']['name'])) {
            if($_FILES['preview']['error'] == 0 and substr($_FILES['preview']['type'], 0, 5) == "image") {
                $previewTmpName = $_FILES['preview']['tmp_name'];
                $previewName = randomName($previewTmpName);
                $previewDBName = $previewName.".".substr($_FILES['preview']['name'], count($_FILES['preview']['name']) - 4, 4);
                $previewUploadDir = "../../../img/news/preview/";
                $previewUpload = $previewUploadDir.$previewDBName;

                if($mysqli->query("UPDATE ft_news SET preview = '".$previewDBName."' WHERE id = '".$id."'")) {
                     unlink($previewUploadDir.$news['preview']);
                     resize($previewTmpName, 270);
                     move_uploaded_file($previewTmpName, $previewUpload);
                } else {
                    echo "upload";

                    $req = ob_get_contents();
                    ob_end_clean();
                    echo json_encode($req);

                    exit;
                }
            } else {
                echo "preview";
            }
        }

        $description = str_replace("<br>", " ", $description);
        $description = str_replace("<br/>", " ", $description);
        $description = str_replace("<br />", " ", $description);

        if($mysqli->query("UPDATE ft_news SET header = '".$header."', description = '".$description."', text = '".$text."', url = '".$url."' WHERE id = '".$id."'")) {
            echo "ok";
        } else {
            echo "failed";
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