<?php
session_start();
require_once("../settings.php");
require_once("../models/tipmodel.php");
require_once("../views/tips_view.php");
require_once("../models/adsmodel.php");

if (checkAdmin()) {

    $model = new TipModel();
    $view = new TipsView();
    $ads = new AdsModel();

    $data = array();
    $data['tips'] = $model->getData($db);
    $data['ads'] = $ads->getData($db);

    $view->show($data);
}
else {
    header("Location: /error404");
}
?>