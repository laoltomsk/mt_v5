<?php
session_start();
require_once("../settings.php");
require_once("../models/postmodel.php");
if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {

    $model = new PostModel();

    $newPostId = $model->setData($db, $_POST['title'], $_POST['category'], $_POST['text'], $_POST['lead'],
        $_POST['pic'], $_POST['author'], $_POST['src'], $_POST['tags']);

    header("Location: /post_".$newPostId.".html");
}
else {
    header("Location: /error404");
}
?>