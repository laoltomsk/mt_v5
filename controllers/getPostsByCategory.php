<?php
session_start();
require_once("../settings.php");
require_once("../models/newsmodel.php");
require_once("../views/category_view.php");
require_once("../models/adsmodel.php");

$model = new NewsModel();
$view = new CategoryView();
$ads = new AdsModel();

$data = array();

if ($_GET['category'] === "main") {
    $_GET['category'] = "news";
}

if ($_GET['category'] === "obzor") {
    $_GET['category'] = "reviews";
}

$data['news'] = $model->getData($db, $_GET['category'], '', infinity, $_GET['page'] * newsOnPage);
$data['category'] = $_GET['category'];
$data['ads'] = $ads->getData($db);

if ($data['news']) {
    $view->show($data);
}
else {
    header("Location: /error404");
}
?>