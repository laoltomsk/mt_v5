<?php
session_start();
require_once("../settings.php");
require_once("../views/post_create_view.php");
require_once("../models/adsmodel.php");

if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
    $view = new PostCreateView();
    $ads = new AdsModel();

    $data = Array();
    $data['ads'] = $ads->getData($db);

    $view->show($data);
}
else {
    header("Location: /error404");
}

?>