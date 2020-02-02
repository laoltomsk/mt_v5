<?php
session_start();
require_once("../settings.php");
require_once("../views/login_view.php");
require_once("../models/adsmodel.php");

if (isset($_SESSION['user'])) {
    header("Location: /");
}

$ads = new AdsModel();
$view = new LoginView();

$data = Array();
$data['ads'] = $ads->getData($db);

$view->show($data);
?>