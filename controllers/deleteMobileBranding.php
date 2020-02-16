<?php
session_start();
require_once("../settings.php");
require_once("../models/adsmodel.php");

if (checkAdmin()) {

    $model = new AdsModel();

    $model->removeMobileBranding($db, $_POST['id']);

    header("Location: /setads.html");
}
else {
    header("Location: /error404");
}
?>