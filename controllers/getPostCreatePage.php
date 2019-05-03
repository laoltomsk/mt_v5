<?php
session_start();
require_once("../settings.php");
require_once("../views/post_create_view.php");

if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
    $view = new PostCreateView();

    $view->show(Array());
}
else {
    header("Location: /");
}

?>