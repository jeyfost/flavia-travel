<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 31.01.2018
 * Time: 19:14
 */

include("../../connect.php");
include("../image.php");

$req = false;
ob_start();

$error = 0;

if(!empty($_FILES['firstSlide']['name'])) {
    if($_FILES['firstSlide']['error'] != 0 or substr($_FILES['firstSlide']['type'], 0, 5) != "image") {
        $error++;

        echo "first";

        $req = ob_get_contents();
        ob_end_clean();
        echo json_encode($req);

        exit;
    }
}

if(!empty($_FILES['secondSlide']['name'])) {
    if($_FILES['secondSlide']['error'] != 0 or substr($_FILES['secondSlide']['type'], 0, 5) != "image") {
        $error++;

        echo "second";

        $req = ob_get_contents();
        ob_end_clean();
        echo json_encode($req);

        exit;
    }
}

if(!empty($_FILES['thirdSlide']['name'])) {
    if($_FILES['thirdSlide']['error'] != 0 or substr($_FILES['thirdSlide']['type'], 0, 5) != "image") {
        $error++;

        echo "third";

        $req = ob_get_contents();
        ob_end_clean();
        echo json_encode($req);

        exit;
    }
}

if($error == 0) {
    $photoUploadDir = "../../../img/slides/";

    if(!empty($_FILES['firstSlide']['tmp_name'])) {
        $firstPhotoName = "slide-01.jpg";
        $firstPhotoTmpName = $_FILES['firstSlide']['tmp_name'];
        $firstPhotoUpload = $photoUploadDir.$firstPhotoName;

        move_uploaded_file($firstPhotoTmpName, $firstPhotoUpload);
    }

    if(!empty($_FILES['secondSlide']['tmp_name'])) {
        $secondPhotoName = "slide-02.jpg";
        $secondPhotoTmpName = $_FILES['secondSlide']['tmp_name'];
        $secondPhotoUpload = $photoUploadDir.$secondPhotoName;

        move_uploaded_file($secondPhotoTmpName, $secondPhotoUpload);
    }

    if(!empty($_FILES['thirdSlide']['tmp_name'])) {
        $thirdPhotoName = "slide-03.jpg";
        $thirdPhotoTmpName = $_FILES['thirdSlide']['tmp_name'];
        $thirdPhotoUpload = $photoUploadDir.$thirdPhotoName;

        move_uploaded_file($thirdPhotoTmpName, $thirdPhotoUpload);
    }

    echo "ok";
}

$req = ob_get_contents();
ob_end_clean();
echo json_encode($req);

exit;