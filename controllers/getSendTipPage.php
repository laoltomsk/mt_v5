<?php
session_start();
require_once("../settings.php");
require_once("../views/send_tip_view.php");

$view = new SendTipView();

$view->show(Array());

?>