<?php
session_start();
require_once("../settings.php");
require_once("../models/postmodel.php");
if (checkAdmin()) {

    $model = new PostModel();

    $newPostId = $model->deleteData($db, $_GET['id']);

    header("Location: /");
}
else {
    header("Location: /error404");
}
?>