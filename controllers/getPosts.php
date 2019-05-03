<?php
session_start();
require_once("../settings.php");
require_once("../models/newsmodel.php");
require_once("../views/index_view.php");

var_dump($_SESSION);

$model = new NewsModel();
$view = new IndexView();

$data = array();
$data['news'] = $model->getData($db);

$view->show($data);
?>