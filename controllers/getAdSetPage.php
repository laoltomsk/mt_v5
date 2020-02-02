<?php
session_start();
require_once("../settings.php");
require_once("../models/newsmodel.php");
require_once("../models/adsmodel.php");
require_once("../views/ad_set_view.php");

if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
    $view = new AdSetView();
    $newsModel = new NewsModel();
    $adsModel = new AdsModel();

    $data = array();
    $data['ads'] = $adsModel->getData($db);
    $data['brandings'] = $adsModel->getAllBrandings($db);
    $data['mobileBrandings'] = $adsModel->getAllMobileBrandings($db);
    $data['ideas'] = $newsModel->getData($db, '', '', infinity, 0, 100);

    $view->show($data);
}
else {
    header("Location: /error404");
}
?>