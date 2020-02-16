<?php
session_start();
require_once("../settings.php");
require_once("../models/postmodel.php");
if (checkAdmin()) {

    $model = new PostModel();

    $newPostId = $model->setData($db, $_POST['title'], $_POST['category'], $_POST['text'], $_POST['lead'],
        $_POST['pic'], $_POST['author'], $_POST['src'], $_POST['tags'], $_POST['id']);

    if ($newPostId) {
        header("Location: /post_".$newPostId.".html");
    }
    else {
        header("Location: /error404");
    }
}
else {
    header("Location: /error404");
}
?>