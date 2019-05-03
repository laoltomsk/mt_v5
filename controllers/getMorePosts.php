<?php
session_start();
require_once("../settings.php");
require_once("../models/newsmodel.php");
require_once("../views/index_load_more_view.php");

$model = new NewsModel();
$view = new IndexLoadMoreView();

$data = array();
$data['news'] = $model->getData($db, '', '', $_GET['from']);

$view->show($data);
?>