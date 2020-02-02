<?php
session_start();
require_once("../settings.php");
require_once("../views/error_view.php");
require_once("../models/adsmodel.php");

$ads = new AdsModel();
$view = new ErrorView();

$data = array();
$data['error'] = $_GET['id'];
$data['ads'] = $ads->getData($db);

$view->show($data);
?>