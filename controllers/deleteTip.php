<?php
session_start();
require_once("../settings.php");
require_once("../models/tipmodel.php");
if (checkAdmin()) {

    $model = new TipModel();

    $newPostId = $model->deleteData($db, $_GET['id']);

    header("Location: /tipview.html");
}
else {
    header("Location: /error404");
}
?>