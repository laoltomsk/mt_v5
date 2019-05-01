<?php
require_once("../settings.php");
require_once("../models/newsmodel.php");
require_once("../views/tag_load_more_view.php");

$model = new NewsModel();
$view = new TagLoadMoreView();

$data = array();
$data['news'] = $model->getData($db, $_GET['category'], $_GET['tag'], $_GET['from']);

$view->show($data);
?>