<?php
session_start();
require_once("../settings.php");
require_once("../models/postmodel.php");
if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {

    $model = new PostModel();

    $newPostId = $model->deleteData($db, $_GET['id']);

    header("Location: /");
}
?>