<?php
require_once("../settings.php");
require_once("../models/newsmodel.php");
require_once("../views/tag_view.php");

$model = new NewsModel();
$view = new TagView();

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

$data['news'] = $model->getData($db, $_GET['category'], $_GET['tag'], infinity, $_GET['page'] * newsOnPage);
$data['category'] = $_GET['category'];
$data['tag'] = $_GET['tag'];

$view->show($data);
?>