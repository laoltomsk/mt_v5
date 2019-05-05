<?php
session_start();
require_once("../settings.php");
require_once("../views/error_view.php");

$view = new ErrorView();

$data = array();
$data['error'] = $_GET['id'];

$view->show($data);
?>