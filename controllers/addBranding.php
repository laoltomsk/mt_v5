<?php
session_start();
require_once("../settings.php");
require_once("../models/adsmodel.php");

if (checkAdmin()) {

    $model = new AdsModel();

    $model->addBranding($db, time(), $_FILES['image1280'], $_FILES['image1440'], $_FILES['image1920'],
        $_POST['link'], $_POST['pixel'], $_POST['color']);

    header("Location: /setads.html");
}
else {
    header("Location: /error404");
}
?>