<?php
session_start();
require_once("../settings.php");
require_once("../models/adsmodel.php");
if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {

    $model = new AdsModel();

    $model->setTop3($db, $_POST['index1'], $_POST['index2'], $_POST['index3']);

    header("Location: /");
}
else {
    header("Location: /error404");
}
?>