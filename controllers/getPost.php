<?php
require_once("../settings.php");
require_once("../models/postmodel.php");
require_once("../views/post_view.php");

$model = new PostModel();
$view = new PostView();

$data = array();
$data['post'] = $model->getData($db, $_GET['id']);

$view->show($data);
?>