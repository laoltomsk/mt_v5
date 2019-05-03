<?php
session_start();
require_once("../settings.php");
require_once("../models/tipmodel.php");
if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {

    $model = new TipModel();

    $newPostId = $model->deleteData($db, $_GET['id']);

    header("Location: /tipview.html");
}
?>