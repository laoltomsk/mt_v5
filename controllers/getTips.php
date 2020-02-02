<?php
session_start();
require_once("../settings.php");
require_once("../models/tipmodel.php");
require_once("../views/tips_view.php");
require_once("../models/adsmodel.php");

if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {

    $model = new TipModel();
    $view = new TipsView();

    $data = array();
    $data['tips'] = $model->getData($db);
    $data['ads'] = $ads->getData($db);

    $view->show($data);
}
else {
    header("Location: /error404");
}
?>