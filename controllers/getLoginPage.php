<?php
session_start();
require_once("../settings.php");
require_once("../views/login_view.php");

$view = new LoginView();

$view->show(Array());
?>