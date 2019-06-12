<?php
session_start();
require_once("../settings.php");
require_once("../models/newsmodel.php");
require_once("../models/adsmodel.php");
require_once("../views/index_view.php");

$model = new NewsModel();
$ads = new AdsModel();
$view = new IndexView();

$data = array();
$data['news'] = $model->getData($db);
$data['ads'] = $ads->getData($db);

$view->show($data);
?>