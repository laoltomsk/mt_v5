<?php
session_start();
require_once("../settings.php");
require_once("../views/login_view.php");

if (isset($_SESSION['user'])) {
    header("Location: /");
}

$view = new LoginView();

$view->show(Array());
?>