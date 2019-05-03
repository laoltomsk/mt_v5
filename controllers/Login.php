<?php
session_start();
require_once("../settings.php");
require_once("../models/usermodel.php");

$model = new UserModel();

$isUserExist = $model->getData($db, $_POST['login'], $_POST['password']);

if ($isUserExist) {
    $_SESSION['user'] = $_POST['login'];
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    header("Location: /controllers/getPosts.php");
} else {
    header("Location: /login.html");
}
?>