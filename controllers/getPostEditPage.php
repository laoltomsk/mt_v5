<?php
session_start();
require_once("../settings.php");
require_once("../models/postmodel.php");
require_once("../views/post_edit_view.php");

if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {

    $model = new PostModel();
    $view = new PostEditView();

    $data = array();
    $data['post'] = $model->getData($db, $_GET['id']);

    if ($data['post']) {
        $view->show($data);
    }
    else {
        header("Location: /error404");
    }
}
else {
    header("Location: /error404");
}

?>