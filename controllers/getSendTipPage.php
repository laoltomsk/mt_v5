<?php
session_start();
require_once("../settings.php");
require_once("../views/send_tip_view.php");
require_once("../models/adsmodel.php");

$view = new SendTipView();
$ads = new AdsModel();

$data = Array();
$data['ads'] = $ads->getData($db);

$view->show($data);

?>