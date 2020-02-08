<?php
session_start();
require_once("../settings.php");
require_once("../models/newsmodel.php");
require_once("../views/tag_view.php");
require_once("../models/adsmodel.php");

$model = new NewsModel();
$view = new TagView();
$ads = new AdsModel();

$data = array();

if ($_GET['category'] === "main") {
    $_GET['category'] = "news";
}

if ($_GET['category'] === "obzor") {
    $_GET['category'] = "reviews";
}

if ($_GET['category'] === "news") {
    $_GET['category'] = "";
}

$data['news'] = $model->getData($db, $_GET['category'], $_GET['tag'], infinity, ($_GET['page'] ?? 0) * newsOnPage);
$data['category'] = $_GET['category'];
$data['tag'] = $_GET['tag'];
$data['ads'] = $ads->getData($db);

if ($data['news']) {
    $view->show($data);
}
else {
    header("Location: /error404");
}
?>