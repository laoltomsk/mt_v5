<?php
session_start();
require_once("../settings.php");
require_once("../models/adsmodel.php");

if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {

    $model = new AdsModel();

    switch ($_POST['type']) {
        case "right":
            $model->addRightBanner($db, time(), $_FILES['image260'], $_POST['link'], $_POST['pixel']);
    }

    header("Location: /setads.html");
}
else {
    header("Location: /error404");
}
?>